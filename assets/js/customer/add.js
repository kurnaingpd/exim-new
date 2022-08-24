$(function () {
    $('.select2bs4').select2({
        theme: 'bootstrap4',
        placeholder: 'Select an option',
        allowClear: true
    })

    $(".upper").keyup(function () {
        this.value = this.value.toLocaleUpperCase();
    });

    $("#con_company").keyup(function () {
        document.getElementById("not_company").value = this.value;
    });

    $("#con_address").keyup(function () {
        document.getElementById("not_address").value = this.value;
        document.getElementById("shipto_address").value = this.value;
    });

    $('select#con_country').on('change', function() {
        var data = $('select#con_country').select2('data');
        document.getElementById("not_country_id").value = data[0].id;
        document.getElementById("not_country_name").value = data[0].text;
    });

    $("#con_phone").keyup(function () {
        document.getElementById("not_phone").value = this.value;
    });

    $("#cp_name").keyup(function () {
        document.getElementById("cpshipto_name").value = this.value;
    });

    $("#cp_phone").keyup(function () {
        document.getElementById("cpshipto_phone").value = this.value;
    });

    $("#cp_email").keyup(function () {
        document.getElementById("cpshipto_email").value = this.value;
    });

    $('select#con_bank').on('change', function() {
        var data = $('select#con_bank').select2('data');
        $.ajax({
            url: site_url + "export/customer/bank/" + data[0].id,
            type: "POST",
            dataType: "json",
            success: function(response) {
                if(response) {
                    document.getElementById("bank_code").value = response.code;
                    document.getElementById("bank_name").value = response.name;
                    document.getElementById("bank_branch").value = response.branch;
                    document.getElementById("bank_address").value = response.address;
                    document.getElementById("bank_swift").value = response.swift_code;
                } else {
                    document.getElementById("bank_code").value = '';
                    document.getElementById("bank_name").value = '';
                    document.getElementById("bank_branch").value = '';
                    document.getElementById("bank_address").value = '';
                    document.getElementById("bank_swift").value = '';
                }
            },
            error: function (e) {
                console.log("Terjadi kesalahan pada sistem");
                swal("", "Terjadi kesalahan pada sistem.", "error");
            }        
        });
    });

    $("#cp_dp").keyup(function () {
        document.getElementById("cp_balancing").value = 100 - Number(document.getElementById("cp_dp").value);
    });

    $.validator.setDefaults({
        submitHandler: function () {
            save();
        }
    });
    
    $('#form-customer-add').validate({
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
        url: site_url + "export/customer/save",
        type: "POST",
        data: $("#form-customer-add").serialize(),
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