$('#contactos').DataTable({
    "responsive": true,
    "processing": true,
    "serverSide": true,
    "autoWidth": false,
    language: {
        url: "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json",
    },
    "ajax": "{{route('contactos.datatables')}}",
    "columns": [{
            data: 'id',
        },
        {
            data: 'email',
        },
        {
            data: 'telefono',
        },
        {
            data: 'descripcion',
        },

    ]

});

function reloadTable() {
    $('#contactos').DataTable().ajax.reload();
}
