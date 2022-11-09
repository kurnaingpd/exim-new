<div class="row">
    <div class="col-md-2">
        <div class="form-group required">
            <label for="loading_port" class="control-label">Loading port</label>
            <input type="text" class="form-control" id="loading_port" name="loading_port" value="<?=$params['detail']->data_loading_port?>" disabled>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group required">
            <label for="discharge_port" class="control-label">Discharge port</label>
            <input type="text" class="form-control" id="discharge_port" name="discharge_port" value="<?=$params['detail']->data_discharge_port?>" disabled>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group required">
            <label for="destination_port" class="control-label">Destination port</label>
            <input type="text" name="destination_port" class="form-control" id="destination_port" value="<?=$params['detail']->data_destination_port?>" disabled>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group required">
            <label for="container" class="control-label">Container</label>
            <input type="text" name="container" class="form-control" id="container" value="<?=$params['detail']->container_name?>" disabled>
        </div>
    </div>

    <!-- <div class="col-md-2">
        <div class="form-group required">
            <label for="container_no" class="control-label">Number of container</label>
            <input type="text" name="container_no" class="form-control upper" id="container_no" value="<?=$params['detail']->number_of_container?>" disabled>
        </div>
    </div> -->

    <div class="col-md-2">
        <div class="form-group required">
            <label for="freight_company" class="control-label">Freight company</label>
            <input type="text" name="freight_company" class="form-control upper" id="freight_company" value="<?=$params['detail']->freight_company?>" disabled>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group required">
            <label for="freight_company_cont" class="control-label">Freight company contact</label>
            <input type="text" name="freight_company_cont" class="form-control upper" id="freight_company_cont" value="<?=$params['detail']->freight_company_contact?>" disabled>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-2">
        <div class="form-group required">
            <label for="freight_company_no" class="control-label">Freight company number</label>
            <input type="text" name="freight_company_no" class="form-control upper" id="freight_company_no" value="<?=$params['detail']->freight_company_no?>" disabled>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group required">
            <label for="freight_cost" class="control-label">Freight cost</label>
            <input type="text" name="freight_cost" class="form-control" id="freight_cost" value="<?=number_format($params['detail']->freight_cost, 2)?>" disabled>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group required">
            <label for="insurance" class="control-label">Insurance</label>
            <input type="text" name="insurance" class="form-control" id="insurance" value="<?=number_format($params['detail']->insurance, 2)?>" disabled>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group required">
            <label for="bank" class="control-label">Bank</label>
            <input type="text" name="bank" class="form-control" id="bank" value="<?=$params['detail']->data_bank_name?>" disabled>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group required">
            <label for="currency" class="control-label">Currency</label>
            <input type="text" name="currency" class="form-control" id="currency" value="<?=$params['detail']->data_currency?>" disabled>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-2">
        <div class="form-group required">
            <label for="ppn" class="control-label">PPN</label>
            <input type="text" name="ppn" class="form-control" id="ppn" value="<?=$params['detail']->data_ppn?>" disabled>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group required">
            <label for="top" class="control-label">Terms of payment</label>
            <input type="text" name="top" class="form-control" id="top" value="<?=$params['detail']->data_top?>" disabled>
        </div>
    </div>
</div>