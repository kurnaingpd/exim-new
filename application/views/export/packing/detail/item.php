<table id="tpackingitemlist" class="table table-sm table-bordered table-striped">
    <thead>
        <tr class="text-center align-middle">
            <th>#</th>
            <th class="carton <?=($params['detail']->carton == '1'?'d-none':'')?>">Carton barcode</th>
            <th>Description of goods</th>
            <th>HS code</th>
            <th>Packing</th>
            <th>Qty</th>
            <th class="batch <?=($params['detail']->batch == '1'?'d-none':'')?>">Batch</th>
            <th class="expired <?=($params['detail']->expired == '1'?'d-none':'')?>">Expired date<br><small>Format: YYYY-MM-DD</small></th>
            <th class="production <?=($params['detail']->expired == '1'?'d-none':'')?>">Production date<br><small>Format: YYYY-MM-DD</small></th>
            <th>Net weight</th>
            <th>Gross weight</th>
            <th>Dimension each cartoon</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; foreach($params['list'] as $rows) : ?>
            <tr>
                <td class="text-center"><?=$no?>.</td>
                <td class="carton <?=($params['detail']->carton == '1'?'d-none':'')?>">
                    <input type="text" class="form-control" id="grid_carton_<?=$rows->pi_detail_id?>" name="grid_carton_<?=$rows->pi_detail_id?>" value="<?=$rows->carton_barcode?>" required>
                </td>
                <td><?=$rows->item_name?></td>
                <td class="text-center"><?=$rows->hs_code?></td>
                <td><?=$rows->pack_desc?></td>
                <td>
                    <input type="text" class="form-control text-right" id="grid_qty_<?=$rows->pi_detail_id?>" name="grid_qty_<?=$rows->pi_detail_id?>" value="<?=$rows->qty?>" required>
                <td class="batch <?=($params['detail']->batch == '1'?'d-none':'')?>">
                    <input type="text" class="form-control" id="grid_batch_<?=$rows->pi_detail_id?>" name="grid_batch_<?=$rows->pi_detail_id?>" value="<?=$rows->batch?>" required>
                </td>
                <td class="expired <?=($params['detail']->expired == '1'?'d-none':'')?>">
                    <input type="text" class="form-control" id="grid_expdate_<?=$rows->pi_detail_id?>" name="grid_expdate_<?=$rows->pi_detail_id?>" value="<?=$rows->expired_date?>" required>
                </td>
                <td class="production <?=($params['detail']->expired == '1'?'d-none':'')?>">
                    <input type="text" class="form-control" id="grid_proddate_<?=$rows->pi_detail_id?>" name="grid_proddate_<?=$rows->pi_detail_id?>" value="<?=$rows->production_date?>" required>
                </td>
                <td class="text-right"><?=$rows->net_wight?></td>
                <td class="text-right"><?=$rows->gross_weight?></td>
                <td class="text-center"><?=$rows->dimensions?></td>
            </tr>
        <?php $no++; endforeach; ?>
    </tbody>
</table>