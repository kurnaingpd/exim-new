<form method="POST" action="<?php echo base_url('MenuDocPI/upload03/'.$getrowspi_value->sign_pi_noid); ?>" enctype="multipart/form-data" class="form-pi">
    <div class="form-group">
        <div class="col-md-1">
        <?php if($getrowspi_value->sign_pi_top=='1'){ ?>
                <span class="btn btn-success"></span>
        <?php }else{ ?>
                <span class="btn btn-warning"></span>
        <?php } ?>
        </div>
        <label class="col-md-2" for="inputDefault">TOP</label>
        <div class="col-md-3"> </div>
        <div class="col-md-2">
            <?php if($getrowspi_value->sign_pi_top=='1'){ ?>
                <input type="date" name="date03" value="<?php echo $getrowspi_value->sign_pi_top_date ?>" class="form-control" id="inputDefault" <?=($groupname->GroupDesc == 'FINANCE'?'':'disabled')?> required>
            <?php }else{ ?>
                <input type="date" name="date03" class="form-control" id="inputDefault" <?=($groupname->GroupDesc == 'FINANCE'?'':'disabled')?> required>
            <?php } ?>
        </div>
        <div class="col-md-2">
            <?php if($getrowspi_value->sign_pi_top=='1'){ ?>
                <select id="basic" class="form-control" name="top" <?=($groupname->GroupDesc == 'FINANCE'?'':'disabled')?> required>
                        <option value="<?php echo $getrowspi_value->sign_pi_top_value ?>"> Selected : <?php echo $getrowspi_value->sign_pi_top_value ?></option>
                        <option value="TOP 30 DAYS">TOP 30 DAYS</option>
                        <option value="TOP 45 DAYS">TOP 45 DAYS</option>
                        <option value="TOP 90 DAYS">TOP 90 DAYS</option>
                </select>
            <?php }else{ ?>
                <select id="basic" class="form-control" name="top" <?=($groupname->GroupDesc == 'FINANCE'?'':'disabled')?> required>
                        <option value="">-- Pilih --</option>
                        <option value="TOP 30 DAYS">TOP 30 DAYS</option>
                        <option value="TOP 45 DAYS">TOP 45 DAYS</option>
                        <option value="TOP 90 DAYS">TOP 90 DAYS</option>
                </select>
            <?php } ?>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn btn-success" <?=($groupname->GroupDesc == 'FINANCE'?'':'disabled')?> ><i class="fa fa-save"></i> Save</button>
            <?php if($getrowspi_value->sign_pi_top=='1'){ ?>
            <a href="<?php echo base_url('MenuDocPI/download03/'.$getrowspi_value->sign_pi_noid); ?>" class="btn btn btn-info"><i class="fa fa-download"></i></a>
        <?php }else{ ?>
            <button type="submit" class="btn btn btn-info" disabled><i class="fa fa-download"></i></button>
        <?php } ?>
        </div>
    </div>
</form>