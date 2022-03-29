@include('layouts.admin')

<div class="container mt-2">
    <div class="row">
        <div class="col-md-12 mt-1 mb-2"><button type="button" id="addNewActividad" class="btn btn-success">Registar actividad</button></div>
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>Clave</th>
                        <th>Nombre</th>
                        <th>Tipo de actividad</th>
                        <th>Fecha</th>
                        <th>Nota</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($actividads as $actividad)
                        <tr>
                            <td>{{ $actividad->id }}</td>
                            <td>{{ $actividad->nombre }}</td>
                            <td>{{ $actividad->tipoactividad }}</td>
                            <td>{{ $actividad->fecha }}</td>
                            <td>{{ $actividad->nota }}</td>
                            <td>
                                <a href="javascript:void(0)" class="btn btn-primary edit" data-id="{{ $actividad->id }}">Editar</a>
                                <a href="javascript:void(0)" class="btn btn-danger delete" data-id="{{ $actividad->id }}">Eliminar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="ajax-actividad-model" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="ajaxActividadModel"></h4>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0)" id="addEditActividadForm" name="addEditActividadForm" class="form-horizontal" method="POST">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="nombre" id="nombre" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tipoactividad">Tipo de actividad</label>
                        <div class="col-sm-12">
                            <select class="custom-select" name="tipoactividad" id="tipoactividad">
                                <option selected>Selecciona una actividad</option>
                                <option value="Llamadas">Llamadas</option>
                                <option value="Correo">Correo</option>
                                <option value="Reunion">Reunion</option>
                              </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fecha">Fecha</label>
                        <div class="col-sm-12">
                            <input type="date" class="form-control" name="fecha" id="fecha" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nota">Nota</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="nota" id="nota" required>
                        </div>
                    </div>
                    <div class="col-sm-offset-2 sol-sm-10">
                        <button type="submit" class="btn btn-primary" id="btn-save" value="addNewActividad">Guardar</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function($){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
            }
        });

        $('#addNewActividad').click(function(){
            $('#addEditActividadForm').trigger("reset");
            $('#ajaxActividadModel').html("Add actividad");
            $('#ajax-actividad-model').modal('show');
        });

        $('body').on('click', '.edit', function(){
            var id = $(this).data('id');

            $.ajax({
                type: "POST",
                url: "{{ url('edit-actividad') }}",
                data: { id:id },
                dataType: 'json',
                success: function(res){
                    $('#ajaxActividadModel').html("Edit actividad");
                    $('#ajax-actividad-model').modal('show');
                    $('#id').val(res.id);
                    $('#nombre').val(res.nombre);
                    $('#tipoactividad').val(res.tipoactividad);
                    $('#fecha').val(res.fecha);
                    $('#nota').val(res.nota);
                }
            });
        });

        $('body').on('click', 'delete', function() {
            if(confirm("¿Eliminar registro?") == true){
                var id = $(this).data('id');

                $.ajax({
                    type: 'POST',
                    url: "{{ url('delete-actividad') }}",
                    data: { id:id },
                    dataType: 'json',
                    success: function(res){
                        window.location.reaload();
                    }
                });
            }
        });

        $('body').on('click', '#btn-save', function(event){
            var id = $('#id').val();
            var nombre = $('#nombre').val();
            var tipoactividad = $('#tipoactividad').val();
            var fecha = $('#fecha').val();
            var nota = $('#nota').val();
            console.log(nota);

            $("#btn-save").html('Espere porfavor...');
            $("#btn-save").attr("disabled", true);

            $.ajax({
                type: 'POST',
                url: "{{ url('add-update-actividad') }}",
                data: { 
                    id:id,
                    nombre:nombre,
                    tipoactividad:tipoactividad,
                    fecha:fecha,
                    nota:nota
                 },
                dataType: 'json',
                success: function(res){
                    window.location.reload();
                    $("#btn-save").html('Submit');
                    $("#btn-save").attr("disabled", false);
                }
            });
        });
    });
</script>
