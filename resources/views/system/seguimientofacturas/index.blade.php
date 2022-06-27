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

<div class="modal fade" id="ajax-segfactura-model" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="ajaxSegFacturaModel"></h4>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0)" id="addEditSegFacturaForm" name="addEditSegFacturaForm" class="form-horizontal needs-validation" novalidate method="POST">
                    <input type="hidden" name="id" id="id">
                    <div class="form-row">
                        <div class="col-md-12">
                            <label for="">Buscar folio</label>
                            <div class="input-group">
                                <input type="search" required name="buscarfolio" id="buscarfolio" 
                                class="form-control @error('ordenpagos_id')  @enderror" placeholder="Buscar folio..." aria-label="Search">
                                <span class="input-group-btn">
                                    <button type="button" id="selectFolio" class="btn btn-primary">
                                        Seleccionar
                                    </button>
                                </span>
                            </div>
                            <div class="valid-feedback">
                                Correcto!
                            </div>
                            @error('ordenpagos_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <input type="hidden" readonly class="form-control" name="ordenpagos_id" id="ordenpagos_id">
                        <div class="col-md-4">
                            <label for="" class="col-sm-4-12 col-form-label"> Folio</label>
                            <div class="form-group">
                                <input type="text" readonly class="form-control" name="folio" id="folio">
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <label for="fecha" class="col-sm-4-12 col-form-label">Factura creada</label>
                            <div class="">
                                <input type="date" class="form-control" value="<?php echo date("Y-m-d") ?>" name="" id="" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="nombre" class="col-sm-4-12 col-form-label">Cantidad total</label>
                            <div class="">
                                <input type="number" readonly required class="form-control" name="cantidadtotal" id="cantidadtotal" step="0.01" oninput="calcular()">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="" class="col-sm-4-12 col-form-label"> Emite</label>
                            <div class="form-group">
                                <input type="text" readonly class="form-control" name="emite" id="emite">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="" class="col-sm-4-12 col-form-label"> Numero de pagos</label>
                            <div class="form-group">
                                <input type="number" class="form-control" name="num_pago" id="num_pago" step="0.01" oninput="calcular()">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="nombre" class="col-sm-4-12 col-form-label">Saldo restante</label>
                            <div class="">
                                <input type="text" required class="form-control" name="saldorestante" id="saldorestante">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label for="fecha" class="col-sm-4-12 col-form-label">Fecha de vencimiento</label>
                            <div class="">
                                <input type="date" class="form-control" name="" id="" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label for="" class="col-sm-4-12 col-form-label">Seleccione el estatus</label>
                            <div class="">
                                <select class="form-control  @error('estatufacturas_id') is-invalid @enderror"
                                    name="estatufacturas_id" id="estatufacturas_id">
                                    @foreach ($estatufacturas as $estatufactura)
                                        <option value="{{ $estatufactura->id }}">
                                            {{ $estatufactura->nombre }}
                                        </option>
                                    @endforeach
                                    <div class="valid-feedback">
                                        Correcto!
                                    </div>
                                    @error('estatufacturas_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="float-right my-3">
                        <button type="submit" class="btn btn-primary" id="btn-save" value="addNewSegFactura">Guardar</button>
                    </div>
                </form>
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

        $('#addNewSegFactura').click(function() {
            $('#btn-save').val('create-SegFactura');
            $('#id').val("");
            $('#addEditSegFacturaForm').trigger("reset");
            $('#ajaxSegFacturaModel').html("Registrar ");
            $('#ajax-segfactura-model').modal('show');
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
<script>
    $(document).ready(function(){

        $("#buscarfolio").autocomplete({
            source: function(request, response){
                $.ajax({
                    url: "{{route('buscafolio')}}",
                    type: 'POST',
                    data: {
                        term: request.term,
                        _token: $("input[name=_token]").val()
                    },
                    dataType: 'json',
                    success: function(data) {
                        var resp = $.map(data, function(obj) {
                            return obj.folio;
                            response(data);
                        });
                        response(resp);
                    }
                })
            },
            minLength: 1,
        })

        $("#selectFolio").click(function(){
            const ordenpago = $('#buscarfolio').val()
            $.ajax({
                url: "{{route('seleccionafolio')}}",
                type: "POST",
                data: {
                    ordenpago: ordenpago,
                    _token: $("input[name=_token]").val()
                },
                success: function(data){
                    $("#ordenpagos_id").val(data.id ?? "Sin datos")
                    $("#folio").val(data.folio ?? "Sin datos")
                    $("#num_pago").val(data.num_pago ?? "Sin datos")
                    $("#emite").val(data.emite ?? "Sin datos")
                    $("#cantidadtotal").val(data.cantidadtotal ?? "Sin datos")
                     console.log(data);

                }
            })
        })

    });
</script>
<script type="text/javascript">
    function calcular() {
        try{
            var a = parseFloat(document.getElementById("cantidadtotal").value) || 0,
                b = parseFloat(document.getElementById("num_pago").value) || 0;

                document.getElementById("saldorestante").value = a / b;
        }catch(e){}
    }
</script>
 <!-- buscador en tiempo real autocomplete -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>