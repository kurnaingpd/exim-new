<form id="form-docpayment-add">
    <div class="card">
        <div class="card-header">
            <h6><i class="fas fa-plus-circle mr-2"></i><?=$header?></h6>
        </div>
        <div class="card-body overflow-auto" style="max-height: 650px; overflow-x: hidden;">
            <div class="card">
                <div class="card-header">
                    <h6><i class="fas fa-list mr-2"></i>Data</h6>
                </div>
                <div class="card-body">
                    <?php $this->load->view('import/docpayment/add-data') ?>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h6><i class="fas fa-list mr-2"></i>Konversi</h6>
                </div>
                <div class="card-body">
                    <?php $this->load->view('import/docpayment/add-konversi') ?>
                </div>
            </div>
            
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <a class="btn btn-block btn-default cancel" href="#" onclick="history.go(-1)">
                        <i class="fas fa-ban mr-2"></i>Cancel
                    </a>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-block btn-success save">
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