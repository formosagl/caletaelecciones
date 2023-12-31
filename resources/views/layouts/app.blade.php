<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  @if (env('IS_DEMO'))
  <x-demo-metas></x-demo-metas>
  @endif

  <link rel="apple-touch-icon" sizes="76x76" href="{!! asset('assets/img/apple-icon.png') !!}">
  <link rel="icon" type="image/png" href="{!! asset('assets/img/favicon.png') !!}">
  <title>Santa Cruz Elije 2023</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <link href="{!! asset('assets/css/nucleo-icons.css') !!}" rel="stylesheet" />
  <link href="{!! asset('assets/css/nucleo-svg.css') !!}" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="{!! asset('assets/css/nucleo-svg.css') !!}" rel="stylesheet" />
  <link id="pagestyle" href="{!! asset('assets/css/soft-ui-dashboard.css?v=1.0.3') !!}" rel="stylesheet" />
</head>

<body class="g-sidenav-show bg-gray-400 {{ (\Request::is('rtl') ? 'rtl' : (Request::is('virtual-reality') ? 'virtual-reality' : '')) }} ">
  @auth
    @yield('auth')
  @endauth
  @guest
    @yield('guest')
  @endguest
<!--
  @ if(session()->has('success'))
    <div x-data="{ show: true}" x-init="setTimeout(() => show = false, 4000)" x-show="show" class="alert-success position-fixed bg-success rounded right-3 text-sm py-2 px-4">
      <p class="m-0">{{ session('success')}}</p>
    </div>
  @ endif
-->
  <!--   Core JS Files   -->
  <script src="{!! asset('assets/js/core/popper.min.js') !!}"></script>
  <script src="{!! asset('assets/js/core/bootstrap.min.js') !!}"></script>
  <script src="{!! asset('assets/js/core/jquery-3.7.0.min.js') !!}"></script>
  <script src="{!! asset('assets/js/plugins/perfect-scrollbar.min.js') !!}"></script>
  <script src="{!! asset('assets/js/plugins/smooth-scrollbar.min.js') !!}"></script>
  <script src="{!! asset('assets/js/plugins/fullcalendar.min.js') !!}"></script>
  <script src="{!! asset('assets/js/plugins/chartjs.min.js') !!}"></script>
  @stack('js')
  @stack('rtl')
  @stack('dashboard')
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }

    $(document).ready(function() {
      if ($(".alert-success").length > 0) {
        setTimeout(function() {
          $(".alert-success").fadeOut("slow", function() {
            $(this).remove();
          });
        }, 4000)
      }
    });
  </script>
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <script src="{!! asset('assets/js/soft-ui-dashboard.min.js?v=1.0.3') !!}"></script>
</body>

</html>
