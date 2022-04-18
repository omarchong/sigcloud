@include('layouts.admin')

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
                data: 'ordenpagos.folio'
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
                    <a href="/seguimientofacturas/${data}/edit" class="btn"
                    ${full.deleted_at ? 'hidden' : ''}>
                    <img src="/img/editar.svg" width="20px">
                    <a href="/seguimientofacturas/${data}/delete" class="btn"
                    ${full.deleted_at ? 'hidden' : ''}>
                    <img src="/img/basurero.svg" width="20px">
                    </a>
                    `
                }
            }
        ]
    })

    function reloadTable() {
        $('#seguimientofacturas').DataTable().ajax.reload();
    }
</script>
