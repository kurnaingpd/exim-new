$(function () {
    $('.select2bs4').select2({
        theme: 'bootstrap4',
        placeholder: 'Select an option',
        allowClear: true
    })

    $(".upper").keyup(function () {
        this.value = this.value.toLocaleUpperCase();
    });

    $('input#btn-container').on('click',function() {
        var container_type = $('#containers').val();
        var container_no = $('#container_no').val();

        if(container_type == "" || container_no == "") {
            swal("", "Container(s) data cannot be empty.", "warning");
        } else {
            var rnd = Math.floor((Math.random() * 10000) + 1);
            $('tbody#data-container').append(
                '<tr data-id="'+rnd+'">'+
                    '<td>'+
                        '<input type="hidden" id="grid_containers_'+rnd+'" name="grid_containers_'+rnd+'" value="'+$('select.container[name="containers"]').val()+'" />'+
                        '<input type="text" class="form-control" value="'+$('select.container[name="containers"] option:selected').text()+'" style="background-color:transparent; border: none transparent;" readonly />'+
                    '</td>'+
                    '<td>'+
                        '<input type="text" class="form-control qty" id="grid_max_cbm_'+rnd+'" name="grid_max_cbm_'+rnd+'" value="'+$('input.container[name="max_cbm"]').val()+'" style="background-color:transparent; border: none transparent;" readonly />'+
                    '</td>'+
                    '<td>'+
                        '<input type="text" class="form-control qty" id="grid_container_no_'+rnd+'" name="grid_container_no_'+rnd+'" value="'+$('input.container[name="container_no"]').val()+'" style="background-color:transparent; border: none transparent;" readonly />'+
                    '</td>'+
                    '<td class="text-center">'+
                        '<button type="button" class="btn btn-danger btn-flat btn-remove" style="cursor:pointer;" data-row="'+rnd+'"><i class="fas fa-trash"></i></button>'+
                    '</td>'+
                '</tr>'
            );

            $('.container').val('');
            $(".container").val('').trigger('change')
        }

        $('button.btn-remove').off('click').on('click',function() {
            var id = $(this).attr('data-row');
            $("tr[data-id="+id+"]").remove();
        });
    });

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
    coding(data[0].id);
});

$('select#pi_beneficiary').on('change', function() {
    var data = $('select#pi_beneficiary').select2('data');
    beneficiary(data[0].id);
});

$('select#discharge_port').on('change', function() {
    var data = $('select#discharge_port').select2('data');
    destination(data[0].id);
});

$('select#freight_company').on('change', function() {
    var data = $('select#freight_company').select2('data');
    freight(data[0].id);
});

$('select#containers').on('change', function() {
    var data = $('select#containers').select2('data');
    cbm(data[0].id);
});
// $('select#product').on('change', function() {
//     var data = $('select#product').select2('data');
//     item(data[0].id);
// });

function consignee(id)
{
    $.ajax({
        url: site_url + "export/proforma/customer/" + id,
        type: "POST",
        dataType: "json",
        success: function(response) {
            if(response) {
                document.getElementById("consignee_address").value = response.address;
                document.getElementById("consignee_country").value = response.country_name;
                document.getElementById("consignee_phone_tel").value = response.phone_no_tel;
                document.getElementById("consignee_phone_fax").value = response.phone_no_fax;
                document.getElementById("consignee_cp").value = response.name;
                document.getElementById("top_id").value = response.top_id;
                document.getElementById("top").value = response.top_name;
                document.getElementById("freight_company").value = response.company;
                document.getElementById("freight_company_cont").value = response.contact;
                document.getElementById("freight_company_no").value = response.number;
            } else {
                document.getElementById("consignee_address").value = '';
                document.getElementById("consignee_country").value = '';
                document.getElementById("consignee_phone_tel").value = '';
                document.getElementById("consignee_phone_fax").value = '';
                document.getElementById("consignee_cp").value = '';
                document.getElementById("top_id").value = '';
                document.getElementById("top").value = '';
                document.getElementById("freight_company").value = '';
                document.getElementById("freight_company_cont").value = '';
                document.getElementById("freight_company_no").value = '';
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

function cbm(id)
{
    $.ajax({
        url: site_url + "export/proforma/cbm/" + id,
        type: "POST",
        dataType: "json",
        success: function(response) {
            if(response) {
                document.getElementById("max_cbm").value = response.max_cbm;
            } else {
                document.getElementById("max_cbm").value = "";
            }
        },
        error: function (e) {
            console.log("Terjadi kesalahan pada sistem");
            swal("", "Terjadi kesalahan pada sistem.", "error");
        }        
    });
}

// function item(id)
// {
//     $.ajax({
//         url: site_url + "export/proforma/item/" + id,
//         type: "POST",
//         dataType: "json",
//         success: function(response) {
//             if(response) {
//                 var lengths = Number(response.length);
//                 var widths = Number(response.width);
//                 var heights = Number(response.height);
//                 var volume = ((lengths) * (widths) * (heights)) / 1000000000;
//                 document.getElementById("volume").value = volume;
//                 // document.getElementById("hs_code").value = response.hs_code;
//                 document.getElementById("config").value = response.pack_desc;
//             } else {
//                 document.getElementById("volume").value = 0;
//                 // document.getElementById("hs_code").value = '';
//                 document.getElementById("config").value = '';
//             }
//         },
//         error: function (e) {
//             console.log("Terjadi kesalahan pada sistem");
//             swal("", "Terjadi kesalahan pada sistem.", "error");
//         }        
//     });
// }

function coding(id)
{
    $.ajax({
        url: site_url + "export/proforma/coding/" + id,
        type: "POST",
        dataType: "json",
        success: function(response) {
            console.log(response)
            if(response) {
                document.getElementById("sachet_imported").value = (response[0]?response[0].import_by:'-');
                document.getElementById("sachet_hotline").value = (response[0]?response[0].hotline:'-');
                document.getElementById("sachet_bb").value = (response[0]?response[0].best_before:'-');
                document.getElementById("pouch_imported").value = (response[1]?response[1].import_by:'-');
                document.getElementById("pouch_hotline").value = (response[1]?response[1].hotline:'-');
                document.getElementById("pouch_bb").value = (response[1]?response[1].best_before:'-');
                document.getElementById("case_imported").value = (response[2]?response[2].import_by:'-');
                document.getElementById("case_hotline").value = (response[2]?response[2].hotline:'-');
                document.getElementById("case_bb").value = (response[2]?response[2].best_before:'-');
                document.getElementById("notes").value = (response[0]?response[0].notes:'-');
                
            } else {
                document.getElementById("sachet_imported").value = '';
                document.getElementById("sachet_hotline").value = '';
                document.getElementById("sachet_bb").value = '';
                document.getElementById("pouch_imported").value = '';
                document.getElementById("pouch_hotline").value = '';
                document.getElementById("pouch_bb").value = '';
                document.getElementById("case_imported").value = '';
                document.getElementById("case_hotline").value = '';
                document.getElementById("case_bb").value = '';
                document.getElementById("notes").value = '';
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
            $('button#btn-proforma-save').html("<img src=" + base_url + "assets/images/inventory/loader.gif style='height:20px;'  /> Saving...").prop('disabled', true);
        },
        success: function(response) {
            console.log(response);
            if(response.status == 1) {
                $('a.cancel').prop('disabled', true);
                $('button#btn-proforma-save').html("<i class='fas fa-save mr-2'></i>Save").prop('disabled', true);
                swal("", response.messages, response.icon).then((value) => {
                    window.location.href = site_url + response.url;
                });
            } else {
                swal("", response.messages, response.icon);
                $('a.cancel').prop('disabled', false);
                $('button#btn-proforma-save').html("<i class='fas fa-save mr-2'></i>Save").prop('disabled', false);
            }
        },
        error: function (e) {
            console.log("Terjadi kesalahan pada sistem");
            swal("", "Terjadi kesalahan pada sistem.", "error");
            $('a.cancel').prop('disabled', false);
            $('button#btn-proforma-save').html("<i class='fas fa-save mr-2'></i>Save").prop('disabled', false);
        }        
    });
}