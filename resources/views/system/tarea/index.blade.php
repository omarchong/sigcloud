@include('layouts.admin')

<div class="main my-3">
    <div class="main-content">
        <div class="container-fluid col-md-10">
            <div class="card">
                <div class="card-header">
                    <span>Gestión de tareas</span>
                </div>
                <div class="card-body">
                    <button type="button" id="addNewTarea" class="btn btn-primary"><i class="fas fa-plus"></i>
                        Agregar tarea</button>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-inverse mt-3 responsive" id="tareas">
                        <thead class="thead-inverse striped responsive">
                            <tr>
                                <th>Clave</th>
                                <th>Nombre</th>
                                <th>Fecha limite</th>
                                <th>Hora limite</th>
                                <th>Tipo tarea</th>
                                <th>Nombre del usuario</th>
                                <th>Nombre del cliente</th>
                                <th>Estatus</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tareas as $tarea)
                                <tr>
                                    <td>{{ $tarea->id }}</td>
                                    <td>{{ $tarea->nombre }}</td>
                                    <td>{{ $tarea->fecha_limite }}</td>
                                    <td>{{ $tarea->hora_limite }}</td>
                                    <td>{{ $tarea->tipo_tarea }}</td>
                                    <td>{{ $tarea->usuario->nombre }}</td>
                                    <td>{{ $tarea->cliente->nombreempresa }}</td>
                                    <td>{{ $tarea->estatutarea->nombre }}</td>

                                    <td>
                                        <a href="javascript:void(0)" class="edit"
                                            data-id="{{ $tarea->id }}"><img src="/img/editar.svg" width="20px"></a>
                                        <a href="javascript:void(0)" class="delete"
                                            data-id="{{ $tarea->id }}"><img src="/img/basurero.svg"
                                                width="20px"></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
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
                    <div class="row">
                    <input type="hidden" name="id" id="id">
                    <div class="col-md-6">
                        <label for="name" class="control-label">Nombre</label>
                        <div class="">
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="" value=""
                                maxlength="50" required="">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="fecha_limite" class="control-label">Fecha limite</label>
                        <div class="">
                            <input type="date" class="form-control" id="fecha_limite" name="fecha_limite"
                                placeholder="" value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="hora_limite" class="control-label">Hora limite</label>
                        <div class="">
                            <input type="time" class="form-control" id="hora_limite" name="hora_limite" placeholder=""
                                value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="tipo_tarea" class="control-label">Tipo de tarea</label>
                        <div class="">
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

                    <div class="col-md-6">
                        <label for="usuario_id">Selecciona el usuario</label>
                        <select name="usuario_id" id="usuario_id" class="form-control">
                            @foreach ($usuario as $usuarios)
                                <option value="{{ $usuarios->id }}">
                                    {{ $usuarios->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
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

                    <div class="col-md-12">
                        <label for="descripcion" class="control-label">Descripcion</label>
                        <div class="">
                            <input type="textarea" class="form-control" id="descripcion" name="descripcion" placeholder=""
                                value="" maxlength="50" required="">
                        </div>
                    </div>
                </div>

                    <div class="float-right my-4">
                        <button type="submit" class="btn btn-primary" id="btn-save" value="addNewTarea">Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end bootstrap model -->

<script>
    $('#tareas').DataTable({
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
                data: 'fecha_limite',
            },
            {
                data: 'hora_limite',
            }, 
            { 
                data: 'tipo_tarea',
            }, 
            {  
                data: 'usuario.nombre',
            }, 
            {
                data: 'cliente.nombreempresa',
            }, 
            {
                data:'estatutarea.nombre',
            },{ 
                data: 'id',
                render: function(data, type, full, meta) {
                    return `
                    <a href="javascript:void(0)" class="edit"
                        data-id="{{ $tarea->id }}"><img src="/img/editar.svg" width="20px"></a>
                    <a href="javascript:void(0)" class="delete"
                        data-id="{{ $tarea->id }}"><img src="/img/basurero.svg" width="20px"></a>
                        `
                }
            }
        ]
    })

    function reloadTable() {
        $('#tareas').DataTable().ajax.reload();
    }
</script>



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
