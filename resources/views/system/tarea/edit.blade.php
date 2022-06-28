@include('layouts.admin')
<div class="container my-5">
    <div class="card">
        <h4 class="card-header">Editar tarea</h4>
        <div class="card-body">
            <form action="{{ route('tareas.update', ['tarea' => $tarea->id]) }}" method="POST" id="tareas" class="needs-validation" novalidate>
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="col-md-4">
                        <label for="" class="control-label">Nombre</label>
                        <div class="">
                            <input type="text" required class="form-control @error('nombre') is-invalid @enderror" value="{{$tarea->nombre}}" id="nombre" name="nombre">
                            <div class="valid-feedback">
                                Correcto!
                            </div>
                            @error('nombre')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="" class="control-label">Hora</label>
                        <div class="">
                            <input type="time" required class="form-control @error('hora_limite') is-invalid @enderror" value="{{$tarea->hora_limite}}" name="hora_limite" id="hora_limite">
                            <div class="valid-feedback">
                                Correcto!
                            </div>
                            @error('hora_limite')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="" class="control-label">Fecha</label>
                        <div class="">
                            <input type="date" required class="form-control @error('fecha_limite') is-invalid @enderror" value="{{$tarea->fecha_limite}}" name="fecha_limite" id="fecha_limite">
                            <div class="valid-feedback">
                                Correcto!
                            </div>
                            @error('fecha_limite')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="" class="col-sm-2-12 col-form-label">Tipo de tarea</label>
                        <div class="">
                            <input type="text" required class="form-control @error('tipo_tarea') is-invalid @enderror" value="{{$tarea->tipo_tarea}}" name="tipo_tarea" id="tipo_tarea">
                            <div class="valid-feedback">
                                Correcto!
                            </div>
                            @error('tipo_tarea')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <label for="" class="col-sm-2-12 col-form-label">Seleccione al usuario</label>
                        <div class="form-group">
                            <select class="form-control  @error('usuario_id') is-invalid @enderror" name="usuario_id" id="usuario_id">
                                <option selected disabled value="">Seleccione una opcion</option>
                                @foreach ($usuario as $usuarios)
                                <option value="{{$usuarios->id}}" {{ $tarea->usuario_id == $usuarios->id ? 'selected' : '' }}>{{$usuarios->nombre}}</option>
                                @endforeach
                                <div class="valid-feedback">
                                    Correcto!
                                </div>
                                @error('usuario_id')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="" class="col-sm-2-12 col-form-label">Seleccione al cliente</label>
                        <div class="form-group">
                            <select class="form-control  @error('clientes_id') is-invalid @enderror" name="clientes_id" id="clientes_id">
                                <option selected disabled value="">Seleccione una opcion</option>
                                @foreach ($clientes as $cliente)
                                <option value="{{$cliente->id}}" {{ $tarea->clientes_id == $cliente->id ? 'selected' : '' }}>{{$cliente->nombreempresa}}</option>
                                @endforeach
                                <div class="valid-feedback">
                                    Correcto!
                                </div>
                                @error('clientes_id')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="" class="col-sm-2-12 col-form-label">Seleccione el estatus</label>
                        <div class="form-group">
                            <select class="form-control @error('estatutareas_id') is-invalid @enderror" name="estatutareas_id" id="estatutareas_id">
                                <option selected disabled value="">Seleccione una opción</option>
                                @foreach ($estatutareas as $estatutarea)
                                <option value="{{$estatutarea->id}}" {{ $tarea->estatutareas_id == $estatutarea->id ? 'selected' : '' }}>{{$estatutarea->nombre}}
                                    @endforeach
                                    <div class="valid-feedback">
                                        Correcto!
                                    </div>
                                    @error('estatutareas_id')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="" class="col-sm-2-12 col-form-label">Descripción</label>
                        <div class="">
                            <input type="hidden" required class="form-control @error('descripcion') is-invalid @enderror" value="{{$tarea->descripcion}}" id="descripcion" name="descripcion">
                            <trix-editor input="descripcion"></trix-editor>
                            <div class="valid-feedback">
                                Correcto!
                            </div>
                            @error('descripcion')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary float-right my-3">Guardar</button>

            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $("#tareas").validate({
            rules: {
                nombre: {
                    required: true
                },
                descripcion: {
                    required: true
                },
                fecha_limite: {
                    required: true
                },
                hora_limite: {
                    required: true
                },
                tipo_tarea: {
                    required: true
                },
                usuarios_id: {
                    required: true
                },
                clientes_id: {
                    required: true
                },
                estatutareas_id: {
                    required: true
                }
            },
            messages: {
                nombre: {
                    required: "El nombre es requerido"
                },
                hora_limite: {
                    required: "La hora es requerido"
                },
                fecha_limite: {
                    required: "La fecha es requerido"
                },
                tipo_tarea: {
                    required: "El tipo tarea es requerido"
                },
                usuarios_id: {
                    required: "El campo usuario es requerido"
                },
                clientes_id: {
                    required: "El campo cliente es requerido"
                },
                estatutareas_id: {
                    required: "El campo estatus es requerido"
                },
                descripcion: {
                    required: "El campo descripcion es requerido"
                }
            }
        })
    })
</script>
<script>
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