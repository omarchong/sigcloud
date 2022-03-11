@include('layouts.admin')


<div class="main col-md-12 mt-5 encabezado">
    <div class="main-content">
        <div class="panel panel-headline">
            <div class="card">
                <div class="container col-md-12 my-4">
                    <a href="{{ route('contactos.create') }}" class="btn btn-primary"> Agregar Contacto</a>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-inverse mt-3 responsive" id="contactos">
                        <thead class="thead-inverse striped responsive" id="contactos">
                            <tr>
                                <th>Clave</th>
                                <th>Nombre</th>
                                <th>Telefono</th>
                                <th>Servicio</th>
                                <th>Operaciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>

                    <script>
                        $('#contactos').DataTable({
                            "responsive": true,
                            "processing": true,
                            "serverSide": true,
                            "autoWidth": false,
                            language: {
                                url: "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json",
                            },
                            "ajax": "{{route('contactos.datatables')}}",
                            "columns": [{
                                    data: 'id',
                                },
                                {
                                    data: 'email',
                                },
                                {
                                    data: 'telefono',
                                },
                                {
                                    data: 'descripcion',
                                },

                            ]

                        });

                        function reloadTable() {
                            $('#contactos').DataTable().ajax.reload();
                        }
                    </script>

                </div>
            </div>
        </div>
    </div>
</div>
