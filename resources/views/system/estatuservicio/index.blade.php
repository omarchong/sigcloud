@include('layouts.admin')

<div class="main my-3">
    <div class="main-content">

        <div class="container-fluid col-md-10">
            <div class="card">
                <div class="card-header">
                    <span>Estatus servicios</span>
                </div>
                <div class="card-body">
                    <button type="button" id="addNewEstatuservicio" class="btn btn-primary"><i class="fas fa-plus"></i>
                        Agregar estatus servicio</button>
                </div>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Clave</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($estatuservicios as $estatuservicio)
                                <tr>
                                    <td>{{ $estatuservicio->id }}</td>
                                    <td>{{ $estatuservicio->nombre }}</td>
                                    <td>
                                        <a href="javascript:void(0)" class="edit"
                                            data-id="{{ $estatuservicio->id }}"><img src="/img/editar.svg"
                                                width="20px"></a>
                                        <a href="javascript:void(0)" class="delete"
                                            data-id="{{ $estatuservicio->id }}"><img src="/img/basurero.svg"
                                                width="20px"></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- boostrap model -->
        <div class="modal fade" id="ajax-estatuservicio-model" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="ajaxEstatuservicioModel"></h4>
                    </div>
                    <div class="modal-body">
                        <form action="javascript:void(0)" id="addEditEstatuservicioForm"
                            name="addEditEstatuservicioForm" class="form-horizontal" method="POST">
                            <input type="hidden" name="id" id="id">
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Nombre</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder=""
                                        value="" maxlength="50" required="">
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary" id="btn-save"
                                    value="addNewEstatuservicio">Guardar
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
</div>

<!-- end bootstrap model -->
<script type="text/javascript">
    $(document).ready(function($) {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#addNewEstatuservicio').click(function() {
            $('#addEditEstatuservicioForm').trigger("reset");
            $('#ajaxEstatuservicioModel').html("Registrar estatus del servicio");
            $('#ajax-estatuservicio-model').modal('show');
        });

        $('body').on('click', '.edit', function() {

            var id = $(this).data('id');

            // ajax
            $.ajax({
                type: "POST",
                url: "{{ url('edit-estatuservicio') }}",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {
                    $('#ajaxEstatuservicioModel').html("Editar estatus del servicio");
                    $('#ajax-estatuservicio-model').modal('show');
                    $('#id').val(res.id);
                    $('#nombre').val(res.nombre);
                }
            });

        });

        $('body').on('click', '.delete', function() {

            if (confirm("¿Eliminar registro?") == true) {
                var id = $(this).data('id');

                // ajax
                $.ajax({
                    type: "POST",
                    url: "{{ url('delete-estatuservicio') }}",
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(res) {

                        window.location.reload();
                    }
                });
            }

        });

        $('body').on('click', '#btn-save', function(event) {

            var id = $("#id").val();
            var nombre = $("#nombre").val();

            $("#btn-save").html('Espere porfavor...');
            $("#btn-save").attr("disabled", true);

            // ajax
            $.ajax({
                type: "POST",
                url: "{{ url('add-update-estatuservicio') }}",
                data: {
                    id: id,
                    nombre: nombre,
                },
                dataType: 'json',
                success: function(res) {
                    window.location.reload();
                    $("#btn-save").html('Submit');
                    $("#btn-save").attr("disabled", false);
                }
            });

        });

    });
</script>
