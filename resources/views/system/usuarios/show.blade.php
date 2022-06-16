@include('layouts.admin')
<div class="main my-3">
    <div class="main-content">
        <div class="container-fluid col-md-10">


            <div class="row">

                <div class="col-md-5">

                    <div class="card">
                        <!-- {{ $usuarios['imagen'] }} -->
                        <div class="" style="background-color: #29C0FD;">

                            <img src="{{ asset('imagen/' . $usuarios['imagen']) }}"
                                class="rounded-circle mx-auto d-block  my-4" alt="..." width="120px" height="100px">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"> <strong>Nombre: </strong>{{ $usuarios->nombre }}
                                {{ $usuarios->app }} {{ $usuarios->apm }}</h5>
                            <h5 class="card-title"><strong>Usuario: </strong> {{ $usuarios->usuario }}</h5>
                            <h5 class="card-title"><strong>Email:</strong> {{ $usuarios->email }}</h5>
                            <h5 class="card-title"><strong>Telefono:</strong> {{ $usuarios->telefono }}</h5>
                            <h5 class="card-title"><strong>Estatus:</strong> {{ $usuarios->estatus }}</h5>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Last updated 3 mins ago</small>
                        </div>
                    </div>
                </div>

                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header text-white" style="background-color: #0B6FED">
                            Departamento
                        </div>
                        <div class="card-body">
                            <!-- <h5 class="card-title">Departamento: </h5> -->
                            @foreach ($departamentos as $departamento)
                                <li><strong>Abreviatura:</strong> {{ $departamento->abreviatura }} </li>
                                <li><strong>Nombre:</strong> {{ $departamento->nombre }} </li>
                                <li><strong>Estatus:</strong> {{ $departamento->estatus }}
                                </li>
                            @endforeach

                        </div>
                    </div>
                    <div class="card my-3">
                        <div class="card-header text-white bg-danger">
                            Lista de tareas no leidas
                        </div>
                        <div class="card-body">
                            <!--   <h5 class="card-title">Nombre:</h5> -->
                            {{-- @foreach ($tareas as $tarea)
                            <li><strong>Actividad: </strong>{{$tarea->nombre}}</li>
                            @endforeach
                            <li><strong>noti: </strong>{{count($usuarios->unreadNotifications);}}
                            </li> --}}
                            <div class="dropdown-divider"></div>
                            <?php
                            $sessionusuario = session('sessionusuario');
                            $sessionid = session('sessionid');
                            ?>
                            
                            @forelse($usuarios->unreadNotifications as $notificacion)
                                <li><strong>Nombre: </strong>{{ $notificacion->data['nombre'] }}
                                    {{ $notificacion->created_at->diffForHumans() }}
                                    <button type="submit" class="mark-as-read btn btn-sm btn-dark"
                                        data-id="{{ $notificacion->id }}">Marcar como leido</button>
                                </li>
                            @if($loop->last)
                            <a href="#" id="mark-all">Marcar all as read</a>
                            @endif

                            @empty
                                Sin notificaciones
                                <div class="dropdown-divider"></div>
                            @endforelse



                        </div>
                    </div>
                    <div class="card my-3">
                        <div class="card-header text-white bg-success">
                            Lista de tareas leidas
                        </div>
                        <div class="card-body">

                            <div class="dropdown-divider"></div>
                            @forelse ($usuarios->readNotifications as $notificacion)
                                <li><strong>Nombre: </strong> {{ $notificacion->data['nombre'] }}
                                    {{ $notificacion->read_at->diffForHumans() }}
                                </li>
                            @empty
                                Sin notificaciones leidas
                            @endforelse
                            <div class="dropdown-divider"></div>



                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


<script>
    function sendMarkRequest(id = null){
        return $.ajax("{{ route('markNotification') }}", {
            method: 'POST',
            data: {
                _token: "{{ csrf_token() }}",
                id
            }
        });
    }

    $(function(){
        $('.mark-as-read').click(function(){
            let request = sendMarkRequest($(this).data('id'));
            console.log(request);
            
            request.done(() => {
                $(this).parents('div.alert').remove();
            });
        });
        $('#mark-all').click(function(){
            let request = sendMarkRequest();
            
            request.done(() => {
                $('div.alert').remove();
            })
        });
    });
</script>

