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
        var mercury = $('#mercury').val();
        var lead = $('#lead').val();
        var cadmium = $('#cadmium').val();
        var tin = $('#tin').val();
        var arsenic = $('#arsenic').val();
        var batch = $('#batch').val();

        if(product == "" || mercury == "" || lead == "" || cadmium == "" || tin == "" || arsenic == "") {
            swal("", "Product name/Mercury/Lead/Cadmium/Tin/Arsenic can not be empty.", "warning");
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
                            '<input type="text" class="form-control" id="grid_product_name_'+rnd+'" name="grid_product_name_'+rnd+'" value="'+$('select.grid[name="product"] option:selected').text()+'" style="background-color:#ffffff;" readonly required />'+
                        '</td>'+
                        '<td>'+
                            '<input type="hidden" class="val_batch" id="grid_batch_'+rnd+'" name="grid_batch_'+rnd+'" value="'+$('select.grid[name="batch"]').val()+'" />'+
                            '<input type="text" class="form-control" id="grid_batch_name_'+rnd+'" name="grid_batch_name_'+rnd+'" value="'+$('select.grid[name="batch"] option:selected').text()+'" style="background-color:#ffffff;" readonly required />'+
                        '</td>'+
                        '<td>'+
                            '<input type="text" class="form-control" id="grid_desc_'+rnd+'" name="grid_desc_'+rnd+'" value="'+$('textarea.grid[name="desc"]').val()+'" style="background-color:#ffffff;" readonly required />'+
                        '</td>'+
                        '<td>'+
                            '<input type="text" class="form-control" id="grid_form_'+rnd+'" name="grid_form_'+rnd+'" value="'+$('input.grid[name="form"]').val()+'" style="background-color:#ffffff;" readonly required />'+
                        '</td>'+
                        '<td>'+
                            '<input type="text" class="form-control" id="grid_texture_'+rnd+'" name="grid_texture_'+rnd+'" value="'+$('input.grid[name="texture"]').val()+'" style="background-color:#ffffff;" readonly required />'+
                        '</td>'+
                        '<td>'+
                            '<input type="text" class="form-control" id="grid_colour_'+rnd+'" name="grid_colour_'+rnd+'" value="'+$('input.grid[name="colour"]').val()+'" style="background-color:#ffffff;" readonly required />'+
                        '</td>'+
                        '<td>'+
                            '<input type="text" class="form-control" id="grid_taste_'+rnd+'" name="grid_taste_'+rnd+'" value="'+$('input.grid[name="taste"]').val()+'" style="background-color:#ffffff;" readonly required />'+
                        '</td>'+
                        '<td>'+
                            '<input type="text" class="form-control" id="grid_odour_'+rnd+'" name="grid_odour_'+rnd+'" value="'+$('input.grid[name="odour"]').val()+'" style="background-color:#ffffff;" readonly required />'+
                        '</td>'+
                        '<td>'+
                            '<input type="text" class="form-control" id="grid_fat_'+rnd+'" name="grid_fat_'+rnd+'" value="'+$('input.grid[name="fat"]').val()+'" style="background-color:#ffffff;" readonly required />'+
                        '</td>'+
                        '<td>'+
                            '<input type="text" class="form-control" id="grid_moisture_'+rnd+'" name="grid_moisture_'+rnd+'" value="'+$('input.grid[name="moisture"]').val()+'" style="background-color:#ffffff;" readonly required />'+
                        '</td>'+
                        '<td>'+
                            '<input type="text" class="form-control" id="grid_caffeine_'+rnd+'" name="grid_caffeine_'+rnd+'" value="'+$('input.grid[name="caffeine"]').val()+'" style="background-color:#ffffff;" readonly required />'+
                        '</td>'+
                        '<td>'+
                            '<input type="text" class="form-control" id="grid_ingredients_'+rnd+'" name="grid_ingredients_'+rnd+'" value="'+$('textarea.grid[name="ingredients"]').val()+'" style="background-color:#ffffff;" readonly required />'+
                        '</td>'+
                        '<td>'+
                            '<input type="text" class="form-control" id="grid_product_shelf_'+rnd+'" name="grid_product_shelf_'+rnd+'" value="'+$('input.grid[name="product_shelf"]').val()+'" style="background-color:#ffffff;" readonly required />'+
                        '</td>'+
                        '<td>'+
                            '<input type="text" class="form-control" id="grid_packaging_'+rnd+'" name="grid_packaging_'+rnd+'" value="'+$('input.grid[name="packaging"]').val()+'" style="background-color:#ffffff;" readonly required />'+
                        '</td>'+
                        '<td>'+
                            '<input type="text" class="form-control" id="grid_storage_'+rnd+'" name="grid_storage_'+rnd+'" value="'+$('input.grid[name="storage"]').val()+'" style="background-color:#ffffff;" readonly required />'+
                        '</td>'+
                        '<td>'+
                            '<input type="text" class="form-control" id="grid_functions_'+rnd+'" name="grid_functions_'+rnd+'" value="'+$('input.grid[name="functions"]').val()+'" style="background-color:#ffffff;" readonly required />'+
                        '</td>'+
                        '<td>'+
                            '<input type="text" class="form-control" id="grid_usage_'+rnd+'" name="grid_usage_'+rnd+'" value="'+$('input.grid[name="usage"]').val()+'" style="background-color:#ffffff;" readonly required />'+
                        '</td>'+
                        '<td>'+
                            '<input type="text" class="form-control" id="grid_source_'+rnd+'" name="grid_source_'+rnd+'" value="'+$('input.grid[name="source"]').val()+'" style="background-color:#ffffff;" readonly required />'+
                        '</td>'+
                        '<td>'+
                            '<input type="text" class="form-control" id="grid_country_'+rnd+'" name="grid_country_'+rnd+'" value="'+$('input.grid[name="country"]').val()+'" style="background-color:#ffffff;" readonly required />'+
                        '</td>'+
                        '<td>'+
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
                    var desc = $("tr[data-id="+id+"]").find("#grid_desc_"+id).val();
                    var form = $("tr[data-id="+id+"]").find("#grid_form_"+id).val();
                    var texture = $("tr[data-id="+id+"]").find("#grid_texture_"+id).val();
                    var colour = $("tr[data-id="+id+"]").find("#grid_colour_"+id).val();
                    var taste = $("tr[data-id="+id+"]").find("#grid_taste_"+id).val();
                    var odour = $("tr[data-id="+id+"]").find("#grid_odour_"+id).val();
                    var fat = $("tr[data-id="+id+"]").find("#grid_fat_"+id).val();
                    var moisture = $("tr[data-id="+id+"]").find("#grid_moisture_"+id).val();
                    var caffeine = $("tr[data-id="+id+"]").find("#grid_caffeine_"+id).val();
                    var ingredients = $("tr[data-id="+id+"]").find("#grid_ingredients_"+id).val();
                    var product_shelf = $("tr[data-id="+id+"]").find("#grid_product_shelf_"+id).val();
                    var packaging = $("tr[data-id="+id+"]").find("#grid_packaging_"+id).val();
                    var storage = $("tr[data-id="+id+"]").find("#grid_storage_"+id).val();
                    var functions = $("tr[data-id="+id+"]").find("#grid_functions_"+id).val();
                    var usage = $("tr[data-id="+id+"]").find("#grid_usage_"+id).val();
                    var source = $("tr[data-id="+id+"]").find("#grid_source_"+id).val();
                    var country = $("tr[data-id="+id+"]").find("#grid_country_"+id).val();
    
                    $("select#product").select2("val", product_id);
                    $("select#batch").select2("val", batch_id);
                    $("#desc").val(desc);
                    $("#form").val(form);
                    $("#texture").val(texture);
                    $("#colour").val(colour);
                    $("#taste").val(taste);
                    $("#odour").val(odour);
                    $("#fat").val(fat);
                    $("#moisture").val(moisture);
                    $("#caffeine").val(caffeine);
                    $("#ingredients").val(ingredients);
                    $("#product_shelf").val(product_shelf);
                    $("#packaging").val(packaging);
                    $("#storage").val(storage);
                    $("#functions").val(functions);
                    $("#usage").val(usage);
                    $("#source").val(source);
                    $("#country").val(country);
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
    var data = $('#product').select2('data');
    batch(data[0].id);
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

function batch(id)
{
    $.ajax({
        url: site_url + "export/prodspec/batch/" + id,
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