@extends('admin.layout.auth')
@section('body')
<div class="login-box">
  <div class="login-logo">
    <a href="{{ route('student.home') }}"><b style="color:red;">ZAD  Global School</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Send Password your mobile</p>
    {!! Form::open(['route'=>'student.send-password.post']) !!}
      <div class="form-group has-feedback">
      	{!! Form::text('mobile', '', ['class'=>'form-control', 'placeholder'=>'Enter your mobile Number']) !!}
      	
        <span class="glyphicon glyphicon-phone form-control-feedback"></span>
        <p class="text-danger">{{ $errors->first('mobile') }}</p>
        
        @if(@$otp)
        {!! Form::text('otp', '', ['class'=>'form-control', 'placeholder'=>'Enter four digit otp']) !!}
        <span class="glyphicon glyphicon-phone form-control-feedback"></span>
        <p class="text-danger">{{ $errors->first('otp') }}</p>
        @endif
        
        <input class="form-control" autocomplete="off" placeholder="Enter captcha" name="captcha" type="text" value=""> {!! captcha_img() !!}
        <span class="glyphicon glyphicon-phone form-control-feedback"></span>
        <p class="text-danger">{{ ($errors->first('captcha'))?'Invalid Captcha':'' }}</p>
      </div>
      
       
      <div class="row">
       <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
        </div>
        <!-- /.col -->
        <div class="col-xs-6 col-xs-offset-1">
          {{-- <div class="checkbox icheck">
            <label>
              <input type="checkbox" name="remember" value="1"> Remember Me
            </label>
          </div> --}}
          <h5><a href="{{ route('student.login.form') }}">Go to Login</a></h5>
        </div>
       
      </div>
    {!! Form::close() !!}

   
   
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
@endsection