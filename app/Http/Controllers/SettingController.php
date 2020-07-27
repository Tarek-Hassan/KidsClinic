<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Http\Requests\SettingRequest;

class SettingController extends Controller
{
    //
     //
     public function index(){
        $setting=Setting::first();
        return view('setting.index',compact('setting'));
    }
    public function update(SettingRequest $request) {
            $settingUpdate = Setting::findOrFail(1);
            $settingUpdate->update($request->all());
            
            return redirect()->route('setting.index');
        }
}
