@include('layouts.admin')
<div class="container my-5">
    <div class="card">
        <h4 class="card-header">Gestión de citas</h4>
        <div class="card-body">
            <form action="{{ route('citas.store') }}" method="POST" id="citas" class="needs-validation" novalidate>
                @csrf
                <input type="hidden" name="id" id="id">
                <div class="form-row">
                    <div class="col-md-12">
                        <label for="">Buscar usuario (Nombre usuario)</label>
                        <div class="input-group">
                            <input type="search" required name="buscarusuario" id="buscarusuario"
                                class="form-control @error('usuarios_id')  @enderror" placeholder=""
                                aria-label="Search">
                            <span class="input-group-btn">
                                <button type="button" id="selectUsuario" class="btn btn-primary">
                                    Seleccionar
                                </button>
                            </span>
                        </div>
                        <div class="valid-feedback">
                            Correcto!
                        </div>
                        @error('usuarios_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <input type="hidden" readonly class="form-control" name="usuarios_id" id="usuarios_id">
                    <div class="col-md-4 my-3">
                        <label for="" class="form-label"> Usuario</label>
                        <div class="form-group">
                            <input type="text" readonly class="form-control" name="usuario" id="usuario">
                        </div>
                    </div>
                    <div class="col-md-4 my-3">
                        <label for="" class="form-label"> E-mail</label>
                        <div class="form-group">
                            <input type="text" readonly class="form-control" name="email" id="email">
                        </div>
                    </div>
                    <div class="col-md-4 my-3">
                        <label for="" class="form-label"> Telefono</label>
                        <div class="form-group">
                            <input type="text" readonly class="form-control" name="telefono" id="telefono">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="" class="col-sm-2-12 col-form-label">Buscar cliente (Nombre empresa)</label>
                        <div class="input-group">
                            <input type="search" required name="buscarempresa" id="buscarempresa"
                                class="form-control @error('clientes_id') is-invalid @enderror" placeholder=""
                                aria-label="Search">
                            <span class="input-group-btn">
                                <button type="button" id="selectEmpresa" class="btn btn-primary">
                                    Seleccionar
                                </button>
                            </span>
                            <div class="valid-feedback">
                                Correcto!
                            </div>
                            @error('clientes_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <input type="hidden" readonly class="form-control" id="clientes_id" name="clientes_id">
                    <div class="col-md-4 my-3">
                        <label for="" class="form-label"> Tipo de cliente</label>
                        <div class="form-group">
                            <input type="text" readonly class="form-control" id="tipocliente" name="tipocliente">
                        </div>
                    </div>
                    <div class="col-md-4 my-3">
                        <label for="" class="form-label">Nombre de la empresa</label>
                        <div class="form-group">
                            <input type="text" readonly class="form-control" id="nombreempresa" name="nombreempresa">
                        </div>
                    </div>
                    <div class="col-md-4 my-3">
                        <label for="" class="form-label"> Estatus</label>
                        <div class="form-group">
                            <input type="text" readonly class="form-control" id="estatuscliente"
                                name="estatuscliente">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="" class="control-label">Nombre</label>
                        <div class="">
                            <input type="text" required class="form-control @error('nombre')  @enderror" id="nombre"
                                name="nombre">
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
                            <input type="date" required class="form-control @error('fecha')  @enderror"
                                value="{{ old('fecha') }}" name="fecha" id="fecha">
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
                            <input type="time" required class="form-control @error('hora')  @enderror"
                                value="{{ old('hora') }}" name="hora" id="hora">
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
                                <option selected disabled value="">Seleccione la duración</option>
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
                            <input class="form-check-input" type="radio" name="tipo_cita" value="Presencial" required="" {{-- onclick="Presencial();" --}}>
                            <label class="form-check-label">
                                Presencial
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="tipo_cita" value="On-line" required="" {{-- onclick="Online();" --}}>
                            <label class="form-check-label">
                                On-line
                            </label>
                        </div>
                    </div>
                    <div class="col-md-10 col-sm-2-12 col-form-label my-3">
                        <label for="col-sm-2-12 col-form-label">Lugar/Link</label>
                        <input type="text" class="form-control" id="lugar" name="lugar" placeholder="" >
                    </div>
                    {{-- <div class="col-md-10 col-sm-2-12 col-form-label my-3" id="Presencial" style="display: none;">
                        <label for="col-sm-2-12 col-form-label">Ingrese el lugar</label>
                        <input type="text" class="form-control" id="lugar" name="lugar" placeholder="" >
                    </div>
                    <div class="col-md-10 col-sm-2-12 col-form-label my-3" id="Online" style="display: none;">
                        <label for="col-sm-2-12 col-form-label">Ingrese la url</label>
                        <input type="text" class="form-control" id="link" name="link" placeholder="" >
                    </div> --}}

                    <div class="col-md-12">
                        <label for="" class="col-sm-2-12 col-form-label">Tema</label>
                        <div class="form-group">
                            <input type="hidden" required class="form-control @error('tema')  @enderror" name="tema"
                                id="tema" value="{{ old('tema') }}">
                            <trix-editor input="tema"></trix-editor>
                        </div>
                        <div class="valid-feedback">
                            Correcto!
                        </div>
                        @error('tema')
                            <small class="text-danger"> {{ $message }} </small>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="" class="col-sm-2-12 col-form-label">Seleccione el estatus</label>
                        <div class="">
                            <select class="form-control  @error('estatucitas_id') is-invalid @enderror"
                                name="estatucitas_id" id="estatucitas_id">
                                @foreach ($estatucitas as $estatucita)
                                    <option value="{{ $estatucita->id }}">
                                        {{ $estatucita->nombre }}
                                    </option>
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
                fecha: {
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
                    required: "El tipo de cita es requerido"
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

<script>
    $(document).ready(function() {

        $("#buscarempresa").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: "{{ route('buscaempresa') }}",
                    type: 'POST',
                    data: {
                        term: request.term,
                        _token: $("input[name=_token]").val()
                    },
                    dataType: 'json',
                    success: function(data) {
                        var resp = $.map(data, function(obj) {
                            return obj.nombreempresa;
                            response(data);
                        });
                        response(resp);
                    }
                })
            },
            minLength: 1,
        })

        $("#selectEmpresa").click(function() {
            const cliente = $('#buscarempresa').val()
            $.ajax({
                url: "{{ route('seleccionaempresa') }}",
                type: "POST",
                data: {
                    cliente: cliente,
                    _token: $("input[name=_token]").val()
                },
                success: function(data) {
                    $("#clientes_id").val(data.id ?? "Sin datos")
                    $("#tipocliente").val(data.tipocliente ?? "Sin datos")
                    $("#nombreempresa").val(data.nombreempresa ?? "Sin datos")
                    $("#estatuscliente").val(data.estatuscliente ?? "Sin datos")
                }
            })
        })

        $("#buscarusuario").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: "{{ route('buscausuario') }}",
                    type: "POST",
                    data: {
                        term: request.term,
                        _token: $("input[name=_token]").val()
                    },
                    dataType: 'json',
                    success: function(data) {
                        var resp = $.map(data, function(obj) {
                            return obj.nombre;
                            response(data);
                        })
                        response(resp);
                    }
                })
            },
            minLenght: 1,
        })

        $("#selectUsuario").click(function() {
            const usuario = $('#buscarusuario').val()
            $.ajax({
                url: "{{ route('seleccionausuario') }}",
                type: "POST",
                data: {
                    usuario: usuario,
                    _token: $("input[name=_token]").val()
                },
                success: function(data) {
                    $("#usuarios_id").val(data.id ?? "Sin datos")
                    $("#usuario").val(data.usuario ?? "Sin datos")
                    $("#email").val(data.email ?? "sin datos")
                    $("#telefono").val(data.telefono ?? "Sin datos")
                }
            })
        })

    });
</script>
