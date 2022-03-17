@include('layouts.admin')
<div class="container col-md-10 mt-5">
    <div class="row">


        <div class="card card-widget widget-user col-md-6">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header">
                <!-- <h3 class="widget-user-username">Alexander Pierce</h3>
            <h5 class="widget-user-desc">Founder & CEO</h5> -->
            </div>
            <div class="widget-user-image text-center">
                <img class="img-circle elevation-2" src="{{ asset('img/monse.png') }}" alt="User Avatar">
            </div>
            <div class="card-footer">
                <div class="container mt-3">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="widget-user-image text-center">
                                <img class="img-circle elevation-2" src="{{ asset('img/llamadas.svg') }}" height="50px" alt="User Avatar">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="widget-user-image text-center">
                                <img class="img-circle elevation-2" src="{{ asset('img/mail.svg') }}" height="50px" alt="User Avatar">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="widget-user-image text-center">
                                <img class="img-circle elevation-2" src="{{ asset('img/wa.svg') }}" height="50px" alt="User Avatar">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="widget-user-image text-center">
                                <img class="img-circle elevation-2" src="{{ asset('img/visita.svg') }}" height="50px" alt="User Avatar">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container mt-3">

                    <div class="row">
                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                                <h5 class="description-header"><strong>Clave</strong></h5>
                                <span class="description-text">{{$contacto->id}}</span>
                            </div>
                        </div>
                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                                <h5 class="description-header"><strong>Nombre</strong></h5>
                                <span class="description-text">{{$contacto->nombre}}</span>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="description-block">
                                <h5 class="description-header"><strong>Email</strong></h5>
                                <span class="description-text">{{$contacto->email}}</span>
                            </div>

                        </div>
                        <div class="col-sm-4">
                            <div class="description-block">
                                <h5 class="description-header"><strong>telefono</strong></h5>
                                <span class="description-text">{{$contacto->telefono}}</span>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="description-block">
                                <h5 class="description-header"><strong>Descripción</strong></h5>
                                <span class="description-text">{{$contacto->descripcion}}</span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
        
        <div class="card text-center">
            <div class="card-header">
                <ul class="nav nav-pills card-header-pills">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Actividad</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Tareas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Datos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">Disabled</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <h5 class="card-title">Actividades</h5>
                <p class="card-text">Actividades del contacto {{$contacto->nombre}}.</p>
                <a href="#" class="btn btn-primary">Registrar actividad</a>
            </div>
        </div>
        </div>

    </div>
</div>