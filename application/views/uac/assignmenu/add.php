<div class="card">
    <div class="card-header">
        <h6><i class="fas fa-cogs mr-2"></i><?=$header?></h6>
    </div>
    <div class="card-body">
        <form id="form-assign-menu">
            <div class="form-group">
                <label for="menu">Menu</label>
                <select class="form-control select2bs4" id="menu" name="menu" required>
                    <option value="">-- Choose --</option>
                    <?php foreach($params['menu'] as $rows) : ?>
                        <option value="<?=$rows->id?>"><?=$rows->menu_module_name.' - '.$rows->menu_group_name.' - '.$rows->name?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        
            <div class="form-group">
                <label for="role">Role</label>
                <select class="form-control select2bs4" id="role" name="role" required>
                    <option value="">-- Choose --</option>
                    <?php foreach($params['role'] as $rows) : ?>
                        <option value="<?=$rows->id?>"><?=$rows->name?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button class="btn btn-block btn-success save">
                <i class="fas fa-save mr-2"></i>Save
            </button>
        </form>
    </div>
</div>