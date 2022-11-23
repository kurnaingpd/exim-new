<div class="row">
    <div class="col-md-2">
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

    <div class="col-md-2">
        <div class="form-group required">
            <label for="consignee_address" class="control-label">Address</label>
            <textarea name="consignee_address" class="form-control upper" id="consignee_address" placeholder="Enter address" disabled required rows="3"></textarea>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group required">
            <label for="consignee_country" class="control-label">Country</label>
            <input type="text" name="consignee_country" class="form-control upper" id="consignee_country" placeholder="Enter country" disabled>
        </div>
    </div>

    <div class="col-md-2">
        <!-- <div class="form-group required">
            <label for="consignee_phone" class="control-label">Phone</label>
            <input type="text" name="consignee_phone" class="form-control upper" id="consignee_phone" placeholder="Enter phone" readonly required>
        </div> -->

        <div class="form-group required">
            <label for="consignee_phone_tel" class="control-label">Phone number (Tel)</label>
            <div class="input-group">
                <div class="input-group-append">
                    <div class="input-group-text"><i class="fa fa-phone-alt"></i></div>
                </div>
                <input type="text" class="form-control" class="form-control upper" id="consignee_phone_tel" name="consignee_phone_tel" placeholder="Enter phone" disabled>
            </div>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group required">
            <label for="consignee_phone_fax" class="control-label">Phone number (Fax)</label>
            <div class="input-group">
                <div class="input-group-append">
                    <div class="input-group-text"><i class="fa fa-fax"></i></div>
                </div>
                <input type="text" class="form-control" class="form-control upper" id="consignee_phone_fax" name="consignee_phone_fax" placeholder="Enter phone" disabled>
            </div>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group required">
            <label for="consignee_cp" class="control-label">Attention contact person</label>
            <input type="text" name="consignee_cp" class="form-control upper" id="consignee_cp" placeholder="Enter contact person" disabled>
        </div>
    </div>
</div>