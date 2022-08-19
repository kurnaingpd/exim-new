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

		<!-- Theme CSS -->
		<link rel="stylesheet" href="<?= base_url(); ?>assets/template/stylesheets/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="<?= base_url(); ?>assets/template/stylesheets/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="<?= base_url(); ?>assets/template/stylesheets/theme-custom.css">

		<!-- Head Libs -->
		<script src="<?= base_url(); ?>assets/template/vendor/modernizr/modernizr.js"></script>

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

  <!-- <div class="loading">
      <h1 class="inoaload">G-EXPORT</h1>
      <p>Please Wait..</p>
  </div> -->
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
								<img src="<?= base_url(); ?>assets/template/images/!logged-user.jpg" alt="Images" class="img-circle" data-lock-picture="assets/images/!logged-user.jpg" />
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
	<h2>Approval PI</h2>				
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
						
								<h5>Approval Proforma Invoice : Preview</h5>
							</header>
							<div class="panel-body">

<div class="container-fluid">

<a class="btn btn-primary" href="<?php echo base_url('MenuApprovalPI');?>"><i class="fa fa-arrow-left"></i> Back</a>

<?php if($getrowpi_byid[0]->gexp_pi_statusPI=='4' OR $getrowpi_byid[0]->gexp_pi_statusPI=='3' OR $getrowpi_byid[0]->gexp_pi_statusPI=='5' ){ ?>
        <!-- <a class="btn btn-success" href="<?php echo base_url('MasterBoardPI/CreateNew');?>"><i class="fa fa-file"></i> New</a> -->
        <!-- <div class="col-lg-2"> -->
        <a class="btn btn-success" href="<?php echo base_url('MenuApprovalPI/ApprovedPI_byid/'.$getrowpi_byid[0]->gexp_pi_id);?>"><i class="fa fa-check-circle-o"></i> Approved</a>
        <!-- </div> -->
        <a class="btn btn-danger" href="<?php echo base_url('MenuApprovalPI/VoidPI_byid/'.$getrowpi_byid[0]->gexp_pi_id);?>"><i class="fa fa-times"></i> Void</a>
<?php }else{?>

<?php } ?>

</div>

<hr>

<div class="row">

    <div class="col-lg-2" style="font-weight: bold;">
        Status 
    </div>

    <div class="col-lg-5">
        <?php if($getrowpi_byid[0]->gexp_pi_statusPI=='4'){ ?> 
            <input style="background-color: #D3DEDC; font-weight:bold;" type="text" value="Draft" class="form-control" readonly> 
        <?php }elseif($getrowpi_byid[0]->gexp_pi_statusPI=='3'){?>
            <input style="background-color: #FF7F3F; font-weight:bold;" type="text" value="Waiting Approval" class="form-control" readonly>
        <?php }elseif($getrowpi_byid[0]->gexp_pi_statusPI=='2'){?>
            <input style="background-color: #CD1818; font-weight:bold;" type="text" value="Void" class="form-control" readonly>
        <?php }elseif($getrowpi_byid[0]->gexp_pi_statusPI=='1'){ ?>
            <input style="background-color: #95CD41; font-weight:bold;" type="text" value="Approved" class="form-control" readonly>
        <?php }elseif($getrowpi_byid[0]->gexp_pi_statusPI=='5'){ ?>
            <input style="background-color: #FFBD35; font-weight:bold;" type="text" value="Revised" class="form-control" readonly>
        <?php } ?>
    </div>

    <!-- <div class="col-lg-3">
        <input type="text" value="<?php if($getrowpi_byid[0]->gexp_pi_statusPI=='4'){
            echo "Draft";
        }elseif($getrowpi_byid[0]->gexp_pi_statusPI=='3'){
            echo "On Progress";
        }elseif($getrowpi_byid[0]->gexp_pi_statusPI=='2'){
            echo "Void";
        }elseif($getrowpi_byid[0]->gexp_pi_statusPI=='1'){
            echo "Approved";
        }elseif($getrowpi_byid[0]->gexp_pi_statusPI=='5'){
            echo "Revised";
        } ?>" class="form-control" disabled > 
    </div> -->

</div>
<br>
<div class="row">

    <div class="col-lg-2">
        PI No 
    </div>

    <div class="col-lg-3">
        <input type="text" value="<?php echo $getrowpi_byid[0]->gexp_pi_no; ?>" class="form-control" readonly> 
    </div>

</div>
<div class="row">

    <div class="col-lg-2">
        PI Date 
    </div>

    <div class="col-lg-3">
        <input type="text" value="<?php echo $getrowpi_byid[0]->gexp_pi_date; ?>" class="form-control" readonly> 
    </div>

</div>
<div class="row">

    <div class="col-lg-2">
        PO 
    </div>

    <div class="col-lg-3">
        <input type="text" value="<?php echo $getrowpi_byid[0]->gexp_pi_po; ?>" class="form-control" readonly> 
    </div>

</div>
<p style="font-weight: bold;">Consignee</p>

<div class="row">

    <div class="col-lg-2">
        Company Name
    </div>

    <div class="col-lg-3">
        <input type="text" value="<?php echo $getrowpi_byid[0]->Consig; ?>" class="form-control" readonly> 
    </div>

</div>
<div class="row">

    <div class="col-lg-2">
        Address 
    </div>

    <div class="col-lg-3">
        <input type="text" value="<?php echo $getrowpi_byid[0]->Cons_addr; ?>" class="form-control" readonly> 
    </div>

</div>
<div class="row">

    <div class="col-lg-2">
        Country
    </div>

    <div class="col-lg-3">
        <input type="text" value="<?php echo $getrowpi_byid[0]->Cons_country; ?>" class="form-control" readonly> 
    </div>

</div>
<div class="row">

    <div class="col-lg-2">
        Phone 
    </div>

    <div class="col-lg-3">
        <input type="text" value="<?php echo $getrowpi_byid[0]->Cons_phone; ?>" class="form-control" readonly> 
    </div>

</div>
<div class="row">

    <div class="col-lg-2">
        Attention Contact Person 
    </div>

    <div class="col-lg-3">
        <input type="text" class="form-control" value="<?php echo $getrowpi_byid[0]->ConsigContactName; ?>" readonly> 
    </div>

</div>
<p style="font-weight: bold;">Beneficiary</p>

<div class="row">

    <div class="col-lg-2">
        Company Name
    </div>

    <div class="col-lg-3">
        <input type="text" value="<?php echo $getrowpi_byid[0]->Benefi; ?>" class="form-control" readonly> 
    </div>

</div>
<div class="row">

    <div class="col-lg-2">
        Address 
    </div>

    <div class="col-lg-3">
        <input type="text" value="<?php echo $getrowpi_byid[0]->Bene_addr; ?>" class="form-control" readonly> 
    </div>

</div>
<div class="row">

    <div class="col-lg-2">
        Country
    </div>

    <div class="col-lg-3">
        <input type="text" value="<?php echo $getrowpi_byid[0]->Bene_country; ?>" class="form-control" readonly> 
    </div>

</div>
<div class="row">

    <div class="col-lg-2">
        Phone 
    </div>

    <div class="col-lg-3">
        <input type="text" value="<?php echo $getrowpi_byid[0]->Bene_phone; ?>" class="form-control" readonly> 
    </div>

</div>
<div class="row">

    <div class="col-lg-2">
        Attention Contact Person 
    </div>

    <div class="col-lg-3">
        <input type="text" class="form-control" value="<?php echo $getrowpi_byid[0]->Bene_cp; ?>" readonly> 
    </div>

</div>
<br>
<div class="row">

    <div class="col-lg-2">
        Loading Port 
    </div>

    <div class="col-lg-3">
        <input type="text" value="<?php echo $getrowpi_byid[0]->Loadport_Name; ?>" class="form-control" readonly> 
    </div>

</div>

<div class="row">

    <div class="col-lg-2">
        Discharge Port 
    </div>

    <div class="col-lg-3">
        <input type="text" class="form-control" value="<?php echo $getrowpi_byid[0]->DischargePort; ?>" readonly> 
    </div>

</div>

<div class="row">

    <div class="col-lg-2">
        Destination Port 
    </div>

    <div class="col-lg-3">
        <input type="text" class="form-control" value="<?php echo $getrowpi_byid[0]->DestinatPort; ?>" readonly> 
    </div>

</div>

<div class="row">

    <div class="col-lg-2">
        Container 
    </div>

    <div class="col-lg-3">
        <input type="text" value="<?php echo $getrowpi_byid[0]->NamaContainer; ?>" class="form-control" readonly> 
    </div>

</div>

<div class="row">

    <div class="col-lg-2">
        Number Of Container 
    </div>

    <div class="col-lg-3">
        <input type="text" value="<?php echo $getrowpi_byid[0]->gexp_pi_number_container; ?>" class="form-control" readonly> 
    </div>

</div>

<div class="row">

    <div class="col-lg-2">
        Freight Company 
    </div>

    <div class="col-lg-3">
        <input type="text" value="<?php echo $getrowpi_byid[0]->gexp_pi_freight_company; ?>" class="form-control" readonly> 
    </div>

</div>

<div class="row">

    <div class="col-lg-2">
        Freight Company Contact
    </div>

    <div class="col-lg-3">
        <input type="text" value="<?php echo $getrowpi_byid[0]->gexp_pi_freight_compcontact; ?>" class="form-control" readonly> 
    </div>

</div>

<div class="row">

    <div class="col-lg-2">
        Freight Company Number
    </div>

    <div class="col-lg-3">
        <input type="text" value="<?php echo $getrowpi_byid[0]->gexp_pi_freight_compnumber; ?>" class="form-control" readonly> 
    </div>

</div>

<div class="row">

    <div class="col-lg-2">
        Freight Cost
    </div>

    <div class="col-lg-3">
        <input type="text" value="<?php echo number_format($getrowpi_byid[0]->gexp_pi_freight_cost,0,",",".") ?>" class="form-control" readonly> 
    </div>

</div>

<div class="row">

    <div class="col-lg-2">
        Insurance
    </div>

    <div class="col-lg-3">
        <input type="text" value="<?php echo number_format($getrowpi_byid[0]->gexp_pi_insurance,0,",",".") ?>" class="form-control" readonly> 
    </div>

</div>

<div class="row">

    <div class="col-lg-2">
        Bank Name
    </div>

    <div class="col-lg-3">
        <input type="text" value="<?php echo $getrowpi_byid[0]->Bank_name; ?>" class="form-control" readonly> 
    </div>

</div>

<div class="row">

    <div class="col-lg-2">
        Currency
    </div>

    <div class="col-lg-3">
        <input type="text" value="<?php echo $getrowpi_byid[0]->gexp_pi_currency; ?>" class="form-control" readonly> 
    </div>

</div>

<div class="row">

    <div class="col-lg-2">
        PPN
    </div>

    <div class="col-lg-3">
        <input type="text" value="<?php if($getrowpi_byid[0]->gexp_pi_ppn=='1'){
            echo "YES";
        }else{
            echo "NO";
        } ?>" class="form-control" readonly> 
    </div>

</div>

<br>
<br>

<p style="font-weight: bold; font-size:14px;">Purchase Goods</p>
								<table class="table table-bordered table-striped mb-none" id="tables3">
									<thead>
										<tr>
											<th>No</th>
											<th>Product Name</th>
											<th>HS Code</th>
											<th class="hidden-phone">Configuration</th>
                                            <th class="hidden-phone">Qty ( Case )</th>
                                            <th class="hidden-phone">Price</th>
                                            <th class="hidden-phone">Total</th>
										</tr>
							</thead>
							<tbody>
<?php
    if(!empty($list_purchasegood)){
    // Jika data pada database tidak sama dengan empty (alias ada datanya)
    $no_urut=1;
    foreach($list_purchasegood as $gaa){
        echo "<tr>";
        echo "<th scope='row'>".$no_urut++."</th>";
        echo "<td>".$gaa->ItemName."</td>";
        echo "<td>".$gaa->gexp_good_hs_code."</td>";
        echo "<td>".$gaa->ItemPackDesc."</td>";
        echo "<td>".number_format("$gaa->gexp_good_qty",0,",",".")."</td>";
        echo "<td>".number_format("$gaa->gexp_good_price",0,",",".")."</td>";
        echo "<td>".number_format("$gaa->gexp_good_totals",0,",",".")."</td>";

        echo "</tr>";
    }
    }else{ // Jika data tidak ada
        echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
    }
?>	
																
	</tbody>
</table>

<hr>

<div class="row">
    <div class="col-lg-6">
        <p style="font-weight: bold; font-size:14px;">Total FOB</p>
    </div>
    <div class="col-lg-3">
        <p style="font-weight: bold; font-size:14px;">Total QTY : <?php if($summary_purchase_qty->Total_Qty_Prcs!=''){ 
            echo number_format("$summary_purchase_qty->Total_Qty_Prcs",0,",","."); }else{ echo "-";} ?> </p>
    </div>
    <div class="col-lg-3">
        <p style="font-weight: bold; font-size:14px;">Total VALUE : <?php if($summary_purchase_value->Total_Val_Prcs!=''){ 
            echo number_format("$summary_purchase_value->Total_Val_Prcs",0,",","."); }else{ echo "-";}?></p>
    </div>
</div>

<hr>
<br>



<p style="font-weight: bold; font-size:14px;">Free Goods</p>

<table class="table table-bordered table-striped mb-none" id="tables4">
    <thead>
        <tr>
            <th>No</th>
            <th>Product Name</th>
            <th>HSCode</th>
            <th class="hidden-phone">Configuration</th>
            <th class="hidden-phone">Qty ( Case )</th>
            <th class="hidden-phone">Price</th>
            <th class="hidden-phone">Total</th>
        </tr>
    </thead>
    <tbody>
<?php
if(!empty($list_freegood)){
// Jika data pada database tidak sama dengan empty (alias ada datanya)
$no_urut=1;
foreach($list_freegood as $gaa){
    echo "<tr>";
    echo "<th scope='row'>".$no_urut++."</th>";
    echo "<td>".$gaa->ItemName."</td>";
    echo "<td>".$gaa->gexp_good_hs_code."</td>";
    echo "<td>".$gaa->ItemPackDesc."</td>";
    echo "<td>".number_format("$gaa->gexp_good_qty",0,",",".")."</td>";
    echo "<td>".number_format("$gaa->gexp_good_price",0,",",".")."</td>";
    echo "<td>".number_format("$gaa->gexp_good_totals",0,",",".")."</td>";

// echo "<td style='text-align:center; font-size:18px;'><a style='font-size:18px;' class='btn small-btn-ic-info shadow-sm' id='anim' href='".base_url("MasterEmployee/listdetail/".$gaa->ReportId)."'><i class='fa fa-file-text-o'></i></a> </td>";
    echo "</tr>";
}
}else{ // Jika data tidak ada
    echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
}
?>	
                                
    </tbody>
</table>


<hr>

<div class="row">
    <div class="col-lg-6">
        <p style="font-weight: bold; font-size:14px;">Total FOC</p>
    </div>
    <div class="col-lg-3">
        <p style="font-weight: bold; font-size:14px;">Total QTY : <?php if($summary_freegood_qty->Total_Qty_Free!=''){ 
            echo number_format("$summary_freegood_qty->Total_Qty_Free",0,",","."); }else{ echo  "-";}?></p>
    </div>
    <div class="col-lg-3">
        <p style="font-weight: bold; font-size:14px;">Total VALUE : <?php if($summary_freegood_value->Total_Val_Free){
             echo number_format("$summary_freegood_value->Total_Val_Free",0,",","."); }else{ echo "-";} ?></p>
    </div>
</div>

<hr>


<hr>
<section class="panel panel-featured-left panel-featured-primary">
									<div class="panel-body">
										<div class="widget-summary widget-summary-md">
											<!-- <div class="widget-summary-col widget-summary-col-icon">
												<div class="summary-icon bg-primary">
													<i class="fa fa-life-ring"></i>
												</div>
											</div> -->
											<div class="widget-summary-col">
												<div class="summary">
													<h4>Free On Board (FOB) :</h4>
													<div class="info">
														<strong class="amount"><?php echo $free_on_board[0]->Total_Purchase; ?></strong>
														<!-- <span class="text-primary">(14 unread)</span> -->
													</div>
												</div>
												<div class="summary-footer">
													<!-- <a class="text-muted text-uppercase">(view all)</a> -->
												</div>
											</div>
										</div>
                                    </div>
</section>
<section class="panel panel-featured-left panel-featured-primary">
									<div class="panel-body">
										<div class="widget-summary widget-summary-md">
											<!-- <div class="widget-summary-col widget-summary-col-icon">
												<div class="summary-icon bg-primary">
													<i class="fa fa-life-ring"></i>
												</div>
											</div> -->
											<div class="widget-summary-col">
												<div class="summary">
													<h4 >Freight Cost :</h4>
													<div class="info">
														<strong class="amount"><?php echo $getrowpi_byid[0]->gexp_pi_freight_cost; ?></strong>
														<!-- <span class="text-primary">(14 unread)</span> -->
													</div>
												</div>
												<div class="summary-footer">
													<!-- <a class="text-muted text-uppercase">(view all)</a> -->
												</div>
											</div>
										</div>
                                    </div>
</section>
<section class="panel panel-featured-left panel-featured-primary">
									<div class="panel-body">
										<div class="widget-summary widget-summary-md">
											<!-- <div class="widget-summary-col widget-summary-col-icon">
												<div class="summary-icon bg-primary">
													<i class="fa fa-life-ring"></i>
												</div>
											</div> -->
											<div class="widget-summary-col">
												<div class="summary">
													<h4 >Insurance :</h4>
													<div class="info">
														<strong class="amount"><?php echo $getrowpi_byid[0]->gexp_pi_insurance; ?></strong>
														<!-- <span class="text-primary">(14 unread)</span> -->
													</div>
												</div>
												<div class="summary-footer">
													<!-- <a class="text-muted text-uppercase">(view all)</a> -->
												</div>
											</div>
										</div>
                                    </div>
</section>
<section class="panel panel-featured-left panel-featured-primary">
									<div class="panel-body">
										<div class="widget-summary widget-summary-md">
											<!-- <div class="widget-summary-col widget-summary-col-icon">
												<div class="summary-icon bg-primary">
													<i class="fa fa-life-ring"></i>
												</div>
											</div> -->
											<div class="widget-summary-col">
												<div class="summary">
													<h4 >TOTAL :</h4>
													<div class="info">
														<strong class="amount"><?php echo $free_on_board[0]->Total_Purchase+$getrowpi_byid[0]->gexp_pi_freight_cost+$getrowpi_byid[0]->gexp_pi_insurance; ?></strong>
														<!-- <span class="text-primary">(14 unread)</span> -->
													</div>
												</div>
												<div class="summary-footer">
													<!-- <a class="text-muted text-uppercase">(view all)</a> -->
												</div>
											</div>
										</div>
                                    </div>
</section>



<hr>


<?php if($getrowpi_byid[0]->gexp_pi_statusPI=='1' OR $getrowpi_byid[0]->gexp_pi_statusPI=='2'){ ?> 

    <div class="row">
    <div class="col-lg-12">
    <!-- <form method="POST" action="<?= base_url('MenuApprovalPI/Update_remark/'.$getrowpi_byid[0]->gexp_pi_id); ?>"> -->
        <textarea class="form-control" rows="5" data-plugin-maxlength maxlength="255" name="remark_pi" placeholder="Remark PI" disabled> <?php echo $getrowpi_byid[0]->gexp_pi_remark; ?></textarea>
        <br>
        <!-- <button type="submit" class="btn btn-primary">Save</button> -->
    <!-- </form> -->
    </div>
</div>


<?php }else{?>

<div class="row">

    <!-- <div class="col-lg-12">
    <form method="POST" action="<?= base_url('MenuApprovalPI/Update_remark/'.$getrowpi_byid[0]->gexp_pi_id); ?>">
        <textarea class="form-control" rows="5" data-plugin-maxlength maxlength="255" name="remark_pi" placeholder="Remark PI"></textarea>
        <br>
        <button type="submit" class="btn btn-primary">Ssubmit Remarks</button>
    </form>
    </div> -->
    
    <div class="col-lg-12">
    <form method="POST" action="<?= base_url('MenuApprovalPI/Update_remark/'.$getrowpi_byid[0]->gexp_pi_id); ?>">
        <textarea class="form-control" rows="5" data-plugin-maxlength maxlength="255" name="remark_pi" placeholder="Remark PI" required></textarea>
        <br>
        <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Revisi</button>
    </form>
    </div>

    <br>

</div>

<?php } ?>

<hr>


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
$('#tables4').dataTable({
				columnDefs: [{
					"defaultContent": "-",
					"targets": "_all"
				}]
			});
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