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
        var packing = $('#packing').val();
        var mercury = $('#mercury').val();
        var lead = $('#lead').val();
        var cadmium = $('#cadmium').val();
        var tin = $('#tin').val();
        var arsenic = $('#arsenic').val();

        if(packing == "" || mercury == "" || lead == "" || cadmium == "" || tin == "" || arsenic == "") {
            swal("", "Product name/Mercury/Lead/Cadmium/Tin/Arsenic can not be empty.", "warning");
        } else {
            var rnd = Math.floor((Math.random() * 10000) + 1);
            $('tbody#grid-detail').append(
                '<tr data-id="'+rnd+'">'+
                    '<td>'+
                        '<input type="hidden" id="grid_item_'+rnd+'" name="grid_item_'+rnd+'" value="'+$('input.grid[name="item"]').val()+'" />'+
                        '<input type="hidden" id="grid_qcheck_id_'+rnd+'" name="grid_qcheck_id_'+rnd+'" value="'+$('input.grid[name="qcheck_id"]').val()+'" />'+
                        '<input type="hidden" id="grid_packing_'+rnd+'" name="grid_packing_'+rnd+'" value="'+$('select.grid[name="packing"]').val()+'" />'+
                        '<input type="text" class="form-control" value="'+$('select.grid[name="packing"] option:selected').text()+'" style="background-color:#ffffff;" readonly required />'+
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
                '</tr>'
            );
            
            $("select#packing option[value='"+$('select.grid[name="packing"]').val()+"']").remove();
            $('.grid').val('');
            $(".grid").val('').trigger('change')
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
    item(data[0].id);
});

$('#packing').on('change', function() {
    var data = $('#packing').select2('data');
    details(data[0].id);
});

function item(id)
{
    $.ajax({
        url: site_url + "export/prodspec/item/" + id,
        type: "POST",
        dataType: "json",
        success: function(response) {
            document.getElementById("po").value = response[0].ffrn;
            var html = '';
            var i;
            for(i=0; i<response.length; i++) {
                html += '<option></option>';
                html += '<option value="'+response[i].packing_list_detail_id+'">'+response[i].item_code+' - '+response[i].item_name+'</option>';
            }
            $('#packing').html(html);
        },
        error: function (e) {
            console.log("Terjadi kesalahan pada sistem");
            swal("", "Terjadi kesalahan pada sistem.", "error");
        }        
    });
}

function details(id)
{
    $.ajax({
        url: site_url + "export/prodspec/qcheck/" + id,
        type: "POST",
        dataType: "json",
        success: function(response) {
            if(response) {
                document.getElementById("item").value = response.item_id;
                document.getElementById("qcheck_id").value = response.id;
            } else {
                document.getElementById("item").value = '';
                document.getElementById("qcheck_id").value = '';
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