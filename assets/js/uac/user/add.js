$(function () {
    $('.no-space').keypress(function( e ) {
        if(e.which === 32) 
            return false;
    });

    $(".lower").keyup(function () {
        this.value = this.value.toLocaleLowerCase();
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

    $('#form-user-add').validate({
        rules: {
            fullname: {
                required: true,
            },
            username: {
                required: true,
                minlength: 5,
                maxlength: 30,
            },
            email: {
                required: true,
            },
            role: {
                required: true,
            },
            password: {
                required: true,
                minlength: 5,
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

$('select#role').on('change', function() {
    var data = $('select#role').select2('data');
    position(data[0].id);
});

function position(id)
{
    $.ajax({
        url: site_url + "uac/user/position/" + id,
        type: "POST",
        dataType: "json",
        success: function(response) {
            var html = '';
            var i;
            for(i=0; i<response.length; i++) {
                html += '<option></option>';
                html += '<option value="'+response[i].id+'">'+response[i].name+'</option>';
            }
            $('#position').html(html);
        },
        error: function (e) {
            console.log("Terjadi kesalahan pada sistem");
            swal("", "Terjadi kesalahan pada sistem.", "error");
        }        
    });
}

function save()
{
    $.ajax({
        url: site_url + "uac/user/save",
        type: "POST",
        data: $("#form-user-add").serialize(),
        dataType: "json",
        beforeSend: function(){
            $('a.cancel').prop('disabled', true);
            $('button.save').html("<img src=" + base_url + "assets/images/inventory/loader.gif style='height:20px;'  /> Saving...").prop('disabled', true);
        },
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
            $('a.cancel').prop('disabled', true);
            $('button.save').html("<i class='fas fa-save mr-2'></i>Save").prop('disabled', false);
        }        
    });
}