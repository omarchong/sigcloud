@extends('system.dashboard.principal')



@section('contenido')
<div class="main col-md-12 mt-5 encabezado">
    <div class="main-content">
        <div class="panel panel-headline">
            <div class="panel-heading">
                <h3 class="panel-title">Reporte Clientes</h3>
                <p class="panel-subtitle">Listado de productos</p>
            </div>
            <div class="panel-body">
                <!--  <a href="{{ route('clientes.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Agregar Cliente</a>
                    <a href="{{url('pdfclientes') }}"><button class="btn btn-danger"><i class="fas fa-file-pdf"></i></button></a> -->
            </div>
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped table-inverse mt-3 responsive" id="clientes">
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
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection
