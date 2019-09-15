<style>
  .header-two .top-contents .icon {
      display: inline-block;
      float: left;
      margin-right: 15px;
      color: #fffae9;
</style>
<div class="row">
   <div class="col-lg-2" style="background-color: #000;
    padding: 5px;
    padding-left: 90px;
    font-size: 20px;">
        <span style="padding:5px auto;color:#fff">
         <b> Latest News</b> <i class="fa fa-space-shuttle faa-passing animated"></i> </span>  
    </div> 
    <div class="col-lg-10" style="padding:1px;color:#fff;); font-size:1.2em; background:rgb(103, 174, 223)"> 
          
                 <marquee onmouseover="this.stop();" onmouseout="this.start();">
                              {{ $notices =App\Notice::find(1)->news }}
                </marquee>
          
                  
    </div>     
</div>       
  <div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog"> 
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">SUMMER VACATION HOLIDAY HOMEWORK 2019-20 </h4>
              </div>
              <div class="modal-body">
                 <a href="{{ route('front.holiday-homework') }}" class="btn btn-success" title="Homework">Junior Wing - Huda Complex</a>
                 <a href="{{ route('front.holiday-homework3') }}" class="btn btn-success" title="Homework">Senior Wing - Jind Road</a>
                 <a href="{{ route('front.holiday-homework3') }}" class="btn btn-success" title="Homework">OMAXE</a>
              </div>
             
            </div>
        
          </div>
        </div>
<!--  </div>-->
<!--</div>-->
    <!-- Preloader start here -->
   <!--  <div id="loader-wrapper">
      <div id="loader"></div>
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
    </div> -->

    <!-- Preloader end here -->
    <style >
      .header-two .top-contents .content p {
    margin: 0px;
    color: #fffcfc;
    </style>
  	<header class="header-two">
  		<div class="header-top" style="background-color:#B40303;color:#fff">
  			<div class="container">
  				<div class="row">
            <div class="col-md-3">
              <a class="logo" href="{{ route('front.home') }}"><img src="{{ asset('images/logo.png') }}" alt="logo" class="img-responsive"></a>
            </div>
            <div class="col-md-9">
              <ul class="top-contents">
                <li>
                   <i class="icon fa fa-phone" aria-hidden="true"></i>
                  <div class="content">
                    <p>Call Us</p>
                    <p>Jr.<b> +91-8397068001</b></p>
                    <p>Sr.<b> +91-8570006662</b></p>
                    <p>Omaxe.<b>8295300441</b></p>

                  </div>
                </li>
                <li>
                   <i class="icon fa fa-clock-o" aria-hidden="true"></i>
                  <div class="content">
                    <p>Timing</p>

                   <p style="font-size:14px;">Opening : <b>7:30am</b></p>
                   <p style="font-size:14px;">Closing : <b>2:30pm</b></p>
                   <p style="font-size:14px;">&nbsp;<b></b></p>

                  </div>
                </li>
                <li>
                   
                  <i class="icon fa fa-map-marker" aria-hidden="true"></i>
                  <div class="content">

                    <p>Our Address{{--  <a href="{{ route('front.enquiry') }}" class="btn btn-danger" title="">Enquiry Form</a> --}}</p>
                    <p style="font-size:13px;">Jr.<b> Zad Eduplex, HUDA Complex, Rohtak-124001(Hr.)</b></p>
                    <p style="font-size:13px;">Sr.<b> 8th Mile Stone, Rohtak-Jind Road, N.H. 71, Rk. (Hr.)</b></p></span>
                    <p style="font-size:13px;">Omaxe<b> OMAXE CIty, Delhi Road Rohtak -124001(Hr.)</b></p></span>

                  </div>
                </li>
              </ul>
            </div>
          </div><!-- row -->
  			</div><!-- container -->
  		</div><!-- header top -->
        <div class="main-menu">
          <nav class="navbar ">
            <div class="container">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ route('front.home') }}"><img src="{{ asset('images/logo.png') }}" alt="logo" class="img-responsive" style="height: 50px"></a>
              </div>

              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                  <li><a href="{{ route('front.home') }}">Home</a></li>

                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">About Us <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="{{ route('front.about') }}">About Group</a></li>
                      <li><a href="{{ route('front.vision-mission') }}">Vision and Mission</a></li>
                      <li><a href="{{ route('front.chairman-message') }}">Chairman's Message</a></li>
                       
                    </ul>
                  </li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Academic <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="{{ route('front.holiday-homework') }}">Holiday Homework</a></li>
                      
                    </ul>
                  </li>                   
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Resources<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="{{ route('front.smart-class-rooms') }}">Smart Class Rooms</a></li>
                      <li><a href="{{ route('front.computer-lab') }}">Computer Lab</a></li>
                      <li><a href="{{ route('front.science-lab') }}">Science Lab</a></li>
                      <li><a href="{{ route('front.library') }}">Library</a></li>
                      <li><a href="{{ route('front.counselling-area') }}">Counselling Area</a></li>
                      <li><a href="{{ route('front.transport') }}">Transport</a></li>
                       <li><a href="{{ route('front.art-craft') }}">Art & Craft</a></li>
                      <li><a href="{{ route('front.dance') }}">Dance</a></li>
                      <li><a href="{{ route('front.music') }}">Music</a></li>
                      <li><a href="{{ route('front.mini-theater') }}">Mini Theater</a></li>
                    </ul>
                  </li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sports <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="{{ route('front.indoor-sports') }}">InDoor Sports</a></li>
                      <li><a href="{{ route('front.outoor-sports') }}">OutDoor Sports</a></li>
                      <li><a href="{{ route('front.yoga-aerobics') }}">Yoga and Aerobics</a></li>
					             <li><a href="{{ route('front.taekwondo') }}">Taekwondo</a></li>
                      
                    </ul>
                  </li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Events<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="{{ route('front.tour-trips') }}">Tour & Trips</a></li>
                      <li><a href="{{ route('front.class-room-activities') }}">Class Room Activities</a></li>
                      {{-- <li><a href="{{ route('front.rang-mahotsav') }}">Rang Mahotsav</a></li> --}}
                    </ul>
                  </li>
                   <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gallery<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="{{ route('front.gallery') }}">Photo Gallery</a></li>
                      <li><a href="{{ route('front.video') }}">Video Gallery</a></li>
                      {{-- <li><a href="{{ route('front.rang-mahotsav') }}">Rang Mahotsav</a></li> --}}
                    </ul>
                  </li>
                   <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Enquiry<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                     <li><a href="{{ route('front.enquiry') }}">Enquiry</a></li>

                     <li><a href="{{ route('front.career') }}">Career</a></li>
                      {{-- <li><a href="{{ route('front.rang-mahotsav') }}">Rang Mahotsav</a></li> --}}
                    </ul>
                  </li> 
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Login <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                       <li><a href="{{ route('student.home') }}">Parent's Login</a></li>

                        <li><a href="{{ route('admin.home') }}">Admin Login</a></li>
                      {{-- <li><a href="{{ route('front.rang-mahotsav') }}">Rang Mahotsav</a></li> --}}
                    </ul>
                  </li> 
                  <li class="dropdown button-default">
                    <a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Help Desk <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                       
                            <li><a href="#">P.T.M</a></li>
                            <li><a href="{{ route('front.contact') }}">Contact US</a></li>
                            <li><a href="{{ route('front.enquiry') }}">Feedback</a></li>
                            <li><a href="#">Admission Form</a></li>
                      {{-- <li><a href="{{ route('front.rang-mahotsav') }}">Rang Mahotsav</a></li> --}}
                    </ul>
                  </li>

              </ul>
         

                   
                  
                    
               
              <form class="menu-search-form">
                <input type="text" name="search" placeholder="Search here...">
                <span class="menu-search-close"><i class="fa fa-times" aria-hidden="true"></i></span>
              </form>
  			    </div><!-- /.navbar-collapse -->
  			  </div><!-- /.container -->
  			</nav>
  		</div><!-- main menu -->
  	</header>
  	<!-- header End here -->
       