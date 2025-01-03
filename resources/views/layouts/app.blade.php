<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @vite('resources/js/darkmode.js')

    <link rel="stylesheet" href="https://unpkg.com/@fullcalendar/core@latest/main.min.css">
    <link rel="stylesheet" href="https://unpkg.com/@fullcalendar/daygrid@latest/main.min.css">

</head>
<body>
    <div id="app">
        @include('layouts.nav')

        <div class="container-fluid">
            <div class="row">
                @auth
                    <div class="col-md-2 p-0">
                        @include('layouts.menu')
                    </div>
                    <div class="col-md-10">
                        <main class="px-4 py-4 mb-5">
                            @yield('content')
                        </main>
                    </div>
                @else
                    <div class="col-md-12">
                        <main class="py-4 mb-5">
                            @yield('content')
                        </main>
                    </div>
                @endauth
            </div>
        </div>

        @include('layouts.footer')
    </div>
</body>
</html>
