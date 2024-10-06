<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <title>Job Pulse</title>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    {{-- <link rel="manifest" href="site.webmanifest"> --}}
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
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('assets/css')}}/material-dashboard.css?v=3.1.0" rel="stylesheet" />
    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->

  
    <style>
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
        color: black;
      }
     
    /* Adjusting DataTable search input */
    .dataTables_filter {
        float: right;
    }

    /* Adjusting DataTable entries length select */
    .dataTables_length {
        float: left;
    }
    .dataTables_paginate {
        float: right;
    }
    </style>
</head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
           

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif
            <div id="loader" class="LoadingOverlay d-none">
                <div class="Line-Progress">
                    <div class="indeterminate"></div>
                </div>
                </div>
             
                @include('candidates.sidebar')
                <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
                  <!-- Navbar -->
                  <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
                    <div class="container-fluid py-1 px-3">
                      <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                          <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                          <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
                        </ol>
                        <h6 class="font-weight-bolder mb-0"></h6>
                      </nav>
                      <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                          <div class="input-group input-group-outline">
                            <label class="form-label">Type here...</label>
                            <input type="text" value="" id="uname" class="form-control">
                          </div>
                        </div>
                        <ul class="navbar-nav  justify-content-end">
                          <div class="hidden sm:flex sm:items-center sm:ms-6 dropdown">
                            <i class="material-icons text-gray-500 dark:text-gray-400 cursor-pointer" style="font-size: 24px;" id="avatarDropdown" data-bs-toggle="dropdown" aria-expanded="false">account_circle</i>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="avatarDropdown">
                                <li><a class="dropdown-item" href="#">{{ __('Profile') }}</a></li>
                                <li class="nav-item">
                                  <form method="POST" action="{{ route('logout') }}">
                                      @csrf
                                      <button type="submit" class="nav-link ml-1" style="border: none; background: none; cursor: pointer;">
                                          <span class="nav-link-text ms-1">Logout</span>
                                      </button>
                                  </form>
                              </li>
                            </ul>
                        </div>
                        </ul>
                      </div>
                    </div>
                  </nav>
                  <!-- End Navbar -->
                  <div class="container-fluid py-4">
                    
                    @yield('content')
                    
                    
                    <footer class="footer py-4  ">
                      <div class="container-fluid">
                        <div class="row align-items-center justify-content-lg-between">
                          <div class="offset-lg-3 mb-lg-0 mb-4">
                            <div class="copyright text-center text-sm text-muted text-lg-start">
                              © <script>
                                document.write(new Date().getFullYear())
                              </script>,
                              made with <i class="fa fa-heart"></i> by
                              <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Drubo</a>
                              for a better web.
                            </div>
                          </div>
                         
                        </div>
                      </div>
                    </footer>
                  </div>
                </main>
                <div class="fixed-plugin">
                  <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
                    <i class="material-icons py-2">settings</i>
                  </a>
                  <div class="card shadow-lg">
                    <div class="card-header pb-0 pt-3">
                      <div class="float-start">
                        <h5 class="mt-3 mb-0">Dashboard  Configurator</h5>
                        <p>See our dashboard options.</p>
                      </div>
                      <div class="float-end mt-4">
                        <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                          <i class="material-icons">clear</i>
                        </button>
                      </div>
                      <!-- End Toggle Button -->
                    </div>
                    <hr class="horizontal dark my-1">
                    <div class="card-body pt-sm-3 pt-0">
                      <!-- Sidebar Backgrounds -->
                      <div>
                        <h6 class="mb-0">Sidebar Colors</h6>
                      </div>
                      <a href="javascript:void(0)" class="switch-trigger background-color">
                        <div class="badge-colors my-2 text-start">
                          <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
                          <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
                          <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
                          <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
                          <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
                          <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
                        </div>
                      </a>
                      <!-- Sidenav Type -->
                      <div class="mt-3">
                        <h6 class="mb-0">Sidenav Type</h6>
                        <p class="text-sm">Choose between 2 different sidenav types.</p>
                      </div>
                      <div class="d-flex">
                        <button class="btn bg-gradient-dark px-3 mb-2 active" data-class="bg-gradient-dark" onclick="sidebarType(this)">Dark</button>
                        <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
                        <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
                      </div>
                   
                      <div class="mt-3 d-flex">
                        <h6 class="mb-0">Navbar Fixed</h6>
                        <div class="form-check form-switch ps-0 ms-auto my-auto">
                          <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
                        </div>
                      </div>
                      <hr class="horizontal dark my-3">
                     
                      <hr class="horizontal dark my-sm-4">
              
                    
                      <div class="w-100 text-center">
                       
                        <h6 class="mt-3">Thank you for sharing!</h6>
                        <a href="https://twitter.com/intent/tweet?text=Check%20Material%20UI%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
                          <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
                        </a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/material-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
                          <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
        </div>
        <script src="{{ asset('assets/js')}}/plugins/perfect-scrollbar.min.js"></script>
        <script src="{{ asset('assets/js')}}/plugins/smooth-scrollbar.min.js"></script>
        <script src="{{ asset('assets/js')}}/plugins/chartjs.min.js"></script>
      <script src="{{asset('assets/js')}}/core/bootstrap.bundle.js"></script>
      <script src="{{ asset('assets/js')}}/core/popper.min.js"></script>
        <script src="{{ asset('assets/js')}}/core/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
      
      
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