@include('layouts.admin')

<div class="main my-3">
    <div class="main-content">
        <div class="container-fluid col-md-10">
            <div class="card">
                <div class="card-header">
                    <span>Gestión de tareas</span>
                </div>
                <div class="card-body">
                    <a href="{{ route('tareas.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i>
                        Agregar tarea</a>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-inverse mt-3 responsive" id="tareas">
                        <thead class="thead-inverse striped responsive">
                            <tr>
                                <th>Clave</th>
                                <th>Nombre</th>
                                <th>Fecha limite</th>
                                <th>Nombre del usuario</th>
                                <th>Nombre del cliente</th>
                                <th>Estatus</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tareas as $tarea)
                                
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var table = $('#tareas').DataTable({
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "autoWidth": false,
        language: {
            url: "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json",
        },
        "ajax": "{{ route('tareas.datatables') }}",
        "columns": [{
                data: 'id',
            },
            {
                data: 'nombre',
            },
            {
                data: 'fecha_limite'
            },
            {
                data: 'usuarios.nombre'
            },
            {
                data: 'clientes.nombreempresa'
            },
            {
                data: 'estatutareas.nombre'
            },
            {
                data: 'id',
                render: function(data, type, full, meta) {
                    return `
                    <a href="/tareas/${data}/edit" class="btn">
                    <img src="/img/editar.svg" width="20px">
                    </a>
                    <form action="{{ route('tareas.destroy', $tarea->id) }}" method="POST" class="formEliminar">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn"><img src="/img/basurero.svg" width="20px"></button>
                    </form>
                    `
                }
            }
        ]
    });
    
    function reloadTable() {
        $('#tareas').DataTable().ajax.reload();
    }
</script>
    <script>
        (function () {
        'use strict'
        //debemos crear la clase formeliminar dentro del form del boton borrar
        //recordar que cada registro a eliminar esta contenido de un form
        var forms = document.querySelectorAll('.formEliminar')

        Array.prototype.slice.call(forms)
            .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                event.preventDefault()
                event.stopPropagation()
                Swal.fire({
                    title: '¿Confirmar la eliminacion del registro?',
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#20c997',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Confirmar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if(result.isConfirmed) {
                        this.submit();
                        Swal.fire('¡Eliminado!', 'El registro ha sido eliminado correctamente...', 'success');
                    }
                })
            }, false)
            })
        })()
    </script>
