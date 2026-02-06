<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="9QAQ-4ow970gAY8NZND6nm33rsjky6XXaTtdxCRoh7U" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="google-adsense-account" content="ca-pub-9560012881621308">

    <link rel="icon" type="image/png" href="{{ asset('frontend/img/logo.png') }}">

    <title>
        @yield('title', config('app.name')) | {{ config('app.name') }}
    </title>
    {!! SEO::generate() !!}

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    @vite(['resources/css/frontend/app.css'])

    @stack('link_css')
    @stack('css')

    {{-- Google Custom Search Engine --}}
    <script async src="https://cse.google.com/cse.js?cx=b0e404f753520449c"></script>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9560012881621308" crossorigin="anonymous"></script>


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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.11/jquery.lazy.min.js" integrity="sha512-eviLb3jW7+OaVLz5N3B5F0hpluwkLb8wTXHOTy0CyNaZM5IlShxX1nEbODak/C0k9UdsrWjqIBKOFY0ELCCArw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @vite(['resources/js/frontend/app.js'])

    <script>
        $(document).ready(function() {
            $('img.lazy').Lazy({
                scrollDirection: 'vertical',
                effect: 'fadeIn',
                visibleOnly: true,
                onError: function(element) {
                    console.log('error loading ' + element.data('src'));
                },
                afterLoad: function(element) {
                    console.log('loaded ' + element.data('src'));
                }
            });
        });
    </script>


    @stack('link_script')
    @stack('script')

    @include('frontend.includes.search-modal')
</body>

</html>
