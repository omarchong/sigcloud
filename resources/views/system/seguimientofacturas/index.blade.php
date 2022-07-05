@include('layouts.admin')
<!-- estilos buscador tiempo real -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" integrity="sha512-aOG0c6nPNzGk+5zjwyJaoRUgCdOrfSDhmMID2u4+OIslr0GjpLKo7Xm0Ao3xmpM4T8AmIouRkqwj1nrdVsLKEQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />


<div class="main my-3">
    <div class="main-content">
        <div class="container-fluid col-md-10">
            <div class="card">
                <div class="card-header">
                    <span>Gestión de seguimiento de facturas</span>
                </div>
                <div class="card-body">
                    <a href="{{ route('seguimientofacturas.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i>
                        Agregar seguimiento de factura</a>
                </div>
                {{-- <div class="card-body">
                    <button type="button" id="addNewSegFactura" class="btn btn-primary"><i class="fas fa-plus"></i>
                        Agregar</button> --}}
                </div>
                <div class="card-body">
                    <table class="table table-striped table-inverse mt-3 responsive" id="seguimientofacturas">
                        <thead class="thead-inverse striped responsive">
                            <tr>
                                <th>Clave</th>
                                <th>Folio</th>
                                <th>Fecha</th>
                                <th>Numero de pago</th>
                                <th>Vencimiento</th>
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
    var table = $('#seguimientofacturas').DataTable({
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "autoWidth": false,
        language: {
            url: "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json",
        },
        "ajax": "{{ route('seguimientofacturas.datatables') }}",
        "columns": [{
                data: 'id',
            },
            {
                data: 'ordenpagos.cotizacion_id'
            },
            {
                data: 'factura_creada'
            },
            {
                data: 'num_pago'
            },
            {
                data: 'fecha_vencimiento'
            },
            {
                data: 'estatufacturas.nombre'
            },
            {
                data: 'id',
                render: function(data, type, full, meta) {
                    return `
                    <a href="/seguimientofacturas/${data}/edit" class="btn">
                    <img src="/img/editar.svg" width="20px">
                    <a href="javascript:void(0)" data-toggle="tooltip" data-id="${data}" 
                    data-original-title="Delete" class="deletesegf">
                    <img src="/img/basurero.svg" width="20px"></a>
                    `
                }
            }
        ]
    })

    function reloadTable() {
        $('#seguimientofacturas').DataTable().ajax.reload();
    }
</script>
<script>
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $('body').on('click', '.deletesegf', function() {
            Swal.fire({
                title: '¿Estás seguro?',
                text: '¡El registro se eliminará definitivamente!',
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
                        url: "{{ url('destroy_segf') }}" + "/" + id,
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