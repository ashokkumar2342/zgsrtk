 @extends('student.layout.base')
 @push('links')
 <style type="text/css">
 
.btn-circle {
  width: 20px;
  height: 20px;
  text-align: center;
  padding: 6px 0;
  font-size: 12px;
  line-height: 1.428571429;
  border-radius: 15px;
}
.btn-circle.btn-lg {
  width: 50px;
  height: 50px;
  padding: 10px 16px;
  font-size: 18px;
  line-height: 1.33;
  border-radius: 25px;
}
.btn-circle.btn-xl {
   width: 52px;
  height: 52px;
  padding: 10px 16px;
  font-size: 18px;
  line-height: 1.33;

  border-radius: 25px;
   -webkit-box-shadow: 0px 0px 0px 3px rgba(0,0,0,0.2);
    -moz-box-shadow: 0px 0px 0px 3px rgba(0,0,0,0.2);
    box-shadow: 0px 0px 0px 3px rgba(0,0,0,0.04);
}

 </style>
 @endpush
@section('body')
	<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="row" >
        <div class="col-xs-12 hidden-sm hidden-md hidden-lg text-center" style=" position: relative;
    top: -10px; ">
          @php
         $student = Auth::guard('student')->user();
        $profile = route('student.student.image',$student->picture);
       @endphp
       <img class="user-image img-circle" height="90px;" src="{{  ($student->picture)? $profile : asset('profile-img/user.png') }}">
         
        <p> <span style="font-size:21px; text-transform: capitalize;">  {{ Auth::guard('student')->user()->name}} </span>
        <span style="font-size: 13px;">( {{Auth::guard('student')->user()->classes->alias }} )</span>
        </p>
        </div>
      </div>  
       
     
     {{--  <ol class="breadcrumb hidden-xs">
        <li><a href="{{ route('student.dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol> --}}
    </section>
 	<!-- Main content -->
   {{--  <section class="content hidden-xs">
        <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
                @php
                  $totalDepFee = 0;
                 foreach ($student->studentFee as $studentFe):
                   $totalDepFee += $studentFe->discount+$studentFe->received_fee;
                 endforeach
                 @endphp
                      <h4> Balance : <b>{{$student->totalFee-$totalDepFee }}</b></h4>  
              <p>Total Balance</p>
            </div>
            <div class="icon">
            <i class="fa fa-inr" aria-hidden="true"></i>
              
            </div>
            <a href="{{ route('student.feedetails.list') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
            
                <h3>200</h3>

              <p>Paid Fees</p>
            </div>
            <div class="icon">
              <i class="fa fa-inr" aria-hidden="true"></i>
            </div>
            <a href="{{ route('student.feedetails.list') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>44 </h3>
              <p>Present</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>65</h3>

              <p>Absent</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
    </section> --}}
    <!-- /.content -->

    <section class="content hidden-lg hidden-sm">
        <div class="row">
         <div class="col-lg-3 col-xs-4 text-center ">
            <!-- small box -->
              <a href="{{ route('student.view') }}"><button type="button" class="btn btn-default btn-circle btn-xl"><i class="glyphicon glyphicon-user" style="color:#8bc34a"></i></button> 
                <h4>My Profile</h4>
                </a> 
          </div>
          <!-- ./col -->
           <div class="col-lg-3 col-xs-4 text-center">
            <!-- small box -->
              <a href="{{ route('student.attendance.view') }}"><button type="button" class="btn btn-default btn-circle btn-xl"><i class="glyphicon glyphicon-calendar " style="color:#47aaff"></i></button> 
                <h4>Attendance</h4>
                </a> 
          </div>
          <!-- ./col -->
           <div class="col-lg-3 col-xs-4 text-center">
            <!-- small box -->
              <a href="{{ route('student.homework.list') }}"><button type="button" class="btn btn-default btn-circle btn-xl"><i class="fa fa-pencil-square-o" style="color:#d416f5" aria-hidden="true"></i></button> 
                <h4>Homework</h4>
                </a> 
          </div>
       
          <!-- ./col -->
           <div class="col-lg-3 col-xs-4 text-center">
            <!-- small box -->
              <a href="{{ route('student.feedetails.list') }}"><button type="button" class="btn btn-default btn-circle btn-xl"><i class="fa fa-inr text-warning" style="color:#efab0d" aria-hidden="true"></i></button> 
                <h4>Fees</h4>
                </a> 
          </div>
          <!-- ./col -->
           <div class="col-lg-3 col-xs-4 text-center">
            <!-- small box -->
              <a href="{{ route('student.news.list') }}"><button type="button" class="btn btn-default btn-circle btn-xl"><i class="fa fa-sticky-note text-info" style="color:#00a65a" aria-hidden="true"></i></button> 
                <h4>Notices</h4>
                </a> 
          </div>
          <!-- ./col -->
           <div class="col-lg-3 col-xs-4 text-center">
            <!-- small box -->
              <a href="{{ route('student.holidayhomework.list') }}"><button type="button" class="btn btn-default btn-circle btn-xl"><i class="fa fa-file-pdf-o text-success" style="color:#f44336" aria-hidden="true"></i></button> 
                <h4>Assignment</h4>
                </a> 
          </div>
          <!-- ./col -->
          {{--  <div class="col-lg-3 col-xs-4 text-center">
            
              <a href="{{ route('student.result.list') }}"><button type="button" class="btn btn-default btn-circle btn-xl"><i class="fa fa-list-alt text-primary" style="color:#079e90" aria-hidden="true"></i></button> 
                <h4>Result</h4>
                </a> 
          </div> --}}
          <!-- ./col -->
           <div class="col-lg-3 col-xs-4 text-center">
            <!-- small box -->
              <a href="{{ route('student.circular.list') }}"><button type="button" class="btn btn-default btn-circle btn-xl"><i class="glyphicon glyphicon-list " style="color: #2196f3"></i></button> 
                <h4>Circular</h4>
                </a> 
          </div>
          <!-- ./col -->
           <div class="col-lg-3 col-xs-4 text-center">
            <!-- small box -->
              <a href="{{ route('student.communicate.list') }}"><button type="button" class="btn btn-default btn-circle btn-xl"><i class="fa fa-file-video-o text-info" style="color:#14c38c" aria-hidden="true"></i></button> 
                <h4>Video</h4>
                </a> 
          </div>
          <!-- ./col -->
           <div class="col-lg-3 col-xs-4 text-center">
            <!-- small box -->
              <a href="{{ route('student.gallery.list') }}"><button type="button" class="btn btn-default btn-circle btn-xl"><i class="fa fa-file-image-o text-warning" style="color:#ff9800" aria-hidden="true"></i></button> 
                <h4>Gallery</h4>
                </a> 
          </div> 
        <!-- ./col -->
           <div class="col-lg-3 col-xs-4 text-center">
            <!-- small box -->
              <a href="{{ route('student.remarks.list') }}"><button type="button" class="btn btn-default btn-circle btn-xl"><i class="fa fa-comment text-primary" style="color:#945cea" aria-hidden="true"></i></button> 
                <h4>Remarks</h4>
                </a> 
          </div> 
        <!-- ./col -->        
         <div class="col-lg-3 col-xs-4 text-center">
            <!-- small box -->
              <a href="{{ route('student.eventcalender.list') }}"><button type="button" class="btn btn-default btn-circle btn-xl"><i class="fa fa-calendar text-success" style="color:#1dc42d" aria-hidden="true"></i></button> 
                <h4>Calendar</h4>
                </a> 
          </div> 
        <!-- ./col -->
           <div class="col-lg-3 col-xs-4 text-center">
            <!-- small box -->
              <a href="{{ route('student.datesheet.list') }}"><button type="button" class="btn btn-default btn-circle btn-xl"><i class="fa fa-calendar text-success" style="color:#1dc4be" aria-hidden="true"></i></button> 
                <h4>Date Sheet</h4>
                </a> 
          </div> 
        <!-- ./col -->
           <div class="col-lg-3 col-xs-4 text-center">
            <!-- small box -->
              <a href="{{ route('student.syllabus.list') }}"><button type="button" class="btn btn-default btn-circle btn-xl"><i class="fa fa-file text-success" style="color:#2196f3" aria-hidden="true"></i></button> 
                <h4>Syllabus</h4>
                </a> 
          </div> 
        <!-- ./col --> 
         <div class="col-lg-3 col-xs-4 text-center">
            <!-- small box -->                       
              <a href="{{ route('student.sms.list') }}"><button type="button" class="btn btn-default btn-circle btn-xl"><i class="fa fa-envelope text-success" style="color:#d1a919" aria-hidden="true"></i></button> 
                <h4>Message</h4>
                </a> 
          </div> 
        <!-- ./col -->
      
      </div>
    </section>
    <!-- /.content -->
@endsection