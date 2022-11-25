$(function () {
    $('.select2bs4').select2({
        theme: 'bootstrap4',
        placeholder: 'Select an option',
        allowClear: true
    })

    $(".datetimepicker-input").css("background-color", "#FFF");
    $('button#btn-packing-save').prop('disabled', true);

    flatpickr(".datetimepicker-input", {
        dateFormat: "Y-m-d",
        allowInput: false,
        disableMobile: "true",
    });

    $(".upper").keyup(function () {
        this.value = this.value.toLocaleUpperCase();
    });

    $('input#btn-item').on('click',function() {
        var carton = $('#carton').val();
        var batch = $('#batch').val();

        if(carton == "" || batch == "") {
            swal("", "Item data cannot be empty.", "warning");
        } else {
            var rnd = Math.floor((Math.random() * 10000) + 1);
            var item = document.getElementById("product").value;
            var qty = Number(document.getElementById("qty").value);
            var qty_inv = Number(document.getElementById("qty_inv").value);
            var remain = document.getElementById("qty_"+item).value - qty;

            if(remain < 0) {
                swal("", "Total qty tidak boleh lebih dari "+qty_inv, "error");
            } else if(qty == 0) {
                swal("", "Total qty tidak boleh "+qty, "error");
            } else {
                document.getElementById("qty_"+item).value = remain;
                $('tbody#show-data').append(
                    '<tr id="count" data-id="'+rnd+'">'+
                        '<td style="width: 10%">'+
                            '<input type="text" class="form-control" value="'+$('select.item[name="container_no"] option:selected').text()+'" style="background-color:transparent; border: none transparent;" readonly required />'+
                        '</td>'+
                        '<td>'+
                            '<input type="text" class="form-control" value="'+$('select.item[name="category"] option:selected').text()+'" style="background-color:transparent; border: none transparent;" readonly required />'+
                        '</td>'+
                        '<td style="width: 24%">'+
                            '<input type="hidden" id="grid_pi_detail_id_'+rnd+'" name="grid_pi_detail_id_'+rnd+'" value="'+$('select.item[name="product"]').val()+'" />'+
                            '<input type="text" class="form-control" value="'+$('select.item[name="product"] option:selected').text()+'" style="background-color:transparent; border: none transparent;" readonly required />'+
                        '</td>'+
                        '<td>'+
                            '<input type="hidden" id="grid_batch_'+rnd+'" name="grid_batch_'+rnd+'" value="'+$('select.item[name="batch"]').val()+'" />'+
                            '<input type="text" class="form-control" value="'+$('select.item[name="batch"] option:selected').text()+'" style="background-color:transparent; border: none transparent;" readonly required />'+
                        '</td>'+
                        '<td>'+
                            '<input type="text" class="form-control qty" id="grid_qty_'+rnd+'" name="grid_qty_'+rnd+'" value="'+$('input.item[name="qty"]').val()+'" style="background-color:transparent; border: none transparent;" readonly />'+
                        '</td>'+
                        '<td style="width: 10%">'+
                            '<input type="text" class="form-control" id="grid_carton_'+rnd+'" name="grid_carton_'+rnd+'" value="'+$('input.item[name="carton"]').val()+'" style="background-color:transparent; border: none transparent;" readonly />'+
                        '</td>'+
                        '<td>'+
                            '<input type="text" class="form-control" id="grid_proddate_'+rnd+'" name="grid_proddate_'+rnd+'" value="'+$('input.item[name="proddate"]').val()+'" style="background-color:transparent; border: none transparent;" readonly />'+
                        '</td>'+
                        '<td>'+
                            '<input type="text" class="form-control" id="grid_expdate_'+rnd+'" name="grid_expdate_'+rnd+'" value="'+$('input.item[name="expdate"]').val()+'" style="background-color:transparent; border: none transparent;" readonly />'+
                        '</td>'+
                        '<td class="text-center">'+
                            '<button type="button" class="btn btn-danger btn-flat btn-remove" style="cursor:pointer;" data-row="'+rnd+'"><i class="fas fa-trash"></i></button>'+
                        '</td>'+
                    '</tr>'
                );
    
                $('.item').val('');
                $(".item").val('').trigger('change');
                var count = $('tr#count').length;
                
                if(count > 0) {
                    $('button.save').prop('disabled', false);
                } else {
                    $('button.save').prop('disabled', true);
                }
            }

            $('button.btn-remove').off('click').on('click',function(){
                var id = $(this).attr('data-row');
                var qty = Number($("tr[data-id="+id+"]").find(".qty").val());
                var remain = Number(document.getElementById("qty_"+item).value);
                document.getElementById("qty_"+item).value = remain + qty;
                $("tr[data-id="+id+"]").remove();
                $('.item').val('');
                $(".item").val('').trigger('change')
                var count = $('tr#count').length;
                
                if(count > 0) {
                    $('button.save').prop('disabled', false);
                } else {
                    $('button.save').prop('disabled', true);
                }
            });
        }
    });

    $.validator.setDefaults({
        submitHandler: function () {
            save();
        }
    });

    $('#form-packing-add').validate({
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

$('select#invoice').on('change', function() {
    var data = $('select#invoice').select2('data');
    get_data(data[0].id);
    get_container(data[0].id);
    get_item_qty(data[0].id);
});

$('select#container_no').on('change', function() {
    var invoice = $('select#invoice').select2('data');
    var container = $('select#container_no').select2('data');
    get_category(invoice[0].id, container[0].id);
});

$('select#category').on('change', function() {
    var invoice = $('select#invoice').select2('data');
    var container = $('select#container_no').select2('data');
    var category = $('select#category').select2('data');

    if(category.length == 1) {
        get_item(invoice[0].id, container[0].id, category[0].id);
    }
});

$('select#product').on('change', function() {
    var data = $('select#product').select2('data');

    if(data.length == 1) {
        get_data_item(data[0].id);
        get_batch(data[0].id);
    }
});

$('select#batch').on('change', function() {
    var data = $('select#batch').select2('data');

    if(data.length == 1) {
        get_date(data[0].id);
    }
});

function get_data(id)
{
    $.ajax({
        url: site_url + "export/packing/data/" + id,
        type: "POST",
        dataType: "json",
        success: function(response) {
            console.log(response);
            if(response) {
                document.getElementById("pi_id").value = response.pi_id;
                document.getElementById("cons_company").value = response.cons_name;
                document.getElementById("cons_address").value = response.cons_address;
                document.getElementById("cons_country").value = response.cons_country_name;
                document.getElementById("cons_phone_tel").value = response.cons_phone_tel;
                document.getElementById("cons_phone_fax").value = response.cons_phone_fax;
                document.getElementById("cons_cp").value = response.cp_name;

                document.getElementById("not_company").value = response.not_name;
                document.getElementById("not_address").value = response.not_address;
                document.getElementById("not_country").value = response.not_country_name;
                document.getElementById("not_phone_tel").value = response.not_phone_tel;
                document.getElementById("not_phone_fax").value = response.not_phone_fax;
                document.getElementById("not_cp").value = response.cp_name;

                document.getElementById("ship_company").value = response.ship_name;
                document.getElementById("ship_address").value = response.ship_address;
                document.getElementById("ship_discharge").value = response.discharge_port;
                document.getElementById("ship_loading").value = response.loading_port;
                document.getElementById("ship_country").value = response.country_origin;
            } else {
                document.getElementById("pi_id").value = "";
                document.getElementById("cons_company").value = "";
                document.getElementById("cons_address").value = "";
                document.getElementById("cons_country").value = "";
                document.getElementById("cons_phone_tel").value = "";
                document.getElementById("cons_phone_fax").value = "";
                document.getElementById("cons_cp").value = "";

                document.getElementById("not_company").value = "";
                document.getElementById("not_address").value = "";
                document.getElementById("not_country").value = "";
                document.getElementById("not_phone_tel").value = "";
                document.getElementById("not_phone_fax").value = "";
                document.getElementById("not_cp").value = "";

                document.getElementById("ship_company").value = "";
                document.getElementById("ship_address").value = "";
                document.getElementById("ship_discharge").value = "";
                document.getElementById("ship_loading").value = "";
                document.getElementById("ship_country").value = "";
            }
        },
        error: function (e) {
            console.log("Terjadi kesalahan pada sistem");
            swal("", "Terjadi kesalahan pada sistem.", "error");
        }        
    });
}

function get_container(id)
{
    $.ajax({
        url: site_url + "export/packing/container/" + id,
        type: "POST",
        dataType: "json",
        success: function(response) {
            if(response) {
                var html = '';
                var i;
                for(i=0; i<response.length; i++) {
                    html += '<option></option>';
                    html += '<option value="'+response[i].pi_container_id+'">'+response[i].number_of_container+'</option>';
                }
                $('#container_no').html(html);
            } else {
                $('#container_no').html("");
            }
        },      
    });
}

function get_item_qty(id)
{
    $.ajax({
        url: site_url + "export/packing/item_qty/" + id,
        type: "POST",
        dataType: "json",
        success: function(response) {
            if(response) {
                var html = '';
                var i;
                for(i=0; i<response.length; i++) {
                    html += '<input type="hidden" id="qty_'+response[i].pi_detail_id+'" value="'+response[i].qty+'">';
                }
                $('#item_qty').html(html);
            } else {
                $('#item_qty').html("");
            }
        },
        error: function (e) {
            console.log("Terjadi kesalahan pada sistem");
            swal("", "Terjadi kesalahan pada sistem.", "error");
        }        
    });
}

function get_category(inv_id = '', container = '')
{
    $.ajax({
        url: site_url + "export/packing/category/" + inv_id + "/" + container,
        type: "POST",
        dataType: "json",
        success: function(response) {
            console.log(response)
            if(response) {
                var html = '';
                var i;
                for(i=0; i<response.length; i++) {
                    html += '<option></option>';
                    html += '<option value="'+response[i].pi_item_category_id+'">'+response[i].name+'</option>';
                }
                $('#category').html(html);
            } else {
                $('#category').html("");
            }
        },      
    });
}

function get_item(invoice = '', container = '', category = '')
{
    $.ajax({
        url: site_url + "export/packing/item/" + invoice + "/" + container + "/" + category,
        type: "POST",
        dataType: "json",
        success: function(response) {
            if(response) {
                var html = '';
                var i;
                for(i=0; i<response.length; i++) {
                    html += '<option></option>';
                    html += '<option value="'+response[i].pi_detail_id+'">'+response[i].item_name+'</option>';
                }
                $('#product').html(html);
            } else {
                $('#product').html("");
            }
        },      
    });
}

function get_data_item(id = '')
{
    $.ajax({
        type  : 'ajax',
        url: site_url + "export/packing/item_detail/" + id,
        async : false,
        dataType : 'json',
        success : function(data){
            if(data) {
                // document.getElementById("hscode").value = data.hs_code;
                // document.getElementById("packing").value = data.pack_desc;
                // document.getElementById("net").value = data.net_wight;
                // document.getElementById("gross").value = data.gross_weight;
                // document.getElementById("dimension").value = data.dimensions;
                document.getElementById("qty_inv").value = data.qty;
                document.getElementById("qty").value = ((data.qty == Number(document.getElementById("qty_"+id).value))?(data.qty - 0):(Number(document.getElementById("qty_"+id).value)));
            } else {
                // document.getElementById("hscode").value = "";
                // document.getElementById("packing").value = "";
                // document.getElementById("net").value = "";
                // document.getElementById("gross").value = "";
                // document.getElementById("dimension").value = "";
                document.getElementById("qty").value = "";
            }
        }

    });
}

function get_batch(id)
{
    $.ajax({
        url: site_url + "export/packing/batch/" + id,
        type: "POST",
        dataType: "json",
        success: function(response) {
            if(response) {
                var html = '';
                var i;
                for(i=0; i<response.length; i++) {
                    html += '<option></option>';
                    html += '<option value="'+response[i].qcontrol_check_id+'">'+response[i].batch+'</option>';
                }
                $('#batch').html(html);
            } else {
                $('#batch').html("");
            }
        },
        error: function (e) {
            console.log("Terjadi kesalahan pada sistem");
            swal("", "Terjadi kesalahan pada sistem.", "error");
        }        
    });
}

function get_date(id = '')
{
    $.ajax({
        type  : 'ajax',
        url: site_url + "export/packing/date/" + id,
        async : false,
        dataType : 'json',
        success : function(data){
            if(data) {
                document.getElementById("proddate").value = data.production_date;
                document.getElementById("expdate").value = data.expired_date;
            } else {
                document.getElementById("proddate").value = "";
                document.getElementById("expdate").value = "";
            }
        }

    });
}

function save()
{
    $.ajax({
        url: site_url + "export/packing/save",
        type: "POST",
        data: $("#form-packing-add").serialize(),
        dataType: "json",
        beforeSend: function(){
            $('a.cancel').prop('disabled', true);
            $('button#btn-packing-save').html("<img src=" + base_url + "assets/images/inventory/loader.gif style='height:20px;'  /> Saving...").prop('disabled', true);
        },
        success: function(response) {
            console.log(response);
            if(response.status == 1) {
                $('a.cancel').prop('disabled', true);
                $('button#btn-packing-save').html("<i class='fas fa-save mr-2'></i>Save").prop('disabled', true);
                swal("", response.messages, response.icon).then((value) => {
                    window.location.href = site_url + response.url;
                });
            } else {
                swal("", response.messages, response.icon);
                $('a.cancel').prop('disabled', false);
                $('button#btn-packing-save').html("<i class='fas fa-save mr-2'></i>Save").prop('disabled', false);
            }
        },
        error: function (e) {
            console.log("Terjadi kesalahan pada sistem");
            swal("", "Terjadi kesalahan pada sistem.", "error");
            $('a.cancel').prop('disabled', false);
            $('button#btn-packing-save').html("<i class='fas fa-save mr-2'></i>Save").prop('disabled', false);
        }        
    });
}