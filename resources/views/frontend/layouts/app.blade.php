<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title', config('app.name')) | {{ config('app.name') }}
    </title>
    {!! seo() !!}

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

        <link rel="stylesheet" href="{{ asset('frontend/css/reset.css') }}" type="text/css" media="all" />
        <link rel="stylesheet" href="{{ asset('frontend/css/wordpress.css') }}" type="text/css" media="all" />
        <link rel="stylesheet" href="{{ asset('frontend/css/animation.css') }}" type="text/css" media="all" />
        <link rel="stylesheet" href="{{ asset('frontend/css/ilightbox/ilightbox.css') }}" type="text/css" media="all" />
        <link rel="stylesheet" href="{{ asset('frontend/css/jqueryui/custom.css') }}" type="text/css" media="all" />
        <link rel="stylesheet" href="{{ asset('frontend/js/plugins/flexslider/flexslider.css') }}" type="text/css" media="all" />
        <link rel="stylesheet" href="{{ asset('frontend/css/tooltipster.css') }}" type="text/css" media="all" />
        <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}" type="text/css" media="all" />
        <link rel="stylesheet" href="{{ asset('frontend/css/left-fullwidth.css') }}" type="text/css" media="all" />
        <link rel="stylesheet" href="{{ asset('frontend/css/left-fullwidth-grid.css') }}" type="text/css" media="all" />
        <link rel="stylesheet" href="{{ asset('frontend/css/grid.css') }}" type="text/css" media="all" />

    @stack('link_css')
    @stack('css')
</head>

<body class="home page-template-default page page-id-3595 left_fullwidth">
    @include('frontend.includes.mobile-menu')
    <div id="wrapper">
        @include('frontend.includes.header')

        @yield('content')

        @include('frontend.includes.footer')
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


    <script type="text/javascript" src="{{ asset('frontend/js/plugins/ilightbox.packed.js') }}" id="ilightbox-js"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/plugins/jquery.easing.js') }}" id="easing-js"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/plugins/jquery.sticky-kit.min.js') }}" id="sticky-kit-js"></script>
    {{-- <script type="text/javascript" src="{{ asset('frontend/js/plugins/jquery.lazy.min.js') }}" id="lazy-js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.11/jquery.lazy.min.js" integrity="sha512-eviLb3jW7+OaVLz5N3B5F0hpluwkLb8wTXHOTy0CyNaZM5IlShxX1nEbODak/C0k9UdsrWjqIBKOFY0ELCCArw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/plugins/jquery.cookie.js') }}" id="cookie-js"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/plugins/jquery.tooltipster.min.js') }}" id="tooltipster-js"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/plugins/custom_plugins.js') }}" id="grandnews-custom-plugins-js"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/plugins/custom.js') }}" id="grandnews-custom-script-js"></script>


    @stack('link_script')
    @stack('script')
</body>

</html>
