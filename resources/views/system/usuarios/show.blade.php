@include('layouts.admin')
<div class="main my-3">
    <div class="main-content">
        <div class="container-fluid col-md-10">


            <div class="row">

                <div class="col-md-5">

                    <div class="card">
                        <!-- {{$usuarios['imagen']}} -->
                        <div class="" style="background-color: #29C0FD;">

                            <img src="{{asset('imagen/'. $usuarios['imagen'])}}" class="rounded-circle mx-auto d-block  my-4" alt="..." width="120px" height="100px">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"> <strong>Nombre: </strong>{{$usuarios->nombre}} {{$usuarios->app}} {{$usuarios->apm}}</h5>
                            <h5 class="card-title"><strong>Usuario: </strong> {{$usuarios->usuario}}</h5>
                            <h5 class="card-title"><strong>Email:</strong> {{$usuarios->email}}</h5>
                            <h5 class="card-title"><strong>Telefono:</strong> {{$usuarios->telefono}}</h5>
                            <h5 class="card-title"><strong>Estatus:</strong> {{$usuarios->estatus}}</h5>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Last updated 3 mins ago</small>
                        </div>
                    </div>
                </div>

                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header text-white" style="background-color: #0B6FED">
                            Departamento
                        </div>
                        <div class="card-body">
                            <!-- <h5 class="card-title">Departamento: </h5> -->
                            @foreach($departamentos as $departamento)
                            <li><strong>Abreviatura:</strong> {{$departamento->abreviatura}} </li>
                            <li><strong>Nombre:</strong> {{$departamento->nombre}} </li>
                            <li><strong>Estatus:</strong> {{$departamento->estatus}}
                            </li>


                            @endforeach

                        </div>
                    </div>
                    <div class="card my-3">
                        <div class="card-header text-white" style="background-color: #F7A552">
                            Lista de tareas asignadas
                        </div>
                        <div class="card-body">
                          <!--   <h5 class="card-title">Nombre:</h5> -->
                            @foreach($tareas as $tarea)
                            <li><strong>Actividad: </strong>{{$tarea->nombre}}</li>
                            @endforeach
                            <p class="card-text"></p>

                        </div>
                    </div>
                </div>





            </div>
        </div>

    </div>
</div>