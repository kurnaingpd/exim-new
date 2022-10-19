<?php
    $pi_date = date_create($params['detail']->created_at);
    $format_pi_date = date_format($pi_date, "Y-m-d");
?>

<form id="form-proforma-detail">
    <input type="hidden" id="id" name="id" value="<?=$params['detail']->id?>">
    <div class="card">
        <div class="card-header">
            <h6><i class="fas fa-plus-circle mr-2"></i><?=$header?></h6>
        </div>
        <div class="card-body overflow-auto" style="max-height: 650px; overflow-x: hidden;">
            <div class="card">
                
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group required">
                                <label for="pi_code" class="control-label">PI no.</label>
                                <input type="text" name="pi_code" class="form-control" id="pi_code" value="<?=$params['detail']->code?>" disabled>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group required">
                                <label for="pi_date" class="control-label">PI date</label>
                                <input type="text" name="pi_date" class="form-control" id="pi_date" value="<?=$format_pi_date?>" disabled>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="pi_po" class="control-label">PO # (If any)</label>
                                <input type="text" name="pi_po" class="form-control" id="pi_po" placeholder="Enter PO" autocomplete="off" value="<?=$params['detail']->po_no?>" autofocus>
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
                <div class="card-body border-top">
                    <?php $this->load->view('export/proforma/detail/items_detail'); ?>
                </div>
                <div class="card-footer">
                    <small>
                        Maximum CBM: <input type="text" value="<?=$params['detail_value']->max_cbm?>" size="4" id="currenct_cbm" style="background-color: transparent; border: 0;"><br>
                        Remain CBM: <input type="text" value="<?=$params['detail_value']->max_cbm - $params['cbm_value']->cbm?>" id="remain_cbm" style="background-color: transparent; border: 0;">
                    </small>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h6>Coding printing</h6>
                </div>
                <div class="card-body">
                    <?php $this->load->view('export/proforma/detail/coding'); ?>
                </div>
            </div>
        </div>
        <div class="card-body">
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