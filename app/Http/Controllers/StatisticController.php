<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Visit;
use App\Patient;
use Illuminate\Support\Facades\Auth;

class StatisticController extends Controller
{


     public function index()
     {
        $countAge=0;$age=0;
         /**
          * Display Chart
          *     1)Admin
          *         -Top10 doctor visits  
          *     2)Doctor
          *         -Top10 patient visits 
          *         -Top Age to the patient 
         **/
         if(Auth::user()->role=='2'){
             $top = Visit::selectRaw("COUNT(*) as count,doctor_id")->groupBy('doctor_id')->orderByDesc('count')->limit(10)->pluck('count','doctor_id');
             $name=User::find(array_keys($top->toArray()))->pluck('name');
             $count=array_values($top->toArray());
             
        }else{

                $top = Visit::selectRaw("COUNT(*) as count,patient_id")->groupBy('patient_id')->orderByDesc('count')->limit(10)->pluck('count','patient_id');
            
                $name=Patient::find(array_keys($top->toArray()))->pluck('name');
                $count=array_values($top->toArray());


                $topAge = Patient::selectRaw("COUNT(*) as count,age")->groupBy('age')->orderByDesc('count')->limit(5)->pluck('count','age');
                $age=array_keys($topAge->toArray());
                $countAge=array_values($topAge->toArray());
            }
           
            return view('statistics.index',compact('count','name','countAge','age'));
         
     }
}
