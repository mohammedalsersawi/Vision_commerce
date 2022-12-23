<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', env('APP_NAME'))</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('adminassets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('adminassets/dist/css/adminlte.min.css') }}">
  <style>
      .table th,
      .table td {
          vertical-align: middle
      }

  </style>
  @if (app()->currentLocale() == 'ar')
  <style>
      body {
          direction: rtl;
          text-align: right
      }
      @media (min-width: 768px) {
        body:not(.sidebar-mini-md):not(.sidebar-mini-xs):not(.layout-top-nav) .content-wrapper, body:not(.sidebar-mini-md):not(.sidebar-mini-xs):not(.layout-top-nav) .main-footer, body:not(.sidebar-mini-md):not(.sidebar-mini-xs):not(.layout-top-nav) .main-header {
            margin-right: 250px;
            margin-left: 0;
        }
      }

      ul {
          padding: 0
      }

      .nav-sidebar .nav-link>.right, .nav-sidebar .nav-link>p>.right {
        right: unset;
        left: 1rem;
      }
  </style>
  @endif

  @yield('styles')

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge notification-number"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right notification-wrapper">

        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-user"></i>
        </a>
      </li>

        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
            @if ($localeCode != app()->currentLocale())
            <li class="nav-item">
                <a class="nav-link" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                    {{ $properties['native'] }}
                </a>
            </li>
            @endif
        @endforeach

    </ul>
  </nav>
  <!-- /.navbar -->

  @include('admin.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        @yield('content')
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('adminassets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>
      <a href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit()" class="btn btn-danger btn-block">Logout</a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST">
        @csrf
        {{-- <button class="btn btn-danger btn-block">Logout</button> --}}
    </form>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
        Made with <i class="fas fa-heart"></i> with more than 100+ <i class="fas fa-coffee"></i> of coffe By Mohammed Naji
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-{{ date('Y') }} <a href="">vision Commerce</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('adminassets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('adminassets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('adminassets/dist/js/adminlte.min.js') }}"></script>

@yield('scripts')

<script>
    $(".alert").fadeTo(2000, 500).slideUp(500, function() {
        $(".alert").slideUp(500);
    });
    const userId = '{{ Auth::id(); }}';
</script>

<script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
