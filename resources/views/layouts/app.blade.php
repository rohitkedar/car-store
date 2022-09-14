

@guest
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
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>

@else
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="robots" content="noindex">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | Car Store</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="{{ asset('adminlte/font/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Font Datatable -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('adminlte/font/ionicons.min.css') }}">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/toastr/toastr.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <!--<link rel="stylesheet" href="{{ asset('adminlte/plugins/jqvmap/jqvmap.min.css') }}">-->
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.css') }}">
  <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader 
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('adminlte/dist/img/AdminLTELogo.png') }}"  alt="AdminLTELogo" height="60" width="60">
  </div> -->

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" id="hedear_menu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        


        
        <li class="nav-item dropdown">
          <?php if( !empty(Auth::user()->profile)){ ?>
          <a class="nav-link" data-toggle="dropdown" href="#">
            <img src="<?php echo config('global.AWS_S3_PATH').'images/profile/'.Auth::user()->profile; ?>" style="width: 20px; border-radius: 50px;"> {{ Auth::user()->name }} <i class="fas fa-chevron-down"></i>
            </a>
          <?php } else { ?>
            <a class="nav-link" data-toggle="dropdown" href="#">
              <img src="{{ asset('uploads/default.png') }}" style="width: 20px; border-radius: 50px;"> {{ Auth::user()->name }} <i class="fas fa-chevron-down"></i>
            </a>
          <?php } ?>
          <div class="dropdown-menu dropdown-menu-right p-0">
           
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();" role="button">
              <i class="fas fa-sign-out-alt"></i> Logout
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="home" class="brand-link">
        <!--img src="{{ asset('adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"-->
        &nbsp;&nbsp;&nbsp;
        <span class="brand-text font-weight-light"><b>Car Store</b></span>
      </a>
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">Alexander Pierce</a>
          </div>
        </div>   -->
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!--  Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="{{ url('home') }}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="{{ (request()->segment(1) == 'users') ? 'nav-item menu-is-opening menu-open' : 'nav-item' }}">
              <a href="#" class="{{ (request()->segment(1) == 'users') ? 'nav-link active' : 'nav-link' }}">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  User
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ url('users') }}" class="{{ (request()->is('users')) ? 'nav-link active' : 'nav-link' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Manage Users</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('users/create') }}" class="{{ (request()->is('users/create')) ? 'nav-link active' : 'nav-link' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add User</p>
                  </a>
                </li>
              </ul>             
            </li>
            <li class="{{ (request()->segment(1) == 'owners') ? 'nav-item menu-is-opening menu-open' : 'nav-item' }}">
              <a href="#" class="{{ (request()->segment(1) == 'owners') ? 'nav-link active' : 'nav-link' }}">
                <i class="nav-icon fas fa-users"></i>
                <p>
                Owners
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ url('owners') }}" class="{{ (request()->is('owners')) ? 'nav-link active' : 'nav-link' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Manage Owners</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('owners/create') }}" class="{{ (request()->is('owners/create')) ? 'nav-link active' : 'nav-link' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Owner</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="{{ (request()->segment(1) == 'categories') ? 'nav-item menu-is-opening menu-open' : 'nav-item' }}">
              <a href="#" class="{{ (request()->segment(1) == 'categories') ? 'nav-link active' : 'nav-link' }}">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                Categories
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ url('categories') }}" class="{{ (request()->is('categories')) ? 'nav-link active' : 'nav-link' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Manage Categories</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('categories/create') }}" class="{{ (request()->is('categories/create')) ? 'nav-link active' : 'nav-link' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Categorie</p>
                  </a>
                </li>
              </ul>
              
            </li>
            <li class="{{ (request()->segment(1) == 'mechanics') ? 'nav-item menu-is-opening menu-open' : 'nav-item' }}">
              <a href="#" class="{{ (request()->segment(1) == 'mechanics') ? 'nav-link active' : 'nav-link' }}">
                <i class="nav-icon fas fa-th"></i>
                <p>
                Mechanics
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ url('mechanics') }}" class="{{ (request()->is('mechanics')) ? 'nav-link active' : 'nav-link' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Manage Mechanic</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('mechanics/create') }}" class="{{ (request()->is('mechanics/create')) ? 'nav-link active' : 'nav-link' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Mechanic</p>
                  </a>
                </li>
              </ul>
              
            </li>
            <li class="{{ (request()->segment(1) == 'cars') ? 'nav-item menu-is-opening menu-open' : 'nav-item' }}">
              <a href="#" class="{{ (request()->segment(1) == 'cars') ? 'nav-link active' : 'nav-link' }}">
                <i class="nav-icon fas fa-table"></i>
                <p>
                Cars
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ url('cars') }}" class="{{ (request()->is('cars')) ? 'nav-link active' : 'nav-link' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Manage Cars</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('cars/create') }}" class="{{ (request()->is('cars/create')) ? 'nav-link active' : 'nav-link' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Cars</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('cars/assign-mechanic') }}" class="{{ (request()->is('cars/mechanic')) ? 'nav-link active' : 'nav-link' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Assign Mechanic</p>
                  </a>
                </li>
              </ul>
              
            </li>

         
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      @yield('content')
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <strong>Copyright &copy; <?php echo date("Y"); ?> <a href="#">Car Store</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.0
      </div>
    </footer>
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <!-- jQuery UI 1.11.4 -->
  <script src="{{ asset('adminlte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <script src="{{ asset('adminlte/plugins/select2/js/select2.full.min.js') }}"></script>
  <script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>

  <script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>

  <script src="{{ asset('adminlte/plugins/jszip/jszip.min.js') }}"></script>
  <script src="{{ asset('adminlte/plugins/pdfmake/pdfmake.min.js') }}"></script>
  <script src="{{ asset('adminlte/plugins/pdfmake/vfs_fonts.js') }}"></script>
  <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
  <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
  <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>





  
  <script src="{{ asset('adminlte/plugins/moment/moment.min.js') }}"></script>
  <script src="{{ asset('adminlte/plugins/daterangepicker/daterangepicker.js') }}"></script>
 
  <!-- Summernote -->
  <script src="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.js') }}"></script>
  <!-- overlayScrollbars -->
  <script src="{{ asset('adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('adminlte/plugins/toastr/toastr.min.js') }}"></script>
  <script src="{{ asset('adminlte/dist/js/adminlte.js') }}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{ asset('adminlte/dist/js/demo.js') }}"></script>

  <!-- AdminLTE dashboard demo (This is only for demo purposes) 
  <script src="{{ asset('adminlte/dist/js/pages/dashboard.js') }}"></script>-->
  <script>
    $(function() {
      //Initialize Select2 Elements
      $('.select2').select2()
      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })
    })
  </script>
  <script>
    $(function () {
        $('#summernote').summernote()
    });
    </script>
    
  @stack('footer-scripts')
  @yield('myjsfile')
</body>

</html>
@endguest