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
 <div class="container">            
    <div class="gallery-items">  
    
     @foreach ($galleries as $gallery)  
       <div class="gallery-item branding packing col-md-4">
         <div class="gallery-image">
           <img src="{!! url('uploads/'.$gallery->image) !!}" style="height:240px;width: 358px; " alt="dance" class="img-responsive thumbnail">
           <div class="gallery-overlay"> </div>
           <div class="gallery-content">
             <a href="{!! url('uploads/'.$gallery->image) !!}" data-rel="lightcase:myCollection"><i class="icon flaticon-expand"></i></a>                               
           </div>
         </div>
       </div><!-- gallery item -->                   
       @endforeach
                       
   </div><!-- container --> 
   <div class="row">
         <div class="com-md-12">
         {{ $galleries->links() }}
         </div>
       </div>     
    


 
 
 <script src="{{ asset('assets/js/jquery-1.12.4.min.js') }}"></script>
  
    <!-- Bootstrap -->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
  
    <!-- Isotope -->
 
  
    <!-- lightcase -->
    <script src="{{ asset('assets/js/lightcase.js') }}"></script>
  
    <!-- counterup -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
 
  
   
 
 

    <!--quick-view-->
    <script src="{{ asset('assets/js/quick-view.js') }}"></script>

   

    <!--flexslider-->
    <script src="{{ asset('assets/js/flexslider-min.js') }}"></script>

    <!--easing-->
    <script src="{{ asset('assets/js/jquery.easing.min.js') }}"></script>
  
    <!-- custom -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>
   
 
