<?php

namespace App\Http\Controllers\Admin;

use App\Section;
use App\ClassType;
use App\ClassFee;
use App\SessionDate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = Section::all();
        $classes = array_pluck(ClassType::get(['id','alias'])->toArray(),'alias', 'id');
        $sessions = array_pluck(SessionDate::get(['id','date'])->toArray(),'date', 'id');
        return view('admin.manage.section.list',compact('sections','classes','sessions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        // return $request;
        $classFee = ClassFee::where(['center_id'=>$request->center_id,'class_id'=>$request->id,'session_id'=>$request->session])->first();

        // $classFee = ClassFee::where(['center_id'=>$request->id,'class_id'=>$request->id,'session_id'=>$request->session])->first();
         
        $input = '  <div class="row fee-field">
                     <div class="col-lg-3">                         
                       <div class="form-group">
                        <label for="admission_fees" class=" control-label">Admission Fees (In Rs.)</label>
                        <input class="form-control classfee required" name="admission_fees" value="'.$classFee->admission_fee.'" type="number" id="admission_fees">
                        <p class="text-danger"></p>
                        </div>
                     </div>
                     <div class="col-lg-3">                         
                       <div class="form-group">
                        <label for="admission_fees" class=" control-label">Admission Form Fees (In Rs.)</label>
                        <input class="form-control classfee required" name="admission_form_fees" value="'.$classFee->admission_form_fee.'" type="number" id="admission_fees">
                        <p class="text-danger"></p>
                        </div>
                     </div>
                     <div class="col-lg-3">                         
                       <div class="form-group">
                        <label for="registration_fees" class=" control-label">Registration Fees (In Rs.)</label>
                        <input class="form-control required classfee"  value="'.$classFee->registration_fee.'" name="registration_fees" type="number" id="registration_fees">
                        <p class="text-danger"></p>
                        </div>
                     </div>
                     <div class="col-lg-3">                         
                       <div class="form-group">
                        <label for="annual_charges" class=" control-label">Annual Charges (In Rs.)</label>
                        <input class="form-control required classfee"  value="'.$classFee->annual_fee.'" name="annual_charges" type="number">
                        <p class="text-danger"></p>
                        </div>
                     </div>                     
                     </div>
                     <hr>
                     <div class="row">
                     <div class="col-lg-3">                         
                       <div class="form-group">
                        <label for="caution_money" class=" control-label">Meal (In Rs.)</label>
                        <input class="form-control required classfee"  value="'.$classFee->caution_fee.'" name="caution_money" type="number" id="caution_money">
                        <p class="text-danger"></p>
                        </div>
                     </div>
                     
                     <div class="col-lg-3">                         
                       <div class="form-group">
                        <label for="activity_charges" class=" control-label">Activity Charges (In Rs.)</label>
                        <input class="form-control required classfee" name="activity_charges"  value="'.($classFee->activity_charge*4).'" type="number" id="activity_charges">
                        <p class="text-danger"></p>
                        </div>
                     </div>
                     <div class="col-lg-3">                         
                       <div class="form-group">
                        <label for="smart_class_fees" class=" control-label">Smart Class Fees (In Rs.)</label>
                        <input class="form-control required classfee"  value="'.($classFee->smart_fee*4).'" name="smart_class_fees" type="number" id="smart_class_fees">
                        <p class="text-danger"></p>
                        </div>
                     </div>
                     <div class="col-lg-3">                         
                       <div class="form-group">
                        <label for="tution_fees" class=" control-label">Tuition Fees (In Rs.)</label>
                        <input class="form-control required classfee"  value="'.($classFee->tution_fee*4).'" name="tution_fees" type="number" id="tution_fees">
                        <p class="text-danger"></p>
                        </div>
                     </div>
                     <div class="col-lg-3">                         
                       <div class="form-group">
                        <label for="sms_charges" class=" control-label">Sms Charges (In Rs.)</label>
                        <input class="form-control required classfee" name="sms_charges" value="'.($classFee->other_fee*4).'" type="number" id="sms_charges">
                        <p class="text-danger"></p>
                        </div>
                     </div>
                      <div class="col-lg-3">                         
                       <div class="form-group">
                        <label for="transport_fees" class=" control-label">Transport Fees (In Rs.)</label>
                        <input class="form-control required classfee"  value="'.($classFee->bus_fee*4).'" name="transport_fees" type="number" id="transport_fees">
                        <p class="text-danger"></p>
                        </div>
                     </div>
                     <div class="col-lg-3">                         
                       <div class="form-group">
                        <label for="total_fee" class=" control-label">Total Fee (In Rs.)</label>
                        <input class="form-control required " name="total_fee" value="'.($classFee->admission_fee+$classFee->admission_form_fee + $classFee->registration_fee + $classFee->annual_fee + $classFee->caution_fee + ($classFee->activity_charge*4) + ($classFee->smart_fee*4) + ($classFee->tution_fee*4) + ($classFee->other_fee*4) + ($classFee->bus_fee*4)).'" type="number" id="total_fee">
                        <p class="text-danger"></p>
                        </div>
                     </div>
                    </div>
                    </div>
                   
';
        
        $section = Section::where(['class_id'=>$request->id,'session_id'=>$request->session])->get();
        return response()->json(['section'=>$section,'fee'=>$input]);
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
            'session' => 'required|max:199',
            'class' => 'required|numeric',
            'sectionName' => 'required|max:199'
        ]);
        $section = new Section();
        $section->name = $request->sectionName;
        $section->class_id = $request->class;
        $section->session_id = $request->session;
        if ($section->save()) {
            return redirect()->back()->with(['class'=>'success','message'=>'Class created success ...']);
        }
        return redirect()->back()->with(['class'=>'error','message'=>'Whoops ! Look like somthing went wrong ..']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SectionType  $sectionType
     * @return \Illuminate\Http\Response
     */
    public function show(Section $sectionType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SectionType  $sectionType
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $sectionEdit)
    {
        $sections = Section::all();
        $classes = array_pluck(ClassType::get(['id','alias'])->toArray(),'alias', 'id');
        $sessions = array_pluck(SessionDate::get(['id','date'])->toArray(),'date', 'id');
        return view('admin.manage.section.list',compact('sections','sectionEdit','classes','sessions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SectionType  $sectionType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Section $section)
    {
        $this->validate($request,[
            'session' => 'required|max:199',
            'class' => 'required|numeric',
            'sectionName' => 'required|max:199'
            ]);
        $section->name = $request->sectionName;
        $section->class_id = $request->class;
        $section->session_id = $request->session;
        if ($section->save()) {
            return redirect()->route('admin.section.list')->with(['class'=>'success','message'=>'Class created success ...']);
        }
        return redirect()->back()->with(['class'=>'error','message'=>'Whoops ! Look like somthing went wrong ..']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SectionType  $sectionType
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $section)
    {
        if ($section->delete()) {
            return redirect()->back()->with(['class'=>'success','message'=>'section deleted success ...']);
        }
        return redirect()->back()->with(['class'=>'error','message'=>'Whoops ! Look like somthing went wrong ..']);
    }
}
