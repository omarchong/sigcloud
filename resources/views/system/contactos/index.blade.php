@extends('system.dashboard.principal')
@section('contenido')
<div class="main col-md-12 mt-5 encabezado">
    <div class="main-content">
        <div class="panel panel-headline">


            <div class="card">
                <div class="container col-md-12 my-4">
                    <a href="{{ route('contactos.create') }}" class="btn btn-primary"> Agregar Contacto</a>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-inverse mt-3 responsive" id="contactos">
                        <thead class="thead-inverse striped responsive">
                            <tr>
                                <th>Clave</th>
                                <th>Nombre</th>
                                <th>Telefono</th>
                                <th>Servicio</th>
                                <th>Estatus</th>
                                <th>Operaciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($contactos as $contacto)
                            <tr>
                                <td>{{$contacto->id}}</td>
                                <td>{{$contacto->nombre}}</td>
                                <td>{{$contacto->email}}</td>
                                <td>{{$contacto->telefono}}</td>
                                <td>{{$contacto->descripcion}}</td>

                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection
