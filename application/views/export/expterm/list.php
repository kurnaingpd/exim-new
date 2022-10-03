<div class="card">
    <div class="card-header">
        <h6><i class="fas fa-list-alt mr-2"></i><?=$header?></h6>
    </div>
    <div class="card-body">
        <table id="texptermlist" class="table table-sm table-bordered table-striped">
            <thead>
                <tr class="text-center">
                    <th>#</th>
                    <th>Export terms no.</th>
                    <th>PI number</th>
                    <th>PI date</th>
                    <th>Customer</th>
                    <th>Country</th>
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
                        <td class="text-center"><?=$rows->pi_no?></td>
                        <td><?=$rows->pi_date?></td>
                        <td><?=$rows->cust_name?></td>
                        <td><?=$rows->country_name?></td>
                        <td class="text-center">
                            <span class="badge bg-<?=$rows->bg_color?>"><?=$rows->pi_status_name?></span>
                        </td>
                        <td class="text-center"><?=$rows->created_at?></td>
                        <td class="text-center"><?=($rows->updated_at?$rows->updated_at:'-')?></td>
                        <td class="text-center">
                            <a href="<?=site_url('export/expterm/detail/'.$rows->pi_id)?>" class="btn btn-sm btn-info">
                                <i class="fas fa-file-alt"></i>
                            </a>

                            <?php 
                                if($rows->pi_status_id) {
                                    $display_upload = 'style="display: none;"';
                                    $display_download = '';
                                    
                                    if($this->session->userdata('logged_in')->role_id == 5) {
                                        if($rows->pi_status_id == 1) {
                                            $display = 'style="display: none;"';
                                        } elseif($rows->pi_status_id == 5) {
                                            $display = 'style="display: none;"';
                                        } elseif($rows->pi_status_id == 6) {
                                            $display = '';
                                        } elseif($rows->pi_status_id == 7) {
                                            $display = '';
                                        }
                                    } elseif($this->session->userdata('logged_in')->role_id == 3) {
                                        // $display_upload = 'style="display: none;"';
                                        if($rows->pi_status_id == 1) {
                                            $display = '';
                                        } elseif($rows->pi_status_id == 5) {
                                            $display = 'style="display: none;"';
                                        } elseif($rows->pi_status_id == 6) {
                                            $display = 'style="display: none;"';
                                        } elseif($rows->pi_status_id == 7) {
                                            $display = 'style="display: none;"';
                                        }
                                    }
                                } else {
                                    $display = 'style="display: none;"';
                                    $display_upload = '';
                                    $display_download = 'style="display: none;"';
                                }

                                if($this->session->userdata('logged_in')->role_id == 3) {
                                    $display_upload = 'style="display: none;"';
                                }
                            ?>

                            <a href="<?=site_url('export/expterm/add/'.$rows->pi_id)?>" class="btn btn-sm btn-warning" <?=$display_upload?>>
                                <i class="fas fa-upload"></i>
                            </a>

                            <a href="<?=site_url('export/expterm/process/'.$rows->pi_id)?>" class="btn btn-sm btn-warning" <?=$display?>>
                                <i class="fas fa-edit"></i>
                            </a>

                            <a href="<?=base_url('assets/attachment/expterm/'.$rows->file)?>" class="btn btn-sm btn-success" target="_blank" <?=$display_download?>>
                                <i class="fas fa-download"></i>
                            </a>
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