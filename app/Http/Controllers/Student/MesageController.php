<?php

namespace App\Http\Controllers\Student;

use App\Mesage;
use App\StudentDetails;
use App\ClassType;
use App\SessionDate;
use App\Center;
use App\HomeWork;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class MesageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $student = Auth::guard('student')->user();

          $mesages =  Mesage::where('class_id',$student->class_id)->where('section_id',$student->section_id)->orderBy('created_at','desc')->paginate(10);
          return view('student.mesage.list',compact('mesages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mesage  $mesage
     * @return \Illuminate\Http\Response
     */
    public function show(Mesage $mesage)
    {
      
        return view('student.mesage.view',compact('mesage'));        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mesage  $mesage
     * @return \Illuminate\Http\Response
     */
    public function edit(Mesage $mesage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mesage  $mesage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mesage $mesage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mesage  $mesage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mesage $mesage)
    {
        //
    }
}
