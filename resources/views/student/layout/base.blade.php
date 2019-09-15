
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>zad global school</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{ asset('admin_asset/bootstrap/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin_asset/dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('admin_asset/dist/css/skins/_all-skins.min.css')}}">
  @stack('links')
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-red sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <header class="main-header">
            <!-- Logo -->
            <a href="{{ route('student.dashboard') }}" class="logo hidden-xs">

                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>ZAD</b></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg">zad global school</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                 <a href="{{ route('student.dashboard') }}"  role="button">
                    <span class="sr-only">Toggle navigation</span>
                  <i class="fa fa-home  fa-lg  " aria-hidden="true"  style="padding-top: 17px; padding-left: 20px; color:#fff;" ></i>
                   
                </a>
              
                <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              @php
               $student = Auth::guard('student')->user();
              $profile = route('student.student.image',$student->picture);
              @endphp
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img class="user-image" src="{{  ($student->picture)? $profile : asset('profile-img/user.png') }}">
              <span class="hidden-xs" style="text-transform: capitalize;"> {{ Auth::guard('student')->user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
                
              <!-- User image -->
              <li class="user-header">              
                {{-- <img src="/storage/app/student/profile/{{ Auth::guard('student')->user()->picture }}"> --}}
                 <img  class="img-circle" src="{{  ($student->picture)? $profile : asset('profile-img/user.png') }}">
                <p style="text-transform: capitalize;"">
                  {{ Auth::guard('student')->user()->name }}
                </p>
              </li>
             
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{ route('student.password.change') }}" class="btn btn-default btn-flat">Change Password</a>
                </div>
                <div class="pull-right">
                  <a href="{{ route('student.logout.get') }}" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
            </nav>
        </header>

        <!-- =============================================== -->

        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <div class="user-panel">
                  <div class="pull-left image">
                    <img src="{{  ($student->picture)? $profile : asset('profile-img/user.png') }}" class="img-circle" alt="User Image">
                  </div>
                  <div class="pull-left info">
                    <p>{{ Auth::guard('student')->user()->name }}</p>
                
                  </div>
                </div>
                 <!-- search form -->
                
                  {{-- <div style="padding-top: 5px;"></div> --}}
                <ul class="sidebar-menu">
                    <li class="header">MAIN NAVIGATION</li>
                    {{-- <li ><a href="{{ route('student.dashboard') }}"><i class="fa fa-dashboard text-danger"></i> <span>Dashboad</span></a></li> --}}
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-user text-success"></i>
                            <span>Student</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                             <li><a href="{{ route('student.view') }}"><i class="fa fa-circle-o"></i> Details</a></li> --}}
                           {{--  <li><a href="{{ route('student.student.list') }}"><i class="fa fa-circle-o"></i> list</a></li>  --}}
                        </ul>
                    </li>
                     <li class="treeview">
                        <a href="{{ route('student.attendance.view') }}">
                            <i class="fa fa-pencil text-danger"></i>
                            <span>Attendance</span>
                             
                        </a>
                       
                    </li>
                      <li class="treeview">
                        <a href="{{ route('student.news.list') }}">
                            <i class="fa fa-newspaper-o text-info" aria-hidden="true"></i>
                            <span>News &amp; Events</span>
                             
                        </a>
                       
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-file-text-o text-danger"></i>
                            <span>Homework</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('student.homework.list') }}"><i class="fa fa-circle-o"></i> Daily Homework</a></li>
                           
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-download text-success" aria-hidden="true"></i>
                            <span>Download</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('student.holidayhomework.list') }}"><i class="fa fa-circle-o"></i> Holiday Homework<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &amp; Assignment</a></li>
                           
                        </ul>
                    </li>
                     <li class="treeview">
                        <a href="{{ route('student.feedetails.list') }}">
                            <i class="fa fa-file-text-o text-warning"></i>
                            <span>Fee Details</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        
                    </li>
                    <li class="treeview">
                        <a href="{{ route('student.result.list') }}">
                            <i class="fa fa-list-alt text-danger" aria-hidden="true"></i>
                            <span>Result</span>
                        </a>
                    </li>
                      <li class="treeview">
                        <a href="{{ route('student.circular.list') }}">
                           <i class="glyphicon glyphicon-list text-info"></i>
                            <span>Circular</span>
                        </a>
                    </li>
                      <li class="treeview">
                        <a href="{{ route('student.communicate.list') }}">
                            <i class="fa fa-comments-o text-primary" aria-hidden="true"></i>
                            <span>Communicate</span>
                        </a>
                    </li>
                      <li class="treeview">
                        <a href="{{ route('student.remarks.list') }}">
                            <i class="fa fa-comment text-success" aria-hidden="true"></i>
                            <span>Remarks</span>
                        </a>
                    </li>
                       <li class="treeview">
                        <a href="{{ route('student.gallery.list') }}">
                            <i class="fa fa-file-image-o text-info" aria-hidden="true"></i>
                            <span>Gallery</span>
                        </a>
                    </li>
                     <li class="treeview">
                        <a href="{{ route('student.calender.calendar') }}">
                            <i class="fa fa-calendar text-warning" aria-hidden="true"></i>
                            <span>Calendar</span>
                        </a>
                    </li>
                       <li class="treeview">
                        <a href="{{ route('student.syllabus.list') }}">
                            <i class="fa fa-calendar text-warning" aria-hidden="true"></i>
                            <span>Syllabus</span>
                        </a>
                    </li>
                     <li class="treeview">
                        <a href="{{ route('student.sms.list') }}">
                            <i class="fa fa-calendar text-warning" aria-hidden="true"></i>
                            <span>Messages</span>
                        </a>
                    </li>
                  
                                                 
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- =============================================== -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('body')
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="pull-right hidden-xs">
           
            </div>
            <div><strong>Copyright 2018 © ZAD Global School</strong></div>
            <strong>Developed By <a target="blank" href="https://www.innovusine.com"> Innovusine softwares technology Pvt.Ltd</a>.</strong> 
        </footer>

        <!-- Add the sidebar's background. This div must be placed
        immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 2.2.3 -->
    <script src="{{ asset('admin_asset/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="{{ asset('admin_asset/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- SlimScroll -->
    <script src="{{ asset('admin_asset/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('admin_asset/plugins/fastclick/fastclick.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('admin_asset/dist/js/app.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('admin_asset/dist/js/demo.js') }}"></script>
    @stack('scripts')
</body>
</html>
