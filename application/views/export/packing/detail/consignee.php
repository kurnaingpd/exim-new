<div class="row">
    <div class="col-md-2">
        <div class="form-group">
            <label for="con_company" class="control-label">Company name</label>
            <input type="text" class="form-control" value="<?=$params['detail']->cons_name?>" disabled>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label for="con_company" class="control-label">Address</label>
            <textarea class="form-control" rows="3" disabled><?=$params['detail']->cons_address?></textarea>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label for="con_company" class="control-label">Country</label>
            <input type="text" class="form-control" value="<?=$params['detail']->cons_country_name?>" disabled>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label for="con_company" class="control-label">Phone (Tel)</label>
            <!-- <input type="text" class="form-control" value="<?=$params['detail']->cons_phone?>" disabled> -->
            <div class="input-group" id="con_phone_fax" data-target-input="nearest">
                <div class="input-group-append">
                    <div class="input-group-text"><i class="fa fa-phone-alt"></i></div>
                </div>
                <input type="text" class="form-control" autocomplete="off" value="<?=$params['detail']->cons_phone_tel?>" disabled>
            </div>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label for="con_company" class="control-label">Phone (Fax)</label>
            <!-- <input type="text" class="form-control" value="<?=$params['detail']->cons_phone?>" disabled> -->
            <div class="input-group" id="con_phone_fax" data-target-input="nearest">
                <div class="input-group-append">
                    <div class="input-group-text"><i class="fa fa-fax"></i></div>
                </div>
                <input type="text" class="form-control" autocomplete="off" value="<?=$params['detail']->cons_phone_fax?>" disabled>
            </div>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label for="con_company" class="control-label">Attention contact person</label>
            <input type="text" class="form-control" value="<?=$params['detail']->cp_name?>" disabled>
        </div>
    </div>
</div>