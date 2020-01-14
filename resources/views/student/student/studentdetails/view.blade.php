 @extends('student.layout.base')
@push('links')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endpush
@section('body')

    <section class="content">
      <section class="content-header">
      <h1>
        Student 
        <small>details</small>
      </h1>
     
    </section>
      <div class="box">   
      
         
          <div class="box-body"> 
           <div class="col-md-2 text-center" >
                @php
               $student = Auth::guard('student')->user();
                $profile = route('student.student.image',$student->picture);
                @endphp
                  
              <img style="width:150px;padding:5px;  height:150px; margin-right:10px; "  class="img-thumbnail" src="{{  ($student->picture)? $profile : asset('profile-img/user.png') }}">               
                <h3 class="hidden-xs" style="text-transform: capitalize;"> <b>{{ $student->name }} </b></h4>  
              </div> 
              <div class="col-md-10">               
                 <div class="row">
                    <div class="col-md-6">
                     <hr>
                      <h4> Name : <b>{{ $student->name }}</b></h4>
                      <hr>
                      <h4> Student Id : <b>{{ $student->username }}</b></h4><hr>
                      <h4> Father's Name : <b>{{ $student->father_name }}</b></h4><hr>
                      <h4> Mother's Name : <b>{{ $student->mother_name }}</b></h4>
                      <hr>
                       <h4> Mobile NUmber : <b>{{ $student->mobile_sms }}</b></h4><hr>
                      <h4> Date Of Birth : <b>{{ $student->dob }}</b></h4><hr>
                      

                     
                     
                    </div>
                    <div class="col-md-6">
                      <h4> Class : <b>{{ $student->classes->name }}</b></h4><hr>  
                      <h4> Section : <b>{{ $student->sections->name }}</b></h4><hr>

                      <h4> Center : <b>{{ $student->centers->name }}</b></h4><hr>    
                      <h4> Session : <b>{{ $student->sessions->date }}</b></h4><hr>
                      
                       <h4> Date Of Admission : <b>{{ $student->date_of_admission }}</b></h4><hr>   
                    </div>
                     <div class="col-md-12">
                      <h4> Address : <b>{{ $student->address }}</b></h4><hr>
                      </div>
                  </div>
              </div>
                   
            </div>
            <!-- /.box-body -->
        </div>
          <!-- /.box -->
          <!-- Trigger the modal with a button -->
         

    </section>
    <!-- /.content -->
    <!-- Trigger the modal with a button -->
 
@if($student->payment_type_id )
@php
  @$balFee=$student->classFee->total_fee-$totalFee ;
@endphp
<!-- Modal -->
<div id="addfee" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
    {{ Form::open(['route'=>'admin.student.fee.paid']) }}
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Pay Fee</h4>
      </div>
      <div class="modal-body">         
      <div class="row">
      
             {!! Form::hidden('student_id', $student->id, []) !!}  
                                 
      <div class="row">{{--row start --}}
          <div class="col-md-12 ">
              <div class="form-group">
                  <div class="col-md-12">
                       <div class="col-lg-6 ">                         
                          <div class="form-group">
                              {{ Form::label('total_fees','Total Fees',['class'=>' control-label']) }}                         
                              {{ Form::text('total_fees',@$student->classFee->total_fee,['class'=>'form-control','required','readonly']) }}
                              <p class="text-danger">{{ $errors->first('total_fees') }}</p>
                          </div>
                      </div>
                       <div class="col-lg-6">                         
                          <div class="form-group">
                              {{ Form::label('installment_fees','Installment Fees',['class'=>' control-label']) }}                         
                              {{ Form::text('installment_fees',@$instalfee=$student->classFee->total_fee/$student->paymentType->times,['class'=>'form-control','required','readonly']) }}
                              <p class="text-danger">{{ $errors->first('installment_fees') }}</p>
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
                       <div class="col-lg-6 ">                         
                          <div class="form-group">
                              {{ Form::label('discount_type','Discount Type',['class'=>' control-label']) }} 
                              {!! Form::hidden('discount_type_id', $student->discountType->id, []) !!}                        
                              {{ Form::text('discount_name',$student->discountType->name ,['class'=>'form-control','required','readonly']) }}
                              <p class="text-danger">{{ $errors->first('discount_type_id') }}</p>
                          </div>
                      </div>
                       <div class="col-lg-6">                         
                          <div class="form-group">
                              {{ Form::label('discount','Discount',['class'=>' control-label']) }}
                              @if($student->discount_type_id == 1)                    
                              {{ Form::text('discount',$discountfee=0,['class'=>'form-control','required','readonly']) }}     
                              @elseif($student->discount_type_id == 2)                    
                              {{ Form::text('discount',@$discountfee=($student->classFee->tution_fee*$student->discountType->tution_fees)/100,['class'=>'form-control','readonly']) }}
                              @elseif($student->discount_type_id == 3)
                              {{ Form::text('discount',$discountfee=0,['class'=>'form-control']) }}
                              
                              @endif
                              <p class="text-danger">{{ $errors->first('discount') }}</p>
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
                       <div class="col-lg-6 ">                         
                          <div class="form-group">
                              {{ Form::label('receipt_no','Receipt No *',['class'=>' control-label']) }}                         
                              {{ Form::text('receipt_no','',['class'=>'form-control required','autocomplete'=>'off']) }}
                              <p class="text-danger">{{ $errors->first('receipt_no') }}</p>
                          </div>
                      </div>
                       <div class="col-lg-6">                         
                          <div class="form-group">
                              {{ Form::label('receipt_date','Receipt Date',['class'=>' control-label']) }}                         
                              {{ Form::text('receipt_date','',['class'=>'form-control datepicker','required','autocomplete'=>'off']) }}
                              <p class="text-danger">{{ $errors->first('receipt_date') }}</p>
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
                      <div class="col-lg-6">                         
                          <div class="form-group">
                          
                              {{ Form::label('other_fee','Other Fee',['class'=>' control-label']) }}                         
                              {{ Form::number('other_fee','',['class'=>'form-control required']) }}
                              <p class="text-danger">{{ $errors->first('other_fee') }}</p>
                          </div>
                      </div>
                      <div class="col-lg-6 ">                         
                          <div class="form-group">
                              {{ Form::label('amount_payable','Amount Payable ',['class'=>' control-label']) }}                         
                              {{ Form::number('amount_payable',$amount_payble=$instalfee-$discountfee,['class'=>'form-control required']) }}
                              <p class="text-danger">{{ $errors->first('received_fees') }}</p>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>{{--row end --}}
      <hr>
      <div class="row">{{--row start --}}
          <div class="col-md-12 ">
          <h5 style="margin-left: 30px;">If Payment Mode is Cheque</h5>
              <div class="form-group">
                  <div class="col-md-12">
                       <div class="col-lg-4">                         
                          <div class="form-group">
                              {{ Form::label('cheque_no','Cheque No',['class'=>' control-label']) }}                         
                              {{ Form::text('cheque_no','',['class'=>'form-control']) }}
                              <p class="text-danger">{{ $errors->first('cheque_no') }}</p>
                          </div>
                      </div>
                       <div class="col-lg-4">                         
                          <div class="form-group">
                              {{ Form::label('bank_name','Bank Name',['class'=>' control-label']) }}                         
                              {{ Form::text('bank_name','',['class'=>'form-control']) }}
                              <p class="text-danger">{{ $errors->first('bank_name') }}</p>
                          </div>
                      </div>
                       <div class="col-lg-4">                         
                          <div class="form-group">
                              {{ Form::label('cheque_date','Cheque Date',['class'=>' control-label']) }}                         
                              {{ Form::text('cheque_date','',['class'=>'form-control datepicker']) }}
                              <p class="text-danger">{{ $errors->first('cheque_date') }}</p>
                          </div>
                      </div>  
                  </div>
              </div>
          </div>
      </div>{{--row end --}} 
         
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Submit</button>
      </div>
      {{ Form::close() }}
    </div>

  </div>
</div>
</div>

@endif
@endsection
@push('links')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
@endpush
 @push('scripts')

 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <script type="text/javascript">
     $(document).ready(function(){
      $( ".datepicker" ).datepicker({dateFormat:'dd-mm-yy'});
        $('#dataTable').DataTable();
    });
     var errors = '{{ $errors->first() }}';
     if (errors) {
      $("#addfee").modal('show');
     }
 </script>
 <script type="text/javascript">
  $(document).ready(function(){
    $('#showImg').on('click','a',function(){
      $('#showImg').hide();
      $('#changeImg').removeClass('hidden');
    });
    
    $('#changeImg').on('click','a',function(){
      $('#changeImg').addClass('hidden');
      $('#showImg').show();
    });
  });
</script>
@endpush