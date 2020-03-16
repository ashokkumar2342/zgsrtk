<?php

namespace App\Http\Controllers\Admin;

use App\Center;
use App\ClassFee;
use App\ClassType;
use App\DiscountType;
use App\DueFee;
use App\Http\Controllers\Controller;
use App\OnlinePaymentHistory;
use App\PaymentMode;
use App\PaymentType;
use App\SessionDate;
use App\Student;
use App\StudentFee;
use App\TransportRoute;
use Carbon;
use DB;
use Excel;
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
        $students= Student::all();
        return view('admin.student.studentdetails.list',compact('students'));
    }
      public function huda()
    {        
        // $students = Student::where('center_id',1)->get();
        return view('admin.student.studentdetails.huda');
    } 
      public function hudashow($id)
    {        
        $students = Student::where('center_id',$id)->get();
        return view('admin.student.studentdetails.student_table',compact('students'));
    }   
    public function studentVIew()
    {        
       $centers = Center::where('status',1)->get();
       $paymenttypes = array_pluck(PaymentType::get(['id','name'])->toArray(),'name', 'id');
       $classes = array_pluck(ClassType::get(['id','alias'])->toArray(),'alias', 'id');
       $discounts = array_pluck(DiscountType::get(['id','name'])->toArray(),'name', 'id');
       $sessions = array_pluck(SessionDate::get(['id','date'])->toArray(),'date', 'id');
       $routes = array_pluck(TransportRoute::get(['id','name'])->toArray(),'name', 'id');

       return view('admin.student.studentdetails.student_view',compact('classes','routes','sessions','centers','paymenttypes','discounts'));
        
    }
     public function studentSearch(Request $request)
    {

        $students = Student::where(['center_id'=>$request->center,'session_id'=>$request->session,'class_id'=>$request->class,'section_id'=>$request->section])->get();
        $response =array();
        $response['status'] =1;
        $response['data']= view('admin.student.studentdetails.student_table',compact('students'))->render();
        return $response;
         
          
      
    }
    public function jind()
    {
         
        return view('admin.student.studentdetails.jind');

    }
     public function omax()
    {  
        return view('admin.student.studentdetails.omax');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $centers = Center::where('status',1)->get();
        $paymenttypes = array_pluck(PaymentType::get(['id','name'])->toArray(),'name', 'id');
        $classes = array_pluck(ClassType::get(['id','alias'])->toArray(),'alias', 'id');
        $discounts = array_pluck(DiscountType::get(['id','name'])->toArray(),'name', 'id');
        $sessions = array_pluck(SessionDate::orderBy('id','desc')->get(['id','date'])->toArray(),'date', 'id');
        $routes = array_pluck(TransportRoute::get(['id','name'])->toArray(),'name', 'id');
        return view('admin.student.studentdetails.add',compact('classes','routes','sessions','centers','paymenttypes','discounts'));
    }
    public function  passwordReset(Student $student){
        $char = substr( str_shuffle("abcdefghijklmnopqrstuvwxyz0123456789"), 0, 6 );
        $student->password = bcrypt($char);
        $student->tmp_pass = $char;
        if($student->save()){ 
             //Event::fire('');
            return redirect()->back()->with(['class'=>'success','message'=>'student Password reset success ...']);
           
        }
        return redirect()->back()->with(['class'=>'error','message'=>'Whoops ! Look like somthing went wrong ..']);
    }
    public function payFee(Request $request){
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
        $receipt_no =StudentFee::orderBy('id','DESC')->first()->id + 1;
        $studentFee = new StudentFee();
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
        $studentFee->payment_mode= $request->payment_mode;
        if($studentFee->save()){ 
            return redirect()->back()->with(['class'=>'success','message'=>'student fee pay success ...']);
        }
        return redirect()->back()->with(['class'=>'error','message'=>'Whoops ! Look like somthing went wrong ..']);

    }
    
   public function studentFeeEdit(Request $request, StudentFee $studentFee){
        return view('admin.student.fee.edit',compact('studentFee'));
    }
    
    public function studentFeeDelete(Request $request, StudentFee $studentFee){
        if ($studentFee->delete()) {
            return redirect()->back()->with(['class'=>'success','message'=>'Fee delete success ...']);
              
           }
        return redirect()->back()->with(['class'=>'error','message'=>'Whoops ! Look like somthing went wrong ..']);
        
    }

    public function studentFeeUpdate(Request $request,StudentFee $studentFee, Student $student){
         
      
        $studentFee->student_id = $request->student_id;
        $studentFee->total_fees = $request->total_fees;
        $studentFee->installment_fees = $request->installment_fees;
        $studentFee->discount_type_id = $request->discount_type_id;
        $studentFee->discount_name = $request->discount_name;
        $studentFee->discount = $request->discount;
        $studentFee->receipt_no = $request->receipt_no;
        $studentFee->receipt_date = $request->receipt_date;
        $studentFee->other_fee = $request->other_fee;        
        $studentFee->amount_payable = $request->amount_payable;        
        $studentFee->received_fee = $request->received_fees;

        $studentFee->cheque_no = $request->cheque_no;
        $studentFee->bank_name = $request->bank_name;
        $studentFee->cheque_date = $request->cheque_date;
        $studentFee->balance_fee = $request->amount_payable-$request->received_fees;
        // return $studentFee; 
         if($studentFee->save()){ 
           return redirect()->back()->with(['class'=>'success','message'=>'student fee update success ...']);
           
        }
        return redirect()->back()->with(['class'=>'error','message'=>'Whoops ! Look like somthing went wrong ..']);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $this->validate($request,[
            'center' => 'required|numeric',
            // 'username' => 'required',

            'session' => 'required|numeric',
            'class' => 'required|numeric',
            "section" => 'required|numeric',
            "date_of_admission" => 'required|date',
            "student_name" => 'required|max:199',
            "father_name" => 'required|max:199',
            "mother_name" => 'required|max:199',
            "date_of_birth" => 'required|max:199',
            "religion" => "required|max:199",
            "category" => "required|max:199",
            "address" => 'required|max:1000',
            "state" => "required|max:199",
            "city" => "required|max:199",
            "pincode" => 'required|numeric',
            "mobile_one" => 'nullable|numeric',
            "mobile_two" => 'nullable|numeric',
            "mobile_sms" => 'required|numeric',
            'payment_type' => 'required|numeric'
      
        ]);
        $transport_fee = ($request->driver_id)?$request->transport_fees:0;
        $transport_fee2 = (!$request->driver_id)?$request->transport_fees:0;
        
        $username = str_random('10');
        $char = substr( str_shuffle( "abcdefghijklmnopqrstuvwxyz0123456789" ), 0, 6 );
        $student= new Student();
        $student->username= $username;
        // $student->username= $request->username;
        $student->password = bcrypt($char);
        $student->tmp_pass = $char;
        $student->center_id= $request->center;
        $student->session_id= $request->session;
        $student->class_id= $request->class;
        $student->section_id= $request->section;
        $student->totalFee= $request->total_fee-$transport_fee2;
        $student->firsttime_fee = ($request->admission_fees+$request->admission_form_fees+$request->registration_fees+$request->annual_charges) ;
        $student->installment_fee = ($request->activity_charges+$request->smart_class_fees+$request->sms_charges+$request->tution_fees+$transport_fee+$request->caution_money);
        
        $student->admission_fee =$request->admission_fees ;
        $student->admission_form_fee =$request->admission_form_fees ;
        $student->registration_fee =$request->registration_fees ;
        $student->annual_charge =$request->annual_charges ;
        $student->caution_money =$request->caution_money ;
        
        $student->activity_charge =$request->activity_charges ;
        $student->smart_class_fee =$request->smart_class_fees ;
        $student->sms_charge =$request->sms_charges;
        $student->tution_fee = $request->tution_fees;
        $student->transport_fee= $transport_fee;
        $student->meal_pay_time= $request->meal_pay_time;
        $student->tution_pay_time= $request->tution_pay_time;
        
        $student->date_of_admission= date('Y-m-d',strtotime($request->date_of_admission));
        $student->name= $request->student_name;
        $student->father_name= $request->father_name;
        $student->mother_name= $request->mother_name;
        $student->dob= date('Y-m-d',strtotime($request->date_of_birth));
        $student->religion= $request->religion;
        $student->category= $request->category;
        $student->address= $request->address;
        $student->state= $request->state;
        $student->city= $request->city;
        $student->pincode= $request->pincode;
        $student->mobile_one= $request->mobile_one;
        $student->mobile_two= $request->mobile_two;
        $student->mobile_sms= $request->mobile_sms;
        $student->discount_type_id= $request->discount_type;
        $student->payment_type_id= $request->payment_type;
        $student->transport_id = $request->driver_id;
        $student->route_id = $request->route;
        if($student->save()){            
            $student->username= 'ZGS10'.$student->id;
            $student->save();
            return redirect()->route('admin.student.view',$student->id)->with(['class'=>'success','message'=>'Student Registration Success ...']);
        }
        return redirect()->back()->with(['class'=>'error','message'=>'Whoops ! Look like somthing went wrong ..']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StudentDetails  $studentDetails
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        $paymentmodes = PaymentMode::get();
        $classFee = ClassFee::where(['center_id'=>$student->center_id,'session_id'=>$student->session_id,'class_id'=>$student->class_id])->first();
        $sibling_discount =$classFee->discount;
        return view('admin.student.studentdetails.view',compact('student','paymentmodes','sibling_discount'));
    }
    public function excelData(){

        $students = Student::orderBy('center_id','session_id','class_id','section_id')->get();
        foreach($students as $student){
            $data[] =['id'=>$student->username,'name'=>$student->name,'center'=>$student->centers->name,'class'=>$student->classes->name,'section'=>$student->sections->name,'date of admission'=>Carbon\Carbon::parse( $student->date_of_admission)->format('d-m-Y'),'father name'=>$student->father_name,'mother name'=>$student->mother_name,'date of birthday'=>Carbon\Carbon::parse( $student->dob)->format('d-m-Y'),'religion'=>$student->religion,'category'=>$student->category,'address'=>$student->address,'state'=>$student->state,'city'=>$student->city,'pincode'=>$student->pincode,'mobile one'=>$student->mobile_one,'mobile two'=>$student->mobile_two,'mobile sms'=>$student->mobile_sms];
        }
        Excel::create('studentlist', function($excel) use ($data) {
            $excel->sheet('sheet', function($sheet) use ($data) {
                $sheet->fromArray($data);
            });
        })->export('xls');

    }
    public function image($image){
        $img = Storage::disk('student')->get('profile/'.$image);
        return response($img);
    }
    public function imageUpdate(Request $request, Student $student){
        $file = $request->file('student_photo');
        $file->store('student/profile');
        $student->picture = $file->hashName();
        if($student->save()){   
            return redirect()->route('admin.student.view',$student->id)->with(['class'=>'success','message'=>'student registration success ...']);
        }
        return redirect()->back()->with(['class'=>'error','message'=>'Whoops ! Look like somthing went wrong ..']);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StudentDetails  $studentDetails
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $centers = Center::where('status',1)->get();
        $paymenttypes = array_pluck(PaymentType::get(['id','name'])->toArray(),'name', 'id');
        $classes = array_pluck(ClassType::get(['id','alias'])->toArray(),'alias', 'id');
        $discounts = array_pluck(DiscountType::get(['id','name'])->toArray(),'name', 'id');
        $sessions = array_pluck(SessionDate::get(['id','date'])->toArray(),'date', 'id');
        $routes = array_pluck(TransportRoute::get(['id','name'])->toArray(),'name', 'id');
        return view('admin.student.studentdetails.edit',compact('student','classes','sessions','centers','paymenttypes','discounts','routes'));
    }

     public function profileedit(Student $student)
    {
        $centers = Center::where('status',1)->get();
        $paymenttypes = array_pluck(PaymentType::get(['id','name'])->toArray(),'name', 'id');
        $classes = array_pluck(ClassType::get(['id','alias'])->toArray(),'alias', 'id');
        $discounts = array_pluck(DiscountType::get(['id','name'])->toArray(),'name', 'id');
        $sessions = array_pluck(SessionDate::get(['id','date'])->toArray(),'date', 'id');
        $routes = array_pluck(TransportRoute::get(['id','name'])->toArray(),'name', 'id');
        return view('admin.student.studentdetails.profileedit',compact('student','classes','sessions','centers','paymenttypes','discounts','routes'));
    }

      public function totalfeeedit(Student $student)
    {
        $centers = Center::where('status',1)->get();
        $paymenttypes = array_pluck(PaymentType::get(['id','name'])->toArray(),'name', 'id');
        $classes = array_pluck(ClassType::get(['id','alias'])->toArray(),'alias', 'id');
        $discounts = array_pluck(DiscountType::get(['id','name'])->toArray(),'name', 'id');
        $sessions = array_pluck(SessionDate::get(['id','date'])->toArray(),'date', 'id');
        $routes = array_pluck(TransportRoute::get(['id','name'])->toArray(),'name', 'id');
        return view('admin.student.studentdetails.totalfeeedit',compact('student','classes','sessions','centers','paymenttypes','discounts','routes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StudentDetails  $studentDetails
     * @return \Illuminate\Http\Response
     */
    public function totalfeeupdate(Request $request, Student $student)
    {
        $this->validate($request,[
            'center' => 'required|numeric',

            'session' => 'required|numeric',
            'class' => 'required|numeric',
            "section" => 'required|numeric',           
            "student_name" => 'required|max:199',            
            
            'payment_type' => 'required|numeric'
      
        ]);
        $transport_fee = ($request->driver_id)?$request->transport_fees:0;
        $transport_fee2 = (!$request->driver_id)?$request->transport_fees:0;
        
        

        $student->center_id= $request->center;
        $student->session_id= $request->session;
        $student->class_id= $request->class;
        $student->section_id= $request->section;
        $student->totalFee= $request->total_fee-$transport_fee2;
        $student->firsttime_fee = ($request->admission_fees+$request->registration_fees+$request->admission_form_fees+$request->annual_charges) ;
        $student->installment_fee = ($request->activity_charges+$request->smart_class_fees+$request->sms_charges+$request->tution_fees+$transport_fee+$request->caution_money);
        
        $student->admission_fee =$request->admission_fees ;
        $student->admission_form_fee =$request->admission_form_fees ;
        $student->registration_fee =$request->registration_fees ;
        $student->annual_charge =$request->annual_charges ;
        $student->caution_money =$request->caution_money ;
        
        $student->activity_charge =$request->activity_charges ;
        $student->smart_class_fee =$request->smart_class_fees ;
        $student->sms_charge =$request->sms_charges;
        $student->tution_fee = $request->tution_fees;
        $student->transport_fee= $transport_fee;
        $student->meal_pay_time= $request->meal_pay_time;
        $student->tution_pay_time= $request->tution_pay_time;
        
        
        $student->name= $request->student_name;
        
        $student->discount_type_id= $request->discount_type;
        $student->payment_type_id= $request->payment_type;
       
        
        if($student->save()){ 
            return redirect()->route('admin.student.view',$student->id)->with(['class'=>'success','message'=>'student fee update success ...']);
        }
        return redirect()->back()->with(['class'=>'error','message'=>'Whoops ! Look like somthing went wrong ..']);
    }

      public function update(Request $request, Student $student)
    {
        $this->validate($request,[
            'center' => 'required|numeric',

            'session' => 'required|numeric',
            'class' => 'required|numeric',
            "section" => 'required|numeric',
            "date_of_admission" => 'required|date',
            "student_name" => 'required|max:199',
            "father_name" => 'required|max:199',
            "mother_name" => 'required|max:199',
            "date_of_birth" => 'required|max:199',
            "religion" => "required|max:199",
            "category" => "required|max:199",
            "address" => 'required|max:1000',
            "state" => "required|max:199",
            "city" => "required|max:199",
            "pincode" => 'required|numeric',
            "mobile_one" => 'nullable|numeric',
            "mobile_two" => 'nullable|numeric',
            "mobile_sms" => 'required|numeric',
            'payment_type' => 'required|numeric'
      
        ]);
        $transport_fee = ($request->driver_id)?$request->transport_fees:0;
        $transport_fee2 = (!$request->driver_id)?$request->transport_fees:0;
        
        

        $student->center_id= $request->center;
        $student->session_id= $request->session;
        $student->class_id= $request->class;
        $student->section_id= $request->section;
        $student->totalFee= $request->total_fee-$transport_fee2;
        $student->firsttime_fee = ($request->admission_fees+$request->admission_form_fees+$request->registration_fees+$request->annual_charges) ;
        $student->installment_fee = ($request->activity_charges+$request->smart_class_fees+$request->sms_charges+$request->tution_fees+$transport_fee+$request->caution_money);
        
        $student->admission_fee =$request->admission_fees ;
        $student->admission_form_fee =$request->admission_form_fees ;
        $student->registration_fee =$request->registration_fees ;
        $student->annual_charge =$request->annual_charges ;
        $student->caution_money =$request->caution_money ;
        
        $student->activity_charge =$request->activity_charges ;
        $student->smart_class_fee =$request->smart_class_fees ;
        $student->sms_charge =$request->sms_charges;
        $student->tution_fee = $request->tution_fees;
        $student->transport_fee= $transport_fee;
        
        $student->date_of_admission= date('Y-m-d',strtotime($request->date_of_admission));
        $student->name= $request->student_name;
        $student->father_name= $request->father_name;
        $student->mother_name= $request->mother_name;
        $student->dob= date('Y-m-d',strtotime($request->date_of_birth));
        $student->religion= $request->religion;
        $student->category= $request->category;
        $student->address= $request->address;
        $student->state= $request->state;
        $student->city= $request->city;
        $student->pincode= $request->pincode;
        $student->mobile_one= $request->mobile_one;
        $student->mobile_two= $request->mobile_two;
        $student->mobile_sms= $request->mobile_sms;
        $student->discount_type_id= $request->discount_type;
        $student->payment_type_id= $request->payment_type;
        $student->transport_id = $request->driver_id;
        $student->route_id = $request->route;
       $data = $request->center;        

        if($student->save()){ 
            return redirect($data==1?'admin/student/huda':$data==2?'admin/student/jind':'admin/student/omax')->with(['class'=>'success','message'=>'student update success ...']);
        }
        return redirect()->back()->with(['class'=>'error','message'=>'Whoops ! Look like somthing went wrong ..']);
    }

        public function profileupdate(Request $request, Student $student)
    {
        $this->validate($request,[
            'center' => 'required|numeric',

            'session' => 'required|numeric',
            'class' => 'required|numeric',
            "section" => 'required|numeric',
            "date_of_admission" => 'required|date',
            "student_name" => 'required|max:199',
            "father_name" => 'required|max:199',
            "mother_name" => 'required|max:199',
            "date_of_birth" => 'required|max:199',
            "religion" => "required|max:199",
            "category" => "required|max:199",
            "address" => 'required|max:1000',
            "state" => "required|max:199",
            "city" => "required|max:199",
            "pincode" => 'required|numeric',
            "mobile_one" => 'nullable|numeric',
            "mobile_two" => 'nullable|numeric',
            "mobile_sms" => 'required|numeric',
            
      
        ]);
       
        $student->center_id= $request->center;
        $student->session_id= $request->session;
        $student->class_id= $request->class;
        $student->section_id= $request->section;
        $student->date_of_admission= date('Y-m-d',strtotime($request->date_of_admission));
        $student->name= $request->student_name;
        $student->father_name= $request->father_name;
        $student->mother_name= $request->mother_name;
        $student->dob= date('Y-m-d',strtotime($request->date_of_birth));
        $student->religion= $request->religion;
        $student->category= $request->category;
        $student->address= $request->address;
        $student->state= $request->state;
        $student->city= $request->city;
        $student->pincode= $request->pincode;
        $student->mobile_one= $request->mobile_one;
        $student->mobile_two= $request->mobile_two;
        $student->mobile_sms= $request->mobile_sms;
     
        if($student->save()){ 
            return redirect()->route('admin.student.view',$student->id)->with(['class'=>'success','message'=>'student profile update success ...']);
        }
        return redirect()->back()->with(['class'=>'error','message'=>'Whoops ! Look like somthing went wrong ..']);
    }
    public function importStudent(Request $request){
        $path = 'images/excel.xls';
        //  $file = $request->file('student');
        // $file->store('student/excel');
        
        //$data = \Excel::load($path)->get();
        $data = Excel::load($path)->get();
 			//dd($data[0]->items);
 			// foreach ($data as $key) {
    //               $rec[] = ['id'=>$value->id,'name'=>'','email'=>'','username'=>'','password'=>'',''=>'tmp_pass',''=>'','center_id'=>'','section_id'=>'','clas_id'=>'','totalFee'=>'','installment_fee'=>'','firsttime_fee'=>'','transport_id'=>'','route_id'=>'','date_of_admission'=>'','father_name'=>'','mother_name'=>'','date_of_birth'=>'','religion'=>'','category'=>'','address'=>'','state'=>'','city'=>'',''=>'','pincode'=>'','mobile_one'=>'','mobile_two'=>'',''=>'','mobile_sms'=>'','otp'=>'','picture'=>'','discount_type_id'=>'','payment_type_id'=>'','admission_fee'=>'','registration_fee'=>'','annual_charge'=>'','caution_money'=>'','activity_charge'=>'',''=>'',''=>'',''=>'',''=>'',''=>'',''=>'',];
    //             }
    foreach ($data as $key=>$value){
        $collection = collect($value);
        $rec = $collection->toArray();
        DB::table('students')->insert($rec);
    }
    
        // Excel::load($request->file('student')->ori, function($reader) {

        //     // reader methods
        
        // });
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StudentDetails  $studentDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {  
       
        if ($student->delete()) {
            
         return redirect()->back()->with(['class'=>'success','message'=>'student delete success ...']);
           
        }
        return redirect()->back()->with(['class'=>'error','message'=>'Whoops ! Look like somthing went wrong ..']);
    }
    public function feeReceipt(StudentFee $studentFee)
    {
        return view('admin.student.studentdetails.feeReceipt',compact('studentFee'));
    }
     public function dueFeeReceipt(StudentFee $studentFee)
    {
        $DueFee=DueFee::where('student_id',$studentFee->student_id)->where('student_fee_id',$studentFee->id)->first();
        return view('admin.student.studentdetails.dueFeeReceipt',compact('studentFee','DueFee'));
    }
     public function studentClassByFeeForm()
    {
        $centers = Center::where('status',1)->get();
         
         
        
        $sessions = array_pluck(SessionDate::orderBy('id','desc')->get(['id','date'])->toArray(),'date', 'id');
      
        return view('admin.student.fee.class_wise_fee_form',compact('sessions','centers'));
     
    }
    
    public function studentClassByFeeFormDetails(Request $request)
    {  
        $centers = Center::where('status',1)->get();
        $paymenttypes = array_pluck(PaymentType::get(['id','name'])->toArray(),'name', 'id');
    
        $discounts = array_pluck(DiscountType::get(['id','name'])->toArray(),'name', 'id');
        $sessions = array_pluck(SessionDate::orderBy('id','desc')->get(['id','date'])->toArray(),'date', 'id');
        $routes = array_pluck(TransportRoute::get(['id','name'])->toArray(),'name', 'id');
           $student = Student::where('class_id',$request->id)->first(); 
        $routes = array_pluck(TransportRoute::get(['id','name'])->toArray(),'name', 'id');
        $data= view('admin.student.fee.fee_edit_form',compact('student','classes','routes','sessions','centers','paymenttypes','discounts'))->render();
        return response()->json(['data'=>$data]);
    }

    public function studentClassByFeeUpdate(Request $request)
    {  
          $students =Student::where(['center_id'=>$request->center,'session_id'=>$request->session,'class_id'=>$request->class])->get();
            foreach ($students as  $student) {
                $data = Student::find($student->id);
                $data->totalFee= $request->admission_fees+$request->admission_form_fees+$request->registration_fees+$request->annual_charges+$request->caution_money+$request->activity_charges+$request->smart_class_fees+$request->tution_fees+$request->sms_charges+$student->transport_fee;
                $data->firsttime_fee = ($request->admission_fees+$request->registration_fees+$request->admission_form_fees+$request->annual_charges) ;
                $data->installment_fee = ($request->activity_charges+$request->smart_class_fees+$request->sms_charges+$request->tution_fees+$student->transport_fee+$request->caution_money);

                $data->admission_fee=$request->admission_fees;
                $data->admission_form_fee=$request->admission_form_fees;
                $data->registration_fee=$request->registration_fees;
                $data->annual_charge=$request->annual_charges;
                $data->caution_money=$request->caution_money;
                $data->activity_charge=$request->activity_charges; 
                $data->smart_class_fee=$request->smart_class_fees;
                $data->tution_fee=$request->tution_fees;
                $data->sms_charge=$request->sms_charges;
                $data->save(); 
            }
            return redirect()->back()->with(['class'=>'success','message'=>'Student Fee Update Successfully']);
    }

    public function onlinePay(Request $request)
    {
         $parameters = [
              
                'tid' => '124',
                
                'order_id' => '1232212',
                
                'amount' => '1200.00',
                
              ];
              
              $order = Indipay::prepare($parameters);
              return Indipay::process($order);
    }

    public function response(Request $request)
       
       {  
           // For default Gateway
           $response = Indipay::response($request);
            

           dd($response);
       
       }  

    public function feeReport(Request $request)       
    {            
       $centers = Center::where('status',1)->get();
       $paymenttypes = array_pluck(PaymentType::get(['id','name'])->toArray(),'name', 'id');
       $classes = array_pluck(ClassType::get(['id','alias'])->toArray(),'alias', 'id');
       $discounts = array_pluck(DiscountType::get(['id','name'])->toArray(),'name', 'id');
       $paymentmodes = array_pluck(PaymentMode::get(['id','name'])->toArray(),'name', 'id');
       $sessions = array_pluck(SessionDate::orderBy('id','desc')->get(['id','date'])->toArray(),'date', 'id');
       $routes = array_pluck(TransportRoute::get(['id','name'])->toArray(),'name', 'id');
       return view('admin.student.report.form',compact('classes','routes','sessions','centers','paymenttypes','discounts','paymentmodes'));
     }     
     public function feeReportShow(Request $request)       
     {  
        $center_id = $request->center;
        $class_id = $request->class;
        $section_id = $request->section;
        $pement_mode = $request->pement_mode;
        if ($request->receipt!=null) {
           $StudentFees =StudentFee::where('receipt_no', $request->receipt)->get();      
        }else{
            $studentsId=Student::where('center_id',$request->center)->pluck('id')->toArray(); 
                     $StudentFees =StudentFee::WhereIn('student_id', $studentsId)->where('created_at', '>=', $request->from_date)
                                       ->where('created_at', '<=', $request->to_date) 
                                       ->Where('session_id', $request->session)  
                                       ->get();    
        } 
       $response = array(); 
       $response['data']= view('admin.student.report.fee_result',compact('StudentFees','center_id','class_id','section_id','pement_mode'))->render();
           $response['status'] = 1;
           return $response;

     }
     public function duefeeReportShow(Request $request)       
     {  

       $studentsId=Student::where('center_id',$request->center)->where('session_id',$request->session)->pluck('id')->toArray(); 
       $dueStudentId=array();
       $stId=array();
       foreach ($studentsId as $id) {
        $student = Student::find($id);
          $count =StudentFee::Where('student_id', $id)
          ->Where('session_id', $request->session)   
          ->count();
          if ($request->month == 'Apr - Jun') {
             if ($student->payment_type_id==1) {
                if (1 > $count) {
                  $stId[]=$id;
               }
             }
             else if (1 > $count) {
               $stId[]=$id;
             }
          } 
          else if ($request->month == 'Jul - Sep') {
             if ($student->payment_type_id==1) {
                if (1 > $count) {
                  $stId[]=$id;
               }
             }
             else if (2 > $count) {
               $stId[]=$id;
             }
          } else if ($request->month == 'Oct - Dec') {
             if ($student->payment_type_id==1) {
               if (1 > $count) {
                 $stId[]=$id;
              }
            }
            else if(3 > $count) {
              $stId[]=$id;
            }
          }else if ($request->month == 'Jan - Mar') {
             if ($student->payment_type_id==1) {
                if (1 > $count) {
                  $stId[]=$id;
               }
             }
             else if(4 > $count) {
               $stId[]=$id;
             }
          }
            
       }
        
       $students = Student::whereIn('id',$stId)->get();
         
       $response = array(); 
       $response['data']= view('admin.student.studentdetails.student_table',compact('students','center_id'))->render();
           $response['status'] = 1;
           return $response;

     }    

     public function onlinePayFeeReport(Request $request)       
     {            
        $centers = Center::where('status',1)->get();
        $paymenttypes = array_pluck(PaymentType::get(['id','name'])->toArray(),'name', 'id');
        $classes = array_pluck(ClassType::get(['id','alias'])->toArray(),'alias', 'id');
        $discounts = array_pluck(DiscountType::get(['id','name'])->toArray(),'name', 'id');
        $paymentmodes = array_pluck(PaymentMode::get(['id','name'])->toArray(),'name', 'id');
        $sessions = array_pluck(SessionDate::orderBy('id','desc')->get(['id','date'])->toArray(),'date', 'id');
        $routes = array_pluck(TransportRoute::get(['id','name'])->toArray(),'name', 'id');
        return view('admin.student.report.online_pay_fee_form',compact('classes','routes','sessions','centers','paymenttypes','discounts','paymentmodes'));
      }     
      public function onlinePayFeeReportShow(Request $request)       
      {    
        if ($request->tracking!=null) {
           $OnlinePaymentHistorys =OnlinePaymentHistory::where('tracking_id', $request->tracking)->get();    
        }else{
             $OnlinePaymentHistorys =OnlinePaymentHistory::where('created_at', '>=', $request->from_date)->where('created_at', '<=', $request->to_date) 
                             ->get();
        }
          
        $response = array(); 
        $response['data']= view('admin.student.report.online_pay_fee_result',compact('OnlinePaymentHistorys'))->render();
            $response['status'] = 1;
            return $response;

      }  

      public function dueFee(Request $request,$id)       
      {   
         $fee =StudentFee::find($id);      
         $response= array();                       
         $response['status']= 1;                       
        return view('admin.student.studentdetails.due_fee',compact('fee'))->render();
          
      }
      public function dueFeeStore(Request $request,$id)       
      {   
         $fee =StudentFee::find($id);  
         $fee->balance_fee = $fee->balance_fee-$request->due_fee;    
         $fee->received_fee = $fee->received_fee+$request->due_fee;    
         $fee->save();

         $DueFee =DueFee::firstOrNew(['student_id'=>$request->student_id,'student_fee_id'=>$id]);  
         $DueFee->student_id = $request->student_id;    
         $DueFee->student_fee_id = $id;    
         $DueFee->due_fee = $request->due_fee;    
         $DueFee->save();

         $response= array();                       
         $response['status']= 1;                       
         $response['msg']= 'Due Fee Updated Successfully';                       
         
         return $response;
      }  


   
}