<?php
    $filename = "DocumentPIBPayment-".date('YmdHis');
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=".$filename.".xls");
?>

<style>
    table {
        width: 100%;
        font-size: 12px;
        border-style: solid;
        border-width: 1px;
        border-collapse: collapse;
    }
</style>

<table border="1">
    <thead>
        <tr>
            <th>#</th>
            <th>Code</th>
            <th>Shipper</th>
            <th>PO no.</th>
            <th>Consignee</th>
            <th>Commodity</th>
            <th>BL no.</th>
            <th>POL</th>
            <th>POD</th>
            <th>Estimation time of departure (ETD)</th>
            <th>Estimated time of arrival (ETA)</th>
            <th>PIB AJU</th>
            <th>Currency</th>
            <th>CIF</th>
            <th>Duty</th>
            <th>VAT</th>
            <th>Tax</th>
            <th>CIF 2</th>
            <th>Duty 2</th>
            <th>VAT 2</th>
            <th>Tax 2</th>
            <th>Estimasi</th>
            <th>Aktual total bayar di PIB</th>
            <th>Created at</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; foreach($params['list'] as $rows) : ?>
            <tr>
                <td><?=$no?></td>
                <td><?=$rows->code?></td>
                <td><?=($rows->shipper?$rows->shipper:'-')?></td>
                <td><?=($rows->po_no?$rows->po_no:'-')?></td>
                <td><?=($rows->consignee?$rows->consignee:'-')?></td>
                <td><?=($rows->commodity?$rows->commodity:'-')?></td>
                <td><?=($rows->mbl?$rows->mbl:'-')?></td>
                <td><?=($rows->pol?$rows->pol:'-')?></td>
                <td><?=($rows->pod?$rows->pod:'-')?></td>
                <td><?=($rows->etd?$rows->etd:'-')?></td>
                <td><?=($rows->eta?$rows->eta:'-')?></td>
                <td><?=($rows->pib_aju?$rows->pib_aju:'-')?></td>
                <td><?=$rows->currency?></td>
                <td><?=$rows->cif?></td>
                <td><?=$rows->duty?></td>
                <td><?=$rows->vat?></td>
                <td><?=$rows->tax?></td>
                <td><?=$rows->cif_2?></td>
                <td><?=$rows->duty_2?></td>
                <td><?=$rows->vat_2?></td>
                <td><?=$rows->tax_2?></td>
                <td><?=number_format($rows->estimasi, 2)?></td>
                <td><?=number_format($rows->actual)?></td>
                <td><?=$rows->created_at?></td>
            </tr>
        <?php $no++; endforeach; ?>
    </tbody>
</table>