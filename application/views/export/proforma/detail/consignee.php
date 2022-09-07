<div class="row">
    <div class="col-md-3">
        <div class="form-group required">
            <label for="pi_consignee" class="control-label">Company name</label>
            <input type="text" class="form-control" id="pi_consignee" name="pi_consignee" value="<?=$params['detail']->consignee_name?>" disabled>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group required">
            <label for="consignee_address" class="control-label">Address</label>
            <textarea name="consignee_address" class="form-control upper" id="consignee_address" rows="3" disabled><?=$params['detail']->consginee_address?></textarea>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group required">
            <label for="consignee_country" class="control-label">Country</label>
            <input type="text" name="consignee_country" class="form-control upper" id="consignee_country" value="<?=$params['detail']->consignee_country?>" disabled>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group required">
            <label for="consignee_phone" class="control-label">Phone</label>
            <input type="text" name="consignee_phone" class="form-control upper" id="consignee_phone" value="<?=$params['detail']->consignee_phone?>" disabled>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group required">
            <label for="consignee_cp" class="control-label">Attention contact person</label>
            <input type="text" name="consignee_cp" class="form-control upper" id="consignee_cp" value="<?=$params['detail']->consignee_cp?>" disabled>
        </div>
    </div>
</div>