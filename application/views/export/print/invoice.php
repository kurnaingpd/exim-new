<div id="container">
    <h4 class="title" style="margin-bottom: 0px;"><u>INVOICE</u></h4>
    <div class="title" style="font-size: 8px; margin-bottom: 3%;">0001/SKP-EXT/INV/09/2022</div>

    <div id="content" class="content">
        <div id="header" class="clearfix-content">
            <div id="row">
                <div class="box-name">PI NO.</div>
                <div class="box-colon">:</div>
                <div class="box-value"><?=$params['header']->inv_no?></div>
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
                <div class="box-name">NOTIFY</div>
                <div class="box-colon">:</div>
                <div class="box-value"><?=$params['header']->beneficiary?></div>
            </div>

            <div id="row">
                <div class="box-name">SHIPPER</div>
                <div class="box-colon">:</div>
                <div class="box-value"><?=$params['header']->beneficiary?></div>
            </div>

            <div id="row">
                <div class="box-name">ETD EST.</div>
                <div class="box-colon">:</div>
                <div class="box-value"><?=$params['header']->estimated?></div>
            </div>

            <div id="row">
                <div class="box-name">DESTINATION</div>
                <div class="box-colon">:</div>
                <div class="box-value"><?=$params['header']->destination_port?></div>
            </div>

            <div id="row">
                <div class="box-name">LOADING PORT</div>
                <div class="box-colon">:</div>
                <div class="box-value"><?=$params['header']->loading_port?></div>
            </div>

            <div id="row">
                <div class="box-name">COUNTRY OF ORIFIN</div>
                <div class="box-colon">:</div>
                <div class="box-value"><?=$params['header']->country_origin?></div>
            </div>

            <div id="row">
                <div class="box-name">FFRN #</div>
                <div class="box-colon">:</div>
                <div class="box-value"><?=$params['header']->country_origin?></div>
            </div>
        </div>

        <div id="detail" class="content" style="margin-top: 2%;">
            <table class="table">
                <thead>
                    <tr>
                        <th>NO.</th>
                        <th>CARTOON BARCODE</th>
                        <th>CONTAINER</th>
                        <th>HS CODE</th>
                        <th>DESCRIPTION OF GOODS</th>
                        <th>PACKING</th>
                        <th>QTY</th>
                        <th>BATCH</th>
                        <th>UNIT PRICE</th>
                        <th>TOTAL PRICE</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="data-border">NO.</td>
                        <td class="data-border" rowspan="2">CARTOON BARCODE</td>
                        <td class="data-border" rowspan="2">CONTAINER</td>
                        <td class="data-border">HS CODE</td>
                        <td class="data-border">DESCRIPTION OF GOODS</td>
                        <td class="data-border">PACKING</td>
                        <td class="data-border">QTY</td>
                        <td class="data-border">BATCH</td>
                        <td class="data-border">UNIT PRICE</td>
                        <td class="data-border">TOTAL PRICE</td>
                    </tr>
                    <tr>
                        <td class="data-border">NO.</td>
                        <td class="data-border">HS CODE</td>
                        <td class="data-border">DESCRIPTION OF GOODS</td>
                        <td class="data-border">PACKING</td>
                        <td class="data-border">QTY</td>
                        <td class="data-border">BATCH</td>
                        <td class="data-border">UNIT PRICE</td>
                        <td class="data-border">TOTAL PRICE</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th class="data-border" style="text-align: left;" colspan="9">TOTAL FOB</th>
                        <td class="data-border"></td>
                    </tr>
                    <tr>
                        <th class="data-border" style="text-align: left;" colspan="9">OCEAN FREIGHT</td>
                        <td class="data-border"></td>
                    </tr>
                    <tr>
                        <th class="data-border" style="text-align: left;" colspan="9">INSURANCE</td>
                        <td class="data-border"></td>
                    </tr>
                    <tr>
                        <th class="data-border" style="text-align: left;" colspan="9">TOTAL CIF</td>
                        <td class="data-border"></td>
                    </tr>
                    <tr>
                        <th class="data-border" style="text-align: left;" colspan="9">SAY</td>
                        <td class="data-border"></td>
                    </tr>
                </tfoot>
            </table>

            <div class="title" style="font-size: 9px; margin-top: 2%; text-align: left;">FREE GOODS</div>
            <table class="table">
                <thead>
                    <tr>
                        <th>NO.</th>
                        <th>CARTOON BARCODE</th>
                        <th>CONTAINER</th>
                        <th>HS CODE</th>
                        <th>DESCRIPTION OF GOODS</th>
                        <th>PACKING</th>
                        <th>QTY</th>
                        <th>BATCH</th>
                        <th>UNIT PRICE</th>
                        <th>TOTAL PRICE</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="data-border">NO.</td>
                        <td class="data-border" rowspan="2">CARTOON BARCODE</td>
                        <td class="data-border" rowspan="2">CONTAINER</td>
                        <td class="data-border">HS CODE</td>
                        <td class="data-border">DESCRIPTION OF GOODS</td>
                        <td class="data-border">PACKING</td>
                        <td class="data-border">QTY</td>
                        <td class="data-border">BATCH</td>
                        <td class="data-border">UNIT PRICE</td>
                        <td class="data-border">TOTAL PRICE</td>
                    </tr>
                    <tr>
                        <td class="data-border">NO.</td>
                        <td class="data-border">HS CODE</td>
                        <td class="data-border">DESCRIPTION OF GOODS</td>
                        <td class="data-border">PACKING</td>
                        <td class="data-border">QTY</td>
                        <td class="data-border">BATCH</td>
                        <td class="data-border">UNIT PRICE</td>
                        <td class="data-border">TOTAL PRICE</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th class="data-border" style="text-align: left;" colspan="9">TOTAL FOB</th>
                        <td class="data-border"></td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div id="footer" class="content" style="margin-top: 1%;">
            <h4 style="margin-bottom: 0px;">PURCHASE GOODS</h4>
            <div id="row">
                <div class="box-name">NUMBER OF CASE</div>
                <div class="box-colon">:</div>
                <div class="box-value"><?=$params['header']->inv_no?></div>
            </div>
            <div id="row">
                <div class="box-name">AMOUNT</div>
                <div class="box-colon">:</div>
                <div class="box-value"><?=$params['header']->inv_no?></div>
            </div>

            <h4 style="margin-bottom: 0px; margin-top: 1%;">FREE GOODS</h4>
            <div id="row">
                <div class="box-name">NUMBER OF CASE</div>
                <div class="box-colon">:</div>
                <div class="box-value"><?=$params['header']->inv_no?></div>
            </div>
            <div id="row">
                <div class="box-name">AMOUNT</div>
                <div class="box-colon">:</div>
                <div class="box-value"><?=$params['header']->inv_no?></div>
            </div>

            <h4 style="margin-bottom: 0px; margin-top: 1%;">GRAND TOTAL</h4>
            <div id="row">
                <div class="box-name">NUMBER OF CASE</div>
                <div class="box-colon">:</div>
                <div class="box-value"><?=$params['header']->inv_no?></div>
            </div>
            <div id="row">
                <div class="box-name">AMOUNT</div>
                <div class="box-colon">:</div>
                <div class="box-value"><?=$params['header']->inv_no?></div>
            </div>
            <div id="row">
                <div class="box-name">SAY</div>
                <div class="box-colon">:</div>
                <div class="box-value"><?=$params['header']->inv_no?></div>
            </div>
        </div>

        <div id="signature" style="margin-top: 2%; box-sizing: border-box; content: ''; clear: both; display: table;">
            <div style="float: left; width: 20%; text-align: center;">
                Kudus, <?=IndoDate?>
                <div style="margin-top: 30%;">Evi Susanti</div>
                <div>Finance</div>
            </div>
        </div>
    </div>
</div>