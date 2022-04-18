@include('layouts.admin')

<div class="main my-3">
    <div class="main-content">

        <div class="container-fluid col-md-10">
            <div class="card">
                <div class="card-header">
                    <span>Gestión de estatus de las citas</span>
                </div>
                <div class="card-body">
                    <button type="button" id="addNewEstatucita" class="btn btn-primary"><i class="fas fa-plus"></i>
                        Agregar estatus citas</button>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-inverse mt-3 responsive" id="estatucitas">
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
<div class="modal fade" id="ajax-estatucita-model" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="ajaxEstatucitaModel"></h4>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0)" id="addEditEstatucitaForm" name="addEditEstatucitaForm"
                    class="form-vertical needs-validation" method="POST" novalidate>
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Nombre</label>
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

                    <div class="float-right my-4">
                        <button type="submit" class="btn btn-primary" id="btn-save" value="addNewEstatucita">Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end bootstrap model -->

<script>
    var table = $('#estatucitas').DataTable({
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "autoWidth": false,
        ajax:"",
        language: {
            url: "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json",
        },
        "columns": [{
                data: 'id',
            },
            {
                data: 'nombre',
            }, 
            {data: 'action', 
            name: 'action', 
            orderable: false, 
            searchable: false},
        ]
    })

    function reloadTable() {
        $('#citas').DataTable().ajax.reload();
    }
</script>
<script>
    $(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#addNewEstatucita').click(function() {
            $('#btn-save').val('create-Estatucita');
            $('#id').val("");
            $('#addEditEstatucitaForm').trigger("reset");
            $('#ajaxEstatucitaModel').html("Registrar estatus de la cita");
            $('#ajax-estatucita-model').modal('show');
        });

        $('body').on('click', '.edit', function() {
            var id = $(this).data('id');
            $.get('editar_estatucita/' + id, function(data) {
                $('#ajaxEstatucitaModel').html("Editar estatus de la cita");
                $('#btn-save').val("edit-estatucita");
                $('#ajax-estatucita-model').modal("show");
                $('#id').val(data.id);
                $('#nombre').val(data.nombre);
            })
        })

        $('form').submit(function(e) {
            e.preventDefault();
            var formData = new FormData($(this)[0]);
            $.ajax({
                data: formData,
                url: "{{ route('store_estatucita') }}",
                type: "POST",
                contentType: false,
                processData: false,
                dataType: "json",
                success: function(data) {
                    $('#addEditEstatucitaForm').trigger('reset');
                    $(this).html('Enviando...');
                    $('#ajax-estatucita-model').modal('hide');
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
                text: '¡El estatus se eliminará definitivamente!',
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
                        url: "{{ url('destroy_estatucita') }}" + "/" + id,
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
        $("#addEditEstatucitaForm").validate({
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
