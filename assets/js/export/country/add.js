$(function () {
    $('.no-space').keypress(function( e ) {
        if(e.which === 32) 
            return false;
    });

    $(".upper").keyup(function () {
        this.value = this.value.toLocaleUpperCase();
    });

    $.validator.setDefaults({
        submitHandler: function () {
            save();
        }
    });

    $('#form-country-add').validate({
        rules: {
            code: {
                required: true,
                maxlength: 3,
            },
            name: {
                required: true,
            },
        },
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
        url: site_url + "export/country/save",
        type: "POST",
        data: $("#form-country-add").serialize(),
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