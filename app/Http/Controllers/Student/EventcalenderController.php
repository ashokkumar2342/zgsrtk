<?php

namespace App\Http\Controllers\Student;

use App\Eventcalender; 
use App\StudentDetails;
use App\ClassType;
use App\SessionDate;
use App\Center; 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;
use Auth;

class EventcalenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = Auth::guard('student')->user(); 
        $eventcalenders =  Eventcalender::where('class_id',$student->class_id)->orderBy('created_at','desc')->paginate(10);
        return view('student.eventcalender.list',compact('eventcalenders'));
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
     * @param  \App\Eventcalender  $eventcalender
     * @return \Illuminate\Http\Response
     */
    public function show(Eventcalender $eventcalender)
    {
        return view('student.eventcalender.show',compact('eventcalender'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Eventcalender  $eventcalender
     * @return \Illuminate\Http\Response
     */
    public function edit(Eventcalender $eventcalender)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Eventcalender  $eventcalender
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Eventcalender $eventcalender)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Eventcalender  $eventcalender
     * @return \Illuminate\Http\Response
     */
    public function destroy(Eventcalender $eventcalender)
    {
        //
    }
}
