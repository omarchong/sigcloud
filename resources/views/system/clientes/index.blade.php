@include('layouts.admin')

<div class="main my-3">
    <div class="main-content">
        <div class="container-fluid col-md-10">
            <div class="card">
                <div class="card-header">
                    <span>Gestionar Clientes</span>
                </div>
                <div class="card-body">
                    <a href="{{ route('clientes.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Agregar Cliente</a>
                </div>
                <div class="card-body">


                    <table class="table table-striped table-inverse mt-3 responsive" id="clientes">
                        <thead class="thead-inverse responsive">
                            <tr>
                                <th>Clave</th>
                                <th>Nombre</th>
                                <th>Telefono</th>
                                <th>Estatus</th>
                                <th>Operaciones</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                    <script>
                        $("#clientes").DataTable({
                            "responsive": true,
                            "processing": true,
                            "serverSide": true,
                            "autoWidth": false,
                            language: {
                                url: "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json",
                            },
                            "ajax": "{{ route('clientes.datatables') }}",
                            "columns": [{
                                    data: 'id',
                                },
                                {
                                    data: 'nombreempresa',
                                },
                                {
                                    data: 'estado',
                                },
                                {
                                    data: 'estatuscliente',
                                }, {
                                    data: 'id',
                                    render: function(data, type, full, meta) {
                                        return `
                                    
                                                <a href="/usuarios/${data}/edit"
                                                class="btn"
                                                ${full.deleted_at ? 'hidden' : ''}>
                                                <img src="/img/editar.svg" width="20px">
                                                <a href="/usuarios/${data}/show"
                                                class="btn"
                                                ${full.deleted_at ? 'hidden' : ''}>
                                                <img src="/img/basurero.svg" width="20px">
                                                </a>
                                    `
                                    }
                                }
                            ]
                        })

                        function reloadTable() {
                            $('#clientes').DataTable().ajax.reload();

                        }
                    </script>
                </div>
            </div>



        </div>
    </div>
</div>