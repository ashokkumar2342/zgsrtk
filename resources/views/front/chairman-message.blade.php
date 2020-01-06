@extends('front.layout.main')
@push('styles')
 
@endpush
@section('body')

    <!-- Page Header Start here -->
    <section class="page-header" style="background-image: url('{{ asset('images/background/chairman.jpg') }}');">
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
             <h4>Chairman's Message</h4>
                    <img src="{{ asset('images/JogiRamJi.jpg') }}" align="right" class="img-responsive thumbnail" style="height: 200px; margin-left: 10px;">

              <p align="justify">ZAD Global School - a school that is geared up to be a 'happening institution', a true centre of learning that liberates. It's aims to set young minds free, to accept new ways, embrace new technologies and march ahead confidently in tune with the latest in the world. ZAD Global School is designed to be a place where students have an idyllic and memorable childhood filled with joyous laughter of fun and games and the thrill of learning new things each day. A childhood that will be a life long asset for a stable and successful future. </p>
              <p align="justify">ZAD Global School is where eternal values are cultivated in young and impressionable minds. This is where students are shaped into caring, courageous, committed and capable citizens of the world, who are at home anywhere across the globe and in command of all situations. This is the place where children learn to live together in harmony and appreciate the worth of each member of the community.</p>
               

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

