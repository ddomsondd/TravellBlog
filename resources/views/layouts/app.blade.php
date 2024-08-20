<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'vivid voyages') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sacramento">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Courier+Prime">

    <style>
        body{background-color: #f7f5eb; font-family: 'Courier Prime', monospace;}
        h1, h3{font-family: 'Sacramento', sans-serif}
        h2{font-family: 'Courier Prime', monospace}
        .custom-toast-class {
        background-color: #37667e !important;
    }
    </style>

    <!-- Scripts -->
    @vite('resources/css/app.css')
</head>
<body>
    <div id="app">
        @include('layouts.shared.navbar')
        <main class="py-4">
            @yield('content')
        </main>
       
    </div>
</body>
</html>
