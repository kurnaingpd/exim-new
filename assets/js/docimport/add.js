$(function () {
    $(".upper").keyup(function () {
        this.value = this.value.toLocaleUpperCase();
    });

    $('.select2bs4').select2({
        theme: 'bootstrap4',
        placeholder: 'Select an option',
        allowClear: true
    })

    $(".datetimepicker-input").css("background-color", "#FFF");

    flatpickr(".datetimepicker-input", {
        dateFormat: "Y-m-d",
        allowInput: false,
        disableMobile: "true",
        // minDate: "today",
    });

    $(".percent").keyup(function () {
        document.getElementById("percent").value = 
            Number($("#handling_vat").val()) + Number($("#at_cost").val()) + (
                Number($("#duty").val()) * Number($("#currency").val())
            ) / (
                (Number($("#cif").val()) * Number($("#currency").val())) + Number($("#freight_vat").val())
            )
        ;
    });

    $(".cif2").keyup(function () {
        document.getElementById("cif_2").value = Number($("#cif").val()) * Number($("#currency").val());
    });

    $(".landed_cost").keyup(function () {
        document.getElementById("landed_cost").value = (
            (Number($("#duty").val()) * Number($("#cif_2").val())) + Number($("#handling_vat").val()) + Number($("#at_cost").val())
        );
    });

    $.validator.setDefaults({
        submitHandler: function () {
            var inputs = $('.docs').filter((i, el) => el.value.trim() === '').length;
            console.log(inputs)
            if(inputs == 45) {
                swal("", "Document import can not be empty.", "warning");
            } else {
                save();
            }
        }
    });

    $('#form-docimport-add').validate({
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
        url: site_url + "import/docimport/save",
        type: "POST",
        data: $("#form-docimport-add").serialize(),
        dataType: "json",
        beforeSend: function(){
            $('a.cancel').prop('disabled', true);
            $('button.save').html("<img src=" + base_url + "assets/images/inventory/loader.gif style='height:20px;'  /> Saving...").prop('disabled', true);
        },
        success: function(response) {
            console.log(response);
            if(response.status == 1) {
                $('button.save').html("<i class='fas fa-save mr-2'></i>Save").prop('disabled', true);
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