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

<div id="detail">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="form-group">
                <label for="shipto_discharge" class="control-label">Discharge port</label>
                <input type="text" name="shipto_discharge" class="form-control upper port" id="shipto_discharge" placeholder="Enter discharge port" autocomplete="off">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="shipto_destination" class="control-label">Destination port</label>
                <input type="text" name="shipto_destination" class="form-control upper port" id="shipto_destination" placeholder="Enter destination port" autocomplete="off">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <input type="button mt-5" class="btn btn-success btn-block" id="btn-shipto" value="Add detail(s)">
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-12">
        <table class="table table-sm table-bordered table-striped">
            <thead>
                <tr class="text-center">
                    <th>Discharge port</th>
                    <th>Destination port</th>
                    <th><i class="fas fa-ellipsis-h"></i></th>
                </tr>
            </thead>
            <tbody id="data-shipto">
                <?php $no = 1; foreach($detail['cust_ship'] as $rows) : ?>
                    <tr class="text-center" data-id="<?=$rows->id?>">
                        <td>
                            <input type="text" class="form-control" id="dtl_shipto_discharge_<?=$rows->id?>" name="dtl_shipto_discharge_<?=$rows->id?>" value="<?=$rows->discharge_port?>">
                        </td>
                        <td>
                            <input type="text" class="form-control" id="dtl_shipto_destination_<?=$rows->id?>" name="dtl_shipto_destination_<?=$rows->id?>" value="<?=$rows->destination_port?>">
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger btn-flat btn-remove" style="cursor:pointer;" data-row="<?=$rows->id?>"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                <?php $no++; endforeach; ?>
            </tbody>
        </table>
    </div>
</div>