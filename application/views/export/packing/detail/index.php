<form id="form-packing-detail">
    <input type="hidden" id="id" name="id" value="<?=$params['detail']->id?>">
    <div class="card">
        <div class="card-header">
            <h6><i class="fas fa-plus-circle mr-2"></i><?=$header?></h6>
        </div>
        <div class="card-body overflow-auto" style="max-height: 650px; overflow-x: hidden;">
            <div class="card">
                <div class="card-body">
                    <?php $this->load->view('export/packing/detail/header'); ?>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <i class="fas fa-list-alt mr-2"></i>Consignee
                </div>
                <div class="card-body">
                    <?php $this->load->view('export/packing/detail/consignee'); ?>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <i class="fas fa-list-alt mr-2"></i>Notify
                </div>
                <div class="card-body">
                    <?php $this->load->view('export/packing/detail/notify'); ?>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <i class="fas fa-list-alt mr-2"></i>Shipper
                </div>
                <div class="card-body">
                    <?php $this->load->view('export/packing/detail/shipper'); ?>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div>
                            <i class="fas fa-list-alt mr-2"></i>Item
                        </div>

                        <div>
                            <div class="d-flex justify-content-end">
                                <div class="mr-3">
                                    <div class="form-group">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input check" type="checkbox" id="carton" name="carton" data-packing="<?=$params['detail']->id?>" <?=($params['detail']->carton == '1'?'checked':'')?>>
                                            <label class="form-check-label" for="carton">Carton barcode</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mr-3">
                                    <div class="form-group">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input check" type="checkbox" id="batch" name="batch" data-packing="<?=$params['detail']->id?>" <?=($params['detail']->batch == '1'?'checked':'')?>>
                                            <label class="form-check-label" for="batch">Batch</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mr-3">
                                    <div class="form-group">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input check" type="checkbox" id="expired" name="expired" data-packing="<?=$params['detail']->id?>" <?=($params['detail']->expired == '1'?'checked':'')?>>
                                            <label class="form-check-label" for="expired">Expired date</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mr-3">
                                    <div class="form-group">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input check" type="checkbox" id="production" name="production" data-packing="<?=$params['detail']->id?>" <?=($params['detail']->production == '1'?'checked':'')?>>
                                            <label class="form-check-label" for="production">Production date</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <?php $this->load->view('export/packing/detail/item'); ?>
                </div>
                <div class="card-body">
                    <?php $this->load->view('export/packing/detail/item_detail'); ?>
                </div>
            </div>
        </div>

        <div id="item_qty">
            <?php foreach($chained['qty'] as $rows) : ?>
                <input type="text" id="qty_<?=$rows->id?>" value="<?=$rows->qty_remain?>">
            <?php endforeach; ?>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <a class="btn btn-default btn-block cancel" href="#" onclick="history.go(-1)">
                        <i class="fas fa-ban mr-2"></i>Cancel
                    </a>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-success save btn-block" id="btn-packing-update">
                        <i class="fas fa-save mr-2"></i>Save
                    </button>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="float-right">
                <small>Page rendered in <strong>{elapsed_time}</strong> seconds.</small>
            </div>
        </div>
    </div>
</form>