<div class="row">
    <div class="col-md-2">
        <div class="form-group required">
            <label for="loading_port" class="control-label">Loading port</label>
            <select name="loading_port" class="form-control select2bs4" id="loading_port" required>
                <option></option>
                <?php foreach($params['load_port'] as $rows) : ?>
                    <option value="<?=$rows->id?>" <?=(($rows->id==$params['detail']->loading_port_id)?'selected':'')?>><?=$rows->name?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group required">
            <label for="discharge_port" class="control-label">Discharge port</label>
            <select name="discharge_port" class="form-control select2bs4" id="discharge_port" required>
                <option></option>
                <?php foreach($chained['discharge'] as $rows) : ?>
                    <option value="<?=$rows->id?>" <?=(($rows->id==$params['detail']->customer_ship_id)?'selected':'')?>><?=$rows->discharge_port?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group required">
            <label for="destination_port" class="control-label">Destination port</label>
            <input type="text" name="destination_port" class="form-control" id="destination_port" placeholder="Choose discharge port" disabled value="<?=$params['detail_value']->data_destination_port?>">
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group required">
            <label for="container" class="control-label">Container</label>
            <select name="container" class="form-control select2bs4" id="container" disabled>
                <option></option>
                <?php foreach($params['container'] as $rows) : ?>
                    <option value="<?=$rows->id?>" <?=(($rows->id==$params['detail']->container_id)?'selected':'')?>><?=$rows->name?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group required">
            <label for="container_no" class="control-label">Number of container</label>
            <input type="text" name="container_no" class="form-control upper" id="container_no" placeholder="Enter number of container" value="<?=$params['detail']->number_of_container?>" required>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group required">
            <label for="freight_company" class="control-label">Freight company</label>
            <input type="text" name="freight_company" class="form-control upper" id="freight_company" placeholder="Enter freight company" value="<?=($chained['freight']?$chained['freight']->company:'-')?>" disabled>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-2">
        <div class="form-group required">
            <label for="freight_company_cont" class="control-label">Freight company contact</label>
            <input type="text" class="form-control upper" id="freight_company_cont" placeholder="Enter freight company contact" value="<?=($chained['freight']?$chained['freight']->contact:'-')?>" disabled>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group required">
            <label for="freight_company_no" class="control-label">Freight company number</label>
            <input type="text" class="form-control upper" id="freight_company_no" placeholder="Enter freight company number" value="<?=($chained['freight']?$chained['freight']->number:'-')?>" disabled>
        </div>
    </div>
    
    <?php if($this->session->userdata('logged_in')->role_id == 7) : ?>
    <div class="col-md-2">
        <div class="form-group required">
            <label for="freight_cost" class="control-label">Freight cost</label>
            <input type="text" name="freight_cost" class="form-control" id="freight_cost" placeholder="Enter freight cost" value="0" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" required>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group required">
            <label for="insurance" class="control-label">Insurance</label>
            <input type="text" name="insurance" class="form-control" id="insurance" placeholder="Enter insurance" value="0" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" required>
        </div>
    </div>
    <?php endif; ?>

    <div class="col-md-2">
        <div class="form-group required">
            <label for="bank" class="control-label">Bank</label>
            <select name="bank" class="form-control select2bs4" id="bank" required>
                <option></option>
                <?php foreach($params['bank'] as $rows) : ?>
                    <option value="<?=$rows->id?>" <?=(($rows->id==$params['detail']->bank_id)?'selected':'')?>><?=$rows->name?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group required">
            <label for="currency" class="control-label">Currency</label>
            <select name="currency" class="form-control select2bs4" id="currency" required>
                <option></option>
                <?php foreach($params['currency'] as $rows) : ?>
                    <option value="<?=$rows->id?>" <?=(($rows->id==$params['detail']->currency_id)?'selected':'')?>><?=$rows->icon.' - '.$rows->spell?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
<!-- </div>

<div class="row"> -->
    <div class="col-md-2">
        <div class="form-group required">
            <label for="ppn" class="control-label">PPN</label>
            <select name="ppn" class="form-control select2bs4" id="ppn" required>
                <option></option>
                <option value="1" <?=(('1'==$params['detail']->ppn)?'selected':'')?>>Yes</option>
                <option value="0" <?=(('0'==$params['detail']->ppn)?'selected':'')?>>No</option>
            </select>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group required">
            <label for="top" class="control-label">Terms of payment</label>
            <input type="hidden" name="top_id" class="form-control" id="top_id" value="<?=$params['detail']->top_id?>">
            <input type="text" name="top" class="form-control" id="top" value="<?=$params['detail_value']->data_top?>" disabled>
        </div>
    </div>
</div>