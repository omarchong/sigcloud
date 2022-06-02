 <!DOCTYPE html>
 <html lang="es">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <title>Cotización</title>

 </head>

 <style>
     * {
         padding: 0px;
         margin: 0px;
     }

     .contenedor {
         text-align: left;
         width: 100%;
         margin: auto;
     }

     .col2 {
         width: 85%;
         /* Este será el ancho que tendrá tu columna */
         background-color: #CCCCCC;
         /* Aquí pon el color del fondo que quieras para este lateral */
         float: right;
         /* Aquí determinas de lado quieres quede esta "columna" */
         height: 100%;
     }

     .col1 {
         width: 15%;
         height: 100%;
         float: left;
         /* ponemos un donde para que se vea bonito */
         background-color: #247;
     }

     .vertical-orientation {
         transform: rotate(-90deg);
         margin-left: 8px;
         margin-top: 150px;
         padding: 0px;
         opacity: 0.9;
         font-size: 2.5em;
         color: #FFF;
         font-family: 'Roboto', sans-serif;
     }

     .contenido {
         margin-top: 60px;
         margin-left: 90px;
     }

     h3 {
         color: #247;
         margin: 6px;
         font-family: 'Roboto', sans-serif;

     }

     .beneficio {
         color: #000;
         font-family: 'Roboto Light', sans-serif;
         margin-top: 30px;
         text-align: justify;
         margin-top: 30px;
         margin-left: 90px;
         margin-right: 90px;

     }

     .descripcion {
         margin-top: 40px;
         margin-left: 120px;
         color: #000;
         font-family: 'Roboto', sans-serif;
     }

     table,
     th,
     td {
         border: 1px solid black;
         border-collapse: collapse;
         margin-top: 40px;
         margin-left: auto;
         margin-right: auto;
         font-family: 'Roboto', sans-serif;

     }


     th,
     td {
         padding: 10px;

     }

     thead {
         background-color: #247;
         color: white;
         font-family: 'Roboto', sans-serif;

     }

     tbody {
         border-collapse: black 5px;

     }
 </style>

 <body>

     <div class="contenedor">
         <div class="col1">
             <h5 class="vertical-orientation">Inversión</h5>
         </div>


         <div class="col2">
             <div class="contenido">
                 <h3>Nombre del cliente: {{$cotizaciones->clientes->nombreempresa}}</h3>
                 <h3>Proyecto: {{$cotizaciones->nombre_proyecto}}</h3>
             </div>
             <h4 class="beneficio">Agradecemos su interés en colaborar con Diseño y Soluciones Web para la adquisicón de los materiales para
                 su infraestructura</h4>
             <div class="">
                 <h4 class="descripcion">Descripcion: {!!$cotizaciones->descripcion_global!!}</h4>

             </div>
             <div class="contenido2">
                 <table class="" id="detalle-servicios">
                     <thead class="">
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
                             <th colspan="2" class="">Total:</th>
                             <th>Total  </th>
                             <th>Total {{$detalle->precio_bruto}}</th>
                             <th>Total {{$detalle->precio_iva}}</th>
                             <th>Total {{$detalle->subtotal}}</th>
                         </tr>
                     </tfoot>
                 </table>
             </div>
         </div>

     </div>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
 </body>
 
 </html>