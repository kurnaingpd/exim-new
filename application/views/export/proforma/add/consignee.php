<div class="row">
    <div class="col-md-3">
        <div class="form-group required">
            <label for="pi_consignee" class="control-label">Company name</label>
            <select name="pi_consignee" class="form-control select2bs4" id="pi_consignee" required>
                <option></option>
                <?php foreach($params['customer'] as $rows) : ?>
                    <option value="<?=$rows->id?>"><?=$rows->code.' - '.$rows->company_name?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group required">
            <label for="consignee_address" class="control-label">Address</label>
            <textarea name="consignee_address" class="form-control upper" id="consignee_address" placeholder="Enter address" readonly required rows="3"></textarea>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group required">
            <label for="consignee_country" class="control-label">Country</label>
            <input type="text" name="consignee_country" class="form-control upper" id="consignee_country" placeholder="Enter country" readonly required>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group required">
            <label for="consignee_phone" class="control-label">Phone</label>
            <input type="text" name="consignee_phone" class="form-control upper" id="consignee_phone" placeholder="Enter phone" readonly required>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group required">
            <label for="consignee_cp" class="control-label">Attention contact person</label>
            <input type="text" name="consignee_cp" class="form-control upper" id="consignee_cp" placeholder="Enter contact person" readonly required>
        </div>
    </div>
</div>