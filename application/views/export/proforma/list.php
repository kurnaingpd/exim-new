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
                    <th>Remarks</th>
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
                        <td><?=$rows->remarks?></td>
                        <td class="text-center">
                            <span class="badge bg-<?=$rows->bg_color?>"><?=$rows->status_name?></span>
                        </td>
                        <td class="text-center"><?=$rows->created_at?></td>
                        <td class="text-center"><?=($rows->updated_at?$rows->updated_at:'-')?></td>
                        <td class="text-center">
                            <!-- 
                            <a href="<?=site_url('export/proforma/print/'.$rows->id)?>" class="btn btn-sm btn-success" target="_blank">
                                <i class="fas fa-print"></i>
                            </a>
                            -->
                                                        
                            <?php if($rows->pi_status_id == 8 && $this->session->userdata('logged_in')->role_id == 3) : ?>
                                <a href="<?=site_url('export/proforma/detail/'.$rows->id)?>" class="btn btn-sm btn-info">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <button class="btn btn-sm btn-success" id="submit" data-id="<?=$rows->id?>">
                                    <i class="fas fa-check"></i>
                                </button>
                            <?php else : ?>
                                <?php if($rows->pi_status_id == 5 && $this->session->userdata('logged_in')->role_id == 3) : ?>
                                    <a href="<?=site_url('export/proforma/requests/'.$rows->id)?>" class="btn btn-sm btn-warning">
                                        <!-- <i class="fas fa-edit"></i> -->
                                        <i class="fas fa-recycle"></i>
                                    </a>
                                <?php elseif($rows->pi_status_id == 5 && $this->session->userdata('logged_in')->role_id == 7) : ?>
                                    <a href="<?=site_url('export/proforma/edit/'.$rows->id)?>" class="btn btn-sm btn-warning">
                                        <!-- <i class="fas fa-edit"></i> -->
                                        <i class="fas fa-user-edit"></i>
                                    </a>
                                <?php endif ?>
                                
                                <?php if($this->session->userdata('logged_in')->role_id == 3) : ?>
                                    <?php if($rows->pi_status_id <> 1 && $rows->pi_status_id <> 5 && $rows->pi_status_id <> 6) : ?>
                                        <a href="<?=site_url('export/proforma/process/'.$rows->id)?>" class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    <?php endif; ?>
                                <?php elseif($this->session->userdata('logged_in')->role_id == 4) : ?>
                                    <?php if($rows->pi_status_id == 1 || $rows->pi_status_id == 6) : ?>
                                        <a href="<?=site_url('export/proforma/process/'.$rows->id)?>" class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    <?php endif; ?>
                                <?php endif; ?>
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