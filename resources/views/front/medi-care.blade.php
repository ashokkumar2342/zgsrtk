@extends('front.layout.main')
@push('styles')
 
@endpush
@section('body')

    <!-- Page Header Start here -->
    <section class="page-header" style="background-image: url('{{ asset('images/background/activities.jpg') }}');">
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
            <h4>Aware about City Hospital</h4> 
             <br>
            <!-- Gallery Start here -->
                    <div class="row gallery">
                                              
                       <div class="col-md-4 gallery-item branding packing">
                         <div class="gallery-image">
                          <img src="{{ asset('images/gallery/m.jpg') }}" alt="smart class" class="img-responsive thumbnail">
                          <div class="gallery-overlay"> </div>
                          <div class="gallery-content">
                            <a href="{{ asset('images/gallery/m.jpg') }}" data-rel="lightcase:myCollection"><i class="icon flaticon-expand"></i></a>                               
                          </div>
                        </div>
                      </div><div class="col-md-4 gallery-item branding packing">
                         <div class="gallery-image">
                          <img src="{{ asset('images/gallery/m2.jpg') }}" alt="smart class" class="img-responsive thumbnail">
                          <div class="gallery-overlay"> </div>
                          <div class="gallery-content">
                            <a href="{{ asset('images/gallery/m2.jpg') }}" data-rel="lightcase:myCollection"><i class="icon flaticon-expand"></i></a>                               
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4 gallery-item branding packing">
                         <div class="gallery-image">
                          <img src="{{ asset('images/gallery/m3.jpg') }}" alt="smart class" class="img-responsive thumbnail">
                          <div class="gallery-overlay"> </div>
                          <div class="gallery-content">
                            <a href="{{ asset('images/gallery/m3.jpg') }}" data-rel="lightcase:myCollection"><i class="icon flaticon-expand"></i></a>                               
                          </div>
                        </div>
                      </div> 
                      <div class="col-md-4 gallery-item branding packing">
                         <div class="gallery-image">
                          <img src="{{ asset('images/gallery/m4.jpg') }}" alt="smart class" class="img-responsive thumbnail">
                          <div class="gallery-overlay"> </div>
                          <div class="gallery-content">
                            <a href="{{ asset('images/gallery/m4.jpg') }}" data-rel="lightcase:myCollection"><i class="icon flaticon-expand"></i></a>                               
                          </div>
                        </div>
                      </div> 
                      <div class="col-md-4 gallery-item branding packing">
                         <div class="gallery-image">
                          <img src="{{ asset('images/gallery/m.jpg') }}" alt="smart class" class="img-responsive thumbnail">
                          <div class="gallery-overlay"> </div>
                          <div class="gallery-content">
                            <a href="{{ asset('images/gallery/m.jpg') }}" data-rel="lightcase:myCollection"><i class="icon flaticon-expand"></i></a>                               
                          </div>
                        </div>
                      </div> 
                      <div class="col-md-4 gallery-item branding packing">
                         <div class="gallery-image">
                          <img src="{{ asset('images/gallery/m2.jpg') }}" alt="smart class" class="img-responsive thumbnail">
                          <div class="gallery-overlay"> </div>
                          <div class="gallery-content">
                            <a href="{{ asset('images/gallery/m2.jpg') }}" data-rel="lightcase:myCollection"><i class="icon flaticon-expand"></i></a>                               
                          </div>
                        </div>
                      </div> 
                    </div>                       
              </div>
              
              <div class="col-md-3 col-sm-3 col-xs-12 sidebar">                          
                  <div class="sidebar-item">
                    <h3 class="sidebar-title">Quick links</h3>
                    <ul class="sidebar-categories"> 
                      <li><a href="{{ route('front.class-room-activities') }}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> ZGS Celebrate Garba</a></li>
                      <li><a href="{{ route('front.medi-care') }}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> MEDI Care</a></li>
                      <li><a href="{{ route('front.diwali') }}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Diwali</a></li>
                      <li><a href="{{ route('front.white-day') }}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> White Day</a></li>
                      <li><a href="{{ route('front.blue-day') }}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Blue Day</a></li>
                      <li><a href="{{ route('front.yellow-day') }}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Yellow Day</a></li>
                       
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
 


 
