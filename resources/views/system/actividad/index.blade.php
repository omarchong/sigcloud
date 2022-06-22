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
                        Agregar actividad</button>
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
                                <th>Usuario</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

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
                <form action="javascript:void(0)" id="addEditActividadForm" name="addEditActividadForm" class="form-horizontal needs-validation" novalidate method="POST">
                    <input type="hidden" name="id" id="id">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="nombre">Nombre</label>
                            <div class="">
                                <input type="text" required class="form-control @error('nombre')  @enderror" name="nombre" id="nombre">
                                <div class="valid-feedback">
                                    Correcto!
                                </div>
                                @error('nombre')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="tipoactividad">Tipo de actividad</label>
                            <div class="">
                                <select class="custom-select" class="@error('tipoactividad') is-invalid @enderror " name="tipoactividad" id="tipoactividad" required>
                                    <option selected disabled value="">Selecciona una actividad</option>
                                    <option value="Llamadas">Llamadas</option>
                                    <option value="Correo">Correo</option>
                                    <option value="Reunion">Reunion</option>
                                    <div class="valid-feedback">
                                        Correcto!
                                    </div>
                                    @error('tipoactividad')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="" class="col-sm-2-12 col-form-label">Seleccione un usuario</label>
                            <div class="">
                                <select class="form-control  @error('usuario_id') is-invalid @enderror" name="usuario_id"
                                    id="usuario_id">
                                    @foreach ($usuarios as $usuario)
                                        <option value="{{ $usuario->id }}">
                                            {{ $usuario->nombre }}
                                        </option>
                                    @endforeach
                                    <div class="valid-feedback">
                                        Correcto!
                                    </div>
                                    @error('usuarios_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="fecha">Fecha</label>
                            <div class="">
                                <input type="date" class="form-control @error('fecha')  @enderror " name="fecha" id="fecha" required>
                                <div class="valid-feedback">
                                    Correcto!
                                </div>
                                @error('fecha')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="nota">Nota</label>
                            <div class="">
                                <textarea type="text" required class="form-control @error('nota')  @enderror" name="nota" id="nota"></textarea>
                                <div class="valid-feedback">
                                    Correcto!
                                </div>
                                @error('nota')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
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
    var table = $('#actividades').DataTable({
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "autoWidth": false,
        language: {
            url: "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json",
        },
        "ajax": "{{ route('actividades.datatables') }}",
        "columns": [{
                data: 'id',
            },
            {
                data: 'nombre',
            },
            {
                data: 'tipoactividad',
            },
            {
                data: 'fecha',
            },
            {
                data: 'nota'
            },
            {
                data: 'usuario.nombre'
            },
            {
                data: 'id',
                render: function(data, type, full, meta) {
                    return `
                    <a href="javascript:void(0)" data-toggle="tooltip" data-id="${data}" data-original-title="Edit" class="edit btn-sm edit">
                        <img src="/img/editar.svg" width="20px">
                    </a>
                    <a href="javascript:void(0)" data-toggle="tooltip" data-id="${data}" data-original-title="Delete" class="delete">
                        <img src="/img/basurero.svg" width="20px">
                    </a> 
                    `
                }
            }
        ]
    })

    function reloadTable() {
        $('#actividades').DataTable().ajax.reload();
    }
</script>

<script>
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#addNewActividad').click(function() {
            $('#btn-save').val('create-Actividad');
            $('#id').val("");
            $('#addEditActividadForm').trigger("reset");
            $('#ajaxActividadModel').html("Registrar actividad");
            $('#ajax-actividad-model').modal('show');
        });

        $('body').on('click', '.edit', function() {
            var id = $(this).data('id');
            $.get('editar_actividad/' + id, function(data) {
                $('#ajaxActividadModel').html("Editar actividad");
                $('#btn-save').val("edit-actividad");
                $('#ajax-actividad-model').modal("show");
                $('#id').val(data.id);
                $('#nombre').val(data.nombre);
                $('#tipoactividad').val(data.tipoactividad);
                $('#fecha').val(data.fecha);
                $('#nota').val(data.nota);
                $('#usuario_id').val(data.usuario_id);
            })
        })

        $('form').submit(function(e) {
            e.preventDefault();
            var formData = new FormData($(this)[0]);
            $.ajax({
                data: formData,
                url: "{{ route('store_actividad') }}",
                type: "POST",
                contentType: false,
                processData: false,
                dataType: "json",
                success: function(data) {
                    $('#addEditActividadForm').trigger('reset');
                    $(this).html('Enviando...');
                    $('#ajax-actividad-model').modal('hide');
                    table.draw();
                },
                error: function(data) {
                    console.log('Error: ', data);
                    $('#btn-save').html('Guardar');
                }
            });
        });

        $('body').on('click', '.delete', function() {
            Swal.fire({
                title: '¿Estás seguro?',
                text: '¡La actividad se eliminará definitivamente!',
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
                        type: "DELETE",
                        url: "{{ url('destroy_actividad') }}" + "/" + id,
                        data: {
                            id: id
                        },
                        dataType: 'json',
                        success: function(res) {
                            table.draw();
                        }
                    });
                }
            })
        });
    });
</script>

<script>
    $(document).ready(function() {
        $("#addEditActividadForm").validate({
            rules: {
                nombre: {
                    required: true
                },
                tipoactividad: {
                    required: true
                },
                fecha: {
                    required: true
                },
                nota: {
                    required: true
                }
            },
            messages: {
                nombre: {
                    required: "El nombre es requerido"
                },
                tipoactividad: {
                    required: "El campo tipo actividad es requerido"
                },
                fecha: {
                    required: "El campo fecha es requerido"
                },
                nota: {
                    required: "El campo nota es requerido"
                }
            }
        })
    })
</script>
<script>
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>