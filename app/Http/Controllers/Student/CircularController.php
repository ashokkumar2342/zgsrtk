<?php

namespace App\Http\Controllers\student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CircularController extends Controller
{
     public function index()
    {
         return view('student.circular.list');
    }
}