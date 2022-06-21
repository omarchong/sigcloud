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
                                <th>Nombre empresa</th>
                                <th>Contacto 1</th>
                                <th>Tipo cliente</th>
                                <th>Giro comercial</th>
                                <th>Estatus cliente</th>
                                <th>Operaciones</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                    <script>
                            var table = $("#clientes").DataTable({
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
                                    }, {
                                        data: 'contactos.contacto1'
                                    },
                                    {
                                        data: 'tipocliente'
                                    },
                                    {
                                        data: 'giros.nombre'
                                    },
                                    {
                                        data: 'estatuscliente',
                                    }, {
                                        data: 'id',
                                        render: function(data, type, full, meta) {
                                            return `
                                                <a href="/clientes/${data}/edit" class="btn">
                                                    <img src="/img/editar.svg" width="20px">
                                                </a>
                                                <a href="javascript:void(0)" data-toggle="tooltip" data-id="${data}" 
                                                data-original-title="Delete" class="deleteclientes">
                                                <img src="/img/basurero.svg" width="20px"></a>
                                        `
                                        }
                                    }
                                ]
                            });
                        

                        function reloadTable() {
                            $('#clientes').DataTable().ajax.reload();

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
        $('body').on('click', '.deleteclientes', function() {
            Swal.fire({
                title: '¿Estás seguro?',
                text: '¡El cliente se eliminará definitivamente!',
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
                        url: "{{ url('destroy_clientes') }}" + "/" + id,
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