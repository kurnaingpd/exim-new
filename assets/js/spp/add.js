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
                        '<input type="text" class="form-control" id="grid_l_trade_'+rnd+'" name="grid_l_trade_'+rnd+'" value="'+$('input.grid[name="l_trade"]').val()+'" style="background-color:#ffffff;" readonly required />'+
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
                '</tr>'
            );
            
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