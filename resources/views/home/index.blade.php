@extends('layouts.admin')

@section('contenido')

{{-- <div class="row"> --}}
    <section class="navbar">
        <div class="container">
            <div class="row">
                <div class="col lg-3 ">
                    <div class="card-header" id="servicios">
                        <div class="row">
                            <div class="col-md-3">
                                <h6><span class="azul">{{$servicios}}</span></h6>
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
                                <span class="morado">{{-- {{count($notificacionusuario->unreadNotifications)}} --}}</span>
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
                                        <div class="col-sm-2 px-5">
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
                                        <div class="col-sm-2 px-5">
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
                                        <div class="col-sm-2 px-5">
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
                                        <div class="col-sm-2 px-5">
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
{{-- </div> --}}
@endsection
