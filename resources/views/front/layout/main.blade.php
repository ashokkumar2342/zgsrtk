<!DOCTYPE html>
<html lang="en">
  
       
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>ZAD Global School Rohtak | Best School in rohtak | School in rohtak </title>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script> --}}
    <meta name="Author" content="www.zadglobalschool.com"/>
        <meta name="keywords" content="ZADGlobal School Rohtak | zgs | zad Rohtak | Best School in Rohtak | School in Rohtak" />
        <meta name="description" content="ZAD Education Society has reached the dizzy heights of success, after nurturing thousands of students and helping them to realize their cherished goals. It has become a house hold name through the length and breadth of the country." />

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
        @stack('links')

  
  
  </head>
  <body id="scroll-top">
    @include('front.include.header')
    @yield('body')
    @include('front.include.footer')
    
            <!-- jquery -->
    <script src="{{ asset('assets/js/jquery-1.12.4.min.js') }}"></script>
  
    <!-- Bootstrap -->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
  
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

    <!--nstSlider-->
    <script src="{{ asset('assets/js/jquery.nstSlider.js') }}"></script>

    <!--flexslider-->
    <script src="{{ asset('assets/js/flexslider-min.js') }}"></script>

    <!--easing-->
    <script src="{{ asset('assets/js/jquery.easing.min.js') }}"></script>
  
    <!-- custom -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>
 @stack('scripts')

    
  
  
  </body>

 
</html>