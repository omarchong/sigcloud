@extends('system.dashboard.principal')

@section('contenido')
    <div class="main col-md-12 mt-5 encabezado">
        <div class="main-content">
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Editar servicio</h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('/servicios/' .$servicio->id) }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputNombre">Nombre</label>
                                <input type="text" class="form-control" id="inputNombre" name="nombre" value="{{ old('nombre')?? $servicio->nombre }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputDescripcion">Descripcion</label>
                                <input type="text" class="form-control" id="inputDescripcion" name="descripcion" value="{{ old('descripcion')?? $servicio->descripcion }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPrecioi">Precio inicial</label>
                                <input type="int" class="form-control" id="inputPrecioi" name="precio_inicial" value="{{ old('precio_inicial')?? $servicio->precio_inicial }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPreciof">Precio final</label>
                                <input type="int" class="form-control" id="inputPreciof" name="precio_final" value="{{ old('precio_final')?? $servicio->precio_final }}">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
@if ( session()->has('success') )
                        <script>
                            Swal.fire(
                            'Exitoso!',
                            '{{ session()->get('success')}}',
                            'success'
                            )
                        </script>
                    @endif
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@endsection
