@include('layouts.admin')

<div class="main my-3">
    <div class="main-content">
        <div class="container-fluid col-md-10">
            <div class="card">
                <div class="card-header">
                    <span>Gestión de actividades</span>
                </div>
                <div class="card-body">
                    <button type="button" id="addNewActividad" class="btn btn-primary"><i class="fas fa-plus"></i>
                        Agregar
                        actividad</button>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-inverse mt-3 responsive" id="actividades">
                        <thead class="thead-inverse striped responsive">
                            <tr>
                                <th>Clave</th>
                                <th>Nombre</th>
                                <th>Tipo de actividad</th>
                                <th>Fecha</th>
                                <th>Nota</th>
                                <th>Otros</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($actividads as $actividad)
                            {{-- <tr>
                                <a href="javascript:void(0)" class="btn btn-primary edit"
                                    data-id="{{ $actividad->id }}">Editar</a>
                            <a href="javascript:void(0)" class="btn btn-danger delete" data-id="{{ $actividad->id }}">Eliminar</a>
                            </tr> --}}
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ajax-actividad-model" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="ajaxActividadModel"></h4>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0)" id="addEditActividadForm" name="addEditActividadForm" class="form-horizontal" method="POST">
                    <input type="hidden" name="id" id="id">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="nombre">Nombre</label>
                            <div class="">
                                <input type="text" class="form-control" name="nombre" id="nombre" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="tipoactividad">Tipo de actividad</label>
                            <div class="">
                                <select class="custom-select" name="tipoactividad" id="tipoactividad" required>
                                    <option selected>Selecciona una actividad</option>
                                    <option value="Llamadas">Llamadas</option>
                                    <option value="Correo">Correo</option>
                                    <option value="Reunion">Reunion</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="fecha">Fecha</label>
                            <div class="">
                                <input type="date" class="form-control" name="fecha" id="fecha" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="nota">Nota</label>
                            <div class="">
                                <input type="text" class="form-control" name="nota" id="nota" required>
                            </div>
                        </div>
                    </div>
                    <div class="float-right my-3">
                        <button type="submit" class="btn btn-primary" id="btn-save" value="addNewActividad">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $('#actividades').DataTable({
        "responsive": true,
        "processing": true,
        "serverside": true,
        "autoWidth": false,
        language: {
            url: "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json",
        },
        "ajax": "{{ route('actividades.datatables') }}",
        "columns": [{
                data: 'id',
            },
            {
                data: 'nombre'
            },
            {
                data: 'tipoactividad'
            },
            {
                data: 'fecha'
            },
            {
                data: 'nota'
            }, {
                data: 'id',
                render: function(data, type, full, meta) {
                    return `
                    <a href="javascript:void(0)" class="edit"
                                    data-id="{{ $actividad->id }}"><img src="/img/editar.svg" width="20px"></a>
                    <a href="javascript:void(0)" class="delete"
                                    data-id="{{ $actividad->id }}"><img src="/img/basurero.svg" width="20px"></a>
                    `
                }
            }
        ]
    })

    function reloadTable() {
        $("#actividades").DataTable().ajax.reload();
    }
</script>

<script>
    $(document).ready(function($) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#addNewActividad').click(function() {
            $('#addEditActividadForm').trigger("reset");
            $('#ajaxActividadModel').html("Registrar actividad");
            $('#ajax-actividad-model').modal('show');
        });
        $('body').on('click', '.edit', function() {
            var id = $(this).data('id');
            $.ajax({
                type: "POST",
                url: "{{ url('edit-actividad') }}",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {
                    $('#ajaxActividadModel').html("Editar actividad");
                    $('#ajax-actividad-model').modal('show');
                    $('#id').val(res.id);
                    $('#nombre').val(res.nombre);
                    $('#tipoactividad').val(res.tipoactividad);
                    $('#fecha').val(res.fecha);
                    $('#nota').val(res.nota);
                }
            });
        });
        /* $('body').on('click', '.delete', function () {
            if (confirm("¿Eliminar registro? {{ $actividad->id}} ") == true) {
                var id = $(this).data('id');

                $.ajax({
                    type: 'POST',
                    url: "{{ url('delete-actividad') }}",
                    data: { id: id },
                    dataType: 'json',
                    success: function(res){
                        window.location.reload();
                    }
                });
            }
        }); */
        $('body').on('click', '.delete', function(e) {
            e.preventDefault();
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡La actividad {{ $actividad->id }} se eliminará definitivamente!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#007bff',
                cancelButtonColor: '#d33',
                confirmButtonText: '¡Si, eliminar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    var id = $(this).data('id');
                    $.ajax({
                        type: 'post',
                        url: "{{ url('delete-actividad') }}",
                        data: {
                            id: id
                        },
                        dataType: 'json',
                        success: function(res) {
                            location.reload();
                        }
                    });
                }
            })
        });

        $('body').on('click', '#btn-save', function(event) {
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
                    id: id,
                    nombre: nombre,
                    tipoactividad: tipoactividad,
                    fecha: fecha,
                    nota: nota
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