<?php

namespace App\Http\Controllers\Student;

use App\Center;
use App\Student;
use App\SessionDate;
use App\StudentAttendance;
use App\AttendanceType;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class StudentAttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $students = Auth::guard('student')->user();  
        $attendances = StudentAttendance::where('student_id',Auth::guard('student')->user()->id)->get();     
        // $centers = Center::where('status',1)->get();
        // $sessions = array_pluck(SessionDate::get(['id','date'])->toArray(),'date', 'id');
        // return view('student.attendance.student.view',compact('centers','$students','attendances'));
        // $attendances = StudentAttendance::orderBy('id','desc')->paginate(5);
        //  $student = Auth::guard('student')->user();
        return view('student.attendance.student.view',compact('attendances'));

         

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $students = Student::where(['center_id'=>$request->center,'session_id'=>$request->session,'class_id'=>$request->class,'section_id'=>$request->section])->get(['id','name','father_name','mother_name','class_id','section_id','session_id']); 

        foreach ($students as $student) {
            $row = '<tr><td>'.$student->id.'</td><td>'.$student->name.'</td>';
            foreach(\App\Attendancetype::all() as $attendance){
                $checked = (\App\StudentAttendance::where(['student_id'=>$student->id,'attendance_type_id'=>$attendance->id,'date'=>date('Y-m-d',strtotime($request->date))])->count())?'checked':'';
                      $row .='<td ><label class="radio-inline"><input type="radio" '.$checked.' name="value['.$student->id.']" class="'. str_replace(' ', '_', strtolower($attendance->name)).'" value="'. $attendance->id .'"> '. $attendance->name .' </label></td>';
            }
            $row .= '</tr>';
            $options[] = [$row];
        }   
        return response()->json($options);  
        // return view('admin.attendance.student.list',compact('students'));
    }
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // print_r($request->value);

        foreach ($request->value as $key => $value) {

           $student = StudentAttendance::where(['date'=>date('Y-m-d',strtotime($request->date)),'student_id'=>$key])->firstOrNew(['student_id'=>$key]);
           $student->student_id = $key;
           $student->attendance_type_id = $value;
           $student->date = date('Y-m-d',strtotime($request->date));
           $student->save();
        }
        return response()->json(['response'=>'OK']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StudentAttendance  $studentAttendance
     * @return \Illuminate\Http\Response
     */
    public function show(StudentAttendance $studentAttendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StudentAttendance  $studentAttendance
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentAttendance $studentAttendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StudentAttendance  $studentAttendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentAttendance $studentAttendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StudentAttendance  $studentAttendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentAttendance $studentAttendance)
    {
        //
    }
}
