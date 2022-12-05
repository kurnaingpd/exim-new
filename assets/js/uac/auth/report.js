$(function () {
    $("#tloglist").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": [{
            "extend": 'excel',
            "text": '<i class="fas fa-file-excel mr-1"></i> Export to excel',
            'title': 'report_log_access_' + Math.floor(Math.random() * Date.now()),
            "className": 'border btn-success',
        }]
    }).buttons().container().appendTo('#tloglist_wrapper .col-md-6:eq(0)');
});