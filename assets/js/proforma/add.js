$(function () {
    $('.select2bs4').select2({
        theme: 'bootstrap4',
        placeholder: 'Select an option',
        allowClear: true
    })

    // $("#consignee_country").select2("readonly", true);

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
    consignee(data[0].id);
    discharge(data[0].id);
});

$('select#pi_beneficiary').on('change', function() {
    var data = $('select#pi_beneficiary').select2('data');
    beneficiary(data[0].id);
});

$('select#discharge_port').on('change', function() {
    var data = $('select#discharge_port').select2('data');
    destination(data[0].id);
});

function consignee(id)
{
    $.ajax({
        url: site_url + "export/proforma/customer/" + id,
        type: "POST",
        dataType: "json",
        success: function(response) {
            console.log(response)
            if(response) {
                document.getElementById("consignee_address").value = response.address;
                document.getElementById("consignee_country").value = response.country_name;
                document.getElementById("consignee_phone").value = response.phone_no;
                document.getElementById("consignee_cp").value = response.name;
                document.getElementById("top_id").value = response.top_id;
                document.getElementById("top").value = response.top_name;
            } else {
                document.getElementById("consignee_address").value = '';
                document.getElementById("consignee_country").value = '';
                document.getElementById("consignee_phone").value = '';
                document.getElementById("consignee_cp").value = '';
                document.getElementById("top_id").value = '';
                document.getElementById("top").value = '';
            }
        },
        error: function (e) {
            console.log("Terjadi kesalahan pada sistem");
            swal("", "Terjadi kesalahan pada sistem.", "error");
        }        
    });
}

function beneficiary(id)
{
    $.ajax({
        url: site_url + "export/proforma/beneficiary/" + id,
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
}

function discharge(id)
{
    $.ajax({
        url: site_url + "export/proforma/discharge/" + id,
        type: "POST",
        dataType: "json",
        success: function(response) {
            console.log(response)
            var html = '';
            var i;
            for(i=0; i<response.length; i++) {
                html += '<option></option>';
                html += '<option value="'+response[i].id+'">'+response[i].discharge_port+'</option>';
            }
            $('#discharge_port').html(html);
        },
        error: function (e) {
            console.log("Terjadi kesalahan pada sistem");
            swal("", "Terjadi kesalahan pada sistem.", "error");
        }        
    });
}

function destination(id)
{
    $.ajax({
        url: site_url + "export/proforma/destination/" + id,
        type: "POST",
        dataType: "json",
        success: function(response) {
            console.log(response)
            if(response) {
                document.getElementById("destination_port").value = response.destination_port;
            } else {
                document.getElementById("destination_port").value = '';
            }
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