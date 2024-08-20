<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

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
        
        th, td{ padding: 10px; }
    </style>

    <!-- Scripts -->
    @vite('resources/css/app.css')
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body>

    

    <div>
        @include('admin.admin-bars')

        <div class="flex justify-center w-full h-full lg:pl-64">
            <main>
                @yield('contentAdmin')
            </main>
            
        </div> 
       
    </div>
</body>
</html>