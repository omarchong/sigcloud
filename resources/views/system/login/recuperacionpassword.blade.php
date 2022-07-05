<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <!-- tipo de letras -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
    <!-- estilos css -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link href="{{ asset('css/app.css')}}" rel="stylesheet">
    <script src=" {{asset('js/app.js') }}" defer></script>
</head>

<body>
    <div class="container-fluid">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4  min-vh-100">
            <div class="col-md-7" id="fondo1">
                <div class="text-center my-4">
                    <img src="img/lego.png" width="50%" alt="">
                </div>
                <div class="text-center">
                    <h2 class="titulo text-white">Tu sistema de </h2>
                    <h2 class="titulo text-white">administración flexible</h2>
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
                    <h6 class="text-center" id="bienvenido">¡Recuperación de contraseña!</h6>
                </div>
                <div class="container mt-4">
                    <form action="{{route('recuperacion')}}" method="GET">
                        {{csrf_field()}}
                        <div class="form-group mx-sm-3 mb-3">
                            <label for="">En este apartado, tendras que ingresar un correo electronico valido, con acceso, al cual se enviara tu nueva contraseña.</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{old('email')}}"    placeholder="Ingrese su correo">
                            @error('email')
                            <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>
                        <div class="form-group mx-sm-3 mb-5 text-center">
                            <button type="submit" class="btn btn-primary" id="btnlogin" value="Eviar">Enviar</button>
                        </div>
                        @if(Session::has('mensaje'))
                        <div class="alert alert-danger">{{Session::get('mensaje')}}</div>
                        @endif

                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
