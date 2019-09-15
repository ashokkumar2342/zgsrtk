<?php

namespace App\Http\Controllers\Student;

use App\Student;
use App\ClassType;
use App\PaymentType;
use App\SessionDate;
use App\Center;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Storage;
 

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $student = Auth::guard('student')->user();
        // $attendances = StudentAttendance::where('student_id',Auth::guard('student')->user()->id)->get();     
       
        return view('student.student.studentdetails.view',compact('student'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $centers = Center::where('status',1)->get();
        $paymenttypes = PaymentType::where('status',1)->get();
        $classes = array_pluck(ClassType::get(['id','alias'])->toArray(),'alias', 'id');
        $sessions = array_pluck(SessionDate::get(['id','date'])->toArray(),'date', 'id');
        return view('admin.student.studentdetails.add',compact('classes','sessions','centers','paymenttypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        // $this->validate($request,[
        //     'center' => 'required|numeric',
        //     'session' => 'required|numeric',
        //     'class' => 'required|numeric',
        //     "section" => 'required|numeric',
        //     "date_of_admission" => 'required|date',
        //     "student_name" => 'required|max:199',
        //     "father_name" => 'required|max:199',
        //     "mother_name" => 'required|max:199',
        //     "date_of_birth" => 'required|max:199',
        //     "religion" => "required|max:199",
        //     "category" => "required|max:199",
        //     "address" => 'required|max:1000',
        //     "state" => "required|max:199",
        //     "city" => "required|max:199",
        //     "pincode" => 'required|numeric',
        //     "mobile_one" => 'nullable|numeric',
        //     "mobile_two" => 'nullable|numeric',
        //     "mobile_sms" => 'required|numeric',
        //     'student_photo' => 'required|image|mimes:jpeg,bmp,png,gif|between:2,2024',
        //     'total_fee' => 'required|numeric',
        //     'payment_type' => 'required|numeric'
      
        // ]);
        // $file = $request->file('student_photo');
        // $file->store('student/profile');
        // $username = str_random('6');
        // $chars = "abcdefghijklmnopqrstuvwxyz0123456789";
        // $password = bcrypt(substr( str_shuffle( $chars ), 0, 6 ));
        // $student= new Student();
        // $student->username= $username;
        // $student->password= $password;
        // $student->center_id= $request->center;
        // $student->session_id= $request->session;
        // $student->class_id= $request->class;
        // $student->section_id= $request->section;
        // $student->totalFee= $request->total_fee;
        // $student->date_of_admission= date('Y-m-d',strtotime($request->date_of_admission));
        // $student->name= $request->student_name;
        // $student->father_name= $request->father_name;
        // $student->mother_name= $request->mother_name;
        // $student->dob= date('Y-m-d',strtotime($request->date_of_birth));
        // $student->religion= $request->religion;
        // $student->category= $request->category;
        // $student->address= $request->address;
        // $student->state= $request->state;
        // $student->city= $request->city;
        // $student->pincode= $request->pincode;
        // $student->pincode= $request->total_fee;
        // $student->mobile_one= $request->mobile_one;
        // $student->mobile_two= $request->mobile_two;
        // $student->mobile_sms= $request->mobile_sms;
        // $student->payment_type_id= $request->payment_type;
        // $student->picture= $file->hashName();
        // if($student->save()){            
        //     $student->username= 'zgs'.$student->id;
        //     $student->save();
        //     return redirect()->route('admin.student.view',$student->id)->with(['class'=>'success','message'=>'student registration success ...']);
        // }
        // return redirect()->back()->with(['class'=>'error','message'=>'Whoops ! Look like somthing went wrong ..']);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StudentDetails  $studentDetails
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {       
        $student = Auth::guard('student')->user(); 
        return view('student.student.studentdetails.view',compact('student'));
    }

    public function feedetails(Student $student)
    {       
        $student = Auth::guard('student')->user(); 
        return view('student.feedetails.list',compact('student'));
    }

     public function image($image){
        $img = Storage::disk('student')->get('profile/'.$image);
        return response($img);
    }
    
    public function imageUpdate(Request $request, Student $student){
         $this->validate($request,[
      
            'student_photo' => 'required|image|mimes:jpeg,bmp,png,gif|between:2,2024',
           
        ]);
             

        $file = $request->file('student_photo');
        $file->store('student/profile');
        $student->picture = $file->hashName();
        if($student->save()){   
            return redirect()->back()->with(['class'=>'success','message'=>'student Updated Image success ...']);
        }
        return redirect()->back()->with(['class'=>'error','message'=>'Whoops ! Look like somthing went wrong ..']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StudentDetails  $studentDetails
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $studentDetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StudentDetails  $studentDetails
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $studentDetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StudentDetails  $studentDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $studentDetails)
    {
        //
    }
}
