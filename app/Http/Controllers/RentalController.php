<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Car;

class RentalController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::where('roles', 'OWNER')->where('rent_name', '!=' , 'NULL')->get();
        return view('pages.rentals',[
            'users' => $users
        ]);
    }

    public function details(Request $request, $id)
    {
        $users = User::with(['galleries', 'car'])->where('id', $id)->firstOrFail();
        $cars = Car::with(['galleries'])->where('status', 'TERSEDIA')->where('users_id', $users->id)->get();

        return view('pages.rental',[
            'users'  => $users,
            'cars' => $cars,
        ]);
    }

}
