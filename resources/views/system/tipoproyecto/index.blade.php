@include('layouts.admin')

<div class="main my-3">
    <div class="main-content">
        <div class="container-fluid col-md-10">
            <div class="card">
                <div class="card-header">
                    <span>Gestión de tipos de proyectos</span>
                </div>
                <div class="card-body">
                    <button type="button" id="addNewTipoproyecto" class="btn btn-primary"><i class="fas fa-plus"></i> Agregar
                        tipo de proyectos</button>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-inverse mt-3 responsive" id="tipoproyectos">
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
                </div>
            </div>
        </div>
    </div>
</div>

<!-- boostrap model -->
<div class="modal fade" id="ajax-tipoproyecto-model" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="ajaxTipoproyectoModel"></h4>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0)" id="addEditTipoproyectoForm" name="addEditTipoproyectoForm" class="form-horizontal needs-validation" method="POST" novalidate>
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Nombre</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control @error('nombre') @enderror" id="nombre" name="nombre" required>
                            <div class="valid-feedback">
                                Correcto!
                            </div>
                            @error('nombre')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="float-right my-4">
                        <button type="submit" class="btn btn-primary" id="btn-save" value="addNewTipoproyecto">Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end bootstrap model -->

<script>
    var table = $('#tipoproyectos').DataTable({
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
                data: 'nombre',
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            },
        ]
    })

    function reloadTable() {
        $('#tipoproyectos').DataTable().ajax.reload();
    }
</script>
<script type="text/javascript">
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#addNewTipoproyecto').click(function() {
            $('#btn-save').val('create-Tipoproyecto');
            $('#id').val("");
            $('#addEditTipoproyectoForm').trigger("reset");
            $('#ajaxTipoproyectoModel').html("Registrar tipo de proyecto");
            $('#ajax-tipoproyecto-model').modal('show');
        });

        $('body').on('click', '.edit', function() {
            var id = $(this).data('id');
            $.get('editar_tipoproyecto/' + id, function(data) {
                $('#ajaxTipoproyectoModel').html("Editar tipo de proyecto");
                $('#btn-save').val("edit-tipoproyecto");
                $('#ajax-tipoproyecto-model').modal("show");
                $('#id').val(data.id);
                $('#nombre').val(data.nombre);
            })
        })

        $('form').submit(function(e) {
            e.preventDefault();
            var formData = new FormData($(this)[0]);
            $.ajax({
                data: formData,
                url: "{{ route('store_tipoproyecto') }}",
                type: "POST",
                contentType: false,
                processData: false,
                dataType: "json",
                success: function(data) {
                    $('#addEditTipoproyectoForm').trigger('reset');
                    $(this).html('Enviando...');
                    $('#ajax-tipoproyecto-model').modal('hide');
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
                text: '¡El Tipo de proyecto se eliminará definitivamente!',
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
                        url: "{{ url('destroy_tipoproyecto') }}" + "/" + id,
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
        $("#addEditTipoproyectoForm").validate({
            rules: {
                nombre: {
                    required: true
                }
            },
            messages: {
                nombre: {
                    required: "El nombre es requerido"
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