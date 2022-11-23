<div class="row">
    <div class="col-md-2">
        <div class="form-group required">
            <label for="pi_consignee" class="control-label">Company name</label>
            <input type="text" class="form-control" id="pi_consignee" name="pi_consignee" value="<?=$params['detail']->consignee_name?>" disabled>
        </div>
    </div>

    <div class="col-md-2">
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
            <label for="con_phone_tel" class="control-label">Phone number (Tel)</label>
            <!-- <input type="text" name="con_phone" class="form-control" id="con_phone" placeholder="Enter phone number" autocomplete="off" required> -->
            <div class="input-group" id="con_phone_tel" data-target-input="nearest">
                <div class="input-group-append">
                    <div class="input-group-text"><i class="fa fa-phone-alt"></i></div>
                </div>
                <input type="text" class="form-control" disabled value="<?=$params['detail']->consignee_phone_tel?>">
            </div>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group required">
            <label for="con_phone_fax" class="control-label">Phone number (Fax)</label>
            <!-- <input type="text" name="con_phone" class="form-control" id="con_phone" placeholder="Enter phone number" autocomplete="off" required> -->
            <div class="input-group" id="con_phone_fax" data-target-input="nearest">
                <div class="input-group-append">
                    <div class="input-group-text"><i class="fa fa-fax"></i></div>
                </div>
                <input type="text" class="form-control" disabled value="<?=$params['detail']->consignee_phone_fax?>">
            </div>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group required">
            <label for="consignee_cp" class="control-label">Attention contact person</label>
            <input type="text" name="consignee_cp" class="form-control upper" id="consignee_cp" value="<?=$params['detail']->consignee_cp?>" disabled>
        </div>
    </div>
</div>