<div class="row">
    <div class="col-md-3">
        <div class="form-group required">
            <label for="not_company" class="control-label">Company name</label>
            <input type="text" name="not_company" class="form-control upper" id="not_company" placeholder="Enter company name" required>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group required">
            <label for="not_country" class="control-label">Country</label>
            <select name="not_country_id" class="form-control select2bs4" id="not_country_id" required>
                <option></option>
                <?php foreach($params['country'] as $rows) : ?>
                    <option value="<?=$rows->id?>"><?=$rows->code.' - '.$rows->name?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group required">
            <label for="not_phone" class="control-label">Phone number (Tel)</label>
            <div class="input-group" id="not_phone_tel" data-target-input="nearest">
                <div class="input-group-append">
                    <div class="input-group-text"><i class="fa fa-phone-alt"></i></div>
                </div>
                <input type="text" class="form-control" autocomplete="off" id="not_phone_tel" name="not_phone_tel" placeholder="Enter phone number" autocomplete="off" required pattern="^[0-9+]+$">
            </div>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label for="not_phone" class="control-label">Phone number (Fax)</label>
            <div class="input-group" id="not_phone_fax" data-target-input="nearest">
                <div class="input-group-append">
                    <div class="input-group-text"><i class="fa fa-fax"></i></div>
                </div>
                <input type="text" class="form-control" autocomplete="off" id="not_phone_fax" name="not_phone_fax" placeholder="Enter phone number" autocomplete="off" pattern="^[0-9+]+$">
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group required">
            <label for="not_address" class="control-label">Address</label>
            <textarea name="not_address" class="form-control upper" id="not_address" rows="3" placeholder="Enter address" required></textarea>
        </div>
    </div>
</div>