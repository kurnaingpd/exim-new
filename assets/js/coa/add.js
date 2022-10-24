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
        var packing = $('#product').val();
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
                        // '<input type="hidden" id="grid_item_'+rnd+'" name="grid_item_'+rnd+'" value="'+$('input.grid[name="item"]').val()+'" />'+
                        '<input type="hidden" id="grid_qcheck_id_'+rnd+'" name="grid_qcheck_id_'+rnd+'" value="'+$('input.grid[name="qcheck_id"]').val()+'" />'+
                        '<input type="hidden" id="grid_product_'+rnd+'" name="grid_product_'+rnd+'" value="'+$('select.grid[name="product"]').val()+'" />'+
                        '<input type="text" class="form-control" value="'+$('select.grid[name="product"] option:selected').text()+'" style="background-color:#ffffff;" readonly required />'+
                        '<input type="hidden" id="grid_batch_'+rnd+'" name="grid_batch_'+rnd+'" value="'+$('select.grid[name="batch"]').val()+'" />'+
                    '</td>'+
                    '<td>'+
                        '<input type="text" class="form-control" id="grid_mercury_'+rnd+'" name="grid_mercury_'+rnd+'" value="'+$('input.grid[name="mercury"]').val()+'" style="background-color:#ffffff;" readonly required />'+
                    '</td>'+
                    '<td>'+
                        '<input type="text" class="form-control" id="grid_lead_'+rnd+'" name="grid_lead_'+rnd+'" value="'+$('input.grid[name="lead"]').val()+'" style="background-color:#ffffff;" readonly required />'+
                    '</td>'+
                    '<td>'+
                        '<input type="text" class="form-control" id="grid_cadmium_'+rnd+'" name="grid_cadmium_'+rnd+'" value="'+$('input.grid[name="cadmium"]').val()+'" style="background-color:#ffffff;" readonly required />'+
                    '</td>'+
                    '<td>'+
                        '<input type="text" class="form-control" id="grid_tin_'+rnd+'" name="grid_tin_'+rnd+'" value="'+$('input.grid[name="tin"]').val()+'" style="background-color:#ffffff;" readonly required />'+
                    '</td>'+
                    '<td>'+
                        '<input type="text" class="form-control" id="grid_arsenic_'+rnd+'" name="grid_arsenic_'+rnd+'" value="'+$('input.grid[name="arsenic"]').val()+'" style="background-color:#ffffff;" readonly required />'+
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

    $('#form-coa-add').validate({
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
    country(data[0].id);
    item(data[0].id);
});

$('#product').on('change', function() {
    var data = $('#product').select2('data');
    details(data[0].id);
    batch(data[0].id);
});

$('#batch').on('change', function() {
    var data = $('#batch').select2('data');
    tanggal(data[0].id);
});

function country(id)
{
    $.ajax({
        url: site_url + "export/coa/country/" + id,
        type: "POST",
        dataType: "json",
        success: function(response) {
            if(response) {
                document.getElementById("code").value = document.getElementById("code").value + response.country_code;
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
        url: site_url + "export/coa/item/" + id,
        type: "POST",
        dataType: "json",
        success: function(response) {
            var html = '';
            var i;
            for(i=0; i<response.length; i++) {
                html += '<option></option>';
                html += '<option value="'+response[i].item_id+'">'+response[i].item_code+' - '+response[i].item_name+'</option>';
            }
            $('#product').html(html);
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
        url: site_url + "export/coa/batch/" + id,
        type: "POST",
        dataType: "json",
        success: function(response) {
            console.log(response)
            var html = '';
            var i;
            for(i=0; i<response.length; i++) {
                html += '<option></option>';
                html += '<option value="'+response[i].id+'">'+response[i].batch+'</option>';
            }
            $('#batch').html(html);
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
        url: site_url + "export/coa/qcheck/" + id,
        type: "POST",
        dataType: "json",
        success: function(response) {
            if(response) {
                document.getElementById("qcheck_id").value = response.id;
            }
             else {
                document.getElementById("qcheck_id").value = '';
            }
        },
        error: function (e) {
            console.log("Terjadi kesalahan pada sistem");
            swal("", "Terjadi kesalahan pada sistem.", "error");
        }        
    });
}

function tanggal(id)
{
    $.ajax({
        url: site_url + "export/coa/tanggal/" + id,
        type: "POST",
        dataType: "json",
        success: function(response) {
            if(response) {
                document.getElementById("product_date").value = response.production_date;
                document.getElementById("expired_date").value = response.expired_date;
            } else {
                document.getElementById("product_date").value = "";
                document.getElementById("expired_date").value = "";
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
        url: site_url + "export/coa/save",
        type: "POST",
        data: $("#form-coa-add").serialize(),
        dataType: "json",
        beforeSend: function(){
            $('a.cancel').prop('disabled', true);
            $('button#btn-coa-save').html("<img src=" + base_url + "assets/images/inventory/loader.gif style='height:20px;'  /> Saving...").prop('disabled', true);
        },
        success: function(response) {
            console.log(response);
            if(response.status == 1) {
                $('a.cancel').prop('disabled', true);
                $('button#btn-coa-save').html("<i class='fas fa-save mr-2'></i>Save").prop('disabled', true);
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
            $('button#btn-coa-save').html("<i class='fas fa-save mr-2'></i>Save").prop('disabled', false);
        }        
    });
}