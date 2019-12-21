<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>User Panel</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
  </script>
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet"
    href="{{ asset('adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/summernote/summernote-bs4.css') }}">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/sweetalert2/6.4.3/sweetalert2.min.css" rel="stylesheet" />
  <style>
    @media only screen and (max-width: 767px) {
      #adminnavbar {
        width: 100% !important;
      }
    }
  </style>

  <style>
    .main-sidebar {
      background: linear-gradient(to bottom, #9368E9 0%, #943bea 100%);
      background-image: url('/images/sunset.jpg');
      background-size: cover;
      background-position: center center;
    }

    .main-sidebar span,
    .main-sidebar a {
      color: #faf9fd !important;
    }

    .nav-overlay {
      background: linear-gradient(to bottom, rgba(147, 104, 233, 0.7) 0%, rgba(148, 59, 234, 0.5) 100%);
      height: 100%;
    }

    .wrapper i {
      color: #ab3fbf
    }

    aside i {
      color: #faf9fd !important
    }

    button i {
      color: #faf9fd !important
    }

    .breadcrumb>.active {
      color: #ab3fbf !important
    }

    @media only screen and (max-width: 450px) {
      .breadcrumb {
        display: none
      }
    }
  </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light border-bottom" id="adminnavbar">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i style="color: #c2c7d0 !important"
              class="fas fa-bars"></i></a></li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="/" class="nav-link">Home</a>
        </li>
      </ul>
    </nav>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <div class="nav-overlay">
        <span class="brand-text font-weight-light brand-link text-center"
          style="border-bottom:none">{{ Auth::user()->name }}</span>
        <hr class="mt-0">
        <div class=" sidebar">
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <li class="nav-item has-treeview">
                <a href="/home" class="nav-link">
                  <i class="fas fa-tachometer-alt  nav-icon"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="fas fa-shopping-bag nav-icon"></i>
                  <p>
                    Formulae
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('users.formulas.create') }}" class="nav-link">
                      <i class="fas fa-arrow-right"
                        style="font-size : 12px ;margin-right : 10px ; margin-left : 20px; "></i>
                      <p>New Formula</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('users.formulas.list') }}" class="nav-link">
                      <i class="fas fa-arrow-right"
                        style="font-size : 12px ;margin-right : 10px ; margin-left : 20px; "></i>
                      <p>Formula List</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item has-treeview">
                <a href="{{ route('users.items.item') }}" class="nav-link">
                  <i class="fas fa-cart-arrow-down nav-icon"></i>
                  <p>
                    Ingredients
                    {{-- <i class="right fas fa-angle-left"></i> --}}
                  </p>
                </a>
              </li>
              <li class="nav-item has-treeview">
                <a href="{{ route('users.profile.profile') }}" class="nav-link">
                  <i class="fas fa-user nav-icon"></i>
                  <p>
                    Profile
                    {{-- <i class="right fas fa-angle-left"></i> --}}
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('user.logout') }}" class="nav-link">
                  <i class="fas fa-sign-out-alt" style="font-size : 20px ; padding-right : 10px"></i>
                  <p>
                    Logout
                  </p>
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </aside>

    <div class="content-wrapper">
      @yield ('content')
    </div>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <script src="{{ asset('js/app.js') }}"></script>
  <script src="{{ asset('adminlte/dist/js/adminlte.js') }}"></script>
  @include('sweetalert::alert')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
</body>

</html>