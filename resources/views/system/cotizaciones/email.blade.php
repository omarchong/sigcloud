<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>

<body>
    <div class="card-body">
        <h5 class="card-text"><b>Nombre del proyecto: </b>{{$cotizaciones->nombre_proyecto}}</h5>
        <h5 class="card-text"><b>Fecha estimada de entrega: </b>{{$cotizaciones->fecha_estimadaentrega}}</h5>
        <h5 class="card-text"><b>Descripción: </b> {!!$cotizaciones->descripcion_global!!}</h5>

    </div>
</body>

</html>