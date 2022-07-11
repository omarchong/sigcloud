@include('layouts.admin')
<div class="container my-5">
    <div class="card">
        <h4 class="card-header">Gestión de seguimiento de facturas</h4>
        <div class="card-body">
            <form action="{{ route('seguimientofacturas.store') }}" method="POST" id="seguimientofacturas" class="needs-validation" novalidate>
                @csrf
                <input type="hidden" name="id" id="id">
                <div class="form-row">
                    <div class="col-md-12">
                        <label for="">Buscar nombre del proyecto</label>
                        <div class="input-group">
                            <input type="search" required name="buscarordenpago" id="buscarordenpago"
                                class="form-control @error('ordenpagos_id')  @enderror" placeholder=""
                                aria-label="Search">
                            <span class="input-group-btn">
                                <button type="button" id="selectOrdenpago" class="btn btn-primary">
                                    Seleccionar
                                </button>
                            </span>
                        </div>
                        <div class="valid-feedback">
                            Correcto!
                        </div>
                        <div class="">
                            @error('ordenpagos_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                   {{--  <input type="hidden" readonly class="form-control" name="ordenpagos_id" id="ordenpagos_id"> --}}
                    <div class="col-md-4 my-3">
                        <label for="" class="form-label"> Folio</label>
                        <div class="form-group">
                            <input type="text" readonly class="form-control" name="ordenpagos_id" id="ordenpagos_id" >
                        </div>
                    </div>
                    <div class="col-md-4 my-3">
                        <label for="" class="form-label">Fecha de creación</label>
                        <div class="">
                            <input type="date" required class="form-control @error('factura_creada')  @enderror"
                                value="<?php echo date("Y-m-d") ?>" name="factura_creada" id="factura_creada">
                            <div class="valid-feedback">
                                Correcto!
                            </div>
                            @error('factura_creada')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4 my-3">
                        <label for="" class="form-label"> Cantidad Total</label>
                        <div class="form-group">
                            <input type="text" readonly class="form-control" name="cantidadtotal" id="cantidadtotal" step="0.01" oninput="calcular()">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="" class="form-label"> Emite</label>
                        <div class="form-group">
                            <input type="text" readonly class="form-control" name="emite" id="emite">
                        </div>
                    </div>


                    <div class="col-md-4">
                        <label for="" class="form-label">Numero de pago</label>
                        <div class="">
                            <input type="number" required class="form-control @error('num_pago')  @enderror"
                                value="{{ old('num_pago') }}" name="num_pago" id="num_pago" step="0.01" oninput="calcular()">
                            <div class="valid-feedback">
                                Correcto!
                            </div>
                            @error('num_pago')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="" class="form-label"> Saldo restante</label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="saldorestante" id="saldorestante" step="0.0001">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="" class="form-label">Fecha de vencimiento</label>
                        <div class="">
                            <input type="date" required class="form-control @error('fecha_vencimiento')  @enderror"
                                value="{{ old('fecha_vencimiento') }}" name="fecha_vencimiento" id="fecha_vencimiento">
                            <div class="valid-feedback">
                                Correcto!
                            </div>
                            @error('fecha_vencimiento')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
        
                    <div class="col-md-4">
                        <label for="" class="form-label">Seleccione el estatus</label>
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
                <button type="submit" class="btn btn-primary float-right my-3">Guardar</button>

            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $("#seguimientofacturas").validate({
            rules: {
                factura_creada: {
                    required: true
                },
                num_pago: {
                    required: true
                },
                fecha_vencimiento: {
                    required: true
                },
                ordenpagos_id: {
                    required: true
                },
                estatufacturas_id: {
                    required: true
                }
            },
            messages: {
                ordenpagos_id: {
                    required: "El folio es requerido"
                },
                factura_creada: {
                    required: "La fecha es requerido"
                },
                num_pago: {
                    required: "El numero de pago es requerido"
                },
                fecha_vencimiento: {
                    required: "La fecha es requerido"
                },
                estatufacturas_id: {
                    required: "El campo estatus es requerido"
                },
            }
        })
    })
</script>
<script>
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>

<script>
    $(document).ready(function(){

        $("#buscarordenpago").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: "{{ route('buscaordenpago') }}",
                    type: "POST",
                    data: {
                        term: request.term,
                        _token: $("input[name=_token]").val()
                    },
                    dataType: 'json',
                    success: function(data) {
                        var resp = $.map(data, function(obj) {
                            return obj.nombre_proyecto;
                            response(data);
                        })
                        response(resp);
                    }
                })
            },
            minLenght: 1,
        })

        $("#selectOrdenpago").click(function() {
            const ordenpago = $('#buscarordenpago').val()
            $.ajax({
                url: "{{ route('seleccionaordenpago') }}",
                type: "POST",
                data: {
                    ordenpago: ordenpago,
                    _token: $("input[name=_token]").val()
                },
                success: function(data) {
                    $("#ordenpagos_id").val(data.id ?? "Sin datos")
                    $("#contacto1").val(data.contacto1 ?? "Sin datos")
                    $("#cantidadtotal").val(data.cantidadtotal ?? "Sin datos")
                    $("#emite").val(data.emite ?? "sin datos")
                    $("#telefono").val(data.telefono ?? "Sin datos")
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