<div class="row">
    <div class="col-md-2">
        <div class="form-group">
            <label for="imp_bill" class="control-label">Bill of ladding</label>
            <select name="imp_bill" class="form-control select2bs4 import" id="imp_bill" >
                <option></option>
                <?php foreach($params['import_bill'] as $rows) : ?>
                    <option value="<?=$rows->id?>" <?=(($params['cust_import']->bill_of_ladding==$rows->id)?'selected':'')?>><?=$rows->name?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label for="imp_packing" class="control-label">Packing list</label>
            <select name="imp_packing" class="form-control select2bs4 import" id="imp_packing" >
                <option></option>
                <?php foreach($params['import_nonbill'] as $rows) : ?>
                    <option value="<?=$rows->id?>" <?=(($params['cust_import']->packing_list==$rows->id)?'selected':'')?>><?=$rows->name?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label for="imp_inv" class="control-label">Invoice</label>
            <select name="imp_inv" class="form-control select2bs4 import" id="imp_inv" >
                <option></option>
                <?php foreach($params['import_nonbill'] as $rows) : ?>
                    <option value="<?=$rows->id?>" <?=(($params['cust_import']->invoice==$rows->id)?'selected':'')?>><?=$rows->name?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label for="imp_inv_uv" class="control-label">Invoice under value</label>
            <select name="imp_inv_uv" class="form-control select2bs4 import" id="imp_inv_uv" >
                <option></option>
                <?php foreach($params['import_nonbill'] as $rows) : ?>
                    <option value="<?=$rows->id?>" <?=(($params['cust_import']->invoice_uv==$rows->id)?'selected':'')?>><?=$rows->name?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label for="imp_coo" class="control-label">COO</label>
            <select name="imp_coo" class="form-control select2bs4 import" id="imp_coo" >
                <option></option>
                <?php foreach($params['import_nonbill'] as $rows) : ?>
                    <option value="<?=$rows->id?>" <?=(($params['cust_import']->coo==$rows->id)?'selected':'')?>><?=$rows->name?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label for="imp_hc" class="control-label">Health certificate</label>
            <select name="imp_hc" class="form-control select2bs4 import" id="imp_hc" >
                <option></option>
                <?php foreach($params['import_nonbill'] as $rows) : ?>
                    <option value="<?=$rows->id?>" <?=(($params['cust_import']->health_cert==$rows->id)?'selected':'')?>><?=$rows->name?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label for="imp_mat" class="control-label">Material savety data sheet</label>
            <select name="imp_mat" class="form-control select2bs4 import" id="imp_mat" >
                <option></option>
                <?php foreach($params['import_nonbill'] as $rows) : ?>
                    <option value="<?=$rows->id?>" <?=(($params['cust_import']->material_safety==$rows->id)?'selected':'')?>><?=$rows->name?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label for="imp_coa" class="control-label">COA</label>
            <select name="imp_coa" class="form-control select2bs4 import" id="imp_coa" >
                <option></option>
                <?php foreach($params['import_nonbill'] as $rows) : ?>
                    <option value="<?=$rows->id?>" <?=(($params['cust_import']->coa==$rows->id)?'selected':'')?>><?=$rows->name?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label for="imp_ps" class="control-label">Product spesification</label>
            <select name="imp_ps" class="form-control select2bs4 import" id="imp_ps" >
                <option></option>
                <?php foreach($params['import_nonbill'] as $rows) : ?>
                    <option value="<?=$rows->id?>" <?=(($params['cust_import']->prod_spec==$rows->id)?'selected':'')?>><?=$rows->name?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label for="imp_others" class="control-label">Others</label>
            <input type="text" name="imp_others" class="form-control import" id="imp_others" autocomplete="off" value="<?=$params['cust_import']->others?>">
        </div>
    </div>
</div>