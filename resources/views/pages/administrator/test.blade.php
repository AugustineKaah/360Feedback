<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/materialdesignicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row" style="background: linear-gradient(90deg, rgba(210,224,222,1) 0%, rgba(92,224,196,1) 54%, rgba(10,131,148,1) 100%);" >
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center" >
          <a class="navbar-brand brand-logo" href="index.html"><img src="" alt="logo" /></a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src=" "alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch" style="color: white;">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
            
            <nav class="navbar navbar-expand-md " style="background-color:transparent !important; width:100%">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}" style="color:white">
                        {{ config('app.name', '360 Feedback') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>
    
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">
    
                        </ul>
    
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>
    
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
    
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
    
            
            
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-menu"></span>
            </button>
          </div>
        
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2">Yaw T</span>
                  <span class="text-secondary text-small">Town Experience Consultant</span>
                </div>
     
              </a>
            </li>
            <li class="nav-item sidebar-actions">
              <span class="nav-link">
                
                <button class="btn btn-block btn-lg btn-success text-center" >Request Feedback </button>

              
              
              </span>
            </li>
           
           
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span class="menu-title">Assesments</span>
                <i class="mdi mdi-receipt  menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span class="menu-title">Report</span>
                <i class="mdi mdi-note-text menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                  <span class="menu-title">Submit Feedback</span>
                  <i class="mdi mdi-note-text menu-icon"></i>
                </a>
              </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#subordinates" aria-expanded="false" aria-controls="ui-basic">
                  <span class="menu-title">subordinates</span>
                  <i class="menu-arrow"></i>
                  <i class="mdi mdi-account-multiple menu-icon"></i>
                </a>
                <div class="collapse" id="subordinates">
                  <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="#">My Subordinates</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">Subordinate Report</a></li>
                  </ul>
                </div>
              </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                  <span class="menu-title">Administration</span>
                  <i class="menu-arrow"></i>
                  <i class="mdi mdi-account-key menu-icon"></i>
                </a>
                <div class="collapse" id="ui-basic">
                  <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="#">Users</a></li>
                    <li class="nav-item"> <a class="nav-link" href="/departments">Departments</a></li>
                    <li class="nav-item"> <a class="nav-link" href="core_values">Core Values</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">Admin Reports</a></li>
                  </ul>
                </div>
              </li>
            
          
            
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            
           
            
            
            
            
          </div>
        
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
   
    <!-- endinject -->
    <!-- Plugin js for this page -->
   
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('js/misc.js') }}"></script>

 
    <!-- endinject -->

    <!-- End custom js for this page -->


    
  </body>
</html>