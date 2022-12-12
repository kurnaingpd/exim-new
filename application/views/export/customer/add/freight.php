<div class="row">
    <div class="col-md-4">
        <div id="required" class="form-group">
            <label for="company" class="control-label">Company</label>
            <input type="text" name="freight_company" class="form-control upper frei" id="freight_company" placeholder="Enter company" autocomplete="off" autofocus disabled>
        </div>
    </div>

    <div class="col-md-4">
        <div id="required" class="form-group">
            <label for="contact" class="control-label">Company contact</label>
            <input type="text" class="form-control frei upper" id="freight_contact" name="freight_contact" placeholder="Enter company contact" autocomplete="off" disabled>
        </div>
    </div>

    <div class="col-md-4">
        <div id="required" class="form-group">
            <label for="number" class="control-label">Company no.</label>
            <div class="input-group">
                <div class="input-group-append">
                    <div class="input-group-text"><i class="fa fa-phone-alt"></i></div>
                </div>
                <input type="text" class="form-control frei" id="freight_number" name="freight_number" placeholder="Enter company no." autocomplete="off" pattern="^[0-9+]+$" disabled>
            </div>
        </div>
    </div>
</div>