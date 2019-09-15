@extends('admin.layout.base')
@section('body')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
        
        <a href="{{ route('admin.remarks.list') }}" >Today Remarks: {{ $dayRemarks }}</a>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <a href="{{ route('admin.enquiry.list') }}" >Today Enquiry: {{ $enquirys }}</a>
        @if( $enquirys !==0)
        <img src="{{ asset('images/news.gif') }}" width="40px" alt="enquiry">
        @endif
         
        
      </h1>
      <ol class="breadcrumb">
       <li> <i class="fa fa-envelope"></i> SMS Balance</li>
        <li>
          @php
            $url = "http://180.179.218.150/balance.asp?user=20089373&pwd=123456";
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $curl_scraped_page = curl_exec($ch);
            curl_close($ch);
          @endphp


          <input type=""   readonly="" value="{{ $curl_scraped_page }}" name="">
            {{-- <input type=""   readonly="" value="{{ $smsBalance }}" name="">  --}}
             
            </li>
 
            </li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3> {{ $huddaStudents }} </h3>
              <p>Students</p>
            </div>
            <div class="icon">
              {{-- <i class="ion ion-bag"></i> --}}
              {{-- <i class="fa fa-users"></i> --}}
              <i class="ion ion-ios-people-outline"></i>
            </div>
             <a href="{{ route('admin.student.huda') }}" class="small-box-footer">HUDA Complex </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3> {{ $jindStudents }} </h3>
              <p>Students</p>
            </div>
            <div class="icon">
              {{-- <i class="ion ion-stats-bars"></i> --}}
              {{-- <i class="fa fa-users"></i> --}}
              <i class="ion ion-ios-people-outline"></i>

            </div>
            <a href="{{ route('admin.student.jind') }}" class="small-box-footer">Jind Road</a>
          </div>
        </div>

        <!-- ./col -->
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3> {{ $omaxeStudents }} </h3>
              <p>Students</p>
            </div>
            <div class="icon">
              {{-- <i class="ion ion-stats-bars"></i> --}}
              {{-- <i class="fa fa-users"></i> --}}
              <i class="ion ion-ios-people-outline"></i>

            </div>
            <a href="{{ route('admin.student.jind') }}" class="small-box-footer">OMAXE</a>
          </div>
        </div>
        
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{$birthday_students }}</h3>

              <p>Student's Birthday</p>
            </div>
            <div class="icon">
              {{-- <i class="ion ion-person-add"></i> --}}
              <i class="ion ion-pie-graph"></i>

            </div>
            <a href="{{ route('admin.birthday.list') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
       
      </div>
      <div class="box">
        <div class="col-md-6">
          <div class="panel-group">
            <div class="panel panel-info">
              <div class="panel-heading">Quick Links</div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-6">
                    <a href="{{ route('admin.student.form') }}" type="button" class="btn btn-block btn-info btn-md"> <i class="fa fa-user"></i> 
                      Add New Student 
                    </a>
                    <a href="{{ route('admin.student.list') }}" type="button" class="btn btn-block btn-success btn-md"> 
                     <i class="fa fa-users"></i>  Student List
                    </a>
                    <a href="{{ route('admin.class.list') }}" type="button" class="btn btn-block btn-warning btn-md"> 
                    <i class="fa fa-sitemap"></i> Add Class 
                    </a>
                    <a href="{{ route('admin.section.list') }}" type="button" class="btn btn-block btn-danger btn-md"> 
                    <i class="fa fa-sitemap"></i> Add Section
                    </a>
                    <a href="{{ route('admin.transport.list') }}" type="button" class="btn btn-block btn-primary btn-md"> 
                     <i class="fa fa-bus"></i> Transport 
                    </a>
                    <a href="{{ route('admin.account.classfee.list') }}" type="button" class="btn btn-block btn-info btn-md"> 
                    <i class="fa fa-bar-chart"></i> Add Class Fees 
                    </a>
                    

                    
                    </div>
                  <div class="col-md-6">
                    <a href="{{ route('admin.attendance.student.form') }}" type="button" class="btn btn-block btn-warning btn-md"> 
                       <i class="fa fa-users"></i> Student Attendance
                      </a>
                     <a href="{{ route('admin.news.list') }}" type="button" class="btn btn-block btn-info btn-md"> 
                     <i class="fa fa-newspaper-o" aria-hidden="true"></i> Add News &amp; Events 
                    </a>
                    <a href="{{ route('admin.homework.list') }}" type="button" class="btn btn-block btn-success btn-md"> 
                     <i class="fa fa-file-text" aria-hidden="true"></i> Daily Homework 
                    </a>
                     
                    <a href="{{ route('admin.sms.homework.form') }}" type="button" class="btn btn-block btn-danger btn-md"> 
                    <i class="fa fa-envelope-open-o" aria-hidden="true"></i>  Send SMS Homework 
                    </a>
                    <a href="{{ route('admin.sms.customized.form') }}" type="button" class="btn btn-block btn-primary btn-md"> 
                    <i class="fa fa-envelope-open-o" aria-hidden="true"></i> Customized SMS 
                    </a>
                    <a href="{{ route('admin.sms.allsms.form') }}" type="button" class="btn btn-block btn-info btn-md"> 
                     <i class="fa fa-envelope-open-o" aria-hidden="true"></i> Send All Student SMS
                    </a>
                  </div>
                </div>
              
              </div>
            </div>
          </div>
        </div>
           <div class="col-md-6">
          <div class="panel-group">
            <div class="panel panel-info">
              <div class="panel-heading">Quick Links</div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-6">
                     <a href="{{ route('admin.holidayhomework.list') }}" type="button" class="btn btn-block btn-warning btn-md"> 
                     <i class="fa fa-upload" aria-hidden="true"></i> Upload Assignment 
                    </a>
                    </div>
                  <div class="col-md-6">                     
                    <a href="{{ route('admin.remarks.list') }}" type="button" class="btn btn-block btn-info btn-md"> 
                     </i>Today Remark: {{ $dayRemarks }}
                     <a href="{{ route('admin.remarks.list') }}" type="button" class="btn btn-block btn-primary btn-md"> 
                     </i>Month Remark: {{ $monthRemarks }}
                    </a>
                     <a href="{{ route('admin.remarks.list') }}" type="button" class="btn btn-block btn-danger btn-md"> 
                     </i>All Remark: {{ $allRemarks }}
                    </a>
                    <botton class="btn btn-block btn-danger btn-md"> 
                     </i>Absent Students: {{ $omaxeAbsent }}
                    </botton>
                  </div>
                  <div class="col-md-6">                     
                    
                    </a>
                  </div>
                </div>
              
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
 
@endsection
