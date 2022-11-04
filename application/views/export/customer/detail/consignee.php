<div class="row">
    <div class="col-md-2">
        <div class="form-group required">
            <label for="con_company" class="control-label">Company name</label>
            <input type="text" name="con_company" class="form-control upper" id="con_company" placeholder="Enter company name" autocomplete="off" autofocus required value="<?=$params['customer']->company_name?>">
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group required">
            <label for="con_address" class="control-label">Address</label>
            <textarea name="con_address" class="form-control upper" id="con_address" placeholder="Enter address" autocomplete="off" required rows="3"><?=$params['customer']->address?></textarea>
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
            <label for="con_phone" class="control-label">Phone number</label>
            <input type="text" name="con_phone" class="form-control" id="con_phone" placeholder="Enter phone number" autocomplete="off" required value="<?=$params['customer']->phone_no?>">
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group required">
            <label for="con_bank" class="control-label">Bank</label>
            <select name="con_bank" class="form-control select2bs4" id="con_bank" required>
                <option></option>
                <?php foreach($params['bank'] as $rows) : ?>
                    <option value="<?=$rows->id?>" <?=(($params['cust_bank']->bank_id==$rows->id)?'selected':'')?>><?=$rows->name?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
</div>