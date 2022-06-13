@include('layouts.admin')
<div class="container my-5">
    <div class="card">
        <h5 class="card-header">Generar orden de pago</h5>
        <div class="card-body">
            <form action="{{route('orden.store')}}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="col-md-12">
                        <label for="" class="form-label">Buscar cotización</label>
                        <div class="form-group">
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="">Folio de cotización</label>
                        <div class="form-group">
                            <input type="text" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="">Folio de cotización</label>
                        <div class="form-group">
                            <input type="text" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="">Folio de cotización</label>
                        <div class="form-group">
                            <input type="text" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="">Total a pagar</label>
                        <div class="form-group">
                            <input type="number" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="">Seleccione los numeros de pago</label>
                        <div class="form-group">
                            <select name="" id="" class="form-control">
                                <option value="">1</option>
                                <option value="">1</option>

                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="">Total a pagar</label>
                        <div class="form-group">
                            <input type="text" class="form-control" readonly id="numero_pagos">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="">primer pago</label>
                        <div class="form-group">
                            <input type="date" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="">Segundo pago</label>
                        <div class="form-group">
                            <input type="date" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="">Emite</label>
                        <div class="form-group">
                            <input type="text" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="">Estatus de la orden</label>
                        <div class="form-group">
                            <select name="" id="" class="form-control">
                                <option value="">1</option>
                                <option value="">1</option>

                            </select>
                        </div>
                    </div>
                </div>
                <button class="btn btn-success float-right" type="submit">Guardar</button>
            </form>
        </div>
    </div>
</div>
<script>

</script>