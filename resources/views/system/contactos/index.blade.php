@include('layouts.admin')


<div class="main col-md-12 mt-5 encabezado">
    <div class="main-content">
        <div class="panel panel-headline">
            <div class="card">
                <div class="col-md-12 mt-1 mb-2"><button type="button" id="addContacto" class="btn btn-success">Agregar
                        contacto</button>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-inverse mt-3 responsive" id="contactos">
                        <thead class="thead-inverse striped responsive" id="contactos">
                            <tr>
                                <th>Clave</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Telefono</th>
                                <th>Descripcion</th>
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
                                data: 'nombre',
                            },
                            {
                                data: 'email',
                            },
                            {
                                data: 'telefono',
                            },
                            {
                                data: 'descripcion',
                            },{
                                data: 'id',
                                render: function(data, type, full, meta) {
                                    return `



                                    <a href="/contactos/${data}"
                                                class="btn btn-primary"
                                                ${full.deleted_at ? 'hidden' : ''}>
                                                <i class="far fa-eye"></i>
                                                </a>

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

                <script>
                    $(document).ready(function($) {
                        $.ajaxSetup({
                            headers: {
                                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                            },
                        });
                        $("#addContacto").click(function() {
                            $("#addEditContacto").trigger("reset");
                            $("#ajaxContactoModel").html("Agregar contacto");
                            $("#ajax-contacto-model").modal("show");
                        });
                        $("body").on("click", ".edit", function() {
                            var id = $(this).data("id");
                            $.ajax({
                                type: "POST",
                                url: "{{ url('edit-contacto') }}",
                                data: {
                                    id: id,
                                },
                                dataType: "json",
                                success: function(res) {
                                    $("#ajaxContactoModel").html("Edit Servicio");
                                    $("#ajax-contacto-model").modal("show");
                                    $("#id").val(res.id);
                                    $("#nombre").val(res.nombre);
                                    $("#email").val(res.email);
                                    $("#telefono").val(res.telefono);
                                    $("#descripcion").val(res.descripcion);

                                },
                            });
                        });

                        $("body").on("click", ".delete", function() {
                            if (confirm("Eliminar registro?") == true) {
                                var id = $(this).data("id");
                                $.ajax({
                                    type: "POST",
                                    url: "{{ url('delete-contacto') }}",
                                    data: {
                                        id: id,
                                    },
                                    dataType: "json",
                                    success: function(res) {
                                        window.location.reload();
                                    },
                                });
                            }
                        });

                        $("body").on("click", "#btn-save", function(event) {
                            const id = $("#id").val();
                            const nombre = $("#nombre").val();
                            const email = $("#email").val();
                            const telefono = $("#telefono").val();
                            const descripcion = $("#descripcion").val();


                            $("btn-save").html("Cargando.....");
                            $("btn-save").attr("disabled", true);

                            $.ajax({
                                type: "POST",
                                url: "{{ url('add-update-contactos') }}",
                                data: {
                                    id: id,
                                    nombre: nombre,
                                    email: email,
                                    telefono: telefono,
                                    descripcion: descripcion,

                                },
                                dataType: "json",
                                success: function(res) {
                                    window.location.reload();
                                    $("#btn-save").html("Submit");
                                    $("#btn-save").attr("disabled", false);
                                },
                            });
                        });
                    });
                </script>

            </div>
        </div>
    </div>
</div>
</div>
