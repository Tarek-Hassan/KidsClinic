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
        
        // -top10 patient visits -> tothe doctor
        // -top10 doctor visits -> tothe Admin 

        if(Auth::user()->role=='2'){
            
            // Display Chart To Doctor
                // to get the topOrder id && count(order) && DesOrder && Limit =10
                $top = Visit::selectRaw("COUNT(*) as count,doctor_id")->groupBy('doctor_id')->orderByDesc('count')->limit(10)->pluck('count','doctor_id');
                // to get the name for each id   in top array 
                $name=User::find(array_keys($top->toArray()))->pluck('name');
                // to get the send number of Ordr for each user in top array 
                $count=array_values($top->toArray());
        }else{
            // Display Chart To Doctor
                // to get the top id && count(order) && DesOrder && Limit =10
                $top = Visit::selectRaw("COUNT(*) as count,patient_id")->groupBy('patient_id')->orderByDesc('count')->limit(10)->pluck('count','patient_id');
                // to get the name for each id   in top array 
                $name=Patient::find(array_keys($top->toArray()))->pluck('name');
                // to get the send number of Ordr for each user in top array 
                $count=array_values($top->toArray());
        }
     // @Male - Female Attendance​_pie_Chart
        //  $visits = Visit::groupBy('patient_id')->selectRaw("COUNT(*) as count")->pluck('count');
        //  return view('statistics.index',compact('visits',));
         return view('statistics.index',compact('count','name'));
     }
}
