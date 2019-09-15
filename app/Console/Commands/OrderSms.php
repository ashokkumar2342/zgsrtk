<?php

namespace App\Console\Commands;

use App\Events\SendSmsEvent;
use Event;
use App\Order;
use App\Student;
use App\StudentAttendance;
use Illuminate\Support\Facades\Log;
use Illuminate\Console\Command;
class OrderSms extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'order:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send order detail to admin by sms';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
       
        if(\Carbon\Carbon::now()->format('H:i') == '08:00'){
             $students= Student::whereMonth('dob','=',\Carbon\Carbon::today()->month)->whereDay('dob','=',\Carbon\Carbon::today()->day)->get();
             foreach($students as $student){
                 Event::fire(new SendSmsEvent($student->mobile_sms,'Dear student, ZAD Global School wish you very happy birthday.'));
                 Log::info('Dear student, ZAD Global School wish you very happy birthday.'.$student->mobile_sms);
                
             }
         }
         //if(\Carbon\Carbon::now()->format('H:i') == '13:00'){
              $students= StudentAttendance::where('attendance_type_id',2)->whereDate('created_at',date('Y-m-d'))->get();
              foreach($students as $student){
                 // Event::fire(new SendSmsEvent($student->mobile_sms,'Dear Parents, Your Child is Today Absent.'));
                  Log::info('Dear Parents, Your Child is Today Absent.'.$student->mobile_sms);
                 
              }
          //}

    }
}
