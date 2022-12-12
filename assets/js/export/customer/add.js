$(function () {
    $('.select2bs4').select2({
        theme: 'bootstrap4',
        placeholder: 'Select an option',
        allowClear: true
    })

    $('button#btn-customer-save').prop('disabled', true);

    flatpickr(".datetimepicker-input", {
        dateFormat: "m/d/Y",
        allowInput: false,
        disableMobile: "true",
    });

    $(".upper").keyup(function () {
        this.value = this.value.toLocaleUpperCase();
    });

    $(".lower").keyup(function () {
        this.value = this.value.toLowerCase();
    });

    $('input#btn-shipto').on('click',function(){
        var discharge = $('#shipto_discharge').val();
        var destination = $('#shipto_destination').val();

        if(discharge == "" || destination == "") {
            swal("", "Discharge/destination port cannot be empty.", "warning");
        } else {
            var rnd = Math.floor((Math.random() * 10000) + 1);
            $('tbody#data-shipto').append(
                '<tr id="count" data-id="'+rnd+'">'+
                    '<td><input type="text" class="form-control" id="grid_shipto_discharge_'+rnd+'" name="grid_shipto_discharge_'+rnd+'" value="'+$('input.port[name="shipto_discharge"]').val()+'" style="background-color:transparent; border: none transparent;" readonly /></td>'+
                    '<td><input type="text" class="form-control" id="grid_shipto_destination_'+rnd+'" name="grid_shipto_destination_'+rnd+'" value="'+$('input.port[name="shipto_destination"]').val()+'" style="background-color:transparent; border: none transparent;" readonly /></td>'+
                    '<td class="text-center">'+
                        '<button type="button" class="btn btn-sm btn-danger btn-flat btn-remove" style="cursor:pointer;" data-row="'+rnd+'"><i class="fas fa-trash"></i></button>'+
                    '</td>'+
                '</tr>'
            );
            
            $('.port').val('');
            var count = $('tr#count').length;
                
            if(count > 0) {
                $('button.save').prop('disabled', false);
            } else {
                $('button.save').prop('disabled', true);
            }
            
            $('button.btn-remove').off('click').on('click',function(){
                var id = $(this).attr('data-row');
                $("tr[data-id="+id+"]").remove();
                var count = $('tr#count').length;
                
                if(count > 0) {
                    $('button.save').prop('disabled', false);
                } else {
                    $('button.save').prop('disabled', true);
                }
            });
        }
    });

    // $('input#btn-coding').on('click',function(){
    //     console.log('coding');
    //     var type = $('#coding_type').val();
    //     var imports = $('#coding_import').val();
    //     var hotline = $('#coding_hotline').val();
    //     var bb = $('#coding_bb').val();

    //     if(type == "" || imports == "" || hotline == "" || bb == "") {
    //         swal("", "Coding printing section cannot be empty.", "warning");
    //     } else {
    //         var rnd = Math.floor((Math.random() * 10000) + 1);
    //         $('tbody#data-coding').append(
    //             '<tr data-id="'+rnd+'">'+
    //                 '<td>'+
    //                     '<input type="hidden" id="cd_coding_type_'+rnd+'" name="cd_coding_type_'+rnd+'" value="'+$('select.coding[name="coding_type"]').val()+'" />'+
    //                     '<input type="text" id="cd_coding_type_name_'+rnd+'" name="cd_coding_type_name_'+rnd+'" class="form-control" value="'+$('select.coding[name="coding_type"] option:selected').text()+'" style="background-color:transparent; border: none transparent;" readonly />'+
    //                 '</td>'+
    //                 '<td><input type="text" class="form-control" id="cd_coding_import_'+rnd+'" name="cd_coding_import_'+rnd+'" value="'+$('input.coding[name="coding_import"]').val()+'" style="background-color:transparent; border: none transparent;" readonly /></td>'+
    //                 '<td><input type="text" class="form-control" id="cd_coding_hotline_'+rnd+'" name="cd_coding_hotline_'+rnd+'" value="'+$('input.coding[name="coding_hotline"]').val()+'" style="background-color:transparent; border: none transparent;" readonly /></td>'+
    //                 '<td><input type="text" class="form-control" id="cd_coding_bb_'+rnd+'" name="cd_coding_bb_'+rnd+'" value="'+$('input.coding[name="coding_bb"]').val()+'" style="background-color:transparent; border: none transparent;" readonly /></td>'+
    //                 '<td class="text-center">'+
    //                     '<button type="button" class="btn btn-danger btn-flat btn-remove" style="cursor:pointer;" data-row="'+rnd+'"><i class="fas fa-trash"></i></button>'+
    //                 '</td>'+
    //             '</tr>'
    //         );
            
    //         $("select#coding_type option[value='"+$('select.coding[name="coding_type"]').val()+"']").remove();
    //         $('.coding').val('');
    //         $(".coding").val('').trigger('change')
            
    //         $('button.btn-remove').off('click').on('click',function(){
    //             var id = $(this).attr('data-row');
    //             var coding_id = $("tr[data-id="+id+"]").find("#cd_coding_type_"+id).val();
    //             var coding_name = $("tr[data-id="+id+"]").find("#cd_coding_type_name_"+id).val();
    //             $('select#coding_type').append('<option value="'+coding_id+'">'+coding_name+'</option>');
    //             $("tr[data-id="+id+"]").remove();
    //         });
    //     }
    // });

    $('input#cpshipto').on('change', function() {
        var status = document.getElementById("cpshipto").checked;
        if (status) {
            $('input.cpship').prop('disabled', false);
            $("div#required").addClass("required");
            $('input.frei').prop('required', true);
        } else {
            console.log("disable");
            $('input.cpship').prop('disabled', true);
            $("div#required").removeClass("required");
            $('input.frei').prop('required', false);
        }
    });

    $('input#freight').on('change', function() {
        var status = document.getElementById("freight").checked;
        if (status) {
            $("div#required").addClass("required");
            $('input.frei').prop('disabled', false);
            $('input.frei').prop('required', true);
        } else {
            console.log("disable");
            $("div#required").removeClass("required");
            $('input.frei').prop('disabled', true);
            $('input.frei').prop('required', false);
        }
    });

    $('input#import_doc').on('change', function() {
        var status = document.getElementById("import_doc").checked;
        if (status) {
            console.log("enable");
            $('.import').prop('disabled', false);
        } else {
            console.log("disable");
            $('.import').prop('disabled', true);
        }
    });

    $('input#coding_print').on('change', function() {
        var status = document.getElementById("coding_print").checked;
        if (status) {
            console.log("enable");
            $('.cod_print').prop('disabled', false);
            $(".datetimepicker-input").css("background-color", "#FFF");
        } else {
            console.log("disable");
            $('.cod_print').prop('disabled', true);
            $(".datetimepicker-input").css("background-color", "#e9ecef");
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

$('select#con_bank').on('change', function() {
    var data = $('select#con_bank').select2('data');
    $.ajax({
        url: site_url + "export/master/customer/bank/" + data[0].id,
        type: "POST",
        dataType: "json",
        success: function(response) {
            if(response) {
                document.getElementById("bank_code").value = response.code;
                document.getElementById("bank_name").value = response.name;
                document.getElementById("bank_swift").value = response.swift_code;
                document.getElementById("bank_accno").value = response.account_no;
                document.getElementById("bank_accname").value = response.account_name;
                document.getElementById("bank_branch").value = response.branch;
                document.getElementById("bank_address").value = response.address;
            } else {
                document.getElementById("bank_code").value = '';
                document.getElementById("bank_name").value = '';
                document.getElementById("bank_swift").value = '';
                document.getElementById("bank_accno").value = '';
                document.getElementById("bank_accname").value = '';
                document.getElementById("bank_branch").value = '';
                document.getElementById("bank_address").value = '';
            }
        },
        error: function (e) {
            console.log("Terjadi kesalahan pada sistem");
            swal("", "Terjadi kesalahan pada sistem.", "error");
        }        
    });
});

$("#con_address").keyup(function () {
    document.getElementById("shipto_address").value = this.value;
});

$("#cp_name").keyup(function () {
    document.getElementById("cpshipto_name").value = this.value;
});

$("#cp_phone").keyup(function () {
    document.getElementById("cpshipto_phone").value = this.value;
    console.log(this.value)
});

$("#cp_email").keyup(function () {
    document.getElementById("cpshipto_email").value = this.value;
});

$("#cp_dp").keyup(function () {
    document.getElementById("cp_balancing").value = 100 - Number(document.getElementById("cp_dp").value);
});

function save()
{
    $.ajax({
        url: site_url + "export/master/customer/save",
        type: "POST",
        data: $('#form-customer-add').serialize(),
        dataType: "json",
        beforeSend: function(){
            $('a.cancel').prop('disabled', true);
            $('button#btn-customer-save').html("<img src=" + base_url + "assets/images/inventory/loader.gif style='height:20px;'  /> Saving...").prop('disabled', true);
        },
        success: function(response) {
            console.log(response);
            if(response.status == 1) {
                $('a.cancel').prop('disabled', true);
                $('button#btn-customer-save').html("<i class='fas fa-save mr-2'></i>Save").prop('disabled', true);
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
            $('button#btn-customer-save').html("<i class='fas fa-save mr-2'></i>Save").prop('disabled', false);
        }        
    });
}