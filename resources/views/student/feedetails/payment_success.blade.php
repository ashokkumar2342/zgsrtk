@extends('student.layout.auth')
@section('body')
 
<style>
  .fontSty{
    font-size: 14px;
   
    font-weight: bold;
    test-f
  }
</style>
 
<div class="login-box">
  <div class="login-logo">
    <a href="{{ route('student.home') }}"><b style="color:red;">ZAD  Global School</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">
      
      @if ($oph->order_status=='Success') 
      <h4 class="alert-success" style="padding: 10px">Transaction Successfully</h4>
       @else
         <h4 class="alert-danger" style="padding: 10px">Transaction Failed</h4>
      @endif
     
    </p>
    <div class="row fontSty">
      <div class="col-lg-6 ">
        Reference No :  
      </div> 
      <div class="col-lg-6">
         {{ $oph->tracking_id  }}
      </div>
      <div class="col-lg-6">
        Amount :  
      </div> 
      <div class="col-lg-6">
         {{ $oph->amount  }}
      </div>
      <div class="col-lg-6">
        Name :  
      </div> 
      <div class="col-lg-6">
         {{ $oph->billing_name  }}
      </div>
      
     
      <div class="col-lg-6">
        Date :  
      </div> 
      <div class="col-lg-6">
         {{ $oph->trans_date  }}
      </div>
     </div>
     <br>
    <p class="text-center">
      <a href="{{ route('student.feedetails.list') }}" title="" class="btn btn-success">
      Go To Fee Details</a>
    </p>
    </div>
     
   
   
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
@endsection