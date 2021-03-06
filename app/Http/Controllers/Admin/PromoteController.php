<?php

namespace App\Http\Controllers\Admin;

use App\Center;
use App\ClassFee;
use App\ClassType;
use App\DiscountType;
use App\Http\Controllers\Controller;
use App\PaymentType;
use App\Section;
use App\SectionType;
use App\SessionDate;
use App\Student;
use App\TransportRoute;
use Illuminate\Http\Request;

class PromoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $centers = Center::where('status',1)->get();
        $paymenttypes = array_pluck(PaymentType::get(['id','name'])->toArray(),'name', 'id');
        $classes = array_pluck(ClassType::get(['id','alias'])->toArray(),'alias', 'id');
        $discounts = array_pluck(DiscountType::get(['id','name'])->toArray(),'name', 'id');
        $sessions = array_pluck(SessionDate::get(['id','date'])->toArray(),'date', 'id');
        $routes = array_pluck(TransportRoute::get(['id','name'])->toArray(),'name', 'id');

        return view('admin.promote.form',compact('classes','routes','sessions','centers','paymenttypes','discounts'));
    }
   public function sList()
    {
        $centers = Center::where('status',1)->get();
        $paymenttypes = array_pluck(PaymentType::get(['id','name'])->toArray(),'name', 'id');
        $classes = array_pluck(ClassType::get(['id','alias'])->toArray(),'alias', 'id');
        $discounts = array_pluck(DiscountType::get(['id','name'])->toArray(),'name', 'id');
        $sessions = array_pluck(SessionDate::get(['id','date'])->toArray(),'date', 'id');
        $routes = array_pluck(TransportRoute::get(['id','name'])->toArray(),'name', 'id');

        return view('admin.promote.list',compact('classes','routes','sessions','centers','paymenttypes','discounts'));
    }
    public function promoteList(Request $request)
    {

        $students = Student::where(['center_id'=>$request->center,'session_id'=>$request->session,'class_id'=>$request->class,'section_id'=>$request->section])->get(['name','username','mother_name','dob','mobile_sms','id','father_name']);
         $total = $students->count();
        foreach ($students as $student) {
            $row = '<tr>             
            <td> '.'<input type="checkbox" class="checkbox"   name="student_id[]" value="'.$student->id.'">'.  '</td>
            <td>'.$student->username.'</td>            
            <td>'.$student->name.'</td>            
            <td>'.$student->father_name.'</td>
            <td>'.$student->mother_name.'</td>
            <td>'.$student->dob.'</td>
            <td>'.$student->mobile_sms.'</td>
            ';            
            $row .= '</tr>';
            $options[] = [$row];
        }   
        return response()->json($options); 
      
    }
     public function classBy()
    {
        $centers = Center::where('status',1)->get();
        $paymenttypes = array_pluck(PaymentType::get(['id','name'])->toArray(),'name', 'id');
        $classes = array_pluck(ClassType::get(['id','alias'])->toArray(),'alias', 'id');
        $discounts = array_pluck(DiscountType::get(['id','name'])->toArray(),'name', 'id');
        $sessions = array_pluck(SessionDate::get(['id','date'])->toArray(),'date', 'id');
        $routes = array_pluck(TransportRoute::get(['id','name'])->toArray(),'name', 'id');

        return view('admin.promote.classBy',compact('classes','routes','sessions','centers','paymenttypes','discounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function studentList(Request $request)
    {

        $students = Student::where(['center_id'=>$request->center,'session_id'=>$request->session,'class_id'=>$request->class,'section_id'=>$request->section])->get(['name','id','father_name']);
         
        foreach ($students as $student) {
            $row = '<tr>             
            <td> '.'<input type="checkbox" class="checkbox"   name="student_id[]" value="'.$student->id.'">'.  '</td>
            <td>'.$student->name.'</td>            
            <td>'.$student->father_name.'</td>
            ';            
            $row .= '</tr>';
            $options[] = [$row];
        }   
        return response()->json($options); 
      
    }
    public function studentList2(Request $request)
    {

        $students = Student::where(['center_id'=>$request->center,'session_id'=>$request->session,'class_id'=>$request->class])->get(['name','id','father_name','username','section_id']);
         
        foreach ($students as $student) {
            $row = '<tr>             
            <td> '.'<input type="checkbox" class="checkbox"   name="student_id[]" value="'.$student->id.'">'.  '</td>
            <td>'.$student->sections->name.'</td>
            <td>'.$student->name.'</td>
            <td>'.$student->username.'</td>
            <td>'.$student->father_name.'</td>
            ';            
            $row .= '</tr>';
            $options[] = [$row];
        }   
        return response()->json($options); 
      
    }
     public function search(Request $request)
    {
             
        $section = Section::where(['class_id'=>$request->class_id,'session_id'=>$request->session])->get();
        return response()->json(['section_id'=>$section]);

   
    }
    
    public function feeUpdate($center_id)
    {
        $date = date('Y-m-d');
        $halfYear=date('Y-m-d',strtotime($date ."-150 days"));
        $students = Student::where('center_id',$center_id)->where('created_at', '<=', $halfYear.' 00:00:00')->get();
        foreach ($students as $student) {
            $st=Student::find($student->id);
            
            $classfees=ClassFee::where(['center_id'=>$st->center_id,'session_id'=>$st->session_id,'class_id'=>$st->class_id])->first();

            $bus_fee =0;
            
            if ($st->transport_id !=null) {
                $bus_fee=$classfees->bus_fee*4; 
             } 
             

            $st->annual_charge=$classfees->annual_fee;
            $st->caution_money=$classfees->caution_fee;
            $st->activity_charge=$classfees->activity_charge*4;
            $st->smart_class_fee=$classfees->smart_fee*4;
            $st->exam_fees=$classfees->exam_fees*4;
            $st->tution_fee=$classfees->tution_fee*4;
            $st->sms_charge=$classfees->other_fee*4; 
            $st->transport_fee=$bus_fee;  
            $st->totalFee=  $classfees->annual_fee + $classfees->caution_fee + ($classfees->activity_charge*4) + ($classfees->smart_fee*4) + ($classfees->exam_fees*4) + ($classfees->tution_fee*4) + ($classfees->other_fee*4)              
                 + $bus_fee;                   
            $st->firsttime_fee = $classfees->annual_fee ;

            $st->installment_fee =  $classfees->caution_fee + ($classfees->activity_charge*4) + ($classfees->smart_fee*4) + ($classfees->exam_fees*4) + ($classfees->tution_fee*4) + ($classfees->other_fee*4)+$bus_fee;      
          $st->save();
             
        }
        return 'success';
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $data = $request->except('_token');

         

        $student_count = count($data['student_id']);
        
         
        for($i=0; $i < $student_count; $i++){
 
            $student = Student::find($data['student_id'][$i]);
            $student->id = $data['student_id'][$i];
            $student->class_id = $data['class_id'];
            $student->section_id = $data['section_id'];
            $student->session_id = $data['session_id'];
            $student->save();
            echo $student;
             
        }
      
        return response()->json(['response'=>'OK']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
}
