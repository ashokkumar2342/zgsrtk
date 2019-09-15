@extends('front.layout.main')
@push('styles')
 
@endpush
@section('body')

    <!-- Page Header Start here -->
    <section class="page-header" style="background-image: url('{{ asset('images/background/gallery.jpg') }}');">
      <div class="overlay">
        <div class="container">
          <h3>&nbsp;</h3>          
        </div><!-- container -->
      </div><!-- overlay -->
    </section><!-- page header -->
    <!-- Page Header End here -->
      
   <section class="classes padding-120">
      <div class="container">
         
        <div class="row">
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="class-item">
              <iframe width="100%" height="250" src="https://www.youtube.com/embed/T1TzFMi1TE8" frameborder="0" allowfullscreen></iframe>          
            </div><!-- class item -->
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="class-item">               
              <iframe width="100%" height="250" src="https://www.youtube.com/embed/LTeU2mlnc-U" frameborder="0" allowfullscreen></iframe>          
            </div><!-- class item -->
          </div>
           <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="class-item">
              <iframe width="100%" height="250" src="https://www.youtube.com/embed/_Tu4lW8VODE" frameborder="0" allowfullscreen></iframe>          
            </div><!-- class item -->
          </div>
          </div>
        </div><!-- row -->
        
      </div><!-- container -->
    </section><!-- classes -->
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
 


 
