@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <h1> Student Fee <small>Details</small> </h1>
      <ol class="breadcrumb">
       <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>        
      </ol>
</section>
    <section class="content">
        <div class="box">        
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-12 "> 
                    {{$errors->first()}}
                           {{ Form::open(['route'=>['admin.student.totalfeeupdate',$student->id]]) }}
                        
                             <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <div class="form-group">
                                        @php
                                            $n = 12/count($centers);
                                        @endphp
                                        @foreach($centers as $center)
                                            <div class="col-lg-{{ $n }}">
                                                <div class="radio-custom radio-danger">
                                                    {!! Form::radio('center', $center->id, '', ['id'=>'center'.$center->id]) !!}
                                                    {!! Form::label('center'.$center->id, $center->name, ['class'=>'control-label','style'=>'cursor:pointer']) !!}
                                                </div>
                                            </div>
                                        @endforeach
                                        <p class="text-danger">{{ $errors->first('center') }}</p>
                                    </div>
                                </div>
                            </div>                    
                            <hr>
                             <div class="row">{{--row start --}}
                                <div class="col-md-12 ">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                             <div class="col-lg-4">                         
                                                <div class="form-group">
                                                    {{ Form::label('session','Session',['class'=>' control-label']) }}                         
                                                    {!! Form::select('session',$sessions, $student->sessions->id, ['class'=>'form-control','placeholder'=>'choose Session','required']) !!}
                                                    <p class="text-danger">{{ $errors->first('session') }}</p>
                                                </div>
                                            </div>
                                             <div class="col-lg-2">                         
                                                <div class="form-group">
                                                    {{ Form::label('class','Class',['class'=>' control-label']) }}
                                                    {!! Form::select('class',[], null, ['class'=>'form-control','placeholder'=>'Select Class','required']) !!}
                                                    <p class="text-danger">{{ $errors->first('session') }}</p>
                                                </div>
                                            </div>
                                                <div class="col-lg-2">                         
                                                <div class="form-group">
                                                    {{ Form::label('section','Section',['class'=>' control-label']) }}
                                                    {!! Form::select('section',[]
                                                    , null, ['class'=>'form-control','placeholder'=>'Select Section','required']) !!}
                                                    <p class="text-danger">{{ $errors->first('session') }}</p>
                                                </div>
                                            </div>
                                           <div class="col-lg-4">                         
                                                <div class="form-group">
                                                    {{ Form::label('student_name','Student Name',['class'=>' control-label']) }}
                                                    {{ Form::text('student_name',$student->name,['class'=>'form-control required']) }}
                                                    <p class="text-danger">{{ $errors->first('student_name') }}</p>
                                                </div>
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                             </div> {{--row end --}}                            
                            
                            <hr> 
                            <div class="row">{{--row start --}}
                           
                                <div class="col-md-12">
                                    <div class="col-md-4 ">
                                        <div class="form-group">
                                            {!! Form::checkbox('transport', 1, '', ['id'=>'transport']) !!}
                                           {{ Form::label('route','Route',['class'=>' control-label']) }}
                                            {!! Form::select('route',$routes, $student->route_id, ['class'=>'form-control','disabled','placeholder'=>'Select Route','required']) !!}
                                            <p class="text-danger">{{ $errors->first('route') }}</p>
                                        </div>
                                        <p id="driver">
                                            
                                        </p>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {{ Form::label('discount_type','Discount Type',['class'=>' control-label']) }}
                                            {!! Form::select('discount_type',$discounts, $student->discount_type_id, ['class'=>'form-control','placeholder'=>'Select Discount','required']) !!}
                                            <p class="text-danger">{{ $errors->first('discount') }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {{ Form::label('payment_type','Payment Type',['class'=>' control-label']) }}
                                            {!! Form::select('payment_type',$paymenttypes, $student->payment_type_id, ['class'=>'form-control','placeholder'=>'Select payment','required']) !!}
                                            <p class="text-danger">{{ $errors->first('payment_type') }}</p>
                                        </div>
                                    </div>
                                   
                                </div>{{--row end --}}  
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
                      <div class="col-lg-3">                         
                       <div class="form-group">
                        <label for="transport_fees" class=" control-label">Transport Fees (In Rs.)</label>
                        <input class="form-control required classfee"  value="{{ $student->transport_fee }}" name="transport_fees" type="number" id="transport_fees">
                        <p class="text-danger"></p>
                        </div>
                     </div>
                     <div class="col-lg-3">                         
                       <div class="form-group">
                        <label for="total_fee" class=" control-label">Total Fee (In Rs.)</label>
                        <input class="form-control required " name="total_fee" value="{{ $student->transport_fee + $student->sms_charge + $student->tution_fee + $student->smart_class_fee + $student->activity_charge + $student->caution_money + $student->annual_charge + $student->registration_fee + $student->admission_fee + $student->admission_form_fee  }}" type="number" id="total_fee">
                        <p class="text-danger"></p>
                        </div>
                     </div>
                    </div>
                          <hr>
                          </div>
                      </div>
                      <hr> 
                    </div>
                       <div class="row">
                          <div class="col-md-12 text-center">
                              <button class="btn btn-success">Submit</button>
                          </div>
                      </div>
                  {{ Form::close() }}
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
 @push('scripts')
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <script type="text/javascript">
    $( ".datepicker" ).datepicker({dateFormat:'dd-mm-yy'});
    var transportId = '{{ $student->transport_id }}';
    $("input[name='center']").change(function(){
        transportSearch($('#route').val(),$(this).val());
    });
    $("#session").change(function(){
       classSearch($(this).val()); 
    });
    $("#class").change(function(){
        sectionSearch($(this).val());
    });
    $("#transport").change(function(){
        $("#route").prop('disabled',function(i,v){
            if(v){
                routeSearch();
                 $('#transport_fees').attr('disabled',false);
                $('#total_fee').val(parseInt($('#total_fee').val())+parseInt($('#transport_fees').val()));
            }
            else if(!v){
                $('#driver').html('');
                $('#route').html('<option value="">transport facility disabled</option>');
                 $('#transport_fees').attr('disabled',true);
                $('#total_fee').val(parseInt($('#total_fee').val())-parseInt($('#transport_fees').val()));
            }
            return !v;
        });
    });

    $("#route").change(function(){
        transportSearch($(this).val(),$('input[name="center"]:checked').val());
    });
    if ($("#session").val() > 0) {
        classSearch($("#session").val(),{{ $student->class_id }}); 
    }
    if (transportId > 0) {
        $("#transport").prop('checked',true);
        $("#route").prop('disabled',function(i,v){return !v;});
        $("#driver").html('');
    }
    routeSearch();
    function classSearch(value,selectVal=null){
        var selected = null;
        $('#class').html('<option value="">Searching ...</option>');
        $.ajax({
          method: "get",
          url: "{{ route('admin.class.search2') }}",
          data: { id: value, center_id: value}
        })
        .done(function( response ) {            
            if(response.length>0){
                $('#class').html('<option value="">Select Class</option>');
                for (var i = 0; i < response.length; i++) {
                    if(selectVal>0){
                        selected = (selectVal==response[i].id)?'selected':'';
                        sectionSearch(selectVal,value,{{ $student->section_id }});
                    }
                    
                    $('#class').append('<option value="'+response[i].id+'"'+selected+'>'+response[i].alias+'</option>');
                } 
            }
            else{
                $('#class').html('<option value="">Not found</option>');
            }
            
        });
    }
    function sectionSearch (value,sessions,selectVal=null){
        var selected = null;
        $('#section').html('<option value="">Searching ...</option>'); 
        $('#formFee').html('sessions');       
        $.ajax({
          method: "get",
          url: "{{ route('admin.section.search') }}",
          data: { id: value, session:sessions, center_id: $('input[name="center"]:checked').val() }
        })
        .done(function( response ) {
            $('#formFee').html(response.fee);
            if(response.section.length>0){
               $('#section').html('<option value="">Select Section</option>');
                for (var i = 0; i < response.section.length; i++) {
                    if(selectVal>0){
                        selected = (selectVal==response.section[i].id)?'selected':'';
                    }
                    $('#section').append('<option value="'+response.section[i].id+'"'+selected+'>'+response.section[i].name+'</option>');
                } 
                if($("#transport").is(":checked")){
                    $('#transport_fees').attr('disabled',false);
                }
                else{
                    $('#transport_fees').attr('disabled',true);
                    $('#total_fee').val(parseInt($('#total_fee').val())-parseInt($('#transport_fees').val()));
                }
            }
            else{
                $('#section').html('<option value="">Not found</option>');
            }
            
        });
    }
    function routeSearch (){
        $('#route').html('<option value="">Searching ...</option>'); 
        $.ajax({
            method: "get",
            url: "{{ route('admin.route.search') }}",
        })
        .done(function( response ) {
            if (response.length>0) {
                $('#route').html('<option value="">Select Route</option>');
                for (var i = 0; i < response.length; i++) {
                    $('#route').append('<option value="'+response[i].id+'">'+response[i].name+'</option>');
                }
            }
            else{
                $('#route').html('<option value="">route not avilable</option>');
            }
        });
    }
    function transportSearch (value,center_id,selectVal=null){
        $('#driver').html('Searching ...');   
        $.ajax({
          method: "get",
          url: "{{ route('admin.transport.search') }}",
          data: { route_id: value, center_id: center_id  }
        })
        .done(function( response ) {
            if (response.length>0) {
                $('#driver').html(response);
            }
            else{
                $('#driver').html('driver not avilable');
            }
        });
    }
     $('#formFee2').on('input[type="number"]').keyup(function(){
        if($(this).val() == null || $(this).val() < 0){
            $(this).val(0);
        }
        var sum = 0;
        $("input[class *= 'classfee']").each(function(){
            sum += +$(this).val();
        });
        $("#total_fee").val(sum);
    });



    $('#center{{$student->centers->id}}').attr('checked',true);
</script>
 

@endpush