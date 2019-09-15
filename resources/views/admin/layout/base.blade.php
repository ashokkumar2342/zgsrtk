
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Zad Global School</title>
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
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
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
            <a href="{{ route('admin.dashboard') }}" class="logo">
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
                <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-user"></i>
              <span class="hidden-xs">{{ Auth::guard('admin')->user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <i class="fa fa-user fa-5x"></i>
                <p>
                  {{ Auth::guard('admin')->user()->name }}
                </p>
              </li>
             
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="{{ route('admin.logout.get') }}" class="btn btn-default btn-flat">Sign out</a>
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
                <ul class="sidebar-menu">
                    <li class="header">MAIN NAVIGATION</li>
                    <li ><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> <span>Dashboad</span></a></li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-user"></i>
                            <span>Student</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('admin.student.form') }}"><i class="fa fa-circle-o"></i> Add Student</a></li>
                            
                            <li><a href="{{ route('admin.student.huda') }}"><i class="fa fa-circle-o"></i> Huda Complex</a></li>
                            <li><a href="{{ route('admin.student.jind') }}"><i class="fa fa-circle-o"></i> Jind Road</a></li>
                            <li><a href="{{ route('admin.student.omax') }}"><i class="fa fa-circle-o"></i> OMAXE</a></li>
                            <li><a href="{{ route('admin.student.list') }}"><i class="fa fa-circle-o"></i> All Student</a></li>
                            <li><a href="{{ route('admin.promote.form') }}"><i class="fa fa-circle-o"></i> Promote</a></li>
                            <li><a href="{{ route('admin.promote.list') }}"><i class="fa fa-circle-o"></i> List section By</a></li>
                            <li><a href="{{ route('admin.promote.classBy') }}"><i class="fa fa-circle-o"></i> Class By</a></li>
                            <li><a href="{{ route('admin.transfer.form') }}"><i class="fa fa-circle-o"></i> Transfer Centre</a></li>
                            <li><a href="{{ route('admin.student.class.fees.form') }}"><i class="fa fa-circle-o"></i>Class Fee Update</a></li>

                        </ul>
                    </li>
                    @if (Auth::guard('admin')->user()->id == 1)
                    <li class="treeview">
                        <a href="#">
                          <i class="fa fa-cog"></i>
                          <span>Manage</span>
                          <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('admin.class.list') }}"><i class="fa fa-circle-o"></i> Class</a></li>
                            <li><a href="{{ route('admin.section.list') }}"><i class="fa fa-circle-o"></i> Section</a></li>
                            <li><a href="{{ route('admin.transport.list') }}"><i class="fa fa-circle-o"></i> Transport</a></li>
                        </ul>
                    </li> 
                    @endif
                     <li class="treeview">
                        <a href="#">
                          <i class="fa fa-money"></i>
                          <span>Accounts</span>
                          <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('admin.account.classfee.list') }}"><i class="fa fa-circle-o"></i> Class Fee</a></li>
                            <li><a href="{{ route('admin.account.classfee.omax') }}"><i class="fa fa-circle-o"></i> Class Fee OMAX</a></li>
                        </ul>
                    </li>  
                    
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-pencil"></i>
                            <span>Attendance</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('admin.attendance.student.form') }}"><i class="fa fa-circle-o"></i> Student Attendance</a></li>
                        </ul>
                    </li>
                     <li class="treeview">
                        <a href="#">
                            <i class="fa fa-file-text-o"></i>
                            <span>News &amp; Events</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('admin.news.list') }}"><i class="fa fa-circle-o"></i> Add News &amp; Event</a></li>
                        </ul>
                    </li>     
                       <li class="treeview">
                        <a href="#">
                            <i class="fa fa-file-text-o"></i>
                            <span>Notice</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('admin.notice.list') }}"><i class="fa fa-circle-o"></i> Add Notice</a></li>
                        </ul>
                    </li>  
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-file-text-o"></i>
                            <span>Homework</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('admin.homework.list') }}"><i class="fa fa-circle-o"></i> Daily Homework</a></li>
                           
                        </ul>
                    </li>
                     <li class="treeview">
                        <a href="{{ route('admin.holidayhomeworkFront.list') }}">
                            <i class="fa fa-file-text-o"></i>
                            <span>Holiday Homework On Website</span>
                            
                        </a>
                        
                    </li>
                      <li class="treeview">
                        <a href="#">
                            <i class="fa fa-file-text-o"></i>
                            <span>Upload File</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('admin.holidayhomework.list') }}"><i class="fa fa-circle-o"></i> Holiday Homework</a></li>
                            <li><a href="{{ route('admin.datesheet.list') }}"><i class="fa fa-circle-o"></i> Date Sheet</a></li>
                            <li><a href="{{ route('admin.eventcalender.list') }}"><i class="fa fa-circle-o"></i> Event Calender</a></li>
                            <li><a href="{{ route('admin.syllabus.list') }}"><i class="fa fa-circle-o"></i> Syllabus</a></li>
                           
                        </ul>
                    </li>   
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-telegram"></i>
                            <span>SMS</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('admin.sms.homework.form') }}"><i class="fa fa-circle-o"></i> Send Homework</a></li>
                             <li><a href="{{ route('admin.sms.customized.form') }}"><i class="fa fa-circle-o"></i> Customized SMS</a></li>
                             <li><a href="{{ route('admin.sms.classsms.form') }}"><i class="fa fa-circle-o"></i> Class  SMS</a></li>
                             
                            <li><a href="{{ route('admin.sms.allsms.form') }}"><i class="fa fa-circle-o"></i> Send All Student SMS</a></li>
                            <li><a href="{{ route('admin.sms.form') }}"><i class="fa fa-circle-o"></i> Send  SMS</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-file-text-o"></i>
                            <span>Gallery</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('admin.gallery.list') }}"><i class="fa fa-circle-o"></i> List</a></li>
                            <li><a href="{{ route('admin.gallery-category.list') }}"><i class="fa fa-circle-o"></i> Category</a></li>
                           
                        </ul>
                    </li>
                     <li class="treeview">
                        <a href="#">
                            <i class="fa fa-file-text-o"></i>
                            <span>Slider</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('admin.slider.list') }}"><i class="fa fa-circle-o"></i> List</a></li> 
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-file-text-o"></i>
                            <span>Circular</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('admin.circular.form') }}"><i class="fa fa-circle-o"></i> Add</a></li>                            
                            <li><a href="{{ route('admin.circular.list') }}"><i class="fa fa-circle-o"></i> List</a></li>
                           
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-file-text-o"></i>
                            <span>Remarks</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('admin.remarks.list') }}"><i class="fa fa-circle-o"></i> List</a></li>
                           
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-file-text-o"></i>
                            <span>Enquiry</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('admin.enquiry.list') }}"><i class="fa fa-circle-o"></i> Enquiry</a></li>
                            <li><a href="{{ route('admin.contact.list') }}"><i class="fa fa-circle-o"></i> Contact</a></li>
                           
                        </ul>
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
            <strong>Copyright &copy; 2017-2018 <a href="https://www.innovusine.com"></a>.</strong> All rights reserved.
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
    <script src={!! asset('admin_asset/dist/js/validation/common.js?ver=1') !!}></script>
    <script src={!! asset('admin_asset/dist/js/customscript.js?ver=1') !!}></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    @stack('scripts')
</body>
</html>
