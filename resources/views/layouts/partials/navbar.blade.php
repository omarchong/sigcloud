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
                        <img class="mr-2" src="/img/preguntas.svg" alt="" width="40px">
                    </li>

                    <div class="notificacion nav-link dropdown submenu">
                        <img src="/img/notificacion.svg" alt="" class="">
                        <span class="badge">{{-- {{count($notificacionusuario->unreadNotifications)}} --}}</span>
                        {{-- <div class="dropdown-menu children">
                          <span class="dropdown-item bg-danger" href="#" style="color: white;">Notificaciones no leidas</span>
                              @forelse($notificacionusuario->unreadNotifications as $notificacion)
                             
                              <li class="""><i class="fas fa-envelope mr-2 mx-2"></i> {{$notificacion->data['nombre'];}} 
                                <span class="ml-3 float-right text-muted text-sm"> {{$notificacion->created_at->diffForHumans()}} </span>
                                <a href="#" class="dropdown-item  text-center" style="color: blue"> Marcar como leida</a> 
                              </li>
                              @empty
                                      Sin notificaciones
                              @endforelse
                            <div class="dropdown-divider"></div>
                          <span class="dropdown-item bg-success" href="#" style="color: white;">Notificaciones leidas</span>
                          <div class="mx-2 my-2">
                            @forelse ($notificacionusuario->readNotifications as $notificacion)
                            <li><i class="fas fa-envelope-open"></i> {{$notificacion->data['nombre'];}} <span class="ml-2 pull-right text-muted text-sm"> {{$notificacion->read_at->diffForHumans()}}</span>
                            </li>
                                @empty
                                    Sin notificaciones leidas
                            @endforelse

                            
                            
                          </div>
                            <div class="dropdown-divider"></div>
                        </div> --}}
                    </div>
                    <li class="nav-item">
                        <img class="mr-2" src="/img/apps.svg" alt="" width="40px">
                    </li>
                    <li class="nav-item">
                        <img class="mr-2" src="/img/omar.png" alt="" width="40px">
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled"> <b>Bienvenido <?php echo $sessionusuario; ?></b><br> Ver perfil</a>
                    </li>


                </ul>

            </div>

        </div>

    </nav>

    <section>

    </section>
</div>


