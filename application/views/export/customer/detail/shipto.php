<div id="header">
    <div class="row">
        <div class="col-md-3">
            <div class="form-group required">
                <label for="shipto_company" class="control-label">Company name</label>
                <input type="text" name="shipto_company" class="form-control upper" id="shipto_company" placeholder="Enter company name" autocomplete="off" required value="<?=$params['cust_ship']->company_name?>">
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group required">
                <label for="shipto_address" class="control-label">Address</label>
                <textarea name="shipto_address" class="form-control upper" id="shipto_address" placeholder="Enter address" autocomplete="off" required rows="3"><?=$params['cust_ship']->address?></textarea>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group required">
                <label for="shipto_country" class="control-label">Country</label>
                <select name="shipto_country" class="form-control select2bs4" id="shipto_country" required>
                    <option></option>
                    <?php foreach($params['country'] as $rows) : ?>
                        <option value="<?=$rows->id?>" <?=(($params['cust_ship']->country_id==$rows->id)?'selected':'')?>><?=$rows->code.' - '.$rows->name?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="shipto_phone" class="control-label">Phone number</label>
                <input type="text" name="shipto_phone" class="form-control" id="shipto_phone" placeholder="Enter phone number" autocomplete="off" value="<?=$params['cust_ship']->phone_no?>">
            </div>
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-12">
        <table class="table table-sm table-bordered table-striped">
            <thead>
                <tr class="text-center">
                    <th>#</th>
                    <th>Discharge port</th>
                    <th>Destination port</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach($detail['cust_ship'] as $rows) : ?>
                    <tr class="text-center">
                        <td><?=$no?></td>
                        <td><?=$rows->discharge_port?></td>
                        <td><?=$rows->destination_port?></td>
                    </tr>
                <?php $no++; endforeach; ?>
            </tbody>
        </table>
    </div>
</div>