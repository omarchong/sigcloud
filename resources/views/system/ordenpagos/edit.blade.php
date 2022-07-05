@include('layouts.admin')
<div class="container my-5">
    <div class="card">
        <h4 class="card-header">Editar orden de pago</h4>
        <div class="card-body">
            <form action="{{ route('ordenpagos.update', ['ordenpago' => $ordenpago->id]) }}" method="post" id="ordenpagos"
                class="needs-validation" novalidate>
                @csrf
                @method('PUT')
                <div class="form-row">
                    {{-- <input type="text" readonly class="form-control" name="cotizacion_id" id="cotizacion_id" value="{{ $ordenpago->cotizacion_id }}"> --}}
                   
                            <input type="hidden" readonly class="form-control" value="{{ $ordenpago->id }}" name="id" id="id">
                    <div class="col-md-4 my3">
                        <label for="" class="form-label">Folio</label>
                        <div class="form-group">
                            <input type="text" readonly class="form-control" value="{{ $ordenpago->cotizacion_id }}" name="cotizacion_id" id="cotizacion_id">
                        </div>
                    </div>
                    <div class="col-md-4 my3">
                        <label for="" class="form-label">Cliente</label>
                        <div class="form-group">
                            <input type="text" readonly class="form-control" value="{{ $ordenpago->contacto1 }}" name="contacto1" id="contacto1">
                        </div>
                    </div>
                    <div class="col-md-4 my3">
                        <label for="" class="form-label">Nombre del proyecto</label>
                        <div class="form-group">
                            <input type="text" readonly class="form-control" value="{{ $ordenpago->nombre_proyecto }}" name="nombre_proyecto" id="nombre_proyecto">
                        </div>
                    </div>
                    <div class="col-md-4 my3">
                        <label for="" class="form-label">Cantidad total</label>
                        <div class="form-group">
                            <input type="text" readonly class="form-control" value="{{ $ordenpago->cantidadtotal }}" name="cantidadtotal" id="cantidadtotal" step="0.01" oninput="calcular()">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="tipoactividad" class="">Seleccione el numero de pagos</label>
                        <div class="">
                            <select class="custom-select" class="@error('num_pago') is-invalid @enderror" name="num_pago" id="num_pago" required step="0.01" oninput="calcular()">
                                <option selected disabled value="">{{$ordenpago->num_pago}}</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <div class="valid-feedback">
                                    Correcto!
                                </div>
                                @error('num_pago')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 my3">
                        <label for="" class="form-label">Total a pagar</label>
                        <div class="form-group">
                            <input type="text" readonly class="form-control" value="{{ $ordenpago->totalapagar }}" name="totalapagar" id="totalapagar" step="0.0001">
                        </div>
                    </div>
                    <div class="col-md-4 my3">
                        <label for="" class="form-label">Primer pago</label>
                        <div class="form-group">
                            <input type="date" class="form-control" value="{{ $ordenpago->primer_pago }}" name="primer_pago" id="primer_pago">
                        </div>
                    </div>
                    <div class="col-md-4 my3">
                        <label for="" class="form-label">Segundo pago</label>
                        <div class="form-group">
                            <input type="date" class="form-control" value="{{ $ordenpago->segundo_pago }}" name="segundo_pago" id="segundo_pago">
                        </div>
                    </div>
                    <div class="col-md-4 my3">
                        <label for="" class="form-label">Emite</label>
                        <div class="form-group">
                            <input type="text" readonly class="form-control" value="{{ $ordenpago->emite }}" name="emite" id="emite">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="" class="form-label">Seleccione el estatus</label>
                        <div class="">
                            <select class="form-control @error('estatuorden_id') is-invalid @enderror"
                                name="estatuorden_id" id="estatuorden_id">
                                <option selected disabled value="">Seleccione una opción</option>
                                @foreach ($estatuorden as $estatufacturas)
                                    <option value="{{$estatufacturas->id}}" {{ $ordenpago->estatuorden_id == $estatufacturas->id ? 'selected' : '' }}>{{$estatufacturas->nombre}}
                                @endforeach
                                @error('estatuorden_id')
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
        $("#ordenpagos").validate({
            rules: {
                cotizacion_id: {
                    required: true
                },
                num_pago: {
                    required: true
                },
                primer_pago: {
                    required: true
                },
                segundo_pago: {
                    required: true
                },
                estatuorden_id: {
                    required: true
                }
            },
            messages: {
                cotizacion_id: {
                    required: "El folio es requerido"
                },
                num_pago: {
                    required: "El numero de pago es requerido"
                },
                primer_pago: {
                    required: "El primer pago es requerido"
                },
                segundo_pago: {
                    required: "El segundo pago es requerido"
                },
                estatuorden_id: {
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

                document.getElementById("totalapagar").value = a / b;
        }catch(e){}
    }
</script>