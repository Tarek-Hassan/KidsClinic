<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Schedule;

class aSASasas_ScheduleController extends Controller
{
    //

    public function index(Request $request){
        dd("ssss");
        if ($request->ajax()) {
            dd("aaaa");
         $start = (!empty($_GET["start"])) ? ($_GET["start"]) : ('');
         $end = (!empty($_GET["end"])) ? ($_GET["end"]) : ('');
 
         $data = Schedule::whereDate('start', '>=', $start)->whereDate('end',   '<=', $end)->get(['id','title','start', 'end']);
         return response()->json($data);
        }
        
        return view('schedule.index');
    }

    // public function create(){
    //     return view('schedule.create');
    // }

    public function store(Request $request){
        $insertArr = [
            'title' => $request->title,
            'start' => $request->start,
            'end' => $request->end
            ];
        $data = Schedule::insert($insertArr);

        // $data = Schedule::create($request->all());
        return response()->json($data);
        // return redirect()->route('schedule.index')->with('success', 'Event has been added');
    }


    public function update(Request $request){

        $where = array('id' => $request->id);
        $updateArr = ['title' => $request->title,'start' => $request->start, 'end' => $request->end];
        $event  = Schedule::where($where)->update($updateArr);
      
        // $scheduleUpdate = Schedule::findOrFail($request->id);
        // $scheduleUpdate->update($request->all());
        // $scheduleUpdate->fresh();
        return response()->json($event);
        // return redirect()->route('schedule.index');
    }

    public function destroy(Request $request){

        $event = Schedule::where('id',$request->id)->delete();

        // $schedule=Schedule::find($request->id);
        // $schedule->delete();
        return response()->json($event);
        // return redirect()->back();
        // return redirect()->route('schedule.index');
    }
    
}
