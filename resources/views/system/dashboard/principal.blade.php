<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

    <title>Document</title>
</head>

<body>
    <div class="d-flex">
        <div id="sidebar-container" class="colorsidebar">
            <div class="menu">
                <a href="#" class="d-block text-light p-4"><img src="img/menu.svg" alt="" width="30px"></a>
                <a href="#" class="d-block text-light p-3"><img class="mr-2" src="img/dashboard.svg" alt=""
                        width="30px"> Dashboard</a>
                <a href="#" class="d-block text-light p-3"><img class="mr-2" src="img/usuario.svg" alt=""
                        width="30px"> Clientes</a>
                <a href="#" class="d-block text-light p-3"><img class="mr-2" src="img/documento.svg" alt=""
                        width="30px"> Cotizaciones</a>
                <a href="#" class="d-block text-light p-3"><img class="mr-2" src="img/facturacion.svg" alt=""
                        width="30px"> Facturacion</a>
                <a href="#" class="d-block text-light p-3"><img class="mr-2" src="img/reloj.svg" alt=""
                        width="30px"> Agenda</a>
                <a href="#" class="d-block text-light p-3"><img class="mr-2" src="img/usuario.svg" alt=""
                        width="30px"> Cerrar sesión</a>
            </div>
        </div>

        <div class="encabezado w-100">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <img class="mr-2" src="img/logosigcloud.svg" alt="" width="200px">

                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto my-3">
                            <li class="nav-item active">
                                <img class="mr-2" src="img/preguntas.svg" alt="" width="40px">
                            </li>
                            <li class="nav-item">
                                <img class="mr-2" src="img/notificacion.svg" alt="" width="40px">
                            </li>
                            <li class="nav-item">
                                <img class="mr-2" src="img/apps.svg" alt="" width="40px">
                            </li>
                            <li class="nav-item">
                                <img class="mr-2" src="img/omar.png" alt="" width="40px">
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled"> Bienvenido Omar <br> Ver perfil</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div id="content">
                <section>
                    <div class="container">
                        <div class="row">
                            <div class="col lg-3">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <img class="mr-2" src="img/omar.png" alt="" width="50px">
                                            </div>
                                            <div class="col-md-9">
                                                <h5>Servicios en cotizacion</h5>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col lg-3">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <img class="mr-2" src="img/omar.png" alt="" width="50px">
                                            </div>
                                            <div class="col-md-9">
                                                <h5>Servicios en curso</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col lg-3">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <img class="mr-2" src="img/omar.png" alt="" width="50px">
                                            </div>
                                            <div class="col-md-9">
                                                <h5>Servicios en validacion</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col lg-3">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <img class="mr-2" src="img/omar.png" alt="" width="50px">
                                            </div>
                                            <div class="col-md-9">
                                                <h5>Servicios concluidos</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 my-3">
                                <div class="card">
                                    <div class="card-header">
                                        <h6>Forest anual</h6>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="myChart"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 my-3">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col">
                                                <img class="mr-2" src="img/omar.png" alt="" width="50px">
                                                <h5>$20, 000</h5>
                                                <p>Ingresos febrero </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card my-3">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col">
                                                <img class="mr-2" src="img/omar.png" alt="" width="50px">
                                                <h5>-$10, 000</h5>
                                                <p>Febrero 2021</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 my-3">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col">
                                                <h5>Miembros</h5>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <img class="mr-2" src="img/omar.png" alt=""
                                                            width="50px">
                                                    </div>
                                                    <div class="col-md-9">
                                                        <h5>Omar Chong</h5>
                                                        <p>Desarrollador</p>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <img class="mr-2" src="img/hector.png" alt=""
                                                            width="50px">
                                                    </div>
                                                    <div class="col-md-9">
                                                        <h5>Hector Bastida</h5>
                                                        <p>Desarrollador</p>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <img class="mr-2" src="img/monse.png" alt=""
                                                            width="50px">
                                                    </div>
                                                    <div class="col-md-9">
                                                        <h5>Monse Quiroz</h5>
                                                        <p>Desarrollador</p>
                                                    </div>
                                                    <div class="mx-sm-3 text-center">
                                                        <button type="submit" class="btn btn-primary">Agregar
                                                            mienbro</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-header">
                                        <h6>Ventas mensuales</h6>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="tabla"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col">
                                                <h5>Canales de atención al cliente</h5>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <img class="mr-2" src="img/omar.png" alt=""
                                                            width="50px">
                                                    </div>
                                                    <div class="col-md-9">
                                                        <h5>Facebook</h5>
                                                        <p>2 mensajes</p>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <img class="mr-2" src="img/omar.png" alt=""
                                                            width="50px">
                                                    </div>
                                                    <div class="col-md-9">
                                                        <h5>Instagram</h5>
                                                        <p>3 mensajes</p>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <img class="mr-2" src="img/omar.png" alt=""
                                                            width="50px">
                                                    </div>
                                                    <div class="col-md-9">
                                                        <h5>Whatsapp</h5>
                                                        <p>2 mensajes</p>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <img class="mr-2" src="img/omar.png" alt=""
                                                            width="50px">
                                                    </div>
                                                    <div class="col-md-9">
                                                        <h5>Linkedin</h5>
                                                        <p>0 mensajes</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"
        integrity="sha256-ErZ09KkZnzjpqcane4SCyyHsKAXMvID9/xwbl/Aq1pc=" crossorigin="anonymous"></script>
    <script>
        const labels = [
            'Enero',
            'Febrero',
            'Marzo',
            'Abril',
            'Mayo',
            'Junio',
        ];

        const data = {
            labels: labels,
            datasets: [{
                label: 'My First dataset',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: [0, 10, 5, 2, 20, 30, 45],
            }]
        };

        const config = {
            type: 'line',
            data: data,
            options: {}
        };
    </script>
    <script>
        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>


    <script>
        const labels = [
            'Enero',
            'Febrero',
            'Marzo',
            'Abril',
            'Mayo',
            'Junio',
        ];

        const data = {
            labels: labels,
            datasets: [{
                label: 'My First dataset',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: [0, 10, 5, 2, 20, 30, 45],
            }]
        };

        const config = {
            type: 'line',
            data: data,
            options: {}
        };
    </script>
    <script>
        const tabla = new Chart(
            document.getElementById('tabla'),
            config
        );
    </script>
</body>

</html>

