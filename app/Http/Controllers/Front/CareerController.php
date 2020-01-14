<?php

namespace App\Http\Controllers\Front;

use App\Career;
use App\ClassType;
use App\DiscountType;
use App\Enquiry;
use App\Http\Controllers\Controller;
use App\Mail\CareerMail;
use App\Mail\EnquiryMail;
use App\PaymentType;
use App\SessionDate;
use App\TransportRoute;
use Illuminate\Http\Request;
use Mail;

class CareerController extends Controller
{
     public function index()
    {
     
        return view('front.career');
    
    }

     public function enquiry()
    {
     
        return view('front.enquiry');
    
    }
       public function enquiry2()
    {
     
         

        $paymenttypes = array_pluck(PaymentType::get(['id','name'])->toArray(),'name', 'id');
        $classes = array_pluck(ClassType::get(['id','alias'])->toArray(),'alias', 'id');
        $discounts = array_pluck(DiscountType::get(['id','name'])->toArray(),'name', 'id');
        $sessions = array_pluck(SessionDate::orderBy('id','desc')->get(['id','date'])->toArray(),'date', 'id');
        $routes = array_pluck(TransportRoute::get(['id','name'])->toArray(),'name', 'id');
        return view('front.enquiry-form',compact('classes','routes','sessions','centers','paymenttypes','discounts'));
    
    }

    public function enquiryStore2(Request $request)
    {
        return $request;
    }

     public function enquiryStore(Request $request)
     {
        
        $this->validate($request, [
          

 
         'name' => 'required|max:25',
         'mobile' => 'required|max:25',

         'email' => 'max:30|required',
         'address' => 'required|max:255',
         
         

         ]);
          
    

           
        $enquiry = new Enquiry();
         
       
       $enquiry->name = $request->name;
       $enquiry->father_name = $request->father_name;
       
       $enquiry->city = $request->city;
       $enquiry->state = $request->state;
       
       $enquiry->email = $request->email;        
       $enquiry->mobile = $request->mobile;
       $enquiry->address = $request->address;          
       $enquiry->message = $request->message;         
         


         if($enquiry->save()){ 
             // Mail::to('ashokkumar2342@gmail.com')->queue(new EnquiryMail($enquiry));
              return redirect()->back(
              )->with(['message'=>'Send Enquiry Successfully ','class'=>'success']);
         }
         return redirect()->back()->with(['class'=>'error','message'=>'Whoops ! Look like somthing went wrong ..']);

         
     }

    public function store(Request $request)
    {
    	$this->validate($request, [
        'applied' => 'required',
        


        'name' => 'required|max:25',
        'bob' => 'max:25',

        'name' => 'required|max:25',

        'email' => 'max:30|required',
        'address' => 'required|max:255',
        'city' => 'max:25',
        'workexperience' => 'max:25',
        'resume' => 'mimes:pdf,docx|between:2,500',

        ]);
    	  
   

   		 $file = $request->file('resume');
    		$file->store('public/file');

    	$careers = new Career;
        $careers->applied = $request->applied;
        $careers->other = $request->other;
        $careers->name = $request->name;
        $careers->dob = $request->dob;
        $careers->city = $request->city;
        $careers->workexperience = $request->workexperience;
        $careers->email = $request->email;        
        $careers->mobile = $request->mobile;
        $careers->address = $request->address;          
        $careers->resume = $file->hashName();


        if($careers->save()){ 
            // Mail::to('zgsrtk1@gmail.com')->queue(new CareerMail($careers));
             return redirect()->route('front.career')->with(['message'=>'Send Contact us Successfully ','class'=>'success']);
        }
        return redirect()->back()->with(['class'=>'error','message'=>'Whoops ! Look like somthing went wrong ..']);

        
    }
}
