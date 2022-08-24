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
            <h6>Contact person ship-to</h6>
        </div>
        <div class="card-body">
            <?php $this->load->view('export/customer/add/cpshipto'); ?>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h6>Import document needs</h6>
        </div>
        <div class="card-body">
            <?php $this->load->view('export/customer/add/import'); ?>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h6>Coding printing</h6>
        </div>
        <div class="card-body">
            <?php $this->load->view('export/customer/add/coding'); ?>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <a class="btn btn-default btn-block" href="<?=site_url('export/customer')?>">
                        <i class="fas fa-ban mr-2"></i>Cancel
                    </a>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-success save btn-block">
                        <i class="fas fa-save mr-2"></i>Save
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>