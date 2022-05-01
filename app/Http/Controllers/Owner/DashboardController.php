<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\TransactionDetail;
use App\User;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $transactions = TransactionDetail::with(['transaction.user','car.galleries'])
                                            ->whereHas('car', function($car){
                                                $car->where('users_id', Auth::user()->id);
                                            });

        $revenue = $transactions->get()->reduce(function ($carry, $item){
            return $carry + $item->price;
        });

        $customer = User::count();

        return view('pages.owner.dashboard',[
            'transaction_count' => $transactions->count(),
            'transaction_data' => $transactions->latest()->take(4)->get(),
            'revenue' => $revenue,
            'customer' => $customer
        ]);
    }
}
