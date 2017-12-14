$(document).ready(function() {
    $(function () {
        var tabla = $('#stock-table').DataTable({
            language:{
                url: "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
            },
            processing: true,
            serverSide: true,
            ajax: 'http://localhost:8000/stock/listado',
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'brand', name: 'brand'},
                {data: 'price', name: 'price'},
                {data: 'type', name: 'type'},
                {data: 'code', name: 'code'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    })
    $("#stock-table").on('click', 'tbody > tr > td:nth-child(7) > a.btn.btn-xs.btn-primary.editar_boton',function () {
        var dato = $(this).attr('data-id');
        $('#id_modificar').val(dato);
        $('#edit_name').val($(this).attr('data-name'));
        $('#edit_brand').val($(this).attr('data-brand'));
        $('#edit_price').val($(this).attr('data-price'));
    });
});
