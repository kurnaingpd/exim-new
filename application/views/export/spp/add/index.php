<form id="form-spp-add">
    <div class="card">
        <div class="card-header">
            <h6><i class="fas fa-plus-circle mr-2"></i><?=$header?></h6>
        </div>
        <div class="card-body overflow-auto" style="max-height: 650px; overflow-x: hidden;">
            <div class="card">
                <div class="card-body">
                    <?php $this->load->view('export/spp/add/header'); ?>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <i class="fas fa-list-alt mr-2"></i>Item(s)
                </div>
                <div class="card-body">
                    <?php $this->load->view('export/spp/add/item'); ?>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <i class="fas fa-list-alt mr-2"></i>Detail(s)
                </div>
                <div class="card-body">
                    <?php $this->load->view('export/spp/add/grid'); ?>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <i class="fas fa-list-alt mr-2"></i>Information
                </div>
                <div class="card-body">
                    <?php $this->load->view('export/spp/add/notes'); ?>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <a class="btn btn-default btn-block cancel" href="#" onclick="history.go(-1)">
                        <i class="fas fa-ban mr-2"></i>Cancel
                    </a>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-success save btn-block" id="btn-spp-save">
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