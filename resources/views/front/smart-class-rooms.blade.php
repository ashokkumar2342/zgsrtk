@extends('front.layout.main')
@push('styles')
 
@endpush
@section('body')

 <!-- Page Header Start here -->
    <section class="page-header" style="background-image: url('{{ asset('images/background/smart-class.jpg') }}');">
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
             <h4>Smart Class Room</h4>       
              <p align="justify">Smart classes use all interactive modules like videos and presentations and these visually attractive methods of teaching becomes appealing to students who are already struggling with the traditional method of teaching in a classroom. In fact, smart classes are almost like watching movies as sometimes, animated visuals are used to teach a point. This kind of visual is both eye-catching and young students can easily relate with them. This is because the audio-visual senses of students are targeted and it helps the students store the information fast and more effectively. And then, there is the advantage of utilising much of the time wasted earlier in drawing or preparing diagrams on board. Smartboards have all these information in memory and can be presented during the time of class lectures and thus, the time saved can be used in more important things.</p>
                      <!-- Gallery Start here -->
                <section class="gallery">
                  <div class="container">
                     <div class="gallery-items">
                        <div class="gallery-item branding packing">
                          <div class="gallery-image">
                            <img src="{{ asset('images/gallery/Classroom.jpg') }}" alt="smart class" class="img-responsive thumbnail">
                            <div class="gallery-overlay"> </div>
                            <div class="gallery-content">
                              <a href="{{ asset('images/gallery/Classroom.jpg') }}" data-rel="lightcase:myCollection"><i class="icon flaticon-expand"></i></a>                               
                            </div>
                          </div>
                        </div><!-- gallery item -->                        
                        <div class="gallery-item branding packing">
                          <div class="gallery-image">
                            <img src="{{ asset('images/gallery/smartclass.jpg') }}" alt="smart class" class="img-responsive thumbnail">
                            <div class="gallery-overlay"> </div>
                            <div class="gallery-content">
                              <a href="{{ asset('images/gallery/smartclass.jpg') }}" data-rel="lightcase:myCollection"><i class="icon flaticon-expand"></i></a>                               
                            </div>
                          </div>
                         
                      </div><!-- gallery items -->  

                  </div><!-- container -->
                </section><!-- gallery -->
                <!-- Gallery End here --> 
              </div>
              
              <div class="col-md-3 col-sm-3 col-xs-12 sidebar">                          
                  <div class="sidebar-item">
                    <h3 class="sidebar-title">Quick links</h3>

                    <ul class="sidebar-categories"> 
                      <li><a href="{{ route('front.smart-class-rooms') }}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Smart Class Rooms</a></li>
                      <li><a href="{{ route('front.computer-lab') }}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Computer Lab</a></li>
                      <li><a href="{{ route('front.science-lab') }}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Science Lab</a></li>
                      <li><a href="{{ route('front.library') }}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Library</a></li>
                      <li><a href="{{ route('front.counselling-area') }}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Counselling Area</a></li>
                      <li><a href="{{ route('front.transport') }}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Transport</a></li>            
                    </ul>
                    <br><br>
                    {{-- <img src="{{ asset('images/bb2.jpg') }}" class="thumbnail"> --}}
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
 


 
