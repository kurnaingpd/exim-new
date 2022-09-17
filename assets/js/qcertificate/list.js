$(function () {
    $("#tqcertificatelist").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": [{
            "text": '<i class="fa fa-fw fa-plus-circle"></i> Add record',
            "action": function ( e, dt, node, config ) {
                window.location.href = site_url + "export/qcertificate/add";
            }
        }]
    }).buttons().container().appendTo('#tqcertificatelist_wrapper .col-md-6:eq(0)');
});