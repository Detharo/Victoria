$(document).ready(function() {
    $(function () {
        var tabla = $('#usuarios-table').DataTable({
            language:{
                url: "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
            },
            processing: true,
            serverSide: true,
            ajax: 'http://localhost:8000/rusuario',
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'rut', name: 'rut'},
                {data: 'email', name: 'email'},
                {data: 'type', name: 'type'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    })
    $("#usuarios-table").on('click', 'tbody > tr > td:nth-child(6) > a.btn.btn-xs.btn-primary.editar_boton',function () {
        var dato = $(this).attr('data-id');
        $('#id_modificar').val(dato);
        $('#edit_name').val($(this).attr('data-name'));
        $('#edit_rut').val($(this).attr('data-rut'));
        $('#edit_email').val($(this).attr('data-email'));
        $('#edit_type').val($(this).attr('data-type'));
    });
});
