<?php

namespace App\Http\Controllers\Owner;

use App\Car;
use DateTime;
use Exception;
use App\Category;

use Midtrans\Snap;
use App\CarGallery;
use App\Transaction;
use Midtrans\Config;
use Midtrans\Notification;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\CarRequest;

class MyCarController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cars = Car::with(['galleries','category'])
                ->where('users_id',Auth::user()->id)
                ->get();
        return view('pages.owner.dashboard-mycars', [
            'cars' => $cars
        ]);
    }

    public function details(Request $request, $id)
    {
        $car = Car::with((['galleries','user','category']))->findOrFail($id);
        $categories = Category::all();
        return view('pages.owner.dashboard-mycars-detail',[
            'categories' => $categories,
            'car' => $car
        ]);
    }

    public function uploadGallery(Request $request)
    {
        $data = $request->all();

        $data['photos'] = $request->file('photos')->store('assets/car','public');

        CarGallery::create($data);

        return redirect()->route('owner-mycars-detail', $request->cars_id);
    }

    public function deleteGallery(Request $request, $id)
    {
        $item = CarGallery::findOrFail($id);
        $item->delete();

        return redirect()->route('owner-mycars-detail', $item->cars_id);
    }

    public function create()
    {
        $categories = Category::all();
        return view('pages.owner.dashboard-mycars-add',[
            'categories' => $categories
        ]);
    }

    public function store(CarRequest $request)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($request->name);
        $car = Car::create($data);
        $code = 'RENT-' . mt_rand(0000, 9999);

        // Menghitung Selisih Hari
        $startdate = $request->start_date;
        $enddate = $request->end_date;
        $datetime1 = new DateTime($startdate);
        $datetime2 = new DateTime($enddate);
        $interval = $datetime1->diff($datetime2);
        $days = $interval->format('%a');

        $gallery = [
            'cars_id' => $car->id,
            'photos' => $request->file('photo')->store('assets/car','public')
        ];

        CarGallery::create($gallery);

        // Transaction Create
        Transaction::create([
            'users_id' => Auth::user()->id ,
            'price'=> (int) $request->price * $days,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'driver' => $request->driver,
            'transaction_status' => 'PENDING',
            'code' => $code
        ]);

        // Konfigurasi Midtrans
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');

        // Buat array untuk dikirim ke Midtrans
        $midtrans = [
            'transaction_details' => [
                'order_id' => $code,
                'gross_amount' => (int) $request->price * $days
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

    public function update(CarRequest $request, $id)
    {
        $data = $request->all();

        $item = Car::findOrFail($id);

        $data['slug'] = Str::slug($request->name);

        $item->update($data);

        return redirect()->route('owner-mycars');
    }

    public function destroy($id)
    {
        $item = Car::findOrFail($id);
        $item->galleries()->delete();
        $item->delete();

        return redirect()->route('owner-mycars');
    }
}
