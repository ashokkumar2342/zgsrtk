<?php

namespace App\Http\Controllers\Student;

use App\Datesheet;
use App\StudentDetails;
use App\ClassType;
use App\SessionDate;
use App\Center; 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;
use Auth;

class DatesheetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = Auth::guard('student')->user(); 
        $datesheets =  Datesheet::where('class_id',$student->class_id)->orderBy('created_at','desc')->paginate(10);
        return view('student.datesheet.list',compact('datesheets'));
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
     * @param  \App\Datesheet  $datesheet
     * @return \Illuminate\Http\Response
     */
    public function show(Datesheet $datesheet)
    {
        return view('student.datesheet.show',compact('datesheet'));        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Datesheet  $datesheet
     * @return \Illuminate\Http\Response
     */
    public function edit(Datesheet $datesheet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Datesheet  $datesheet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Datesheet $datesheet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Datesheet  $datesheet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Datesheet $datesheet)
    {
        //
    }
}
