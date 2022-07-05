@include('layouts.admin')

<div class="main my-3">
    <div class="main-content">

        <div class="container-fluid col-md-10">
            <div class="card">
                <div class="card-header">
                    <span>Gestionar usuarios</span>
                </div>
                <div class="card-body">
                    <a href="{{ route('usuarios.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Agregar
                        usuario</a>
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
                            @foreach ($usuarios as $usu)
                                <tr>
                                    <td>{{ $usu->id }}</td>
                                    <td>
                                        @if ($usu->imagen == null)
                                            <img class="rounded-circle mx-auto d-block"
                                                    src="{{ asset('archivos/sinfoto.jpeg') }}" height="50"
                                                    width="50">
                                        @else
                                            <img class="rounded-circle mx-auto d-block"
                                                    src="{{ asset('archivos/' . $usu->imagen) }}" height="65"
                                                    width="65"> 
                                        @endif
                                    </td>
                                    <td>{{ $usu->nombre }}</td>
                                    <td>{{ $usu->usuario }}</td>
                                    <td>{{ $usu->email }}</td>
                                    <td>{{ $usu->estatus }}</td>
                                    <td>
                                        <a href="/usuarios/{{ $usu->id }}/edit" class="btn">
                                            <img src="/img/editar.svg" width="15px">

                                        </a>
                                        @if ($sessiontipo == 'admin')
                                            <a href="javascript:void(0)" data-toggle="tooltip"
                                                data-id="{{ $usu->id }}" data-original-title="Delete"
                                                class="deleteusuarios">
                                                <img src="/img/basurero.svg" width="20px">
                                            </a>
                                        @endif
                                        <a href="/usuarios/{{ $usu->id }}" class="btn">
                                            <i class="fas fa-eye"></i> </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- <script>
                        var table = $('#usuarios').DataTable({
                            "responsive": true,
                            "processing": true,
                            "serverSide": true,
                            "autoWidth": false,
                            language: {
                                url: "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json",
                            },
                            "ajax": "{{ route('usuarios.datatables') }}",
                            "columns": [
                                
                                
                                {
                                    data: 'id',
                                },
                                {
                                    data: 'imagen',
                                    render: function(data, type, full, meta) {
                                        const ImagenPorDefecto =
                                            `https://www.amaltasindia.in/UploadPhoto/no_img.jpg`;
                                        return `<img class="rounded-circle mx-auto d-block" src="${full.imagen ?  `/archivos/${full.imagen}` : ImagenPorDefecto}" width="100" height="80">`
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
                                },
                                {
                                    data: 'id',
                                    render: function(data, type, full, meta) {
                                        return `
                                        
                                        <a href="/usuarios/${data}/edit"
                                        class="btn">
                                        <img src="/img/editar.svg" width="15px">
                                        
                                        </a>
                                        @if ($sessiontipo == 'admin')
                                        <a href="javascript:void(0)" data-toggle="tooltip" data-id="${data}" 
                                        data-original-title="Delete" class="deleteusuarios">
                                        <img src="/img/basurero.svg" width="20px">
                                        </a>
                                        
                                        @endif
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
                    </script> --}}
                    <script>
                        var table = $('#usuarios').DataTable({
                            "responsive": true,
                            "processing": true,
                            "serverSide": false,
                            "autoWidth": false,
                            language: {
                                url: "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json",
                            }
                        });

                        function reloadTable() {
                            $('#usuarios').DataTable().ajax.reload();
                        }
                        $(function() {
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                            $('body').on('click', '.deleteusuarios', function() {
                                Swal.fire({
                                    title: '¿Estás seguro?',
                                    text: '¡El usuario se eliminará definitivamente!',
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
                                            url: "{{ url('destroy_usuarios') }}" + "/" + id,
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
                </div>
            </div>
        </div>
    </div>
</div>
