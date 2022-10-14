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
            <input type="text" name="freight_contact" class="form-control frei" id="freight_contact" placeholder="Enter company contact" oninput="this.value = this.value.replace(/[^0-9+]/g, '').replace(/(\..*?)\..*/g, '$1');" autocomplete="off" disabled>
        </div>
    </div>

    <div class="col-md-4">
        <div id="required" class="form-group">
            <label for="number" class="control-label">Company no.</label>
            <input type="text" name="freight_number" class="form-control frei" id="freight_number" placeholder="Enter company no." oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" autocomplete="off" disabled>
        </div>
    </div>
</div>