<form id="form-packing-container">
    <input type="hidden" id="id" name="id" value="<?=$params['detail']->id?>">
    <div class="card">
        <div class="card-header">
            <h6><i class="fas fa-plus-circle mr-2"></i><?=$header?></h6>
        </div>
        <div class="card-body overflow-auto" style="max-height: 650px; overflow-x: hidden;">
            <div class="card">
                <div class="card-body">
                    <table id="tcontainer" class="table table-sm table-bordered table-striped">
                        <thead>
                            <tr class="text-center align-middle">
                                <th>#</th>
                                <th>Number of container</th>
                                <th><i class="fas fa-ellipsis-h"></i></th>
                            </tr>
                        </thead>
                        <tbody id="show-data">
                            <?php $no=1; foreach($params['container'] as $rows) : ?>
                                <tr class="text-center">
                                    <td><?=$no?>.</td>
                                    <td>
                                        <input type="text" class="form-control cont" id="container_<?=$rows->pi_container_id?>" name="container_<?=$rows->pi_container_id?>" value="<?=$rows->number_of_container?>" style="background-color:transparent;">
                                    </td>
                                    <td>
                                        <button type="button" id="update" class="btn btn-success btn-sm btn-remove" style="cursor:pointer;" data-id="<?=$rows->pi_container_id?>"><i class="fas fa-save"></i></button>
                                    </td>
                                </tr>
                            <?php $no++; endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <div class="card-body">
                    <a class="btn btn-default btn-block cancel" href="#" onclick="history.go(-1)">
                        <i class="fas fa-ban mr-2"></i>Cancel
                    </a>
                </div>
            </div>

            <div class="card-footer">
                <div class="float-right">
                    <small>Page rendered in <strong>{elapsed_time}</strong> seconds.</small>
                </div>
            </div>
        </div>
    </div>
</form>