$(function () {
    $('.select2bs4').select2({
        theme: 'bootstrap4',
        placeholder: 'Select an option',
        allowClear: true
    })

    $(".datetimepicker-input").css("background-color", "#FFF");

    flatpickr("#finish_date", {
        dateFormat: "Y-m-d",
        allowInput: false,
        disableMobile: "true",
    });

    let prod_date = $('#prod_date');
    let exp_date = $('#exp_date');
    let release_date = $('#release_date');

    prod_date.flatpickr({
        dateFormat: "Y-m-d",
        allowInput: false,
        disableMobile: true,
        onChange: function(selectedDates, dateStr, instance) {
            exp_date.flatpickr({
                dateFormat: "Y-m-d",
                allowInput: false,
                disableMobile: "true",
                minDate: new Date(selectedDates).fp_incr(1), // add 1 day
            });

            release_date.flatpickr({
                dateFormat: "Y-m-d",
                allowInput: false,
                disableMobile: "true",
                minDate: new Date(selectedDates).fp_incr(1), // add 1 day
            });
        }
    });

    exp_date.flatpickr({});
    release_date.flatpickr({});

    let analys_date = $('#analys_date');
    let analys_end_date = $('#analys_end_date');

    analys_date.flatpickr({
        dateFormat: "Y-m-d",
        allowInput: false,
        disableMobile: true,
        onChange: function(selectedDates, dateStr, instance) {
            analys_end_date.flatpickr({
                dateFormat: "Y-m-d",
                allowInput: false,
                disableMobile: "true",
                minDate: new Date(selectedDates).fp_incr(1), // add 1 day
            });
        }
    });

    analys_end_date.flatpickr({});

    $(".upper").keyup(function () {
        this.value = this.value.toLocaleUpperCase();
    });

    $.validator.setDefaults({
        submitHandler: function () {
            save();
        }
    });

    $('#form-qcheck-detail').validate({
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
    var form = $('#form-qcheck-detail')[0];
    var data = new FormData(form);

    $.ajax({
        type: "POST",
        enctype: 'multipart/form-data',
        url: site_url + "export/qc_check/update",
        data: data,
        dataType: "json",
        cache : false,
        contentType: false,
        processData: false,
        beforeSend: function(){
            $('a.cancel').prop('disabled', true);
            $('button#btn-qcheck-save').html("<img src=" + base_url + "assets/images/inventory/loader.gif style='height:20px;'  /> Saving...").prop('disabled', true);
        },
        success: function(response) {
            console.log(response);
            if(response.status == 1) {
                $('a.cancel').prop('disabled', true);
                $('button#btn-qcheck-save').html("<i class='fas fa-save mr-2'></i>Save").prop('disabled', true);
                swal("", response.messages, response.icon).then((value) => {
                    window.location.href = site_url + response.url;
                });
            } else {
                swal("", response.messages, response.icon);
                $('a.cancel').prop('disabled', false);
                $('button#btn-qcheck-save').html("<i class='fas fa-save mr-2'></i>Save").prop('disabled', false);
            }
        },
        error: function (e) {
            console.log("Terjadi kesalahan pada sistem");
            swal("", "Terjadi kesalahan pada sistem.", "error");
            $('a.cancel').prop('disabled', false);
            $('button#btn-qcheck-save').html("<i class='fas fa-save mr-2'></i>Save").prop('disabled', false);
        }
    });
}