$(function () {
    $("#tpackingitemlist").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false, "searching": false, "paging": false, "info": false
    });

    $('input.check').on('change', function() {
        var id = $(this).attr('id');
        var packing = $(this).attr('data-packing');
        var status = $(this).is(":checked");
        
        if (status) {
            console.log(status)
            checking(packing, id, '1')
            $('.'+id).hide();
        } else {
            console.log(status)
            checking(packing, id, '0')
            $('.'+id).removeClass("d-none");
            $('.'+id).show();
            // console.log('show')
        }
    });

    $.validator.setDefaults({
        submitHandler: function () {
            save();
        }
    });

    $('#form-packing-detail').validate({
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });
});

function checking(packing, id, data)
{
    $.ajax({
        url: site_url + "export/packing/filter/" + packing,
        type: "POST",
        data: {fields: id, filter: data},
        dataType: "json",
        success: function(response) {
            console.log(response);
        },
        error: function (e) {
            console.log("Terjadi kesalahan pada sistem");
        }        
    });
}

function save()
{
    $.ajax({
        url: site_url + "export/packing/update",
        type: "POST",
        data: $("#form-packing-detail").serialize(),
        dataType: "json",
        beforeSend: function(){
            $('a.cancel').prop('disabled', true);
            $('button#btn-packing-update').html("<img src=" + base_url + "assets/images/inventory/loader.gif style='height:20px;'  /> Saving...").prop('disabled', true);
        },
        success: function(response) {
            console.log(response);
            if(response.status == 1) {
                $('a.cancel').prop('disabled', true);
                $('button#btn-packing-update').html("<i class='fas fa-save mr-2'></i>Save").prop('disabled', true);
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
            $('a.cancel').prop('disabled', false);
            $('button#btn-packing-update').html("<i class='fas fa-save mr-2'></i>Save").prop('disabled', false);
        }        
    });
}