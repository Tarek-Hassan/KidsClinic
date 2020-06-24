<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class testController extends Controller
{
    //
    public function test(Request $request){
        
        dd($request->all());
    }
}
