<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="{{ env('APP_URL') }}/images/rel_icon.png">

        {{-- apple links --}}
        <link rel="apple-touch-icon" href="{{ env('APP_URL') }}/images/rel_icon.png">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="0A2749"> 
        {{-- <meta name="apple-mobile-web-app-status-bar-style" content="black"> --}}

        @if( isset($page) && isset($page['props']['pageProp']['title']) )
            @if($page['props']['pageProp']['no_index'] == 1)
                <meta name="robots" content="noindex,nofollow">
            @endif
        @endif

        {{-- Search console --}}
        <meta name="google-site-verification" content="-zSieRhDUbdPX8PohZwUx871zsBo1oxpxqim-68z_I0" />

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;700&display=swap"> 

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

        <!-- Scripts -->
        @routes
        
        @vite('resources/js/inertia.js')

        @inertiaHead
    </head>
    
    <body class="antialiased">
        @inertia
        @env('local')
            <script src="http://localhost:8080/js/bundle.js"></script>
        @endenv
    </body>

</html>
