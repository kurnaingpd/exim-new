<form id="form-proforma-add">
    <div class="card">
        <div class="card-header">
            <h6><i class="fas fa-plus-circle mr-2"></i><?=$header?></h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group required">
                        <label for="pi_code" class="control-label">PI no.</label>
                        <input type="text" name="pi_code" class="form-control" id="pi_code" value="<?=$params['autonumber']?>" readonly>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group required">
                        <label for="pi_date" class="control-label">PI date</label>
                        <input type="text" name="pi_date" class="form-control" id="pi_date" value="<?=date('Y-m-d')?>" disabled>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="pi_po" class="control-label">PO # (If any)</label>
                        <input type="text" name="pi_po" class="form-control" id="pi_po" placeholder="Enter PO" autocomplete="off" autofocus>
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
            <?php $this->load->view('export/proforma/add/consignee'); ?>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h6>Beneficiary</h6>
        </div>
        <div class="card-body">
            <?php $this->load->view('export/proforma/add/beneficiary'); ?>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h6>Datas</h6>
        </div>
        <div class="card-body">
            <?php $this->load->view('export/proforma/add/data'); ?>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h6>Item(s)</h6>
        </div>
        <div class="card-body">
            <?php $this->load->view('export/proforma/add/items'); ?>
        </div>
        <div class="card-body border-top">
            <?php $this->load->view('export/proforma/add/items_detail'); ?>
        </div>
        <div class="card-footer">
            <small>
                Maximum CBM: <input type="text" value="0" size="4" id="currenct_cbm" style="background-color: transparent; border: 0;"><br>
                Remain CBM: <input type="text" value="0" id="remain_cbm" style="background-color: transparent; border: 0;">
            </small>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h6>Coding printing</h6>
        </div>
        <div class="card-body">
            <?php $this->load->view('export/proforma/add/coding'); ?>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="remark" class="control-label">Remark</label>
                        <textarea name="remark" class="form-control upper" id="remark" placeholder="Enter remark" disabled required rows="2"></textarea>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="attachment">Attachment</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="attachment" name="attachment" accept="image/*" required>
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <a class="btn btn-default btn-block cancel" href="<?=site_url('export/proforma')?>">
                        <i class="fas fa-ban mr-2"></i>Cancel
                    </a>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-success save btn-block" id="btn-proforma-save">
                        <i class="fas fa-save mr-2"></i>Save
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>