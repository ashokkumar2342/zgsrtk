<?php

namespace App\Http\Controllers\Student;

use App\Syllabus; 
use App\StudentDetails;
use App\ClassType;
use App\SessionDate;
use App\Center;
use App\HolidayHomework;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;
use Auth;

class SyllabusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $student = Auth::guard('student')->user(); 
          $syllabuses =  Syllabus::where('center_id',$student->center_id)->where('class_id',$student->class_id)->orderBy('created_at','desc')->paginate(10);
        return view('student.syllabus.list',compact('syllabuses')); 
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
     * @param  \App\Syllabus  $syllabus
     * @return \Illuminate\Http\Response
     */
    public function show(Syllabus $syllabus)
    {
        return view('student.syllabus.show',compact('syllabus'));        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Syllabus  $syllabus
     * @return \Illuminate\Http\Response
     */
    public function edit(Syllabus $syllabus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Syllabus  $syllabus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Syllabus $syllabus)
    {
        //
    }
    public function download(Syllabus $syllabus)
    {
         
       // return view('admin.holidayhomework.show',compact('holidayhomework'));
       $path = public_path('uploads\holidayhomework/'.$syllabus->syllabus);

       return response()->download($path);
           
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Syllabus  $syllabus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Syllabus $syllabus)
    {
        //
    }
}
