<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('css')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <title>Dashboard</title>

</head>

<body>
    @include('components.sidebar')

    <section class="home">
        @include('components.navbar')
        <div class="contenido">
            @yield('contenido')
        </div>

    </section>


<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src=" {{asset('js/sidebar.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js" integrity="sha256-ErZ09KkZnzjpqcane4SCyyHsKAXMvID9/xwbl/Aq1pc=" crossorigin="anonymous"></script>
    <script src="{{asset('js/graficas.js') }}"></script>

</body>

</html>
