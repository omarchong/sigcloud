@include('layouts.admin')

<div class="main my-3">
    <div class="main-content">
        <div class="container-fluid col-md-10">
            <div class="card">
                <div class="card-header">
                    <span>Gestión de citas</span>
                </div>
                <div class="card-body">
                    <a href="{{ route('citas.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i>
                        Agregar cita</a>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-inverse mt-3 responsive" id="citas">
                        <thead class="thead-inverse striped responsive">
                            <tr>
                                <th>Clave</th>
                                <th>Nombre</th>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Nombre del usuario</th>
                                <th>Nombre del cliente</th>
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
    var table = $('#citas').DataTable({
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "autoWidth": false,
        language: {
            url: "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json",
        },
        "ajax": "{{ route('citas.datatables') }}",
        "columns": [{
                data: 'id',
            },
            {
                data: 'nombre',
            },
            {
                data: 'fecha'
            },
            {
                data: 'hora'
            },
            {
                data: 'usuarios.nombre'
            },
            {
                data: 'clientes.nombreempresa'
            },
            {
                data: 'estatucitas.nombre'
            },
            {
                data: 'id',
                render: function(data, type, full, meta) {
                    return `
                    <a href="/citas/${data}/edit" class="btn"
                    ${full.deleted_at ? 'hidden' : ''}>
                    <img src="/img/editar.svg" width="20px">
                    <a href="/citas/${data}/delete" class="btn"
                    ${full.deleted_at ? 'hidden' : ''}>
                    <img src="/img/basurero.svg" width="20px">
                    </a>
                    `
                }
            }
        ]
    })

    function reloadTable() {
        $('#citas').DataTable().ajax.reload();
    }
</script>
