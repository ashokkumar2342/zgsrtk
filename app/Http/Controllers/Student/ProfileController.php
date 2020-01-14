<?php
namespace App\Http\Controllers\Student;

 
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Student;
use Hash;
use Auth;
 


 class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         
        return view('student.profile.changepassword');
    
        
    }
    
     public function update(Request $request)
    {
        //
        $this->validate($request,[
            'current_password' => 'required|min:6',
            'new_password' => 'required|min:6|confirmed',
            'new_password_confirmation' => 'required|min:6|'

        ]);
        if(Hash::check($request->current_password, Auth::guard('student')->user()->password)) {
            $user = Auth::guard('student')->user();
            $user->password = bcrypt($request->new_password);
            if($user->save()){
                return redirect()->back()->with(['message'=>'Password changed successfully...','class'=>'success']);
            }
            return redirect()->back()->with(['message'=>'Whoops, looks like something went wrong ! Try again ...','class'=>'danger']);
        }
        return redirect()->back()->withErrors(['current_password'=>'Your current Password do not match']);
    }

 }   