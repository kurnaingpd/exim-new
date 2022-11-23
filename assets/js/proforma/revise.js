$(function () {
    $('.select2bs4').select2({
        theme: 'bootstrap4',
        placeholder: 'Select an option',
        allowClear: true
    })

    // $('input#btn-container').on('click',function() {
    //     var container_type = $('#containers').val();
    //     var container_no = $('#container_no').val();

    //     if(container_type == "" || container_no == "") {
    //         swal("", "Container(s) data cannot be empty.", "warning");
    //     } else {
    //         var rnd = Math.floor((Math.random() * 10000) + 1);
    //         $('tbody#data-container').append(
    //             '<tr data-id="'+rnd+'">'+
    //                 '<td>'+
    //                     '<input type="hidden" id="grid_containers_'+rnd+'" name="grid_containers_'+rnd+'" value="'+$('select.container[name="containers"]').val()+'" />'+
    //                     '<input type="text" class="form-control" value="'+$('select.container[name="containers"] option:selected').text()+'" style="background-color:transparent; border: none transparent;" readonly />'+
    //                 '</td>'+
    //                 '<td>'+
    //                     '<input type="text" class="form-control qty" id="grid_max_cbm_'+rnd+'" name="grid_max_cbm_'+rnd+'" value="'+$('input.container[name="max_cbm"]').val()+'" style="background-color:transparent; border: none transparent;" readonly />'+
    //                 '</td>'+
    //                 '<td>'+
    //                     '<input type="text" class="form-control qty" id="grid_container_no_'+rnd+'" name="grid_container_no_'+rnd+'" value="'+$('input.container[name="container_no"]').val()+'" style="background-color:transparent; border: none transparent;" readonly />'+
    //                 '</td>'+
    //                 '<td class="text-center">'+
    //                     '<button type="button" class="btn btn-danger btn-sm btn-remove" style="cursor:pointer;" data-row="'+rnd+'"><i class="fas fa-trash"></i></button>'+
    //                 '</td>'+
    //             '</tr>'
    //         );

    //         $('.container').val('');
    //         $(".container").val('').trigger('change')
    //     }

    //     $('button.btn-remove').off('click').on('click',function() {
    //         var id = $(this).attr('data-row');
    //         $("tr[data-id="+id+"]").remove();
    //     });
    // });

    $.validator.setDefaults({
        submitHandler: function () {
            save();
        }
    });

    $('#form-proforma-revise').validate({
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

// $('select#product').on('change', function() {
//     var data = $('select#product').select2('data');
//     item(data[0].id);
// });

// $('button.btn-remove').off('click').on('click',function(){
//     var id = $(this).attr('data-row');
//     var cbm = $(this).attr('data-value');
//     $("tr[data-id="+id+"]").remove();
//     item_delete(id, cbm);
// });

$('select#containers').on('change', function() {
    var data = $('select#containers').select2('data');
    cbm(data[0].id);
});

$('button.btn-remove').off('click').on('click',function(){
    var id = $(this).attr('data-row');
    $("tr[data-id="+id+"]").remove();
    delete_container(id, cbm);
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

function cbm(id)
{
    $.ajax({
        url: site_url + "export/proforma/cbm/" + id,
        type: "POST",
        dataType: "json",
        success: function(response) {
            if(response) {
                document.getElementById("max_cbm").value = response.max_cbm;
            } else {
                document.getElementById("max_cbm").value = "";
            }
        },
        error: function (e) {
            console.log("Terjadi kesalahan pada sistem");
            swal("", "Terjadi kesalahan pada sistem.", "error");
        }        
    });
}

function delete_container(id, cbm)
{
    $.ajax({
        url: site_url + "export/proforma/delete_container/" + id,
        type: "POST",
        dataType: "json",
        success: function(response) {
            console.log(response)
        },
        error: function (e) {
            console.log("Terjadi kesalahan pada sistem");
            swal("", "Terjadi kesalahan pada sistem.", "error");
        }        
    });
}

// function item(id)
// {
//     $.ajax({
//         url: site_url + "export/proforma/item/" + id,
//         type: "POST",
//         dataType: "json",
//         success: function(response) {
//             if(response) {
//                 var lengths = Number(response.length);
//                 var widths = Number(response.width);
//                 var heights = Number(response.height);
//                 var volume = ((lengths) * (widths) * (heights)) / 1000000000;
//                 document.getElementById("volume").value = volume;
//                 document.getElementById("config").value = response.pack_desc;
//             } else {
//                 document.getElementById("volume").value = 0;
//                 document.getElementById("config").value = '';
//             }
//         },
//         error: function (e) {
//             console.log("Terjadi kesalahan pada sistem");
//             swal("", "Terjadi kesalahan pada sistem.", "error");
//         }        
//     });
// }

// function item_delete(id, cbm)
// {
//     $.ajax({
//         url: site_url + "export/proforma/delete_item/" + id,
//         type: "POST",
//         dataType: "json",
//         success: function(response) {
//             document.getElementById("remain_cbm").value = Number(document.getElementById("remain_cbm").value) + Number(cbm);
//         },
//         error: function (e) {
//             console.log("Terjadi kesalahan pada sistem");
//             swal("", "Terjadi kesalahan pada sistem.", "error");
//         }        
//     });
// }

function save()
{
    $.ajax({
        url: site_url + "export/proforma/revise",
        type: "POST",
        data: $('#form-proforma-revise').serialize(),
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