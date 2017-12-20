$(document).ready(function() {
    $(function () {
        var tabla = $('#vendido-table').DataTable({
            language:{
                url: "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
            },
            processing: true,
            serverSide: true,
            ajax: 'http://localhost:8000/productos/vendido',
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'quantity', name: 'quantity'}
            ]
        });
    })

});
