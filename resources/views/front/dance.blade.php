@extends('front.layout.main')
@push('styles')
 
@endpush
@section('body')

    <!-- Page Header Start here -->
    <section class="page-header" style="background-image: url('{{ asset('images/background/dance.jpg') }}');">
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
             <h4>Dance Class</h4>       
              <p align="justify">Dance is a performance art form consisting of purposefully selected sequences of human movement. This movement has aesthetic and symbolic value, and is acknowledged as dance by performers and observers within a particular culture.Dance can be categorized and described by its choreography, by its repertoire of movements, or by its historical period or place of origin. </p>
              <p align="justify">Dance is an ideal means of communication to express what is too deep, too fine for words. Our students learn to choreograph and are made conversant with various Indian and Western dance forms like Indian Classical, Jazz, Hip Hop, Salsa and these are some of the most eagerly awaited moments for self expression and the students can be seen enjoying to the hilt. Lessons in Indian and Western music generate rich cross cultural exposure and sensitize the students to this fine art.</p>
                      <!-- Gallery Start here -->
                <section class="gallery">
                  <div class="container">
                     <div class="gallery-items">
                        <div class="gallery-item branding packing">
                          <div class="gallery-image">
                            <img src="{{ asset('images/gallery/90.jpg') }}" alt="dance" class="img-responsive thumbnail">
                            <div class="gallery-overlay"> </div>
                            <div class="gallery-content">
                              <a href="{{ asset('images/gallery/90.jpg') }}" data-rel="lightcase:myCollection"><i class="icon flaticon-expand"></i></a>                               
                            </div>
                          </div>
                        </div><!-- gallery item -->                        
                        <div class="gallery-item branding packing">
                          <div class="gallery-image">
                            <img src="{{ asset('images/gallery/95.jpg') }}" alt="dance" class="img-responsive thumbnail">
                            <div class="gallery-overlay"> </div>
                            <div class="gallery-content">
                              <a href="{{ asset('images/gallery/95.jpg') }}" data-rel="lightcase:myCollection"><i class="icon flaticon-expand"></i></a>                               
                            </div>
                          </div>
                        </div><!-- gallery item --><div class="gallery-item branding packing">
                          <div class="gallery-image">
                            <img src="{{ asset('images/gallery/94.jpg') }}" alt="dance" class="img-responsive thumbnail">
                            <div class="gallery-overlay"> </div>
                            <div class="gallery-content">
                              <a href="{{ asset('images/gallery/94.jpg') }}" data-rel="lightcase:myCollection"><i class="icon flaticon-expand"></i></a>                               
                            </div>
                          </div>
                        </div><!-- gallery item -->
                        <div class="gallery-item branding packing">
                          <div class="gallery-image">
                            <img src="{{ asset('images/gallery/91.jpg') }}" alt="dance" class="img-responsive thumbnail">
                            <div class="gallery-overlay"> </div>
                            <div class="gallery-content">
                              <a href="{{ asset('images/gallery/91.jpg') }}" data-rel="lightcase:myCollection"><i class="icon flaticon-expand"></i></a>                               
                            </div>
                          </div>
                        </div><!-- gallery item -->
                        <div class="gallery-item branding packing">
                          <div class="gallery-image">
                            <img src="{{ asset('images/gallery/92.jpg') }}" alt="dance" class="img-responsive thumbnail">
                            <div class="gallery-overlay"> </div>
                            <div class="gallery-content">
                              <a href="{{ asset('images/gallery/92.jpg') }}" data-rel="lightcase:myCollection"><i class="icon flaticon-expand"></i></a>                               
                            </div>
                          </div>
                        </div><!-- gallery item -->
                        <div class="gallery-item branding packing">
                          <div class="gallery-image">
                            <img src="{{ asset('images/gallery/93.jpg') }}" alt="dance" class="img-responsive thumbnail">
                            <div class="gallery-overlay"> </div>
                            <div class="gallery-content">
                              <a href="{{ asset('images/gallery/93.jpg') }}" data-rel="lightcase:myCollection"><i class="icon flaticon-expand"></i></a>                               
                            </div>
                          </div>
                        </div><!-- gallery item -->
                      </div><!-- gallery items -->  

                  </div><!-- container -->
                </section><!-- gallery -->
                <!-- Gallery End here --> 
              </div>
              
              <div class="col-md-3 col-sm-3 col-xs-12 sidebar">                          
                  <div class="sidebar-item">
                    <h3 class="sidebar-title">Quick links</h3>

                    <ul class="sidebar-categories">                      
                          
                      <li><a href="{{ route('front.art-craft') }}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Art & Craft</a></li>
                      <li><a href="{{ route('front.dance') }}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Dance</a></li>
                      <li><a href="{{ route('front.music') }}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Music</a></li>
                      <li><a href="{{ route('front.mini-theater') }}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Mini Theater</a></li>            
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
@push('scripts')


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
@if(Session::has('message'))
<script type="text/javascript">
    Command: toastr["{{ Session::get('class') }}"]("{{ Session::get('message') }}");
</script>
@endif
@endpush

