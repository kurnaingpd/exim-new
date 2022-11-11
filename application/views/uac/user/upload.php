<div class="card">
    <div class="card-header">
        <h6><i class="fas fa-info mr-2"></i><?=$header?></h6>
    </div>
    <div class="card-body">
        <form id="form-user-upload">
            <input type="hidden" id="id" name="id" value="<?=$params['detail']->id?>">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="fullname" class="control-label">Fullname</label>
                        <input type="text" name="fullname" class="form-control" id="fullname" placeholder="Enter fullname" disabled value="<?=$params['detail']->fullname?>">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control no-space lower" id="username" placeholder="Enter username" disabled value="<?=$params['detail']->username?>">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control no-space lower" id="email" placeholder="Enter email" disabled value="<?=$params['detail']->email?>">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select class="form-control select2bs4" id="role" name="role" disabled>
                            <option></option>
                            <?php foreach($params['role'] as $rows) : ?>
                                <option value="<?=$rows->id?>" <?=($rows->id==$params['detail']->role_id?'selected':'')?>><?=$rows->name?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group required">
                        <label for="password" class="control-label">Upload signature</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="attachment" name="attachment" accept="image/*" autofocus autocomplete="off" required>
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <a class="btn btn-block btn-default cancel" href="<?=site_url('uac/user')?>">
                        <i class="fas fa-ban mr-2"></i>Cancel
                    </a>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-block btn-success save">
                        <i class="fas fa-save mr-2"></i>Save
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="card-footer">
        <div class="float-right">
            <small>Page rendered in <strong>{elapsed_time}</strong> seconds.</small>
        </div>
    </div>
</div>