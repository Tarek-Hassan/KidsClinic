<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    //
  public function notifySchedule() {
      dd('l,;l');
        $id=Auth::user()->id;
        $user = \App\User::find($id);
        $schedules = \App\Schedule::whereDate('start', '=', now()->toDateString())->get();
       foreach ($schedules as $schedule) {
           $user->notify(new \App\Notifications\ScheduleNotification($schedule));
       }
        return redirect()->route('admin');
    }

    public function markAll(){   
        auth()->user()->unreadNotifications->markAsRead();
        return redirect()->back();
    
    }
}
