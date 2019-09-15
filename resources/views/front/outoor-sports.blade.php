@extends('front.layout.main')
@push('styles')
 
@endpush
@section('body')

  <!-- Page Header Start here -->
    <section class="page-header" style="background-image: url('{{ asset('images/background/outdoor.jpg') }}');">
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
            <h4>Out Door Games</h4>       
            <p align="justify">Sports impart health and agility of mind in a practical manner on the Playground. 
            Some of the Sporting Facilities include:</p> 
            <h5>(Semi Olympic Size) and Junior Swimming pools | Lawn Tennis Courts | Basketball Courts | Badminton Courts | 200 metre Athletic Track | Skating Ring | Facilities for Football | Cricket    </h5>      
             <br>
            <!-- Gallery Start here -->
              <section class="gallery">
                <div class="container">
                   <div class="gallery-items">
                      <div class="gallery-item branding packing">
                        <div class="gallery-image">
                          <img src="{{ asset('images/gallery/OutDoor3.jpg') }}" alt="smart class" class="img-responsive thumbnail">
                          <div class="gallery-overlay"> </div>
                          <div class="gallery-content">
                            <a href="{{ asset('images/gallery/OutDoor3.jpg') }}" data-rel="lightcase:myCollection"><i class="icon flaticon-expand"></i></a>                               
                          </div>
                        </div>
                      </div><!-- gallery item -->                        
                      <div class="gallery-item branding packing">
                        <div class="gallery-image">
                          <img src="{{ asset('images/gallery/OutDoor5.jpg') }}" alt="smart class" class="img-responsive thumbnail">
                          <div class="gallery-overlay"> </div>
                          <div class="gallery-content">
                            <a href="{{ asset('images/gallery/OutDoor5.jpg') }}" data-rel="lightcase:myCollection"><i class="icon flaticon-expand"></i></a>                               
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
                       <li><a href="{{ route('front.indoor-sports') }}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> InDoor Sports</a></li>
                      <li><a href="{{ route('front.outoor-sports') }}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> OutDoor Sports</a></li>
                      <li><a href="{{ route('front.yoga-aerobics') }}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Yoga and Aerobics</a></li>
                      <li><a href="{{ route('front.taekwondo') }}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Taekwondo</a></li>
                       
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
 


 
