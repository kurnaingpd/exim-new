<table class="table table-sm table-bordered table-striped">
    <thead>
        <tr class="text-center">
            <th>Item category</th>
            <th>Product</th>
            <th>HS code</th>
            <th>Configuration</th>
            <th>Qty</th>
            <th>Price</th>
            <th><i class="fas fa-ellipsis-h"></i></th>
        </tr>
    </thead>
    <tbody id="data-item">
        <?php foreach($params['item_value'] as $rows) : ?>
            <tr data-id="<?=$rows->id?>">
                <td style="width: 16%">
                    <input type="hidden" id="pi_detail_id_<?=$rows->id?>" name="pi_detail_id_<?=$rows->id?>" value="<?=$rows->id?>">
                    <input type="text" class="form-control" id="pi_item_category_<?=$rows->id?>" name="pi_item_category_<?=$rows->id?>" value="<?=$rows->pi_item_category_name?>" size="12" disabled style="background-color:#ffffff;">
                </td>
                <td style="width: 34%">
                    <input type="text" class="form-control" id="pi_product_<?=$rows->id?>" name="pi_product_<?=$rows->id?>" value="<?=$rows->item_name?>" size="25" disabled style="background-color:#ffffff;">
                </td>
                <td style="width: 8%">
                    <input type="text" class="form-control" id="pi_hs_code_<?=$rows->id?>" name="pi_hs_code_<?=$rows->id?>" value="<?=$rows->hs_code?>" disabled style="background-color:#ffffff;">
                </td>
                <td style="width: 26%">
                    <input type="text" class="form-control" id="pi_config_<?=$rows->id?>" name="pi_config_<?=$rows->id?>" value="<?=$rows->pack_desc?>" disabled style="background-color:#ffffff;">
                </td>
                <td>
                    <input type="text" class="form-control" id="pi_qty_<?=$rows->id?>" name="pi_qty_<?=$rows->id?>" value="<?=$rows->qty?>" size="5" disabled style="background-color:#ffffff;">
                </td>
                <td>
                    <input type="text" class="form-control" id="pi_price_<?=$rows->id?>" name="pi_price_<?=$rows->id?>" value="<?=$rows->price?>" size="5" disabled style="background-color:#ffffff;">
                </td>
                <td>
                    <button type="button" class="btn btn-danger btn-flat btn-remove" style="cursor:pointer;" data-row="<?=$rows->id?>" data-value="<?=$rows->remain_cbm?>"><i class="fas fa-trash"></i></button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>