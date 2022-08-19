<div class="panel-body">
    <div class="row">
        <div class="col-md-12">
            <table id="table1" class="table table-bordered table-striped mb-none">
                <thead>
                    <tr>
                        <th class="text-center">No.</th>
                        <th class="text-center">Account Name</th>
                        <th class="text-center">Username</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Created At</th>
                        <th class="text-center">Updated At</th>
                        <th class="text-center"><i class="fa fa-gear"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($datas) : ?>
                        <?php $no = 1; foreach($datas as $rows) : ?>
                            <tr>
                                <td class="text-center"><?=$no?></td>
                                <td><?=$rows['user_accountname']?></td>
                                <td><?=$rows['user_username']?></td>
                                <td><?=$rows['user_email']?></td>
                                <td class="text-center"><?=$rows['user_createdAt']?></td>
                                <td class="text-center"><?=$rows['user_updatedAt']?></td>
                                <td class="text-center">
                                    <a class="btn btn-info" href="<?=base_url('UserImport/detail/'.$rows['user_id'])?>">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php $no++; endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>