@include('layouts.admin')
<div class="container my-5">
    <div class="card">
        <h4 class="card-header">Editar cita</h4>
        <div class="card-body">
            <form action="{{ route('citas.update', ['cita' => $cita->id]) }}" method="POST" id="citas" class="needs-validation" novalidate>
                @csrf
                @method('PUT')
                <div class="form-row">
                    <input type="hidden" readonly class="form-control" name="usuarios_id" id="usuarios_id" value="{{$cita->usuarios_id}}">
                    <div class="col-md-4 my-3">
                        <label for="" class="form-label"> Usuario</label>
                        <div class="form-group">
                            <input type="text" readonly class="form-control" value="{{$cita->usuarios->usuario}}" name="usuario" id="usuario">
                        </div>
                    </div>
                    <div class="col-md-4 my-3">
                        <label for="" class="form-label"> E-mail</label>
                        <div class="form-group">
                            <input type="text" readonly class="form-control" value="{{$cita->usuarios->email}}" name="email" id="email">
                        </div>
                    </div>
                    <div class="col-md-4 my-3">
                        <label for="" class="form-label"> Telefono</label>
                        <div class="form-group">
                            <input type="text" readonly class="form-control" value="{{$cita->usuarios->telefono}}" name="telefono" id="telefono">
                        </div>
                    </div>
                    <input type="hidden" readonly class="form-control" id="clientes_id" name="clientes_id" value="{{$cita->clientes_id}}">
                    <div class="col-md-4 my-3">
                        <label for="" class="form-label"> Tipo de cliente</label>
                        <div class="form-group">
                            <input type="text" readonly class="form-control" value="{{$cita->clientes->tipocliente}}" id="tipocliente" name="tipocliente">
                        </div>
                    </div>
                    <div class="col-md-4 my-3">
                        <label for="" class="form-label">Nombre de la empresa</label>
                        <div class="form-group">
                            <input type="text" readonly class="form-control" value="{{$cita->clientes->nombreempresa}}" id="nombreempresa" name="nombreempresa">
                        </div>
                    </div>
                    <div class="col-md-4 my-3">
                        <label for="" class="form-label"> Estatus</label>
                        <div class="form-group">
                            <input type="text" readonly class="form-control" value="{{$cita->clientes->estatuscliente}}" id="estatuscliente"
                                name="estatuscliente">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="" class="control-label">Nombre</label>
                        <div class="">
                            <input type="text" required class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre"  value="{{$cita->nombre}}">
                            <div class="valid-feedback">
                                Correcto!
                            </div>
                            @error('nombre')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="" class="control-label">Fecha</label>
                        <div class="">
                            <input type="date" required class="form-control @error('fecha') is-invalid @enderror"
                            value="{{$cita->fecha}}" name="fecha" id="fecha">
                            <div class="valid-feedback">
                                Correcto!
                            </div>
                            @error('fecha')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="" class="control-label">Hora</label>
                        <div class="">
                            <input type="time" required class="form-control @error('hora') is-invalid @enderror"
                                value="{{$cita->hora}}" name="hora" id="hora">
                            <div class="valid-feedback">
                                Correcto!
                            </div>
                            @error('hora')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="" class="control-label">Duración de la cita</label>
                        <div class="">
                            <select class="custom-select" class="@error('duracion_cita') is-invalid @enderror "
                                name="duracion_cita" id="duracion_cita" required>
                                <option selected disabled value="">{{$cita->duracion_cita}}</option>
                                <option value="30 minutos">30 minutos</option>
                                <option value="60 minutos">60 minutos</option>
                                <option value="90 minutos">90 minutos</option>
                                <option value="120 minutos">120 minutos</option>
                                <option value="150 minutos">150 minutos</option>
                                <div class="valid-feedback">
                                    Correcto!
                                </div>
                                @error('duracion_cita')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2 my-3">
                        <label for="exampleInputEmail1" class="col-sm-2-12 col-form-label">Tipo de cita</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="tipo_cita" value="Presencial" {{old('tipo_cita') == 'Presencial' ? 'checked': ($cita->tipo_cita == 'Presencial' ? 'checked': '')}} required="" {{-- onclick="Presencial();" --}}>
                            <label class="form-check-label">
                                Presencial
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="tipo_cita" value="On-line" {{old('tipo_cita') == 'On-line' ? 'checked': ($cita->tipo_cita == 'On-line' ? 'checked': '')}} required=""{{--  onclick="Online();" --}}>
                            <label class="form-check-label">
                                On-line
                            </label>
                        </div>
                    </div>
                    <div class="col-md-10 col-sm-2-12 col-form-label my-3">
                        <label for="col-sm-2-12 col-form-label">Lugar/Link</label>
                        <input type="text" class="form-control" id="lugar" name="lugar" value="{{$cita->lugar}}" placeholder="" >
                    </div>
                    {{-- <div class="col-md-10 col-sm-2-12 col-form-label my-3" id="Presencial" style="display: none;">
                        <label for="col-sm-2-12 col-form-label">Ingrese el lugar</label>
                        <input type="text" class="form-control" id="lugar" name="lugar" value="{{$cita->lugar}}" placeholder="" >
                    </div>
                    <div class="col-md-10 col-sm-2-12 col-form-label my-3" id="Online" style="display: none;">
                        <label for="col-sm-2-12 col-form-label">Ingrese la url</label>
                        <input type="text" class="form-control" id="link" name="link" value="{{$cita->link}}" placeholder="" >
                    </div> --}}

                    <div class="col-md-12">
                        <label for="" class="col-sm-2-12 col-form-label">Tema</label>
                        <div class="">
                            <input type="hidden" required class="form-control @error('tema') is-invalid @enderror" name="tema"
                                id="tema" value="{{$cita->tema}}">
                            <trix-editor input="tema"></trix-editor>
                            <div class="valid-feedback">
                                Correcto!
                            </div>
                            @error('tema')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="" class="col-sm-2-12 col-form-label">Seleccione el estatus</label>
                        <div class="form-group">
                            <select class="form-control @error('estatucitas_id') is-invalid @enderror" name="estatucitas_id" id="estatucitas_id">
                                <option selected disabled value="">Seleccione una opción</option>
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
    function Presencial() {
      document.getElementById("Presencial").style.display = "block";
      document.getElementById("Online").style.display = "none";
    }
    function Online() {
      document.getElementById("Presencial").style.display = "none";
      document.getElementById("Online").style.display = "block";
    }
  </script>
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
