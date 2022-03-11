@extends('system.dashboard.principal')

@section('contenido')
<div class="main col-md-12 mt-5 encabezado">
    <div class="main-content">
        <div class="panel panel-headline">
            <div class="panel-heading">
                <h3 class="panel-title">Reporte Servicios</h3>
            </div>
                <div class="card-body">
                    <table class="table table-striped table-inverse mt-3 responsive" id="servicios">
                        <thead class="thead-inverse striped responsive">
                            <tr>
                                <th class="text-center">Clave</th>
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Descripcion</th>
                                <th class="text-center">Precio inicial</th>
                                <th class="text-center">Precio final</th>
                                <th class="text-center">Operaciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($servicios as $servicio)
                             <tr>
                                <td>{{$servicio->id}}</td>
                                <td>{{$servicio->nombre}}</td>
                                <td>{{$servicio->descripcion}}</td>
                                <td>{{$servicio->precio_inicial}}</td>
                                <td>{{$servicio->precio_final}}</td>
                                <td> <center><a href="#"><img src="img/editar.svg" alt="" width="20px"></a>
                                    <a href=""><img src="img/basurero.svg" alt="" width="20px"></a>
                                    </center>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <h5><b>Total de ingresos</b></h5>

                    <!-- Button trigger modal -->
                    <a href="{{route('servicios.create')}}"  class="btn btn-primary"><i class="fas fa-plus"></i> Registrar servicio</a>
                                    
                </div>
            </div>
          </div>
</div>
@endsection

