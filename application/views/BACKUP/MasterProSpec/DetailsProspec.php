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
		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="<?= base_url(); ?>assets/template/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />
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

		<!-- Head Libs -->
		<script src="<?= base_url(); ?>assets/template/vendor/modernizr/modernizr.js"></script>

		</script>
  <!-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script> -->

		<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

		<style>
.swal2-popup {
  font-size: 1.6rem !important;
  font-family: Georgia, serif;
}

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


	</head>
	<body>

<!-- Notifications -->

<?php
  if($this->session->flashdata('warns') != null){ 
?>

<script>
  Swal.fire({
        icon: 'error',
        title: 'Failed',
        text: '<?php echo $this->session->flashdata('warns') ?>',
        // footer: '<a href="">Why do I have this issue?</a>'
      });
</script>

<?php
 }
?>

<?php
  if($this->session->flashdata('success') != null){ 
?>

<script>
  Swal.fire({
        icon: 'success',
        title: 'Success',
        text: '<?php echo $this->session->flashdata('success') ?>',
        // footer: '<a href="">Why do I have this issue?</a>'
      });
</script>

<?php
 }
?>

<!-- End Notifications -->

<div id="preloader" class="preloader">

<center>
        <div id="loader"></div>
</center>

</div>

<div class="wrapet">
  <section class="body">

  <!-- start: header -->
  <header class="header">
				<div class="logo-container">
					<a href="#" class="logo">
							<img src="<?= base_url(); ?>assets/images/gexim_600.png" height="35" alt="Gonusa" />
					</a>
					<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
						<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>
			
				<!-- start: search & user box -->
				<div class="header-right">
			
					<!-- <span class="separator"></span> -->
			
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
									<a role="menuitem" tabindex="-1" href="#s"><i class="fa fa-user"></i> My Profile</a>
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

							<?php include_once "mastermenus.php"; ?>

								<ul>
						</nav>

						<!-- Start Menus -->

							<!-- <nav id="menu" class="nav-main" role="navigation">
								<ul class="nav nav-main">

									<li>
										<a href="index.html">
											<i class="fa fa-home" aria-hidden="true"></i>
											<span>Dashboard</span>
										</a>
                                    </li>
									<li class="nav-parent">
										<a>
											<i class="fa fa-copy" aria-hidden="true"></i>
											<span>Pages</span>
										</a>
										<ul class="nav nav-children">
											
											<li>
												<a href="pages-404.html">
 													<i class="fa fa-copy" aria-hidden="true"></i> 404
												</a>
											</li>
											<li>
												<a href="pages-500.html">
													<i class="fa fa-copy" aria-hidden="true"></i> 500
												</a>
											</li>
											<li>
												<a href="pages-log-viewer.html">
													<i class="fa fa-copy" aria-hidden="true"></i> Log Viewer
												</a>
											</li>
											
										</ul>
									</li>

								</ul>
							</nav> -->

							<!-- End Menus -->
				
							<hr class="separator" />
				
							<div class="sidebar-widget widget-tasks">
								<div class="widget-header">
									<h6 style="color: white;">User Group</h6>
									<div class="widget-toggle">+</div>
								</div>
								<div class="widget-content">
									<ul class="list-unstyled m-none">
										<li><a style="color: white;" href="#"><?php echo $groupname->GroupDesc; ?></a></li>
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
						<h2>Product Spesification</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<!-- <li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Dashboard</span></li> -->
								<!-- <li><span>Icons</span></li> -->
							</ol>
					
							<a class="sidebar-right-toggle"><i class="fa fa-cube"></i></a>
						</div>
</header>

<section class="panel panel-primary">
							<header class="panel-heading">
								<div class="panel-actions">
									<a href="#" class="fa fa-caret-down"></a>
									<!-- <a href="#" class="fa fa-times"></a> -->
								</div>
						
								<h5>Dashboard PS : Product Specification </h5>
							</header>
							<div class="panel-body">

<div class="container-fluid">

<a class="btn btn-warning" href="<?php echo base_url('MenuProSpec/');?>"><i class="fa fa-arrow-left"></i> Back</a>

</div>

							<hr>

							<form class="form-horizontal form-bordered" method="POST" action="<?php echo base_url('MenuProSpec/Save_details_prodspec/'); ?>">

											<div class="form-group">
												<label class="col-md-2 control-label" for="inputDefault">Invoice No</label>
												<div class="col-md-3">
													<input type="text" value="<?php echo $detailsprodspec->gexp_invoice_no ?>" class="form-control" id="inputDefault" disabled>
                                                </div>
                                                <label class="col-md-2 control-label" for="inputDefault">Product Specification No</label>
												<div class="col-md-3">
													<input type="text" value="<?php echo $detailsprodspec->gexp_spec_no ?>" class="form-control" id="inputDefault" disabled>
												</div>
                                            </div>

                                            <input type="hidden" name="headspec_id" value="<?php echo $detailsprodspec->gexp_spec_id ?>" >

                                            <input type="hidden" name="invoice_id" value="<?php echo $detailsprodspec->gexp_invoice_id ?>" >
                                            
                                            <div class="form-group">
												<label class="col-md-2 control-label" for="inputDefault">Product Name</label>
												<div class="col-md-3">
                                                    <select id="basic" class="form-control" name="productname" required>
															<option value="">-- Pilih --</option>
														<?php foreach($lsproduct_byinv as $dt) : ?>
															<option value="<?php echo $dt->gexp_packlistdet_itemid;?>"> <?php echo $dt->gexp_packlistdet_descgod;?> </option>
														<?php endforeach; ?>
                                                    </select>
													<!-- <input type="text" value="<?php echo $detailsprodspec->gexp_invoice_no ?>" class="form-control" id="inputDefault"> -->
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
												<label class="col-md-2 control-label" for="inputDefault">Description</label>
												<div class="col-md-8">
                                                    
													<!-- <input type="text" class="form-control" name="descr" id="inputDefault" placeholder="inputan"> -->
													<textarea name="descr" rows="5" class="form-control"></textarea>
                                                </div>
                                            </div>
                                            

                                            <div class="form-group">
												<label class="col-md-2" style="font-weight: bold;" for="inputDefault">Physical :</label>
												<div class="col-md-3">
                                                    
													<!-- <input type="text" class="form-control" id="inputDefault"> -->
                                                </div>
                                            </div>

                                            <div class="form-group">
												<label class="col-md-2 control-label" for="inputDefault">Form</label>
												<div class="col-md-3">
                                                    
													<input type="text" class="form-control" name="forms" id="inputDefault" placeholder="inputan" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
												<label class="col-md-2 control-label" for="inputDefault">Texture</label>
												<div class="col-md-3">
                                                    
													<input type="text" class="form-control" name="texture" id="inputDefault" placeholder="inputan" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
												<label class="col-md-2 control-label" for="inputDefault">Colour</label>
												<div class="col-md-3">
                                                    
													<input type="text" class="form-control" name="colour" id="inputDefault" placeholder="inputan" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
												<label class="col-md-2 control-label" for="inputDefault">Taste</label>
												<div class="col-md-3">
                                                    
													<input type="text" class="form-control" name="taste" id="inputDefault" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
												<label class="col-md-2 control-label" for="inputDefault">Odour</label>
												<div class="col-md-3">
                                                    
													<input type="text" class="form-control" name="odour" id="inputDefault" required>
                                                </div>
                                            </div>
                                            

                                            <div class="form-group">
												<label class="col-md-2" style="font-weight: bold;" for="inputDefault">Chemical :</label>
												<div class="col-md-3">
                                                    
													<!-- <input type="text" class="form-control" id="inputDefault"> -->
                                                </div>
                                            </div>

                                            <div class="form-group">
												<label class="col-md-2 control-label" for="inputDefault">Fat</label>
												<div class="col-md-3">
                                                    
													<input type="text" class="form-control" name="fat" id="inputDefault" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
												<label class="col-md-2 control-label" for="inputDefault">Moisture Content</label>
												<div class="col-md-3">
                                                    
													<input type="text" class="form-control" name="moisture" id="inputDefault" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
												<label class="col-md-2 control-label" for="inputDefault">Caffeine</label>
												<div class="col-md-3">
                                                    
													<input type="text" class="form-control" name="caffein" id="inputDefault" required>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
												<label class="col-md-2" style="font-weight: bold;" for="inputDefault">Microbiological :</label>
												<div class="col-md-3">
                                                    
													<!-- <input type="text" class="form-control" id="inputDefault"> -->
                                                </div>
                                            </div>

                                            <div class="form-group">
												<label class="col-md-2 control-label" for="inputDefault">Total Plate Count</label>
												<div class="col-md-3">
                                                    
													<input type="text" class="form-control" name="platecount" id="inputDefault" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
												<label class="col-md-2 control-label" for="inputDefault">Mold & Yeast</label>
												<div class="col-md-3">
                                                    
													<input type="text" class="form-control" name="moldyeast" id="inputDefault" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
												<label class="col-md-2 control-label" for="inputDefault">Coliform</label>
												<div class="col-md-3">
                                                    
													<input type="text" class="form-control" name="coliform" id="inputDefault" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
												<label class="col-md-2 control-label" for="inputDefault">Salmonella</label>
												<div class="col-md-3">
                                                    
													<input type="text" class="form-control" name="salmonela" id="inputDefault" required>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
												<label class="col-md-2" style="font-weight: bold;" for="inputDefault">Heavy Metal :</label>
												<div class="col-md-3">
                                                    
													<!-- <input type="text" class="form-control" id="inputDefault"> -->
                                                </div>
                                            </div>

                                            <div class="form-group">
												<label class="col-md-2 control-label" for="inputDefault">Lead (Pb)</label>
												<div class="col-md-3">
                                                    
													<input type="text" class="form-control" name="lead" id="inputDefault" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
												<label class="col-md-2 control-label" for="inputDefault">Arsenic (As)</label>
												<div class="col-md-3">
                                                    
													<input type="text" class="form-control" name="arsen" id="inputDefault" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
												<label class="col-md-2 control-label" for="inputDefault">Mercury (Hg)</label>
												<div class="col-md-3">
                                                    
													<input type="text" class="form-control" name="mercur" id="inputDefault" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
												<label class="col-md-2 control-label" for="inputDefault">Tin (Sn)</label>
												<div class="col-md-3">
                                                    
													<input type="text" class="form-control" name="tin" id="inputDefault" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
												<label class="col-md-2 control-label" for="inputDefault">Cadmium (Cd)</label>
												<div class="col-md-3">
                                                    
													<input type="text" class="form-control" name="cadm" id="inputDefault" required>
                                                </div>
                                            </div>
                                            
                                            <!-- <div class="form-group">
												<label class="col-md-2 control-label" style="font-weight: bold;" for="inputDefault">Inregdient :</label>
												<div class="col-md-3">
                                                    
													<input type="text" class="form-control" name="ingd" id="inputDefault" placeholder="inputan">
                                                </div>
											</div> -->
											
											<div class="form-group">
												<label class="col-md-2 control-label" style="font-weight: bold;" for="inputDefault">Ingredients :</label>
												<div class="col-md-10">
													<textarea id="summernote" class="summernote" data-plugin-summernote name="ingd"></textarea>
												</div>
											</div>
                                            
                                            <!-- <div class="form-group">
												<label class="col-md-2 control-label" style="font-weight: bold;" for="inputDefault">Product Shelf Life :</label>
												<div class="col-md-3">
                                                    
													<input type="text" class="form-control" name="psl" id="inputDefault" placeholder="inputan">
                                                </div>
											</div> -->
											
											<div class="form-group">
												<label class="col-md-2 control-label" style="font-weight: bold;" for="inputDefault">Product Shelf Life :</label>
												<div class="col-md-10">
													<textarea id="summernote" class="summernote" data-plugin-summernote name="psl"></textarea>
												</div>
											</div>
                                            
                                            <!-- <div class="form-group">
												<label class="col-md-2 control-label" style="font-weight: bold;" for="inputDefault">Packaging Material :</label>
												<div class="col-md-3">
                                                    
													<input type="text" class="form-control" name="pm" id="inputDefault" placeholder="inputan">
                                                </div>
											</div> -->
											
											<div class="form-group">
												<label class="col-md-2 control-label" style="font-weight: bold;" for="inputDefault">Packaging Material :</label>
												<div class="col-md-10">
													<textarea id="summernote" class="summernote" data-plugin-summernote name="pm"></textarea>
												</div>
											</div>
                                            
                                            <!-- <div class="form-group">
												<label class="col-md-2 control-label" style="font-weight: bold;" for="inputDefault">Storage Condition Requirement :</label>
												<div class="col-md-3">
                                                    
													<input type="text" class="form-control" name="scr" id="inputDefault" placeholder="inputan">
                                                </div>
											</div> -->


											
											<div class="form-group">
												<label class="col-md-2 control-label" style="font-weight: bold;" for="inputDefault">Storage Condition Requirement :</label>
												<div class="col-md-10">
													<textarea id="summernote" class="summernote" data-plugin-summernote name="scr"></textarea>
												</div>
											</div>


											<div class="form-group">
												<label class="col-md-2 control-label" style="font-weight: bold;" for="inputDefault">Function Of the Food Material :</label>
												<div class="col-md-10">
													<textarea id="summernote" class="summernote" data-plugin-summernote name="fofm"></textarea>
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-2 control-label" style="font-weight: bold;" for="inputDefault">Usage :</label>
												<div class="col-md-10">
													<textarea id="summernote" class="summernote" data-plugin-summernote name="usage"></textarea>
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-2 control-label" style="font-weight: bold;" for="inputDefault">Source Of Allergen :</label>
												<div class="col-md-10">
													<textarea id="summernote" class="summernote" data-plugin-summernote name="soa"></textarea>
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-2 control-label" style="font-weight: bold;" for="inputDefault">Country Of Origin :</label>
												<div class="col-md-10">
													<textarea id="summernote" class="summernote" data-plugin-summernote name="coo"></textarea>
												</div>
											</div>
										

											

											<div class="form-group">
												<label class="col-md-2 control-label" for="inputDefault"></label>
												<div class="col-md-2">
													<button type="submit" class="btn btn-block btn-primary"><i class="fa fa-plus-circle"></i> Tambah</button>
												</div>
											</div>


							</form>

<!-- Button trigger modal -->
<!-- <button type="button" class="mb-md mt-xs mr-xs btn btn-success" data-toggle="modal" data-target="#exampleModal">
  NEW
</button> -->

<!-- Modal Start -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-success">

        <h5 class="modal-title" id="exampleModalLabel">Create Master TOP</h5>
        
      </div>
      <div class="modal-body">

	  <form class="form-horizontal form-bordered form-bordered" action="<?php echo base_url('DataSetTop/createnewtop');?>" id="inputdatagroup" method="POST">
                                           
											<div class="form-group">
												<label class="col-md-3 control-label" for="textareaDefault">TOP Description</label>
												<div class="col-md-8">
													<input class="form-control" name="topdesc" data-plugin-maxlength maxlength="50" />
													<p>
														<code>max-length</code> set to 50 character <code>uppercase</code>.
													</p>
												</div>
                                            </div>
											
											
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-success">Save changes</button> -->
		<input type="submit" class="btn btn-success" value="Confirm">
		</form>
      </div>
    </div>
  </div>
</div>

<!-- End Modal Insert Group -->

<br>
<br>


								<table class="table table-bordered table-striped mb-none" id="tables3">
									<thead>
										<tr>
											<th>No</th>
											<th>Product Specification No</th>
											<th>Invoice No</th>
											<th>Product</th>
											<th>Preview / Print</th>
										</tr>
									</thead>
									<tbody>
									<?php
if(!empty($ls_detail_prodspec)){
  // Jika data pada database tidak sama dengan empty (alias ada datanya)
$no_urut=1;
  foreach($ls_detail_prodspec as $gaa){
    echo "<tr>";
	echo "<th scope='row'>".$no_urut++."</th>";
	echo "<td>".$gaa->gexp_spec_no."</td>";
	echo "<td>".$gaa->gexp_invoice_no."</td>";
	echo "<td>".$gaa->ItemName."</td>";
	// echo "<td>".$gaa->gexp_invoice_no."</td>";
	// echo "<td>".$gaa->ItemName."</td>";
	// echo "<td>".$gaa->gexp_qc_production_date."</td>";
	// echo "<td>".$gaa->gexp_qc_expired_date."</td>";
	// echo "<td>".$gaa->gexp_qc_finish_goodcheck."</td>";
	// echo "<td>".$gaa->ShipComp."</td>";
	// echo "<td>";
	// 	if($gaa->gexp_qc_statrows==1){
	// 		echo "Aktif";
	// 	}else{
	// 		echo "Tidak Aktif";
	// 	}
	// echo"</td>";
	// echo "<td>";
	// 	if($gaa->CountryStats==1){
	// 		echo "Aktif";
	// 	}else{
	// 		echo "Tidak Aktif";
	// 	}
	// echo"</td>";

	echo "<td style='text-align:center; font-size:18px;'><a style='font-size:18px;' class='btn small-btn-ic-info shadow-sm' href='".base_url("MenuProSpec/print_prodspec_detail/".$gaa->gexp_specdet_id)."'><i class='fa fa-print'></i></a></td>";
	// echo "<td style='text-align:center; font-size:18px;'><a style='font-size:18px;' class='btn small-btn-ic-info shadow-sm' href='".base_url("MasterQc/PreviewDetail_Qc/".$gaa->gexp_spec_id)."'><i class='fa fa-file'></i></a></td>";
    echo "</tr>";
  }
}else{ // Jika data tidak ada
  echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
}
?>		
										
										
									</tbody>
								</table>
							</div>
</section>


<!-- end: page -->
</section>
</div>






  </section>
</div>


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

		<script src="<?= base_url(); ?>assets/template/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
		<script src="<?= base_url(); ?>assets/template/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js"></script>
		<script src="<?= base_url(); ?>assets/template/vendor/select2/select2.js"></script>
		<script src="<?= base_url(); ?>assets/template/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
		<script src="<?= base_url(); ?>assets/template/vendor/jquery-maskedinput/jquery.maskedinput.js"></script>
		<script src="<?= base_url(); ?>assets/template/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
		<script src="<?= base_url(); ?>assets/template/vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
		<script src="<?= base_url(); ?>assets/template/vendor/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
		<script src="<?= base_url(); ?>assets/template/vendor/fuelux/js/spinner.js"></script>
		<script src="<?= base_url(); ?>assets/template/vendor/dropzone/dropzone.js"></script>
		<script src="<?= base_url(); ?>assets/template/vendor/bootstrap-markdown/js/markdown.js"></script>
		<script src="<?= base_url(); ?>assets/template/vendor/bootstrap-markdown/js/to-markdown.js"></script>
		<script src="<?= base_url(); ?>assets/template/vendor/bootstrap-markdown/js/bootstrap-markdown.js"></script>
		<script src="<?= base_url(); ?>assets/template/vendor/codemirror/lib/codemirror.js"></script>
		<script src="<?= base_url(); ?>assets/template/vendor/codemirror/addon/selection/active-line.js"></script>
		<script src="<?= base_url(); ?>assets/template/vendor/codemirror/addon/edit/matchbrackets.js"></script>
		<script src="<?= base_url(); ?>assets/template/vendor/codemirror/mode/javascript/javascript.js"></script>
		<script src="<?= base_url(); ?>assets/template/vendor/codemirror/mode/xml/xml.js"></script>
		<script src="<?= base_url(); ?>assets/template/vendor/codemirror/mode/htmlmixed/htmlmixed.js"></script>
		<script src="<?= base_url(); ?>assets/template/vendor/codemirror/mode/css/css.js"></script>
		<script src="<?= base_url(); ?>assets/template/vendor/summernote/summernote.js"></script>
		<script src="<?= base_url(); ?>assets/template/vendor/bootstrap-maxlength/bootstrap-maxlength.js"></script>
		<script src="<?= base_url(); ?>assets/template/vendor/ios7-switch/ios7-switch.js"></script>
		
<!-- Theme Base, Components and Settings -->
		<script src="<?= base_url(); ?>assets/template/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="<?= base_url(); ?>assets/template/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="<?= base_url(); ?>assets/template/javascripts/theme.init.js"></script>


		<!-- Examples -->
		<script src="<?= base_url(); ?>assets/template/javascripts/tables/examples.datatables.default.js"></script>
		<script src="<?= base_url(); ?>assets/template/javascripts/tables/examples.datatables.row.with.details.js"></script>
        <script src="<?= base_url(); ?>assets/template/javascripts/tables/examples.datatables.tabletools.js"></script>
        <script src="<?= base_url(); ?>assets/template/javascripts/ui-elements/examples.modals.js"></script>

		<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		
		<!-- Examples -->
		<script src="<?= base_url(); ?>assets/template/javascripts/forms/examples.advanced.form.js" /></script>

		<!-- <script src="<?= base_url(); ?>assets/template/javascripts/forms/examples.advanced.form.js"></script> -->
        
<script>

$('#tables1').dataTable();
$('#tables2').dataTable();
$('#tables3').dataTable({
				columnDefs: [{
					"defaultContent": "-",
					"targets": "_all"
				}]
			});
$('#tables4').dataTable();
$('#tables5').dataTable();
$('#tables6').dataTable();
$('#tables7').dataTable();
$('#tables8').dataTable();

$( window ).on("load", function() {
        // Handler for .load() called.
        // alert("window is loaded");
        $(".preloader").delay(1000).fadeOut("slow");
});

// POST GROUP

$(document).ready(function(){


$("#tambahgroup").click(function(){
    var kirim = $('#inputdatagroup').serialize();
    
    $.ajax({
        type	 : 'POST',
        url	     : "<?php echo base_url(); ?>/GroupMaster/simpanMasterGroup",
        data     : kirim,
        dataType : "JSON",
        cache	 : false,
        success	 : function(response){

                if(response.success == "1"){

                    // Swal.fire({
                    //     title: 'Sedang Di Proses',
                    //     showDenyButton: false,
                    //     showCancelButton: false,
                    //     confirmButtonText: 'OK',
                    //     denyButtonText: `Don't save`,
                    //     }).then((result) => {
                    //     /* Read more about isConfirmed, isDenied below */
                    //         if (result.isConfirmed) {
                    //             Swal.fire(response.messages, '', 'error')
                    //         }
                    //     });
                    
                    alert(response.messages);
                    location.reload();

                }else if(response.success == "0"){

                    alert(response.messages);
                    location.reload();

                        // Swal.fire({
                        // title: 'Sedang Di Proses',
                        // showDenyButton: false,
                        // showCancelButton: false,
                        // confirmButtonText: 'OK',
                        // denyButtonText: `Don't save`,
                        // }).then((result) => {
                        // /* Read more about isConfirmed, isDenied below */
                        //     if (result.isConfirmed) {
                        //         Swal.fire(response.messages, '', 'success')
                        //     }
                        // });
                    
                    // alert(response.messages);
                    // Swal.fire({
                    //     icon: 'success',
                    //     title: 'Success',
                    //     text: 'response.messages',
                    //     // footer: '<a href="">Why do I have this issue?</a>'
                    // });
                    // location.reload("<?php echo base_url(); ?>/MasterUserTest/crudmasteruser");
                    // $('#suksesgroup').load("<?php echo base_url(); ?>/MasterUserTest/crudmasteruser"); 
                    // $('#tampil').load("<?php echo base_url(); ?>/mahasiswa/tampilMahasiswa"); 

                }
        }
        // error    : function(data){
        // //         console.log(data.status); 
        //            alert('Eror');

        
        
    });
   
    
});


// $.ajax({
//         type: 'POST',
//         url: "<?php echo base_url(); ?>/mahasiswa/tampilMahasiswa",
//         cache: false,
//         success: function(data) {
//             $("#listingmastergroup").html(data);
//         }
// });


$("#tambahusers").click(function(){
    var user = $('#inputdatausers').serialize();
    
    $.ajax({
        type	 : 'POST',
        url	     : "<?php echo base_url(); ?>/RootTest/simpanMasterUser",
        data     : user,
        dataType : "JSON",
        cache	 : false,
        success	 : function(response){

                if(response.success == "1"){
                    
                    alert(response.messages);
                    location.reload();

                }else if(response.success == "0"){

                    alert(response.messages);
                    location.reload();

                }
        }
    
    });
      
});


$("#tambahusers").click(function(){
    var user = $('#inputdatausers').serialize();
    
    $.ajax({
        type	 : 'POST',
        url	     : "<?php echo base_url(); ?>/RootTest/simpanMasterUser",
        data     : user,
        dataType : "JSON",
        cache	 : false,
        success	 : function(response){

                if(response.success == "1"){
                    
                    alert(response.messages);
                    location.reload();

                }else if(response.success == "0"){

                    alert(response.messages);
                    location.reload();

                }
        }
    
    });
      
});



});

</script>

	</body>
</html>