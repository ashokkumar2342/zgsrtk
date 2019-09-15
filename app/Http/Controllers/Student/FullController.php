<?php

namespace App\Http\Controllers\student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FullController extends Controller
{
     public function index()
    {
         return view('student.calendar.calendar');
    }

}
