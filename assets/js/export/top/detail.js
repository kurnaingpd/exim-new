$(function () {
    $.validator.setDefaults({
        submitHandler: function () {
            save();
        }
    });

    $('#form-top-detail').validate({
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

function save()
{
    $.ajax({
        url: site_url + "export/top/update",
        type: "POST",
        data: $("#form-top-detail").serialize(),
        dataType: "json",
        // success: function(response) {
        //     console.log(response);
        //     if(response.status == 1) {
        //         swal("", response.messages, response.icon).then((value) => {
        //             window.location.href = site_url + response.url;
        //         });
        //     } else {
        //         swal("", response.messages, response.icon);
        //     }
        // },
        // error: function (e) {
        //     console.log("Terjadi kesalahan pada sistem");
        //     swal("", "Terjadi kesalahan pada sistem.", "error");
        // } 
        beforeSend: function(){
            $('a.cancel').prop('disabled', true);
            $('button.save').html("<img src=" + base_url + "assets/images/inventory/loader.gif style='height:20px;'  /> Saving...").prop('disabled', true);
        },
        success: function(response) {
            console.log(response);
            if(response.status == 1) {
                $('a.cancel').prop('disabled', true);
                $('button.save').html("<i class='fas fa-save mr-2'></i>Save").prop('disabled', true);
                swal("", response.messages, response.icon).then((value) => {
                    window.location.href = site_url + response.url;
                });
            } else {
                swal("", response.messages, response.icon);
                $('a.cancel').prop('disabled', false);
                $('button.save').html("<i class='fas fa-save mr-2'></i>Save").prop('disabled', false);
            }
        },
        error: function (e) {
            console.log("Terjadi kesalahan pada sistem");
            swal("", "Terjadi kesalahan pada sistem.", "error");
            $('a.cancel').prop('disabled', false);
            $('button.save').html("<i class='fas fa-save mr-2'></i>Save").prop('disabled', false);
        }
    });
}