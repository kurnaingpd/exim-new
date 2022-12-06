<div class="card">
    <div class="card-header">
        <h6><i class="fas fa-list mr-2"></i><?=$table?></h6>
    </div>
    <div class="card-body">
        <table id="tassignmenulist" class="table table-sm table-bordered table-striped">
            <thead>
                <tr class="text-center">
                    <th>#</th>
                    <th>Module name</th>
                    <th>Group name</th>
                    <th>Menu name</th>
                    <th>Assign to role</th>
                    <th>Created at</th>
                    <th><i class="fas fa-ellipsis-h"></i></th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; foreach($params['list'] as $rows) : ?>
                    <tr>
                        <td class="text-center"><?=$no?>.</td>
                        <td class="text-center"><?=$rows->module_name?></td>
                        <td class="text-center"><?=$rows->group_name?></td>
                        <td><?=$rows->menu_sub_name?></td>
                        <td class="text-center"><?=$rows->role_name?></td>
                        <td class="text-center"><?=$rows->created_at?></td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-danger" href="#" data-bs-toggle="tooltip" title="Delete" id="delete" data-id="<?=$rows->id?>">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                <?php $no++; endforeach; ?>
            </tbody>
        </table>
    </div>
</div>