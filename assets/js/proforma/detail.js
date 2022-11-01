$(function () {
    $('.select2bs4').select2({
        theme: 'bootstrap4',
        placeholder: 'Select an option',
        allowClear: true
    })

    $(".upper").keyup(function () {
        this.value = this.value.toLocaleUpperCase();
    });

    $('input#btn-item').on('click',function(){
        console.log('item');
        var item_category = $('.item_category').val();
        var product = $('#product').val();
        // var hs_code = $('#hs_code').val();
        var config = $('#config').val();
        var qty = $('#qty').val();

        if(item_category == "" || product == "" || config == "" || qty == "" || price == "") {
            swal("", "Item data cannot be empty.", "warning");
        } else {
            var rnd = Math.floor((Math.random() * 10000) + 1);
            var cbm_item = Number(document.getElementById("volume").value) * Number(document.getElementById("qty").value);
            var remain_cbm = document.getElementById("remain_cbm").value - (Number(document.getElementById("volume").value) * Number(document.getElementById("qty").value));
            console.log(remain_cbm);
            
            if(remain_cbm < 0) {
                swal("", "Qty melebihi maximum CBM.", "warning");
            } else {
                document.getElementById("remain_cbm").value = remain_cbm;
                $('tbody#data-item').append(
                    '<tr data-id="'+rnd+'">'+
                        '<td style="width: 16%">'+
                            '<input type="hidden" id="grid_item_category_'+rnd+'" name="grid_item_category_'+rnd+'" value="'+$('select.item[name="item_category"]').val()+'" />'+
                            '<input type="text" class="form-control" value="'+$('select.item[name="item_category"] option:selected').text()+'" style="background-color:#ffffff;" readonly required />'+
                        '</td>'+
                        '<td style="width: 34%">'+
                            '<input type="hidden" id="grid_product_'+rnd+'" name="grid_product_'+rnd+'" value="'+$('select.item[name="product"]').val()+'" />'+
                            '<input type="text" class="form-control" value="'+$('select.item[name="product"] option:selected').text()+'" style="background-color:#ffffff;" readonly required />'+
                            '<input type="hidden" class="form-control volume" id="grid_volume_'+rnd+'" name="grid_volume_'+rnd+'" data-value="'+$('input.item[name="volume"]').val()+'" value="'+$('input.item[name="volume"]').val()+'" style="background-color:#ffffff;" readonly />'+
                            '<input type="hidden" class="form-control volume" id="grid_cbm_'+rnd+'" name="grid_cbm_'+rnd+'" data-value="'+cbm_item+'" value="'+cbm_item+'" />'+
                        '</td>'+
                        // '<td style="width: 8%">'+
                        //     '<input type="text" class="form-control" id="grid_hs_code_'+rnd+'" name="grid_hs_code_'+rnd+'" value="'+$('input.item[name="hs_code"]').val()+'" style="background-color:#ffffff;" readonly required />'+
                        // '</td>'+
                        '<td style="width: 26%">'+
                            '<input type="text" class="form-control" id="grid_config_'+rnd+'" name="grid_config_'+rnd+'" value="'+$('input.item[name="config"]').val()+'" style="background-color:#ffffff;" readonly required />'+
                        '</td>'+
                        '<td>'+
                            '<input type="text" class="form-control qty" id="grid_qty_'+rnd+'" name="grid_qty_'+rnd+'" data-value="'+$('input.item[name="qty"]').val()+'" value="'+$('input.item[name="qty"]').val()+'" style="background-color:#ffffff;" readonly required />'+
                        '</td>'+
                        '<td>'+
                            '<input type="text" class="form-control" id="grid_price_'+rnd+'" name="grid_price_'+rnd+'" value="'+$('input.item[name="price"]').val()+'" style="background-color:#ffffff;" readonly required />'+
                        '</td>'+
                        '<td class="text-center">'+
                            '<button type="button" class="btn btn-danger btn-flat btn-remove" style="cursor:pointer;" data-row="'+rnd+'"><i class="fas fa-trash"></i></button>'+
                        '</td>'+
                    '</tr>'
                );
                
                $('.item').val('');
                $(".item").val('').trigger('change')
            }
            
            $('button.btn-remove').off('click').on('click',function(){
                var id = $(this).attr('data-row');
                var volume = $("tr[data-id="+id+"]").find(".volume").data("value");
                var qty = $("tr[data-id="+id+"]").find(".qty").data("value");
                var cbm = (volume * qty);
                $("tr[data-id="+id+"]").remove();
                document.getElementById("remain_cbm").value = Number(document.getElementById("remain_cbm").value) + cbm;
            });
        }
    });

    $.validator.setDefaults({
        submitHandler: function () {
            save();
        }
    });

    $('#form-proforma-detail').validate({
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

$('select#container').on('change', function() {
    var data = $('select#container').select2('data');
    cbm(data[0].id);
    var rowCount = $('#data-item tr').length;
    console.log(rowCount);

    if(rowCount > 0) {
        swal("", "Items and CBM have been reset.", "warning");
        $('#data-item').html("");
        cbm(data[0].id);
    }    
});

$('select#freight_company').on('change', function() {
    var data = $('select#freight_company').select2('data');
    freight(data[0].id);
});

$('select#product').on('change', function() {
    var data = $('select#product').select2('data');
    item(data[0].id);
});

$('button.btn-remove').off('click').on('click',function(){
    var id = $(this).attr('data-row');
    var cbm = $(this).attr('data-value');
    $("tr[data-id="+id+"]").remove();
    item_delete(id, cbm);
});

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
                document.getElementById("consignee_phone").value = response.phone_no;
                document.getElementById("consignee_cp").value = response.name;
                document.getElementById("top_id").value = response.top_id;
                document.getElementById("top").value = response.top_name;
                document.getElementById("freight_company").value = response.company;
                document.getElementById("freight_company_cont").value = response.contact;
                document.getElementById("freight_company_no").value = response.number;
            } else {
                document.getElementById("consignee_address").value = '';
                document.getElementById("consignee_country").value = '';
                document.getElementById("consignee_phone").value = '';
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
                document.getElementById("currenct_cbm").value = response.max_cbm;
                document.getElementById("remain_cbm").value = response.max_cbm;
            } else {
                document.getElementById("currenct_cbm").value = 0;
                document.getElementById("remain_cbm").value = 0;
            }
        },
        error: function (e) {
            console.log("Terjadi kesalahan pada sistem");
            swal("", "Terjadi kesalahan pada sistem.", "error");
        }        
    });
}

function item(id)
{
    $.ajax({
        url: site_url + "export/proforma/item/" + id,
        type: "POST",
        dataType: "json",
        success: function(response) {
            if(response) {
                var lengths = Number(response.length);
                var widths = Number(response.width);
                var heights = Number(response.height);
                var volume = ((lengths) * (widths) * (heights)) / 1000000000;
                document.getElementById("volume").value = volume;
                // document.getElementById("hs_code").value = response.hs_code;
                document.getElementById("config").value = response.pack_desc;
            } else {
                document.getElementById("volume").value = 0;
                // document.getElementById("hs_code").value = '';
                document.getElementById("config").value = '';
            }
        },
        error: function (e) {
            console.log("Terjadi kesalahan pada sistem");
            swal("", "Terjadi kesalahan pada sistem.", "error");
        }        
    });
}

function item_delete(id, cbm)
{
    $.ajax({
        url: site_url + "export/proforma/delete_item/" + id,
        type: "POST",
        dataType: "json",
        success: function(response) {
            document.getElementById("remain_cbm").value = Number(document.getElementById("remain_cbm").value) + Number(cbm);
        },
        error: function (e) {
            console.log("Terjadi kesalahan pada sistem");
            swal("", "Terjadi kesalahan pada sistem.", "error");
        }        
    });
}

function coding(id)
{
    $.ajax({
        url: site_url + "export/proforma/coding/" + id,
        type: "POST",
        dataType: "json",
        success: function(response) {
            console.log(response)
            if(response) {
                document.getElementById("imported_1").value = response[0].import_by;
                document.getElementById("hotline_1").value = response[0].hotline;
                document.getElementById("bb_1").value = response[0].best_before;
                document.getElementById("imported_2").value = response[1].import_by;
                document.getElementById("hotline_2").value = response[1].hotline;
                document.getElementById("bb_2").value = response[1].best_before;
                document.getElementById("imported_3").value = response[2].import_by;
                document.getElementById("hotline_3").value = response[2].hotline;
                document.getElementById("bb_3").value = response[2].best_before;
                document.getElementById("notes").value = response[0].notes;
                
            } else {
                document.getElementById("imported_1").value = '';
                document.getElementById("hotline_1").value = '';
                document.getElementById("bb_1").value = '';
                document.getElementById("imported_2").value = '';
                document.getElementById("hotline_2").value = '';
                document.getElementById("bb_2").value = '';
                document.getElementById("imported_3").value = '';
                document.getElementById("hotline_3").value = '';
                document.getElementById("bb_3").value = '';
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
        url: site_url + "export/proforma/update",
        type: "POST",
        data: $('#form-proforma-detail').serialize(),
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