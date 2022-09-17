$(function () {
    $("#tcoalist").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": [{
            "text": '<i class="fa fa-fw fa-plus-circle"></i> Add record',
            "action": function ( e, dt, node, config ) {
                window.location.href = site_url + "export/coa/add";
            }
        }]
    }).buttons().container().appendTo('#tcoalist_wrapper .col-md-6:eq(0)');
});