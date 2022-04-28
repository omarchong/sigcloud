@include('layouts.admin')
<div class="container my-5">
    <div class="card">
        <h5 class="card-header">Gestión de cotizaciones</h5>
        <div class="card-body">
            <form action="{{ route('cotizaciones.store') }}" method="POST" id="cotizaciones" class="needs-validation" novalidate>
                @csrf
                <div class="form-row">

                    <div class="col-md-12">

                        <label for="">Buscar cliente(Nombre empresa)</label>
                        <div class="input-group">
                            <input type="search" name="nombre" id="buscarcliente" class="form-control" placeholder="Comx" aria-label="Search">
                            <span class="input-group-btn">
                                <button type="button" id="selectContact" class="btn btn-primary">
                                    Seleccionar
                                </button>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-3 my-3" hidden>
                        <label for="exampleInputEmail1" class="form-label">Clave</label>
                        <div class="form-group">
                            <input type="text" readonly class="form-control" id="clientes_id" name="clientes_id">

                        </div>

                    </div>
                    <div class="col-md-4 my-3">
                        <label for="exampleInputEmail1" class="form-label">RFC</label>
                        <div class="form-group">
                            <input type="text" readonly class="form-control" id="rfc" name="rfc" value="{{old('c')}}">
                        </div>
                    </div>
                    <div class="col-md-4 my-3">
                        <label for="exampleInputEmail1" class="form-label">Tipo de cliente</label>
                        <div class="form-group">
                            <input type="text" readonly class="form-control" id="tipocliente" name="tipocliente">
                        </div>

                    </div>
                    <div class="col-md-4 my-3">
                        <label for="exampleInputEmail1" class="form-label">Estatus</label>
                        <div class="form-group">
                            <input type="text" readonly class="form-control" id="estatuscliente" name="estatuscliente">

                        </div>

                    </div>

                    <div class="col-md-12">

                        <label for="">Buscar servicio(Nombre servicio)</label>
                        <div class="input-group">
                            <input type="search" name="nombre" id="buscarservicio" class="form-control" aria-label="Search">


                            <span class="input-group-btn">
                                <button type="button" id="selectServicio" class="btn btn-primary">
                                    Seleccionar
                                </button>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-3 my-3">
                        <label for="exampleInputEmail1" class="form-label">Clave</label>
                        <div class="form-group">
                            <input type="text" readonly class="form-control" id="servicios_id" name="servicios_id">

                        </div>

                    </div>
                    <div class="col-md-3 my-3">
                        <label for="exampleInputEmail1" class="form-label">Servicio</label>
                        <div class="form-group">
                            <input type="text" readonly class="form-control" id="nombre" name="nombre">
                        </div>
                    </div>
                    <div class="col-md-3 my-3">
                        <label for="exampleInputEmail1" class="form-label">Precio inicial</label>
                        <div class="form-group">
                            <input type="text" class="form-control" id="precio_inicial" name="precio_inicial">
                        </div>
                    </div>
                    <div class="col-md-3 my-3">
                        <label for="exampleInputEmail1" class="form-label">Cantidad</label>
                        <div class="form-group">
                            <input type="number" value="1" class="form-control" id="numero_servicios" name="numero_servicios">
                        </div>
                    </div>
                    <div class="col-md-5 my-3">
                        <label for="exampleInputEmail1" class="form-label">Fecha estimada entrega</label>
                        <div class="form-group">
                            <input type="date" class="form-control" id="fecha_estimadaentrega" name="fecha_estimadaentrega">
                        </div>
                    </div>
                    <div class="col-md-5 my-3">
                        <label for="exampleInputEmail1" class="form-label">Estatus cotización</label>
                        <div class="form-group">
                            <select class="form-control" name="estatucotizacion_id" id="estatucotizacion_id">
                                @foreach($estatuscotizaciones as $estatuscoti)
                                <option {{old('estatucotizacion_id') == $estatuscoti->id ? 'selected' : ''}}value="{{$estatuscoti->id}}">
                                    {{$estatuscoti->nombre}}
                                    @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2 my-3">
                        <label for="exampleInputEmail1" class="form-label">Agregar</label>
                        <div class="form-group">
                            <button type="button" class="btn btn-success" id="btn_add">Agregar</button>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="descripcion">Descripcion</label>
                        <div class="form-group">
                            <input type="hidden" required name="descripcion" id="descripcion" value="{{old('descripcion')}}">
                            <trix-editor input="descripcion"></trix-editor>
                        </div>
                        <div class="valid-feedback">
                            Correcto!
                        </div>
                        @error('descripcion')
                        <small class="text-danger"> {{ $message }} </small>
                        @enderror
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="table-responsive">
                            <table id="detalles" class="table table-striped table-bordered condensed table-hover">
                                <thead class="table-primary">
                                    <th>N.servicio</th>
                                    <th>Nombre servicio</th>
                                    <th>Precio inicial</th>
                                    <th>Cantidad</th>
                                    <th>Precio unitario</th>
                                    <th>IVA</th>
                                    <th>Total</th>
                                    <th>Opciones</th>
                                </thead>
                                <tfoot>
                                    <td colspan="4">Total</td>

                                    <td>
                                        <h4 id="total_b" name="total_b">$0.00</h4>
                                    </td>
                                    <td>
                                        <h4 id="total_i" name="total_i">$0.00</h4>
                                    </td>

                                    <td>
                                        <h4 id="total_t" name="total_t">$0.00</h4>
                                    </td>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                    <div class="container col-md-12" id="guardar">
                        <button type="submit" class="btn btn-primary float-right">Guardar</button>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@section('js')
<script src=""></script>
@endsection
<script>
    $(document).ready(function() {

        $("#buscarcliente").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: "{{route('buscacliente')}}",
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

        $("#buscarservicio").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: "{{route('buscaservicio')}}",
                    type: "POST",
                    data: {
                        term: request.term,
                        _token: $("input[name=_token").val()

                    },
                    dataType: 'json',
                    success: function(data) {
                        var resp = $.map(data, function(obj) {
                            return obj.nombre;
                            response(data);
                        });
                        response(resp);
                    }
                })
            },
            minLength: 1,
        })


        $("#selectContact").click(function() {
            const cliente = $('#buscarcliente').val()
            $.ajax({
                url: "{{route('seleccionacliente')}}",
                type: "POST",
                data: {
                    cliente: cliente,
                    _token: $("input[name=_token]").val()
                },
                success: function(data) {
                    $('#clientes_id').val(data.id ?? "Sin datos")
                    $("#rfc").val(data.rfc ?? "Sin datos")
                    $("#tipocliente").val(data.tipocliente ?? "Sin datos")
                    $("#estatuscliente").val(data.estatuscliente ?? "Sin datos")


                }
            })
        })

        $("#selectServicio").click(function() {
            const servicio = $('#buscarservicio').val()
            $.ajax({
                url: "{{route('seleccionaservicio')}}",
                type: "POST",
                data: {
                    servicio: servicio,
                    _token: $("input[name=_token]").val()
                },
                success: function(data) {
                    $("#servicios_id").val(data.id ?? "Sin datos")
                    $("#nombre").val(data.nombre ?? "Sin datos")
                    $("#precio_inicial").val(data.precio_inicial ?? "Sin datos")


                }
            })
        })
    });


    $(document).ready(function() {

        /* agrega servicios a tabla */
        $(document).ready(function() {
            $("#btn_add").click(function() {
                agregar();

            })
        })

        var cont = 0;
        total_b = 0;
        total_bruto = [];
        total_i = 0;
        total_iva = [];
        total_t = 0;
        total_total = [];

       

        function agregar() {

            const servicios_id = $("#servicios_id").val();
            const nombre = $('#nombre').val();
            const precio_inicial = $("#precio_inicial").val();
            const numero_servicios = $("#numero_servicios").val();
            const precio_bruto = Number(precio_inicial) * parseFloat(numero_servicios);
            const precio_iva = Number(precio_bruto) * .16;
            const subtotal = Number(precio_iva) + parseFloat(precio_bruto);

            total_bruto[cont] = Number(precio_bruto)
            total_b = total_b + total_bruto[cont];
            total_iva[cont] = Number(precio_iva)
            total_i = total_i + total_iva[cont];
            total_total[cont] = Number(subtotal)
            total_t = total_t + total_total[cont];

            const fila = `<tr id="fila"> 
                <td><input class="form-control" type="number" id="servicios_id" name="servicios_id[]" value="${servicios_id}" readonly></td>
                <td><input class="form-control" type="text" id="nombre" name="nombre[]" value="${nombre}" readonly></td>
                <td><input class="form-control" type="number" id="precio_inicial" name="precio_inicial[]" value="${precio_inicial}" readonly></td>
                <td><input class="form-control" type="number" id="numero_servicios" name="numero_servicios[]" value="${numero_servicios}" readonly></td>
                <td><input class="form-control" type="text" id="precio_bruto" name="precio_bruto[]" value="${precio_bruto}" readonly></td>
                <td><input class="form-control" type="text" id="precio_iva" name="precio_iva[]" value="${precio_iva}" readonly></td>
                <td><input class="form-control" type="number" id="subtotal" name="subtotal[]" value="${subtotal}" readonly></td> 
                <td><button type="button" class="btn btn-danger delete" value="Eliminar">X</button></td>
                </tr>; `
            cont++;
            $("#total_b").html("$" + total_b);
            $("#total_i").html("$" + total_i);
            $("#total_t").html("$" + total_t);
            limpiar();
            $('#detalles').append(fila);
        }

        $(document).on('click', '.delete', function(event) {
            event.preventDefault();
            $(this).closest('tr').remove();
        });

        function limpiar() {
            /*   $("#servicios_id").val(""); */
            /*  $("#numero_servicios").val(""); */
            $("#nombre").val("");
            $("#precio_inicial").val("");
            $("#buscarservicio").val("");
        }
    })
</script>