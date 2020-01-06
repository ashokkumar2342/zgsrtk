@extends('front.layout.main')
@push('styles')
 
@endpush
@section('body')

    <!-- Page Header Start here -->
    <section class="page-header" style="background-image: url('{{ asset('images/background/taekwondo.jpg') }}');">
      <div class="overlay">
        <div class="container">
          <h3>&nbsp;</h3>          
        </div><!-- container -->
      </div><!-- overlay -->
    </section><!-- page header -->
    <!-- Page Header End here -->
    <!-- Page Header End here -->
      <!-- facility Start here -->
    <section class="facility" style="padding-top:50px">
      <div class="container">
        <div class="row">
          <div class="col-md-9 col-sm-9 col-xs-12">
            <h4>Taekwondo</h4> 
            <p align="justify">Taekwondo is a martial art that in 'todays' form of self defense has evolved by combining many different styles of martial arts that existed in Korea over the last 2,000 years and some martial arts styles from countries that surround Korea. Taekwondo incorporates the abrupt linear movements of Karate and the flowing, circular patterns of Kung-fu with native kicking techniques. Over fifty typically Chinese circular hand movements can be identified in modern Taekwondo.</p> 
                
             <br>
            <!-- Gallery Start here -->
                    <div class="row gallery">
                      <div class="col-md-4 gallery-item branding packing">
                         <div class="gallery-image">
                          <img src="{{ asset('images/gallery/Tai1.jpg') }}" alt="smart class" class="img-responsive thumbnail">
                          <div class="gallery-overlay"> </div>
                          <div class="gallery-content">
                            <a href="{{ asset('images/gallery/Tai1.jpg') }}" data-rel="lightcase:myCollection"><i class="icon flaticon-expand"></i></a>                               
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4 gallery-item branding packing">
                         <div class="gallery-image">
                          <img src="{{ asset('images/gallery/Tai2.jpg') }}" alt="smart class" class="img-responsive thumbnail">
                          <div class="gallery-overlay"> </div>
                          <div class="gallery-content">
                            <a href="{{ asset('images/gallery/Tai2.jpg') }}" data-rel="lightcase:myCollection"><i class="icon flaticon-expand"></i></a>                               
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4 gallery-item branding packing">
                         <div class="gallery-image">
                          <img src="{{ asset('images/gallery/Tai3.jpg') }}" alt="smart class" class="img-responsive thumbnail">
                          <div class="gallery-overlay"> </div>
                          <div class="gallery-content">
                            <a href="{{ asset('images/gallery/Tai3.jpg') }}" data-rel="lightcase:myCollection"><i class="icon flaticon-expand"></i></a>                               
                          </div>
                        </div>
                      </div> 
                    </div>                       
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
 


 
