@extends('admin.layout.base')
@push('links')
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endpush
@section('body')
<section class="content-header">
    <h1> Student Add <small>Details</small> </h1>
      <ol class="breadcrumb">
       <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>        
      </ol>
</section>
    <section class="content">
        
        {{Form::close()}}
      	<div class="box">        
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-12 ">                  
                        {{ Form::open(['route'=>'admin.student.post']) }}
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
                                                    {!! Form::select('session',$sessions, null, ['class'=>'form-control','placeholder'=>'choose Session','required']) !!}
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
                                                    {{ Form::label('date_of_admission','Date of Admission',['class'=>' control-label']) }}   
                                                    <div class="input-group">
                                                      <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                      </div>                          
                                                    {{ Form::text('date_of_admission','',array('class' => 'form-control datepicker', )) }}
                                                    </div>
                                                    <p class="text-danger">{{ $errors->first('date_of_admission') }}</p>
                                                </div>
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                             </div> {{--row end --}}
                             <div class="row">{{--row start --}}
                                <div class="col-md-12 ">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                             <div class="col-lg-4">                         
                                                <div class="form-group">
                                                    {{ Form::label('student_name','Student Name',['class'=>' control-label']) }}                         
                                                    {{ Form::text('student_name','',['class'=>'form-control required']) }}
                                                    <p class="text-danger">{{ $errors->first('student_name') }}</p>
                                                </div>
                                            </div>
                                             <div class="col-lg-4">                         
                                                <div class="form-group">
                                                    {{ Form::label('father_name','Father Name',['class'=>' control-label']) }}                         
                                                    {{ Form::text('father_name','',['class'=>'form-control required']) }}
                                                    <p class="text-danger">{{ $errors->first('father_name') }}</p>
                                                </div>
                                            </div>
                                             <div class="col-lg-4">                         
                                                <div class="form-group">
                                                    {{ Form::label('mother_name','Mother Name',['class'=>' control-label']) }}                         
                                                    {{ Form::text('mother_name','',['class'=>'form-control required']) }}
                                                    <p class="text-danger">{{ $errors->first('mother_name') }}</p>
                                                </div>
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                            </div>{{--row end --}}   
                            <div class="row">{{--row start --}}
                                <div class="col-md-12 ">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                             <div class="col-lg-4">                         
                                                <div class="form-group">
                                                    {{ Form::label('date_of_birth','Date of Birth',['class'=>' control-label']) }}      
                                                    <div class="input-group">
                                                      <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                      </div>                   
                                                        {{ Form::text('date_of_birth','',['class'=>'form-control datepicker','required']) }}
                                                    </div>
                                                   
                                                    <p class="text-danger">{{ $errors->first('date_of_birth') }}</p>
                                                </div>
                                            </div> 
                                            <div class="col-lg-4">                         
                                                <div class="form-group">
                                                    {{ Form::label('religion','Religion',['class'=>' control-label']) }}
                                                    {!! Form::select('religion',
                                                    [
                                                       'Hindu' => 'Hindu',
                                                       'Muslim' => 'Muslim',
                                                       'Sikh' => 'Sikh', 
                                                       'Christian' => 'Christian',
                                                       'Other' => 'other',
                                                    ]
                                                    , null, ['class'=>'form-control','placeholder'=>'Select Religion','required']) !!}
                                                    <p class="text-danger">{{ $errors->first('religion') }}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">                         
                                                <div class="form-group">
                                                    {{ Form::label('category','Category',['class'=>' control-label']) }}
                                                    {!! Form::select('category',
                                                    [
                                                       'General' => 'General',
                                                       'OBC' => 'OBC',
                                                       'SC' => 'SC',
                                                       'ST' => 'ST',
                                                    ]
                                                    , null, ['class'=>'form-control','placeholder'=>'Select Religion','required']) !!}
                                                    <p class="text-danger">{{ $errors->first('category') }}</p>
                                                </div>
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                             </div> {{--row end --}} 
                             <div class="row">{{--row start --}}
                                <div class="col-md-12 ">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                             <div class="col-lg-4">                         
                                                <div class="form-group">
                                                    {{ Form::label('address','Address',['class'=>'control-label']) }}
                                                     {{ Form::textarea('address','',['class'=>'form-control','rows'=>2  ,'style'=>'resize:none']) }}
                                                     <p class="text-danger">{{ $errors->first('address') }}</p>
                                                </div>
                                            </div>
                                             <div class="col-lg-2">                         
                                                <div class="form-group">
                                                    {{ Form::label('state','State',['class'=>' control-label']) }}
                                                    {!! Form::text('state', '', ['class'=>'form-control','placeholder'=>'Select State','required']) !!}
                                                    <p class="text-danger">{{ $errors->first('state') }}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">                         
                                                <div class="form-group">
                                                    {{ Form::label('city','City',['class'=>' control-label']) }}
                                                    {!! Form::text('city','', ['class'=>'form-control','placeholder'=>'Select Section','required']) !!}
                                                    <p class="text-danger">{{ $errors->first('city') }}</p>
                                                </div>
                                            </div>
                                             <div class="col-lg-4">                         
                                                <div class="form-group">
                                                    {{ Form::label('pincode','Pincode',['class'=>' control-label']) }}                         
                                                    {{ Form::text('pincode','',array('class' => 'form-control' )) }}
                                                    <p class="text-danger">{{ $errors->first('pincode') }}</p>
                                                </div>
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                            </div> {{--row end --}}               
                            <div class="row">{{--row start --}}
                                <div class="col-md-12 ">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                             <div class="col-lg-4">                         
                                                <div class="form-group">
                                                    {{ Form::label('mobile_one','Contact Mobile Number',['class'=>' control-label']) }}                         
                                                    {{ Form::text('mobile_one','',['class'=>'form-control required']) }}
                                                    <p class="text-danger">{{ $errors->first('mobile_one') }}</p>
                                                     
                                                </div>
                                            </div>
                                             <div class="col-lg-4">                         
                                                <div class="form-group">
                                                    {{ Form::label('mobile_two','Contact Mobile Number',['class'=>' control-label']) }}                         
                                                    {{ Form::text('mobile_two','',['class'=>'form-control required']) }}
                                                    <p class="text-danger">{{ $errors->first('mobile_two') }}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">                         
                                                <div class="form-group">
                                                    {{ Form::label('mobile_sms','Contact SMS Mobile Number ',['class'=>' control-label']) }}                         
                                                    {{ Form::text('mobile_sms','',['class'=>'form-control required']) }}
                                                    <p class="text-danger">{{ $errors->first('mobile_sms') }}</p>

                                                </div>
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                            </div>{{--row end --}}  
                            <hr> 
                            <div class="row">{{--row start --}}
                            <div class="col-md-12">
                               <div class="col-md-4 ">
                                        <div class="form-group">
                                            {!! Form::checkbox('transport', 1, '', ['id'=>'transport']) !!}
                                           {{ Form::label('route','Route',['class'=>' control-label']) }}
                                            {!! Form::select('route',$routes, '', ['class'=>'form-control','disabled','placeholder'=>'Select Route','required']) !!}
                                            <p class="text-danger">{{ $errors->first('route') }}</p>
                                        </div>
                                        <p id="driver">
                                            
                                        </p>
                                    </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        {{ Form::label('discount_type','Discount Type',['class'=>' control-label']) }}
                                        {!! Form::select('discount_type',$discounts, null, ['class'=>'form-control','placeholder'=>'Select Discount','required']) !!}
                                        <p class="text-danger">{{ $errors->first('discount') }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        {{ Form::label('payment_type','Payment Type',['class'=>' control-label']) }}
                                        {!! Form::select('payment_type',$paymenttypes, null, ['class'=>'form-control','placeholder'=>'Select payment','required']) !!}
                                        <p class="text-danger">{{ $errors->first('payment_type') }}</p>
                                    </div>
                                </div>
                               
                               
                            </div>
                            </div>{{--row end --}}  

                            <hr> 
                            <div class="col-md-12">
                                <div id="formFee">
                                    
                                </div>
                            </div>
                                <hr>
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
    
    routeSearch();
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
    function transportSearch (value,center_id){
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
    $("#session").change(function(){
        $('#class').html('<option value="">Searching ...</option>');
        $.ajax({
          method: "get",
          url: "{{ route('admin.class.search2') }}",
          data: { id: $(this).val(), center_id: $('input[name="center"]:checked').val() }
        })
        .done(function( response ) {            
            if(response.length>0){
                $('#class').html('<option value="">Select Class</option>');
                for (var i = 0; i < response.length; i++) {
                    $('#class').append('<option value="'+response[i].id+'">'+response[i].alias+'</option>');
                } 
            }
            else{
                $('#class').html('<option value="">Not found</option>');
            }
            
        });
    });
    $("#class").change(function(){
        $('#section').html('<option value="">Searching ...</option>'); 
        $('#formFee').html('');       
        $.ajax({
          method: "get",
          url: "{{ route('admin.section.search') }}",
          data: { id: $(this).val(), session: $('#session').val(), center_id: $('input[name="center"]:checked').val() }
        })
        .done(function( response ) {
            $('#formFee').html(response.fee);
            if(response.section.length>0){
               $('#section').html('<option value="">Select Section</option>');
                for (var i = 0; i < response.section.length; i++) {
                    $('#section').append('<option value="'+response.section[i].id+'">'+response.section[i].name+'</option>');
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
    });
    $('#formFee').on('input[type="number"]').keyup(function(){
        if($(this).val() == null || $(this).val() < 0){
            $(this).val('0');
        }
        var sum = 0;
        $("input[class *= 'classfee']").each(function(){
            sum += +$(this).val();
        });
        $("#total_fee").val(sum);
    });
    $('#formFee').on('input[type="number"]').change(function(){
        if($(this).val() == null || $(this).val() < 0){
            $(this).val('0');
        }
        var sum = 0;
        $("input[class *= 'classfee']").each(function(){
            sum += +$(this).val();
        });
        $("#total_fee").val(sum);
    });
    $('#center1').attr('checked',true);
</script>

@endpush