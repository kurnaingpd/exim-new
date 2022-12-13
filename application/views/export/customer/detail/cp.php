<div class="row">
    <div class="col-md-4">
        <div class="form-group required">
            <label for="cp_name" class="control-label">Name</label>
            <input type="text" name="cp_name" class="form-control upper" id="cp_name" placeholder="Enter name" autocomplete="off" required value="<?=$params['cust_cp']->name?>">
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group required">
            <label for="cp_phone" class="control-label">Phone number</label>
            <div class="input-group">
                <div class="input-group-append">
                    <div class="input-group-text"><i class="fa fa-phone-alt"></i></div>
                </div>
                <input type="text" class="form-control" id="cp_phone" name="cp_phone" placeholder="Enter phone number" autocomplete="off" pattern="^[0-9+]+$" value="<?=$params['cust_cp']->phone_no?>" required>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group required">
            <label for="cp_email" class="control-label">Email</label>
            <input type="email" name="cp_email" class="form-control" id="cp_email" placeholder="Enter email" autocomplete="off" required value="<?=$params['cust_cp']->email?>">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-3">
        <div class="form-group required">
            <label for="cp_top" class="control-label">Terms of Payment</label>
            <select name="cp_top" class="form-control select2bs4" id="cp_top" required>
                <option></option>
                <?php foreach($params['top'] as $rows) : ?>
                    <option value="<?=$rows->id?>" <?=(($params['cust_cp']->top_id==$rows->id)?'selected':'')?>><?=$rows->name?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group required">
            <label for="cp_dp" class="control-label">DP (in %)</label>
            <input type="text" name="cp_dp" class="form-control" id="cp_dp" placeholder="0" autocomplete="off" pattern="^[0-9]+$" maxlength="3" max="100" required value="<?=$params['cust_cp']->dp?>">
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group required">
            <label for="cp_balancing" class="control-label">Balancing (in %)</label>
            <input type="text" name="cp_balancing" class="form-control" id="cp_balancing" readonly value="<?=$params['cust_cp']->balancing?>">
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group required">
            <label for="cp_currency" class="control-label">Currency for Payment</label>
            <select name="cp_currency" class="form-control select2bs4" id="cp_currency" required>
                <option></option>
                <?php foreach($params['currency'] as $rows) : ?>
                    <option value="<?=$rows->id?>" <?=(($params['cust_cp']->currency_id==$rows->id)?'selected':'')?>><?=$rows->code.' - '.$rows->name?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group required">
            <label for="cp_incoterm" class="control-label">Incoterm</label>
            <select name="cp_incoterm" class="form-control select2bs4" id="cp_incoterm" required>
                <option></option>
                <?php foreach($params['incoterm'] as $rows) : ?>
                    <option value="<?=$rows->id?>" <?=(($params['cust_cp']->incoterm_id==$rows->id)?'selected':'')?>><?=$rows->code.' - '.$rows->name?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
</div>