<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags --> 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="{{ asset('assets') }}/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="{{ asset('assets') }}/vendors/feather/feather.css">
  <link rel="stylesheet" href="{{ asset('assets') }}/vendors/base/vendor.bundle.base.css">
  <link rel="stylesheet" href="{{ asset('assets') }}/vendors/flag-icon-css/css/flag-icon.min.css"/>
  <link rel="stylesheet" href="{{ asset('assets') }}/vendors/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{ asset('assets') }}/vendors/jquery-bar-rating/fontawesome-stars-o.css">
  <link rel="stylesheet" href="{{ asset('assets') }}/vendors/jquery-bar-rating/fontawesome-stars.css">
  <link rel="icon" type="image/png" href="{{ asset('assets') }}images/icons/favicon.ico"/>
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <link href="{{ asset('assets') }}css/nucleo-icons.css" rel="stylesheet" />
  <link href="{{ asset('assets') }}/css/nucleo-svg.css" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <link id="pagestyle" href="{{ asset('assets') }}/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
  
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
  <link rel="stylesheet" href="{{ asset('assets') }}/css/style.css">
  <link rel="shortcut icon" href="{{ asset('assets') }}/images/favicon.png" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
    .colored-toast.swal2-icon-success {
  background-color: #58f100 !important;
}

.colored-toast.swal2-icon-error {
  background-color: #f27474 !important;
}

.colored-toast.swal2-icon-warning {
  background-color: #ff0000 !important;
}

.colored-toast.swal2-icon-info {
  background-color: #3fc3ee !important;
}

.colored-toast.swal2-icon-question {
  background-color: #f6f600 !important;
}

.colored-toast .swal2-title {
  color: white;
}

.colored-toast .swal2-close {
  color: white;
}
.colored-toast .swal2-html-container {
  color: white;
}



          /* Your custom CSS */
          .btn-primary {
            background-color: rgb(89, 7, 223) !important; /* Example color */
            border-color: rgb(17, 57, 131) !important; /* Example color */
          }
          .btn-danger {
            background-color: rgb(214, 16, 66) !important; /* Example color */
            border-color: rgb(243, 77, 113) !important; /* Example color */
          }
          input[type=text] {
            background-color: transparent !important;
            color: black;}
        
  </style>
</head>
<body>
  <div class="container-scroller">
        @yield('content')
       
      </div>
    </div>
  </div>

  <script src="{{ asset('assets') }}/vendors/base/vendor.bundle.base.js"></script>
  <script src="{{ asset('assets') }}/js/off-canvas.js"></script>
  <script src="{{ asset('assets') }}/js/hoverable-collapse.js"></script>
  <script src="{{ asset('assets') }}/js/template.js"></script>
  <script src="{{ asset('assets') }}/vendors/chart.js/Chart.min.js"></script>
  <script src="{{ asset('assets') }}/vendors/jquery-bar-rating/jquery.barrating.min.js"></script>
  <script src="{{ asset('assets') }}/js/dashboard.js"></script>
  <script src="{{ asset('assets/js')}}/core/popper.min.js"></script>
  <script src="{{ asset('assets/js')}}/core/bootstrap.min.js"></script>
  <script src="{{ asset('assets/js')}}/plugins/perfect-scrollbar.min.js"></script>
  <script src="{{ asset('assets/js')}}/plugins/smooth-scrollbar.min.js"></script>
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
