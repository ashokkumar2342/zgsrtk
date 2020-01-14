@extends('front.layout.main')
@push('styles')
 
@endpush
@section('body')

  <!-- Page Header Start here -->
    <section class="page-header" style="background-image: url('{{ asset('images/background/lab.jpg') }}');">
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
            <h4>Science Lab</h4>       
            <p align="justify">Scientific temper is inculcated in each child through exploration, observation & discovery. A hands-on approach is adopted at all developmental stages leading to conceptual understanding and an inquisitive and analytical mind.</p>
            <p align="justify">Emphasis is laid on sensitizing the learners to the application of concepts in not only day to day lives but also in the service of humanity and as a major instrument for achieving goals of self reliance, socio-economic and socio-ecological development.  </p>
            <p align="justify">Science as a stream is introduced for senior classes in a wide ranging programme covering Physics, Chemistry, Biology and Biotechnology.  </p>
            <p align="justify">It will provide students with a scientific approach to advanced studies, and the students will be exposed to the latest developments by regular visits to Science and Research Centers. </p>
            <!-- Gallery Start here -->
              <section class="gallery">
                <div class="container">
                   <div class="gallery-items">
                      <div class="gallery-item branding packing">
                        <div class="gallery-image">
                          <img src="{{ asset('images/gallery/ScienceLab1.jpg') }}" alt="smart class" class="img-responsive thumbnail">
                          <div class="gallery-overlay"> </div>
                          <div class="gallery-content">
                            <a href="{{ asset('images/gallery/ScienceLab1.jpg') }}" data-rel="lightcase:myCollection"><i class="icon flaticon-expand"></i></a>                               
                          </div>
                        </div>
                      </div><!-- gallery item -->                        
                      <div class="gallery-item branding packing">
                        <div class="gallery-image">
                          <img src="{{ asset('images/gallery/ScienceLab2.jpg') }}" alt="smart class" class="img-responsive thumbnail">
                          <div class="gallery-overlay"> </div>
                          <div class="gallery-content">
                            <a href="{{ asset('images/gallery/ScienceLab2.jpg') }}" data-rel="lightcase:myCollection"><i class="icon flaticon-expand"></i></a>                               
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
 


 
