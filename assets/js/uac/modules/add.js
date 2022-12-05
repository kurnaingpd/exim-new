$(function () {
    $('.no-space').keypress(function( e ) {
        if(e.which === 32) 
            return false;
    });

    $(".lower").keyup(function () {
        this.value = this.value.toLocaleLowerCase();
    });

    $(".upper").keyup(function () {
        this.value = this.value.toLocaleUpperCase();
    });

    $('.select2bs4').select2({
      theme: 'bootstrap4',
      placeholder: 'Select an option',
      allowClear: true
    })

    $.validator.setDefaults({
        submitHandler: function () {
            save();
        }
    });

    $('#form-module-add').validate({
        rules: {
            module: {
                required: true,
            },
            icon: {
                required: true,
            },
            url: {
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
        url: site_url + "uac/modules/save",
        type: "POST",
        data: $("#form-module-add").serialize(),
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