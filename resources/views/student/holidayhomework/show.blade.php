  @extends('student.layout.base')
@push('links')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 <link href="{{ asset('images/favicon.png') }}" rel="shortcut icon" type="image/vnd.microsoft.icon"/>

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">
  
    <!-- Bootstrap -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
  
    <!-- Font-awesome -->
    <link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    
  
    <!-- Flaticon -->
    <link href="{{ asset('assets/flaticon/flaticon.css') }}" rel="stylesheet">
  
    <!-- lightcase -->
    <link href="{{ asset('assets/css/lightcase.css') }}" rel="stylesheet">
  
    <!-- Swiper -->
    <link href="{{ asset('assets/css/swiper.min.css') }}" rel="stylesheet">

    <!-- quick-view -->
    <link href="{{ asset('assets/css/quick-view.css') }}" rel="stylesheet">

    <!-- nstSlider -->
    <link href="{{ asset('assets/css/jquery.nstSlider.css') }}" rel="stylesheet">

    <!-- flexslider -->
    <link href="{{ asset('assets/css/flexslider.css') }}" rel="stylesheet">
  
    <!-- Style -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
  
    <!-- Responsive -->
    <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet">
@endpush
@section('body')

    <section class="content">
     <div class="box">       
        <div class="box-header">
        <ol class="breadcrumb text-left">         
          <li><h4>Holiday Homework </h4></li>
        </ol>   
      </div>       
          <!-- Trigger the modal with a button -->
         <div class="box">
           <section class="gallery ">
            <div class="container">            
               <div class="gallery-items">  
               
                  <div class="gallery-item branding packing">
                    <div class="gallery-image">
                    {{ $holidayhomework->holiday_homework}}
                    <br>
                      <img src="{!! url('uploads/holidayhomework/'.$holidayhomework->holiday_homework) !!}" style="height:240px;width: 358px; " alt="dance" class="img-responsive thumbnail">
                      <div class="gallery-overlay"> </div>
                      <div class="gallery-content">
                        <a href="{!! url('uploads/holidayhomework/'.$holidayhomework->holiday_homework) !!}" data-rel="lightcase:myCollection"><i class="icon flaticon-expand"></i></a>                               
                      </div>
                    </div>
                  </div><!-- gallery item -->                   
                  
                                  
              </div><!-- container --> 
              <div class="row">
                    <div class="com-md-12">
                    
                    </div>
                  </div>    
            </section><!-- gallery -->
    </section>
    <!-- /.content -->
   
@endsection
@push('links')

 
@endpush
 @push('scripts')
           <!-- jquery -->
 
  
    <!-- Isotope -->
    <script src="{{ asset('assets/js/isotope.min.js') }}"></script>
  
    <!-- lightcase -->
    <script src="{{ asset('assets/js/lightcase.js') }}"></script>
  
    <!-- counterup -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
    <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
  
    <!-- Swiper -->
    <script src="{{ asset('assets/js/swiper.jquery.min.js') }}"></script>

    <!--progress-->
    <script src="{{ asset('assets/js/circle-progress.min.js') }}"></script>

    <!--velocity-->
    <script src="{{ asset('assets/js/velocity.min.js') }}"></script>

    <!--quick-view-->
    <script src="{{ asset('assets/js/quick-view.js') }}"></script>

   
  
    <!-- custom -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>
 
  
@endpush

 