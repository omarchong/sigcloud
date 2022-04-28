@include('layouts.admin')
<div class="container my-5">
    <div class="card">
        <h5 class="card-header">Gestión de cotizaciones</h5>
        <div class="card-body">
            <form action="{{ route('clientes.store') }}" method="POST" id="clientes" class="needs-validation" novalidate>
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

                    <div class="col-md-4 my-3">
                        <label for="exampleInputEmail1" class="form-label">Servicio</label>
                        <div class="form-group">
                            <input type="text" readonly class="form-control" id="nombre" name="nombre" value="{{old('c')}}">

                        </div>

                    </div>
                    <div class="col-md-4 my-3">
                        <label for="exampleInputEmail1" class="form-label">Precio inicial</label>
                        <div class="form-group">
                            <input type="text" readonly class="form-control" id="precio_inicial" name="precio_inicial">

                        </div>

                    </div>
                    <div class="col-md-4 my-3">
                        <label for="exampleInputEmail1" class="form-label">Fecha estimada entrega</label>
                        <div class="form-group">
                            <input type="date" class="form-control" id="estatuscliente" name="estatuscliente">

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

                    <div class="col-md-3 my-3">
                        <label for="exampleInputEmail1" class="form-label">Numero de servicios</label>
                        <div class="form-group">
                            <input type="number" class="form-control" id="numero_servicios" name="numero_servicios">

                        </div>

                    </div>

                    <div class="col-md-3 my-3">
                        <label for="exampleInputEmail1" class="form-label">Precio bruto</label>
                        <div class="form-group">
                            <input type="number" readonly class="form-control" id="precio_bruto" name="precio_bruto">

                        </div>

                    </div>
                    <!--     <div class="col-md-4 my-3">
                        <label for="exampleInputEmail1" class="form-label">Ingrese el descuento</label>
                        <div class="form-group">
                            <input type="number" class="form-control" id="descuento_general" name="descuento_general">

                        </div>

                    </div> -->


                    <!--     <div class="col-md-4 my-3">
                        <label for="exampleInputEmail1" class="form-label">Total</label>
                        <div class="form-group">
                            <input type="number" readonly class="form-control" id="totald" name="total">

                        </div>

                    </div> -->

                    <div class="col-md-3 my-3">
                        <label for="exampleInputEmail1" class="form-label">Precio iva</label>
                        <div class="form-group">
                            <input type="number" readonly class="form-control" id="precio_iva" name="precio_iva">

                        </div>

                    </div>
                    <div class="col-md-2 my-3">
                        <label for="exampleInputEmail1" class="form-label">Estatus factura</label>
                        <div class="form-group">
                            <select class="form-control" name="estatucotizacion_id" id="estatucotizacion_id">
                                @foreach($estatuscotizaciones as $estatuscoti)
                                <option {{old('estatucotizacion_id') == $estatuscoti->id ? 'selected' : ''}}value="{{$estatuscoti->id}}">
                                    {{$estatuscoti->nombre}}
                                    @endforeach

                            </select>
                        </div>

                    </div>
                    <div class="col-md-1 my-3">
                        <label for="exampleInputEmail1" class="form-label">Agregar</label>
                        <div class="form-group">
                            <button type="button" class="btn btn-success" id="btn_add">Agregar</button>
                        </div>

                    </div>


                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="table-responsive">
                            <table id="detalles" class="table table-striped table-bordered condensed table-hover">
                                <thead class="table-success">
                                    <th>N.servicio</th>
                                    <th>Nombre servicio</th>
                                    <th>Cantidad</th>
                                    <th>Precio unitario</th>
                                    <th>IVA</th>
                                    <th>Total</th>
                                    <th>Opciones</th>

                                </thead>
                                <tfoot>
                                    <th colspan="5">Total</th>
                                    {{-- <th></th>
                                <th></th>
                                <th></th>
                                <th></th> --}}
                                    <th id="totalbruto">$</th>
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
                    $("#nombre").val(data.nombre ?? "Sin datos")
                    $("#precio_inicial").val(data.precio_inicial ?? "Sin datos")


                }
            })
        })
    });


    $(document).ready(function() {
        $("#numero_servicios").keyup(function() {
            var precio_inicial = $("#precio_inicial").val();
            var numero_servicios = $("#numero_servicios").val();
            var precio_bruto = precio_inicial * numero_servicios;
            $("#precio_bruto").val(precio_bruto);
        })
        $("#precio_iva").keyup(function() {
            var precio_bruto = $("#precio_bruto").val();
            var precio_iva = precio_bruto * .16;
            var totald = precio_iva + precio_bruto;
            $("#precio_iva").val(precio_iva);


        })



        /* agrega productos a tabla */
        $(document).ready(function() {
            $("#btn_add").click(function() {
                agregar();
            })
        })

        function agregar() {
            const id = $("#id").val();

            const nombre = $('#nombre').val();
            const numero_servicios = $("#numero_servicios").val();
            const precio_bruto = $("#precio_bruto").val();
            const precio_iva = $("#precio_iva").val();

            const total_servicios = Number(precio_iva) + parseFloat(precio_bruto);


            const fila = '<tr>' +
                '<td><input class="form-control" type="number" id="id" name="id[]" value="' + id + '" readonly></td>' +
                '<td><input class="form-control" type="text" id="nombre" name="nombre[]" value="' + nombre + '" readonly></td>' +
                '<td><input class="form-control" type="text" id="numero_servicios" name="numero_servicios[]" value="' + numero_servicios + '" readonly></td>' +
                '<td name="precio_bruto"><input class="form-control" type="text" id="precio_bruto" name="precio_bruto" value="' + precio_bruto + '" readonly></td>' +
                '<td><input class="form-control" type="text" id="precio_iva" name="precio_iva[]" value="' + precio_iva + '" readonly></td>' +
                '<td><input class="form-control" type="number" id="total_servicios" name="total_servicios[]" value="' + total_servicios + '" readonly></td>' +
                '<td><button type="button" class="btn btn-danger" onclick="eliminarCotizacion()">X</button></td>' +
                '</tr>';
            limpiar();

            $('#detalles').append(fila);
        }

        function eliminarServicio(id) {
            $("#id").remove()
        }

        function limpiar() {
            $("#numero_servicios").val("");
            $("#precio_iva").val("");
            $("#nombre").val("");
            $("#precio_inicial").val("");
        }


    })
</script>