<form id="form-proforma-detail">
    <div class="card">
        <div class="card-header">
            <h6><i class="fas fa-plus-circle mr-2"></i><?=$header?></h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group required">
                        <label for="pi_status" class="control-label">PI status</label>
                        <input type="text" name="pi_status" class="form-control" id="pi_status" value="<?=$params['detail']->pi_status?>" disabled>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group required">
                        <label for="pi_code" class="control-label">PI no.</label>
                        <input type="text" name="pi_code" class="form-control" id="pi_code" value="<?=$params['detail']->pi_no?>" disabled>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group required">
                        <label for="pi_date" class="control-label">PI date</label>
                        <input type="text" name="pi_date" class="form-control" id="pi_date" value="<?=$params['detail']->pi_date?>" disabled>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="pi_po" class="control-label">PO # (If any)</label>
                        <input type="text" name="pi_po" class="form-control" id="pi_po" value="<?=$params['detail']->po_no?>" disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h6>Consignee</h6>
        </div>
        <div class="card-body">
            <?php $this->load->view('export/proforma/detail/consignee'); ?>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h6>Beneficiary</h6>
        </div>
        <div class="card-body">
            <?php $this->load->view('export/proforma/detail/beneficiary'); ?>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h6>Datas</h6>
        </div>
        <div class="card-body">
            <?php $this->load->view('export/proforma/detail/data'); ?>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h6>Item(s)</h6>
        </div>
        <div class="card-body">
            <?php $this->load->view('export/proforma/detail/items'); ?>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h6>Summary</h6>
        </div>
        <div class="card-body">
            <?php $this->load->view('export/proforma/detail/summary'); ?>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="remark" class="control-label">Remark</label>
                        <textarea name="remark" class="form-control upper" id="remark" placeholder="Enter remark" readonly rows="2"></textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <a class="btn btn-default btn-block cancel" href="<?=site_url('export/proforma')?>">
                        <i class="fas fa-ban mr-2"></i>Exit
                    </a>
                </div>
            </div>
        </div>
    </div>
</form>