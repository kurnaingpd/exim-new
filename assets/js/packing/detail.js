$(function () {
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
    });

    $('input.check').on('change', function() {
        var id = $(this).attr('id');
        var packing = $(this).attr('data-packing');
        var status = $(this).is(":checked");
        
        if (status) {
            console.log(status)
            checking(packing, id, '1')
            $('.'+id).removeClass("d-none");
            $('.'+id).show();
        } else {
            console.log(status)
            checking(packing, id, '0')
            $('.'+id).hide();
        }
    });

    $('input#btn-item').on('click',function() {
        console.log('item');
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
                    '<tr data-id="'+rnd+'">'+
                        '<td style="width: 10%">'+
                            '<input type="text" class="form-control" value="'+$('select.item[name="container_no"] option:selected').text()+'" style="background-color:transparent; border: none transparent;" readonly />'+
                        '</td>'+
                        '<td>'+
                            '<input type="text" class="form-control" value="'+$('select.item[name="category"] option:selected').text()+'" style="background-color:transparent; border: none transparent;" readonly />'+
                        '</td>'+
                        '<td style="width: 28%">'+
                            '<input type="hidden" id="grid_pi_detail_id_'+rnd+'" name="grid_pi_detail_id_'+rnd+'" value="'+$('select.item[name="product"]').val()+'" />'+
                            '<input type="text" class="form-control" value="'+$('select.item[name="product"] option:selected').text()+'" style="background-color:transparent; border: none transparent;" readonly required />'+
                        '</td>'+
                        '<td>'+
                            '<input type="hidden" id="grid_batch_'+rnd+'" name="grid_batch_'+rnd+'" value="'+$('select.item[name="batchs"]').val()+'" />'+
                            '<input type="text" class="form-control" value="'+$('select.item[name="batchs"] option:selected').text()+'" style="background-color:transparent; border: none transparent;" readonly required />'+
                        '</td>'+
                        '<td>'+
                            '<input type="text" class="form-control qty" id="grid_qty_'+rnd+'" name="grid_qty_'+rnd+'" value="'+$('input.item[name="qty"]').val()+'" style="background-color:transparent; border: none transparent;" readonly />'+
                        '</td>'+
                        '<td>'+
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
                $(".item").val('').trigger('change')
            }

            $('button.btn-remove').off('click').on('click',function(){
                var id = $(this).attr('data-row');
                var qty = Number($("tr[data-id="+id+"]").find(".qty").val());
                var remain = Number(document.getElementById("qty_"+item).value);
                $("tr[data-id="+id+"]").remove();
                document.getElementById("qty_"+item).value = remain + qty;
            });
        }
    });

    $.validator.setDefaults({
        submitHandler: function () {
            save();
        }
    });

    $('#form-packing-detail').validate({
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

$('button.btn-remove').off('click').on('click',function(){
    var id = $(this).attr('data-row');
    var pi_detail_id = $(this).attr('data-value');
    var qty = Number($("tr[data-id="+id+"]").find(".qty").val());
    var remain = Number(document.getElementById("qty_"+pi_detail_id).value);
    document.getElementById("qty_"+pi_detail_id).value = remain + qty;
    $("tr[data-id="+id+"]").remove();
    $('#product').val('').trigger('change');
    item_delete(id);
});

$('select#container_no').on('change', function() {
    var packing = document.getElementById("id").value;
    var container = $('select#container_no').select2('data');
    get_category(packing, container[0].id);
});

$('select#category').on('change', function() {
    var packing = document.getElementById("id").value;
    var container = $('select#container_no').select2('data');
    var category = $('select#category').select2('data');
    get_item(packing, container[0].id, category[0].id);
});

$('select#product').on('change', function() {
    var item = $('select#product').select2('data');
    get_data_item(item[0].id);
    get_batch(item[0].id);
});

$('select#batchs').on('change', function() {
    var batchs = $('select#batchs').select2('data');
    get_date(batchs[0].id);
});

function item_delete(id)
{
    $.ajax({
        url: site_url + "export/packing/delete_item/" + id,
        type: "POST",
        dataType: "json",
        success: function(response) {
            console.log(response);
        },
        error: function (e) {
            console.log("Terjadi kesalahan pada sistem");
            swal("", "Terjadi kesalahan pada sistem.", "error");
        }        
    });
}

function checking(packing, id, data)
{
    $.ajax({
        url: site_url + "export/packing/filter/" + packing,
        type: "POST",
        data: {fields: id, filter: data},
        dataType: "json",
        success: function(response) {
            console.log(response);
        },
        error: function (e) {
            console.log("Terjadi kesalahan pada sistem");
        }        
    });
}

function get_category(packing_id = '', container = '')
{
    $.ajax({
        url: site_url + "export/packing/detail_category/" + packing_id + "/" + container,
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

function get_item(packing = '', container = '', category = '')
{
    $.ajax({
        url: site_url + "export/packing/detail_item/" + packing + "/" + container + "/" + category,
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

function get_data_item(item = '')
{
    $.ajax({
        type  : 'ajax',
        url: site_url + "export/packing/item_detail/" + item,
        async : false,
        dataType : 'json',
        success : function(data){
            if(data) {
                document.getElementById("qty_inv").value = data.qty;
                document.getElementById("qty").value = ((data.qty == Number(document.getElementById("qty_"+item).value))?(data.qty - 0):(Number(document.getElementById("qty_"+item).value)));
            } else {
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
                $('#batchs').html(html);
            } else {
                $('#batchs').html("");
            }
        },
        error: function (e) {
            console.log("Terjadi kesalahan pada sistem");
            swal("", "Terjadi kesalahan pada sistem.", "error");
        }        
    });
}

function get_date(id)
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

// $('select#category').on('change', function() {
//     $('#product').html("");
//     $('#qty').val("");
//     var pl_id = document.getElementById("id").value;
//     var category = $('select#category').select2('data');
//     get_item(pl_id, category[0].id);
// });

// $('select#product').on('change', function() {
//     var data = $('select#product').select2('data');
//     get_data_item(data[0].id);
//     get_batch(data[0].id);
// });

// $('select#batchs').on('change', function() {
//     var data = $('select#batchs').select2('data');
//     get_date(data[0].id);
// });

// $('button.btn-remove').off('click').on('click',function(){
//     var id = $(this).attr('data-row');
//     var pi_detail_id = $(this).attr('data-value');
//     var qty = Number($("tr[data-id="+id+"]").find(".qty").val());
//     var remain = Number(document.getElementById("qty_"+pi_detail_id).value);
//     document.getElementById("qty_"+pi_detail_id).value = remain + qty;
//     $("tr[data-id="+id+"]").remove();
//     $('#product').val('').trigger('change');
//     item_delete(id);
// });

// function item_delete(id)
// {
//     $.ajax({
//         url: site_url + "export/packing/delete_item/" + id,
//         type: "POST",
//         dataType: "json",
//         success: function(response) {
//             console.log(response);
//         },
//         error: function (e) {
//             console.log("Terjadi kesalahan pada sistem");
//             swal("", "Terjadi kesalahan pada sistem.", "error");
//         }        
//     });
// }

// function checking(packing, id, data)
// {
//     $.ajax({
//         url: site_url + "export/packing/filter/" + packing,
//         type: "POST",
//         data: {fields: id, filter: data},
//         dataType: "json",
//         success: function(response) {
//             console.log(response);
//         },
//         error: function (e) {
//             console.log("Terjadi kesalahan pada sistem");
//         }        
//     });
// }

// function get_item(pl_id, category)
// {
//     $.ajax({
//         url: site_url + "export/packing/item_by_category/" + pl_id +"/"+ category,
//         type: "POST",
//         dataType: "json",
//         success: function(response) {
//             if(response) {
//                 var html = '';
//                 var i;
//                 for(i=0; i<response.length; i++) {
//                     html += '<option></option>';
//                     html += '<option value="'+response[i].pi_detail_id+'">'+response[i].item_name+'</option>';
//                 }
//                 $('#product').html(html);
//             } else {
//                 $('#product').html("");
//             }
//         },      
//     });
// }

// function get_data_item(id)
// {
//     $.ajax({
//         type  : 'ajax',
//         url: site_url + "export/packing/item_detail/" + id,
//         async : false,
//         dataType : 'json',
//         success : function(data){
//             console.log(data);
//             if(data) {
//                 document.getElementById("hscode").value = data.hs_code;
//                 document.getElementById("packing").value = data.pack_desc;
//                 document.getElementById("net").value = data.net_wight;
//                 document.getElementById("gross").value = data.gross_weight;
//                 document.getElementById("dimension").value = data.dimensions;
//                 document.getElementById("qty_inv").value = data.qty;
//                 document.getElementById("qty").value = ((data.qty == Number(document.getElementById("qty_"+id).value))?(data.qty - 0):(Number(document.getElementById("qty_"+id).value)));
//             } else {
//                 document.getElementById("hscode").value = "";
//                 document.getElementById("packing").value = "";
//                 document.getElementById("net").value = "";
//                 document.getElementById("gross").value = "";
//                 document.getElementById("dimension").value = "";
//                 document.getElementById("qty").value = "";
//             }
//         }

//     });
// }

// function get_batch(id)
// {
//     $.ajax({
//         url: site_url + "export/packing/batch/" + id,
//         type: "POST",
//         dataType: "json",
//         success: function(response) {
//             var html = '';
//             var i;
//             for(i=0; i<response.length; i++) {
//                 html += '<option></option>';
//                 html += '<option value="'+response[i].qcontrol_check_id+'">'+response[i].batch+'</option>';
//             }
//             $('#batchs').html(html);
//         },
//         error: function (e) {
//             console.log("Terjadi kesalahan pada sistem");
//             swal("", "Terjadi kesalahan pada sistem.", "error");
//         }        
//     });
// }

// function get_date(id)
// {
//     $.ajax({
//         type  : 'ajax',
//         url: site_url + "export/packing/date/" + id,
//         async : false,
//         dataType : 'json',
//         success : function(data){
//             if(data) {
//                 document.getElementById("proddate").value = data.production_date;
//                 document.getElementById("expdate").value = data.expired_date;
//             } else {
//                 document.getElementById("proddate").value = "";
//                 document.getElementById("expdate").value = "";
//             }
//         }

//     });
// }

function save()
{
    $.ajax({
        url: site_url + "export/packing/update",
        type: "POST",
        data: $("#form-packing-detail").serialize(),
        dataType: "json",
        beforeSend: function(){
            $('a.cancel').prop('disabled', true);
            $('button#btn-packing-update').html("<img src=" + base_url + "assets/images/inventory/loader.gif style='height:20px;'  /> Saving...").prop('disabled', true);
        },
        success: function(response) {
            console.log(response);
            if(response.status == 1) {
                $('a.cancel').prop('disabled', true);
                $('button#btn-packing-update').html("<i class='fas fa-save mr-2'></i>Save").prop('disabled', true);
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
            $('button#btn-packing-update').html("<i class='fas fa-save mr-2'></i>Save").prop('disabled', false);
        }        
    });
}