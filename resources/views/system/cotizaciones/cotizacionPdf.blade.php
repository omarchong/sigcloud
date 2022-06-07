<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demostracion de cotizacion</title>

</head>
<style>
  
    .principal {
        margin: 0px;
        padding: 0px;
    }

    .contenedor1 {
        background-color: #247;
        width: 15%;
        height: auto;
        float: left;
    }

    .texto-vertical {
        transform: rotate(-90deg);
        margin-left: 8px;
        margin-top: 150px;
        padding: 0px;
        opacity: 0.9;
        font-size: 2.5em;
        color: #FFF;
        font-family: 'Roboto', sans-serif;
    }

    .contenedor2 {
        width: 85%;
        background-color: #CCCCCC;
        float: right;
        height: 100%;
    }

    .datos-principales {
        margin-top: 60px;
        margin-left: 90px;
    }

    .datos-proyecto {
        font-family: 'Kdam Thmor Pro', sans-serif;
        color: #247;
    }

    .agradecimiento {
        font-family: 'Roboto', sans-serif;
        font-size: larger;
        color: #1c1c1c;
    }

    .descripcion-global {
        margin-top: 25px;
        margin-left: 95px;
        font-family: 'Roboto', sans-serif;
        color: #1c1c1c;
    }
     table{
         margin-top: 50px;
         margin-left: auto;
         margin-right: auto;
         border-collapse: collapse;
        font-family: 'Roboto', sans-serif;

     }
     .encabezado{
         background-color: #247;
         color: white;
     }
     td, th{
         border: 2px solid black;
         padding-left:20px ;
         padding-right: 20px;
         padding-top: 10px;
         padding-bottom: 10px;
     }
</style>

<body>
    <section class="principal">
        <div class="contenedor1">
            <h5 class="texto-vertical">Inversión</h5>
        </div>
        <div class="contenedor2">
            <div class="datos-principales">
                <h3 class="datos-proyecto">Nombre del cliente: {{$cotizaciones->clientes->nombreempresa}}</h3>
                <p class="datos-proyecto">Descripcion: {{$cotizaciones->nombre_proyecto}}</p>
                <p class="agradecimiento">Agradecemos su interés en colaborar con Diseño y Soluciones Web para la adquisicón de los materiales para
                    su infraestructura:</p>
            </div>
            <div class="descripcion">
                <p class="descripcion-global">
                    {!!$cotizaciones->descripcion_global!!}
                </p>

            </div>
            <div class="contenido2">
                <table id="detalle-servicios">
                    <thead class="encabezado">
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
                        <?php
                        $numservicios = 0;
                        $preciobruto = 0;
                        $precioiva = 0;
                        $precioiva = 0;
                        $subtotal = 0;

                        ?>

                        @foreach ($consulta as $detalle)
                        <tr>
                            <td>{{$detalle->nombre}}</td>
                            <td>{{$detalle->descripcion}} </td>
                            <td>{{$detalle->numero_servicios}}</td>
                            <td>{{$detalle->precio_bruto}}</td>
                            <td>{{$detalle->precio_iva}}</td>
                            <td> {{$detalle->subtotal}}</td>
                        </tr>
                        <?php
                        $numservicios += $detalle->numero_servicios;
                        $preciobruto += $detalle->precio_bruto;
                        $precioiva += $detalle->precio_iva;
                        $subtotal += $detalle->subtotal;
                        ?>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="2" class="">Total:</th>
                            <th># <?php echo ($numservicios) ?> </th>
                            <th>$ <?php echo ($preciobruto) ?></th>
                            <th>$ <?php echo ($precioiva) ?></th>
                            <th>$ <?php echo ($subtotal) ?></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </section>
</body>

</html>