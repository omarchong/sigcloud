@include('layouts.admin')



<div class="main my-3">
    <div class="main-content">
        <div class="container-fluid col-md-10">
            <div class="card">
                <div class="card-header">
                    <span>Gestionar contactos</span>
                </div>
                <!--  <div class="card-body">
                    <button type="button" id="addContacto" class="btn btn-primary"><i class="fas fa-plus"></i> Agregar
                        contacto</button>
                </div> -->

                <div class="card-body">
                    <a href="{{ route('contactos.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i>
                        Agregar Contacto</a>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-inverse mt-3 responsive" id="contactos">
                        <thead class="thead-inverse striped responsive" id="contactos">
                            <tr>
                                <th>Clave</th>
                                <th>Contacto 1</th>
                                <th>Email</th>
                                <th>Telefono</th>
                                <th>Servicio de interes</th>
                                <th>Operaciones</th>

                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                    <div class="modal fade" id="ajax-contacto-model" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="ajaxContactoModel">Agregar contacto</h4>
                                </div>
                                <div class="modal-body">
                                    <form action="javascript:void(0)" id="addEditContacto" name="addEditContacto"
                                        class="form-horizontal" method="POST">
                                        <div class="form-row">

                                            <div class="col-md-6">
                                                <label for="" class="form-label">Nombre</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="nombre"
                                                        name="nombre">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="" class="form-label">Email</label>
                                                <div class="form-group">
                                                    <input type="email" class="form-control" id="email"
                                                        name="email">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <label for="" class="form-label">Telefono</label>
                                                <div class="form-group">
                                                    <input type="numeric" class="form-control" id="telefono"
                                                        name="telefono">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="" class="form-label">Descripcion</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="descripcion"
                                                        name="descripcion">
                                                </div>
                                            </div>


                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" class="btn btn-primary" id="btn-save"
                                                    value="addContacto">Guardar
                                                </button>
                                            </div>
                                    </form>
                                </div>
                                <div class="modal-footer">

                                </div>
                            </div>
                        </div>
                    </div>

                </div>


                <script>
                    var table = $('#contactos').DataTable({
                        "responsive": true,
                        "processing": true,
                        "serverSide": true,
                        "autoWidth": false,
                        language: {
                            url: "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json",
                        },
                        "ajax": "{{ route('contactos.datatables') }}",
                        "columns": [{
                                data: 'id',
                            },
                            {
                                data: 'contacto1',

                            },
                            {
                                data: 'email1',
                            },
                            {
                                data: 'telefono1',
                            },
                            {
                                data: 'servicios.nombre'
                            },
                            {
                                data: 'id',
                                render: function(data, type, full, meta) {
                                    return `
                                    <a href="/contactos/${data}" class="btn">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                        
                                    <a href="/contactos/${data}" class="btn">
                                        <img src="img/editar.svg" width="20px">
                                    </a>
                                    <a href="javascript:void(0)" data-toggle="tooltip" data-id="${data}" 
                                        data-original-title="Delete" class="deletecontactos">
                                        <img src="img/basurero.svg" width="20px">
                                        </a>
                                    `
                                }
                            }

                        ]

                    });
                    
                    function deleteRecord(id) {
                        Swal.fire({
                            title: 'Estas seguro de eliminar este contacto?',
                            text: "No podras revertir cambios!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Si, eliminar contacto!',
                            cancelButtonText: 'Cancelar!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $.ajax({
                                    type: 'DELETE',
                                    url: `/contactos/${id}`,
                                    data: {
                                        _token: $('[name="_token"]').val(),
                                    },
                                    success: res => {
                                        Swal.fire(
                                            'Eliminado!',
                                            `El contacto ${res.contacto.contacto1} ha sido ${res.message} exitosamente.`,
                                            'success'
                                        );
                                        reloadTable();
                                    },
                                    error: error => {
                                        console.log(error);
                                    },
                                });

                            }
                        });
                    }


                    function activeRecord(id) {
                        Swal.fire({
                            title: 'Estas seguro que deseas activar esta contacto?',
                            text: "No podras revertir cambios!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Si, activar contacto!',
                            cancelButtonText: 'Cancelar!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $.ajax({
                                    type: 'PUT',
                                    url: `/contactos/${id}/active-record`,
                                    data: {
                                        _token: $('[name="_token"]').val(),
                                    },
                                    success: res => {
                                        Swal.fire(
                                            'Activado!',
                                            `El contacto ${res.cintacto.contacto1} ha sido activado exitosamente.`,
                                            'success'
                                        );
                                        reloadTable();
                                    },
                                    error: error => {
                                        console.log(error);
                                    },
                                });
                            }
                        });
                    }

                    function reloadTable() {
                        $('#contactos').DataTable().ajax.reload();
                    }
                </script>
                    {{-- <a href="javascript:void(0)" data-toggle="tooltip" data-id="${data}" 
                    data-original-title="restore" class="restore">
                    <i class="fas fa-user-slash"></i>
                    </a>
                    
                     <button class="btn ${full.deleted_at ? 'btn-success' : 'btn-danger'}"
                                    ${full.deleted_at ? `onclick="activeRecord(${data})"` : `onclick="deleteRecord(${data})"`}
                                    onclick="deleteRecord(${data})"
                                    >
                                    <i class="${full.deleted_at ? 'fas fa-power-off' : 'fas fa-trash-alt'}"></i>
                                    </button>
                    --}}
                <script>

                    $(function() {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                        $('body').on('click', '.deletecontactos', function() {
                            Swal.fire({
                                title: '¿Estás seguro?',
                                text: '¡El contacto se eliminará definitivamente!',
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
                                        url: "{{ url('destroy_contactos') }}" + "/" + id,
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

                       /*  $('body').on('click', '.restore', function() {
                            Swal.fire({
                                title: '¿Estás seguro?',
                                text: '¡El contacto se reactivara!',
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#007bff',
                                cancelButtonColor: '#d33',
                                confirmButtonText: '¡Si, reactivar!',
                                cancelButtonText: 'Cancelar'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    var id = $(this).data('id');
                                    $.ajax({
                                        type: "PUT",
                                        url: "{{ url('restore') }}" + "/" + id,
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
                        }); */

                    })
                </script>
            </div>
        </div>
    </div>
</div>
