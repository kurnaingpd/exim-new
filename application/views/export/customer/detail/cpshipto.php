<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="cpshipto_name" class="control-label">Name</label>
            <input type="text" name="cpshipto_name" class="form-control upper cpship" id="cpshipto_name" placeholder="Enter name" autocomplete="off" value="<?=($params['cust_cpship']?$params['cust_cpship']->name:'-')?>">
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="cpshipto_phone" class="control-label">Phone number</label>
            <input type="text" name="cpshipto_phone" class="form-control cpship" id="cpshipto_phone" placeholder="Enter phone number" autocomplete="off" value="<?=($params['cust_cpship']?$params['cust_cpship']->phone:'-')?>">
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="cpshipto_email" class="control-label">Email</label>
            <input type="text" name="cpshipto_email" class="form-control cpship" id="cpshipto_email" placeholder="Enter email" autocomplete="off" value="<?=($params['cust_cpship']?$params['cust_cpship']->email:'-')?>">
        </div>
    </div>
</div>