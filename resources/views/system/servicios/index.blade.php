@include('layouts.admin')



<div class="main col-md-12 mt-5 encabezado">
    <div class="main-content">
        <div class="panel panel-headline">
            <div class="panel-heading">
                <h3 class="panel-title">Reporte Servicios  /h3>
                
            </div>
            <div class="card-body">
                <table class="table table-striped table-inverse mt-3 responsive" id="servicios">
                    <thead class="thead-inverse striped responsive">
                        <tr>
                            <th class="text-center">Clave</th>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Descripcion</th>
                            <th class="text-center">Precio inicial</th>
                            <th class="text-center">Precio final</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <script>
                    $('#servicios').DataTable({
                        "responsive": true,
                        "processing": true,
                        "servierside": true,
                        "autoWidth": false,
                        language: {
                            url: "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json",
                        },
                        "ajax": "{{ route('servicios.datatables') }}",
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
                            }
                        ]
                    });

                    function reloadTable() {
                        $('#servicios').DataTable().ajax.reloadTable();
                    }
                </script>

                <!-- Button trigger modal -->
                <a href="{{ route('servicios.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i>
                    Registrar servicio</a>

            </div>
           
        </div>
    </div>
</div>
