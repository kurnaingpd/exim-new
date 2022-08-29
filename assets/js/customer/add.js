$(function () {
    $('.select2bs4').select2({
        theme: 'bootstrap4',
        placeholder: 'Select an option',
        allowClear: true
    })

    $(".upper").keyup(function () {
        this.value = this.value.toLocaleUpperCase();
    });

    $('input#btn-shipto').on('click',function(){
        console.log('coding');
        var discharge = $('#shipto_discharge').val();
        var destination = $('#shipto_destination').val();

        if(discharge == "" && destination == "") {
            swal("", "Discharge/destination port cannot be empty.", "warning");
        } else {
            var rnd = Math.floor((Math.random() * 10000) + 1);
            $('tbody#data-shipto').append(
                '<tr data-id="'+rnd+'">'+
                    '<td><input type="text" class="form-control" id="grid_shipto_discharge_'+rnd+'" name="grid_shipto_discharge_'+rnd+'" value="'+$('input.port[name="shipto_discharge"]').val()+'" style="background-color:#ffffff;" readonly /></td>'+
                    '<td><input type="text" class="form-control" id="grid_shipto_destination_'+rnd+'" name="grid_shipto_destination_'+rnd+'" value="'+$('input.port[name="shipto_destination"]').val()+'" style="background-color:#ffffff;" readonly /></td>'+
                    '<td class="text-center">'+
                        '<button type="button" class="btn btn-danger btn-flat btn-remove" style="cursor:pointer;" data-row="'+rnd+'"><i class="fas fa-trash"></i></button>'+
                    '</td>'+
                '</tr>'
            );
            
            $('.port').val('');
            
            $('button.btn-remove').off('click').on('click',function(){
                var id = $(this).attr('data-row');
                $("tr[data-id="+id+"]").remove();
            });
        }
    });

    $('input#btn-coding').on('click',function(){
        console.log('coding');
        var type = $('#coding_type').val();
        var imports = $('#coding_import').val();
        var hotline = $('#coding_hotline').val();
        var bb = $('#coding_bb').val();

        if(type == "" && imports == "" && hotline == "" && bb == "") {
            swal("", "Coding printing section cannot be empty.", "warning");
        } else {
            var rnd = Math.floor((Math.random() * 10000) + 1);
            $('tbody#data-coding').append(
                '<tr data-id="'+rnd+'">'+
                    '<td>'+
                        '<input type="hidden" id="cd_coding_type_'+rnd+'" name="cd_coding_type_'+rnd+'" value="'+$('select.coding[name="coding_type"]').val()+'" />'+
                        '<input type="text" class="form-control" value="'+$('select.coding[name="coding_type"] option:selected').text()+'" style="background-color:#ffffff;" readonly />'+
                    '</td>'+
                    '<td><input type="text" class="form-control" id="cd_coding_import_'+rnd+'" name="cd_coding_import_'+rnd+'" value="'+$('input.coding[name="coding_import"]').val()+'" style="background-color:#ffffff;" readonly /></td>'+
                    '<td><input type="text" class="form-control" id="cd_coding_hotline_'+rnd+'" name="cd_coding_hotline_'+rnd+'" value="'+$('input.coding[name="coding_hotline"]').val()+'" style="background-color:#ffffff;" readonly /></td>'+
                    '<td><input type="text" class="form-control" id="cd_coding_bb_'+rnd+'" name="cd_coding_bb_'+rnd+'" value="'+$('input.coding[name="coding_bb"]').val()+'" style="background-color:#ffffff;" readonly /></td>'+
                    '<td class="text-center">'+
                        '<button type="button" class="btn btn-danger btn-flat btn-remove" style="cursor:pointer;" data-row="'+rnd+'"><i class="fas fa-trash"></i></button>'+
                    '</td>'+
                '</tr>'
            );
            
            $("#coding_type").select2("val", "");
            $('.coding').val('');
            
            $('button.btn-remove').off('click').on('click',function(){
                var id = $(this).attr('data-row');
                $("tr[data-id="+id+"]").remove();
            });
        }
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

function save()
{
    $.ajax({
        url: site_url + "export/customer/save",
        type: "POST",
        data: $('#form-customer-add').serialize(),
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