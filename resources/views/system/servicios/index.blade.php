@include('layouts.admin')



<div class="main col-md-12 mt-5 encabezado">
    <div class="main-content">
        <div class="panel panel-headline">
            <div class="panel-heading">
                <h3 class="panel-title">Reporte Servicios </h3>

                <div class="col-md-12 mt-1 mb-2"><button type="button" id="addServicio" class="btn btn-success">Agregar
                        servicio</button>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-inverse mt-3 responsive" id="servicios">
                    <thead class="thead-inverse striped responsive">
                        <tr>
                            <th>Clave</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Precio inicial</th>
                            <th>Precio final</th>
                            <th>Acciones</th>
                        </tr>

                    </thead>
                    <tbody>
                    </tbody>
                </table>
                {{-- modal --}}
                <div class="modal fade" id="ajax-servicio-model" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="ajaxServicioModel">Agregar servicio</h4>
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
                                        <label for="name" class="col-sm-2 control-label">Descripcion</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="descripcion"
                                                name="descripcion" placeholder="" value="" maxlength="50" required="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Precio inicial</label>
                                        <div class="col-sm-12">
                                            <input type="numeric" class="form-control" id="precio_inicial"
                                                name="precio_inicial" value="" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Precio final</label>
                                        <div class="col-sm-12">
                                            <input type="numeric" class="form-control" id="precio_final"
                                                name="precio_final" value="" required="">
                                        </div>
                                    </div>

                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-primary" id="btn-save"
                                            value="addServicio">Guardar
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
                    $('#servicios').DataTable({
                        "responsive": true,
                        "processing": true,
                        "servierside": true,
                        "autoWidth": false,
                        language: {
                            url: "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json",
                        },
                        "ajax": "{{ route('servicios.datatables') }}",
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
                                data: 'precio_inicial',
                            },
                            {
                                data: 'precio_final'
                            },
                            {
                                data: 'id',
                                render: function(data, type, full, meta) {
                                    return `<a href="/servicios/${data}/edit"
                                    class="btn"
                                    ${full.deleted_at ? 'hidden' : ''}>
                                    <img src="img/editar.svg" width="20px">
                                    </a>
                                    <a href="/servicios/${data}/edit-servicio"
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
                        $('#servicios').DataTable().ajax.reloadTable();
                    }
                </script>
                <script>
                    $(document).ready(function($) {
                        $.ajaxSetup({
                            headers: {
                                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                            },
                        });
                        $("#addServicio").click(function() {
                            $("#addEditServicio").trigger("reset");
                            $("#ajaxServicioModel").html("Agregar Servicio");
                            $("#ajax-servicio-model").modal("show");
                        });
                        $("body").on("click", ".edit", function() {
                            var id = $(this).data("id");
                            $.ajax({
                                type: "POST",
                                url: "{{ url('edit-servicio') }}",
                                data: {
                                    id: id,
                                },
                                dataType: "json",
                                success: function(res) {
                                    $("#ajaxServicioModel").html("Edit Servicio");
                                    $("#ajax-servicio-model").modal("show");
                                    $("#id").val(res.id);
                                    $("#nombre").val(res.nombre);
                                    $("#descripcion").val(res.descripcion);
                                    $("#precio_inicial").val(res.precio_inicial);
                                    $("#precio_final").val(res.precio_final);
                                },
                            });
                        });

                        $("body").on("click", ".delete", function() {
                            if (confirm("Eliminar registro?") == true) {
                                var id = $(this).data("id");
                                $.ajax({
                                    type: "POST",
                                    url: "{{ url('delete-servicio') }}",
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
                            const precio_inicial = $("#precio_inicial").val();
                            const precio_final = $("#precio_final").val();

                            $("btn-save").html("Cargando.....");
                            $("btn-save").attr("disabled", true);

                            $.ajax({
                                type: "POST",
                                url: "{{ url('add-update-servicio') }}",
                                data: {
                                    id: id,
                                    nombre: nombre,
                                    descripcion: descripcion,
                                    precio_inicial: precio_inicial,
                                    precio_final: precio_final,
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
