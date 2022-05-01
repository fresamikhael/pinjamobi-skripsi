<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Car;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use App\Http\Requests\Admin\CarGalleryRequest;
use App\User;
use App\Category;
use App\CarGallery;
use Yajra\DataTables\Facades\DataTables;

class CarGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax())
        {
            $query = CarGallery::with(['car']);

            return Datatables::of($query)
                ->addColumn('action', function($item) {
                    return '
                        <div class="btn-group">
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle mr-1 mb-1"
                                        type="button"
                                        data-toggle="dropdown">
                                        Aksi
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="' . route('car-gallery.edit', $item->id) . '">
                                        Edit
                                    </a>
                                    <a class="dropdown-item text-danger" href="' . route('car-gallery.show', $item->id) . '">
                                        Hapus
                                    </a>
                                </div>

                            </div>
                        </div>
                    ';
                })
                ->editColumn('photos', function($item){
                    return $item->photos ? '<img src="'. Storage::url($item->photos) .'" style="max-height: 80px;" /> ' : '';
                })
                ->rawColumns(['action','photos'])
                ->make();
                ;
        }

        return view('pages.admin.car-gallery.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cars = Car::all();

        return view('pages.admin.car-gallery.create', [
            'cars' => $cars,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarGalleryRequest $request)
    {
        $data = $request->all();

        $data['photos'] = $request->file('photos')->store('assets/car','public');

        CarGallery::create($data);

        return redirect()->route('car-gallery.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cars = Car::all();
        $item = CarGallery::findOrFail($id);
        $users = User::all();
        $categories = Category::all();

        return view('pages.admin.car-gallery.delete', [
            'item' => $item,
            'users' => $users,
            'categories' => $categories,
            'cars'  => $cars
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cars = Car::all();
        $item = CarGallery::findOrFail($id);
        $users = User::all();
        $categories = Category::all();

        return view('pages.admin.car-gallery.edit', [
            'item' => $item,
            'users' => $users,
            'categories' => $categories,
            'cars'  => $cars
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CarGalleryRequest $request, $id)
    {
        $data = $request->all();

        $item = CarGallery::findOrFail($id);

        $data['photos'] = $request->file('photos')->store('assets/car','public');

        $item->update($data);

        return redirect()->route('car-gallery.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = CarGallery::findOrFail($id);
        $item->delete();

        return redirect()->route('car-gallery.index');
    }
}
