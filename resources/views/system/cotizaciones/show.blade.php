@include('layouts.admin')
<div class="container mt-5">
    <div class="table-responsive">
        <table class="table table-bordered border-dark">
            <thead class="text-white" style="background-color: #232f3e">
                <tr>
                    <th>Clave</th>
                    <th>Servicio</th>
                    <th>Cantidad</th>
                    <th>Precio bruto</th>
                </tr>
            </thead>
            <tbody>
                @foreach($consulta as $detalle)
                <tr>
                    <td>{{$detalle->cotizacion_id}}</td>
                    <td>{{$detalle->nombre}}</td>
                    <td>{{$detalle->numero_servicios}}</td>
                    <td>{{$detalle->precio_bruto}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>