@extends('front.layout.main')
@push('styles')
 
@endpush
@section('body')

    
    <!-- Page Header Start here -->
    <section class="page-header" style="background-image: url('{{ asset('images/background/page-header-bg.jpg') }}');">
      <div class="overlay">
        <div class="container">
          <h3>&nbsp;</h3>          
        </div><!-- container -->
      </div><!-- overlay -->
    </section><!-- page header -->
    <!-- Page Header End here -->
     <!-- facility Start here -->
    <section class="facility" style="padding-top:50px">
      <div class="container">
        <div class="row">
          <div class="col-md-9 col-sm-9 col-xs-12">
             <h4>Our Group</h4>
              <p align="justify">ZAD Education Society was inaugurated by Hon’ble PADAMSHRI SETH Shrikrishan Das (Ex. Finance Minister, Haryana Govt.) on 18 August 1996. ZAD Education Society has several divisions of institutions like: </p>
              <img src="{{ asset('images/bb.jpg') }}" align="right" class="thumbnail">
              <ul style="padding-left: 20px;">
                <li>ZAD Computers</li>
                <li>ZAD Institute Of IT &amp; Management</li>
                <li>ZAD Institute Of Software Training &amp; Development</li>
                <li>ZAD Institute Of Chiplevel Hardware &amp; Networking</li>
                <li>ZAD Institute Of Finance And Accounts Professional</li>
                <li>ZAD Institute Of Science &amp; Technology</li>
                <li>ZAD Institute Of Web Designing &amp; Development</li>
                <li>ZAD Institute Of Graphics Multimedia &amp; Animation</li>
                <li>ZAD Global School</li>
                <li>ZAD Global Academicpartner Of M.D. University, Rohtak</li>
                
                <li>ZAD Academic Collobrator Of KSOU</li>
              </ul>
                  <p align="justify">
                  Now ZAD Education Society has reached the dizzy heights of success, after nurturing
                  thousands of students and helping them to realize their cherished goals. It has
                  become a house hold name through the length and breadth of the country. ZAD has
                  always been on the path of steady and continuous growth since its inception. The
                  institute is one of its kind with the objective of excellence, innovation and commitment.
                  We encourage an active approach to learn and make the dreams into a breath talking
                  reality.</p>
                 <p align="justify">
                    The registered office of the society is established in over 40000 sq. ft. of covered
                    area in the heart of the city having the advantage to proximity of nearby areas
                    of the place. It is merely 40 K.M. away from the capital of India, 60 K.M. away
                    from Indira Gandhi International Airport., 70 K.M. form ISBT New Delhi.
                </p>
                 
                <p align="justify">
                    The institute has its own specious building comprising of classrooms, seminar hall,
                    conference hall, computer lab (over 500 computer with latest configuration and allied
                    equipment’s) along with a well-equipped library (having more than 10000 books) that
                    are likely to play a major role in molding the academic career of students.
                </p>
                 
                <p align="justify">
                    People are highly amazed with the pace at which ZAD is expending itself. ZAD is
                    constantly working to add new dimensions to the education system, academic excellence,
                    scope of employment status and quality life. It’s always our team endeavors to provide
                    the best services and the students satisfaction is our main motto.
                </p>                 
                <p align="justify">
                    “Excellence Through Knowledge” having the passion for excellence in including learning
                    our faculty member put their best efforts to develop the excellency among the students.
                    The highly qualified, well experienced, dedicated and energetic staff is capable
                    to explain the complicated topics in the simple way, so the students are in the
                    position to learn in a pleasure not pressure.
                </p>                 
                <p align="justify">
                    There come a time in your life when you stand at the cross roads, thinking where
                    to go in terms of your career. It is moment to decide and a lifetime to feel proud
                    or repent. We at ZAD institute will be the safest path to future.
                </p>

              </div>
              
              <div class="col-md-3 col-sm-3 col-xs-12 sidebar">                          
                  <div class="sidebar-item">
                    <h3 class="sidebar-title">Quick links</h3>

                    <ul class="sidebar-categories">
                       
                      <li><a href="{{ route('front.about') }}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> About Group</a></li>
                      <li><a href="{{ route('front.vision-mission') }}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Vision and Mission</a></li>
                      <li><a href="{{ route('front.chairman-message') }}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Chairman's Message</a></li>                
                    </ul>
                    <br><br>
                    <img src="{{ asset('images/bb2.jpg') }}" class="thumbnail">
                  </div><!-- sidebar item -->            
              </div>
        </div><!-- row -->
      </div><!-- container -->
    </section><!-- facility -->
    <!-- facility End here -->


    <!-- About Start here -->
    <section class="about">
      <div class="overlay padding-2">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <div class="about-image">
                
              </div>
            </div>
            <div class="col-md-6">
              
            </div>
          </div><!-- row -->
        </div><!-- container -->
      </div><!-- overlay -->
    </section><!-- about -->
    <!-- About End here -->


 
    
@endsection
@push('scripts')


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
@if(Session::has('message'))
<script type="text/javascript">
    Command: toastr["{{ Session::get('class') }}"]("{{ Session::get('message') }}");
</script>
@endif
@endpush

