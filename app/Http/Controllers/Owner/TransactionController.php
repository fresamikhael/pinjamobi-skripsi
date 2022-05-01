<?php

namespace App\Http\Controllers\Owner;

use App\Transaction;
use App\TransactionDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = TransactionDetail::with(['transaction.user','car.galleries'])
                                    ->whereHas('car', function($car){
                                        $car->where('users_id', Auth::user()->id);
                                    })->latest()->get();

        $ongoingtransactions = TransactionDetail::with(['transaction.user','car.galleries'])
                                    ->whereHas('car', function($car){
                                        $car->where('users_id', Auth::user()->id);
                                    })->where('status', '!=', 'SELESAI')->latest()->get();

        return view('pages.owner.dashboard-transactions',[
            'transactions'   => $transactions,
            'ongoingtransactions' => $ongoingtransactions
        ]);
    }

    public function details(Request $request, $id)
    {
        $transaction = TransactionDetail::with(['transaction.user','car.galleries'])
                                    ->findOrFail($id);
        return view('pages.owner.dashboard-transactions-detail',[
            'transaction'   => $transaction
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $item = TransactionDetail::findOrFail($id);

        $item->update($data);

        return redirect()->route('owner-transaction-detail', $id);
    }

    public function destroy($id)
    {
        $item = TransactionDetail::findOrFail($id);
        $item->delete();

        return redirect()->route('owner-transaction');
    }
}
