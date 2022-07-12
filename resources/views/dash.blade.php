
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
<TItle>Sigcloud</TItle>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
  

</head>

<body>
    <nav class="sidebar close toggle">
        <div class="menu-bar">
            <ul class="menu-links">
                <li class="nav-link">
                    <a href="{{ route('home') }}">
                        <img class="mr-2" src="/img/menu.svg" alt="" width="30px">
                    </a>
                </li>
    
                <li class="nav-link">
                    <a href="{{ route('home') }}">
                        <img class="mr-2" src="/img/dashboard.svg" alt="" width="30px">
                        <span class="text nav-text"> Dashboard</span>
                    </a>
                </li>
    
                <li class="nav-link">
                    <a href="{{ route('contactos.index') }}">
                        <img class="mr-2" src="/img/usuario.svg" alt="" width="30px">
                        <span class="text nav-text"> Contactos</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="{{ route('usuarios.index') }}">
                        <img class="mr-2" src="/img/usuario.svg" alt="" width="30px">
                        <span class="text nav-text"> Usuarios</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="{{ route('clientes.index') }}">
                        <img class="mr-2" src="/img/usuario.svg" alt="" width="30px">
                        <span class="text nav-text"> Clientes</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="{{ route('departamentos.index') }}">
                        <img class="mr-2" src="/img/usuario.svg" alt="" width="30px">
                        <span class="text nav-text"> Departamentos</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="{{ route('cotizaciones.index') }}">
                        <img class="mr-2" src="/img/documento.svg" alt="" width="30px">
                        <span class="text nav-text"> Cotizaciones</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="{{ route('servicios.index') }}">
                        <img class="mr-2" src="/img/usuario.svg" alt="" width="30px">
                        <span class="text nav-text"> Servicios</span>
                    </a>
                </li>
    
                <li class="nav-link">
                    <a href="{{ route('actividades.index') }}">
                        <img class="mr-2" src="/img/usuario.svg" alt="" width="30px">
                        <span class="text nav-text"> Actividad</span>
                    </a>
                </li>
    
                <li class="nav-link">
                    <a href="{{ route('tareas.index') }}">
                        <img class="mr-2" src="/img/documento.svg" alt="" width="30px">
                        <span class="text nav-text"> Tarea</span>
                    </a>
                </li>
    
                <li class="nav-link">
                    <a href="{{ route('citas.index') }}">
                        <img class="mr-2" src="/img/documento.svg" alt="" width="30px">
                        <span class="text nav-text"> Citas</span>
                    </a>
                </li>
    
                <li class="nav-link">
                    <a href="{{ route('ordenpagos.index') }}">
                        <img class="mr-2" src="/img/documento.svg" alt="" width="30px">
                        <span class="text nav-text"> Orden Pagos</span>
                    </a>
                </li>
    
                <li class="nav-link">
                    <a href="{{ route('seguimientofacturas.index') }}">
                        <img class="mr-2" src="/img/documento.svg" alt="" width="30px">
                        <span class="text nav-text"> Seg. Facturas</span>
                    </a>
                </li>
    
                <li class="nav-link">
                    <a href="#">
                        <img class="mr-2" src="/img/facturacion.svg" alt="" width="30px">
                        <span class="text nav-text">
                            <h6 class="text-right">Facturación</h6>
                        </span>
                    </a>
                </li>
    
                <li class="nav-link">
                    <a href="#">
                        <img class="mr-2" src="/img/reloj.svg" alt="" width="30px">
                        <span class="text nav-text"> Agenda</span>
                    </a>
                </li>
    
                <li class="nav-link subtitle">
                    <a href="#" class="action">
                        <img class="mr-2" src="/img/reloj.svg" alt="" width="30px">
                        <span class="text nav-text"> Estatus</span>
                    </a>
                    <ul class="submenu opacity">
                        <li><a href="{{ route('estatucitas.index') }}">
                                <span class="text">Estatu citas</span>
                            </a></li>
                        <li><a href="{{ route('estatucotizacions.index') }}">
                                <span class="text">Estatu cotizacion</span>
                            </a></li>
                        <li><a href="{{ route('estatufacturas.index') }}">
                                <span class="text">Estatu facturas</span>
                            </a></li>
                        <li><a href="{{ route('estatuordens.index') }}">
                                <span class="text">Estatu orden</span>
                            </a></li>
                        <li><a href="{{ route('estatuproyectos.index') }}">
                                <span class="text">Estatu proyectos</span>
                            </a></li>
                        <li><a href="{{ route('estatutareas.index') }}">
                                <span class="text">Estatu tareas</span>
                            </a></li>
                        <li><a href="{{ route('tipoproyectos.index') }}">
                                <span class="text">Tipo proyecto </span>
                            </a></li>
                    </ul>
                </li>
                
                <li class="nav-link">
                    <a href="{{route('cerrarsesion')}}">
                        <img class="mr-2" src="/img/logout.svg" alt="" width="30px">
                        <span class="text nav-text">Cerrar sesión</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="encabezado w-100">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <img class="mr-2" src="/img/logosigcloud.svg" alt="" width="200px">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto my-3">
                        <li class="nav-item">
                            <img class="mr-2 my-2 preguntas" src="/img/preguntas.svg" alt="" width="40px">
                        </li>
    
                        <div class="notificacion nav-link dropdown submenu">
                            <img src="/img/notificacion.svg" alt="" class="">
                            
                            <div class="dropdown-menu children notificacion-link">
    
    
                                <span class="dropdown-item bg-danger" href="#" style="color: white;">Notificaciones no
                                    leidas</span>
    
                               
                                    <li class=""><i class="fas fa-envelope mr-2 mx-2"></i>
                                       
                                        <span class="ml-3 float-right text-muted text-sm">
                                            </span>
                                        <span href="#" type="button"
                                            class="mark-as-read dropdown-item float-right text-right"
                                            data-id="" style="color: blue"> Marcar como
                                            leida</span>
                                    </li>
                                <div class="dropdown-divider"></div>
                                
    
                            </div>
                        </div>
                        <li class="nav-item">
                            <img class="mr-2 my-2" src="/img/apps.svg" alt="" width="40px">
                        </li>
                        <li class="nav-item">
                            <img class="mr-2 my-2 rounded-circle mx-auto"
                                src="/img/omar.png" alt=""
                                width="40px">
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled"> <b>Bienvenido Omar</b></a>
                            <a class="mx-2">Ver perfil</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <section class="navbar">
        <div class="container">
            <div class="row">
                <div class="col lg-3 ">
                    <div class="card-header" id="servicios">
                        <div class="row">
                            <div class="col-md-3">
                                <span class="azul">6</span>
                            </div>
                            <div class="col-md-9">
                                <h5><b>Servicios en cotizacion</b></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col lg-3">
                    <div class="card-header" id="curso">
                        <div class="row">
                            <div class="col-md-3">
                                <span class="morado">10</span>
                            </div>
                            <div class="col-md-9">
                                <h5><b>Servicios en curso</b></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col lg-3">
                    <div class="card-header" id="validacion">
                        <div class="row">
                            <div class="col-md-3">
                                <span class="naranja">16</span>
                            </div>
                            <div class="col-md-9">
                                <h5><b>Servicios en validacion</b></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col lg-3">
                    <div class="card-header" id="concluidos">
                        <div class="row">
                            <div class="col-md-3">
                                <span class="verde">81</span>
                            </div>
                            <div class="col-md-9">
                                <h5><b>Servicios concluidos</b></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 my-3">
                    <div class="card" id="ventasa">
                        <div class="card-body">
                            <h6><b>Ventas anuales</b></h6>
                            <canvas id="myChart" height="130px"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 my-3">
                    <div class="card-header" id="ingresos">
                        <div class="row">
                            <div class="col">
                                <img class="mr-2" src="img/flechaarriba.svg" alt="" width="37px">
                                <h5><b>$20, 000</b></h5>
                                <p>Ingresos febrero </p>
                            </div>
                        </div>
                    </div>
                    <div class="card my-3" id="febrero">
                        <div class="card-header" id="febrero">
                            <div class="row">
                                <div class="col">
                                    <img class="mr-2" src="img/flechabajo.svg" alt="" width="37px">
                                    <h5><b>-$10, 000</b></h5>
                                    <p>Febrero 2021</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 my-3">
                    <div class="card-header" id="miembros">
                        <div class="row">
                            <div class="col">
                                <h5><b>Miembros</b></h5>
                                <div class="row">
                                    <div class="col-md-3">
                                        <img class="mr-2" src="img/omar.png" alt="" width="40px">
                                    </div>
                                    <div class="col-md-9">
                                        <h6><b>Omar Chong</b></h6>
                                        <p>Desarrollador</p>
                                    </div>
                                    <div class="col-md-3">
                                        <img class="mr-2" src="img/hector.png" alt="" width="40px">
                                    </div>
                                    <div class="col-md-9">
                                        <h6><b>Hector Bastida</b></h6>
                                        <p>Desarrollador</p>
                                    </div>
                                    <div class="col-md-3">
                                        <img class="mr-2" src="img/monse.png" alt="" width="40px">
                                    </div>
                                    <div class="col-md-9">
                                        <h6><b>Monse Quiroz</b></h6>
                                        <p>Desarrollador</p>
                                    </div>
                                    <div class="mx-sm-3 text-center">
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> <b> Agregar
                                                miembro</b></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="card" id="ventasm">
                        <div class="card-body">
                            <h6><b>Ventas mensuales</b></h6>
                            <canvas id="grafica" height="115px"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="card-header" id="canales">
                        <div class="row">
                            <div class="col">
                                <h6><b>Canales de atención al cliente</b></h6>
                                <div class="container mt-3">
                                    <div class="row px-5">
                                        <div class="ms-3 ">
                                            <img src="img/fb.svg" class="mr-2" width="40px" height="40px" alt="...">
                                        </div>
                                        <div class="ms-3">
                                            <h6 class="mt-0 mb-1"><b>Facebook</b></h6>
                                            <p>2 mensajes</p>
                                        </div>
                                        <div class="col-sm-2 px-2">
                                            <img src="img/mail.svg" class="mr-3" width="40px" height="40px" alt="...">
                                        </div>
                                        <div class="ms-3">
                                            <h6 class="mt-0 mb-1"><b>Mail</b></h6>
                                            <p>2 mensajes</p>
                                        </div>
                                    </div>

                                    <div class="row px-5">
                                        <div class="ms-3">
                                            <img src="img/ig.svg" class="mr-2" width="40px" height="40px" alt="...">
                                        </div>
                                        <div class="ms-3">
                                            <h6 class="mt-0 mb-1"><b>Instagram</b></h6>
                                            <p>3 mensajes</p>
                                        </div>
                                        <div class="col-sm-2 px-2">
                                            <img src="img/tiktok.svg" class="mr-3" width="40px" height="40px" alt="...">
                                        </div>
                                        <div class="ms-3">
                                            <h6 class="mt-0 mb-1"><b>Tik tok</b></h6>
                                            <p>3 mensajes</p>
                                        </div>
                                    </div>
                                    <div class="row px-5">
                                        <div class="ms-3">
                                            <img src="img/wa.svg" class="mr-2" width="40px" height="40px" alt="...">
                                        </div>
                                        <div class="ms-3">
                                            <h6 class="mt-0 mb-1"><b>Whatsapp</b></h6>
                                            <p>2 mensajes</p>
                                        </div>
                                        <div class="col-sm-2 px-2">
                                            <img src="img/llamadas.svg" class="mr-3" width="40px" height="40px" alt="...">
                                        </div>
                                        <div class="ms-3">
                                            <h6 class="mt-0 mb-1"><b>Llamadas</b></h6>
                                            <p>2 mensajes</p>
                                        </div>
                                    </div>
                                    <div class="row px-5">
                                        <div class="ms-3">
                                            <img src="img/in.svg" class="mr-2" width="40px" height="40px" alt="...">
                                        </div>
                                        <div class="ms-3">
                                            <h6 class="mt-0 mb-1"><b>Linkedin</b></h6>
                                            <p>0 mensajes</p>
                                        </div>
                                        <div class="col-sm-2 px-2">
                                            <img src="img/twitter.svg" class="mr-3" width="40px" height="40px" alt="...">
                                        </div>
                                        <div class="ms-3">
                                            <h6 class="mt-0 mb-1"><b>Twitter</b></h6>
                                            <p>0 mensajes</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </section>
    

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>



    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js" integrity="sha256-ErZ09KkZnzjpqcane4SCyyHsKAXMvID9/xwbl/Aq1pc=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/graficas.js') }}"></script>
    <script src=" {{ asset('js/sidebar.js') }}"></script>
    <script>
        $(".subtitle .action").click(function (event) {
            var subtitle = $(this).parents(".subtitle");
            var submenu = $(subtitle).find(".submenu");
    
            $(".submenu").not($(submenu)).slideUp("slow").addClass("opacity");
            $(".open").not($(subtitle)).removeClass("open");
    
            $(subtitle).toggleClass("open");
            $(submenu).slideToggle("slow").toggleClass("opacity");
    
            return false;
        });
    </script>
</body>

</html>