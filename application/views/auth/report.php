<div class="card">
    <div class="card-header">
        <h6><i class="fas fa-list-alt mr-2"></i><?=$header?></h6>
    </div>
    <div class="card-body">
        <table id="tloglist" class="table table-sm table-bordered table-striped">
            <thead>
                <tr class="text-center">
                    <th>#</th>
                    <th>Fullname</th>
                    <th>Role</th>
                    <th>Position</th>
                    <th>Status</th>
                    <th>Created at</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; foreach($params['list'] as $rows) : ?>
                    <tr class="align-middle">
                        <td class="text-center"><?=$no?>.</td>
                        <td><?=$rows->fullname?></td>
                        <td><?=$rows->role_name?></td>
                        <td><?=$rows->position_name?></td>
                        <td class="text-center"><?=$rows->flags?></td>
                        <td class="text-center"><?=$rows->created_at?></td>
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