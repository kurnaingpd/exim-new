$(function () {
    $('.select2bs4').select2({
        theme: 'bootstrap4',
        placeholder: 'Select an option',
        allowClear: true
    })

    $('input#btn-item').on('click',function() {
        var l_trade = $('#l_trade').val();
        var l_type = $('#l_type').val();
        var l_md_no = $('#l_md_no').val();
        var e_trade = $('#e_trade').val();
        var e_type = $('#e_type').val();

        if(l_trade == "" || l_type == "" || l_md_no == "" || e_trade == "" || e_type == "") {
            swal("", "Product field can not be empty.", "warning");
        } else {
            var rnd = Math.floor((Math.random() * 10000) + 1);
            $('tbody#grid-detail').append(
                '<tr data-id="'+rnd+'">'+
                    '<td>'+
                        '<input type="hidden" id="grid_l_trade_'+rnd+'" name="grid_l_trade_'+rnd+'" value="'+$('select.grid[name="l_trade"]').val()+'" />'+
                        '<input type="text" class="form-control" id="grid_l_trade_name_'+rnd+'" name="grid_l_trade_name_'+rnd+'" value="'+$('select.grid[name="l_trade"] option:selected').text()+'" style="background-color:#ffffff;" readonly required />'+
                    '</td>'+
                    '<td>'+
                        '<input type="text" class="form-control" id="grid_l_type_'+rnd+'" name="grid_l_type_'+rnd+'" value="'+$('input.grid[name="l_type"]').val()+'" style="background-color:#ffffff;" readonly required />'+
                    '</td>'+
                    '<td>'+
                        '<input type="text" class="form-control" id="grid_l_md_no_'+rnd+'" name="grid_l_md_no_'+rnd+'" value="'+$('input.grid[name="l_md_no"]').val()+'" style="background-color:#ffffff;" readonly required />'+
                    '</td>'+
                    '<td>'+
                        '<input type="text" class="form-control" id="grid_e_trade_'+rnd+'" name="grid_e_trade_'+rnd+'" value="'+$('input.grid[name="e_trade"]').val()+'" style="background-color:#ffffff;" readonly required />'+
                    '</td>'+
                    '<td>'+
                        '<input type="text" class="form-control" id="grid_e_type_'+rnd+'" name="grid_e_type_'+rnd+'" value="'+$('input.grid[name="e_type"]').val()+'" style="background-color:#ffffff;" readonly required />'+
                    '</td>'+
                    '<td class="text-center">'+
                        '<button type="button" class="btn btn-danger btn-flat btn-remove" style="cursor:pointer;" data-row="'+rnd+'"><i class="fas fa-trash"></i></button>'+
                    '</td>'+
                '</tr>'
            );
            
            $("select#l_trade option[value='"+$('select.grid[name="l_trade"]').val()+"']").remove();
            $('.grid').val('');
            $(".grid").val('').trigger('change')
        }

        $('button.btn-remove').off('click').on('click',function(){
            var id = $(this).attr('data-row');
            var product_id = $("tr[data-id="+id+"]").find("#grid_l_trade_"+id).val();
            var product_name = $("tr[data-id="+id+"]").find("#grid_l_trade_name_"+id).val();
            $("tr[data-id="+id+"]").remove();
            $('select#l_trade').append('<option value="'+product_id+'">'+product_name+'</option>');
        });
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

    $('#form-spp-add').validate({
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
    items(data[0].id);
});

function items(id)
{
    $.ajax({
        url: site_url + "export/spp/item/" + id,
        type: "POST",
        dataType: "json",
        success: function(response) {
            var html = '';
            var i;
            for(i=0; i<response.length; i++) {
                html += '<option></option>';
                html += '<option value="'+response[i].id+'">'+response[i].item+'</option>';
            }
            $('#l_trade').html(html);
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
        url: site_url + "export/spp/save",
        type: "POST",
        data: $("#form-spp-add").serialize(),
        dataType: "json",
        beforeSend: function(){
            $('a.cancel').prop('disabled', true);
            $('button#btn-spp-save').html("<img src=" + base_url + "assets/images/inventory/loader.gif style='height:20px;'  /> Saving...").prop('disabled', true);
        },
        success: function(response) {
            console.log(response);
            if(response.status == 1) {
                $('a.cancel').prop('disabled', true);
                $('button#btn-spp-save').html("<i class='fas fa-save mr-2'></i>Save").prop('disabled', true);
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
            $('button#btn-spp-save').html("<i class='fas fa-save mr-2'></i>Save").prop('disabled', false);
        }        
    });
}