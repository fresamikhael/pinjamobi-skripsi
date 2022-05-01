<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Car;
use App\Category;

class CarController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::all();
        $cars = Car::with(['galleries'])
                    ->where('status', 'TERSEDIA')
                    ->paginate(16);

        return view('pages.cars',[
            'categories' => $categories,
            'cars'  => $cars
        ]);
    }

    public function detail(Request $request, $slug)
    {
        $categories = Category::all();
        $category = Category::where('slug', $slug)->firstOrFail();
        $cars = Car::with(['galleries'])
                    ->where('categories_id', $category->id)
                    ->where('status', 'TERSEDIA')
                    ->paginate(16);

        return view('pages.cars',[
            'categories' => $categories,
            'cars'  => $cars
        ]);
    }
}
