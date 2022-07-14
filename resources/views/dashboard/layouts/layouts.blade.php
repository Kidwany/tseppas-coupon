<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
    <link rel="icon" href="favicon.ico" type="image/x-icon"> <!-- Favicon-->

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> {{config('app.name')}} -  @yield('title')</title>
    <script src="{{assetPath('dashboard/assets/js/alpinejs.js')}}" defer></script>

    <link rel="stylesheet" href="{{assetPath('dashboard/assets/plugins/bootstrap/css/bootstrap.min.css')}}">
    <!-- Colorpicker Css -->
    <link rel="stylesheet" href="{{assetPath('dashboard/assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css')}}" />
    <link rel="stylesheet" href="{{assetPath('dashboard/assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}"/>

    <link rel="stylesheet" href="{{assetPath('dashboard/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css')}}"/>
    <link rel="stylesheet" href="{{assetPath('dashboard/assets/plugins/charts-c3/plugin.css')}}"/>
    <link rel="stylesheet" href="{{assetPath('dashboard/assets/plugins/fullcalendar/fullcalendar.min.css')}}">
    <link rel="stylesheet" href="{{assetPath('dashboard/assets/plugins/morrisjs/morris.min.css')}}" />
    <link rel="stylesheet" href="{{assetPath('dashboard/assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{assetPath('dashboard/assets/plugins/select2/select2.css')}}">
    <link rel="stylesheet" href="{{assetPath('dashboard/assets/plugins/sweetalert/sweetalert.css')}}"/>
    <!-- Custom Css -->
    <link rel="stylesheet" href="{{assetPath('dashboard/assets/plugins/bootstrap-select/css/bootstrap-select.css')}}"/>
    <link rel="stylesheet" href="{{assetPath('dashboard/assets/css/loading.css')}}">
    <link rel="stylesheet" href="{{assetPath('dashboard/assets/css/style.min.css')}}">
    <!-- Bootstrap Min CSS -->
    <!-- Fonts and icons -->
    @yield('customizedStyle')

</head>

<body class="theme-orange">

@include('dashboard.layouts.loading')
<div id="app">
    <main>
        <!-- Page Loader -->
        <div class="page-loader-wrapper">
            <div class="loader">
                <div class="m-t-30"><img class="zmdi-hc-spin" src="{{asset('dashboard/assets/images/loader.svg')}}" width="48" height="48" alt="Aero"></div>
                <p>Loading ...</p>
            </div>
        </div>

        <!-- Overlay For Sidebars -->
        <div class="overlay"></div>

        @include('dashboard.layouts.quickMenu')
        @include('dashboard.layouts.sidemenu')
        <section class="content">
            @yield('content')
        </section>
    </main>
</div>

{{--<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>--}}
<!-- JS
============================================ -->
<!-- Jquery Core Js -->
<script src="{{asset('dashboard/assets/bundles/libscripts.bundle.js')}}"></script>
<!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) -->
<script src="{{asset('dashboard/assets/bundles/vendorscripts.bundle.js')}}"></script>
<script src="{{assetPath('dashboard/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js')}}"></script> <!-- Bootstrap Colorpicker Js -->
<!-- slimscroll, waves Scripts Plugin Js -->
<script src="{{asset('dashboard/assets/bundles/jvectormap.bundle.js')}}"></script>
<!-- JVectorMap Plugin Js -->
<script src="{{asset('dashboard/assets/bundles/sparkline.bundle.js')}}"></script>
<!-- Sparkline Plugin Js -->
<script src="{{asset('dashboard/assets/bundles/c3.bundle.js')}}"></script>

<script src="{{assetPath('dashboard/assets/bundles/datatablescripts.bundle.js')}}"></script>
<script src="{{assetPath('dashboard/assets/plugins/jquery-datatable/buttons/dataTables.buttons.min.js')}}"></script>
<script src="{{assetPath('dashboard/assets/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js')}}"></script>
<script src="{{assetPath('dashboard/assets/plugins/jquery-datatable/buttons/buttons.colVis.min.js')}}"></script>
<script src="{{assetPath('dashboard/assets/plugins/jquery-datatable/buttons/buttons.flash.min.js')}}"></script>
<script src="{{assetPath('dashboard/assets/plugins/jquery-datatable/buttons/buttons.html5.min.js')}}"></script>
<script src="{{assetPath('dashboard/assets/plugins/jquery-datatable/buttons/buttons.print.min.js')}}"></script>

<script src="{{assetPath('dashboard/assets/plugins/select2/select2.min.js')}}"></script>
<script src="{{assetPath('dashboard/assets/plugins/momentjs/moment.js')}}"></script> <!-- Moment Plugin Js -->
<script src="{{assetPath('dashboard/assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}"></script>
<script src="{{assetPath('dashboard/assets/bundles/mainscripts.bundle.js')}}"></script>
<script src="{{assetPath('dashboard/assets/js/pages/tables/jquery-datatable.js')}}"></script>
<script src="{{assetPath('dashboard/assets/plugins/ckeditor/ckeditor.js')}}"></script>
<script src="{{assetPath('dashboard/assets/bundles/fullcalendarscripts.bundle.js')}}"></script>
<!--/ calender javascripts -->
{{--<script src="{{assetPath('dashboard/assets/js/pages/calendar/calendar.js')}}"></script>--}}
<script src="{{assetPath('dashboard/assets/plugins/sweetalert/sweetalert.min.js')}}"></script>
<script src="{{assetPath("dashboard/assets/plugins/light-gallery/js/lightgallery-all.min.js")}}"></script>
<script src="{{assetPath('dashboard/assets/plugins/bootstrap-notify/bootstrap-notify.js')}}"></script>
<script src="{{assetPath('dashboard/assets/js/pages/ui/notifications.js')}}"></script> <!-- Custom Js -->
<script src="{{assetPath('dashboard/assets/js/pages/index.js')}}"></script>
<script src="{{assetPath('dashboard/assets/js/pages/forms/basic-form-elements.js')}}"></script>
<script src="{{assetPath('dashboard/assets/js/pages/forms/advanced-form-elements.js')}}"></script>

@yield('customizedScript')
{{--<script src="{{assetPath('vendor/livewire/livewire.js')}}"></script>--}}
</body>
</html>
