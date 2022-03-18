@include('layouts.admin')



<div class="main col-md-12 mt-5 encabezado">
    <div class="main-content">
        <div class="panel panel-headline">
            <div class="panel-heading">
                <h3 class="panel-title">Reporte de tareas </h3>

                <div class="col-md-12 mt-1 mb-2"><button type="button" id="addTarea" class="btn btn-success">Agregar
                        tarea</button>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-inverse mt-3 responsive" id="tareas">
                    <thead class="thead-inverse striped responsive">
                        <tr>
                            <th>Clave</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Fecha limite</th>
                            <th>Hora limite</th>
                            <th>Tipo</th>
                            <th>Nombre de usuario</th>
                            <th>Estatus</th>
                            <th>Cita</th>
                            <th>Operaciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                {{-- modal --}}
                <div class="modal fade" id="ajax-tarea-model" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="ajaxTareaModel">Agregar tarea</h4>
                            </div>
                            <div class="modal-body">
                                
                                <form action="javascript:void(0)" id="addEditTarea" name="addEditTarea"
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
                                        <label for="name" class="col-sm-2 control-label">Descripcion</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="descripcion"
                                                name="descripcion" placeholder="" value="" maxlength="50" required="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Fecha limite</label>
                                        <div class="col-sm-12">
                                            <input type="date" class="form-control" id="fecha_limite"
                                                name="fecha_limite" value="" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Hora limite</label>
                                        <div class="col-sm-12">
                                            <input type="int" class="form-control" id="hora_limite"
                                                name="hora_limite" value="" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Tipo de tarea</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="tipo_tarea"
                                                name="tipo_tarea" value="" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="usuarios_id" class="control-label">Seleccione el Usuario:</label>
                                        <div class="col-sm-12">
                                            
                                        </div>
                                        
                                    </div>
                                    <div class="form-group">
                                        <label for="estatutareas_id" class="control-label">Seleccione el estatus:</label>
                                        <div class="col-sm-12">
                                            
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="citas_id" class="control-label">Tipo de cita:</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="citas_id"
                                                name="citas_id" value="" required="">
                                        </div>
                                    </div>

                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-primary" id="btn-save"
                                            value="addTarea">Guardar
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
                    $('#tareas').DataTable({
                        "responsive": true,
                        "processing": true,
                        "servierside": true,
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
                                data: 'descripcion',
                            },
                            {
                                data: 'fecha_limite',
                            },
                            {
                                data: 'hora_limite',
                            },
                            {
                                data: 'tipo_tarea',
                            },
                            {
                                data: 'usuario_id',
                            },
                            {
                                data: 'estatutarea_id',
                            },
                            {
                                data: 'cita_id',
                            },
                            {
                                data: 'id',
                                render: function(data, type, full, meta) {
                                    return `<a href="/tareas/${data}/edit"
                                    class="btn"
                                    ${full.deleted_at ? 'hidden' : ''}>
                                    <img src="img/editar.svg" width="20px">
                                    </a>
                                    <a href="/tareas/${data}/edit-tarea"
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
                        $('#tareas').DataTable().ajax.reloadTable();
                    }
                </script>
                <script>
                    $(document).ready(function($) {
                        $.ajaxSetup({
                            headers: {
                                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                            },
                        });
                        $("#addTarea").click(function() {
                            $("#addEditTarea").trigger("reset");
                            $("#ajaxTareaModel").html("Agregar Tarea");
                            $("#ajax-tarea-model").modal("show");
                        });
                        $("body").on("click", ".edit", function() {
                            var id = $(this).data("id");
                            $.ajax({
                                type: "POST",
                                url: "{{ url('edit-tarea') }}",
                                data: {
                                    id: id,
                                },
                                dataType: "json",
                                success: function(res) {
                                    $("#ajaxTareaModel").html("Edit Tarea");
                                    $("#ajax-tarea-model").modal("show");
                                    $("#id").val(res.id);
                                    $("#nombre").val(res.nombre);
                                    $("#descripcion").val(res.descripcion);
                                    $("#fecha_limite").val(res.fecha_limite);
                                    $("#hora_limite").val(res.hora_limite);
                                    $("#tipo_tarea").val(res.tipo_tarea);
                                    $("#usuarios_id").val(res.usuarios_id);
                                    $("#estatutareas_id").val(res.estatutareas_id);
                                    $("#citas_id").val(res.citas_id);
                                },
                            });
                        });

                        $("body").on("click", ".delete", function() {
                            if (confirm("Eliminar registro?") == true) {
                                var id = $(this).data("id");
                                $.ajax({
                                    type: "POST",
                                    url: "{{ url('delete-tarea') }}",
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
                            const descripcion = $("#descripcion").val();
                            const fecha_limite = $("#fecha_limite").val();
                            const hora_limite = $("#hora_limite").val();
                            const tipo_tarea = $("#tipo_tarea").val();
                            const usuarios_id = $("#usuarios_id").val();
                            const estatutareas_id = $("#estatutareas_id").val();
                            const citas_id = $("#citas_id").val();

                            $("btn-save").html("Cargando.....");
                            $("btn-save").attr("disabled", true);

                            $.ajax({
                                type: "POST",
                                url: "{{ url('add-update-tarea') }}",
                                data: {
                                    id: id,
                                    nombre: nombre,
                                    descripcion: descripcion,
                                    fecha_limite: fecha_limite,
                                    hora_limite: hora_limite,
                                    tipo_tarea: tipo_tarea,
                                    usuarios_id: usuarios_id,
                                    estatutareas_id: estatutareas_id,
                                    citas_id: citas_id,
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
