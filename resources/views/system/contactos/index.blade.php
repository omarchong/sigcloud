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
                    <a href="{{ route('contactos.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Agregar Contacto</a>
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
                                    <form action="javascript:void(0)" id="addEditContacto" name="addEditContacto" class="form-horizontal" method="POST">
                                        <div class="form-row">

                                            <div class="col-md-6">
                                                <label for="" class="form-label">Nombre</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="nombre" name="nombre">
                                                </div>
                                            </div>
                                          
                                            <div class="col-md-6">
                                                <label for="" class="form-label">Email</label>
                                                <div class="form-group">
                                                    <input type="email" class="form-control" id="email" name="email">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <label for="" class="form-label">Telefono</label>
                                                <div class="form-group">
                                                    <input type="numeric" class="form-control" id="telefono" name="telefono">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="" class="form-label">Descripcion</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="descripcion" name="descripcion">
                                                </div>
                                            </div>


                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" class="btn btn-primary" id="btn-save" value="addContacto">Guardar
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
                    $('#contactos').DataTable({
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



                                    <a href="/contactos/${data}"
                                                class="btn"
                                                ${full.deleted_at ? 'hidden' : ''}>
                                                <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="/contactos/${data}"
                                                class="btn"
                                                ${full.deleted_at ? 'hidden' : ''}>
                                                <img src="img/editar.svg" width="20px">
                                    <a href="/contactos/${data}/show"
                                    class="btn"
                                    ${full.deleted_at ? 'hidden' : ''}>
                                    <img src="img/basurero.svg" width="20px">
                                    </a>
                                    `
                                }
                            }

                        ]

                    });

                    function reloadTable() {
                        $('#contactos').DataTable().ajax.reload();
                    }
                </script>

                
               
            </div>
        </div>
    </div>
</div>