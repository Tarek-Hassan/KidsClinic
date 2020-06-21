<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables ; 
use App\Patient;
use App\Visit;
use App\Http\Requests\Patient\UpdatePatientRequest;
use App\Http\Requests\Patient\StorePatientRequest;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
      
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Patient::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()

                    ->addColumn('blood_type', function($row){
                        return $row->bloodType();
                    })
                    ->addColumn('date', function($row){
                        if( $row->created_at){
                            return $row->created_at->format('D, dMY, h:m a');
                        }else{
                            return 'Unkown Date';
                        }
                        
                    })
                    ->addColumn('birth_type', function($row){
                        
                        return $row->birthType();
                        
                        
                    })
                    ->addColumn('doctor_id', function($row){
                        return $row->user->name;
                    })
                    ->addColumn('action', function($row){
                        $button = '&nbsp;&nbsp;&nbsp;<a href="/admin/patients/'.$row->id.'/edit" class="edit btn btn-secondary btn-sm m-1">Edit</a>';
                        $button .= '&nbsp;&nbsp;&nbsp;<a href="/admin/patients/'.$row->id.'" class="edit btn btn-success btn-sm m-1"> Show</a>';
                        // $button .= '&nbsp;&nbsp;&nbsp;<a href="/admin/visits/create/'.$row->id.'" class="edit btn btn-success btn-sm m-1"> new Visit</a>';
                        $button .= '&nbsp;&nbsp;&nbsp;<a  data-id="'.$row->id.'" class="del btn btn-danger btn-sm m-1 "  data-toggle="modal"data-target="#delete">Delete</a>';
                        return $button;
                    })

                    ->rawColumns(['action'])

                    ->make(true);
        }
        return view('patients.index');
    }

    
    public function create() {
        return view('patients.create');
    } 
    public function show(Request $request,$id) {
        $patient=Patient::findOrFail($id);
            if ($request->ajax()) {
                $data = Visit::where('patient_id',$id)->get();
              
                
                return Datatables($data)
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
                            $button = '&nbsp;&nbsp;&nbsp;<a href="/admin/visits/'.$row->id.'/edit" class="edit btn btn-secondary btn-sm m-1">Edit</a>';
                            $button .= '&nbsp;&nbsp;&nbsp;<a  data-id="'.$row->id.'" class="del btn btn-danger btn-sm m-1 "  data-toggle="modal"data-target="#delete">Delete</a>';
                            return $button;
                        })
    
                        ->rawColumns(['action'])
    
                        ->make(true);
            }

        return view('patients.show', compact('patient'));
    }  

    
    public function store(StorePatientRequest $request) {
 

        // $request['avatar']=Storage::disk('public')->put('images',$request->profile);
        $request['doctor_id']=Auth::user()->id;
        $user=Patient::create($request->all());
        return redirect()->route('patients.index');
    
    }   
        
    
    public function edit(string $id) {
        $patient=Patient::findOrFail($id);
        return view('patients.edit', compact('patient'));
    }

    public function update(UpdatePatientRequest $request, $id) {
   
  

        $userUpdate = Patient::findOrFail($id);
        $userUpdate->update($request->all());
        $userUpdate->fresh();
        return redirect()->route('patients.index');
    }

    public function destroy($id) {
        $users=Patient::find($id);
        // Storage::disk('public')->delete($users->avatar);
        $users->delete();
        return redirect()->back();
    }



}