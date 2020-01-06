@extends('front.layout.main')
@push('styles')
 
@endpush
@section('body')

   <!-- Page Header Start here -->
    <section class="page-header" style="background-image: url('{{ asset('images/background/music.jpg') }}');">
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
             <h4>Music Room</h4>       
              <p align="justify">Music is an art form, social activity or cultural activity whose medium is sound and silence. The common elements of music are pitch (which governs melody and harmony), rhythm (and its associated concepts tempo, meter, and articulation), dynamics (loudness and softness), and the sonic qualities of timbre and texture (which are sometimes termed the 'color' of a musical sound). Music is performed with a vast range of instruments and with vocal techniques ranging from singing to rapping, and there are solely instrumental pieces, solely vocal pieces and pieces that combine singing and instruments. In its most general form, the activities describing music as an art form include the production of works of music (songs, tunes, symphonies, and so on), the criticism of music, the study of the history of music, and the aesthetic examination of music.</p>
                      <!-- Gallery Start here -->
                <section class="gallery">
                  <div class="container">
                     <div class="gallery-items">
                        <div class="gallery-item branding packing">
                          <div class="gallery-image">
                            <img src="{{ asset('images/gallery/DSC_3407.jpg') }}" alt="dance" class="img-responsive thumbnail">
                            <div class="gallery-overlay"> </div>
                            <div class="gallery-content">
                              <a href="{{ asset('images/gallery/DSC_3407.jpg') }}" data-rel="lightcase:myCollection"><i class="icon flaticon-expand"></i></a>                               
                            </div>
                          </div>
                        </div><!-- gallery item -->                        
                        <div class="gallery-item branding packing">
                          <div class="gallery-image">
                            <img src="{{ asset('images/gallery/DSC_3408.jpg') }}" alt="dance" class="img-responsive thumbnail">
                            <div class="gallery-overlay"> </div>
                            <div class="gallery-content">
                              <a href="{{ asset('images/gallery/DSC_3408.jpg') }}" data-rel="lightcase:myCollection"><i class="icon flaticon-expand"></i></a>                               
                            </div>
                          </div>
                        </div><!-- gallery item --><div class="gallery-item branding packing">
                          <div class="gallery-image">
                            <img src="{{ asset('images/gallery/DSC_3412.jpg') }}" alt="dance" class="img-responsive thumbnail">
                            <div class="gallery-overlay"> </div>
                            <div class="gallery-content">
                              <a href="{{ asset('images/gallery/DSC_3412.jpg') }}" data-rel="lightcase:myCollection"><i class="icon flaticon-expand"></i></a>                               
                            </div>
                          </div>
                        </div><!-- gallery item -->
                        <div class="gallery-item branding packing">
                          <div class="gallery-image">
                            <img src="{{ asset('images/gallery/DSC_3413.jpg') }}" alt="dance" class="img-responsive thumbnail">
                            <div class="gallery-overlay"> </div>
                            <div class="gallery-content">
                              <a href="{{ asset('images/gallery/DSC_3413.jpg') }}" data-rel="lightcase:myCollection"><i class="icon flaticon-expand"></i></a>                               
                            </div>
                          </div>
                        </div><!-- gallery item -->
                        <div class="gallery-item branding packing">
                          <div class="gallery-image">
                            <img src="{{ asset('images/gallery/DSC_3414.jpg') }}" alt="dance" class="img-responsive thumbnail">
                            <div class="gallery-overlay"> </div>
                            <div class="gallery-content">
                              <a href="{{ asset('images/gallery/DSC_3414.jpg') }}" data-rel="lightcase:myCollection"><i class="icon flaticon-expand"></i></a>                               
                            </div>
                          </div>
                        </div><!-- gallery item -->
                        <div class="gallery-item branding packing">
                          <div class="gallery-image">
                            <img src="{{ asset('images/gallery/DSC_3415.jpg') }}" alt="dance" class="img-responsive thumbnail">
                            <div class="gallery-overlay"> </div>
                            <div class="gallery-content">
                              <a href="{{ asset('images/gallery/DSC_3415.jpg') }}" data-rel="lightcase:myCollection"><i class="icon flaticon-expand"></i></a>                               
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

