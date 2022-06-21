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
                data: 'usuario.nombre'
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
                    <a href="javascript:void(0)" data-toggle="tooltip" data-id="${data}" 
                    data-original-title="Delete" class="deletetarea">
                    <img src="/img/basurero.svg" width="20px"></a>
                    
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
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('body').on('click', '.deletetarea', function() {
            Swal.fire({
                title: '¿Estás seguro?',
                text: '¡La tarea se eliminará definitivamente!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#007bff',
                cancelButtonColor: '#d33',
                confirmButtonText: '¡Si, eliminar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    var id = $(this).data('id');
                    $.ajax({
                        type: "DELETE",
                        url: "{{ url('destroy_tarea') }}" + "/" + id,
                        data: {
                            id: id
                        },
                        dataType: 'json',
                        success: function(res) {
                            table.draw();
                        }
                    });
                }
            })
        });
    })
</script>
