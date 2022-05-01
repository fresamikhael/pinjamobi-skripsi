<?php

namespace App\Http\Controllers\Owner;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function setting()
    {
        $user = Auth::user();
        return view('pages.owner.dashboard-setting',[
            'user' => $user,
        ]);
    }
    public function account()
    {
        $user = Auth::user();
        return view('pages.owner.dashboard-account',[
            'user' => $user,
        ]);
    }

    public function update(Request $request, $redirect)
    {
        $data = $request->all();
        $item = Auth::user();

        $data['photo'] = $request->file('photo')->store('assets/user','public');

        $item->update($data);

        return redirect()->route($redirect);
    }

    public function updateSetting(Request $request, $redirect)
    {
        $data = $request->all();
        $item = Auth::user();

        $item->update($data);

        return redirect()->route($redirect);
    }
}
