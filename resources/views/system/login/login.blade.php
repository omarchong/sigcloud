<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

       <title>Login</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    {{-- Estilos --}}
    {{-- <link href="{{ asset('css/app.css')}}" rel="stylesheet"> --}}
    {{-- Tipo de letras --}}
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    
    {{-- Estilos --}}
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

<body>
    <div class="container-fluid">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4">
            <div class="col-md-7" id="fondo1">
                <div class="text-center my-4">
                    <img src="img/lego.png" width="50%" alt="">
                </div>
                <div class="text-center">
                    <h2 class="titulo text-white" >Tu sistema de </h2>
                    <h2 class="titulo text-white" >administración flexible</h2>
                </div>
                <div class="text-center">
                    <p class="text-white" id="letra1">Controla tu negocio desde la palma <br>de tu mano, gestionando ventas,<br>
                        finanzas, contabilidad y más...</p><br>
                </div>
            </div>
            <div class="col-md-5" id="fondo2">
                <div class="text-center mt-5">
                    <img src="img/logosigcloud.svg" width="50%" alt="">
                </div>
                <div class="mt-5">
                    <h6 class="text-center" id="bienvenido">¡Bienvenido!</h6>
                </div>
                <div class="container mt-4">
                    <form action="{{route('validar')}}" method="POST">
                        {{csrf_field()}}
                        <div class="form-group mx-sm-3 mb-3">
                            <input type="text" class="form-control" @error('usuario') is-invalid @enderror name="usuario" id="usuario" value="{{ old('usuario')}}" placeholder="Usuario">
                            @error('usuario')
                            <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>
                        <div class="form-group mx-sm-3 mb-4">
                            <input type="password" class="form-control" name="password" @error('password') is-invalid @enderror id="password" value="{{ old('password')}}" placeholder="Contraseña">
                            @error('password')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group mx-sm-3 mb-5 text-center">
                            <button type="submit" class="btn btn-primary" id="btnlogin" value="Iniciar">Iniciar sesión</button>
                        </div>
                    </form>
                    <div class="mt-5">
                        <h6 class="text-center" id="bienvenido"><a href="{{route('recuperarcontrasena')}}">¿Olvidaste tu contraseña?</a></h6>
                    </div>
                    @if(Session::has('mensaje'))
                    <div class="alert alert-primary">{{Session::get('mensaje')}}</div>
                    @endif

                </div>
            </div>
        </div>
    </div>

</body>
<script src=" {{asset('js/app.js') }}" defer></script>
</html>
