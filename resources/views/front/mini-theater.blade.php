@extends('front.layout.main')
@push('styles')
 
@endpush
@section('body')

    <!-- Page Header Start here -->
    <section class="page-header" style="background-image: url('{{ asset('images/background/mini.jpg') }}');">
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
             <h4>Mini Theater</h4>       
              <p align="justify">A theater, theatre or playhouse, is a structure where theatrical works or plays are performed or other performances such as musical concerts may be produced. While a theater is not required for performance (as in environmental theater or street theater), a theater serves to define the performance and audience spaces. The facility is traditionally organized to provide support areas for performers, the technical crew and the audience members.</p>
              <p align="justify">The most important of these areas is the acting space generally known as the stage. In some theaters, specifically proscenium theaters, arena theaters and amphitheaters, this area is permanent part of the structure. In a blackbox theater the acting area is undefined so that each theater may adapt specifically to a production.</p>
                      <!-- Gallery Start here -->
                <section class="gallery">
                  <div class="container">
                     <div class="gallery-items">
                        <div class="gallery-item branding packing">
                          <div class="gallery-image">
                            <img src="{{ asset('images/gallery/MiniTheatre.jpg') }}" alt="dance" class="img-responsive thumbnail">
                            <div class="gallery-overlay"> </div>
                            <div class="gallery-content">
                              <a href="{{ asset('images/gallery/MiniTheatre.jpg') }}" data-rel="lightcase:myCollection"><i class="icon flaticon-expand"></i></a>                               
                            </div>
                          </div>
                        </div><!-- gallery item -->                        
                        <div class="gallery-item branding packing">
                          <div class="gallery-image">
                            <img src="{{ asset('images/gallery/MiniTheatre1.jpg') }}" alt="dance" class="img-responsive thumbnail">
                            <div class="gallery-overlay"> </div>
                            <div class="gallery-content">
                              <a href="{{ asset('images/gallery/MiniTheatre1.jpg') }}" data-rel="lightcase:myCollection"><i class="icon flaticon-expand"></i></a>                               
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

