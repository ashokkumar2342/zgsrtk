<?php

namespace App\Http\Controllers\Student;
use App\Student;
use App\ClassType;
use App\PaymentType;
use App\SessionDate;
use App\Center;
use App\StudentAttendance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
 

class DashboardController extends Controller
{
    public function index(){
        // $attendances = StudentAttendance::where('student_id',Auth::guard('student')->user()->id)->get();     

        $student = Auth::guard('student')->user();
        return view('student.dashboard',compact('student',compact('$attendances')));

    }
}
