<div id="container">
    <h4 class="title" style="margin-bottom: 0px;"><u>INVOICE</u></h4>
    <div class="title" style="font-size: 9px; margin-bottom: 3.5%;">0001/SKP-EXT/INV/09/2022</div>

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
    </div>
</div>