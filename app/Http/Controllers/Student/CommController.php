<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommController extends Controller
{
     public function index()
    {
         return view('student.communicate.list');
    }
}
