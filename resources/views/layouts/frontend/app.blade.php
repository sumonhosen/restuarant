<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from rewebsotech.com/templates/Domnoo/web/home.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 07 Aug 2021 08:11:36 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Domnoo Restaurant & Pizza HTML Template</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="images/fav2.ico" type="image/x-icon">
    <link rel="icon" href="images/fav2.ico" type="image/x-icon">
    <!-- include the site stylesheet -->
    <link rel="stylesheet" href="{{ asset('public/frontend') }}/assets/css/bootstrap.min.css">
    <!-- main stylesheet -->
    <link rel="stylesheet" href="{{ asset('public/frontend') }}/assets/css/style.css">
    <!-- color stylesheet -->
    <link rel="stylesheet" href="{{ asset('public/frontend') }}/assets/css/colors.css" id="ui-theme-color">
    <!-- responsive css -->
    <link rel="stylesheet" href="{{ asset('public/frontend') }}/assets/css/responsive.css">

    <link rel="shortcut icon" href="{{ file_exists($logo->favicon) ? url($logo->favicon) : '' }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('public/frontend') }}/assets/frontend/css/icons.min.css">
    <link rel="stylesheet" href="{{ asset('public/frontend') }}/assets/frontend/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('public/frontend') }}/assets/frontend/css/main.css">
    <link rel="stylesheet" href="{{ asset('public/frontend') }}/assets/frontend/css/red-color.css">
    <link rel="stylesheet" href="{{ asset('public/frontend') }}/assets/frontend/css/yellow-color.css">
    <link rel="stylesheet" href="{{ asset('public/frontend') }}/assets/frontend/css/responsive.css">
    <script src="{{ asset('public/frontend') }}/assets/sweetalert%402.1.2/dist/sweetalert.min.js"></script>
    <!-- izitoast -->
    <link href="{{ asset('public/css/iziToast.css') }}" rel="stylesheet">
      @stack('css')
</head>
<body>
<!--     <div class="loader_wrapper">
        <div class="loader">
            <img src="images/loader.gif" alt="" class="img-fluid">
        </div>
    </div> -->
    <!--// loader_wrapper -->

    <div id="wrapper">
        @include('layouts.frontend.partial.header')

        @yield('content')

        @include('layouts.frontend.partial.footer')

        <span id="go_to_top" class="go-to-top"><i class="flaticon-up-arrow"></i></span>
    </div><!-- #wrapper -->


    <!-- include jQuery -->
    <script src="{{ asset('public/frontend') }}/assets/js/jquery.min.js"></script>
    <!-- bootstrap -->
    <script src="{{ asset('public/frontend') }}/assets/js/bootstrap.min.js"></script>
    <!-- bootstrap -->
    <script src="{{ asset('public/frontend') }}/assets/js/owl.carousel.min.js"></script>
    <!-- slick slider  -->
    <script src="{{ asset('public/frontend') }}/assets/js/slick.js"></script>
    <!-- dscountdown  -->
    <script src="{{ asset('public/frontend') }}/assets/js/dscountdown.min.js"></script>
    <!-- jquery.nice-select -->
    <script src="{{ asset('public/frontend') }}/assets/js/jquery.nice-select.js"></script>
    <!-- magnific-popup -->
    <script src="{{ asset('public/frontend') }}/assets/js/jquery.magnific-popup.min.js"></script>
    <!-- Mixitup -->
    <script src="{{ asset('public/frontend') }}/assets/js/mixitup.min.js"></script>
    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBP1lPhUhDU6MINpruPDinAzXffRlpzzFo"></script>
    <script src="{{ asset('public/frontend') }}/assets/js/map.js"></script>
    <!-- custom js -->
    <script src="{{ asset('public/frontend') }}/assets/js/custom.js"></script>
    <script src="{{ asset('public/frontend') }}/assets/frontend/js/jquery.min.js"></script>
    <script src="{{ asset('public/frontend') }}/assets/frontend/js/bootstrap.min.js"></script>
    <script src="{{ asset('public/frontend') }}/assets/frontend/js/plugins.js"></script>
    <script src="{{ asset('public/frontend') }}/assets/frontend/js/main.js"></script>
    <!-- izitoast -->
    <script src="{{ asset('public/js/iziToast.js') }}"></script>
    @include('vendor.lara-izitoast.toast')

    <!-- jquery-validation -->
    <script src="{{ asset('public/backend') }}/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="{{ asset('public/backend') }}/plugins/jquery-validation/additional-methods.min.js"></script>
    @stack('js')
</body>

<!-- Mirrored from rewebsotech.com/templates/Domnoo/web/home.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 07 Aug 2021 08:11:54 GMT -->
</html>