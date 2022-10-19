<div class="row">
    <div class="col-md-3">
        <div class="form-group required">
            <label for="pi_beneficiary" class="control-label">Company name</label>
            <select name="pi_beneficiary" class="form-control select2bs4" id="pi_beneficiary" required>
                <option></option>
                <?php foreach($params['beneficiary'] as $rows) : ?>
                    <option value="<?=$rows->id?>" <?=(($rows->id==$params['detail']->beneficiary_id)?'selected':'')?>><?=$rows->company_name?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group required">
            <label for="beneficiary_address" class="control-label">Address</label>
            <textarea name="beneficiary_address" class="form-control upper" id="beneficiary_address" placeholder="Enter address" disabled rows="3"><?=$params['detail_value']->beneficiary_address?></textarea>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group required">
            <label for="beneficiary_country" class="control-label">Country</label>
            <input type="text" name="beneficiary_country" class="form-control upper" id="beneficiary_country" placeholder="Enter country" disabled value="<?=$params['detail_value']->beneficiary_country?>">
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group required">
            <label for="beneficiary_phone" class="control-label">Phone</label>
            <input type="text" name="beneficiary_phone" class="form-control upper" id="beneficiary_phone" placeholder="Enter phone" disabled value="<?=$params['detail_value']->beneficiary_phone?>">
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group required">
            <label for="beneficiary_cp" class="control-label">Attention contact person</label>
            <input type="text" name="beneficiary_cp" class="form-control upper" id="beneficiary_cp" placeholder="Enter contact person" disabled value="<?=$params['detail_value']->beneficiary_cp?>">
        </div>
    </div>
</div>