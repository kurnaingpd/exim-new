<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

        <link rel="shortcut icon" href="<?= base_url(); ?>assets/images/logo-gonusa.png" />
        <link rel="apple-touch-icon" href="<?= base_url(); ?>assets/images/logo-gonusa.png">
		<title>G-EXPORT</title>
		<!-- <meta name="keywords" content="" />
		<meta name="description" content="">
		<meta name="author" content=""> -->

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="<?= base_url(); ?>assets/master/css/master.css" />

        <!-- Vendor CSS -->
		<link rel="stylesheet" href="<?= base_url(); ?>assets/template/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="<?= base_url(); ?>assets/template/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="<?= base_url(); ?>assets/template/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="<?= base_url(); ?>assets/template/vendor/bootstrap-datepicker/css/datepicker3.css" />

		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="<?= base_url(); ?>assets/template/vendor/select2/select2.css" />
		<link rel="stylesheet" href="<?= base_url(); ?>assets/template/vendor/bootstrap-multiselect/bootstrap-multiselect.css" />
		<link rel="stylesheet" href="<?= base_url(); ?>assets/template/vendor/jquery-datatables-bs3/assets/css/datatables.css" />

		<link rel="stylesheet" href="<?= base_url(); ?>assets/template/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css" />
		<link rel="stylesheet" href="<?= base_url(); ?>assets/template/vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.css" />
		<link rel="stylesheet" href="<?= base_url(); ?>assets/template/vendor/bootstrap-timepicker/css/bootstrap-timepicker.css" />
		<link rel="stylesheet" href="<?= base_url(); ?>assets/template/vendor/dropzone/css/basic.css" />
		<link rel="stylesheet" href="<?= base_url(); ?>assets/template/vendor/dropzone/css/dropzone.css" />
		<link rel="stylesheet" href="<?= base_url(); ?>assets/template/vendor/bootstrap-markdown/css/bootstrap-markdown.min.css" />
		<link rel="stylesheet" href="<?= base_url(); ?>assets/template/vendor/summernote/summernote.css" />
		<link rel="stylesheet" href="<?= base_url(); ?>assets/template/vendor/summernote/summernote-bs3.css" />
		<link rel="stylesheet" href="<?= base_url(); ?>assets/template/vendor/codemirror/lib/codemirror.css" />
		<link rel="stylesheet" href="<?= base_url(); ?>assets/template/vendor/codemirror/theme/monokai.css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="<?= base_url(); ?>assets/template/stylesheets/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="<?= base_url(); ?>assets/template/stylesheets/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="<?= base_url(); ?>assets/template/stylesheets/theme-custom.css">

        <style>

            #loader {
                position: absolute;
                left: 50%;
                top: 50%;
                z-index: 1;
                width: 120px;
                height: 120px;
                margin: -76px 0 0 -76px;
                border: 16px solid #f3f3f3;
                border-radius: 50%;
                border-top: 16px solid #3498db;
                -webkit-animation: spin 2s linear infinite;
                animation: spin 2s linear infinite;
            }

            @-webkit-keyframes spin {
                0% { -webkit-transform: rotate(0deg); }
                100% { -webkit-transform: rotate(360deg); }
            }

            @keyframes spin {
                0% { transform: rotate(0deg); }
                100% { transform: rotate(360deg); }
            }

            /* Add animation to "page content" */
            .animate-bottom {
                position: relative;
                -webkit-animation-name: animatebottom;
                -webkit-animation-duration: 1s;
                animation-name: animatebottom;
                animation-duration: 1s
            }

            @-webkit-keyframes animatebottom {
                from { bottom:-100px; opacity:0 } 
                to { bottom:0px; opacity:1 }
            }

            @keyframes animatebottom { 
                from{ bottom:-100px; opacity:0 } 
                to{ bottom:0; opacity:1 }
            }

        </style>
        <!-- Head Libs -->
		<script src="<?= base_url(); ?>assets/template/vendor/modernizr/modernizr.js"></script>

        <!-- Vendor -->
        <script src="<?= base_url(); ?>assets/template/vendor/jquery/jquery.js"></script>
		<script src="<?= base_url(); ?>assets/template/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="<?= base_url(); ?>assets/template/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="<?= base_url(); ?>assets/template/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="<?= base_url(); ?>assets/template/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="<?= base_url(); ?>assets/template/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="<?= base_url(); ?>assets/template/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		
        <!-- Specific Page Vendor -->
		<script src="<?= base_url(); ?>assets/template/vendor/select2/select2.js"></script>
		<script src="<?= base_url(); ?>assets/template/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
		<script src="<?= base_url(); ?>assets/template/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
		<script src="<?= base_url(); ?>assets/template/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js"></script>
		<script src="<?= base_url(); ?>assets/template/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>
		
        <!-- Theme Base, Components and Settings -->
		<script src="<?= base_url(); ?>assets/template/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="<?= base_url(); ?>assets/template/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="<?= base_url(); ?>assets/template/javascripts/theme.init.js"></script>
        
        <!-- SweetAlert -->
		<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


	</head>
	<body>
        <!-- <div id="preloader" class="preloader">
            <center>
                <div id="loader"></div>
            </center>
        </div> -->

        <div class="wrapet">
            <section class="body">
                <!-- start: header -->
                <header class="header">
                    <div class="logo-container">
                        <a href="#" class="logo">
                            <img src="<?= base_url(); ?>assets/images/gexim_600.png" height="35" alt="Porto Admin" />
                        </a>
                        <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
                            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                        </div>
                    </div>
                            
                    <!-- start: search & user box -->
                    <div class="header-right">
                        <span class="separator"></span>
                        <div id="userbox" class="userbox">
                            <a href="#" data-toggle="dropdown">
                                <figure class="profile-picture">
                                    <img src="<?= base_url(); ?>assets/template/images/!logged-user.jpg" alt="Joseph Doe" class="img-circle" data-lock-picture="assets/images/!logged-user.jpg" />
                                </figure>
                                <div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@okler.com">
                                    <span class="name"><?php echo($this->session->userdata('logged_gexp_in')->AccountName); ?></span>
                                    <span class="role"><?php echo($this->session->userdata('logged_gexp_in')->UserName); ?></span>
                                </div>
                                <i class="fa custom-caret"></i>
                            </a>
                
                            <div class="dropdown-menu">
                                <ul class="list-unstyled">
                                    <li class="divider"></li>
                                    <li>
                                        <a role="menuitem" tabindex="-1" href="#"><i class="fa fa-user"></i> My Profile</a>
                                    </li>
                                    
                                    <li>
                                        <a role="menuitem" tabindex="-1" href="<?php echo base_url('LoginSys/doLogout'); ?>"><i class="fa fa-power-off"></i> Logout</a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- end: search & user box -->
                </header>
                <!-- end: header -->


                <div class="inner-wrapper">
                    <!-- start: sidebar -->
                    <aside id="sidebar-left" class="sidebar-left">
                    
                        <div class="sidebar-header" style="background-color: #172774;">
                            <div class="sidebar-title">
                                <h6 style="color: white; font-weight:bold;">G-EXPORT</h6>
                            </div>
                            <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
                                <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                            </div>
                        </div>
                    
                        <div class="nano">
                            <div class="nano-content" style="background-color: #172774;">
                                <nav id="menu" class="nav-main" role="navigation">
                                    <ul class="nav nav-main">
                                        Load Menu
                                    <ul>
                                </nav>
                                <hr class="separator" />
                                <div class="sidebar-widget widget-tasks">
                                    <div class="widget-header">
                                        <h6 style="color: white;">User Group</h6>
                                        <div class="widget-toggle">+</div>
                                    </div>
                                    <div class="widget-content">
                                        <ul class="list-unstyled m-none">
                                            <li><a style="color: white;" href="#"><?php echo($this->session->userdata('logged_gexp_in')->GroupDesc); ?></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <hr class="separator" />
                                <div class="sidebar-widget widget-stats">
                                    <div class="widget-header"></div>
                                    <div class="widget-content">
                                        <ul>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside>
                <!-- end: sidebar -->
                <section role="main" class="content-body">
                    <!-- start: page -->

                    <header class="page-header" style="background-color: #172774;">
                        <h2>Title</h2>
                        <div class="right-wrapper pull-right">
                            <ol class="breadcrumbs"></ol>
                            <a class="sidebar-right-toggle"><i class="fa fa-cube"></i></a>
                        </div>
                    </header>

                    <section class="panel panel-primary">
                        <header class="panel-heading">
                            <div class="panel-actions">
                                <a href="#" class="fa fa-caret-down"></a>
                            </div>
                            <h5>Master Data Set : Master Set Country</h5>
                        </header>
                        <div class="panel-body">
                            <!-- Button trigger modal -->
                            <button type="button" class="mb-md mt-xs mr-xs btn btn-success" data-toggle="modal" data-target="#exampleModal">
                            NEW
                            </button>

                            <table class="table table-bordered table-striped mb-none" id="tables3">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Country Code</th>
                                        <th>Country Name</th>
                                        <th>Country Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>No</th>
                                        <th>Country Code</th>
                                        <th>Country Name</th>
                                        <th>Country Status</th>
                                        <th>Action</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </section>
                </div>
            </section>
        </div>
	</body>
</html>