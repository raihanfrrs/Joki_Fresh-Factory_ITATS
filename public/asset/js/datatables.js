$(document).ready(function () {
    $('#dataAdmin').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/dataAdmin',
        columns: [
            { data: 'id', name: 'id', class: 'text-center' }
        ]
    });
});