 
                                <div id="formFee2">
                                <div class="row">
                                 
                                 <hr> 
                      <div class="col-lg-3">                         
                       <div class="form-group">
                        {{ Form::label('admission_fees','Admission Fees (In Rs.)',['class'=>' control-label']) }}
                        {{ Form::text('admission_fees',$student->admission_fee,['class'=>'form-control classfee required']) }}
                        <p class="text-danger">{{ $errors->first('admission_fees') }}</p>
                        </div>
                     </div>
                       <div class="col-lg-3">                         
                       <div class="form-group">
                        {{ Form::label('admission_fees','Admission Form Fees (In Rs.)',['class'=>' control-label']) }}
                        {{ Form::text('admission_form_fees',$student->admission_form_fee,['class'=>'form-control classfee required']) }}
                        <p class="text-danger">{{ $errors->first('admission_fees') }}</p>
                        </div>
                     </div>
                     <div class="col-lg-3">                         
                       <div class="form-group">
                        <label for="registration_fees" class=" control-label">Registration Fees (In Rs.)</label>
                        <input class="form-control required classfee"  value="{{ $student->registration_fee }}" name="registration_fees" type="number" id="registration_fees">
                        <p class="text-danger"></p>
                        </div>
                     </div>
                     <div class="col-lg-3">                         
                       <div class="form-group">
                        <label for="annual_charges" class=" control-label">Annual Charges (In Rs.)</label>
                        <input class="form-control required classfee"  value="{{ $student->annual_charge }}" name="annual_charges" type="number">
                        <p class="text-danger"></p>
                        </div>
                     </div>
                     
                     </div>
                     <hr>
                     <div class="row">

                      <div class="col-lg-3">                         
                       <div class="form-group">
                        <label for="caution_money" class=" control-label">Meal (In Rs.)</label>
                        <input class="form-control required classfee"  value="{{ $student->caution_money }}" name="caution_money" type="number" id="caution_money">
                        <p class="text-danger"></p>
                        </div>
                     </div>
                     
                     <div class="col-lg-3">                         
                       <div class="form-group">
                        <label for="activity_charges" class=" control-label">Activity Charges (In Rs.)</label>
                        <input class="form-control required classfee" name="activity_charges"  value="{{ $student->activity_charge }}" type="number" id="activity_charges">
                        <p class="text-danger"></p>
                        </div>
                     </div>
                     <div class="col-lg-3">                         
                       <div class="form-group">
                        <label for="smart_class_fees" class=" control-label">Smart Class Fees (In Rs.)</label>
                        <input class="form-control required classfee"  value="{{ $student->smart_class_fee }}" name="smart_class_fees" type="number" id="smart_class_fees">
                        <p class="text-danger"></p>
                        </div>
                     </div>
                     <div class="col-lg-3">                         
                       <div class="form-group">
                        <label for="tution_fees" class=" control-label">Tuition Fees (In Rs.)</label>
                        <input class="form-control required classfee"  value="{{ $student->tution_fee }}" name="tution_fees" type="number" id="tution_fees">
                        <p class="text-danger"></p>
                        </div>
                     </div>
                     <div class="col-lg-3">                         
                       <div class="form-group">
                        <label for="sms_charges" class=" control-label">Sms Charges (In Rs.)</label>
                        <input class="form-control required classfee" name="sms_charges" value="{{ $student->sms_charge }}" type="number" id="sms_charges">
                        <p class="text-danger"></p>
                        </div>
                     </div>
                     
                      
                          <hr>
                          </div>
                      </div>