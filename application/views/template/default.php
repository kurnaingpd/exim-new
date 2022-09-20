<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$title?> | EXIM</title>

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/inventory/logo-gonusa.png');?>" >
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
    <style>
        .list-group-item.active {
            z-index: 2;
            color: #fff;
            background-color: transparent;
            border-color: transparent;
            font-weight: bold;
        }

        .list-group-item.active:hover {
            z-index: 2;
            color: #fff;
            background-color: transparent;
            border-color: transparent;
        }

        .form-group.required .control-label:before{
            color: red;
            content: "*";
            margin-right: 2px;
        }
    </style>
    </head>
    <body class="hold-transition sidebar-mini layout-top-nav">
        <div class="wrapper">
            <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
                <div class="container" style="max-width: 99%;">
                    <a href="<?=site_url('home')?>" class="navbar-brand">
                        <img src="<?=base_url('assets/images/inventory/gexim.png')?>" alt="AdminLTE Logo" class="brand-image">
                    </a>

                    <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                                <i class="fas fa-user mr-2"></i>Hi, <?=$this->session->userdata('logged_in')->username?>
                            </a>
                        </li>
                        <li class="nav-item">
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
                        <div class="container" style="max-width: 99%; padding-right: 1%;">
                            <div class="row mt-3">
                                <div class="col-md-2">
                                    <a href="<?=site_url('home')?>" class="btn btn-block btn-warning text-center">
                                        <i class="fas fa-home mr-1"></i> Back to home
                                    </a>
                                </div>

                                <div class="col-md-10">
                                    <div class="row mb-2">
                                        <div class="col-sm-6">
                                            <h3 class="m-0"><small><?=$title?></small></h3>
                                        </div>
                                        <div class="col-sm-6">
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

                            <div class="row mt-3">
                                <div class="col-md-2">
                                    <?php
                                        $CI =& get_instance();
                                        $CI->load->model(['M_CRUD']);
                                        $module = $this->uri->segment(1);
                                        $group = $CI->M_CRUD->assigngroup('view_assign_group', ['role_id' => $this->session->userdata('logged_in')->role_id, 'menu_module_url' => $module]);
                                        $menu = $CI->M_CRUD->assignmenu('view_assign_menu', ['role_id' => $this->session->userdata('logged_in')->role_id, 'menu_module_url' => $module]);
                                    ?>

                                    <?php foreach($group as $grp => $gm) : ?>
                                        <div class="card border">
                                            <div class="card-header" style="background-color: #e6e6e6;">
                                                <i class="<?=$gm['menu_group_icon']?> mr-2"></i><b><?=$gm['menu_group_name']?></b>
                                            </div>
                                            <ul class="list-group list-group-flush">
                                                <div class="overflow-auto" style="max-height: 250px; overflow-y: hidden;">
                                                <?php foreach($menu[$grp] as $val => $sm) : ?>
                                                    <li class="list-group-item">
                                                        <a href="<?=site_url($sm['menu_sub_url'])?>" class="text-secondary">
                                                            <i class="<?=$sm['menu_sub_icon']?> mr-2"></i><?=$sm['menu_sub_name']?>
                                                        </a>
                                                    </li>
                                                <?php endforeach; ?>
                                                </div>
                                            </ul>
                                        </div>
                                    <?php endforeach; ?>
                                </div>

                                <div class="col-md-10">
                                    <?=$contents?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="main-footer">
                <div class="float-right d-none d-sm-inline mr-4"><b>System Version</b> 1.0.0</div>
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

        <script>var base_url = "<?=base_url()?>";</script>
        <script>var site_url = "<?=site_url()?>";</script>
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