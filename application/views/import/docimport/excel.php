<?php
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=hasil.xls");
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
            <th>PO no.</th>
            <th>Shipment no.</th>
            <th>Shipper</th>
            <th>Seller</th>
            <th>Consignee</th>
            <th>Commodity</th>
            <th>Category</th>
            <th>HS code</th>
            <th>Lartas</th>
            <th>Incoterm</th>
            <th>HBL</th>
            <th>MBL</th>
            <th>Qty container</th>
            <th>Container no.</th>
            <th>Goods qty</th>
            <th>UOM</th>
            <th>Gross weight (GW)</th>
            <th>Net weight (NW)</th>
            <th>CBM</th>
            <th>POL</th>
            <th>POD</th>
            <th>Estimation time of departure (ETD)</th>
            <th>Estimated time of arrival (ETA)</th>
            <th>PIB AJU</th>
            <th>COO</th>
            <th>Masterlist</th>
            <th>Rcvd ori document</th>
            <th>Billing</th>
            <th>SPJM</th>
            <th>SPJK</th>
            <th>SPPB</th>
            <th>Pickup DO</th>
            <th>Delivery</th>
            <th>Remarks</th>
            <th>Currency</th>
            <th>CIF</th>
            <th>Duty</th>
            <th>VAT</th>
            <th>Tax</th>
            <th>Freight (include VAT)</th>
            <th>Handling (include VAT)</th>
            <th>At cost</th>
            <th>Additional</th>
            <th>Lead time</th>
            <th>Time</th>
            <th>Percent</th>
            <th>CIF 2</th>
            <th>Landed cost</th>
            <th>%</th>
            <th>Forwarder</th>
            <th>Created at</th>
            <th>Updated at</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; foreach($params['list'] as $rows) : ?>
            <tr>
                <td><?=$no?></td>
                <td><?=$rows->code?></td>
                <td><?=($rows->po_no?$rows->po_no:'-')?></td>
                <td><?=($rows->shipment_no?$rows->shipment_no:'-')?></td>
                <td><?=($rows->shipper?$rows->shipper:'-')?></td>
                <td><?=($rows->seller?$rows->seller:'-')?></td>
                <td><?=($rows->consignee?$rows->consignee:'-')?></td>
                <td><?=($rows->commodity?$rows->commodity:'-')?></td>
                <td><?=($rows->category?$rows->category:'-')?></td>
                <td><?=($rows->hs_code?$rows->hs_code:'-')?></td>
                <td><?=($rows->lartas?$rows->lartas:'-')?></td>
                <td><?=($rows->incoterm?$rows->incoterm:'-')?></td>
                <td><?=($rows->hbl?$rows->hbl:'-')?></td>
                <td><?=($rows->mbl?$rows->mbl:'-')?></td>
                <td><?=$rows->qty_container?></td>
                <td><?=($rows->container_no?$rows->container_no:'-')?></td>
                <td><?=$rows->goods_qty?></td>
                <td><?=($rows->uom?$rows->uom:'-')?></td>
                <td><?=$rows->gross_weight?></td>
                <td><?=$rows->net_weight?></td>
                <td><?=$rows->cbm?></td>
                <td><?=($rows->pol?$rows->pol:'-')?></td>
                <td><?=($rows->pod?$rows->pod:'-')?></td>
                <td><?=($rows->etd?$rows->etd:'-')?></td>
                <td><?=($rows->eta?$rows->eta:'-')?></td>
                <td><?=($rows->pib_aju?$rows->pib_aju:'-')?></td>
                <td><?=($rows->coo?$rows->coo:'-')?></td>
                <td><?=($rows->master_list?$rows->master_list:'-')?></td>
                <td><?=($rows->rcvd_ori_doc?$rows->rcvd_ori_doc:'-')?></td>
                <td><?=($rows->billing?$rows->billing:'-')?></td>
                <td><?=($rows->spjm?$rows->spjm:'-')?></td>
                <td><?=($rows->spjk?$rows->spjk:'-')?></td>
                <td><?=($rows->sppb?$rows->sppb:'-')?></td>
                <td><?=($rows->pickup_do?$rows->pickup_do:'-')?></td>
                <td><?=($rows->delivery?$rows->delivery:'-')?></td>
                <td><?=($rows->remarks?$rows->remarks:'-')?></td>
                <td><?=$rows->currency?></td>
                <td><?=$rows->cif?></td>
                <td><?=$rows->duty?></td>
                <td><?=$rows->vat?></td>
                <td><?=$rows->tax?></td>
                <td><?=$rows->freight?></td>
                <td><?=$rows->handling?></td>
                <td><?=$rows->at_cost?></td>
                <td><?=$rows->additional?></td>
                <td><?=($rows->lead_time?$rows->lead_time:0)?></td>
                <td><?=$rows->time?></td>
                <td><?=($rows->percent?round($rows->percent, 2):0)?></td>
                <td><?=($rows->cif2?number_format($rows->cif2):0)?></td>
                <td><?=($rows->landed_cost?number_format($rows->landed_cost):0)?></td>
                <td><?=($rows->percentage?round($rows->percentage, 2):0)?></td>
                <td><?=($rows->forwarder?$rows->forwarder:'-')?></td>
                <td><?=$rows->created_at?></td>
                <td><?=$rows->updated_at?></td>
            </tr>
        <?php $no++; endforeach; ?>
    </tbody>
</table>