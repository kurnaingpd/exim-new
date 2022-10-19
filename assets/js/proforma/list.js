$(function () {
    $("#tproformalist").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": [{
            "text": '<i class="fa fa-fw fa-plus-circle"></i> Add record',
            "className": disabled_btn_add_pi_procurement,
            "action": function ( e, dt, node, config ) {
                window.location.href = site_url + "export/proforma/add";
            }
        }]
    }).buttons().container().appendTo('#tproformalist_wrapper .col-md-6:eq(0)');

    $('#tproformalist tbody').on('click', 'button#delete', function () {
        var id = $(this).attr("data-id");
        swal({
            title: "",
            text: "Are you sure for delete this data?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                del(id);
            } else {
                swal("", "Proforma invoice canceled for deletion.", "info").then((value) => {
                    window.location.href = site_url + "export/proforma";
                });
            }
        });
    });

    $('#tproformalist tbody').on('click', 'button#submit', function () {
        var id = $(this).attr("data-id");
        swal({
            title: "",
            text: "Are you sure for change status to submit?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                submit(id);
            } else {
                swal("", "Proforma invoice canceled for change status to be submit.", "info").then((value) => {
                    window.location.href = site_url + "export/proforma";
                });
            }
        });
    });
});

function del(id)
{
    $.ajax({
        url: site_url + "export/proforma/delete/" + id,
        type: "POST",
        dataType: "json",
        success: function(response) {
            console.log(response);
            if(response.status == 1) {
                swal("", response.messages, response.icon).then((value) => {
                    window.location.href = site_url + response.url;
                });
            } else {
                swal("", response.messages, response.icon);
            }
        },
        error: function (e) {
            console.log("Terjadi kesalahan pada sistem");
            swal("", "Terjadi kesalahan pada sistem.", "error");
        }        
    });
}

function submit(id)
{
    $.ajax({
        url: site_url + "export/proforma/submit/" + id,
        type: "POST",
        dataType: "json",
        success: function(response) {
            console.log(response);
            if(response.status == 1) {
                swal("", response.messages, response.icon).then((value) => {
                    window.location.href = site_url + response.url;
                });
            } else {
                swal("", response.messages, response.icon);
            }
        },
        error: function (e) {
            console.log("Terjadi kesalahan pada sistem");
            swal("", "Terjadi kesalahan pada sistem.", "error");
        }        
    });
}