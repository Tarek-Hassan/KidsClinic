<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables ; 
use App\Patient;
use App\Http\Requests\Patient\UpdatePatientRequest;
use App\Http\Requests\Patient\StorePatientRequest;
use App\Visit;
use Illuminate\Support\Facades\Auth;

class VisitController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            if((Auth::user()->role) == '2'){
                $data = Visit::latest()->get();
            }else{
                $data = Visit::where('doctor_id',Auth::user()->id)->get();
            }
            return Datatables::of($data)
                    ->addColumn('date', function($row){
                    if( $row->created_at){
                        return $row->created_at->format('D, dMY, h:m a');
                    }else{
                        return 'Unkown Date';
                    }
                    })
                    ->addColumn('patient_id', function($row){
                        return $row->patient->name;
                    })
                    ->addColumn('doctor_id', function($row){
                        return $row->user->name;
                    })
                    ->addColumn('action', function($row){
                        $button = '&nbsp;&nbsp;&nbsp;<a href="/admin/visits/'.$row->id.'/edit" class="edit btn btn-secondary btn-sm m-1"><i class="fas fa-pencil-alt">
                        </i> Edit</a>';
                        $button .= '&nbsp;&nbsp;&nbsp;<a  data-id="'.$row->id.'" class="del btn btn-danger btn-sm m-1 "  data-toggle="modal"data-target="#delete"><i class="fas fa-trash">
                        </i> Delete</a>';
                        return $button;
                    })

                    ->rawColumns(['action'])

                    ->make(true);
        }
        return view('visits.index');
    }

    // public function showDetails(Request $request,$id)
    // {
    //     if ($request->ajax()) {
    //         $data = Visit::where('patient_id',$id)->get();
            
    //         return Datatables::of($data)
    //                 ->addColumn('date', function($row){
    //                 if( $row->created_at){
    //                     return $row->created_at->format('D, dMY, h:m a');
    //                 }else{
    //                     return 'Unkown Date';
    //                 }
    //                 })
    //                 ->addColumn('patient_id', function($row){
    //                     return $row->patient->name;
    //                 })
    //                 ->addColumn('doctor_id', function($row){
    //                     return $row->user->name;
    //                 })
    //                 ->addColumn('action', function($row){
    //                     $button = '&nbsp;&nbsp;&nbsp;<a href="/admin/visits/'.$row->id.'/edit" class="edit btn btn-secondary btn-sm m-1">Edit</a>';
    //                     $button .= '&nbsp;&nbsp;&nbsp;<a  data-id="'.$row->id.'" class="del btn btn-danger btn-sm m-1 "  data-toggle="modal"data-target="#delete">Delete</a>';
    //                     return $button;
    //                 })

    //                 ->rawColumns(['action'])

    //                 ->make(true);
    //     }
    //     return view('visits.index');
    // }

    
    public function create($id) {
        $patient=Patient::findOrFail($id);
        return view('visits.create',compact('patient'));
    }   

    
    // public function store(StorePatientRequest $request) {
    public function store(Request $request,$id){
        $patient=Patient::findOrFail($id);
        $request['doctor_id']=Auth::user()->id;
        $patient->visits()->create($request->all());
        return redirect()->route('visits.index');
    
    }   
        
    

}
