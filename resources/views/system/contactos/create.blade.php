@include('layouts.admin')




<div class="container my-5">
    <div class="card">
        <h5 class="card-header">Alta contactos</h5>
        <div class="card-body">
            <form action="{{ route('contactos.store') }}" method="POST">
                @csrf
                <div class="form-row">

                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Nombre</label>
                        <div class="form-group">
                            <input type="text" class="form-control" id="nombre" name="nombre" value="{{old('nombre')}}">

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
                    <div class="col-md-12">
                        <label for="descripcion">Descripcion</label>
                        <div class="form-group">
                            <input type="hidden" name="descripcion" id="descripcion" value="{{old('descripcion')}}">
                            <trix-editor input="descripcion"></trix-editor>
                        </div>
                        @error('descripcion')
                        <small class="text-danger"> {{ $message }} </small>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-primary float-right">Guardar</button>

            </form>
        </div>
    </div>
</div>


