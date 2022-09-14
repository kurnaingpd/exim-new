<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?=$title?> | EXIM</title>

        <!-- Icon title -->
        <link rel="shortcut icon" href="<?php echo base_url('assets/images/inventory/logo-gonusa.png');?>">
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?=base_url('assets/adminlte/plugins/fontawesome-free/css/all.min.css')?>">
        <!-- icheck bootstrap -->
        <!-- <link rel="stylesheet" href="<?=base_url('assets/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css')?>"> -->
        <!-- Theme style -->
        <link rel="stylesheet" href="<?=base_url('assets/adminlte/dist/css/adminlte.min.css')?>">
        <!-- Load CSS -->
        <?php
            if ( isset($css) ){
                foreach($css as $rows){
                    $exp = explode(",", $rows);
                    echo "<link type=\"{$exp[0]}\" rel=\"{$exp[1]}\" href=\"{$exp[2]}\" />\n";
                }
            }
        ?>
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="card card-outline card-primary">
                <div class="card-header text-center">
                    <img src="<?=base_url('assets/images/inventory/logo-gonusa-full.png')?>" class="brand-image" width="50%">
                </div>
                <div class="card-body">
                    <p class="login-box-msg">Sign in to start your session</p>
                    <form id="form-login">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Username" id="username" name="username" autocomplete="off" required autofocus>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                            <div class="invalid-feedback">

                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="Password" id="password" name="password" autocomplete="off" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block" id="btnLogin">
                                    <i class="fas fa-save mr-1"></i> Sign In
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- jQuery -->
        <script src="<?=base_url('assets/adminlte/plugins/jquery/jquery.min.js')?>"></script>
        <!-- Bootstrap 4 -->
        <script src="<?=base_url('assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
        <!-- AdminLTE App -->
        <script src="<?=base_url('assets/adminlte/dist/js/adminlte.min.js')?>"></script>
        <script>var site_url = "<?=site_url()?>";</script>
        <!-- Form Validation -->
        <script src="<?=base_url("assets/adminlte/plugins/jquery-validation/jquery.validate.min.js")?>"></script>
        <script src="<?=base_url("assets/adminlte/plugins/jquery-validation/additional-methods.min.js")?>"></script>
        <!-- SweetAlert -->
        <script src="<?=base_url('assets/adminlte/plugins/sweetalert/sweetalert.min.js')?>"></script>
        <!-- Load JavaScript -->
        <?php
            if ( isset($js) ){
                foreach($js as $rows)
                    echo "<script src=\"{$rows}\"></script>\n";		
            }
        ?>
    </body>
</html>