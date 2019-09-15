<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Remark;
use App\ReplyRemark;
use Illuminate\Http\Request;
use auth;

class RemarksController extends Controller
{
     public function index()
    {
    	$student = Auth::guard('student')->user();

    	$remarks = Remark::where('student_id',$student->id)->orderBy('created_at','desc')->paginate(10);
         return view('student.remarks.list',compact('remarks'));
    }

    public function store(Request $request)
    {
    	 $this->validate($request,[
            'remarks' => 'required|max:198',
             
            ]);
    	$student = Auth::guard('student')->user();
     
    	$remarks = new Remark();
    	$remarks->remarks = $request->remarks;
    	$remarks->student_id = $student->id;    	
    	$remarks->center_id = $student->center_id;
    	$remarks->session_id = $student->session_id;    	
    	$remarks->class_id = $student->class_id;
    	$remarks->section_id = $student->section_id;


    	if ($remarks->save()) {
    		return redirect()->route('student.remarks.list')->with(['message'=>' remaks send successfully','class'=>'success']);
    	}
         
    }
    public function show(Remark $remark)
    {
        $replyRemarks = ReplyRemark::where('remark_id',$remark->id)->orderBy('created_at','desc')->get();
        return view('student.remarks/reply_remark', compact('replyRemarks'));
    }

    public function destroy(Remark $remark)
    {

     //    if ($remark->delete()) {
    	// 	return redirect()->route('student.remarks.list')->with(['message'=>' remaks Delete successfully','class'=>'danger']);
    	// }
    	if ($remark->delete()) {
           
           return redirect()->route('student.remarks.list')->with(['class'=>'danger','message'=>'Remarks Delete successfully']);
       }else {
           return redirect()->back()->with(['class'=>'error','message'=>'Whoops ! Look like somthing went wrong ..']);
       }
    }
}
