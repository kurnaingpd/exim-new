<div class="row">
    <div class="col-md-3">
        <div class="form-group required">
            <label for="pi_beneficiary" class="control-label">Company name</label>
            <input type="text" class="form-control" id="pi_beneficiary" name="pi_beneficiary" value="<?=$params['detail']->beneficiary_name?>" disabled>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group required">
            <label for="beneficiary_address" class="control-label">Address</label>
            <textarea name="beneficiary_address" class="form-control upper" id="beneficiary_address" rows="3" disabled><?=$params['detail']->beneficiary_address?></textarea>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group required">
            <label for="beneficiary_country" class="control-label">Country</label>
            <input type="text" name="beneficiary_country" class="form-control upper" id="beneficiary_country" value="<?=$params['detail']->beneficiary_country?>" disabled>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group required">
            <label for="beneficiary_phone" class="control-label">Phone</label>
            <input type="text" name="beneficiary_phone" class="form-control upper" id="beneficiary_phone" value="<?=$params['detail']->beneficiary_phone?>" disabled>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group required">
            <label for="beneficiary_cp" class="control-label">Attention contact person</label>
            <input type="text" name="beneficiary_cp" class="form-control upper" id="beneficiary_cp" value="<?=$params['detail']->beneficiary_cp?>" disabled>
        </div>
    </div>
</div>