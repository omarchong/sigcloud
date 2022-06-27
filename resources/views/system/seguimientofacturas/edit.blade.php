@include('layouts.admin')
<div class="container my-5">
    <div class="card">
        <h4 class="card-header">Editar seguimiento de facturas</h4>
        <div class="card-body">
            <form action="{{ route('seguimientofacturas.update', ['seguimientofactura' => $seguimientofactura->id]) }}" method="POST" id="seguimientofacturas"
                class="needs-validation" novalidate>
                @csrf
                @method('PUT')
                <div class="form-row">
                    <input type="hidden" readonly class="form-control" name="ordenpagos_id" id="ordenpagos_id" value="{{$seguimientofactura->ordenpagos_id}}">
                    <div class="col-md-4 my-3">
                        <label for="" class="form-label"> Folio</label>
                        <div class="form-group">
                            <input type="text" readonly class="form-control" value="{{$seguimientofactura->ordenpagos->folio}}" name="folio" id="folio">
                        </div>
                    </div> 
                    <div class="col-md-4 my-3">
                        <label for="" class="form-label">Fecha de creación</label>
                        <div class="">
                            <input type="date" readonly class="form-control"
                            value="{{$seguimientofactura->factura_creada}}" name="factura_creada" id="factura_creada">
                        </div>
                    </div>
                    <div class="col-md-4 my-3">
                        <label for="" class="form-label"> Cantidad total</label>
                        <div class="form-group">
                            <input type="text" readonly class="form-control" value="{{$seguimientofactura->cantidadtotal}}" name="cantidadtotal" id="cantidadtotal" step="0.01" oninput="calcular()">
                        </div>
                    </div> 
                    <div class="col-md-4">
                        <label for="" class="form-label"> Emite</label>
                        <div class="form-group">
                            <input type="text" readonly class="form-control" value="{{$seguimientofactura->ordenpagos->emite}}" name="emite" id="emite">
                        </div>
                    </div> 
                   {{--  <div class="col-md-4">
                        <label for="" class="col-sm-2-12 col-form-label">Seleccione un folio</label>
                        <div class="">
                            <select class="form-control @error('ordenpagos_id') is-invalid @enderror" name="ordenpagos_id"
                                id="ordenpagos_id" required>
                                @foreach ($ordenpagos as $ordenpago)
                                    <option value="{{$ordenpago->id}}" {{ $seguimientofactura->ordenpagos_id == $ordenpago->id ? 'selected' : '' }}>{{$ordenpago->folio}}
                                    </option>
                                @endforeach
                                <div class="valid-feedback">
                                    Correcto!
                                </div>
                                @error('ordenpagos_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </select>
                        </div>
                    </div> --}}
            
                    <div class="col-md-4">
                        <label for="" class="form-label">Numero de pago</label>
                        <div class="">
                            <input type="number" required class="form-control @error('num_pago') is-invalid @enderror"
                            value="{{$seguimientofactura->num_pago}}" name="num_pago" id="num_pago" step="0.01" oninput="calcular()">
                            <div class="valid-feedback">
                                Correcto!
                            </div>
                            @error('num_pago')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="" class="form-label">Saldo restante</label>
                        <div class="">
                            <input type="number" required class="form-control @error('saldorestante') is-invalid @enderror"
                            value="{{$seguimientofactura->saldorestante}}" name="saldorestante" id="saldorestante">
                            <div class="valid-feedback">
                                Correcto!
                            </div>
                            @error('num_pago')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="" class="form-label">Fecha de vencimiento</label>
                        <div class="">
                            <input type="date" required class="form-control @error('fecha_vencimiento') is-invalid @enderror"
                            value="{{$seguimientofactura->fecha_vencimiento}}" name="fecha_vencimiento" id="fecha_vencimiento">
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
                            <select class="form-control @error('estatufacturas_id') is-invalid @enderror"
                                name="estatufacturas_id" id="estatufacturas_id">
                                <option selected disabled value="">Seleccione una opción</option>
                                @foreach ($estatufacturas as $estatufactura)
                                    <option value="{{$estatufactura->id}}" {{ $seguimientofactura->estatufacturas_id == $estatufactura->id ? 'selected' : '' }}>{{$estatufactura->nombre}}
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
                ordenpagos_id: {
                    required: true
                },
                factura_creada: {
                    required: true
                },
                hora_limite: {
                    required: true
                },
                num_pago: {
                    required: true
                },
                estatufacturas_id: {
                    required: true
                }
            },
            messages:{
                ordenpagos_id:{
                    required: "El folio es requerido"
                },
                factura_creada:{
                    required: "La fecha es requerido"
                },
                num_pago:{
                    required: "El numero de pago es requerido"
                },
                fecha_vencimiento:{
                    required: "La fecha es requerido"
                },
                estatufacturas_id:{
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
<script type="text/javascript">
    function calcular() {
        try{
            var a = parseFloat(document.getElementById("cantidadtotal").value) || 0,
                b = parseFloat(document.getElementById("num_pago").value) || 0;

                document.getElementById("saldorestante").value = a / b;
        }catch(e){}
    }
</script>