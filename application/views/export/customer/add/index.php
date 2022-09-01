<form id="form-customer-add">
    <div class="card">
        <div class="card-header">
            <h6>Consignee</h6>
        </div>
        <div class="card-body">
            <?php $this->load->view('export/customer/add/consignee'); ?>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h6>Notify</h6>
        </div>
        <div class="card-body">
            <?php $this->load->view('export/customer/add/notify'); ?>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h6>Contact person</h6>
        </div>
        <div class="card-body">
            <?php $this->load->view('export/customer/add/cp'); ?>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h6>Bank account</h6>
        </div>
        <div class="card-body">
            <?php $this->load->view('export/customer/add/bank'); ?>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h6>Ship-to address</h6>
        </div>
        <div class="card-body">
            <?php $this->load->view('export/customer/add/shipto'); ?>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="cpshipto" name="cpshipto">
                <label class="form-check-label" for="cpshipto">Contact person ship-to</label>
            </div>
        </div>
        <div class="card-body">
            <?php $this->load->view('export/customer/add/cpshipto'); ?>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="import_doc" name="import_doc">
                <label class="form-check-label" for="import">Import document needs</label>
            </div>
        </div>
        <div class="card-body">
            <?php $this->load->view('export/customer/add/import'); ?>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="coding_print" name="coding_print">
                <label class="form-check-label" for="coding">Coding printing</label>
            </div>
        </div>
        <div class="card-body">
            <?php $this->load->view('export/customer/add/coding'); ?>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <a class="btn btn-default btn-block cancel" href="<?=site_url('export/customer')?>">
                        <i class="fas fa-ban mr-2"></i>Cancel
                    </a>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-success save btn-block" id="btn-customer-save">
                        <i class="fas fa-save mr-2"></i>Save
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>