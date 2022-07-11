@include('layouts.admin')
<div class="container my-5">
    <div class="card">
        <h5 class="card-header">Generar orden de pago</h5>
        <div class="card-body">
            <form action="{{ route('ordenpagos.store') }}" method="POST" id="ordenpagos" class="needs-validation" novalidate>
                @csrf
                <div class="form-row">
                    <div class="col-md-12">
                        <label for="">Buscar</label>
                        <div class="input-group">
                            <input type="search" required name="buscarcotizacion" id="buscarcotizacion" 
                            class="form-control @error('cotizacion_id')  @enderror" placeholder="" aria-label="Search">
                            <span class="input-group-btn">
                                <button type="button" id="selectCotizacion" class="btn btn-primary">
                                    Seleccionar
                                </button>
                            </span>
                        </div>
                        <div class="valid-feedback">
                            Correcto!
                        </div>
                        <div class="">
                            @error('cotizacion_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    {{-- <input type="text" class="form-control" name="cotizacion_id" id="cotizacion_id"> --}}
                    <div class="col-md-4">
                        <label for="">Folio de cotización</label>
                        <div class="form-group">
                            <input type="text" class="form-control" readonly name="cotizacion_id" id="cotizacion_id">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="">Cliente</label>
                        <div class="form-group">
                            <input type="text" class="form-control" readonly name="contacto1" id="contacto1">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="">Nombre del proyecto</label>
                        <div class="form-group">
                            <input type="text" class="form-control" readonly name="nombre_proyecto" id="nombre_proyecto">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="">Cantidad total</label>
                        <div class="form-group">
                            <input type="number" readonly class="form-control" name="cantidadtotal" id="cantidadtotal" step="0.01" oninput="calcular()">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="num_pago" class="">Seleccione los numeros de pago</label>
                        <div class="">
                            <select class="custom-select" class="@error('num_pago') is-invalid @enderror" name="num_pago" id="num_pago" step="0.01" oninput="calcular()" required>
                                <option selected disabled value="">Selecciona una opción</option>
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
                    <div class="col-md-4">
                        <label for="">Total a pagar</label>
                        <div class="form-group">
                            <input type="text" class="form-control" readonly name="totalapagar" id="totalapagar" step="0.0001">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="">Primer pago</label>
                        <div class="form-group">
                            <input type="date" class="form-control @error('primer_pago') is-invalid @enderror" name="primer_pago" id="primer_pago">
                            <div class="valid-feedback">
                                Correcto!
                            </div>
                            @error('primer_pago')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="">Segundo pago</label>
                        <div class="form-group">
                            <input type="date" class="form-control  @error('segundo_pago')is-invalid @enderror" name="segundo_pago" id="segundo_pago">
                            <div class="valid-feedback">
                                Correcto!
                            </div>
                            @error('segundo_pago')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="">Emite</label>
                        <div class="form-group">
                            <input type="text" class="form-control" readonly value="DSW" placeholder="DSW" name="emite" id="emite">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="" class="form-label">Seleccione el estatus</label>
                        <div class="">
                            <select class="form-control  @error('estatuorden_id') is-invalid @enderror"
                                name="estatuorden_id" id="estatuorden_id">
                                @foreach ($estatuordens as $estatuorden)
                                    <option value="{{ $estatuorden->id }}">
                                        {{ $estatuorden->nombre }}
                                    </option>
                                @endforeach
                                <div class="valid-feedback">
                                    Correcto!
                                </div>
                                @error('estatuorden_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </select>
                        </div>
                    </div>
                </div>
                <button class="btn btn-success float-right my-3" type="submit">Guardar</button>
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
<script>
    $(document).ready(function(){

        $("#buscarcotizacion").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: "{{ route('buscacotizacion') }}",
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

        $("#selectCotizacion").click(function() {
            const cotizacion = $('#buscarcotizacion').val()
            $.ajax({
                url: "{{ route('seleccionacotizacion') }}",
                type: "POST",
                data: {
                    cotizacion: cotizacion,
                    _token: $("input[name=_token]").val()
                },
                success: function(data) {
                    $("#cotizacion_id").val(data.id ?? "Sin datos")
                    $("#contacto1").val(data.contacto1 ?? "Sin datos")
                    $("#nombre_proyecto").val(data.nombre_proyecto ?? "sin datos")
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

                document.getElementById("totalapagar").value = a / b;
        }catch(e){}
    }
</script>