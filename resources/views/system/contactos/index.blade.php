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
                                <th>Telefono</th>
                                <th>Servicio</th>
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
                                    <form action="javascript:void(0)" id="addEditServicio" name="addEditServicio"
                                        class="form-horizontal" method="POST">
                                        <input type="hidden" name="id" id="id">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-2 control-label">Nombre</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="nombre" name="nombre"
                                                    placeholder="" value="" maxlength="50" required="">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="name" class="col-sm-2 control-label">Email</label>
                                            <div class="col-sm-12">
                                                <input type="email" class="form-control" id="email"
                                                    name="email" placeholder="" value="" maxlength="50"
                                                    required="">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Telefono</label>
                                            <div class="col-sm-12">
                                                <input type="numeric" class="form-control" id="telefono"
                                                    name="telefono" value="" required="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Descripcion</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="descripcion"
                                                    name="descripcion" value="" required="">
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
                                    data: 'email',
                                },
                                {
                                    data: 'telefono',
                                },
                                {
                                    data: 'descripcion',
                                },

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

                            $("#body").on("click", ".edit", function() {
                                const id = $(this).data("id");
                                $.ajax({
                                    type: "POST",
                                    url: "{{ url('edit-contacto') }}",
                                    data: {
                                        id: id,
                                    },
                                    dataType: "json",
                                    success: function(res) {
                                        $("#ajaxContactoModel").html("Edit contacto");
                                        $("#ajax-contacto-model").modal("show");
                                        $("#id").val(res.id);
                                        $("#nombre").val(res.id);
                                        $("#email").val(res.email);
                                        $("#telefono").val(res.telefono);
                                        $("#descripcion").val(res.descripcion);

                                    }
                                })
                            })

                            $("body").on("click", ".delete", function() {
                                if (confirm("Eliminar registro?") == true) {
                                    var id = $(this).data("id");
                                    $.ajax({
                                        type: "POST",
                                        url: "{{ url('delete-servicio') }}",
                                        dara: {
                                            id: id,

                                        },
                                        dataType: "json",
                                        success: function(res) {
                                            window.location.reload();
                                        },
                                    })
                                }
                            })

                            $("body").on("click", "btn-save", function(event) {
                                const id = $("#id").val();
                                const nombre = $("#nombre").val();
                                const email = $("#email").val();
                                const telefono = $("#telefono").val();
                                const descripcion = $("#descripcion").val();
                                $("btn-save").html("cargando....");
                                $("btn-save").attr("disabled", true);

                                $.ajax({
                                    type: "POST",
                                    url: "{{ url('add-update-contacto') }}",
                                    data: {
                                        id: id,
                                        nombre: nombre,
                                        email: email,
                                        telefono: telefono,
                                        descripcion: descripcion
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
