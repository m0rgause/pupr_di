<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{ $title }}</title>
  <link rel="shortcut icon" href="{{asset('assets/compiled/svg/favicon.svg')}}" type="image/x-icon">

  <link rel="stylesheet" href="{{ asset('/assets/compiled/css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('/assets/compiled/css/app-dark.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/compiled/css/iconly.css') }}">
  <link rel="stylesheet" href="{{asset('style.css')}}">
  @yield('css')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
  <link rel="stylesheet" href="{{ asset('assets/extensions/sweetalert2/sweetalert2.min.css') }}">
  <link rel="stylesheet" href="//cdn.datatables.net/2.0.2/css/dataTables.dataTables.min.css">

</head>

<body>
  <script src="{{ asset('/assets/static/js/initTheme.js') }}"></script>
  <div id="app">
    <!-- Navbar -->
    @include('layouts.sidebar')
    <!-- End Navbar -->
    <!-- Main -->
    <div id="main">
      <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none float-start">
          <i class="bi bi-justify fs-3"></i>
        </a>
        <div class="dropdown float-end">
          <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
            <i class="bi bi-bell-fill fs-5"></i>
          </a>

        </div>
      </header>
      <!-- Content -->
      @yield('content')
      <!-- End Content -->

      <!-- Start Footer -->
      @include('layouts.footer')
      <!-- End Footer -->
    </div>
    <!-- End Content -->
  </div>
  <script src="{{ asset('/assets/static/js/components/dark.js') }}"></script>
  <script src="{{asset('assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
  <script src="{{ asset('/assets/compiled/js/app.js') }}"></script>
  <script src="//cdn.datatables.net/2.0.2/js/dataTables.min.js"></script>
  <script src="{{ asset('/assets/extensions/sweetalert2/sweetalert2.all.min.js') }}"></script>


  @yield('js')

</body>

</html>