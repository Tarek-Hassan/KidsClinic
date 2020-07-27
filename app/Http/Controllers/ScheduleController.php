<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Schedule;

use Redirect,Response;
use Illuminate\Support\Carbon;
use Yajra\DataTables\DataTables ; 

class ScheduleController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Schedule::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $button = '&nbsp;&nbsp;&nbsp;<a href="/admin/schedule/'.$row->id.'/edit" class="edit btn btn-secondary btn-sm m-1"><i class="fas fa-pencil-alt">
                        </i> Edit</a>';
                        $button .= '&nbsp;&nbsp;&nbsp;<a  data-id="'.$row->id.'" class="del btn btn-danger btn-sm m-1 "  data-toggle="modal"data-target="#delete"><i class="fas fa-trash">
                        </i> Delete</a>';
                        return $button;
                    })

                    ->rawColumns(['action'])

                    ->make(true);
        }
        return view('schedule.index');
    }
    
    
    public function create(){
        return view('schedule.create');
        
    }

    public function store(Request $request)
    {
    
        $date=explode(" - ", $request->date);
        
        $request['start']=Carbon::parse($date[0]);
        $request['end']=Carbon::parse($date[1]);
        
        if($request->allDay=='on'){$request['allDay']=true;}
        else{$request['allDay']=false;}
        $event = Schedule::create($request->all());
        return view('schedule.index');
    }
    
    
   // 
   public function edit(string $id) {
    $schedule=Schedule::findOrFail($id);
    return view('schedule.edit', compact('schedule'));
}

public function update(Request $request, $id) {
    
    $scheduleUpdate = Schedule::findOrFail($id);
    $scheduleUpdate->update($request->all());
 
    return redirect()->route('schedule.index');
}

public function destroy($id) {
    $schedule=Schedule::find($id);
    $schedule->delete();
    return redirect()->back();
}

 
    
}
