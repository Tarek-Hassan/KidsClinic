<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;


class CalenderController extends Controller
{
    //
    public function index()
    {
        
        if(request()->ajax())
        {
        
            $start = (!empty($_GET["start"])) ? ($_GET["start"]) : ('');
            $end = (!empty($_GET["end"])) ? ($_GET["end"]) : ('');
            $data = Schedule::whereDate('start', '>=', $start)->whereDate('end',   '<=', $end)->get(['id','title','start', 'end','color']);
            return response()->json($data);
        }
        return view('schedule.calender');
    }
    public function update(Request $request)
    {
        $where = array('id' => $request->id);
        $updateArr = ['title' => $request->title,'start' => $request->start, 'end' => $request->end];
        $event  = Schedule::where($where)->update($updateArr);
        return response()->json($event);
    }
    
    public function destroy(Request $request)
    {
        $event = Schedule::where('id',$request->id)->delete();
        return response()->json($event);
    }
    
}
