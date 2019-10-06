<?php

namespace App\Http\Controllers\Student;

use App\Center;
use App\ClassType;
use App\Http\Controllers\Controller;
use App\OnlinePaymentHistory;
use App\PaymentMode;
use App\PaymentType;
use App\SessionDate;
use App\Student;
use App\StudentFee;
use App\TempStudentFee;
use Auth;
use Illuminate\Http\Request;
use Softon\Indipay\Facades\Indipay;
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
    {   $paymentmodes = PaymentMode::get();    
        $student = Auth::guard('student')->user(); 
        return view('student.feedetails.list',compact('student','paymentmodes'));
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
   public function onlinePay(Request $request)
   {    
     $order_id =$request->student_id.StudentFee::orderBy('id','DESC')->first()->id + 1;
    $tid = date('Ymdhms');
      $student =Student::find($request->student_id);  
      $this->tempStudentFeeStore($request,$order_id);
        $parameters = [             
               'tid' => $tid,               
               'order_id' => $order_id,               
               'amount' => $request->amount_payable, 
               'merchant_param1' => $request->student_id,               
                            
               'billing_name' => $student->name,               
               'billing_address' => $student->address,               
               'billing_city' => $student->city,               
               'billing_state' => $student->state,               
               'billing_zip' => $student->pin_code,               
               'billing_country' => 'india',               
               'billing_tel' => $student->mobile_sms,               
               'billing_email' => $student->email,               
             ];             
             $order = Indipay::prepare($parameters);
             return Indipay::process($order);
   }

   public function response(Request $request)     
      { 

        $response = Indipay::response($request); 
        $oph =OnlinePaymentHistory::firstOrNew(['order_id'=>$response['order_id']]);
 
        if ($response['order_status']=='Success') {
          // For default Gateway 
          $oph->student_id=  $response['merchant_param1'];
          $oph->order_id= $response['order_id'];
          $oph->tracking_id= $response['tracking_id'];
          $oph->bank_ref_no= $response['bank_ref_no'];
          $oph->order_status= $response['order_status'];
          $oph->failure_message= $response['failure_message'];
          $oph->payment_mode= $response['payment_mode'];
          $oph->card_name= $response['card_name'];
          $oph->status_code= $response['status_code'];
          $oph->status_message= $response['status_message'];
          $oph->currency= $response['currency'];
          $oph->amount= $response['amount'];
          $oph->billing_name= $response['billing_name'];
          $oph->billing_address= $response['billing_address'];
          $oph->billing_city= $response['billing_city'];
          $oph->billing_state= $response['billing_state'];
          $oph->billing_zip= $response['billing_zip'];
          $oph->billing_country= $response['billing_country'];
          $oph->billing_tel= $response['billing_tel'];
          $oph->billing_email= $response['billing_email'];
          $oph->delivery_name= $response['delivery_name'];
          $oph->delivery_address= $response['delivery_address'];
          $oph->delivery_city= $response['delivery_city'];
          $oph->delivery_state= $response['delivery_state'];
          $oph->delivery_zip= $response['delivery_zip'];
          $oph->delivery_country= $response['delivery_country'];
          $oph->delivery_tel= $response['delivery_tel']; 
          $oph->vault= $response['vault'];
          $oph->offer_type= $response['offer_type'];
          $oph->offer_code= $response['offer_code'];
          $oph->discount_value= $response['discount_value'];
          $oph->mer_amount= $response['mer_amount'];
         
          $oph->retry= $response['retry'];
          $oph->response_code= $response['response_code'];
          $oph->billing_notes= $response['billing_notes'];
          $oph->trans_date= date('Y-m-d h:s',strtotime($response['trans_date']));
          $oph->bin_country= $response['bin_country'];
          $oph->status= 1;
          $oph->save();
          $this->payFee($oph); 
        return view('student.feedetails.payment_success',compact('oph'));
        // return redirect()->route('student.feedetails.list')->with(['class'=>'success','message'=>'Payment Succssesfully']);
      
          
        }else{

            $oph->student_id=  $response['merchant_param1'];
            $oph->order_id= $response['order_id'];
            $oph->tracking_id= $response['tracking_id'];
            $oph->bank_ref_no= $response['bank_ref_no'];
            $oph->order_status= $response['order_status'];
            $oph->failure_message= $response['failure_message'];
            $oph->payment_mode= $response['payment_mode'];
            $oph->card_name= $response['card_name'];
            $oph->status_code= $response['status_code'];
            $oph->status_message= $response['status_message'];
            $oph->currency= $response['currency'];
            $oph->amount= $response['amount'];
            $oph->billing_name= $response['billing_name'];
            $oph->billing_address= $response['billing_address'];
            $oph->billing_city= $response['billing_city'];
            $oph->billing_state= $response['billing_state'];
            $oph->billing_zip= $response['billing_zip'];
            $oph->billing_country= $response['billing_country'];
            $oph->billing_tel= $response['billing_tel'];
            $oph->billing_email= $response['billing_email'];
            $oph->delivery_name= $response['delivery_name'];
            $oph->delivery_address= $response['delivery_address'];
            $oph->delivery_city= $response['delivery_city'];
            $oph->delivery_state= $response['delivery_state'];
            $oph->delivery_zip= $response['delivery_zip'];
            $oph->delivery_country= $response['delivery_country'];
            $oph->delivery_tel= $response['delivery_tel']; 
            $oph->vault= $response['vault'];
            $oph->offer_type= $response['offer_type'];
            $oph->offer_code= $response['offer_code'];
            $oph->discount_value= $response['discount_value'];
            $oph->mer_amount= $response['mer_amount'];
            
            $oph->retry= $response['retry'];
            $oph->response_code= $response['response_code'];
            $oph->billing_notes= $response['billing_notes'];
            $oph->trans_date= date('Y-m-d h:s',strtotime($response['trans_date']));
            $oph->bin_country= $response['bin_country'];
            $oph->status= 0;
            $oph->save();
           // return redirect()->route('student.feedetails.list')->with(['class'=>'error','message'=>'Payment Failed']);
            return view('student.feedetails.payment_success',compact('oph'));
      
            }  
        }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StudentDetails  $studentDetails
     * @return \Illuminate\Http\Response
     */
    public function payFee($oph){
     
        $tempStudentFee =TempStudentFee::where('receipt_no',$oph->order_id)->first();
        $studentFee = StudentFee::firstOrNew(['receipt_no'=>$tempStudentFee->receipt_no]);
        $studentFee->online_payment_history_id = $oph->id;
        $studentFee->student_id = $tempStudentFee->student_id;        
        $studentFee->session_id = $tempStudentFee->session_id;
        $studentFee->total_fees = $tempStudentFee->total_fees;
        $studentFee->other_fee = $tempStudentFee->other_fee;
        $studentFee->discount_type_id = $tempStudentFee->discount_type_id;
        $studentFee->discount_name = $tempStudentFee->discount_name;
        $studentFee->discount = $tempStudentFee->discount;
        $studentFee->receipt_no = $tempStudentFee->receipt_no;
        $studentFee->receipt_date =$tempStudentFee->receipt_date;;
        $studentFee->amount_payable = $tempStudentFee->amount_payable;
        $studentFee->cheque_no = $tempStudentFee->cheque_no;
        $studentFee->bank_name = $tempStudentFee->bank_name;
        $studentFee->cheque_date = $tempStudentFee->cheque_date;
        $studentFee->received_fee = $tempStudentFee->received_fee;
        $studentFee->balance_fee = $tempStudentFee->balance_fee;
        $studentFee->installment_fees = $tempStudentFee->installment_fees;
        
        $studentFee->admission_fee =$tempStudentFee->admission_fee ;
        $studentFee->admission_form_fee =$tempStudentFee->admission_form_fee ;
        $studentFee->registration_fee =$tempStudentFee->registration_fee ;
        $studentFee->annual_charge =$tempStudentFee->annual_charge ;
        $studentFee->caution_money =$tempStudentFee->caution_money ;
        
        $studentFee->activity_charge =$tempStudentFee->activity_charge ;
        $studentFee->smart_class_fee =$tempStudentFee->smart_class_fee ;
        $studentFee->sms_charge =$tempStudentFee->sms_charge;
        $studentFee->tution_fee = $tempStudentFee->tution_fee;
        $studentFee->transport_fee= $tempStudentFee->transport_fee;
        $studentFee->previous_balance= $tempStudentFee->previous_balance;
        $studentFee->late_fee= $tempStudentFee->late_fee;
        $studentFee->month_name= $tempStudentFee->month_name;
        $studentFee->payment_mode= $tempStudentFee->payment_mode;
        $studentFee->save();
       

    }
    //temporary save
    public function tempStudentFeeStore($request,$receipt_no){
        // return dd($request->all());
        $this->validate($request,[
            'total_fees' => 'required|numeric',
            'discount_type_id' => 'required|numeric',
            'installment_fees'=> 'required|numeric',
            'discount' => 'required|numeric',
            'discount_name' => 'required|max:199',
            // 'receipt_no' => 'required|max:199',
            // "receipt_date" => 'required|date',
            "amount_payable" => 'required|numeric',
            'received_fees'=> 'required|numeric',
            "cheque_no" => 'nullable|numeric',
            "other_fee" => 'nullable|numeric',
            "bank_name" => 'nullable|max:199',
            "cheque_date" => 'nullable|date',      
        ]);
          $studentFeesCount =StudentFee::where('student_id',$request->student_id)->where('session_id',$request->session_id)->get();
          $payment_type =$request->payment_type;
         $monthNames='';
        if (count($studentFeesCount)==0){
            if ($request->student_payment_type==1) {
               $monthNames='All';  
            }elseif ($request->student_payment_type==3){
                  $monthNames='Apr';
            }
            else{
                 $monthNames='Apr - Jun';
            }
           
        }
         elseif (count($studentFeesCount)==1) {
            if ($payment_type==2){
              $monthNames='Jul - Sep';                  
            }
            elseif ($payment_type==3){
              $monthNames='May';
            }
                
         }elseif (count($studentFeesCount)==2) {
            if ($payment_type==2){
               $monthNames='Oct - Dec';                    
            }
            elseif ($payment_type==3){
              $monthNames='Jun';
            }
              
         }elseif (count($studentFeesCount)==3) {
            if ($payment_type==2){
                  $monthNames='Jan - Mar';                     
            }
            elseif ($payment_type==3){
              $monthNames='July';
            }
          
         }elseif (count($studentFeesCount)==4) { 
            if ($payment_type==3){
              $monthNames='Aug';
            }
          
         }elseif (count($studentFeesCount)==5) { 
            if ($payment_type==3){
              $monthNames='Sep';
            }
          
         }elseif (count($studentFeesCount)==6) { 
            if ($payment_type==3){
              $monthNames='Oct';
            }
          
         }elseif (count($studentFeesCount)==7) { 
            if ($payment_type==3){
              $monthNames='Nuv';
            }
          
         }elseif (count($studentFeesCount)==8) { 
            if ($payment_type==3){
              $monthNames='Dec';
            }
          
         }elseif (count($studentFeesCount)==9) { 
            if ($payment_type==3){
              $monthNames='Jan';
            }
          
         }elseif (count($studentFeesCount)==10) { 
            if ($payment_type==3){
              $monthNames='Feb';
            }
          
         }elseif (count($studentFeesCount)==11) { 
            if ($payment_type==3){
              $monthNames='Mar';
            }
          
         }
        $receipt_no =$receipt_no;
        $studentFee = TempStudentFee::firstOrNew(['receipt_no'=>$receipt_no]);
        $studentFee->student_id = $request->student_id;
        $studentFee->session_id = $request->session_id;
        $studentFee->total_fees = $request->total_fees;
        $studentFee->other_fee = $request->other_fee;
        $studentFee->discount_type_id = $request->discount_type_id;
        $studentFee->discount_name = $request->discount_name;
        $studentFee->discount = $request->discount;
        $studentFee->receipt_no = $receipt_no;
        $studentFee->receipt_date = date('Y-m-d');
        $studentFee->amount_payable = $request->amount_payable;
        $studentFee->cheque_no = $request->cheque_no;
        $studentFee->bank_name = $request->bank_name;
        $studentFee->cheque_date = $request->cheque_date;
        $studentFee->received_fee = $request->received_fees;
        $studentFee->balance_fee = $request->amount_payable-$request->received_fees;
        $studentFee->installment_fees = $request->installment_fees;
        
        $studentFee->admission_fee =$request->admission_fees ;
        $studentFee->admission_form_fee =$request->admission_form_fees ;
        $studentFee->registration_fee =$request->registration_fees ;
        $studentFee->annual_charge =$request->annual_charges ;
        $studentFee->caution_money =$request->caution_money ;
        
        $studentFee->activity_charge =$request->activity_charges ;
        $studentFee->smart_class_fee =$request->smart_class_fees ;
        $studentFee->sms_charge =$request->sms_charges;
        $studentFee->tution_fee = $request->tution_fees;
        $studentFee->transport_fee= $request->transport_fee;
        $studentFee->previous_balance= $request->previous_balance;
        $studentFee->late_fee= $request->late_fee;
        $studentFee->month_name= $monthNames;
        $studentFee->payment_mode= 3;
        $studentFee->status= 0;
        $studentFee->save(); 
            

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StudentDetails  $studentDetails
     * @return \Illuminate\Http\Response
     */
    public function feeReceipt(StudentFee $studentFee)
    {
        return view('student.feedetails.feeReceipt',compact('studentFee'));
        
    }
}
