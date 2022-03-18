@include('layouts.admin')



<div class="main col-md-12 mt-5 encabezado">
    <div class="main-content">
        <div class="panel panel-headline">
            <div class="panel-heading">
                <h3 class="panel-title">Reporte de estatus</h3>

                <div class="col-md-12 mt-1 mb-2"><button type="button" id="addEstatuTarea" class="btn btn-success">Agregar
                        estatus</button>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-inverse mt-3 responsive" id="estatutareas">
                    <thead class="thead-inverse striped responsive">
                        <tr>
                            <th>Clave</th>
                            <th>Nombre</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                {{-- modal --}}
                <div class="modal fade" id="ajax-estatutarea-model" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="ajaxEstatuTareaModel">Agregar estatus</h4>
                            </div>
                            <div class="modal-body">
                                
                                <form action="javascript:void(0)" id="addEditEstatuTarea" name="addEditEstatuTarea"
                                    class="form-horizontal" method="POST">
                                    <input type="hidden" name="id" id="id">
                                    <div class="form-group">
                                        <label for="name" class="col-sm-2 control-label">Nombre</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="nombre" name="nombre"
                                                placeholder="" value="" maxlength="50" required="">
                                        </div>
                                    </div>

                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-primary" id="btn-save"
                                            value="addEstatuTarea">Guardar
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
                    $('#estatutareas').DataTable({
                        "responsive": true,
                        "processing": true,
                        "servierside": true,
                        "autoWidth": false,
                        language: {
                            url: "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json",
                        },
                        "ajax": "{{ route('estatutareas.datatables') }}",
                        "columns": [{
                                data: 'id',
                            },
                            {
                                data: 'nombre',
                            },
                            {
                                data: 'id',
                                render: function(data, type, full, meta) {
                                    return `
                                    <a href="/estatutareas/${data}/edit"
                                    class="btn"
                                    ${full.deleted_at ? 'hidden' : ''}>
                                    <img src="img/editar.svg" width="20px">
                                    </a>
                                    <a href="/estatutareas/${data}/edit-estatutarea"
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
                        $('#estatutareas').DataTable().ajax.reloadTable();
                    }
                </script>
                <script>
                    $(document).ready(function($) {
                        $.ajaxSetup({
                            headers: {
                                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                            },
                        });
                        $("#addEstatuTarea").click(function() {
                            $("#addEditEstatuTarea").trigger("reset");
                            $("#ajaxEstatuTareaModel").html("Agregar Estatus");
                            $("#ajax-estatutarea-model").modal("show");
                        });
                        $("body").on("click", ".edit", function() {
                            var id = $(this).data("id");
                            $.ajax({
                                type: "POST",
                                url: "{{ url('edit-estatutarea') }}",
                                data: {
                                    id: id,
                                },
                                dataType: "json",
                                success: function(res) {
                                    $("#ajaxEstatuTareaModel").html("Edit Estatus");
                                    $("#ajax-estatutarea-model").modal("show");
                                    $("#id").val(res.id);
                                    $("#nombre").val(res.nombre);
                                },
                            });
                        });

                        $("body").on("click", ".delete", function() {
                            if (confirm("Eliminar registro?") == true) {
                                var id = $(this).data("id");
                                $.ajax({
                                    type: "POST",
                                    url: "{{ url('delete-estatutarea') }}",
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

                            $("btn-save").html("Cargando.....");
                            $("btn-save").attr("disabled", true);

                            $.ajax({
                                type: "POST",
                                url: "{{ url('add-update-estatutarea') }}",
                                data: {
                                    id: id,
                                    nombre: nombre,

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
