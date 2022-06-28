@include('layouts.admin')
<div class="container my-5">
    <div class="card">
        <h5 class="card-header">Agregar usuarios</h5>
        <div class="card-body">
            <form action="{{ route('usuarios.store') }}" method="POST" enctype="multipart/form-data" id="usuarios" class="needs-validation" novalidate>
                @csrf
                <div class="form-row">
                    <div class="col-md-4">
                        <label for="" class="form-label">Nombre</label>
                        <div class="form-group">
                            <input type="text" required class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre')}}" id="nombre" name="nombre">
                            <div class="valid-feedback">
                                Correcto!
                            </div>

                            @error('nombre')
                            <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Apellido paterno</label>
                        <div class="form-group">
                            <input type="text" required class="form-control @error('app') is-invalid @enderror" value="{{old('app')}}" id="app" name="app">
                            <div class="valid-feedback">
                                Correcto!
                            </div>
                            @error('app')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Apellido materno</label>
                        <div class="form-group">
                            <input type="text" required class="form-control @error('apm') is-invalid @enderror" value="{{old('apm')}}" id="apm" name="apm">
                            <div class="valid-feedback">
                                Correcto!
                            </div>
                            @error('apm')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Telefono</label>
                        <div class="form-group">
                            <input type="numeric" required class="form-control @error('telefono') is-invalid @enderror" value="{{old('telefono')}}" id="telefono" name="telefono">
                            <div class="valid-feedback">
                                Correcto!
                            </div>
                            @error('telefono')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Usuario</label>
                        <div class="form-group">
                            <input type="text" required class="form-control @error('usuario') is-invalid @enderror" value="{{old('usuario')}}" id="usuario" name="usuario">
                            <div class="valid-feedback">
                                Correcto!
                            </div>
                            @error('usuario')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <div class="form-group">
                            <input type="email" required class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}" id="email" name="email">

                            <div class="valid-feedback">
                                Correcto!
                            </div>
                            @error('email')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Contrasena</label>
                        <div class="form-group">
                            <input type="password" required class="form-control @error('contrasena') is-invalid @enderror" value="{{old('contrasena')}}" id="contrasena" name="contrasena">
                            <div class="valid-feedback">
                                Correcto!
                            </div>
                            @error('contrasena')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Confirmar Contrasena</label>
                        <div class="form-group">
                            <input type="password" required class="form-control @error('contrasena_confirmar') is-invalid @enderror" value="{{old('contrasena_confirmar')}}" id="contrasena_confirmar" name="contrasena_confirmar">
                            <div class="valid-feedback">
                                Correcto!
                            </div>
                            @error('contrasena_confirmar')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="" class="form-label">Departamento</label>
                        <div class="form-group">
                            <select class="form-control  @error('departamento_id') is-invalid @enderror" name="departamento_id" id="departamento_id">
                                <option selected disabled value="">Seleccione una opcion</option>
                                @foreach($departamentos as $departamento)
                                <option {{old('departamento_id') == $departamento->id ? 'selected' : ''}} value="{{$departamento->id}}">
                                    {{$departamento->nombre}}
                                </option>
                                @endforeach


                                <div class="valid-feedback">
                                    Correcto!
                                </div>
                                @error('departamento_id')
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
                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Tipo de usuario</label>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="tipo" id="tipo" value="admin" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                Administrador
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="tipo" id="tipo" value="user">
                            <label class="form-check-label" for="exampleRadios2">
                                Usuario
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
    $(document).ready(function() {
        $("#usuarios").validate({
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
                    minlength: 1,
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
                    maxlength: 10,

                },
                contrasena_confirmar: {
                    required: true,
                    minlength: 5,
                    maxlength: 10,
                    equalTo: "#contrasena"
                },
                departamento: {
                    required: true,
                },
                estatus: {
                    required: true,
                }

            },
            messages: {
                nombre: {
                    required: "El nombre es requerido"
                },
                app: {
                    required: "El apellido materno es requerido"
                },
                apm: {
                    required: "El apellido materno es requerido"
                },
                email: {
                    required: "El email es requerido"
                },
                telefono: {
                    required: "El telefono es requerido"
                },
                usuario: {
                    required: "El usuario es requerido"
                },
                email: {
                    required: "El email es requerido"
                },
                contrasena: {
                    required: "La contraseña es requerido"
                },
                contrasena_confirmar: {
                    required: "La contraseña es requerido y debe ser igual a contraseña"
                },
                departamento: {
                    required: "Seleccione un departamento"
                },
                estatus: {
                    required: "Seleccione una opcion"
                }
            }
        })
    })
</script>
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>