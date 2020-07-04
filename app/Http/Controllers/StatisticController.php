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
             $countAge=0;$age=0;
        }else{
            // Display Chart To Doctor ->TOP 10 Patient
                // to get the top id && count(order) && DesOrder && Limit =10
                $top = Visit::selectRaw("COUNT(*) as count,patient_id")->groupBy('patient_id')->orderByDesc('count')->limit(10)->pluck('count','patient_id');
                // to get the name for each id   in top array 
                $name=Patient::find(array_keys($top->toArray()))->pluck('name');
                // to get the send number of Ordr for each user in top array 
                $count=array_values($top->toArray());

            // Display Chart To Doctor ->TOP 10 Age 
                // to get the top geA && count(age) && DesOrder && Limit =5
                $topAge = Patient::selectRaw("COUNT(*) as count,age")->groupBy('age')->orderByDesc('count')->limit(5)->pluck('count','age');
                // to get the age => keys 
                $age=array_keys($topAge->toArray());
                // to get the count(age) => values
                $countAge=array_values($topAge->toArray());
            }
           
            return view('statistics.index',compact('count','name','countAge','age'));
         
     }
}
