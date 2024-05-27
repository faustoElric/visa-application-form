<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta property="og:title" content="Programa de Movilidad Laboral Visas H-2">
    <meta property="og:description" content="Programa de Movilidad Laboral Visas H-2">
    <meta property="og:image" content="{{url('images/usaid_logo.png')}}">
    <meta name="viewport" content="width=device-width">

    <title>{{ config('app.name', 'Programa de Movilidad Laboral Visas H-2') }}</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('/images/usaid_favicon.png') }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <div class="header-second" style="margin: 0%">
            <div class="container">
                <div class="col-12">
                    Este es un sitio oficial de <a href="https://www.usaid.gov/es/el-salvador" target="_blank">USAID</a> y <a href="https://rree.gob.sv" target="_blank">Ministerio de Relaciones Exteriores de El Salvador</a>
                </div>
            </div>
        </div>
        <div class="bg-white row" style="margin: 0%">
            <div class="col-4 offset-2 col-md-3 offset-md-3 col-xl-2 offset-xl-4 pt-4 pb-4 text-center">
                <br>
                <img src="{{url('images/usaid_logo.png')}}" class="img-fluid" id="usaid" alt="USAID">
            </div>
            <div class="col-4 offset-2 col-md-3 offset-md-0 col-xl-2 pt-4 pb-4 text-center">
                <img src="{{url('images/ministerio_relaciones_exteriores_logo.png')}}" class="img-fluid" id="mre" alt="Ministerio de Relaciones Exteriores de El Salvador">
            </div>
        </div>
        <main>
            @yield('content')
        </main>
        <footer class="bg-black mt-4">
            <div class="col-12 pt-4 pb-4 text-center">
                <p>Todos los derechos reservados © {{ now()->year }}</p>
            </div>
        </footer>
    </div>
</body>
</html>
<style>
    @media all and (max-width: 768px){
        #mre{
            margin-left: -100%;
        }
        #usaid{
            margin-top: -15%;
        }
    }
    </style>
