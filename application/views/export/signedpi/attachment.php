<div class="card">
    <div class="card-header">
        <h6><i class="fas fa-list-alt mr-2"></i><?=$header?></h6>
    </div>
    <div class="card-body">
        <table id="tattachmentlist" class="table table-sm table-bordered table-striped">
            <thead>
                <tr class="text-center">
                    <th>#</th>
                    <th>Date</th>
                    <th>Convert file name</th>
                    <th>Created at</th>
                    <th><i class="fas fa-ellipsis-h"></i></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $no=1; 
                    foreach($params['list'] as $rows) : 
                        $values = explode("/",$rows->values);
                ?>
                    <tr class="align-middle text-center">
                        <td><?=$no?>.</td>
                        <td><?=$rows->dates?></td>
                        <td><?=$values[3]?></td>
                        <td><?=$rows->created_at?></td>
                        <td>
                            <a href="<?=base_url($rows->values)?>" class="btn btn-sm btn-info" target="_blank">
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