<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />

    @yield('header')

     {{-- Search console --}}
    <meta name="google-site-verification" content="-zSieRhDUbdPX8PohZwUx871zsBo1oxpxqim-68z_I0" />
    <meta name="referrer" content="no-referrer-when-downgrade">
    <link rel="icon" href="/images/favicon.png">
    <meta property="og:type" content="website">

    {{-- PWA links --}}
    <link rel="apple-touch-icon" href="https://yvanzim.com/images/pwa-icon.png">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="#0A2749">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Outlined">

    <!-- Hotjar Tracking Code for https://yvanzim.com -->
    <script>
        (function(h,o,t,j,a,r){
            h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
            h._hjSettings={hjid:5266641,hjsv:6};
            a=o.getElementsByTagName('head')[0];
            r=o.createElement('script');r.async=1;
            r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
            a.appendChild(r);
        })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
    </script>

    <!-- Styles -->
    @vite('resources/css/app.css')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Global site tag (gtag.js) - Google Analytics --}}
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-80Z7KH82E5"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-80Z7KH82E5');
    </script>
    {{--  --}}

</head>

<body class="antialiased">

    @include('components.nav.topnav')

    @yield('content')

    @env('local')
        <script src="http://localhost:8080/js/bundle.js"></script>
    @endenv

    @stack('scripts')

</body>

</html>
