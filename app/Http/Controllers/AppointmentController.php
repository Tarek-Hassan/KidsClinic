<?php

namespace App\Http\Controllers;

use App\Appointment;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables ; 
use Illuminate\Support\Facades\Auth;


class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            if((Auth::user()->role) == '2'){
                $data = Appointment::latest()->get();
            }else{
                $data = Appointment::where('user_id',Auth::user()->id)->get();
            }
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('dept',function($row){
                     return $row->dept();
                })
                    ->addColumn('checked',function($row){
                        if($row->checked == 0 ){
                            return 'Refuse';
                        }
                        else{
                            return 'Accepte';
                        }
                     
                })
                    ->addColumn('action', function($row){
                        $button = '&nbsp;&nbsp;&nbsp;<a href="/appointment/'.$row->id.'/edit" class="edit btn btn-secondary btn-sm m-1"><i class="fas fa-pencil-alt">
                        </i> Edit</a>';
                        // $button .= '&nbsp;&nbsp;&nbsp;<a href="/appointment/'.$row->id.'" class="edit btn btn-info btn-sm m-1"><i class="fas fa-eye"></i> Show</a>';
                        // $button .= '&nbsp;&nbsp;&nbsp;<a href="/admin/visits/create/'.$row->id.'" class="edit btn btn-success btn-sm m-1"> new Visit</a>';
                        $button .= '&nbsp;&nbsp;&nbsp;<a  data-id="'.$row->id.'" class="del btn btn-danger btn-sm m-1 "  data-toggle="modal"data-target="#delete"><i class="fas fa-trash">
                        </i> Delete</a>';
                        return $button;
                    })

                    ->rawColumns(['action'])

                    ->make(true);
        }
        return view('appointments.index');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['user_id']=Auth::user()->id;
        $appointment=Appointment::create($request->all());
        return redirect()->route('appointments.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $appointment=Appointment::findOrFail($id);
        return view('appointments.edit',compact('appointment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $appointment=Appointment::findOrFail($id);
        $appointment->update($request->all());
      
        return redirect()->route('appointments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $appointment=Appointment::findOrFail($id);
        $appointment->delete();
        return redirect()->route('appointments.index');
    }
}
