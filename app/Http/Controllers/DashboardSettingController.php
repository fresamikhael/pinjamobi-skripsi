<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardSettingController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function account()
    {
        $user = Auth::user();

        return view('pages.dashboard-account',[
            'user' => $user
        ]);
    }

    public function update(Request $request, $redirect)
    {
        $data = $request->all();
        $item = Auth::user();

        if($request->file('photo'))
        $data['photo'] = $request->file('photo')->store('assets/user','public');

        $item->update($data);

        return redirect()->route($redirect);
    }
}
