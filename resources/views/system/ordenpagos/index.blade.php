@include('layouts.admin')

<div class="main my-3">
    <div class="main-content">
        <div class="container-fluid col-md-10">
            <div class="card">
                <div class="card-header">
                    <span>Gestión de orden de pagos</span>
                </div>
                <div class="card-body">
                    <a href="{{route('orden.create')}}" class="btn btn-primary"> <i class="fas fa-plus"></i>
                        Agregar orden</a>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-inverse mt-3 responsive" id="ordenpagos">
                        <thead class="thead-inverse striped responsive">
                            <tr>
                                <th>Clave</th>
                                <th>Folio</th>
                                <th>Num. pago</th>
                                <th>Emite</th>
                                <th>Fecha limite</th>
                                <th>Estatus</th>
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

<script>
    var table = $('#ordenpagos').DataTable({
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "autoWidth": false,
        language: {
            url: "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json",
        },
        "ajax": "{{ route('ordenpagos.datatables') }}",
        "columns": [{
                data: 'id',
            },
            {
                data: 'folio'
            },
            {
                data: 'num_pago'
            },
            {
                data: 'emite'
            },
            {
                data: 'fecha_limite'
            },
            {
                data: 'estatuorden.nombre'
            },
            {
                data: 'id',
                render: function(data, type, full, meta) {
                    return `
                    <a href="#" class="btn">
                    <img src="/img/editar.svg" width="20px">
                    <a href="javascript:void(0)" data-toggle="tooltip" data-id="${data}" 
                    data-original-title="Delete" class="deleteorden">
                    <img src="/img/basurero.svg" width="20px"></a>
                    `
                }
            }
        ]
    })

    function reloadTable() {
        $('#ordenpagos').DataTable().ajax.reload();
    }
</script>
<script>
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('body').on('click', '.deleteorden', function() {
            Swal.fire({
                title: '¿Estás seguro?',
                text: '¡El orden de pago se eliminará definitivamente!',
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
                        url: "{{ url('destroy_orden') }}" + "/" + id,
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