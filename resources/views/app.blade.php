<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="creator" content="Angelo Schuler Piletti">


        {{-- <title>{{ config('app.name', 'Sanguanel') }}</title> --}}
        {{-- FAVICON --}}
        <link rel="shortcut icon" href="/images/favicon/favicon.svg" type="image/x-icon">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Merriweather:wght@200;400;700;900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400&display=wrap"> --}}


        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <!-- Scripts -->
        @routes
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        @inertia
    </body>
</html>
