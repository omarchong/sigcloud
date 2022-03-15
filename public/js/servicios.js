$(document).ready(function ($) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $("#addServicio").click(function () {
        $("#addEditServicio").trigger("reset");
        $("#ajaxServicioModel").html("Agregar Servicio");
        $("#ajax-servicio-model").modal("show");
    });
    $("body").on("click", ".edit", function () {
        var id = $(this).data("id");
        $.ajax({
            type: "POST",
            url: "{{ url('edit-servicio') }}",
            data: {
                id: id,
            },
            dataType: "json",
            success: function (res) {
                $("#ajaxServicioModel").html("Edit Servicio");
                $("#ajax-servicio-model").modal("show");
                $("#id").val(res.id);
                $("#nombre").val(res.nombre);
                $("#descripcion").val(res.descripcion);
                $("#precio_inicial").val(res.precio_inicial);
                $("#precio_final").val(res.precio_final);
            },
        });
    });

    $("body").on("click", ".delete", function () {
        if (confirm("Eliminar registro?") == true) {
            var id = $(this).data("id");
            $.ajax({
                type: "POST",
                url: "{{ url('delete-servicio') }}",
                data: {
                    id: id,
                },
                dataType: "json",
                success: function (res) {
                    window.location.reload();
                },
            });
        }
    });

    $("body").on("click", "#btn-save", function (event) {
        const id = $("#id").val();
        const nombre = $("#nombre").val();
        const descripcion = $("#descripcion").val();
        const precio_inicial = $("#precio_inicial").val();
        const precio_final = $("#precio_final").val();

        $("btn-save").html("Cargando.....");
        $("btn-save").attr("disabled", true);

        $.ajax({
            type: "POST",
            url: "{{ url('add-update-servicio') }}",
            data: {
                id: id,
                nombre: nombre,
                descripcion: descripcion,
                precio_inicial: precio_inicial,
                precio_final: precio_final,
            },
            dataType: "json",
            success: function (res) {
                window.location.reload();
                $("#btn-save").html("Submit");
                $("#btn-save").attr("disabled", false);
            },
        });
    });
});
