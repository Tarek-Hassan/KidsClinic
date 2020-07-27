<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\About;
use App\Http\Requests\AboutRequest;

class AboutController extends Controller
{
    //
    public function index(){
        $about=About::first();
        return view('about.index',compact('about'));
    }
    public function update(AboutRequest $request) {
            $AboutUpdate = About::findOrFail(1);
            $AboutUpdate->update($request->all());
        
            return redirect()->route('about.index');
        }
}
