<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title', config('app.name')) - {{ config('app.name') }}
    </title>


    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">


    @stack('link_css')

    <link rel="stylesheet" href="{{ asset('backend/vendor/css/bootstrap/bootstrap.min.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('backend/vendor/css/icon/ionicons.min.css') }}">

    <link rel="stylesheet" href="{{ asset('backend/admin/dist/css/adminlte.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('backend/vendor/css/font_awesome/all.min.css') }}" >
    <link rel="stylesheet" href="{{ asset('backend/vendor/css/font_awesome/brands.min.css') }}" >
    <link rel="stylesheet" href="{{ asset('backend/vendor/css/font_awesome/fontawesome.min.css') }}" >
    <link rel="stylesheet" href="{{ asset('backend/vendor/css/font_awesome/solid.min.css') }}" > --}}

    <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/admin/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/common.css') }}">

    @stack('link_css')
    @stack('css')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    @include('backend.partials.js')
    <div class="wrapper">

        @include('backend.include.nav_top')

        @include('backend.include.side_nav')

        <div class="content-wrapper bg-transparent">
            @yield('content')
        </div>

        @include('backend.include.footer')

    </div>
    <script src="{{ asset('backend/admin/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/admin/dist/js/adminlte.js') }}"></script>
    <script src="{{ asset('backend/js/loading.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @stack('link_script')
    <script src="{{ asset('backend/js/custom.js') }}"></script>
    @stack('script')
</body>

</html>
