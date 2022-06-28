@include('layouts.admin')

<div class="main my-3">
    <div class="main-content">
        <div class="container-fluid col-md-10">
            <div class="card">
                <div class="card-header">
                    <span>Gestionar Cotizaciones</span>
                </div>
                <div class="card-body">
                    <a href="{{ route('cotizaciones.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Crear Cotización</a>
                    <!-- <a href="{{url('coti') }}"><button class="btn btn-danger"><i class="fas fa-file-pdf"></i></button></a> -->

                </div>
                <div class="card-body">


                    <table class="table table-striped table-inverse mt-3 responsive" id="cotizaciones">
                        <thead class="thead-inverse responsive">
                            <tr>
                                <th>Clave</th>
                                <th>Nombre empresa</th>
                                <th>Nombre proyecto</th>
                                <th>Fecha estimada de entrega</th>
                                <th>Estatus</th>
                                <th>Operaciones</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                    <script>
                        var table = $("#cotizaciones").DataTable({
                            "responsive": true,
                            "processing": true,
                            "serverSide": true,
                            "autoWidth": false,
                            language: {
                                url: "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json",
                            },
                            "ajax": "{{ route('cotizaciones.datatables') }}",
                            "columns": [{
                                    data: 'id',
                                },
                                {
                                    data: 'clientes.nombreempresa',
                                },
                                {
                                    data: 'nombre_proyecto',
                                },
                                {
                                    data: 'fecha_estimadaentrega',
                                },
                                {
                                    data: 'estatucotizacion.nombre'
                                },
                                {
                                    data: 'id',
                                    render: function(data, type, full, meta) {
                                        return `
                                    
                                                <a href="/cotizaciones/${data}/edit"
                                                class="btn">
                                                <img src="/img/editar.svg" width="20px"> </a>

                                                <a href="/cotizaciones/${data}"
                                                class="btn btn-info">
                                                 <i class="fas fa-eye"></i> </a>

                                                <a href="/coti/${data}"
                                                class="btn">
                                                <img src="/img/mail.svg" width="35px"></i>
                                                </a>

                                                <a href="javascript:void(0)" data-toggle="tooltip" data-id="${data}" 
                                                data-original-title="Delete" class="deletecotizaciones">
                                                    <img src="/img/basurero.svg" width="20px">
                                                </a>
                                    `
                                    }
                                }
                            ]
                        })

                        function reloadTable() {
                            $('#cotizaciones').DataTable().ajax.draw();

                        }
                    </script>
                </div>
            </div>



        </div>
    </div>
</div>

<script>
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('body').on('click', '.deletecotizaciones', function() {
            Swal.fire({
                title: '¿Estás seguro?',
                text: '¡La cotización se eliminará definitivamente!',
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
                        url: "{{ url('destroy_cotizaciones') }}" + "/" + id,
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