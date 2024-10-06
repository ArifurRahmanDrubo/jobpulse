<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <title>Job Pulse</title>
    
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <link rel="manifest" href="site.webmanifest">
		<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

		<!-- CSS here -->
        <link href="{{ asset('assets/css')}}/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link rel="icon" type="image/x-icon" href="{{asset('/favicon.ico')}}" />
    <link href="{{asset('assets/css/bootstrap.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/animate1.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/fontawesome.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/toastify.min.css')}}" rel="stylesheet" />
    <script src="{{asset('assets/js/toastify-js.js')}}"></script>
    <script src="{{asset('assets/js/axios.min.js')}}"></script>
    <script src="{{asset('assets/js/config.js')}}"></script>
    <link rel="stylesheet" href="{{ asset('assets/css')}}/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css')}}/flaticon.css">
    <link rel="stylesheet" href="{{ asset('assets/css')}}/price_rangs.css">
    <link rel="stylesheet" href="{{ asset('assets/css')}}/slicknav.css">
    <link rel="stylesheet" href="{{ asset('assets/css')}}/animate.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css')}}/magnific-popup.css">
    <link rel="stylesheet" href="{{ asset('assets/css')}}/fontawesome-all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css')}}/themify-icons.css">
    <link rel="stylesheet" href="{{ asset('assets/css')}}/slick.css">
    <link rel="stylesheet" href="{{ asset('assets/css')}}/nice-select.css">
    <link rel="stylesheet" href="{{ asset('assets/css')}}/style1.css">
    <link rel="stylesheet" href="{{ asset('assets/css')}}/style.css">
  
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('assets/css')}}/nucleo-icons.css" rel="stylesheet" />
    <link href="{{ asset('assets/css')}}/nucleo-svg.css" rel="stylesheet" />
    <link href="{{ asset('assets/css')}}/main.css" rel="stylesheet" />
    <link href="{{ asset('assets/css')}}/util.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('assets/css')}}/material-dashboard.css?v=3.1.0" rel="stylesheet" />
    <!-- Nepcha Analytics (nepcha.com) -->
    

<style>
    /* Add this style to include box shadow for the login button */
    .btn {
        box-shadow: 0px 4px 8px rgba(0, 0, 0.2, 0.3); /* You can adjust the values as needed */
    }
</style>
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body  class="bg-gray-200">

<div id="loader" class="LoadingOverlay d-none">
<div class="Line-Progress">
    <div class="indeterminate"></div>
</div>
</div>

<div>
    @yield('content')
</div>
<script>

</script>


  <script src="{{ asset('assets/js')}}/plugins/perfect-scrollbar.min.js"></script>
  <script src="{{ asset('assets/js')}}/plugins/smooth-scrollbar.min.js"></script>
  <script src="{{ asset('assets/js')}}/plugins/chartjs.min.js"></script>
<script src="{{asset('assets/js')}}/bootstrap.bundle.js"></script>
<script src="{{ asset('assets/js')}}/core/popper.min.js"></script>
  <script src="{{ asset('assets/js')}}/core/bootstrap.min.js"></script>


  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>


  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('assets/js')}}/material-dashboard.min.js?v=3.1.0"></script>
</body>
</html>