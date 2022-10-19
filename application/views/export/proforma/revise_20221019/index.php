<form id="form-proforma-revise">
    <input type="hidden" id="id" name="id" value="<?=$params['detail']->id?>">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h6><i class="far fa-check-circle mr-2"></i></i><?=$header?></h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group required">
                                <label for="pi_status" class="control-label">PI status</label>
                                <input type="text" name="pi_status" class="form-control" id="pi_status" value="<?=$params['detail_value']->pi_status?>" disabled>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group required">
                                <label for="pi_code" class="control-label">PI no.</label>
                                <input type="text" name="pi_code" class="form-control" id="pi_code" value="<?=$params['detail_value']->pi_no?>" disabled>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group required">
                                <label for="pi_date" class="control-label">PI date</label>
                                <input type="text" name="pi_date" class="form-control" id="pi_date" value="<?=$params['detail_value']->pi_date?>" disabled>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="pi_po" class="control-label">PO # (If any)</label>
                                <input type="text" name="pi_po" class="form-control" id="pi_po" value="<?=$params['detail_value']->po_no?>" disabled>
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
                <?php if($params['detail']->pi_status_id == 5 || $params['detail']->pi_status_id == 7) : ?>
                    <div class="card-body">
                        <?php $this->load->view('export/proforma/revise/items_revise'); ?>
                    </div>
                    <div class="card-body border-top">
                        <?php $this->load->view('export/proforma/revise/items_revise_detail'); ?>
                    </div>
                    <div class="card-footer">
                        <small>
                            Maximum CBM: <input type="text" value="<?=$params['detail']->max_cbm?>" size="4" id="currenct_cbm" style="background-color: transparent; border: 0;"><br>
                            Remain CBM: <input type="text" value="<?=$params['detail']->max_cbm - $params['cbm_revise']->cbm?>" id="remain_cbm" style="background-color: transparent; border: 0;">
                        </small>
                    </div>
                <?php else : ?>
                    <div class="card-body">
                        <?php $this->load->view('export/proforma/detail/items'); ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="card">
                <div class="card-header">
                    <h6>Summary</h6>
                </div>
                <div class="card-body">
                    <?php $this->load->view('export/proforma/detail/summary'); ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <a class="btn btn-default btn-block cancel" href="<?=site_url('export/proforma')?>">
                        <i class="fas fa-ban mr-2"></i>Cancel
                    </a>
                </div>

                <div class="col-md-6">
                    <button class="btn btn-success btn-block approved" id="btn-process">
                        <i class="fas fa-save mr-2"></i>Save
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>