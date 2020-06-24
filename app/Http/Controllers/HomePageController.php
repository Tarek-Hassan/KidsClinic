<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables ; 
use App\Patient;
use App\Visit;
use App\Article;
use Illuminate\Support\Facades\Auth;

class HomePageController extends Controller
{
    //
    public function invoice(Request $request) {
        $id=Auth::user()->patient_id;
        $patient=Patient::findOrFail($id);
            if ($request->ajax()) {
                $data = Visit::where('patient_id',$id)->get();
              
                
                return Datatables($data)
                        ->addColumn('date', function($row){
                            return $row->created_at->format('D, dMY, h:m a');
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

        return view('home.invoice', compact('patient'));
    }  


    
    public function index(){
        return view('home.home');
    }
    
    public function articles(){
        $articles=Article::orderBy('created_at', 'desc')->paginate(10);
        return view('home.articles',compact('articles'));
    }
}
