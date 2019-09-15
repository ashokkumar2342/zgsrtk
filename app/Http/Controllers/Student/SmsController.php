<?php

namespace App\Http\Controllers\Admin;

use App\SessionDate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SmsController extends Controller
{
    //
    public function homeworkForm(){
    	$sessions = array_pluck(SessionDate::get(['id','date'])->toArray(),'date', 'id');
    	return view('admin.sms.homework.form',compact('sessions'));
    }
    
}
