@include('layouts.admin')
<div class="main my-3">
    <div class="main-content">
        <div class="container-fluid col-md-10">
            <div class="row">
                <div class="col-md-5">
                    <div class="card">
                        <!-- {{ $usuarios['imagen'] }} -->
                        <div class="" style="background-color: #29C0FD;">

                            <img src="{{ asset('archivos/' . $usuarios['imagen']) }}"
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
                            Lista de notificaciones no leidas
                        </div>
                        <div class="card-body">
                            @forelse($usuarios->unreadNotifications as $notificacion)
                            <div class="alert alert-danger">
                               <b>Nombre:</b> {{ $notificacion->data['nombre'] }}
                                <p class="ml-3 float-right text-muted text-sm"> {{ $notificacion->created_at->diffForHumans() }}</p>
                                <hr>
                                <div class="text-right">
                                    <button type="button" class="mark-as-read btn btn-outline-dark" data-id="{{ $notificacion->id }}">Marcar como leida</button>
                                </div>
                                
                            </div>
                            {{-- @if($loop->last)
                            <a href="#" id="mark-all">Marcar todas como leidas</a>
                            @endif --}}
                            @empty
                                Sin notificaciones
                                <div class="dropdown-divider"></div>
                            @endforelse
                        </div>
                    </div>
                    {{-- Notificaciones leidas --}}
                    {{-- <div class="card my-3">
                        <div class="card-header text-white bg-success">
                            Lista de notificaciones leidas
                        </div>
                        <div class="card-body">

                            <div class="dropdown-divider"></div>

                            @forelse ($usuarios->readNotifications as $notificacion)
                            <div class="alert alert-info">
                                <b>Nombre de la tarea:</b> {{ $notificacion->data['nombre'] }}
                                <p class="ml-3 float-right text-muted text-sm">  {{ $notificacion->read_at->diffForHumans() }}</p>
                                
                            </div>
                            @empty
                                Sin notificaciones
                                <div class="dropdown-divider"></div>
                            @endforelse
                        </div>
                    </div> --}}
                    {{-- Fin de Notificaciones leidas --}}

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
            /* console.log(request); */
            
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

