<div class="row">
    <div class="col-md-2">
        <div class="form-group">
            <label for="con_company" class="control-label">Company name</label>
            <input type="text" class="form-control" value="<?=$params['detail']->ship_name?>" disabled>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="con_company" class="control-label">Address</label>
            <textarea class="form-control" rows="3" disabled><?=$params['detail']->ship_address?></textarea>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label for="con_company" class="control-label">Port of discharge</label>
            <input type="text" class="form-control" value="<?=$params['detail']->discharge_port?>" disabled>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label for="con_company" class="control-label">Port of loading</label>
            <input type="text" class="form-control" value="<?=$params['detail']->loading_port?>" disabled>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label for="con_company" class="control-label">Country of origin</label>
            <input type="text" class="form-control" value="<?=$params['detail']->country_origin?>" disabled>
        </div>
    </div>
</div>