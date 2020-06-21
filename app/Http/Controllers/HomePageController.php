<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables ; 
use App\Patient;
use App\Visit;
use Illuminate\Support\Facades\Auth;

class HomePageController extends Controller
{
    //
    public function invoice(Request $request) {
        $id=Auth::user()->id;
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
                        ->make(true);
            }

        return view('home.invoice', compact('patient'));
    }  


    
    public function index(){
        return view('home.home');
    }
}
