@include('layouts.admin')

<div class="main my-3">
    <div class="main-content">
        <div class="container-fluid col-md-10">
            <div class="card">
                <div class="card-header">
                    <span>Gestión de servicios</span>
                </div>
                <div class="card-body">
                    <button type="button" id="addNewServicio" class="btn btn-primary"><i class="fas fa-plus"></i>
                        Agregar servicio</button>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-inverse mt-3 responsive" id="servicios">
                        <thead class="thead-inverse striped responsive">
                            <tr>
                                <th>Clave</th>
                                <th>Nombre</th>
                                <th>Precio inicial</th>
                                <th>Descripcion</th>
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
<div class="modal fade" id="ajax-servicio-model" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="ajaxServicioModel"></h4>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0)" id="addEditServicioForm" name="addEditServicioForm" class="form-horizontal needs-validation" novalidate method="POST">
                    <div class="row">
                        <input type="hidden" name="id" id="id">
                        <div class="col-md-6">
                            <label for="name" class="col-sm-1-12 control-label">Nombre</label>
                            <div class="col-sm-12">
                                <input type="text" required class="form-control @error('nombre')  @enderror" id="nombre" name="nombre">
                                <div class="valid-feedback">
                                    Correcto!
                                </div>
                                @error('nombre')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="precio_inicial" class="col-sm-1-12 control-label">Precio inicial</label>
                            <div class="col-sm-12">
                                <div class="input-group mb-2">
                                    <div class="">
                                        <div class="input-group-text">$</div>
                                    </div>
                                    <input type="number" class="form-control @error('precio_inicial')  @enderror"
                                        id="precio_inicial" name="precio_inicial" required>
                                </div>
                                <div class="valid-feedback">
                                    Correcto!
                                </div>
                                @error('precio_inicial')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="descripcion" class="col-sm-2-12 control-label">Descripcion</label>
                            <div class="col-sm-12">
                                <textarea type="text" class="form-control @error('descripcion')  @enderror" id="descripcion" name="descripcion" required></textarea>
                                <div class="valid-feedback">
                                    Correcto!
                                </div>
                                @error('descripcion')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
<<<<<<< HEAD
                        <div class="col-md-6">
                            <label for="precio_inicial" class="col-sm-1-12 control-label">Precio inicial</label>
                            <div class="col-sm-12">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">$</div>
                                    </div>
                                    <input type="number" class="form-control @error('precio_inicial')  @enderror" id="precio_inicial" name="precio_inicial" required>
                                    <div class="valid-feedback">
                                        Correcto!
                                    </div>
                                    @error('precio_inicial')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="precio_final" class="col-sm-1-12 control-label">Precio final</label>
                            <div class="col-sm-12">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">$</div>
                                    </div>
                                    <input type="number" class="form-control @error('precio_final')  @enderror" id="precio_final" name="precio_final" required>
                                    <div class="valid-feedback">
                                        Correcto!
                                    </div>
                                    @error('precio_final')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
=======
>>>>>>> 8aab18893d023dcfdd3110e421025d882b29cfbe
                    </div>
                    <div class="float-right my-4">
                        <button type="submit" class="btn btn-primary" id="btn-save" value="btn-save">Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end bootstrap model -->

<script>
    var table = $('#servicios').DataTable({
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
                data: 'precio_inicial',
            },
            {
                data: 'descripcion',
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
        $('#servicios').DataTable().ajax.reload();
    }
</script>

<script>
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#addNewServicio').click(function() {
            $('#btn-save').val('create-Servicio');
            $('#id').val("");
            $('#addEditServicioForm').trigger("reset");
            $('#ajaxServicioModel').html("Registrar servicio");
            $('#ajax-servicio-model').modal('show');
        });

        $('body').on('click', '.edit', function() {
            var id = $(this).data('id');
            $.get('editar_servicio/' + id, function(data) {
                $('#ajaxServicioModel').html("Editar servicio");
                $('#btn-save').val("edit-servicio");
                $('#ajax-servicio-model').modal("show");
                $('#id').val(data.id);
                $('#nombre').val(data.nombre);
                $('#precio_inicial').val(data.precio_inicial);
                $('#descripcion').val(data.descripcion);
            })
        })

        $('form').submit(function(e) {
            e.preventDefault();
            var formData = new FormData($(this)[0]);
            $.ajax({
                data: formData,
                url: "{{ route('store_servicio') }}",
                type: "POST",
                contentType: false,
                processData: false,
                dataType: "json",
                success: function(data) {
                    $('#addEditServicioForm').trigger('reset');
                    $(this).html('Enviando...');
                    $('#ajax-servicio-model').modal('hide');
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
                text: '¡El servicio se eliminará definitivamente!',
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
                        url: "{{ url('destroy_servicio') }}" + "/" + id,
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
        $("#addEditServicioForm").validate({
            rules: {
                nombre: {
                    required: true
                },
                precio_inicial: {
                    required: true
                },
                descripcion: {
                    required: true
                }
            },
            messages: {
                nombre: {
                    required: "El nombre es requerido"
                },
                precio_inicial: {
                    required: "El precio inicial es requerido"
                },
                descripcion: {
                    required: "El campo descripcion es requerido"
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