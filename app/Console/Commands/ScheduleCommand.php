<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;

class ScheduleCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'schedule:notiy';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This Command use to Schedule Notification to each doctor at 9:am';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    // private $id;
    public function __construct()
    {
        // $this->id;
        // dd(Auth::user()->id);

        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        
        
            // can't use Auth here ->because this is before create the session
            $users = \App\User::where('role','2')->get();
            foreach ($users as $user) {
                    $schedules = \App\Schedule::whereDate('start', '=', now()->toDateString())->get();
                   foreach ($schedules as $schedule) {
                       $user->notify(new \App\Notifications\ScheduleNotification($schedule));
                   }
            }
        
    }
}
