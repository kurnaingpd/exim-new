<table class="table table-sm table-bordered table-striped" style="width: 100%;">
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
        <?php foreach($params['item_revise'] as $rows) : ?>
            <tr data-id="<?=$rows->id?>">
                <td>
                    <input type="text" class="form-control" id="item_category" name="item_category" value="<?=$rows->pi_item_category_name?>" size="12" disabled style="background-color:#ffffff;">
                </td>
                <td>
                    <input type="text" class="form-control" id="product" name="product" value="<?=$rows->item_name?>" size="25" disabled style="background-color:#ffffff;">
                </td>
                <td>
                    <input type="text" class="form-control" id="hs_code" name="hs_code" value="<?=$rows->hs_code?>" disabled style="background-color:#ffffff;">
                </td>
                <td>
                    <input type="text" class="form-control" id="config" name="config" value="<?=$rows->pack_desc?>" disabled style="background-color:#ffffff;">
                </td>
                <td>
                    <input type="text" class="form-control" id="qty" name="qty" value="<?=$rows->qty?>" size="5" disabled style="background-color:#ffffff;">
                </td>
                <td>
                    <input type="text" class="form-control" id="price" name="price" value="<?=$rows->price?>" size="5" disabled style="background-color:#ffffff;">
                </td>
                <td>
                    <button type="button" class="btn btn-danger btn-flat btn-remove" style="cursor:pointer;" data-row="<?=$rows->id?>" data-value="<?=$rows->remain_cbm?>"><i class="fas fa-trash"></i></button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>