<?php

namespace App\Http\Controllers\Student\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Event;
use App\Events\SendSmsEvent;

use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

use App\Student;
use App\StudentDetails;
use Auth;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */


    public function showResetForm(){
        return view('student.auth.resetForm');
    }

     public function passwordSend(Request $request){
        if($request->otp){
            $this->validate($request,[
                'mobile' => 'required|numeric',
                'captcha' => 'required|captcha',
                'otp' => 'required|numeric',
            ]);
            $student = Student::where(['mobile_sms'=>$request->mobile,'otp'=>$request->otp]);
            if($student->count()){
                $password = substr( str_shuffle( "abcdefghijklmnopqrstuvwxyz0123456789" ), 0, 6 );
                $message = 'Your new password is '.$password;
               $save= $student->update(['password'=>bcrypt($password),'tmp_pass'=>$password]);
                if($save){
                    Event::fire(new SendSmsEvent($student->first()->mobile_sms,$message));
                    
                    return redirect()->route('student.login.form')->with(['class'=>'success','message'=>'Password reset success ...']);
                }
                return redirect()->route('student.login.form')->with(['class'=>'error','message'=>'Whoops ! Look like somthing went wrong ..']);
                
                
                
                
                
                
                
            }
        }
        else{
            $this->validate($request,[
                'mobile' => 'required|numeric',
                'captcha' => 'required|captcha',
            ]);
            $student = Student::where(['mobile_sms'=>$request->mobile]);   
            if($student->count()){
                $otp= rand(1000,9999);
                $student->update(['otp' => $otp]);
                return view('student.auth.resetForm',compact('otp'));
            }
           return view('student.auth.resetForm',compact('otp'))->with(['class'=>'success','message'=>'Invalid OTP !']);
        }
            dd($request->all());
        return redirect()->route('student.login.form')->with(['class'=>'success','message'=>'sms send successfully ...']);
        
     

    }   



     protected function guard()
    {
        return Auth::guard('student');
    }
}
