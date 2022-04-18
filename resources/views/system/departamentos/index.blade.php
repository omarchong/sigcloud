@include('layouts.admin')
<div class="main my-3">
    <div class="main-content">
        <div class="container-fluid col-md-10">
            <div class="card">
                <div class="card-header">
                    <span>Gestión de departamentos</span>
                </div>
                <div class="card-body">
                    <button type="button" id="createNewDepartament" class="btn btn-primary"><i class="fas fa-plus"></i>
                        Agregar
                        departamento</button>
                </div>
                <div class="card-body">
                    <table class="table  table-striped table-inverse mt-3 responsive" id="departaments">
                        <thead class="thead-inverse striped responsive">
                            <tr>
                                <th>Clave</th>
                                <th>Abreviatura</th>
                                <th>Nombre</th>
                                <th>Estatus</th>
                                <th>N.empleados</th>
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

<!-- modal-departaments -->

<div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="ajaxDepartamentoModel">Registrar departamento</h4>
            </div>
            <div class="modal-body">
                <form action="" id="DepartamentForm" name="DeapartamentForm" class="form-vertical needs-validation" novalidate>
                    <input type="hidden" name="id" id="id">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Abreviatura</label>
                            <div class="">
                                <input type="tex" required class="form-control @error ('abreviatura') @enderror" name="abreviatura" id="abreviatura">
                                <div class="valid-feedback">
                                    Correcto!
                                </div>
                                @error('abreviatura')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="">Nombre</label>
                            <div class="">
                                <input type="tex" required class="form-control @error('nombre') @enderror" name="nombre" id="nombre">
                                <div class="valid-feedback">
                                    Correcto!
                                </div>
                                @error('nombre')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="">Descripcion</label>
                            <div class="">
                                <input type="tex" required class="form-control @error('descripcion') @enderror" name="descripcion" id="descripcion">
                                <div class="valid-feedback">
                                    Correcto!
                                </div>
                                @error('descripcion')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="">Estatus</label>
                            <div class="">
                                <input type="tex" required class="form-control @error('estatus') @enderror" name="estatus" id="estatus">
                                <div class="valid-feedback">
                                    Correcto!
                                </div>
                                @error('estatus')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="">N.empleados</label>
                            <div class="">
                                <input type="number" required class="form-control @error('n_empleados') @enderror" name="n_empleados" id="n_empleados">
                                <div class="valid-feedback">
                                    Correcto!
                                </div>
                                @error('n_empleados')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="float-right my-3">
                        <button type="submit" class="btn btn-primary" id="saveBtn" name="saveBtn" value="create">Guardar</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<!-- end-modal-departaments -->
<script>
    var table = $("#departaments").DataTable({
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "autoWidth": false,
        ajax: "",

        language: {
            url: "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json",
        },
        "columns": [{
                data: 'id',

            },
            {
                data: 'abreviatura',
            },
            {
                data: 'nombre',
            },
            {
                data: 'estatus',
            },
            {
                data: 'n_empleados',
            },
            {
                data: 'otros',
                name: 'otros',
                orderable: false,
                searchable: false
            },
        ]
    });

    function reloadTable() {
        $("#departaments").DataTable().ajax.reloadTable();
    }
</script>
<script>
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#createNewDepartament').click(function() {
            $('#saveBtn').val('create-Departament');
            $('#id').val("");
            $('#DepartamentForm').trigger("reset");
            $('#modelHeading').html("crear nuevo registros");
            $('#ajaxModel').modal("show");
        });

        /* update-departament */

        $('body').on('click', '.editDepartament', function() {
            var id = $(this).data('id');
            $.get('editar/' + id, function(data) {
                $('#modelHeading').html("Editar customer");
                $('#saveBtn').val("edit-departament");
                $('#ajaxModel').modal("show");
                $('#id').val(data.id);
                $('#abreviatura').val(data.abreviatura);
                $('#nombre').val(data.nombre);
                $('#descripcion').val(data.descripcion);
                $('#estatus').val(data.estatus);
                $('#n_empleados').val(data.n_empleados);
            })
        })
        /* create-departament */
        $('form').submit(function(e) {
            e.preventDefault();
            var formData = new FormData($(this)[0]);
            $.ajax({
                data: formData,
                url: "{{ route('store') }}",
                type: "POST",
                contentType: false,
                processData: false,
                dataType: "json",
                success: function(data) {
                    $('#DepartamentForm').trigger('reset');
                    $(this).html('Enviando ...');
                    $('#ajaxModel').modal('hide');
                    table.draw();
                },
                error: function(data) {
                    console.log('Error: ', data);
                    $('#saveBtn').html('Guardar cambio');
                }
            });
        });

        /* delete departament */

        $('body').on('click', '.deleteDepartament', function() {
            /* var id = $(this).data("id");
            if (confirm(`esta seguro de querer eliminar al departamento: ${id}`)) {
                $.ajax({
                    type: "DELETE",
                    url: "{{ url('destroy') }}" + "/" + id,
                    success: function(data) {
                        table.draw();
                    },
                    error: function(data) {
                        console.log("Error: ", data);
                    }

                });

            } else {} */
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡El departamento se eliminará definitivamente!",
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
                        url: "{{ url('destroy') }}" + "/" + id,
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
    })
</script>
<script>
    $(document).ready(function() {
        $("#DepartamentForm").validate({
            rules: {
                abreviatura: {
                    required: true
                },
                nombre: {
                    required: true,
                },
                descripcion: {
                    required: true
                },
                estatus: {
                    required: true
                },
                n_empelados: {
                    required: true
                }
            },
            messages: {
                abreviatura: {
                    required: "Campo requerido"
                },
                nombre: {
                    required: "Campo requerido"
                },
                descripcion: {
                    required: "Campo requerido"
                },
                estatus: {
                    required: "Campo requerido"
                },
                n_empleados: {
                    required: "Campo requerido"
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