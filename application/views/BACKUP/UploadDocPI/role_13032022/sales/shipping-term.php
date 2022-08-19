<form method="POST" action="<?php echo base_url('MenuDocPI/upload06/'.$getrowspi_value->sign_pi_noid); ?>" enctype="multipart/form-data" class="form-pi">
    <div class="form-group">
        <div class="col-md-1">
            <?php if($getrowspi_value->sign_shipping_term=='1'){ ?>
                    <span class="btn btn-success"></span>
            <?php }else{ ?>
                    <span class="btn btn-warning"></span>
            <?php } ?>
        </div>
        <label class="col-md-2" for="inputDefault">Shipping Term</label>
        <div class="col-md-3"></div>
        <div class="col-md-2">
            <?php if($getrowspi_value->sign_shipping_term=='1'){ ?>
                <input type="date" class="form-control" name="date06" value="<?php echo $getrowspi_value->sign_shipping_term_date ?>" id="inputDefault" <?=($groupname->GroupDesc == 'SALES'?'':'disabled')?> >
            <?php }else{ ?>
                <input type="date" class="form-control" name="date06" id="inputDefault" <?=($groupname->GroupDesc == 'SALES'?'':'disabled')?> >
            <?php } ?>
        </div>
        <div class="col-md-2">
            <?php if($getrowspi_value->sign_shipping_term=='1'){ ?>
                <select id="basic" data-plugin-selectTwo class="form-control" name="shipterm">
                        <option value="<?php echo $getrowspi_value->sign_shipping_term_value ?>">Selected :<?php echo $getrowspi_value->sign_shipping_term_value ?></option>
                        <option value="FOB">FOB</option>
                        <option value="CIF">CIF</option>
                </select>
            <?php }else{ ?>
                <select id="basic" data-plugin-selectTwo class="form-control" name="shipterm" <?=($groupname->GroupDesc == 'SALES'?'':'disabled')?> >
                        <option value="">-- Pilih --</option>
                        <option value="FOB">FOB</option>
                        <option value="CIF">CIF</option>
                </select>
            <?php } ?>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn btn-success" <?=($groupname->GroupDesc == 'SALES'?'':'disabled')?> ><i class="fa fa-save"></i> Save</button>
        </div>
    </div>
</form>