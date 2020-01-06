@extends('front.layout.main')
@push('styles')
 
@endpush
@section('body')

    <!-- Page Header Start here -->
    <section class="page-header" style="background-image: url('{{ asset('images/background/conciling.jpg') }}');">
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
            <h4>Counselling Area</h4>       
            <p align="justify">School counseling is a profession that focuses on the relations and interactions between students and their school environment to reduce the effects of environmental and institutional barriers that impede student academic success. School counsellors foster educational equity, access, and academic success in a rigorous curriculum to ensure that all students graduate from high school ready to succeed in college and careers. </p>
            <p align="justify">The school counsellor serves as a leader as well as an effective team member working with teachers, administrators, and other school personnel to help each student succeed.
            The school counsellor as consultant empowers families to act on behalf of their children by helping parents and guardians identify student needs and interests, and access available resources. </p>
             
            <!-- Gallery Start here -->
              <section class="gallery">
                <div class="container">
                   <div class="gallery-items">
                      <div class="gallery-item branding packing">
                        <div class="gallery-image">
                          <img src="{{ asset('images/gallery/Counc1.jpg') }}" alt="smart class" class="img-responsive thumbnail">
                          <div class="gallery-overlay"> </div>
                          <div class="gallery-content">
                            <a href="{{ asset('images/gallery/Counc1.jpg') }}" data-rel="lightcase:myCollection"><i class="icon flaticon-expand"></i></a>                               
                          </div>
                        </div>
                      </div><!-- gallery item -->                        
                      <div class="gallery-item branding packing">
                        <div class="gallery-image">
                          <img src="{{ asset('images/gallery/Counc1.jpg') }}" alt="smart class" class="img-responsive thumbnail">
                          <div class="gallery-overlay"> </div>
                          <div class="gallery-content">
                            <a href="{{ asset('images/gallery/Counc1.jpg') }}" data-rel="lightcase:myCollection"><i class="icon flaticon-expand"></i></a>                               
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
 


 
