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

                    <div class="col-md-4 my-3">
                        <label for="exampleInputEmail1" class="form-label">Numero de servicios</label>
                        <div class="form-group">
                            <input type="number" class="form-control" id="numero_servicios" name="numero_servicios">

                        </div>

                    </div>

                    <div class="col-md-4 my-3">
                        <label for="exampleInputEmail1" class="form-label">Precio bruto</label>
                        <div class="form-group">
                            <input type="number" class="form-control" id="precio_bruto" name="precio_bruto">

                        </div>

                    </div>
                    <div class="col-md-4 my-3">
                        <label for="exampleInputEmail1" class="form-label">Ingrese el descuento</label>
                        <div class="form-group">
                            <input type="number" class="form-control" id="precio_inicial" name="precio_inicial">

                        </div>

                    </div>
                    <div class="col-md-4 my-3">
                        <label for="exampleInputEmail1" class="form-label">Precio iva</label>
                        <div class="form-group">
                            <input type="number" class="form-control" id="precio_inicial" name="precio_inicial">

                        </div>

                    </div>

                    <div class="col-md-4 my-3">
                        <label for="exampleInputEmail1" class="form-label">Total</label>
                        <div class="form-group">
                            <input type="number" class="form-control" id="total" name="total">

                        </div>

                    </div>
                    <div class="col-md-3 my-3">
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
                            <a class="btn btn-primary" href="#" role="button">+</a>
                        </div>

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

        /* const precio_inicial = 1000;
      const numero_servicios = 2;
      const total = precio_inicial * numero_servicios;
      const descuento =  total  * 0.50;
     const iva = descuento * 0.16;
     const subtotal = iva + descuento;
      console.log(subtotal); */

        function totalcotizacion()
        {
            const iva = 0.16
            const numero_servicios = $("#numero_servicios").val();
            const total = $("#total").val();
            const 
        }






    });
</script>