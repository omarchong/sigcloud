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
                                <th>Descripcion</th>
                                <th>Precio inicial</th>
                                <th>Precio final</th>
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
                <form action="javascript:void(0)" id="addEditServicioForm" name="addEditServicioForm"
                    class="form-horizontal needs-validation" novalidate method="POST">
                    <div class="row">
                        <input type="hidden" name="id" id="id">
                        <div class="col-md-12">
                            <label for="name" class="col-sm-1-12 control-label">Nombre</label>
                            <div class="col-sm-12">
                                <input type="text" required class="form-control @error('nombre')  @enderror" id="nombre"
                                    name="nombre">
                                <div class="valid-feedback">
                                    Correcto!
                                </div>
                                @error('nombre')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="descripcion" class="col-sm-2-12 control-label">Descripcion</label>
                            <div class="col-sm-12">
                                <textarea type="text" class="form-control @error('descripcion')  @enderror" id="descripcion" name="descripcion"
                                    required></textarea>
                                <div class="valid-feedback">
                                    Correcto!
                                </div>
                                @error('descripcion')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="precio_inicial" class="col-sm-1-12 control-label">Precio inicial</label>
                            <div class="col-sm-12">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">$</div>
                                    </div>
                                    <input type="number" class="form-control @error('precio_inicial')  @enderror"
                                        id="precio_inicial" name="precio_inicial" required>
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
                                    <input type="number" class="form-control @error('precio_final')  @enderror"
                                        id="precio_final" name="precio_final" required>
                                    <div class="valid-feedback">
                                        Correcto!
                                    </div>
                                    @error('precio_final')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="float-right my-4">
                        <button type="submit" class="btn btn-primary" id="btn-save" value="addNewServicio">Guardar
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
                data: 'descripcion',
            },
            {
                data: 'precio_inicial',
            },
            {
                data: 'precio_final'
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
            $('#addEditServicioForm').trigger("reset");
            $('#ajaxServicioModel').html("Registrar servicio");
            $('#ajax-servicio-model').modal('show');
        });

        $('body').on('click', '.edit', function() {
            var id = $(this).data('id');
            $.ajax({
                type: "POST",
                url: "{{ url('edit-servicio') }}",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {
                    $('#ajaxServicioModel').html("Editar servicio");
                    $('#ajax-servicio-model').modal('show');
                    $('#id').val(res.id);
                    $('#nombre').val(res.nombre);
                    $('#descripcion').val(res.descripcion);
                    $('#precio_inicial').val(res.precio_inicial);
                    $('#precio_final').val(res.precio_final);
                    table.draw();
                }
            });

        });

        $('body').on('click', '.delete', function(e) {
            e.preventDefault();
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
                        type: "POST",
                        url: "{{ url('delete-servicio') }}",
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

        $('body').on('click', '#btn-save', function(event) {
            var id = $("#id").val();
            var nombre = $("#nombre").val();
            var descripcion = $("#descripcion").val();
            var precio_inicial = $("#precio_inicial").val();
            var precio_final = $("#precio_final").val();
            $("#btn-save").html('Espere porfavor...');
            $("#btn-save").attr("disabled", false);
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
                dataType: 'json',
                success: function(res) {
                    window.location.reload();
                    table.draw();
                    $("#btn-save").html('Submit');
                    $("#btn-save").attr("disabled", false);
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $("#addEditServicioForm").validate({
            rules: {
                nombre: {
                    required: true
                },
                descripcion: {
                    required: true
                },
                precio_inicial: {
                    required: true
                },
                precio_final: {
                    required: true
                }
            },
            messages: {
                nombre: {
                    required: "El nombre es requerido"
                },
                descripcion: {
                    required: "El campo descripcion es requerido"
                },
                precio_inicial: {
                    required: "El precio inicial es requerido"
                },
                precio_final: {
                    required: "El precio final es requerido"
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
