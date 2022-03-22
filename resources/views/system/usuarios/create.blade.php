@include('layouts.admin')
<div class="container my-5">
    <div class="card">
        <h5 class="card-header">Agregar usuarios</h5>
        <div class="card-body">
            <form action="{{ route('usuarios.store') }}" method="POST" enctype="multipart/form-data" id="usuariosvalidate">
                @csrf
                <div class="form-row">
                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Nombre</label>
                        <div class="form-group">
                            <input type="text" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre')}}" id="nombre" name="nombre">
                            @error('nombre')
                            <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Apellido paterno</label>
                        <div class="form-group">
                            <input type="text" class="form-control @error('app') is-invalid @enderror" value="{{old('app')}}" id="app" name="app">
                            @error('app')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Apellido materno</label>
                        <div class="form-group">
                            <input type="text" class="form-control @error('apm') is-invalid @enderror" value="{{old('apm')}}" id="apm" name="apm">
                            @error('apm')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Telefono</label>
                        <div class="form-group">
                            <input type="numeric" class="form-control @error('telefono') is-invalid @enderror" value="{{old('telefono')}}" id="telefono" name="telefono">
                            @error('telefono')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Usuario</label>
                        <div class="form-group">
                            <input type="text" class="form-control @error('usuario') is-invalid @enderror" value="{{old('usuario')}}" id="usuario" name="usuario">
                            @error('usuario')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <div class="form-group">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}" id="email" name="email">

                            @error('email')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Contrasena</label>
                        <div class="form-group">
                            <input type="password" class="form-control @error('contrasena') is-invalid @enderror" value="{{old('contrasena')}}" id="contrasena" name="contrasena">
                            @error('contrasena')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Confirmar Contrasena</label>
                        <div class="form-group">
                            <input type="password" class="form-control @error('contrasena_confirmar') is-invalid @enderror" value="{{old('contrasena_confirmar')}}" id="contrasena_confirmar" name="contrasena_confirmar">
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
                        <div id="preview"></div>
                    </div>
                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Estatus</label>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="estatus" id="estatus" value="Si" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                Activo
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="estatus" id="estatus" value="No">
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

<script>
    // just for the demos, avoids form submit
    jQuery.validator.setDefaults({
        debug: true,
        success: "valid"
    });
    $("#usuariosvalidate").validate({
        rules: {
            nombre: {
                required: true,
                
            },
            app: {
                required: true,
                
            },
            apm: {
                required: true,

            },
            telefono: {
                required: true,
                digits: true,
                maxlength: 10,

            },
            usuario: {
                required: true

            },
            email: {
                required: true,

            },
            contrasena: {
                required: true,
                minlength: 5,

            },
            contrasena_confirmar: {
                required: true,
                minlength: 5,
                equalTo: "#contrasena"
            }
        }
    });
</script>