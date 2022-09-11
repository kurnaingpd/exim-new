<div class="card">
    <div class="card-header">
        <h6><i class="fas fa-list-alt mr-2"></i><?=$header?></h6>
    </div>
    <div class="card-body">
        <table id="tproformalist" class="table table-sm table-bordered table-striped">
            <thead>
                <tr class="text-center">
                    <th>#</th>
                    <th>PI number</th>
                    <th>PI date</th>
                    <th>Customer</th>
                    <th>Country</th>
                    <th>PIC</th>
                    <th>Status</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th><i class="fas fa-ellipsis-h"></i></th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; foreach($params['list'] as $rows) : ?>
                    <tr class="align-middle">
                        <td class="text-center"><?=$no?>.</td>
                        <td class="text-center"><?=$rows->code?></td>
                        <td class="text-center"><?=$rows->pi_date?></td>
                        <td><?=$rows->customer?></td>
                        <td><?=$rows->country_name?></td>
                        <td><?=$rows->pic?></td>
                        <td class="text-center">
                            <span class="badge bg-<?=$rows->bg_color?>"><?=$rows->status_name?></span>
                        </td>
                        <td class="text-center"><?=$rows->created_at?></td>
                        <td class="text-center"><?=($rows->updated_at?$rows->updated_at:'-')?></td>
                        <td class="text-center">
                            <?php if($this->session->userdata('logged_in')->role_id == 1 || $this->session->userdata('logged_in')->role_id == 2 || $this->session->userdata('logged_in')->role_id == 3) : ?>
                                <a href="<?=site_url('export/proforma/detail/'.$rows->id)?>" class="btn btn-sm btn-info">
                                    <i class="fas fa-file-alt"></i>
                                </a>
                            <?php endif; ?>

                            <?php if($this->session->userdata('logged_in')->role_id == 3) : ?>
                                <a href="<?=site_url('export/proforma/process/'.$rows->id)?>" class="btn btn-sm btn-warning" <?=$rows->display?>>
                                    <i class="fas fa-edit"></i>
                                </a>
                            <?php endif; ?>

                            <?php if($this->session->userdata('logged_in')->role_id == 4) : ?>
                                <a href="<?=site_url('export/proforma/process/'.$rows->id)?>" class="btn btn-sm btn-warning" <?=$rows->display_wh?>>
                                    <i class="fas fa-edit"></i>
                                </a>
                            <?php endif; ?>

                            <a href="<?=site_url('export/proforma/print/'.$rows->id)?>" class="btn btn-sm btn-success" target="_blank">
                                <i class="fas fa-print"></i>
                            </a>

                            <?php if($this->session->userdata('logged_in')->role_id == 1 || $this->session->userdata('logged_in')->role_id == 2 || $this->session->userdata('logged_in')->role_id == 3) : ?>
                                <button class="btn btn-sm btn-danger" id="delete" data-id="<?=$rows->id?>">
                                    <i class="fas fa-trash"></i>
                                </button>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php $no++; endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        <div class="float-right">
            <small>Page rendered in <strong>{elapsed_time}</strong> seconds.</small>
        </div>
    </div>
</div>