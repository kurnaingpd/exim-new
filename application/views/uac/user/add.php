<div class="card">
    <div class="card-header">
        <h6><i class="fas fa-list-alt mr-2"></i><?=$header?></h6>
    </div>
    <div class="card-body">
        <form id="form-user-add">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group required">
                        <label for="fullname" class="control-label">Fullname</label>
                        <input type="text" name="fullname" class="form-control" id="fullname" placeholder="Enter fullname" autocomplete="off" autofocus required>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group required">
                        <label for="username" class="control-label">Username</label>
                        <input type="text" name="username" class="form-control no-space lower" id="username" placeholder="Enter username" autocomplete="off" required>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group required">
                        <label for="username" class="control-label">Email</label>
                        <input type="email" name="email" class="form-control no-space lower" id="email" placeholder="Enter email" autocomplete="off" required>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group required">
                        <label for="role" class="control-label">Role</label>
                        <select class="form-control select2bs4" id="role" name="role" required>
                            <option></option>
                            <?php foreach($params['role'] as $rows) : ?>
                                <option value="<?=$rows->id?>"><?=$rows->name?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group required">
                        <label for="password" class="control-label">Password</label>
                        <input type="password" name="password" class="form-control no-space" id="password" placeholder="Enter password" autocomplete="off" required>
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