$(function () {
    $("#tattachmentlist").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": [{
            "className": "btn-warning",
            "text": '<i class="fas fa-long-arrow-alt-left mr-2"></i>Back',
            "action": function ( e, dt, node, config ) {
                history.go(-1);
            }
        }]
    }).buttons().container().appendTo('#tattachmentlist_wrapper .col-md-6:eq(0)');
});