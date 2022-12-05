$(function () {
    $('#tcontainer tbody').on('click', 'button#update', function () {
        var id = $(this).attr("data-id");
        var val_container = document.getElementById("container_" + id).value;
        swal({
            title: "",
            text: "Are you sure to change container?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                update(id, val_container);
            } else {
                swal("", "Container canceled for change.", "info").then((value) => {
                    window.location.href = site_url + "export/packing";
                });
            }
        });
    });
});

function update(id, val_container)
{
    $.ajax({
        url: site_url + "export/packing/update_container/" + id + "/" + val_container,
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