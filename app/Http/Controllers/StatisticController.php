<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Visit;
use App\Patient;

class StatisticController extends Controller
{
    //
     //(​ Male - Female Attendance​ ) ​ pie chart
     public function index()
     {
     // @TOP_Order_users_pie_Chart
 
         // to get the topOrder id && count(order) && DesOrder && Limit =10
         $topOrder = Visit::selectRaw("COUNT(*) as count,patient_id")->groupBy('patient_id')->orderByDesc('count')->limit(10)->pluck('count','patient_id');
         // to get the name for each id   in topOrder array 
         $patientName=Patient::find(array_keys($topOrder->toArray()))->pluck('name');
         // to get the send number of Ordr for each user in topOrder array 
         $countPatient=array_values($topOrder->toArray());
     // @Male - Female Attendance​_pie_Chart
        //  $visits = Visit::groupBy('patient_id')->selectRaw("COUNT(*) as count")->pluck('count');
        //  return view('statistics.index',compact('visits',));
         return view('statistics.index',compact('countPatient','patientName'));
     }
}
