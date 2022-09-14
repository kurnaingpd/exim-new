$(function () {
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

    $('#form-expterms-process').validate({
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

$('select#status').on('change', function() {
    var data = $('select#status').select2('data');

    if(data[0].id == 6 || data[0].id == 7) {
        $("div#required").addClass("required");
        $('textarea#remark').prop('readonly', false);
        $('textarea#remark').prop('required', true);
    } else {
        $("div#required").removeClass("required");
        $('textarea#remark').prop('readonly', true);
        $('textarea#remark').prop('required', false);
    }
});

function save()
{
    $.ajax({
        url: site_url + "export/expterm/update",
        type: "POST",
        data: $('#form-expterms-process').serialize(),
        dataType: "json",
        beforeSend: function(){
            $('a.cancel').prop('disabled', true);
            $('button#btn-process').html("<img src=" + base_url + "assets/images/inventory/loader.gif style='height:20px;'  /> Saving...").prop('disabled', true);
        },
        success: function(response) {
            console.log(response);
            if(response.status == 1) {
                $('a.cancel').prop('disabled', false);
                $('button#btn-process').html("<i class='fas fa-save mr-2'></i>Save").prop('disabled', true);
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
            $('button#btn-customer-save').html("<i class='fas fa-save mr-2'></i>Save").prop('disabled', true);
        }        
    });
}