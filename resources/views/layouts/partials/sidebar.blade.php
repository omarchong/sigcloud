<nav class="sidebar close toggle">
    <div class="menu-bar">
        <ul class="menu-links">
            <li class="nav-link">
                <a href="{{ route('home') }}">
                    <img class="mr-2" src="/img/menu.svg" alt="" width="35px">
                </a>
            </li>

            <li class="nav-link">
                <a href="{{ route('home') }}">
                    <img class="mr-2" src="/img/dashboard.svg" alt="" width="35px">
                    <span class="text nav-text"> Dashboard</span>
                </a>
            </li>


            <li class="nav-link">
                <a href="{{ route('contactos.index') }}">
                    <img class="mr-2" src="/img/usuario.svg" alt="" width="35px">
                    <span class="text nav-text"> Contactos</span>
                </a>
            </li>
            <li class="nav-link">
                <a href="{{ route('usuarios.index') }}">
                    <img class="mr-2" src="/img/usuario.svg" alt="" width="35px">
                    <span class="text nav-text"> Usuarios</span>
                </a>
            </li>
            <li class="nav-link">
                <a href="{{ route('clientes.index') }}">
                    <img class="mr-2" src="/img/usuario.svg" alt="" width="35px">
                    <span class="text nav-text"> Clientes</span>
                </a>
            </li>
            <li class="nav-link">
                <a href="{{route('departamentos.index')}}">
                    <img class="mr-2" src="/img/usuario.svg" alt="" width="35px">
                    <span class="text nav-text"> Departamentos</span>
                </a>
            </li>
            <li class="nav-link">
                <a href="{{route('cotizaciones.index')}}">
                    <img class="mr-2" src="/img/documento.svg" alt="" width="35px">
                    <span class="text nav-text"> Cotizaciones</span>
                </a>
            </li>
            <li class="nav-link">
                <a href="{{route('servicios.index')}}">
                    <img class="mr-2" src="/img/usuario.svg" alt="" width="35px">
                    <span class="text nav-text"> Servicios</span>
                </a>
            </li>

            <li class="nav-link">
                <a href="{{ route('actividades.index') }}">
                    <img class="mr-2" src="/img/usuario.svg" alt="" width="35px">
                    <span class="text nav-text"> Actividad</span>
                </a>
            </li>

            <li class="nav-link">
                <a href="{{ route('tareas.index') }}">
                    <img class="mr-2" src="/img/documento.svg" alt="" width="35px">
                    <span class="text nav-text"> Tarea</span>
                </a>
            </li>

            <li class="nav-link">
                <a href="{{ route('citas.index') }}">
                    <img class="mr-2" src="/img/documento.svg" alt="" width="35px">
                    <span class="text nav-text"> Citas</span>
                </a>
            </li>

            <li class="nav-link">
                <a href="{{ route('seguimientofacturas.index') }}">
                    <img class="mr-2" src="/img/documento.svg" alt="" width="35px">
                    <span class="text nav-text"> Seg. Facturas</span>
                </a>
            </li>

            <li class="nav-link">
                <a href="#">
                    <img class="mr-2" src="/img/facturacion.svg" alt="" width="35px">
                    <span class="text nav-text">
                        <h6 class="text-right">Facturación</h6>
                    </span>
                </a>
            </li>

            <li class="nav-link">
                <a href="#">
                    <img class="mr-2" src="/img/reloj.svg" alt="" width="35px">
                    <span class="text nav-text"> Agenda</span>
                </a>
            </li>

            <li class="nav-link">
                <a class="sidebar-link" data-toggle="collapse" href="#collapseExample" role="button"
                    aria-expanded="false" aria-controls="collapseExample">
                    <img class="mr-2" src="/img/reloj.svg" alt="" width="35px">
                    <span class="text nav-text"> Estatus</span>
                </a>
            </li>
              <div class="collapse" id="collapseExample">
                <div>
                    <a href="{{ route('estatucitas.index') }}" class="px-5">
                        <span class="text nav-text">Estatu citas</span>
                    </a>
                    <a href="{{route('estatucotizacions.index')}}" class="px-5">
                        <span class="text nav-text">Estatu cotizacion</span>
                    </a>
                    <a href="{{ route('estatufacturas.index') }}" class="px-5">
                        <span class="text nav-text">Estatu facturas</span>
                    </a>
                    <a href="{{ route('estatuordens.index') }}" class="px-5">
                        <span class="text nav-text">Estatu orden</span>
                    </a>
                    <a href="{{ route('estatuproyectos.index') }}" class="px-5">
                        <span class="text nav-text">Estatu proyectos</span>
                    </a>
                    <a href="{{ route('estatutareas.index') }}" class="px-5">
                        <span class="text nav-text">Estatu tareas</span>
                    </a>
                    <a href="{{ route('tipoproyectos.index') }}" class="px-5">
                        <span class="text nav-text">Tipo proyecto</span>
                    </a>
                </div>
              </div>

            <li class="nav-link">
                <a href="#">
                    <img class="mr-2" src="/img/logout.svg" alt="" width="35px">
                    <span class="text nav-text">Cerrar sesión</span>
                </a>
            </li>
        </ul>
    </div>
    </div>
</nav>