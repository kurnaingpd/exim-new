$(function () {
    $('.select2bs4').select2({
        theme: 'bootstrap4',
        placeholder: 'Select an option',
        allowClear: true
    })

    $(".upper").keyup(function () {
        this.value = this.value.toLocaleUpperCase();
    });

    $('input#btn-item').on('click',function() {
        var product = $('#product').val();
        var batch = $('#batch').val();

        if(product == "" || batch == "") {
            swal("", "Product name/batch can not be empty.", "warning");
        } else {
            var rnd = Math.floor((Math.random() * 10000) + 1);
            var isExists = false;
            $("#grid-detail tr .val_batch").each(function(){
                var val=$(this).val();
                if(val==batch) {
                    isExists = true;
                }
            }).val();

            if (isExists) {
                swal("", "Batch "+$('select.grid[name="batch"] option:selected').text()+" already exist.", "warning");
            } else {
                $('tbody#grid-detail').append(
                    '<tr data-id="'+rnd+'">'+
                        '<td>'+
                            '<input type="hidden" id="grid_product_'+rnd+'" name="grid_product_'+rnd+'" value="'+$('select.grid[name="product"]').val()+'" />'+
                            '<input type="text" class="form-control" id="grid_product_name_'+rnd+'" name="grid_product_name_'+rnd+'" value="'+$('select.grid[name="product"] option:selected').text()+'" style="background-color:transparent; border: none transparent;" readonly required />'+
                        '</td>'+
                        '<td>'+
                            '<input type="hidden" class="val_batch" id="grid_batch_'+rnd+'" name="grid_batch_'+rnd+'" value="'+$('select.grid[name="batch"]').val()+'" />'+
                            '<input type="text" class="form-control" id="grid_batch_name_'+rnd+'" name="grid_batch_name_'+rnd+'" value="'+$('select.grid[name="batch"] option:selected').text()+'" style="background-color:transparent; border: none transparent;" readonly required />'+
                        '</td>'+
                        '<td class="text-center">'+
                            '<button type="button" class="btn btn-info btn-flat btn-edit" style="cursor:pointer;" data-row="'+rnd+'"><i class="fas fa-edit"></i></button>'+
                        '</td>'+
                    '</tr>'
                );
                
                $('.grid').val('');
                $(".grid").val('').trigger('change')
    
                $('button.btn-edit').off('click').on('click',function() {
                    var id = $(this).attr('data-row');
                    var product_id = $("tr[data-id="+id+"]").find("#grid_product_"+id).val();
                    var batch_id = $("tr[data-id="+id+"]").find("#grid_batch_"+id).val();
    
                    $("select#product").select2("val", product_id);
                    $("select#batch").select2("val", batch_id);
                    $("tr[data-id="+id+"]").remove();
                });
            }
        }
    });

    $.validator.setDefaults({
        submitHandler: function () {
            var tbody = $("#grid tbody");

            if (tbody.children().length == 0) {
                swal("", "Detail(s) can not be empty.", "warning");
            } else {
                save();
            }
        }
    });

    $('#form-prodspec-add').validate({
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

$('#invoice').on('change', function() {
    var data = $('#invoice').select2('data');
    po(data[0].id);
    item(data[0].id);
});

$('#product').on('change', function() {
    var invoice = $('#invoice').select2('data');
    var data = $('#product').select2('data');
    batch(invoice[0].id, data[0].id);
});

function po(id)
{
    $.ajax({
        url: site_url + "export/prodspec/po/" + id,
        type: "POST",
        dataType: "json",
        success: function(response) {
            if(response) {
                document.getElementById("po").value = response.ffrn;
            } else {
                document.getElementById("po").value = "";
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
        url: site_url + "export/prodspec/item/" + id,
        type: "POST",
        dataType: "json",
        success: function(response) {
            if(response) {
                var html = '';
                var i;
                for(i=0; i<response.length; i++) {
                    html += '<option></option>';
                    html += '<option value="'+response[i].item_id+'">'+response[i].item_code+' - '+response[i].item_name+'</option>';
                }
                $('#product').html(html);
            } else {
                $('#product').html("");
            }
        },
        error: function (e) {
            console.log("Terjadi kesalahan pada sistem");
            swal("", "Terjadi kesalahan pada sistem.", "error");
        }        
    });
}

function batch(invoice, item)
{
    $.ajax({
        url: site_url + "export/prodspec/batch/" + invoice + "/" + item,
        type: "POST",
        dataType: "json",
        success: function(response) {
            console.log(response)
            var html = '';
            var i;
            for(i=0; i<response.length; i++) {
                html += '<option></option>';
                html += '<option value="'+response[i].qcontrol_check_id+'">'+response[i].batch+'</option>';
            }
            $('#batch').html(html);
        },
        error: function (e) {
            document.getElementById("item").value = '';
            document.getElementById("qcheck_id").value = '';
        }        
    });
}

function save()
{
    $.ajax({
        url: site_url + "export/prodspec/save",
        type: "POST",
        data: $("#form-prodspec-add").serialize(),
        dataType: "json",
        beforeSend: function(){
            $('a.cancel').prop('disabled', true);
            $('button#btn-prodspec-save').html("<img src=" + base_url + "assets/images/inventory/loader.gif style='height:20px;'  /> Saving...").prop('disabled', true);
        },
        success: function(response) {
            console.log(response);
            if(response.status == 1) {
                $('a.cancel').prop('disabled', true);
                $('button#btn-prodspec-save').html("<i class='fas fa-save mr-2'></i>Save").prop('disabled', true);
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
            $('button#btn-prodspec-save').html("<i class='fas fa-save mr-2'></i>Save").prop('disabled', false);
        }        
    });
}