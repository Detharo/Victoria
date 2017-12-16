$(document).ready(function() {
    $(function () {
        var tabla = $('#cantidad-table').DataTable({
            language:{
                url: "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
            },
            processing: true,
            serverSide: true,
            ajax: 'http://localhost:8000/stock/quantity',
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'quantity', name: 'quantity'},
                {data: 'type', name: 'type'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    })
    $("#usuarios-table").on('click', 'tbody > tr > td:nth-child(1) > a.btn.btn-xs.btn-primary.editar_boton',function () {
        var dato = $(this).attr('data-id');
        $('#id_modificar').val(dato);
    });
});
