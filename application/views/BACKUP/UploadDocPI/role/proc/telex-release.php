<form method="POST" action="<?php echo base_url('MenuDocPI/upload29/'.$getrowspi_value->sign_pi_noid); ?>" enctype="multipart/form-data" class="form-pi">
    <div class="form-group">
        <div class="col-md-1">
            <?php if($getrowspi_value->sign_telex_release=='1'){ ?>
                    <span class="btn btn-success"></span>
            <?php }else{ ?>
                    <span class="btn btn-warning"></span>
            <?php } ?>
        </div>
        <label class="col-md-2" for="inputDefault">Telex Release</label>
        <div class="col-md-3"></div>
        <div class="col-md-2">
            <input type="date" class="form-control" name="date29" id="inputDefault" value="<?php echo $getrowspi_value->sign_telex_release_date ?>" <?=($groupname->GroupDesc == 'PROCUREMENT'?'':'disabled')?> required>
        </div>
        <div class="col-md-2">
            <select id="basic" class="form-control" name="telexrelease_val" <?=($groupname->GroupDesc == 'PROCUREMENT'?'':'disabled')?> required>
                    <option value="">-- Pilih --</option>
            </select>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn btn-success" <?=($groupname->GroupDesc == 'PROCUREMENT'?'':'disabled')?> ><i class="fa fa-save"></i> Save</button>
        </div>
    </div>
</form>