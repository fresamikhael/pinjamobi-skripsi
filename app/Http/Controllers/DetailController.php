<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use App\Cart;
use Illuminate\Support\Facades\Auth;

class DetailController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request, $id)
    {
        $car = Car::with(['galleries', 'user'])->where('slug', $id)->firstOrFail();
        return view('pages.detail',[
            'car' => $car
        ]);
    }

    public function add(Request $request, $id)
    {
        $data = [
            'cars_id' => $id,
            'users_id' => Auth::user()->id,
        ];

        Cart::create($data);

        return redirect()->route('cart');
    }
}
