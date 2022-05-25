<nav class="sidebar close toggle">
    <div class="menu-bar">
        <ul class="menu-links">
            <li class="nav-link">
                <a href="{{ route('home') }}">
                    <img class="mr-2" src="/img/menu.svg" alt="" width="30px">
                </a>
            </li>

            <li class="nav-link">
                <a href="{{ route('home') }}">
                    <img class="mr-2" src="/img/dashboard.svg" alt="" width="30px">
                    <span class="text nav-text"> Dashboard</span>
                </a>
            </li>

            <li class="nav-link">
                <a href="{{ route('contactos.index') }}">
                    <img class="mr-2" src="/img/usuario.svg" alt="" width="30px">
                    <span class="text nav-text"> Contactos</span>
                </a>
            </li>
            <li class="nav-link">
                <a href="{{ route('usuarios.index') }}">
                    <img class="mr-2" src="/img/usuario.svg" alt="" width="30px">
                    <span class="text nav-text"> Usuarios</span>
                </a>
            </li>
            <li class="nav-link">
                <a href="{{ route('clientes.index') }}">
                    <img class="mr-2" src="/img/usuario.svg" alt="" width="30px">
                    <span class="text nav-text"> Clientes</span>
                </a>
            </li>
            <li class="nav-link">
                <a href="{{ route('departamentos.index') }}">
                    <img class="mr-2" src="/img/usuario.svg" alt="" width="30px">
                    <span class="text nav-text"> Departamentos</span>
                </a>
            </li>
            <li class="nav-link">
                <a href="{{ route('cotizaciones.index') }}">
                    <img class="mr-2" src="/img/documento.svg" alt="" width="30px">
                    <span class="text nav-text"> Cotizaciones</span>
                </a>
            </li>
            <li class="nav-link">
                <a href="{{ route('servicios.index') }}">
                    <img class="mr-2" src="/img/usuario.svg" alt="" width="30px">
                    <span class="text nav-text"> Servicios</span>
                </a>
            </li>

            <li class="nav-link">
                <a href="{{ route('actividades.index') }}">
                    <img class="mr-2" src="/img/usuario.svg" alt="" width="30px">
                    <span class="text nav-text"> Actividad</span>
                </a>
            </li>

            <li class="nav-link">
                <a href="{{ route('tareas.index') }}">
                    <img class="mr-2" src="/img/documento.svg" alt="" width="30px">
                    <span class="text nav-text"> Tarea</span>
                </a>
            </li>

            <li class="nav-link">
                <a href="{{ route('citas.index') }}">
                    <img class="mr-2" src="/img/documento.svg" alt="" width="30px">
                    <span class="text nav-text"> Citas</span>
                </a>
            </li>

            <li class="nav-link">
                <a href="{{ route('orden.index') }}">
                    <img class="mr-2" src="/img/documento.svg" alt="" width="30px">
                    <span class="text nav-text"> Orden</span>
                </a>
            </li>

            <li class="nav-link">
                <a href="{{ route('seguimientofacturas.index') }}">
                    <img class="mr-2" src="/img/documento.svg" alt="" width="30px">
                    <span class="text nav-text"> Seg. Facturas</span>
                </a>
            </li>

            <li class="nav-link">
                <a href="#">
                    <img class="mr-2" src="/img/facturacion.svg" alt="" width="30px">
                    <span class="text nav-text">
                        <h6 class="text-right">Facturación</h6>
                    </span>
                </a>
            </li>

            <li class="nav-link">
                <a href="#">
                    <img class="mr-2" src="/img/reloj.svg" alt="" width="30px">
                    <span class="text nav-text"> Agenda</span>
                </a>
            </li>

            {{-- <li class="submenu nav-link">
                <a href="#"><img class="mr-2" src="/img/reloj.svg" alt="" width="30px"> <span class="icon-rocket"></span>Proyectos<span
                        class="caret icon-arrow-down6"></span></a>
                <ul class="children">
                    <li><a href="#">SubElemento #1 <span class="icon-dot"></span></a></li>
                    <li><a href="#">SubElemento #2 <span class="icon-dot"></span></a></li>
                    <li><a href="#">SubElemento #3 <span class="icon-dot"></span></a></li>
                </ul>
            </li> --}}

            <li class="submenu nav-link">
                <a href="#">
                    <img class="mr-2" src="/img/reloj.svg" alt="" width="30px">
                    <span class="text nav-text"> Estatus</span>
                </a>
                <ul class="children">
                    <li><a href="{{ route('estatucitas.index') }}">
                            <span class="text">Estatu citas</span>
                        </a></li>
                    <li><a href="{{ route('estatucotizacions.index') }}">
                            <span class="text">Estatu cotizacion</span>
                        </a></li>
                    <li><a href="{{ route('estatufacturas.index') }}">
                            <span class="text">Estatu facturas</span>
                        </a></li>
                    <li><a href="{{ route('estatuordens.index') }}">
                            <span class="text">Estatu orden</span>
                        </a></li>
                    <li><a href="{{ route('estatuproyectos.index') }}">
                            <span class="text">Estatu proyectos</span>
                        </a></li>
                    <li><a href="{{ route('estatutareas.index') }}">
                            <span class="text">Estatu tareas</span>
                        </a></li>
                    <li><a href="{{ route('tipoproyectos.index') }}">
                            <span class="text">Tipo proyecto </span>
                        </a></li>
                </ul>
            </li>
            
            <li class="nav-link">
                <a href="#">
                    <img class="mr-2" src="/img/logout.svg" alt="" width="30px">
                    <span class="text nav-text">Cerrar sesión</span>
                </a>
            </li>
        </ul>
    </div>
    </div>
</nav>
