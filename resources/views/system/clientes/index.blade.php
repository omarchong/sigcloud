<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container my-5 col-md-8">
        <div class="card">
            <div class="card-header">
                Gestion de clientes
            </div>
            <div class="panel-body">
                <button type="button" href="{{ route('clientes.create') }}" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    <i class="fas fa-plus"></i> Agregar Cliente
                </button>


                <a href="{{ route('clientes.create') }}" class="btn  btn-success"><i class="fas fa-plus"></i> Agregar Cliente</a>
            </div>
            <div class="card-body">
                <table class="table table-striped  mt-3 responsive" id="clientes">
                    <thead class="thead-inverse bg-primary responsive">
                        <tr>
                            <th scope="col">Clave</th>
                            <th scope="col">Tipo de cliente</th>
                            <th scope="col">Contacto</th>
                            <th scope="col">Contacto</th>
                            <th scope="col">Contacto</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($clientes as $cliente)
                        <tr>
                            <td scope="col">{{$cliente->id}}</td>
                            <td scope="col">{{$cliente->tipocliente}}</td>
                            <td scope="col">{{$cliente->nombreempresa}}</td>
                            <td scope="col">{{$cliente->estado}}</td>
                            <td scope="col">{{$cliente->municipio}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header col-md-10">

                        </div>
                        <div class="modal-body">
                            <div class="card">
                                <h5 class="card-header">Alta clientes</h5>
                                <div class="card-body">
                                    <form>
                                        <div class="form-row">

                                            <div class="col-md-8">
                                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                                <div class="form-group">
                                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1" class="form-label">Password</label>
                                                    <input type="password" class="form-control" id="exampleInputPassword1">
                                                </div>

                                            </div>
                                            <div class="mb-3 form-check">
                                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>

</html>
