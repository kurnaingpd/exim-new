$(function () {
    $("#tdocpaymentlist").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": [{
            "text": '<i class="fa fa-fw fa-plus-circle"></i> Add record',
            "className": 'border',
            "action": function ( e, dt, node, config ) {
                window.location.href = site_url + "import/docpayment/add";
            }
        }, {
            "text": '<i class="far fa-file-excel mr-1"></i> Excel',
            "className": 'border btn-success',
            "action": function ( e, dt, node, config ) {
                window.location.href = site_url + "import/docpayment/excel";
            }
        }]
    }).buttons().container().appendTo('#tdocpaymentlist_wrapper .col-md-6:eq(0)');

    $('#tdocpaymentlist tbody').on('click', 'button#delete', function () {
        var id = $(this).attr("data-id");
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this data!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                del(id);
            } else {
                swal("", "Document PIB payment canceled for deletion.", "info").then((value) => {
                    window.location.href = site_url + "import/docpayment";
                });
            }
        });
    });
});

function del(id)
{
    $.ajax({
        url: site_url + "import/docpayment/delete/" + id,
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