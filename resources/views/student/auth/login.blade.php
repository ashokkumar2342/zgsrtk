@extends('admin.layout.auth')
@section('body')
<div class="login-box">
  <div class="login-logo">
    <a href="{{ route('student.home') }}"><b style="color:red;">ZAD  Global School</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>
    {{-- {{ Auth::user()->name }} --}}
    {!! Form::open(['route'=>'student.login.post']) !!}
      <div class="form-group has-feedback">
      	{!! Form::text('username', '', ['class'=>'form-control', 'placeholder'=>'Username']) !!}
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        <p class="text-danger">{{ $errors->first('username') }}</p>
      </div>
      
      <div class="form-group has-feedback">
      {!! Form::password('password', ['class'=>'form-control', 'placeholder'=>'Password']) !!}
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <p class="text-danger">{{ $errors->first('password') }}</p>
      </div>
    <div class="row">
        
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
        <div class="col-xs-6 col-xs-offset-1">
          {{-- <div class="checkbox icheck">
            <label>
              <input type="checkbox" name="remember" value="1"> Remember Me
            </label>
          </div> --}}
          <h5><a href="{{ route('student.forgetpassword.form') }}">Forget Password</a></h5>
        </div>
        <!-- /.col -->
      </div>
    {!! Form::close() !!}

   
   
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
@endsection