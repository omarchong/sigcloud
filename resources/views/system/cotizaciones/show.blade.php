@include('layouts.admin')

<div class="container mt-5">

    <!-- {{now()}} -->
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header text-white" style="background-color: #0B6FED;">
                    Datos generales del cliente
                </div>
                <div class="card-body">

                    <h5 class=""><b>Contacto: </b>{{$cotizaciones->clientes->contactos->contacto1}}</h5>
                    <h5 class=""><b>Teléfono: </b>{{$cotizaciones->clientes->contactos->telefono1}}</h5>
                    <h5 class=""><b>Correo electrónico: </b>{{$cotizaciones->clientes->contactos->email1}}</h5>
                </div>
            </div>
        </div>
        <div class="col-sm-6">

            <div class="card">
                <div class="card-header text-white" style="background-color: #0B6FED;">
                    Datos de la organización
                </div>
                <div class="card-body">
                    <h5><b>Empresa: </b>{{$cotizaciones->clientes->nombreempresa}} </h5>
                    <h5><b>RFC: </b> {{$cotizaciones->clientes->rfc}} </h5>
                    <h5><b>Giro empresarial: </b> {{$cotizaciones->clientes->giros->nombre}} </h5>

                </div>
            </div>
        </div>
    </div>



    <div class="card my-3">
        <div class="card-header text-white" style="background-color: #60C8C9;">
            Detalles de la cotización
        </div>
        <div class="card-body">
            <h5 class="card-text"><b>Nombre del proyecto: </b>{{$cotizaciones->nombre_proyecto}}</h5>
            <h5 class="card-text"><b>Fecha estimada de entrega: </b>{{ date('d - m - Y', strtotime($cotizaciones->fecha_estimadaentrega))}}</h5>
            <h5 class="card-text"><b>Descripción: </b> {!!$cotizaciones->descripcion_global!!}</h5>

        </div>
    </div>
    <div class="alert alert-primary" role="alert">
        <h5 class="text-center"><b>Desglose de costos</b> </h5>
    </div>
    <div class="table-responsive">

        <table class="table table-bordered border-dark" id="detalle-servicios">
            <thead class="text-white" style="background-color: #062F61">
                <tr>
                    <th>Servicio</th>
                    <th>Descripcion</th>
                    <th>Cantidad</th>
                    <th>Precio bruto</th>
                    <th>Precio iva</th>
                    <th>Subtotal</th>


                </tr>
            </thead>
            <tbody>
                @foreach($consulta as $detalle)
                <tr>
                    <td>{{$detalle->nombre}}</td>
                    <td>{{$detalle->descripcion}}</td>
                    <td>{{$detalle->numero_servicios}}</td>
                    <td>{{$detalle->precio_bruto}}</td>
                    <td>{{$detalle->precio_iva}}</td>
                    <td> {{$detalle->subtotal}}</td>

                </tr>

                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="2" class="text-right">Total:</th>
                    <th>Total</th>
                    <th>Total</th>
                    <th>Total</th>
                    <th>Total</th>

                </tr>
            </tfoot>
        </table>
        <p> <b>Precios expresados en Moneda Nacional.
                Este documento tiene una vigencia de 8 días hábiles a partir de su expedición</b> </p>
    </div>
</div>
<script>
    $(document).ready(function() {
        var total0 = 0;
        var total1 = 0;
        var total2 = 0;
        var total3 = 0;
        $('#detalle-servicios tbody').find('tr').each(function(i, el) {
            total0 += parseFloat($(this).find('td').eq(2).text());
            total1 += parseFloat($(this).find('td').eq(3).text());
            total2 += parseFloat($(this).find('td').eq(4).text());
            total3 += parseFloat($(this).find('td').eq(5).text());
        });
        
        $('#detalle-servicios tfoot tr th').eq(1).text("# " + total0);
        $('#detalle-servicios tfoot tr th').eq(2).text("$ " + total1);
        $('#detalle-servicios tfoot tr th').eq(3).text("$ " + total2);
        $('#detalle-servicios tfoot tr th').eq(4).text("$ " + total3);

    });
</script>