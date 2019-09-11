<!doctype html>
<html class="no-js" lang="{{ config('app.locale') }}">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="author" content="M_Adnan" />
<!-- Document Title -->
<title>{{ config('app.name', 'SmartSales') }}</title>

<!-- Favicon -->
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
<link rel="icon" href="images/favicon.ico" type="image/x-icon">

<!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
<link rel="stylesheet" type="text/css" href="{{ asset('rs-plugin/css/settings.css') }}" media="screen" />

<!-- StyleSheets -->
{{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}
<link rel="stylesheet" href="{{ asset('css/ionicons.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/main.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

<!-- Fonts Online -->
<link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">


<!-- JavaScripts -->
<script src="{{ asset('js/vendors/modernizr.js') }}"></script>
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>

<!-- Page Wrapper -->
<div id="wrap" class="layout-1"> 
  
  <!-- Top bar -->
    @include('includes.topbar')
  
  
  <!-- Header -->
  <header>
    @include('includes.headertop')
    
    
    <!-- Nav -->
    @include('includes.topnav')
    
  </header>
  
  <!-- Slid Sec -->
   @yield('slideshow')
  
     
    
  
  <!-- Content -->
    @yield('maincontent')
  <!-- End Content --> 
  
  <!-- Footer -->
  <footer>
    @include('includes.footer')
    
  </footer>
  
  <!-- Rights -->
  <div class="rights">
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <p>Copyright © 2019 <a href="#." class="ri-li"> Developed By TechGen Bangladesh Ltd. </a> All rights reserved</p>
        </div>
        <div class="col-sm-6 text-right"> <img src="images/card-icon.png" alt=""> </div>
      </div>
    </div>
  </div>
  
  <!-- End Footer --> 
  
  <!-- GO TO TOP  --> 
  <a href="#" class="cd-top"><i class="fa fa-angle-up"></i></a> 
  <!-- GO TO TOP End --> 
</div>
<!-- End Page Wrapper --> 

<!-- JavaScripts --> 
<script src="{{ asset('js/vendors/jquery/jquery.min.js') }}"></script> 
<script src="{{ asset('js/vendors/wow.min.js') }}"></script> 
<script src="{{ asset('js/vendors/bootstrap.min.js') }}"></script> 
<script src="{{ asset('js/vendors/own-menu.js') }}"></script> 
<script src="{{ asset('js/vendors/jquery.sticky.js') }}"></script> 
<script src="{{ asset('js/vendors/owl.carousel.min.js') }}"></script> 

<!-- SLIDER REVOLUTION 4.x SCRIPTS  --> 
<script type="text/javascript" src="{{ asset('rs-plugin/js/jquery.tp.t.min.js') }}"></script> 
<script type="text/javascript" src="{{ asset('rs-plugin/js/jquery.tp.min.js') }}"></script> 
<script src="{{ asset('js/main.js') }}"></script>
<!-- ExtrScript -->
    @yield('extrascript')
<!-- ExtrScript --> 
</body>
</html>

