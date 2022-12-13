<div class="row">
    <div class="col-md-2">
        <div class="form-group required">
            <label for="con_company" class="control-label">Company name</label>
            <input type="text" name="con_company" class="form-control upper" id="con_company" placeholder="Enter company name" autocomplete="off" autofocus required value="<?=$params['customer']->name?>">
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group required">
            <label for="con_town" class="control-label">Town</label>
            <input type="text" name="con_town" class="form-control upper" id="con_town" placeholder="Enter town" autocomplete="off" required value="<?=$params['customer']->town?>">
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group required">
            <label for="con_country" class="control-label">Country</label>
            <select name="con_country" class="form-control select2bs4" id="con_country" required>
                <option></option>
                <?php foreach($params['country'] as $rows) : ?>
                    <option value="<?=$rows->id?>" <?=(($params['customer']->country_id==$rows->id)?'selected':'')?>><?=$rows->code.' - '.$rows->name?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group required">
            <label for="con_phone_tel" class="control-label">Phone number (Tel)</label>
            <div class="input-group" id="con_phone_tel" data-target-input="nearest">
                <div class="input-group-append">
                    <div class="input-group-text"><i class="fa fa-phone-alt"></i></div>
                </div>
                <input type="text" class="form-control" autocomplete="off" id="con_phone_tel" name="con_phone_tel" placeholder="Enter phone number" autocomplete="off" required pattern="^[0-9+]+$" value="<?=$params['customer']->phone_no_tel?>">
            </div>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label for="con_phone_fax" class="control-label">Phone number (Fax)</label>
            <div class="input-group" id="con_phone_fax" data-target-input="nearest">
                <div class="input-group-append">
                    <div class="input-group-text"><i class="fa fa-fax"></i></div>
                </div>
                <input type="text" class="form-control" autocomplete="off" id="con_phone_fax" name="con_phone_fax" placeholder="Enter phone number" autocomplete="off" pattern="^[0-9+]+$" value="<?=$params['customer']->phone_no_fax?>">
            </div>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group required">
            <label for="con_bank" class="control-label">Bank</label>
            <select name="con_bank" class="form-control select2bs4" id="con_bank" required>
                <option></option>
                <?php foreach($params['bank'] as $rows) : ?>
                    <option value="<?=$rows->id?>" <?=(($params['customer']->bank_id==$rows->id)?'selected':'')?>><?=$rows->name?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group required">
            <label for="con_address" class="control-label">Address</label>
            <textarea name="con_address" class="form-control upper" id="con_address" placeholder="Enter address" autocomplete="off" required rows="3"><?=$params['customer']->address?></textarea>
        </div>
    </div>
</div>