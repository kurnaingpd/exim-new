$(function () {
    $("#tpackinglist").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": [{
            "text": '<i class="fa fa-fw fa-plus-circle"></i> Add record',
            "action": function ( e, dt, node, config ) {
                window.location.href = site_url + "export/packing/add";
            }
        }]
    }).buttons().container().appendTo('#tpackinglist_wrapper .col-md-6:eq(0)');
});