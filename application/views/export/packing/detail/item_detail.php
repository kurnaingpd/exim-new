<table id="tpackingitemlist" class="table table-sm table-bordered table-striped">
    <thead>
        <tr class="text-center align-middle">
            <th>Number of container</th>
            <th>Item category</th>
            <th>Description of goods</th>
            <th class="batch <?=($params['detail']->batch == '0'?'d-none':'')?>">Batch</th>
            <th>Qty</th>
            <th class="carton <?=($params['detail']->carton == '0'?'d-none':'')?>">Carton barcode</th>
            <th class="production <?=($params['detail']->production == '0'?'d-none':'')?>">Prod. date</th>
            <th class="expired <?=($params['detail']->expired == '0'?'d-none':'')?>">Exp. date</th>
            <th><i class="fas fa-ellipsis-h"></i></th>
        </tr>
    </thead>
    <tbody id="show-data">
        <?php $no=1; foreach($params['list'] as $rows) : ?>
            <tr data-id="<?=$rows->id?>">
                <td style="width: 10%">
                    <input type="hidden" class="form-control id" value="<?=$rows->id?>">
                    <input type="text" class="form-control" value="<?=$rows->number_of_container?>" disabled style="background-color:transparent; border: none transparent;">
                </td>
                <td class="text-right">
                    <input type="text" class="form-control" value="<?=$rows->pi_item_category?>" disabled style="background-color:transparent; border: none transparent;">
                </td>
                <td style="width: 28%">
                    <input type="text" class="form-control" value="<?=$rows->item_name?>" disabled style="background-color:transparent; border: none transparent;">
                </td>
                <td class="batch <?=($params['detail']->batch == '0'?'d-none':'')?>">
                    <input type="text" class="form-control" value="<?=$rows->batch?>" disabled style="background-color:transparent; border: none transparent;">
                </td>
                <td class="text-right">
                    <input type="text" class="form-control qty" value="<?=$rows->qty?>" disabled style="background-color:transparent; border: none transparent;">
                </td>
                <td class="carton <?=($params['detail']->carton == '0'?'d-none':'')?>" style="width: 10%">
                    <input type="text" class="form-control" value="<?=$rows->carton_barcode?>" disabled style="background-color:transparent; border: none transparent;">
                </td>
                <td class="production <?=($params['detail']->production == '0'?'d-none':'')?>">
                    <input type="text" class="form-control" value="<?=$rows->production_date?>" disabled style="background-color:transparent; border: none transparent;">
                </td>
                <td class="expired <?=($params['detail']->expired == '0'?'d-none':'')?>">
                    <input type="text" class="form-control" value="<?=$rows->expired_date?>" disabled style="background-color:transparent; border: none transparent;">
                </td>
                <td class="text-center">
                    <button type="button" class="btn btn-danger btn-flat btn-remove" style="cursor:pointer;" data-row="<?=$rows->id?>" data-value="<?=$rows->pi_detail_id?>"><i class="fas fa-trash"></i></button>
                </td>
            </tr>
        <?php $no++; endforeach; ?>
    </tbody>
</table>