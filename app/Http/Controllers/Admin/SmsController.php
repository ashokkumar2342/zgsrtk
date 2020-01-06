<?php

namespace App\Http\Controllers\Admin;

use App\SessionDate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Event;
use App\Events\SendSmsEvent;
use App\Center;
use App\Student; 
use App\StudentAttendance;
use App\HomeWork;
use App\Mesage;


class SmsController extends Controller
{
    //
    public function homeworkForm(){
        $centers = Center::where('status',1)->get();

        $sessions = array_pluck(SessionDate::get(['id','date'])->toArray(),'date', 'id');
        return view('admin.sms.homework.form',compact('sessions','centers'));
    }
    public function homeworkSend(Request $request){

        $homework = \App\HomeWork::findOrFail($request->homeworkId);
         
        $students =  \App\Student::where(['students.center_id'=>$request->center,'students.section_id'=>$request->section,'students.class_id'=>$request->class,'students.session_id'=>$request->session])
                                ->distinct('mobile')
                                ->join('class_types','students.class_id','=','class_types.id')
                                ->join('sections','students.section_id','=','sections.id')
                                ->get(['students.name','students.mobile_sms','class_types.name as class','sections.name as section']);
                            foreach ($students as $student) {
                                $message = 'Dear Parents, '.  'Name: '.$student->name.', Class: '.$student->class.', Section: '.$student->section.', Date: '.$homework->created_at->format('d-m-y').', Homework: '.$homework->homework;
                                $mobile = $student->mobile_sms;
                                
                                Event::fire(new SendSmsEvent($mobile,$message));
                            }
                    return redirect()->back()->with(['class'=>'success','message'=>'sms send HomeWork successfully ...']);
    }

     public function homeworksms(Request $request){
        
        $homework= \App\HomeWork::find($request->id); 
        $datas = \App\HomeWork::where('id',$homework->id)->get(); 
         
        foreach ($datas as $data) {
        $students =  \App\Student::where(['students.center_id'=>$data->center_id,'students.section_id'=>$data->section_id,'students.class_id'=>$data->class_id,'students.session_id'=>$data->session_id])
                                ->distinct('mobile')
                                ->join('class_types','students.class_id','=','class_types.id')
                                ->join('sections','students.section_id','=','sections.id')
                                ->get(['students.name','students.mobile_sms','class_types.name as class','sections.name as section']);
                            foreach ($students as $student) {
                                $message = 'Dear Parents, '.  'Name: '.$student->name.', Class: '.$student->class.', Section: '.$student->section.', Date: '.$homework->created_at->format('d-m-y').', Homework: '.$homework->homework;
                                $mobile = $student->mobile_sms;
                                if ($homework->status == 1) {
                                  Event::fire(new SendSmsEvent($mobile,$message));
                                }
                                
                            }
                             $data = ($homework->status == 1)?['status' => 0, 'addClass' => 'btn-danger', 'removeClass' => 'btn-success','message'=>'User deactivated ...', 'text' => 'Inactive', ]:['status' => 1, 'addClass' => 'btn-success', 'removeClass' => 'btn-danger', 'message'=>'User activated ...', 'text' => 'Active', ]; 
        $homework->status = $data['status'];
        $homework->save();
        return response(['class'=>'success','message'=>'sms send HomeWork successfully ...']);

        }
    }

    
    public function customizedForm()
    {
        $centers = Center::where('status',1)->get();
        $sessions = array_pluck(SessionDate::get(['id','date'])->toArray(),'date', 'id');
        return view('admin.sms.customized.form',compact('centers','sessions'));
    }
     public function classsmsForm()
    {
        $centers = Center::where('status',1)->get();
        $sessions = array_pluck(SessionDate::get(['id','date'])->toArray(),'date', 'id');
        return view('admin.sms.customized.classform',compact('centers','sessions'));
    }
     public function classsms(Request $request){
        $centers = Center::where('status',1)->get();       
        $students =  \App\Student::where(['students.center_id'=>$request->center,'students.class_id'=>$request->class,'students.session_id'=>$request->session])
                                ->distinct('mobile')
                                ->join('class_types','students.class_id','=','class_types.id')
                                ->get(['students.name','students.mobile_sms','class_types.name as class']);
                            foreach ($students as $student) {                                
                                $mobile = $student->mobile_sms;
                                $message=$request->message;                                
                                Event::fire(new SendSmsEvent($mobile,$message));
                            }
        return redirect()->back()->with(['class'=>'success','message'=>'sms send successfully ...']);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        // $students = Student::where(['center_id'=>$request->center,'session_id'=>$request->session,'class_id'=>$request->class,'section_id'=>$request->section])->get(['id','name','father_name','mother_name','mobile_sms','class_id','section_id','session_id']); 

        // foreach ($students as $student) {
        //     $row = '<tr>
        //     <td>'.$student->id.'</td>
        //     <td>'.$student->name.'</td>
        //     <td>'.$student->father_name.'</td>            
        //     <td>'.$student->mobile_sms.'</td>';
            
        //     $row .= '</tr>';
        //     $options[] = [$row];
        // }   
        // return response()->json($options);  
        // return view('admin.attendance.student.list',compact('students'));
    }

    public function customizedsms(Request $request){

        // $centers = Center::where('status',1)->get();
        // dd($request->all());
        $data = new Mesage();
        $data->center_id = $request->center;
        $data->session_id = $request->session;
        $data->class_id = $request->class;
        $data->section_id = $request->section;
        $data->mesage = $request->message;

        $data->save();

       
        $students =  \App\Student::where(['students.center_id'=>$request->center,'students.section_id'=>$request->section,'students.class_id'=>$request->class,'students.session_id'=>$request->session])
                ->distinct('mobile')
                ->join('class_types','students.class_id','=','class_types.id')
                ->join('sections','students.section_id','=','sections.id')
                ->get(['students.name','students.mobile_sms','class_types.name as class','sections.name as section']);
            foreach ($students as $student) {                                
                $mobile = $student->mobile_sms;
                $message=$request->message;
                  // dd($mobile,$message);
                Event::fire(new SendSmsEvent($mobile,$message));
            }

        return redirect()->back()->with(['class'=>'success','message'=>'sms send successfully ...']);

    }

    public function allsmsForm()
    {
        $centers = Center::where('status',1)->get();
        $sessions = array_pluck(SessionDate::get(['id','date'])->toArray(),'date', 'id');
        return view('admin.sms.customized.allsms',compact('centers','sessions'));
    }

    public function allsms(Request $request){
       
        $students =  \App\Student::where(['students.center_id'=>$request->center,'students.session_id'=>$request->session])
        ->distinct('mobile')
        ->join('class_types','students.class_id','=','class_types.id')
        ->join('sections','students.section_id','=','sections.id')
        ->get(['students.name','students.mobile_sms','class_types.name as class','sections.name as section']);
    foreach ($students as $student) {                                
        $mobile = $student->mobile_sms;
        $message=$request->message;
          // dd($mobile,$message);
        Event::fire(new SendSmsEvent($mobile,$message));
    }
     return redirect()->back()->with(['class'=>'success','message'=>'sms send successfully ...']);
    }
    public function smsForm()
    {        
        return view('admin.sms.customized.sms');
    }

    public function smsSend(Request $request){    
        $mobile = $request->mobile;
        $message = $request->message;         
        Event::fire(new SendSmsEvent($mobile,$message));
   
    return redirect()->back()->with(['class'=>'success','message'=>'sms send successfully ...']);
    }  

    public function onlyclassForm()
    {        
        $centers = Center::where('status',1)->get();
        $sessions = array_pluck(SessionDate::get(['id','date'])->toArray(),'date', 'id');
        return view('admin.sms.customized.onlyclassform',compact('centers','sessions'));
    }

    public function onlyclass(Request $request){    
        dd($request->all());
   
    // return redirect()->back()->with(['class'=>'success','message'=>'sms send successfully ...']);
    }                  
       
        
   
}
