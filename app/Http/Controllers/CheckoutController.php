<?php

namespace App\Http\Controllers;

use App\Car;
use App\Cart;

use DateTime;
use Exception;
use App\Transaction;

use Midtrans\Snap;
use Midtrans\Config;
use Midtrans\Notification;

use App\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function process(Request $request)
    {
        // Save User Data
        $user = Auth::user();
        $user->update($request->except('price'));

        // Proses Checkout
        $code = 'RENT-' . mt_rand(0000, 9999);
        $carts = Cart::with(['car', 'user'])
                        ->where('users_id', Auth::user()->id)
                        ->get();

        // Menghitung Selisih Hari
        $rentdate = $request->rent_date;
        $returndate = $request->return_date;
        $datetime1 = new DateTime($rentdate);
        $datetime2 = new DateTime($returndate);
        $interval = $datetime1->diff($datetime2);
        $days = $interval->format('%a');

        $driver = $request->driver;

        if($driver == 'PAKAI'){
            $driver = 150000;
        }
        else {
            $driver = 0;
        }

        // Transaction Create
        $transaction = Transaction::create([
            'users_id' => Auth::user()->id ,
            'price'=> (int) $request->price * $days + $driver,
            'driver' => $request->driver,
            'rent_date' => $request->rent_date,
            'return_date' => $request->return_date,
            'transaction_status' => 'PENDING',
            'code' => $code
        ]);

        foreach ($carts as $cart){

            // Merubah status mobil
            Car::where('id', $cart->car->id)->update([
                'status' => 'DISEWA'
            ]);

            $trx = 'TRX-' . mt_rand(0000, 9999);

            TransactionDetail::create([
                'transactions_id' => $transaction->id ,
                'cars_id'=> $cart->car->id,
                'price' => $cart->car->price * $days + $driver,
                'status' => 'BELUM DIAMBIL',
                'penalty' => NULL,
                'finish_date' => $request->finish_date,
                'code' => $trx,
            ]);
        }


        // Delete Cart Data
        Cart::where('users_id', Auth::user()->id)->delete();

        // Konfigurasi Midtrans
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');

        // Buat array untuk dikirim ke Midtrans
        $midtrans = [
            'transaction_details' => [
                'order_id' => $code,
                'gross_amount' => (int) $request->price * $days + $driver
            ],
            'customer_details' => [
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
            ],
            'enabled_payments' => [
                'gopay', 'permata_va', 'bca_va', 'bni_va', 'bri_va', 'shopeepay'
            ],
            'vtweb' => []
        ];

        try {
            // Get Snap Payment Page URL
            $paymentUrl = Snap::createTransaction($midtrans)->redirect_url;

            // Redirect to Snap Payment Page
            return redirect($paymentUrl);
        }
        catch (Exception $e) {
            echo $e->getMessage();
        }

    }

    public function callback(Request $request)
    {
        // Set konfigurasi midtrans
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');

        // Instance midtrans notification
        $notification = new Notification();

        // Assign ke variable untuk memudahkan coding
        $status = $notification->transaction_status;
        $type = $notification->payment_type;
        $fraud = $notification->fraud_status;
        $order_id = $notification->order_id;

        // Cari transaksi berdasarkan ID
        $transaction = Transaction::where('code', $order_id)->first();

        return dd($transaction);

        // Handle notification status
        if($status == 'capture') {
            if($type == 'credit_card'){
                if($fraud == 'challenge'){
                    $transaction->status = 'PENDING';
                }
                else{
                    $transaction->status = 'SUCCESS';
                }
            }
        }

        else if($status == 'settlement'){
            $transaction->status = 'SUCCESS';
        }

        else if($status == 'pending'){
            $transaction->status = 'PENDING';
        }

        else if($status == 'deny'){
            $transaction->status = 'CANCELLED';
        }

        else if($status == 'expired'){
            $transaction->status = 'CANCELLED';
        }

        else if($status == 'cancel'){
            $transaction->status = 'CANCELLED';
        }

        // Simpan transaksi
        $transaction->save();


    }
}
