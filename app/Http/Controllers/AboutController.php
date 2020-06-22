<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\About;

class AboutController extends Controller
{
    //
    public function index(){
        $about=About::first();
        return view('about.index',compact('about'));
    }
    public function update(Request $request) {
            $AboutUpdate = About::findOrFail(1);
            $AboutUpdate->update($request->all());
            $AboutUpdate->fresh();
            return redirect()->route('about.index');
        }
}
