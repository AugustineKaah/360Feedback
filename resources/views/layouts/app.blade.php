<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

<!--<title>/* config('app.name', 'Laravel') */</title>-->
    <title>Competency Assessment</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/_all-skins.min.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('css/fontawesone.min.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('css/AdminLTE.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/cards.min.css') }}" rel="stylesheet">
</head>
<body class="skin-blue sidebar-mini" style="height: auto; min-height: 100%;">
    <div class="wrapper" style="height: auto; min-height: 100%;">
    
      <header class="main-header">
    
        <!-- Logo -->
        <a href="#" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>Deloitte</b></span>
          <!-- logo for regular state and mobile devices -->
          <div class="pull-left image">
            <img src="{{ asset('img/deloitte.jpg') }}" class="img-circle" alt="Image" style="width:40px">
          </div>
          <span class="logo-lg"><b>Deloitte</b></span>
        </a>
    


        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top nav-bar-expand-md">
          <!-- Sidebar toggle button-->
          <ul class="navbar-nav nav">
            <li class="nav-item">
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
            </li>
          <li class="nav-item" style="padding-top:8px">
            <span class="nav-title">360° Feedback</span>
          </li>
          </ul>
          <!-- Navbar Right Menu -->
          
             
          
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              
              <!-- Messages: style can be found in dropdown.less-->
               <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"  role="button"  aria-haspopup="true" aria-expanded="false" v-pre>
                  <img src="{{ asset('img/noimage.jpg') }}" class="user-image" alt="User Image">
                  <span class="hidden-xs">{{ Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="{{ asset('img/noimage.jpg') }}" class="img-circle" alt="User Image">
    
                    <p>{{ Auth::user()->name }}
                        
                      <small>{{ Auth::user()->job_title }}</small>
                    </p>
                  </li>
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a class="btn btn-flat btn-default" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                      @csrf
                                  </form>
                    </div>
                  </li>
                  
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              
            </ul>
            
          </div>
    
        </nav>






        
       
















        
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar" style="height: auto;">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="img/noimage.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>{{ Auth::user()->firstname }}</p>
              <a href="#"><i class="fa fa-circle text-success"></i>{{ Auth::user()->job_title }}</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                      <i class="fa fa-search"></i>
                    </button>
                  </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu tree" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="">
              <a href="/home">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                <span class="pull-right-container">
                 
                </span>
              </a>
             
            </li>
            <li class="">
              <a href="/myprofile">
                <i class="fa fa-user"></i>
                <span>Profile</span>
                
              </a>
              
            </li>
            <li>
              <a href="/feedback">
                <i class="fa fa-th"></i> <span>Request Feedback</span>
                <span class="pull-right-container">
                  
                </span>
              </a>
            </li>
            <li>
              <a href="/self_assessment">
                <i class="fa fa-pie-chart"></i>
                <span>Self Assessment</span>
                <span class="pull-right-container">
                  
                </span>
              </a>
            </li>
            <li>
              <a href="/submit_feedback">
                <i class="fa fa-comment"></i>
                <span>Submit Feedback</span>
                <span class="pull-right-container">
                  
                </span>
              </a>
            </li>
            <li>
              <a href="/my_reports">
                <i class="fa fa-bar-chart"></i>
                <span>My Reports</span>
                <span class="pull-right-container">
                
                </span>
              </a>
            </li>
            {{-- @role('manager') --}}
            <li>
              <a href="my_subordinates">
                <i class="fa fa-sitemap"></i> <span>My Subordinates</span>
                {{-- <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span> --}}
              </a>
              {{-- <ul class="treeview-menu">
                <li><a href="/my_subordinates"><i class="fa fa-circle-o"></i> Profiles</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> Submit Feedback</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> Reports</a></li>
              </ul> --}}
            </li>
            {{-- @endrole --}}
            @role('administrator')
            <li class="treeview">
              <a href="/administration">
                <i class="fa fa-users"></i> <span>Administration</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="/administration"><i class="fa fa-circle-o"></i> Dashboard</a></li>
                <li><a href="/users"><i class="fa fa-circle-o"></i> Users</a></li>
                <li><a href="/permissions"><i class="fa fa-circle-o"></i> Permissions</a></li>
                <li><a href="/departments"><i class="fa fa-circle-o"></i> Departments</a></li>
                
                <li><a href="#"><i class="fa fa-circle-o"></i> Behavioral Competencies</a></li>
               
              </ul>
            </li>

            @endrole
            
            </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
    
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" style="min-height: 960px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            
            @yield('header')
          </h1>
          <ol class="breadcrumb">
            <li><a href="/home"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">
              @yield('header')
            </li>
          </ol>
        </section>
        
        
        
        
        
        
        
        






      <!-- page-body-wrapper ends -->
    
        <section class="content">
            <div class="container-fluid card">
                
                <div class="row">
                    <div class="card-body">
                    <div class="col-12">
                     

                      @if (count($errors)>0)
                      @foreach ($errors->all() as $error)
                      <div class="alert alert-danger alert-dismissible" role="alert">
                        <strong>Error!</strong>  {{$error}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      @endforeach
                          
                      @endif
                      @if (session('error'))
                        <div class="alert alert-danger alert-dismissible" role="alert">
                          <strong>Error!</strong>  {{Session('error')}}
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                      
                          
                      @endif
                      @if (session('success'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                          <strong>Success!</strong>  {{Session('success')}}
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                      
                          
                      @endif
                        @yield('content')
                    </div>
                    </div>
                </div>
                
            </div>
        </section>

 
  
      
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
  
    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        
      </div>
      <p>© 2020</p>
    </footer>
  
    <!-- Control Sidebar -->
    
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
  
  </div>



    
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/adminlte.min.js') }}"></script>

 
    <!-- endinject -->

    <!-- End custom js for this page -->


    
  </body>
</html>