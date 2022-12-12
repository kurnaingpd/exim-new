<form id="form-customer-add">
    <div style="max-height: 650px; overflow-x: hidden;">
        <div class="card">
            <div class="card-header">
                <b><u>Consignee</u></b>
            </div>
            <div class="card-body">
                <?php $this->load->view('export/customer/add/consignee'); ?>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <b><u>Notify</u></b>
            </div>
            <div class="card-body">
                <?php $this->load->view('export/customer/add/notify'); ?>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <b><u>Contact person</u></b>
            </div>
            <div class="card-body">
                <?php $this->load->view('export/customer/add/cp'); ?>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <b><u>Bank account</u></b>
            </div>
            <div class="card-body">
                <?php $this->load->view('export/customer/add/bank'); ?>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <b><u>Ship-to address</u></b>
            </div>
            <div class="card-body">
                <?php $this->load->view('export/customer/add/shipto'); ?>
            </div>
            <input type="hidden" id="count">
        </div>

        <div class="card">
            <div class="card-header">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="cpshipto" name="cpshipto">
                    <label class="form-check-label" for="cpshipto"><b><u>Contact person ship-to</u></b></label>
                </div>
            </div>
            <div class="card-body">
                <?php $this->load->view('export/customer/add/cpshipto'); ?>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="freight" name="freight">
                    <label class="form-check-label" for="freight"><b><u>Freight</u></b></label>
                </div>
            </div>
            <div class="card-body">
                <?php $this->load->view('export/customer/add/freight'); ?>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="import_doc" name="import_doc">
                    <label class="form-check-label" for="import"><b><u>Import document needs</u></b></label>
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
                    <label class="form-check-label" for="coding"><b><u>Coding printing</u></b></label>
                </div>
            </div>
            <div class="card-body">
                <?php $this->load->view('export/customer/add/coding'); ?>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <a class="btn btn-default btn-block cancel" href="<?=site_url('export/master/customer')?>">
                        <i class="fas fa-arrow-left mr-2"></i>Back
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