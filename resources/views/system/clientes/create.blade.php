@include('layouts.admin')
<div class="container my-5">
    <div class="card">
        <h5 class="card-header">Alta clientes</h5>
        <div class="card-body">
            <form action="{{ route('clientes.store') }}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="col-md-12">
                        <label for="">Buscar contacto</label>
                        <div class="input-group">
                            <input type="search" name="nombre" id="buscar" class="form-control" aria-label="Search">
                            <span class="input-group-btn">
                                <button type="button" id="btn-seleccionar-cliente" class="btn btn-primary">
                                    Seleccionar
                                </button>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="exampleInputEmail1" class="form-label">Seleccione el contacto</label>
                        <div class="form-group">
                            <select class="form-control  @error('contacto_id') is-invalid @enderror" name="contacto_id" id="contacto_id">
                                @foreach($contactos as $contacto)
                                <option {{ old('contacto_id') == $contacto->id ? 'selected' : '' }} value="{{ $contacto->id }}">
                                    {{$contacto->contacto1}}
                                    @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Tipo de cliente</label>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="tipocliente" id="tipocliente" value="Empresa" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                Empresa
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="tipocliente" id="tipocliente" value="Particular">
                            <label class="form-check-label" for="exampleRadios2">
                                Particular
                            </label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Nombre empresa</label>
                        <div class="form-group">
                            <input type="text" class="form-control" id="nombreempresa" name="nombreempresa">

                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Estado</label>
                        <div class="form-group">
                            <select name="estado" id="estado" class="form-control estado">
                                <option value="">Selecione un estado</option>
                                @foreach($estados as $estado)
                                <option value="{{$estado->id}}">{{$estado->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Municipio</label>
                        <div class="form-group">
                            <select name="municipio" id="municipio" class="form-control">

                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Codigo postal</label>
                        <div class="form-group">
                            <input type="number" class="form-control" id="cp" name="cp">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Referencias</label>
                        <div class="form-group">
                            <input type="numeric" class="form-control" id="referencias" name="referencias">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Estado fiscal</label>
                        <div class="form-group">
                            <input type="text" class="form-control" id="estadofiscal" name="estadofiscal">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Municipio fiscal</label>
                        <div class="form-group">
                            <input type="text" class="form-control" id="municipiofiscal" name="municipiofiscal">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Cp fiscal</label>
                        <div class="form-group">
                            <input type="text" class="form-control" id="cpfiscal" name="cpfiscal">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Referencias fiscales</label>
                        <div class="form-group">
                            <input type="text" class="form-control" id="referenciasfiscal" name="referenciasfiscal">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Seleccione el giro</label>
                        <div class="form-group">
                            <select class="form-control  @error('giro') is-invalid @enderror" name="giro" id="giro">
                                <option selected>Choose...</option>
                                <option>2</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Seleccione el servicio</label>
                        <div class="form-group">
                            <select class="form-control  @error('servicio') is-invalid @enderror" name="servicio" id="servicio">
                                <option selected>Choose...</option>
                                <option>2</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">RFC</label>
                        <div class="form-group">
                            <input type="text" class="form-control" id="rfc" name="rfc">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="exampleInputEmail1" class="form-label">Estatus clientes</label>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="estatuscliente" id="estatuscliente" value="Frecuente" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                Frecuente
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="estatuscliente" id="estatuscliente" value="Habitual">
                            <label class="form-check-label" for="exampleRadios2">
                                Habitual
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="estatuscliente" id="estatuscliente" value="Ocacional">
                            <label class="form-check-label" for="exampleRadios2">
                                Ocacional
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="estatuscliente" id="estatuscliente" value="Prospecto">
                            <label class="form-check-label" for="exampleRadios2">
                                Prospecto
                            </label>
                        </div>
                    </div>

                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>

            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {

        $("#buscar").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: "{{route('searchcontacto')}}",
                    type: "POST",
                    data: {
                        term: request.term,
                        _token: $("input[name=_token]").val()
                    },
                    dataType: "json",
                    success: function(data) {
                        var resp = $.map(data, function(obj) {
                            return obj.contacto1;
                        });

                        response(resp);
                    }
                });
            },
            minLength: 1
        });

        $("#contacto_id").select2();

    });
</script>
<script>
    $(document).ready(function() {
        $("#estado").on('change', function() {
            var estadoId = this.value;
            $("#municipio").html('');
            $.ajax({
                url: "{{ route('getMunicipios') }}?estado_id="+estadoId,
                type: 'get',
                success: function(res) {
                    $("#municipio").html('<option value="">Selecciona una opcion</option>');
                    $.each(res, function(key, value) {
                        $("#municipio").append('<option value="' + value
                            .id + '">' + value.nombre + '</option>');
                    });
                }
            })
        })
        $("#estado").select2({
            theme: "classic"
        });
    })
</script>