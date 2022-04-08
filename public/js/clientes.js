
   
    $(document).ready(function() {

        $("#buscarcliente").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: "{{route('buscacliente')}}",
                    type: 'POST',
                    data: {
                        term: request.term,

                        _token: $("input[name=_token]").val()

                    },
                    dataType: 'json',
                    success: function(data) {
                        var resp = $.map(data, function(obj) {
                            return obj.nombreempresa;

                            response(data);
                        });
                        response(resp);
                    }

                })
            },
            minLength: 1,
        })

        $("#buscarservicio").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: "{{route('buscaservicio')}}",
                    type: "POST",
                    data: {
                        term: request.term,
                        _token: $("input[name=_token").val()

                    },
                    dataType: 'json',
                    success: function(data) {
                        var resp = $.map(data, function(obj) {
                            return obj.nombre;
                            response(data);
                        });
                        response(resp);
                    }
                })
            },
            minLength: 1,
        })






        $("#selectContact").click(function() {
            const cliente = $('#buscarcliente').val()
            $.ajax({
                url: "{{route('seleccionacliente')}}",
                type: "POST",
                data: {
                    cliente: cliente,
                    _token: $("input[name=_token]").val()
                },
                success: function(data) {
                    $("#rfc").val(data.rfc ?? "Sin datos")
                    $("#tipocliente").val(data.tipocliente ?? "Sin datos")
                    $("#estatuscliente").val(data.estatuscliente ?? "Sin datos")


                }
            })
        })

        $("#selectServicio").click(function() {
            const servicio = $('#buscarservicio').val()
            $.ajax({
                url: "{{route('seleccionaservicio')}}",
                type: "POST",
                data: {
                    servicio: servicio,
                    _token: $("input[name=_token]").val()
                },
                success: function(data) {
                    $("#nombre").val(data.nombre ?? "Sin datos")
                    $("#precio_inicial").val(data.precio_inicial ?? "Sin datos")


                }
            })
        })





    });