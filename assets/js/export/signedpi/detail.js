$(function () {
    bsCustomFileInput.init();

    flatpickr(".datetimepicker-input", {
        dateFormat: "Y-m-d",
        allowInput: false,
        disableMobile: "true",
        minDate: "today",
    });

    $('.select2bs4').select2({
        theme: 'bootstrap4',
        placeholder: 'Select an option',
        allowClear: true
    });

    $('input.check').on('change', function() {
        var id = $(this).attr('id');
        var status = $(this).is(":checked");
        
        if (status) {
            $('input#id').prop('disabled', false);
            $('input.item_' + id).prop('disabled', false);
            $('input.item_' + id).css("background-color", "#fff");
            $('select.item_' + id).prop('disabled', false);
            $('button.save').prop('disabled', false);
        } else {
            $('input#id').prop('disabled', true);
            $('input.item_' + id).prop('disabled', true);
            $('input.item_' + id).css("background-color", "#e9ecef");
            $('select.item_' + id).prop('disabled', true);
            $('button.save').prop('disabled', true);
        }
    });

    $.validator.setDefaults({
        submitHandler: function () {
            save();
        }
    });

    $('#form-signed-pi').validate({
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
    var form = $('#form-signed-pi')[0];
    var data = new FormData(form);

    $.ajax({
        type: "POST",
        enctype: 'multipart/form-data',
        url: site_url + "export/signedpi/save",
        data: data,
        dataType: "json",
        cache : false,
        contentType: false,
        processData: false,
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
                $('button.save').html("<i class='fas fa-save mr-2'></i>Save").prop('disabled', false);
            }
        },
        error: function (e) {
            console.log("Terjadi kesalahan pada sistem");
            swal("", "Terjadi kesalahan pada sistem.", "error");
            $('button.save').html("<i class='fas fa-save mr-2'></i>Save").prop('disabled', false);
        }     
    });
}