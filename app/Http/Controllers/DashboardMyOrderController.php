<?php

namespace App\Http\Controllers;

use App\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardMyOrderController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $buyTransactions = TransactionDetail::with(['transaction.user','car.galleries'])
                                            ->whereHas('transaction', function($transaction){
                                                $transaction->where('users_id', Auth::user()->id);
                                            })->latest()->get();

        $ongoingTransactions = TransactionDetail::with(['transaction.user','car.galleries'])
                                            ->whereHas('transaction', function($transaction){
                                                $transaction->where('users_id', Auth::user()->id);
                                            })->where('status', '!=', 'SELESAI' )->latest()->get();

        return view('pages.dashboard-myorder',[
            'buyTransactions' => $buyTransactions,
            'ongoingTransactions' => $ongoingTransactions
        ]);
    }

    public function details(Request $request, $id)
    {
        $transaction = TransactionDetail::with(['transaction.user','car.galleries'])
                                            ->findOrFail($id);

        return view('pages.dashboard-myorder-details', [
            'transaction' => $transaction
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $item = TransactionDetail::findOrFail($id);

        $item->update($data);

        return redirect()->route('dashboard-myorder-details', $id);
    }
}
