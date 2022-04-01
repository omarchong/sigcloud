$(document).ready(function() {

    $("#buscar").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: "{{route('searchcontacto')}}",
                type: "POST",
                data: {
                    term: request.term,
                    _token: $("input[name=_token]").val()
                },
                dataType: "json",
                success: function(data) {
                    var resp = $.map(data, function(obj) {
                        return obj.contacto1;
                    });

                    response(resp);
                }
            });
        },
        minLength: 1
    });





});