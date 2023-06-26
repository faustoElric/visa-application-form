<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <div class="bg-purple">
            <div class="col-12 col-md-offset-2 pt-4 pb-4 text-center">
                <img src="{{url('storage/images/Logo-search-latam-header.png')}}" class="img-fluid">
            </div>
        </div>
        <main>
            @yield('content')
        </main>
        <footer class="bg-purple mt-4">
            <div class="col-12 pt-4 pb-4 text-center">
                <p>Todos los derechos reservados © {{ now()->year }}</p>
            </div>
        </footer>
    </div>
</body>
</html>
