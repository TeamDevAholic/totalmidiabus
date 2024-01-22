<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <meta name="description" content="Dashmix - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="Dashmix - Bootstrap 5 Admin Template &amp; UI Framework">
    <meta property="og:site_name" content="Dashmix">
    <meta property="og:description" content="Dashmix - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="{{asset('media/favicons/favicon.png')}}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{asset('media/favicons/favicon-192x192.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('media/favicons/apple-touch-icon-180x180.png')}}">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- Fonts and Dashmix framework -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" id="css-main" href="{{asset('css/dashmix.min.css')}}">
    <link rel="stylesheet" id="css-theme" href="{{asset('css/themes/xdream.min.css')}}">
    <!-- Adicione os estilos do Bootstrap -->

<!-- Adicione a biblioteca jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Adicione a biblioteca Dropzone.js -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"></script>

    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/xwork.min.css"> -->
    <!-- END Stylesheets -->
    <link rel="stylesheet" href="{{asset('js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}">
    <link rel="stylesheet" href="{{asset('js/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('js/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('js/plugins/ion-rangeslider/css/ion.rangeSlider.css')}}">
    <link rel="stylesheet" href="{{asset('js/plugins/dropzone/min/dropzone.min.css')}}">
    <link rel="stylesheet" href="{{asset('js/plugins/flatpickr/flatpickr.min.css')}}">

</head>
  <body>
    <!-- Page Container -->

    {{-- @include('sweetalert::alert') --}}

<div id="page-container" class="sidebar-o side-scroll page-header-fixed page-header-dark">


   @include('layouts.nav')

   @include('layouts.header')
  <!-- Main Container -->

   @yield('content')

   @include('layouts.footer')
    </div>

   <!-- Footer -->
    <!-- END Page Container -->

    <!--
      Dashmix JS

      Core libraries and functionality
      webpack is putting everything together at assets/_js/main/app.js
    -->
    <script src="{{asset('js/dashmix.app.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- jQuery (required for jQuery Validation plugin) -->
    <script src="{{asset('js/lib/jquery.min.js')}}"></script>

    <!-- Page JS Plugins -->
    <script src="{{asset('js/plugins/jquery-validation/jquery.validate.min.js')}} "></script>

    <!-- Page JS Code -->
    <script src="{{asset('js/pages/op_auth_signin.min.js')}}"></script>
    <script src="{{asset('js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('js/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
    <script src="{{asset('js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>
    <script src="{{asset('js/plugins/select2/js/select2.full.min.js')}}"></script>
    <script src="{{asset('js/plugins/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>
    <script src="{{asset('js/plugins/jquery.maskedinput/jquery.maskedinput.min.js')}}"></script>
    <script src="{{asset('js/plugins/dropzone/min/dropzone.min.js')}}"></script>
    <script src="{{asset('js/plugins/pwstrength-bootstrap/pwstrength-bootstrap.min.js')}}"></script>
    <script src="{{asset('js/plugins/flatpickr/flatpickr.min.js')}}"></script>

    <script>
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
      </script>



  </body>
</html>
