 <!DOCTYPE html>
 <html lang="es">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <title>Cotización</title>

 </head>
 <style type="text/css">
     h1 {
         color: blue
     }

     table.colapsado {
         border-collapse: collapse;
     }
 </style>


 <body>
     <div class="contenido">

         <img class="" src="" alt="" width="200px">

         <table class="colapsado" border="1">
             <thead>
                 <tr>
                     <th>Descripcion</th>
                     <th>Fecha</th>
                     <th>Cliente</th>

                 </tr>
             </thead>
             <tbody>
                 @foreach($detallecotizacion as $detalle)
                 <tr>
                     <td> {!!$detalle->descripcion!!}</td>
                     <td>{{$detalle->fecha_estimadaentrega}}</td>
                     <td>{{$detalle->clientes_id}}</td>



                 </tr>

                 @endforeach
             </tbody>
         </table>

         <h1>Te recordamos que la cotizacion tiene una vigencia de 30 dias despues de haberla generado</h1>

     </div>


 </body>

 </html>