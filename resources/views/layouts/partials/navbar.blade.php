<?php
$sessionusuario = session('sessionusuario');
$sessionid = session('sessionid');
?>
<div class="encabezado w-100">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <img class="mr-2" src="/img/logosigcloud.svg" alt="" width="200px">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto my-3">
                    <li class="nav-item active">
                        <img class="mr-2 my-2" src="/img/preguntas.svg" alt="" width="40px">
                    </li>

                    <div class="notificacion nav-link dropdown submenu">
                        <img src="/img/notificacion.svg" alt="" class="">
                        @if (count($notificacionusuario->unreadNotifications))
                            <span class="badge">{{ count($notificacionusuario->unreadNotifications) }}</span>
                        @endif
                        <div class="dropdown-menu children notificacion-link">


                            <span class="dropdown-item bg-danger" href="#" style="color: white;">Notificaciones no
                                leidas</span>

                            @forelse($notificacionusuario->unreadNotifications as $notificacion)
                                {{-- <i class="fas fa-envelope mr-2 mx-2"></i> {{$notificacion->data['nombre'];}} 
                                <p class="ml-3 float-right text-muted text-sm"> {{$notificacion->created_at->diffForHumans()}} </p>
                                <div class="text-right">
                                    <button type="button" class="mark-as-read btn btn-outline-dark" data-id="{{ $notificacion->id }}">Marcar como leida</button>
                                </div> --}}
                                {{-- @if ($loop->last)
                                <a href="#" id="mark-all">Marcar todas como leidas</a>
                                @endif --}}
                                <li class=""><i class="fas fa-envelope mr-2 mx-2"></i>
                                    {{ $notificacion->data['nombre'] }}
                                    <span class="ml-3 float-right text-muted text-sm">
                                        {{ $notificacion->created_at->diffForHumans() }} </span>
                                    <span href="#" type="button"
                                        class="mark-as-read dropdown-item float-right text-right"
                                        data-id="{{ $notificacion->id }}" style="color: blue"> Marcar como
                                        leida</span>
                                </li>
                            @empty
                                Sin notificaciones
                            @endforelse
                            <div class="dropdown-divider"></div>
                            {{-- Notificaciones leidas --}}
                            {{-- <span class="dropdown-item bg-info" href="#" style="color: white;">Notificaciones leidas</span>
                          <div class="mx-2 my-2">
                            @forelse ($notificacionusuario->readNotifications as $notificacion)
                            <li class="my-2"><i class="fas fa-envelope-open"></i> {{$notificacion->data['nombre'];}} 
                                <span class="ml-2 float-right text-muted text-sm"> {{$notificacion->read_at->diffForHumans()}}</span>
                            </li>
                                @empty
                                    Sin notificaciones leidas
                            @endforelse
                            
                          </div>
                            <div class="dropdown-divider"></div> --}}
                            {{-- fin de Notificaciones leidas --}}

                        </div>
                    </div>
                    <li class="nav-item">
                        <img class="mr-2 my-2" src="/img/apps.svg" alt="" width="40px">
                    </li>
                    <li class="nav-item">
                        <img class="mr-2 my-2 rounded-circle mx-auto d-block"
                            src="{{ asset('archivos/' . $notificacionusuario['imagen']) }}" alt=""
                            width="40px">
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled"> <b>Bienvenido <?php echo $sessionusuario; ?></b></a>
                        <a class="mx-2" href="/usuarios/<?php echo $sessionid; ?>">Ver perfil</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section>
    </section>
</div>

<script>
    function sendMarkRequest(id = null) {
        return $.ajax("{{ route('markNotification') }}", {
            method: 'POST',
            data: {
                _token: "{{ csrf_token() }}",
                id
            }
        });
    }

    $(function() {
        $('.mark-as-read').click(function() {
            let request = sendMarkRequest($(this).data('id'));
            /* console.log(request); */

            request.done(() => {
                $(this).parents('div.alert').remove();
            });
        });
        /* $('#mark-all').click(function(){
            let request = sendMarkRequest();
            
            request.done(() => {
                $('div.alert').remove();
            })
        }); */
    });
</script>
