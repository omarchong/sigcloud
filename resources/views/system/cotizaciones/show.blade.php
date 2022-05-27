@include('layouts.admin')

<div class="container mt-5">

    {{now()}}
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center"><b class="text-primary">Datos generales del cliente</b></h5>
                    <h5 class=""><b>Contacto: </b>{{$cotizaciones->clientes->contactos->contacto1}}</h5>
                    <h5 class=""><b>Teléfono: </b>{{$cotizaciones->clientes->contactos->telefono1}}</h5>
                    <h5 class=""><b>Correo electrónico: </b>{{$cotizaciones->clientes->contactos->email1}}</h5>

                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center"><b class="text-primary">Datos de la organización</b></h5>

                    <h5><b>Empresa: </b>{{$cotizaciones->clientes->nombreempresa}} </h5>
                    <h5><b>RFC: </b> {{$cotizaciones->clientes->rfc}} </h5>
                    <h5><b>Giro empresarial: </b> {{$cotizaciones->clientes->giros->nombre}} </h5>

                </div>
            </div>
        </div>
    </div>

    <div class="alert alert-primary my-3 text-center" role="alert">
        Detalle de cotizacion
    </div>
    Fecha estimada de entrega: {{$cotizaciones->fecha_estimadaentrega}}
    <div class="table-responsive">
        <table class="table table-bordered border-dark" id="detalle-servicios">
            <thead class="text-white" style="background-color: #232f3e">
                <tr>
                    <th>Clave</th>
                    <th>Descripcion</th>
                    <th>Servicio</th>
                    <th>Cantidad</th>
                    <th>Precio bruto</th>
                    <th>Precio iva</th>
                    <th>Subtotal</th>

                </tr>
            </thead>
            <tbody>
                @foreach($consulta as $detalle)
                <tr>
                    <td>{{$detalle->cotizacion_id}}</td>
                    <td>{{$detalle->descripcion}}</td>
                    <td>{{$detalle->nombre}}</td>
                    <td>{{$detalle->numero_servicios}}</td>
                    <td>{{$detalle->precio_bruto}}</td>
                    <td>{{$detalle->precio_iva}}</td>
                    <td> {{$detalle->subtotal}}</td>

                </tr>

                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3" class="text-right">Total:</th>
                    <th>Total</th>
                    <th>Total</th>
                    <th>Total</th>
                    <th>Total</th>

                </tr>
            </tfoot>
        </table>
    </div>
</div>
<script>
    $(document).ready(function() {
        var total0 = 0;
        var total1 = 0;
        var total2 = 0;
        var total3 = 0;
        $('#detalle-servicios tbody').find('tr').each(function(i, el) {
            total0 += parseFloat($(this).find('td').eq(3).text());
            total1 += parseFloat($(this).find('td').eq(4).text());
            total2 += parseFloat($(this).find('td').eq(5).text());
            total3 += parseFloat($(this).find('td').eq(6).text());

        });
        $('#detalle-servicios tfoot tr th').eq(1).text("# " + total0);
        $('#detalle-servicios tfoot tr th').eq(2).text("$ " + total1);
        $('#detalle-servicios tfoot tr th').eq(3).text("$ " + total2);
        $('#detalle-servicios tfoot tr th').eq(4).text("$ " + total3);

    });
</script>