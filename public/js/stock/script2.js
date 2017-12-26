$(document).ready(function() {
    $(function () {
        var tabla = $('#stock-table2').DataTable({
            language:{
                url: "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
            },
            processing: true,
            serverSide: true,
            ajax: 'http://localhost:8000/stock/listado2',
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'brand', name: 'brand'},
                {data: 'price', name: 'price'},
                {data: 'type', name: 'type'},
                {data: 'code', name: 'code'},
                {data: 'weight', name: 'weight'},
                {data: 'Tweight', name: 'Tweight'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    })

});
