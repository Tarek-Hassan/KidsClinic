<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;

class SettingController extends Controller
{
    //
     //
     public function index(){
        $setting=Setting::first();
        return view('setting.index',compact('setting'));
    }
    public function update(Request $request) {
            $settingUpdate = Setting::findOrFail(1);
            $settingUpdate->update($request->all());
            $settingUpdate->fresh();
            return redirect()->route('setting.index');
        }
}
