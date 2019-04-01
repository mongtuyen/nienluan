<!DOCTYPE html>
<html lang="en">
<head>
  <title>@yield('title')</title>
  <meta charset="UTF-8">
  <meta name="description" content="">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <!-- Title -->
  
  <!-- Favicon -->
  <link rel="icon" href="{{asset('theme/farmie/img/core-img/favicon.ico') }}">
  <!-- Core Stylesheet -->
  <link rel="stylesheet"  href="{{ asset('theme/farmie/style.css') }}">

  <link rel="stylesheet" type="text/css" href="{{ asset('theme/farmie/css/custom-styles.css') }}">
  <script type="text/javascript" language="javascript" src="{{asset('theme/adminlte/bower_components/ckeditor/ckeditor.js')}}"></script>
 
  @yield('custom-css')
  
</head>

<body>

<!-- Preloader -->
	<div class="preloader d-flex align-items-center justify-content-center">
    	<div class="spinner"></div>
  	</div>

	<!-- Header -->

  	@include('frontend.layouts.partials.header')

    <section class="famie-blog-area">
    <div class="container">
      <div class="row">
        <!-- Posts Area -->
        <div class="col-12 col-md-8">
          

          @yield('main-content')
        </div>

        @include('frontend.layouts.partials.sidebarban')
      </div>
    </div>
  </section>

  

	<!-- Footer -->
  	@include('frontend.layouts.partials.footer')
	</div>
 <!-- ##### All Javascript Files ##### -->
  <!-- jquery 2.2.4  -->
  <script src="{{asset('theme/farmie/js/jquery.min.js')}}"></script>
  <!-- Popper js -->
  <script src="{{asset('theme/farmie/js/popper.min.js')}}"></script>
  <!-- Bootstrap js -->
  <script src="{{asset('theme/farmie/js/bootstrap.min.js')}}"></script>
  <!-- Owl Carousel js -->
  <script src="{{asset('theme/farmie/js/owl.carousel.min.js')}}"></script>
  <!-- Classynav -->
  <script src="{{asset('theme/farmie/js/classynav.js')}}"></script>
  <!-- Wow js -->
  <script src="{{asset('theme/farmie/js/wow.min.js')}}"></script>
  <!-- Sticky js -->
  <script src="{{asset('theme/farmie/js/jquery.sticky.js')}}"></script>
  <!-- Magnific Popup js -->
  <script src="{{asset('theme/farmie/js/jquery.magnific-popup.min.js')}}"></script>
  <!-- Scrollup js -->
  <script src="{{asset('theme/farmie/js/jquery.scrollup.min.js')}}"></script>
  <!-- Jarallax js -->
  <script src="{{asset('theme/farmie/js/jarallax.min.js')}}"></script>
  <!-- Jarallax Video js -->
  <script src="{{asset('theme/farmie/js/jarallax-video.min.js')}}"></script>
  <!-- Active js -->
  <script src="{{asset('theme/farmie/js/active.js')}}"></script>

@yield('custom-scripts')
</body>

</html>