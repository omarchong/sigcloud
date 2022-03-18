@include('layouts.admin')
<div class="container my-5">
    <div class="card">
        <h5 class="card-header">Agregar usuarios</h5>
        <div class="card-body">
            <form action="{{ route('usuarios.update', ['usuario' => $usuario->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-row">
                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Nombre</label>
                        <div class="form-group">
                            <input type="text" class="form-control @error('nombre') is-invalid @enderror" value="{{$usuario->nombre}}" id="nombre" name="nombre">
                            @error('nombre')
                            <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Apellido paterno</label>
                        <div class="form-group">
                            <input type="text" class="form-control @error('app') is-invalid @enderror" value="{{$usuario->app}}" id="app" name="app">
                            @error('app')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Apellido materno</label>
                        <div class="form-group">
                            <input type="text" class="form-control @error('apm') is-invalid @enderror" id="apm" name="apm" value="{{$usuario->apm}}">
                            @error('apm')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Telefono</label>
                        <div class="form-group">
                            <input type="numeric" class="form-control @error('telefono') is-invalid @enderror" id="telefono" name="telefono" value="{{$usuario->telefono}}">
                            @error('telefono')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Usuario</label>
                        <div class="form-group">
                            <input type="text" readonly class="form-control @error('usuario') is-invalid @enderror" id="usuario" name="usuario" value="{{$usuario->usuario}}">
                            @error('usuario')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <div class="form-group">
                            <input type="email" readonly class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{$usuario->email}}">

                            @error('email')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Password</label>
                        <div class="form-group">
                            <input type="password" class="form-control @error('contrasena') is-invalid @enderror" id="contrasena" name="contrasena" value="{{$usuario->contrasena}}">
                            @error('contrasena')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Password confirmar</label>
                        <div class="form-group">
                            <input type="password" class="form-control @error('contrasena_confirmar') is-invalid @enderror" value="{{$usuario->contrasena_confirmar}}" id="contrasena_confirmar" name="contrasena_confirmar">
                            @error('contrasena_confirmar')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="" class="form-label">Departamento</label>
                        <div class="form-group">
                            <select class="form-control  @error('departamento') is-invalid @enderror" name="departamento" id="departamento">
                                <option selected>Selecciona</option>
                                <option value="desarrollodesoftware">Desarrollo de software</option>
                                <option value="diseño">Diseño</option>
                                @error('departamento')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Imagen</label>
                        <div class="form-group">
                            <input type="file" class="form-control @error('imagen') is-invalid @enderror" id="imagen" name="imagen">
                            @error('imagen')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <div id="preview">
                            @if($usuario->imagen)
                            <img src="{{asset('/imagen/'.$usuario->imagen)}}">
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Estatus</label>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="estatus" id="estatus" value="Si" {{old('estatus') == 'Si' ? 'checked': ($usuario->estatus == 'Si' ? 'checked': '')}}>
                            <label class="form-check-label" for="exampleRadios1">
                                Activo
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="estatus" id="estatus" value="No" {{old('estatus') == 'No' ? 'checked': ($usuario->estatus == 'No' ? 'checked': '')}}>
                            <label class="form-check-label" for="exampleRadios2">
                                Inactivo
                            </label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary float-right">Guardar</button>

            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(e) {
        document.getElementById("imagen").onchange = function(e) {
            // Creamos el objeto de la clase FileReader
            let reader = new FileReader();

            // Leemos el archivo subido y se lo pasamos a nuestro fileReader
            reader.readAsDataURL(e.target.files[0]);

            // Le decimos que cuando este listo ejecute el código interno
            reader.onload = function() {
                let preview = document.getElementById('preview'),

                    image = document.createElement('img', {
                        width: '50px',
                        height: '50px'
                    });

                image.src = reader.result;

                preview.innerHTML = '';
                preview.append(image);
            };
        }
    });
</script>