$(function () {
    $('.select2bs4').select2({
        theme: 'bootstrap4',
        placeholder: 'Select an option',
        allowClear: true
    })

    $('input#btn-item').on('click',function(){
        console.log('item');
        var item_category = $('.item_category').val();
        var product = $('#product').val();
        var hs_code = $('#hs_code').val();
        var config = $('#config').val();
        var qty = $('#qty').val();

        if(item_category == "" || product == "" || hs_code == "" || config == "" || qty == "" || price == "") {
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
                        '<td>'+
                            '<input type="text" class="form-control" id="grid_container_no_'+rnd+'" name="grid_container_no_'+rnd+'" data-value="'+$('input.container[name="container_no"]').val()+'" value="'+$('input.container[name="container_no"]').val()+'" style="background-color:transparent; border: none transparent;" readonly required />'+
                        '</td>'+
                        '<td style="width: 16%">'+
                            '<input type="hidden" id="grid_item_category_'+rnd+'" name="grid_item_category_'+rnd+'" value="'+$('select.item[name="item_category"]').val()+'" />'+
                            '<input type="text" class="form-control" value="'+$('select.item[name="item_category"] option:selected').text()+'" style="background-color:transparent; border: none transparent;" readonly required />'+
                        '</td>'+
                        '<td style="width: 34%">'+
                            '<input type="hidden" id="grid_product_'+rnd+'" name="grid_product_'+rnd+'" value="'+$('select.item[name="product"]').val()+'" />'+
                            '<input type="text" class="form-control" value="'+$('select.item[name="product"] option:selected').text()+'" style="background-color:transparent; border: none transparent;" readonly required />'+
                            '<input type="hidden" class="form-control volume" id="grid_volume_'+rnd+'" name="grid_volume_'+rnd+'" data-value="'+$('input.item[name="volume"]').val()+'" value="'+$('input.item[name="volume"]').val()+'" style="background-color:transparent; border: none transparent;" readonly />'+
                            '<input type="hidden" class="form-control volume" id="grid_cbm_'+rnd+'" name="grid_cbm_'+rnd+'" data-value="'+cbm_item+'" value="'+cbm_item+'" />'+
                        '</td>'+
                        '<td style="width: 8%">'+
                            '<input type="text" class="form-control" id="grid_hs_code_'+rnd+'" name="grid_hs_code_'+rnd+'" value="'+$('input.item[name="hs_code"]').val()+'" style="background-color:transparent; border: none transparent;" readonly required />'+
                        '</td>'+
                        '<td>'+
                            '<input type="text" class="form-control qty" id="grid_qty_'+rnd+'" name="grid_qty_'+rnd+'" data-value="'+$('input.item[name="qty"]').val()+'" value="'+$('input.item[name="qty"]').val()+'" style="background-color:transparent; border: none transparent;" readonly required />'+
                        '</td>'+
                        '<td>'+
                            '<input type="text" class="form-control" id="grid_price_'+rnd+'" name="grid_price_'+rnd+'" value="'+$('input.item[name="price"]').val()+'" style="background-color:transparent; border: none transparent;" readonly required />'+
                        '</td>'+
                        '<td class="text-center">'+
                            '<button type="button" class="btn btn-danger btn-flat btn-remove-temp" style="cursor:pointer;" data-row="'+rnd+'"><i class="fas fa-trash"></i></button>'+
                        '</td>'+
                    '</tr>'
                );

                $('.item').val('');
                $(".item").val('').trigger('change')
            }

            $('button.btn-remove-temp').off('click').on('click',function(){
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

    $('#form-proforma-process').validate({
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

$('select#status').on('change', function() {
    var data = $('select#status').select2('data');

    if(data[0].id == 6 || data[0].id == 7) {
        $("div#required").addClass("required");
        $('textarea#remark').prop('readonly', false);
        $('textarea#remark').prop('required', true);
    } else {
        $("div#required").removeClass("required");
        $('textarea#remark').prop('readonly', true);
        $('textarea#remark').prop('required', false);
    }
});

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
                document.getElementById("config").value = response.pack_desc;
            } else {
                document.getElementById("volume").value = 0;
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

function save()
{
    $.ajax({
        url: site_url + "export/proforma/update_process",
        type: "POST",
        data: $('#form-proforma-process').serialize(),
        dataType: "json",
        beforeSend: function(){
            $('a.cancel').prop('disabled', true);
            $('button#btn-process').html("<img src=" + base_url + "assets/images/inventory/loader.gif style='height:20px;'  /> Saving...").prop('disabled', true);
        },
        success: function(response) {
            console.log(response);
            if(response.status == 1) {
                $('a.cancel').prop('disabled', false);
                $('button#btn-process').html("<i class='fas fa-save mr-2'></i>Save").prop('disabled', true);
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
            $('a.cancel').prop('disabled', false);
            $('button#btn-process').html("<i class='fas fa-save mr-2'></i>Save").prop('disabled', false);
        }        
    });
}