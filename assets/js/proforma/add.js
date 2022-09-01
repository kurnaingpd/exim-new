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

    $('#form-proforma-add').validate({
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

$('select#pi_consignee').on('change', function() {
    var data = $('select#pi_consignee').select2('data');
    $.ajax({
        url: site_url + "export/proforma/customer/" + data[0].id,
        type: "POST",
        dataType: "json",
        success: function(response) {
            console.log(response)
            if(response) {
                document.getElementById("consignee_address").value = response.address;
                document.getElementById("consignee_country").value = response.country_name;
                document.getElementById("consignee_phone").value = response.phone_no;
                document.getElementById("consignee_cp").value = response.name;
            } else {
                document.getElementById("consignee_address").value = '';
                document.getElementById("consignee_country").value = '';
                document.getElementById("consignee_phone").value = '';
                document.getElementById("consignee_cp").value = '';
            }
        },
        error: function (e) {
            console.log("Terjadi kesalahan pada sistem");
            swal("", "Terjadi kesalahan pada sistem.", "error");
        }        
    });
});

$('select#pi_beneficiary').on('change', function() {
    var data = $('select#pi_beneficiary').select2('data');
    $.ajax({
        url: site_url + "export/proforma/beneficiary/" + data[0].id,
        type: "POST",
        dataType: "json",
        success: function(response) {
            console.log(response)
            if(response) {
                document.getElementById("beneficiary_address").value = response.address;
                document.getElementById("beneficiary_country").value = response.country_name;
                document.getElementById("beneficiary_phone").value = response.phone;
                document.getElementById("beneficiary_cp").value = response.cp_name;
            } else {
                document.getElementById("beneficiary_address").value = '';
                document.getElementById("beneficiary_country").value = '';
                document.getElementById("beneficiary_phone").value = '';
                document.getElementById("beneficiary_cp").value = '';
            }
        },
        error: function (e) {
            console.log("Terjadi kesalahan pada sistem");
            swal("", "Terjadi kesalahan pada sistem.", "error");
        }        
    });
});

function save()
{
    $.ajax({
        url: site_url + "export/proforma/save",
        type: "POST",
        data: $('#form-proforma-add').serialize(),
        dataType: "json",
        beforeSend: function(){
            $('a.cancel').prop('disabled', true);
            $('button#btn-customer-save').html("<img src=" + base_url + "assets/images/inventory/loader.gif style='height:20px;'  /> Saving...").prop('disabled', true);
        },
        success: function(response) {
            console.log(response);
            // if(response.status == 1) {
            //     $('a.cancel').prop('disabled', true);
            //     $('button#btn-customer-save').html("<i class='fas fa-save mr-2'></i>Save").prop('disabled', true);
            //     swal("", response.messages, response.icon).then((value) => {
            //         window.location.href = site_url + response.url;
            //     });
            // } else {
            //     swal("", response.messages, response.icon);
            // }
        },
        error: function (e) {
            console.log("Terjadi kesalahan pada sistem");
            swal("", "Terjadi kesalahan pada sistem.", "error");
            $('a.cancel').prop('disabled', true);
            $('button#btn-customer-save').html("<i class='fas fa-save mr-2'></i>Save").prop('disabled', true);
        }        
    });
}