@include('layouts.admin')

<div class="main my-3">
    <div class="main-content">

        <div class="container-fluid col-md-10">
            <div class="card">
                <div class="card-header">
                    <span>Gestionar usuarios</span>
                </div>
                <div class="card-body">
                    <a href="{{ route('usuarios.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Agregar usuario</a>
                </div>

                <div class="card-body">
                    <table class="table table-striped table-inverse mt-3 responsive" id="usuarios">
                        <thead class="thead-inverse striped responsive">
                            <tr>
                                <th>Clave</th>
                                <th>Imagen</th>
                                <th>Nombre</th>
                                <th>Usuario</th>
                                <th>Email</th>
                                <th>Estatus</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    <script>
                        $('#usuarios').DataTable({
                            "responsive": true,
                            "processing": true,
                            "serverSide": true,
                            "autoWidth": false,
                            language: {
                                url: "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json",
                            },
                            "ajax": "{{ route('usuarios.datatables') }}",
                            "columns": [{
                                    data: 'id',
                                },
                                {
                                    data: 'imagen',
                                    render: function(data, type, full, meta) {
                                        const ImagenPorDefecto =
                                            `https://www.amaltasindia.in/UploadPhoto/no_img.jpg`;
                                            return `<img src="${full.imagen ?  `/archivos/${full.imagen}` : ImagenPorDefecto}" width="100" height="80">`
                                        /* const ImagenPorDefecto =
                                            `https://www.amaltasindia.in/UploadPhoto/no_img.jpg`;
                                        return `<img src="${full.imagen ?  `/imagen/${full.imagen}` : ImagenPorDefecto}" width="100" height="80">` */
                                    }

                                },
                                {
                                    data: 'nombre',
                                    render: function(data, type, full, meta) {
                                        return `${data} ${full.app} ${full.apm}`;
                                    }
                                   
                                },
                                {
                                    data: 'usuario',
                                },
                                {
                                    data: 'email',
                                },
                                {
                                    data: 'estatus'
                                }, {
                                    data: 'id',
                                    render: function(data, type, full, meta) {
                                        return `
                                    
                                                <a href="/usuarios/${data}/edit"
                                                class="btn">
                                                <img src="/img/editar.svg" width="15px">
                                                
                                                </a>

                                                <a href="/usuarios/${data}/show"
                                                class="btn">
                                                <img src="/img/basurero.svg" width="15px">
                                                </a>

                                                <a href="/usuarios/${data}"
                                                class="btn">
                                                 <i class="fas fa-eye"></i> </a>
                                    `
                                    }
                                }

                            ]


                        })

                        function reloadTable() {
                            $('#usuarios').DataTable().ajax.reload();
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>