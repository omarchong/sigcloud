@extends('system.dashboard.principal')



@section('contenido')

<div class="container my-5">
        <div class="card">
            <h5 class="card-header">Alta clientes</h5>
            <div class="card-body">
                <form action="{{ route('contactos.store') }}" method="POST">
                    @csrf
                    <div class="form-row">

                        <div class="col-md-4">
                            <label for="exampleInputEmail1" class="form-label">Nombre</label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="nombre" name="nombre"  value="{{old('nombre')}}">

                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="exampleInputEmail1" class="form-label">Telefono</label>
                            <div class="form-group">
                                <input type="number" class="form-control" id="telefono" name="telefono" value="{{old('telefono')}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="exampleInputEmail1" class="form-label">Descripcion</label>
                            <div class="form-group">
                                <input type="numeric" class="form-control" id="descripcion" name="descripcion" value="{{old('descripcion')}}">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>

                </form>
            </div>
        </div>
    </div>

@endsection
