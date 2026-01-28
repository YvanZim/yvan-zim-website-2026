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
    {{-- <meta name="apple-mobile-web-app-status-bar-style" content="black"> --}}

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

</head>

<body class="antialiased">

    <div class="absolute h-screen w-screen brand_blue">

        <div class="p-5 flex justify-center">
            <img src="https://assets.yvanzim.com/images/quicklinks/yvanzim_logo_square.png" alt="Yvan Zim" class="h-24 object-contain">
        </div>

        {{-- <x-link-block 
            title="Tangled D'Illusions | Dublin"
            link="https://www.tickettailor.com/events/theclockworkdoor/1375864?"
            image="https://assets.yvanzim.com/images/quicklinks/tangled-dillusions.jpeg"
        /> --}}

        <x-link-block 
            title="Le Délire Des Illusions | Lyon"
            link="https://www.billetreduc.com/356358/evt.htm"
            image="https://assets.yvanzim.com/images/quicklinks/tangled-dillusions.jpeg"
        />

        <x-link-block 
            title="Contact"
            link="https://yvanzim.com/contact"
            icon="link"
        />


        <div class="absolute bottom-0 w-full text-center text-white p-2 brand_blue">
            <p><a href="https://yvanzim.com"> yvanzim.com </a></p>
        </div>

    </div>

</body>

</html>