<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

<body>
    <div class="container col-md-12">
        <div class="row">
            <div class="col-md-7" id="fondo1">
                <div class="text-center my-3">
                    <img src="img/lego.png" width="50%" alt="">
                </div>
                <div class="text-center">
                    <h2 class="text-white">Tu sistema de </h2><h2 class="text-white">administración flexible</h2>
                    <p class="text-white">Controla tu negocio desde la palma <br>de tu mano , gestionando ventas,<br>
                    finanzas, contabilidad y más...</p>
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
                    <form action="">
                        <div class="form-group mx-sm-3 mb-3">
                            <input type="text" class="form-control" id="inputPassword2" placeholder="Usuario">
                        </div>
                        <div class="form-group mx-sm-3 mb-4">
                            <input type="password" class="form-control" id="inputPassword2" placeholder="Contraseña">
                        </div>
                        <div class="form-group mx-sm-3 mb-5 text-center">
                            <button type="submit" class="btn btn-primary" id="btnlogin">Iniciar sesión</button>
                        </div>
                    </form>
                    <div class="mt-5">
                        <h6 class="text-center" id="bienvenido"><a href="#">¿Olvidaste tu contraseña?</a></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
