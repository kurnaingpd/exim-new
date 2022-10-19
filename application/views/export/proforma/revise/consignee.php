<div class="row">
    <div class="col-md-3">
        <div class="form-group required">
            <label for="pi_consignee" class="control-label">Company name</label>
            <select name="pi_consignee" class="form-control select2bs4" id="pi_consignee" disabled>
                <option></option>
                <?php foreach($params['customer'] as $rows) : ?>
                    <option value="<?=$rows->id?>" <?=(($rows->id==$params['detail']->customer_id)?'selected':'')?>><?=$rows->code.' - '.$rows->company_name?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group required">
            <label for="consignee_address" class="control-label">Address</label>
            <textarea name="consignee_address" class="form-control upper" id="consignee_address" placeholder="Enter address" disabled rows="3"><?=$params['detail_value']->consginee_address?></textarea>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group required">
            <label for="consignee_country" class="control-label">Country</label>
            <input type="text" name="consignee_country" class="form-control upper" id="consignee_country" placeholder="Enter country" disabled value="<?=$params['detail_value']->consignee_country?>">
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group required">
            <label for="consignee_phone" class="control-label">Phone</label>
            <input type="text" name="consignee_phone" class="form-control upper" id="consignee_phone" placeholder="Enter phone" disabled value="<?=$params['detail_value']->consignee_phone?>">
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group required">
            <label for="consignee_cp" class="control-label">Attention contact person</label>
            <input type="text" name="consignee_cp" class="form-control upper" id="consignee_cp" placeholder="Enter contact person" disabled value="<?=$params['detail_value']->consignee_cp?>">
        </div>
    </div>
</div>