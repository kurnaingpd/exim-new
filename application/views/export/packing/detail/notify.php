<div class="row">
    <div class="col-md-2">
        <div class="form-group">
            <label for="con_company" class="control-label">Company name</label>
            <input type="text" class="form-control" value="<?=$params['detail']->not_name?>" disabled>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="con_company" class="control-label">Address</label>
            <textarea class="form-control" rows="3" disabled><?=$params['detail']->not_address?></textarea>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label for="con_company" class="control-label">Country</label>
            <input type="text" class="form-control" value="<?=$params['detail']->not_country_name?>" disabled>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label for="con_company" class="control-label">Phone</label>
            <input type="text" class="form-control" value="<?=$params['detail']->not_phone?>" disabled>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label for="con_company" class="control-label">Attention contact person</label>
            <input type="text" class="form-control" value="<?=$params['detail']->cp_name?>" disabled>
        </div>
    </div>
</div>