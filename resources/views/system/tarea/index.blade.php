@include('layouts.admin')

<div class="container mt-2">
    <div class="row">
        <div class="col-md-12 mt-1 mb-2"><button type="button" id="addNewTarea" class="btn btn-success">Registrar
                tarea</button>
        </div>
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Clave</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Fecha limite</th>
                        <th scope="col">Hora limite</th>
                        <th scope="col">Tipo tarea</th>
                        <th scope="col">Nombre del usuario</th>
                        <th scope="col">Nombre del cliente</th>
                        <th scope="col">Estatus</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tareas as $tarea)
                        <tr>
                            <td>{{ $tarea->id }}</td>
                            <td>{{ $tarea->nombre }}</td>
                            <td>{{ $tarea->descripcion }}</td>
                            <td>{{ $tarea->fecha_limite }}</td>
                            <td>{{ $tarea->hora_limite }}</td>
                            <td>{{ $tarea->tipo_tarea }}</td>
                            <td>{{ $tarea->usuario->usuario }}</td>
                            <td>{{ $tarea->cliente->nombreempresa }}</td>
                            <td>{{ $tarea->estatutarea->nombre }}</td>

                            <td>
                                <a href="javascript:void(0)" class="btn btn-primary edit"
                                    data-id="{{ $tarea->id }}">Editar</a>
                                <a href="javascript:void(0)" class="btn btn-primary delete"
                                    data-id="{{ $tarea->id }}">Eliminar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- boostrap model -->
<div class="modal fade" id="ajax-tarea-model" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="ajaxTareaModel"></h4>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0)" id="addEditTareaForm" name="addEditTareaForm" class="form-horizontal"
                    method="POST">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="name" class="col-sm-12 control-label">Nombre</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="nombre" name="nombre"
                                placeholder="Ingresa el nombre" value="" maxlength="50" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="descripcion" class="col-sm-12 control-label">Descripcion</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="descripcion" name="descripcion"
                                placeholder="Ingresa la descripcion" value="" maxlength="50" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="fecha_limite" class="col-sm-12 control-label">Fecha limite</label>
                        <div class="col-sm-12">
                            <input type="date" class="form-control" id="fecha_limite" name="fecha_limite"
                                placeholder="" value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="hora_limite" class="col-sm-12 control-label">Hora limite</label>
                        <div class="col-sm-12">
                            <input type="time" class="form-control" id="hora_limite" name="hora_limite" placeholder=""
                                value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tipo_tarea" class="col-sm-12 control-label">Tipo de tarea</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="tipo_tarea" name="tipo_tarea" placeholder=""
                                value="" maxlength="50" required="">
                        </div>
                    </div>

                    {{-- <div class="form-group">
                      <label for="name" class="col-sm-2 control-label">usuario</label>
                      <div class="col-sm-12">
                          <input type="text" class="form-control" id="usuario_id" name="usuario_id"
                              placeholder="Ingresa el año" value="" maxlength="50" required="">
                      </div>
                  </div> --}}
                    {{-- <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">cliente</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="cliente_id" name="cliente_id"
                            placeholder="Ingresa el año" value="" maxlength="50" required="">
                    </div>
                </div> --}}

                    <div class="col-md-12">
                        <label for="usuario_id">Selecciona el usuario</label>
                        <select name="usuario_id" id="usuario_id" class="form-control">
                            @foreach ($usuario as $usuarios)
                                <option value="{{ $usuarios->id }}">
                                    {{ $usuarios->usuario }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="cliente_id">Selecciona el Cliente</label>
                        <select name="cliente_id" id="cliente_id" class="form-control">
                            @foreach ($cliente as $clientes)
                                <option value="{{ $clientes->id }}">
                                    {{ $clientes->nombreempresa }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-12">
                        <label for="estatutarea_id">Selecciona el estatus</label>
                        <select name="estatutarea_id" id="estatutarea_id" class="form-control">
                            @foreach ($estatutarea as $estatutareas)
                                <option value="{{ $estatutareas->id }}">
                                    {{ $estatutareas->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary" id="btn-save" value="addNewTarea">Guardar
                        </button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">

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

        $('#addNewTarea').click(function() {
            $('#addEditTareaForm').trigger("reset");
            $('#ajaxTareaModel').html("Registrar tarea");
            $('#ajax-tarea-model').modal('show');
        });

        $('body').on('click', '.edit', function() {

            var id = $(this).data('id');

            // ajax
            $.ajax({
                type: "POST",
                url: "{{ url('edit-tarea') }}",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {
                    $('#ajaxTareaModel').html("Editar tarea");
                    $('#ajax-tarea-model').modal('show');
                    $('#id').val(res.id);
                    $('#nombre').val(res.nombre);
                    $('#descripcion').val(res.descripcion);
                    $('#fecha_limite').val(res.fecha_limite);
                    $('#hora_limite').val(res.hora_limite);
                    $('#tipo_tarea').val(res.tipo_tarea);
                    $('#usuario_id').val(res.usuario_id);
                    $('#cliente_id').val(res.cliente_id);
                    $('#estatutarea_id').val(res.estatutarea_id);

                }
            });

        });

        $('body').on('click', '.delete', function() {

            if (confirm("¿Eliminar registro?") == true) {
                var id = $(this).data('id');

                // ajax
                $.ajax({
                    type: "POST",
                    url: "{{ url('delete-tarea') }}",
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
            var descripcion = $("#descripcion").val();
            var fecha_limite = $("#fecha_limite").val();
            var hora_limite = $("#hora_limite").val();
            var tipo_tarea = $("#tipo_tarea").val();
            var usuario_id = $("#usuario_id").val();
            var cliente_id = $("#cliente_id").val();
            var estatutarea_id = $("#estatutarea_id").val();


            $("#btn-save").html('Espere porfavor...');
            $("#btn-save").attr("disabled", true);

            // ajax
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
                    usuario_id: usuario_id,
                    cliente_id: cliente_id,
                    estatutarea_id: estatutarea_id,
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
