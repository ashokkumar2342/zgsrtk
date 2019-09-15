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
    <!-- Page Header End here -->
      <!-- facility Start here -->
    <section class="facility" style="padding-top:50px">
      <div class="container">
        <div class="row">
          <div class="col-md-9 col-sm-9 col-xs-12">
            <h4>ZGS Celebrate Navratri with Garba</h4> 
            <p align="justify">Garba (ગરબા in Gujarati) is a form of dance that originated in the state of Gujarat in India.The name is derived from the Sanskrit term Garbha ('womb') and Deep ('a small earthenware lamp'). Many traditional garbas are performed around a centrally lit lamp or a picture or statue of the Goddess Shakti. The circular and spiral figures of Garba have similarities to other spiritual dances, such as those of Sufi culture. Traditionally, it is performed during the nine-day Hindu festival Navarātrī (Gujarati નવરાત્રી Nava = 9, rātrī = nights). Either the lamp (the Garba Deep) or an image of the Goddess, Durga (also called Amba) is placed in the middle of concentric rings as an object of veneration.</p> 
                
             <br>
            <!-- Gallery Start here -->
                    <div class="row gallery">
                      <div class="col-md-4 gallery-item branding packing">
                         <div class="gallery-image">
                          <img src="{{ asset('images/gallery/Garba15_4.jpg') }}" alt="smart class" class="img-responsive thumbnail">
                          <div class="gallery-overlay"> </div>
                          <div class="gallery-content">
                            <a href="{{ asset('images/gallery/Garba15_4.jpg') }}" data-rel="lightcase:myCollection"><i class="icon flaticon-expand"></i></a>                               
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4 gallery-item branding packing">
                         <div class="gallery-image">
                          <img src="{{ asset('images/gallery/Garba15_5.jpg') }}" alt="smart class" class="img-responsive thumbnail">
                          <div class="gallery-overlay"> </div>
                          <div class="gallery-content">
                            <a href="{{ asset('images/gallery/Garba15_5.jpg') }}" data-rel="lightcase:myCollection"><i class="icon flaticon-expand"></i></a>                               
                          </div>
                        </div>
                      </div>
                       
                      <div class="col-md-4 gallery-item branding packing">
                         <div class="gallery-image">
                          <img src="{{ asset('images/gallery/Garba15_7.jpg') }}" alt="smart class" class="img-responsive thumbnail">
                          <div class="gallery-overlay"> </div>
                          <div class="gallery-content">
                            <a href="{{ asset('images/gallery/Garba15_7.jpg') }}" data-rel="lightcase:myCollection"><i class="icon flaticon-expand"></i></a>                               
                          </div>
                        </div>
                      </div><div class="col-md-4 gallery-item branding packing">
                         <div class="gallery-image">
                          <img src="{{ asset('images/gallery/Garba15_8.jpg') }}" alt="smart class" class="img-responsive thumbnail">
                          <div class="gallery-overlay"> </div>
                          <div class="gallery-content">
                            <a href="{{ asset('images/gallery/Garba15_8.jpg') }}" data-rel="lightcase:myCollection"><i class="icon flaticon-expand"></i></a>                               
                          </div>
                        </div>
                      </div><div class="col-md-4 gallery-item branding packing">
                         <div class="gallery-image">
                          <img src="{{ asset('images/gallery/Garba15_9.jpg') }}" alt="smart class" class="img-responsive thumbnail">
                          <div class="gallery-overlay"> </div>
                          <div class="gallery-content">
                            <a href="{{ asset('images/gallery/Garba15_9.jpg') }}" data-rel="lightcase:myCollection"><i class="icon flaticon-expand"></i></a>                               
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4 gallery-item branding packing">
                         <div class="gallery-image">
                          <img src="{{ asset('images/gallery/Garba15_2.jpg') }}" alt="smart class" class="img-responsive thumbnail">
                          <div class="gallery-overlay"> </div>
                          <div class="gallery-content">
                            <a href="{{ asset('images/gallery/Garba15_2.jpg') }}" data-rel="lightcase:myCollection"><i class="icon flaticon-expand"></i></a>                               
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
 


 
