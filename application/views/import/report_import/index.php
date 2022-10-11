<!-- <div class="card">
    <div class="card-header">
        <h6><i class="fas fa-filter mr-2"></i><?=$header?></h6>
    </div>
    <div class="card-body">
        <?php $this->load->view('import/report_import/filter') ?>
    </div>
</div> -->

<div class="card">
    <div class="card-header">
        <h6><i class="fas fa-list-alt mr-2"></i>Report import(s) list</h6>
    </div>
    <div class="card-body">
        <?php $this->load->view('import/report_import/list') ?>
    </div>
    <div class="card-footer">
        <div class="float-right">
            <small>Page rendered in <strong>{elapsed_time}</strong> seconds.</small>
        </div>
    </div>
</div>