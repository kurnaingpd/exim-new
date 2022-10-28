<form id="form-customer-detail">
    <div style="max-height: 650px; overflow-x: hidden;">
        <input type="hidden" id="id" name="id" value="<?=$params['customer']->id?>">
        <div class="card">
            <div class="card-header">
                <h6>Consignee</h6>
            </div>
            <div class="card-body">
                <?php $this->load->view('export/customer/detail/consignee'); ?>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h6>Notify</h6>
            </div>
            <div class="card-body">
                <?php $this->load->view('export/customer/detail/notify'); ?>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h6>Contact person</h6>
            </div>
            <div class="card-body">
                <?php $this->load->view('export/customer/detail/cp'); ?>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h6>Bank account</h6>
            </div>
            <div class="card-body">
                <?php $this->load->view('export/customer/detail/bank'); ?>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h6>Ship-to address</h6>
            </div>
            <div class="card-body">
                <?php $this->load->view('export/customer/detail/shipto'); ?>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h6>Contact person ship-to</h6>
            </div>
            <div class="card-body">
                <?php $this->load->view('export/customer/detail/cpshipto'); ?>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h6>Freight</h6>
            </div>
            <div class="card-body">
                <?php $this->load->view('export/customer/detail/freight'); ?>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h6>Import document needs</h6>
            </div>
            <div class="card-body">
                <?php $this->load->view('export/customer/detail/import'); ?>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h6>Coding printing</h6>
            </div>
            <div class="card-body">
                <?php $this->load->view('export/customer/detail/coding'); ?>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <a class="btn btn-default btn-block cancel" href="#" onclick="history.go(-1)">
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