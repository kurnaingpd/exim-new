<?php
    $totIncoterm = 0;

    foreach($params['item'][1] as $rows) :
        $totIncoterm += $rows['total'];
    endforeach;
    
    $total = ($totIncoterm + $params['detail']->freight_cost + $params['detail']->insurance);
?>
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label for="remark" class="control-label">Total</label>
            <input type="text" name="incoterm" class="form-control upper" id="incoterm" value="<?=number_format($totIncoterm, 2)?>" disabled>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label for="remark" class="control-label">Freight cost</label>
            <input type="text" name="incoterm" class="form-control upper" id="incoterm" value="<?=number_format($params['detail']->freight_cost, 2)?>" disabled>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label for="remark" class="control-label">Insurance</label>
            <input type="text" name="incoterm" class="form-control upper" id="incoterm" value="<?=number_format($params['detail']->insurance, 2)?>" disabled>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label for="remark" class="control-label"><?=$params['detail']->incoterm_name.' ('.$params['detail']->incoterm_code.')'?></label>
            <input type="text" name="incoterm" class="form-control upper" id="incoterm" value="<?=number_format($total, 2)?>" disabled>
        </div>
    </div>
</div>