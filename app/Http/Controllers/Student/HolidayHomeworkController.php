<?php

namespace App\Http\Controllers\Student;

use App\StudentDetails;
use App\ClassType;
use App\SessionDate;
use App\Center;
use App\HolidayHomework;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;
use Auth;


class HolidayHomeworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $student = Auth::guard('student')->user(); 

        $holidayhomeworks =  HolidayHomework::where('center_id',$student->center_id)->where('class_id',$student->class_id)->orderBy('created_at','desc')->paginate(10);
        
        return view('student.holidayhomework.list',compact('holidayhomeworks'));
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
         
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HolidayHomework  $holidayHomework
     * @return \Illuminate\Http\Response
     */
    public function show(HolidayHomework $holidayhomework)
    {
        // dd($holidayhomework->all());
        return view('student.holidayhomework.show',compact('holidayhomework'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HolidayHomework  $holidayHomework
     * @return \Illuminate\Http\Response
     */
    public function edit(HolidayHomework $holidayHomework)
    {
        
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HolidayHomework  $holidayHomework
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HolidayHomework $holidayHomework)
    {
        //
    }
    public function download(HolidayHomework $holidayhomework)
    {
        // return view('admin.holidayhomework.show',compact('holidayhomework'));
        $path = public_path('uploads\holidayhomework/'.$holidayhomework->holiday_homework);

        return response()->download($path);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HolidayHomework  $holidayHomework
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, HolidayHomework $holidayHomework)
    {
        if ($holidayHomework->delete()) {
        return redirect()->back()->with(['class'=>'success','message'=>' file Deleted success ...']);
             
        }
        return redirect()->back()->with(['class'=>'error','message'=>'Whoops ! Look like somthing went wrong ..']);
       

        
        
    }
}
