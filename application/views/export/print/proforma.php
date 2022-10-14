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
            <h4 class="title">PROFORMA INVOICE</h4>

            <div id="content" class="content">
                <div id="header" class="clearfix-content">
                    <div id="row">
                        <div class="box-name">INV NO</div>
                        <div class="box-colon">:</div>
                        <div class="box-value"><?=$params['header']->inv_no?></div>
                    </div>

                    <div id="row">
                        <div class="box-name">PO NO</div>
                        <div class="box-colon">:</div>
                        <div class="box-value"><?=$params['header']->po_no?></div>
                    </div>

                    <div id="row">
                        <div class="box-name">CONSIGNEE</div>
                        <div class="box-colon">:</div>
                        <div class="box-value"><?=$params['header']->consignee?></div>
                    </div>

                    <div id="row">
                        <div class="box-name">BENEFICIARY</div>
                        <div class="box-colon">:</div>
                        <div class="box-value"><?=$params['header']->beneficiary?></div>
                    </div>

                    <div id="row">
                        <div class="box-name">DESTINATION</div>
                        <div class="box-colon">:</div>
                        <div class="box-value"><?=$params['header']->destination_port?></div>
                    </div>

                    <div id="row">
                        <div class="box-name">ETD EST.</div>
                        <div class="box-colon">:</div>
                        <div class="box-value"><?=$params['header']->estimated?></div>
                    </div>

                    <div id="row">
                        <div class="box-name">LOADING PORT</div>
                        <div class="box-colon">:</div>
                        <div class="box-value"><?=$params['header']->loading_port?></div>
                    </div>

                    <div id="row">
                        <div class="box-name">COUNTRY OF ORIGIN</div>
                        <div class="box-colon">:</div>
                        <div class="box-value"><?=$params['header']->country_origin?></div>
                    </div>
                </div>

                <div id="detail" class="content" style="margin-top: 2%;">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>DESCRIPTION OF GOODS</th>
                                <th>PACKING</th>
                                <th>QTY</th>
                                <th>UNIT PRICE<br>(<?=$params['header']->incoterm?>)</th>
                                <th>TOTAL<br>(<?=$params['header']->currency_icon?>)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($params['category'] as $group => $grp) : ?>
                                <tr>
                                    <td class="data"><b><?=$grp['item_category_name']?></b></td>
                                    <td class="data"></td>
                                    <td class="data"></td>
                                    <td class="data"></td>
                                    <td class="data"></td>
                                </tr>

                                <?php foreach($params['detail'][$group] as $detail => $dtl) : ?>
                                    <tr>
                                        <td class="data"><?=$dtl['item_name']?></td>
                                        <td class="data"><?=$dtl['pack_desc']?></td>
                                        <td class="data" align="right"><?=number_format($dtl['qty'])?></td>
                                        <td class="data" align="right"><?=$params['header']->currency_icon.' '.number_format($dtl['price'], 2)?></td>
                                        <td class="data" align="right"><?=$params['header']->currency_icon.' '.number_format($dtl['total'], 2)?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td class="foot">GRAND TOTAL <?=$params['header']->incoterm.' '.$params['header']->destination?></td>
                                <td class="foot"></td>
                                <td class="foot" align="right"><?=number_format($params['footer']->tot_qty)?></td>
                                <td class="foot" align="right"><?=$params['header']->currency_icon.' '.number_format($params['footer']->tot_price, 2)?></td>
                                <td class="foot" align="right"><?=$params['header']->currency_icon.' '.number_format($params['footer']->grand_total, 2)?></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <hr>
                <div id="notes" style="margin-top: 2%;">
                    <b>Scheme Payment :</b>

                    <?php if($params['header']->top_id == 6) : ?>
                        <div>Please TT <?=$params['header']->dp?>% Before Production</div>
                        <div>Please TT <?=$params['header']->balancing?>% Before Shipment</div>
                        <div>Please TT To The Following Account :</div>
                    <?php else : ?>
                        <div><?=$params['header']->top_name?> From the Invoice Date</div>
                        <div>Please TT To The Following Account :</div>
                    <?php endif; ?>

                    <div id="row" style="margin-top: 2%;">
                        <div class="box-name">Bank Name</div>
                        <div class="box-colon">:</div>
                        <div class="box-value"><?=$params['header']->bank?></div>
                    </div>
                    <div id="row">
                        <div class="box-name">Beneficiary</div>
                        <div class="box-colon">:</div>
                        <div class="box-value"><?=$params['header']->beneficiary?></div>
                    </div>
                </div>

                <div id="signature" style="margin-top: 4%; box-sizing: border-box; content: ''; clear: both; display: table;">
                    <div style="float: left; width: 50%; text-align: center;">
                        Jakarta, <?=IndoDate?>
                        <div style="margin-top: 15%;"><?=$params['signature']->pic?></div>
                        <div><?=$params['signature']->positions?></div>
                    </div>
                    <div style="float: left; width: 50%; text-align: center;">
                        <?=$params['signature']->town.', '.IndoDate?>
                        <div style="margin-top: 15%;"><?=$params['signature']->cp_name?></div>
                        <div><?=$params['signature']->company_name?></div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>