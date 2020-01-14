<?php

namespace App\Console\Commands;

use App\Events\SendSmsEvent;
use App\HomeWork;
use App\Student;
use Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Event;

class HomeworkSend extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'homework:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Homewerk';

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
        $date = Carbon\Carbon::today();

        $homeworks= HomeWork::whereDate('created_at',$date)->get(); 
        foreach ($homeworks as  $homework) {
             $students =Student::where(['center_id'=>$homework->center_id,'section_id'=>$homework->section_id,'class_id'=>$homework->class_id,'session_id'=>$homework->session_id])->get();
             foreach ($students as $student) {
                Event::fire(new SendSmsEvent($student->mobile_sms,$homework->homework)); 
             }
            
        }
        
    }
}
