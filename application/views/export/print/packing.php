<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?=$title?></title>
        <?php
            if ( isset($css) ){
                foreach($css as $rows){
                    $exp = explode(",", $rows);
                    echo "<link type=\"{$exp[0]}\" rel=\"{$exp[1]}\" href=\"{$exp[2]}\" />\n";
                }
            }
        ?>
    </head>
    <body>
        <div id="container">
            <h6 class="title" style="margin-bottom: 0px;"><u>PACKING LIST</u></h6>
            <div class="title" style="font-size: 7px; margin-bottom: 1%;">No. <?=$params['header']->code?></div>

            <div id="content" class="content">
                <div id="header" class="clearfix-content">
                    <div id="row">
                        <div class="box-name">INVOICE NO.</div>
                        <div class="box-colon">:</div>
                        <div class="box-value"><?=$params['header']->invoice_no?></div>
                    </div>

                    <div id="row">
                        <div class="box-name">PO #</div>
                        <div class="box-colon">:</div>
                        <div class="box-value"><?=$params['header']->po_no?></div>
                    </div>

                    <div id="row">
                        <div class="box-name">CONSIGNEE</div>
                        <div class="box-colon">:</div>
                        <div class="box-value"><?=$params['header']->consignee?></div>
                    </div>

                    <div id="row">
                        <div class="box-name">SHIPPER</div>
                        <div class="box-colon">:</div>
                        <div class="box-value"><?=$params['header']->beneficiary?></div>
                    </div>

                    <div id="row">
                        <div class="box-name">PORT OF DISCHARGE</div>
                        <div class="box-colon">:</div>
                        <div class="box-value"><?=$params['header']->discharge_port?></div>
                    </div>

                    <div id="row">
                        <div class="box-name">PORT OF LOADING</div>
                        <div class="box-colon">:</div>
                        <div class="box-value"><?=$params['header']->loading_port?></div>
                    </div>

                    <div id="row">
                        <div class="box-name">COUNTRY OF ORIGIN</div>
                        <div class="box-colon">:</div>
                        <div class="box-value"><?=$params['header']->country_origin?></div>
                    </div>

                    <div id="row">
                        <div class="box-name">NO. CONTAINER/ SEAL</div>
                        <div class="box-colon">:</div>
                        <div class="box-value"><?=$params['header']->number_of_container?></div>
                    </div>
                </div>

                <div id="detail" class="content" style="margin-top: 1%;">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>NO.</th>

                                <?php if($params['header']->carton == 1) : ?>
                                <th>CARTON BARCODE</th>
                                <?php endif; ?>
                                
                                <th>DESCRIPTION OF GOODS</th>
                                <th>HS CODE</th>
                                <th>PACKING</th>
                                <th>QTY</th>

                                <?php if($params['header']->batch == 1) : ?>
                                <th>BATCH</th>
                                <?php endif; ?>
                                
                                <?php if($params['header']->production == 1) : ?>
                                <th>PRODUCTION<br>DATE</th>
                                <?php endif; ?>

                                <?php if($params['header']->expired == 1) : ?>
                                <th>EXPIRED<br>DATE</th>
                                <?php endif; ?>

                                <th>NET WEIGHT</th>
                                <th>GROSS WEIGHT</th>
                                <th>TOTAL MEASUREMENT<br>(CBM)</th>
                                <th>DIMENSION EACH CARTON<br>(MM)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $no = 1;
                                $totQty = 0;
                                $totNet = 0;
                                $totGross = 0;
                                $totCBM = 0;
                                foreach($params['detail'] as $rows) :
                                    $totQty += $rows->qty;
                                    $totNet += $rows->net_wight;
                                    $totGross += $rows->gross_weight;
                                    $cols_total = 4 + $params['header']->carton;
                                    $totCBM += $rows->cbm_item;
                            ?>
                                <tr>
                                    <td class="data-border" align="center"><?=$no?>.</td>

                                    <?php if($params['header']->carton == 1) : ?>
                                    <td class="data-border" align="center"><?=$rows->carton_barcode?></td>
                                    <?php endif; ?>

                                    <td class="data-border"><?=$rows->item_name?></td>
                                    <td class="data-border" align="center"><?=$rows->hs_code?></td>
                                    <td class="data-border" align="center"><?=$rows->packing?></td>
                                    <td class="data-border" align="right"><?=number_format($rows->tot_qty)?></td>

                                    <?php if($params['header']->batch == 1) : ?>
                                    <td class="data-border" align="center"><?=$rows->batch?></td>
                                    <?php endif; ?>
                                    
                                    <?php if($params['header']->production == 1) : ?>
                                    <td class="data-border"><?=$rows->production_date?></td>
                                    <?php endif; ?>

                                    <?php if($params['header']->expired == 1) : ?>
                                    <td class="data-border"><?=$rows->expired_date?></td>
                                    <?php endif; ?>

                                    <td class="data-border" align="center"><?=number_format($rows->net_wight, 2)?></td>
                                    <td class="data-border" align="center"><?=number_format($rows->gross_weight, 2)?></td>
                                    <td class="data-border" align="center"><?=round($rows->cbm_item, 4)?></td>
                                    <td class="data-border" align="center"><?=$rows->dimensions?></td>
                                </tr>
                            <?php $no++; endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td style="text-align: left; padding: 1%; font-weight: bold;" colspan="<?=$cols_total?>">TOTAL</td>
                                <td align="center" class="summary"><?=number_format($totQty)?></td>
                                
                                <?php if($params['header']->batch == 1) : ?>
                                <td></td>
                                <?php endif; ?>

                                <?php if($params['header']->expired == 1) : ?>
                                <td></td>
                                <?php endif; ?>

                                <?php if($params['header']->production == 1) : ?>
                                <td></td>
                                <?php endif; ?>

                                <td class="summary" align="center"><?=number_format($totNet, 2)?></td>
                                <td class="summary" align="center"><?=number_format($totGross, 2)?></td>
                                <td class="summary" align="center"><?=round($totCBM, 4)?></td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <div id="signature" style="margin-top: 1%; box-sizing: border-box; content: ''; clear: both; display: table;">
                    <div style="float: left; width: 20%; text-align: center;">
                        Kudus, <?=IndoDate?>
                        <div style="margin-top: 20%;">EVAN GUSTIN</div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>