<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?=$title?> | PORTAL</title>

        <!-- Icon title -->
        <link rel="shortcut icon" href="<?php echo base_url('assets/images/inventory/logo-gonusa.png');?>">
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="<?=base_url('assets/adminlte/plugins/fontawesome-free/css/all.min.css')?>">
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
    <body class="hold-transition layout-top-nav">
        <div class="wrapper">
            <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
                <div class="container" style="max-width: 99%;">
                    <a href="<?=site_url('home')?>" class="navbar-brand ml-2">
                        <img src="<?=base_url('assets/images/inventory/gexim.png')?>" class="brand-image" style="opacity: .8">
                    </a>

                    <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="">
                                <i class="fas fa-user mr-2"></i>Hi, <?=$this->session->userdata('logged_in')->username?>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="<?=site_url('logout')?>">
                                <i class="fas fa-sign-out-alt mr-2"></i>Sign out
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="content-wrapper">
                <div class="content-header">
                    <div class="content">
                        <div class="container" style="max-width: 99%;">
                            <div class="row mt-3">
                                <div class="col-md-1">
                                    <a href="<?=site_url()?>" class="btn btn-block btn-warning text-center">
                                        <i class="fas fa-arrow-left mr-1"></i> Back to module
                                    </a>
                                </div>

                                <div class="col-md-11">
                                    <div class="row mb-2">
                                        <div class="col-sm-12">
                                            <ol class="breadcrumb float-sm-right">
                                            <li class="breadcrumb-item"><a href="#"><?=$breadcrumb[0]?></a></li>
                                            <li class="breadcrumb-item"><a href="#"><?=$breadcrumb[1]?></a></li>
                                            <?php if(isset($breadcrumb[2])) : ?>
                                                <li class="breadcrumb-item active"><?=$breadcrumb[2]?></li>
                                            <?php endif; ?>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                                $CI =& get_instance();
                                $CI->load->model(['M_CRUD']);
                                $groups = array();
                                $module = $this->uri->segment(1);
                                $group = $CI->M_CRUD->readData('view_trans_assign_group', ['role_id' => $this->session->userdata('logged_in')->role_id, 'menu_module_url' => $module]);
                                foreach($group as $cont => $value_1)
                                {
                                    $groups[$value_1->menu_group_id] = $value_1;
                                }
                            ?>
                            <div class="row mt-3">
                                <?php foreach($groups as $grp => $rows_1) : ?>
                                    <div class="col-md-2">
                                        <div class="card">
                                            <div class="card-body text-center">
                                                <img src="<?=base_url('assets/images/inventory/'.$rows_1->menu_group_image)?>" class="brand-image" style="height: 150px;">
                                            </div>
                                            <div class="card-footer border-top">
                                                <a href="<?=site_url($module.'/'.$rows_1->menu_group_url)?>" class="btn btn-block btn-default">
                                                    <?=$rows_1->menu_group_name?>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="main-footer">
                <div class="float-right d-none d-sm-inline mr-4"><b>System Version</b> 1.1.0</div>
                <div class="ml-1">
                    <strong>
                        Copyright &copy; <?=date('Y')?>. 
                        <a href="https://gonusa-distribusi.com/" target="_blank">
                            PT. Gonusa Prima Distribusi.
                        </a>
                    </strong> All rights reserved.
                </div>
            </footer>
        </div>

        <!-- jQuery -->
        <script src="<?=base_url('assets/adminlte/plugins/jquery/jquery.min.js')?>"></script>
        <!-- Bootstrap 4 -->
        <script src="<?=base_url('assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
        <!-- AdminLTE App -->
        <script src="<?=base_url('assets/adminlte/dist/js/adminlte.min.js')?>"></script>
        <!-- Load JavaScript -->
        <?php
            if ( isset($js) ){
                foreach($js as $rows)
                    echo "<script src=\"{$rows}\"></script>\n";		
            }
        ?>
    </body>
</html>