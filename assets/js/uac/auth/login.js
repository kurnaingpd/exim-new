$(function () {
    $('#username').on('keypress', function(e) {
        if (e.which == 32){
            return false;
        }
    });
    
    $.validator.setDefaults({
        submitHandler: function () {
            auth();
        }
    });

    $('#form-login').validate({
        rules: {
            username: {
                required: true,
                minlength: 5,
                maxlength: 30
            },
            password: {
                required: true,
                minlength: 5
            }
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.input-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });
})

function auth()
{
    $.ajax({
        url: site_url + "authentication",
        type: "POST",
        data: $("#form-login").serialize(),
        dataType: "json",
        success: function(response) {
            if(response.status == 1) {
                window.location.href = site_url + response.url;
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