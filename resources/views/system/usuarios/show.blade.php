@include('layouts.admin')
<div class="main my-3">
    <div class="main-content">
        <div class="container-fluid col-md-10">


            <div class="card-deck">
                <div class="row">
                <div class="card">
                    <!-- {{$usuarios['imagen']}} -->
                    <div class="" style="background-color: #5BA7E7;">

                        <img src="{{asset('imagen/'. $usuarios['imagen'])}}" class="rounded-circle mx-auto d-block  my-4" alt="..." width="120px" height="100px">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Nombre: {{$usuarios->nombre}} {{$usuarios->app}} {{$usuarios->apm}}</h5>
                        <h5 class="card-title">Usuario: {{$usuarios->usuario}}</h5>
                        <h5 class="card-title">Estatus: {{$usuarios->estatus}}</h5>
                        <h5 class="card-title">Estatus: {{$usuarios->email}}</h5>
                        <h5 class="card-title">Estatus: {{$usuarios->telefono}}</h5>
                        <h5 class="card-title">Departamento:{{$usuarios->departamento}}</h5>




                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Last updated 3 mins ago</small>
                    </div>
                </div>
        

                </div>
                


            </div>
        </div>

    </div>
</div>