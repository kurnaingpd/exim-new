<form id="form-expterms-process">
    <input type="hidden" id="expterm_id" name="expterm_id" value="<?=$params['term']->id?>">
    <input type="hidden" id="pi_id" name="pi_id" value="<?=$params['term']->pi_id?>">
    <div class="row">
        <div class="col-md-9">
            
        <div class="card">
            <div class="card-header">
                <h6><i class="fas fa-plus-circle mr-2"></i><?=$header?></h6>
            </div>
            <div class="card-body overflow-auto" style="max-height: 650px; overflow-x: hidden;">
                <div class="card">
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
            </div>
        </div>

        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h6><i class="fas fa-cog mr-2"></i></i>Action</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group required">
                                <label for="status" class="control-label">Status</label>
                                <select class="form-control select2bs4" id="status" name="status" required>
                                    <option></option>
                                    <?php foreach($status as $rows) : ?>
                                        <option value="<?=$rows->id?>"><?=$rows->name?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <?php if($params['term']->pi_status_id == 7) : ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group required">
                                    <label for="attachment" class="control-label">Upload export terms</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="attachment" name="attachment" accept="application/pdf" autofocus autocomplete="off" required>
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group" id="required">
                                <label for="remark" class="control-label">Remark</label>
                                <textarea name="remark" class="form-control upper" id="remark" placeholder="Enter remark" rows="4" readonly></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <a class="btn btn-default btn-block cancel" href="#" onclick="history.go(-1)">
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
        </div>
    </div>
</form>