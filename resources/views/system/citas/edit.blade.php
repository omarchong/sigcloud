@include('layouts.admin')
<div class="container my-5">
    <div class="card">
        <h4 class="card-header">Editar cita</h4>
        <div class="card-body">
            <form action="{{ route('citas.update', ['cita' => $cita->id]) }}" method="POST" id="citas" class="needs-validation" novalidate>
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="col-md-4">
                        <label for="" class="control-label">Nombre</label>
                        <div class="">
                            <input type="text" required class="form-control @error('nombre')  @enderror" id="nombre"
                                name="nombre"  value="{{$cita->nombre}}">
                            <div class="valid-feedback">
                                Correcto!
                            </div>
                            @error('nombre')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="" class="control-label">Fecha</label>
                        <div class="">
                            <input type="date" required class="form-control @error('fecha')  @enderror"
                            value="{{$cita->fecha}}" name="fecha" id="fecha">
                            <div class="valid-feedback">
                                Correcto!
                            </div>
                            @error('fecha')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="" class="control-label">Tema</label>
                        <div class="">
                            <input type="text" required class="form-control @error('tema')  @enderror" id="tema"
                                name="tema" value="{{$cita->tema}}">
                            <div class="valid-feedback">
                                Correcto!
                            </div>
                            @error('tema')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="" class="control-label">Hora</label>
                        <div class="">
                            <input type="time" required class="form-control @error('hora')  @enderror"
                                value="{{$cita->hora}}" name="hora" id="hora">
                            <div class="valid-feedback">
                                Correcto!
                            </div>
                            @error('hora')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="" class="control-label">Duracion de la cita</label>
                        <div class="">
                            <input type="text" required class="form-control @error('duracion_cita')  @enderror" id="duracion_cita"
                                name="duracion_cita" value="{{$cita->duracion_cita}}">
                            <div class="valid-feedback">
                                Correcto!
                            </div>
                            @error('duracion_cita')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="" class="control-label">Lugar</label>
                        <div class="">
                            <input type="text" required class="form-control @error('lugar')  @enderror" id="lugar"
                                name="lugar" value="{{$cita->lugar}}">
                            <div class="valid-feedback">
                                Correcto!
                            </div>
                            @error('lugar')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="" class="col-sm-2-12 col-form-label">Tipo de cita</label>
                        <div class="">
                            <input type="text" required class="form-control @error('tipo_cita')  @enderror"
                            value="{{$cita->tipo_cita}}" name="tipo_cita" id="tipo_cita">
                            <div class="valid-feedback">
                                Correcto!
                            </div>
                            @error('tipo_cita')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="" class="col-sm-2-12 col-form-label">Seleccione un usuario</label>
                        <div class="">
                            <select class="form-control @error('usuarios_id') is-invalid @enderror" name="usuarios_id"
                                id="usuarios_id" required>
                                @foreach ($usuarios as $usuario)
                                    <option value="{{$usuario->id}}" {{ $cita->usuarios_id == $usuario->id ? 'selected' : '' }}>{{$usuario->nombre}}
                                    </option>
                                @endforeach
                                <div class="valid-feedback">
                                    Correcto!
                                </div>
                                @error('usuarios_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="" class="col-sm-2-12 col-form-label">Seleccione al cliente</label>
                        <div class="">
                            <select class="custom-select  @error('clientes_id') is-invalid @enderror" name="clientes_id"
                                id="clientes_id">
                                @foreach ($clientes as $cliente)
                                    <option value="{{$cliente->id}}" {{ $cita->clientes_id == $cliente->id ? 'selected' : '' }}>{{$cliente->nombreempresa}}
                                    </option>
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
                        <div class="">
                            <select class="form-control @error('estatucitas_id') is-invalid @enderror"
                                name="estatucitas_id" id="estatucitas_id" required>
                                @foreach ($estatucitas as $estatucita)
                                    <option value="{{$estatucita->id}}" {{ $cita->estatucitas_id == $estatucita->id ? 'selected' : '' }}>{{$estatucita->nombre}}
                                @endforeach
                                <div class="valid-feedback">
                                    Correcto!
                                </div>
                                @error('estatucitas_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </select>
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
        $("#citas").validate({
            rules: {
                nombre: {
                    required: true
                },
                fecha: {
                    required: true
                },
                tema: {
                    required: true
                },
                hora: {
                    required: true
                },
                duracion_cita: {
                    required: true
                },
                lugar: {
                    required: true
                },
                tipo_cita: {
                    required: true
                },
                usuarios_id: {
                    required: true
                },
                clientes_id: {
                    required: true
                },
                estatucitas_id: {
                    required: true
                }
            },
            messages: {
                nombre: {
                    required: "El nombre es requerido"
                },
                fecha:{
                    required: "La fecha es requerida"
                },
                tema: {
                    required: "El tema es requerido"
                },
                hora: {
                    required: "La hora es requerido"
                },
                duracion_cita: {
                    required: "La duracion es requerida"
                },
                lugar: {
                    required: "El lugar es requerido"
                },
                tipo_cita: {
                    required: "El tipo cita es requerido"
                },
                usuarios_id: {
                    required: "El campo usuario es requerido"
                },
                clientes_id: {
                    required: "El campo cliente es requerido"
                },
                estatucitas_id: {
                    required: "El campo estatus es requerido"
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
