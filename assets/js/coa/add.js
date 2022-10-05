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

$('#packing').on('change', function() {
    var data = $('#packing').select2('data');
    details(data[0].id);
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
        url: site_url + "export/coa/qcheck/" + id,
        type: "POST",
        dataType: "json",
        success: function(response) {
            if(response) {
                if(response.qc_status_id == 2) {
                    swal("", "Produk tidak aman.", "info");
                }
                
                document.getElementById("item").value = response.item_id;
                document.getElementById("qcheck_id").value = response.id;
                document.getElementById("batch").value = response.batch;
                document.getElementById("product_date").value = response.production_date;
                document.getElementById("expired_date").value = response.expired_date;
                document.getElementById("aroma").value = response.aroma;
                document.getElementById("taste").value = response.taste;
                document.getElementById("moisture").value = response.moisture;
                document.getElementById("ph").value = response.ph;
                document.getElementById("brix").value = response.brix;
                document.getElementById("salmonella").value = response.salmonella;
                document.getElementById("plate").value = response.total_plate;
                document.getElementById("mold").value = response.yeast;
                document.getElementById("enterobacteriaceae").value = response.enterobacteriaceae;
            } else {
                document.getElementById("item").value = '';
                document.getElementById("qcheck_id").value = '';
                document.getElementById("batch").value = '';
                document.getElementById("product_date").value = '';
                document.getElementById("expired_date").value = '';
                document.getElementById("aroma").value = '';
                document.getElementById("taste").value = '';
                document.getElementById("moisture").value = '';
                document.getElementById("ph").value = '';
                document.getElementById("brix").value = '';
                document.getElementById("salmonella").value = '';
                document.getElementById("plate").value = '';
                document.getElementById("mold").value = '';
                document.getElementById("enterobacteriaceae").value = '';
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