<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Basic -->
		<meta charset="UTF-8">

    <link rel="shortcut icon" href="<?= base_url(); ?>assets/images/logo-gonusa.png" />
    <link rel="apple-touch-icon" href="<?= base_url(); ?>assets/images/logo-gonusa.png">
    <title>G-IMPORT</title>
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

    <title>Preview Generated</title>
</head>
<body>


<!-- As a link -->
<!-- <nav class="navbar navbar-light bg-light"> -->
<div class="card">
  <div class="card-body">

  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-1">
           <a class="btn btn-warning" style="width:150px;" href="<?php echo base_url('Cost_Leadtime/Details_CLT_3'); ?>">Back</a>
      </div>
      <div class="col-lg-1">
            <form method="POST" action="<?php echo base_url('Cost_Leadtime/export_excel_3'); ?>">
                <input type="hidden" name="start_years" value="<?php echo $st; ?>">
                <input type="hidden" name="finish_years" value="<?php echo $fh; ?>">
                <button type="submit" style="width:150px;" class="btn btn-success" href="#">Generated</button>        
            </form>
      </div>
    </div>
    <!-- <a class="btn btn-warning" href="<?php echo base_url('Cost_Leadtime/Details_CLT_1'); ?>">Back</a>
    <form method="POST" action="<?php echo base_url('Cost_Leadtime/export_excel_1'); ?>">
        <input type="hidden" name="start_years" value="<?php echo $st; ?>">
        <input type="hidden" name="finish_years" value="<?php echo $fh; ?>">
        <button type="submit" class="btn btn-success" href="#">Generated</button>        
    </form> -->
    <!-- <a class="btn btn-success" href="#">Generated</a> -->
  </div>

</div>
</div>

<!-- </nav> -->


<section class="panel panel-featured panel-featured-primary">
								<header class="panel-heading">
									<div class="panel-actions">
										<a href="#" class="fa fa-caret-down"></a>
										<!-- <a href="#" class="fa fa-times"></a> -->
									</div>

									<h2 class="panel-title"><i class="fa fa-cube"></i> SKP IMPORTATION</h2>
								</header>
	<div class="panel-body">

<!-- Isi Content Preview -->

<div class="card">
  <div class="card-body">
    <h5 style="background-color: black; color:white; padding:8px;">VALUE ( in bn IDR )</h5>

<table class="table table-striped table-bordered" style="text-align:left;" border="1" cellpadding="8">
<thead>
    <tr>
      <!-- <th scope="col">#</th> -->
      <th scope="col">Category</th>
      <th scope="col">Years</th>
      <th scope="col">Value</th>
    </tr>
  </thead>
  <tbody>
  <?php
if(!empty($lt_cat)){
  // Jika data pada database tidak sama dengan empty (alias ada datanya)
$no_urut=1;
  foreach($lt_cat as $gaa){ ?>

<tr>
    <td style="width:80px;"><?php echo $gaa->mt_categori_name; ?></td>
    <td style="width:80px;"><?php echo $gaa->docim_created_years; ?></td>
    <td style="width:80px;"><?php 
    $d=1000000000;
    $val=$gaa->val_cif2/$d; 
    echo number_format($val,10); ?></td>
</tr>
<?php }
  }else{ // Jika data tidak ada
  echo "<tr><td colspan='50'>Data tidak ada</td></tr>";
} ?>
  </tbody>
</table>


  </div>
</div>

<!-- End Value -->

<div class="card">
  <div class="card-body">
    <h5 style="background-color: black; color:white; padding:8px;">LANDED COST ( % )</h5>

<table class="table table-striped table-bordered" style="text-align:left;" border="1" cellpadding="8">
<thead>
    <tr>
      <!-- <th scope="col">#</th> -->
      <th scope="col">Category</th>
      <th scope="col">Years</th>
      <th scope="col">Value</th>
    </tr>
  </thead>
  <tbody>
  <?php
if(!empty($lt_cat)){
  // Jika data pada database tidak sama dengan empty (alias ada datanya)
$no_urut=1;
  foreach($lt_cat as $gaa){ ?>

<tr>
    <td style="width:80px;"><?php echo $gaa->mt_categori_name; ?></td>
    <td style="width:80px;"><?php echo $gaa->docim_created_years; ?></td>
    <td style="width:80px;"><?php 
    $d=$gaa->val_cif2;
    $val=$gaa->val_landed/$d;
    echo number_format($val,2); ?></td>
</tr>
<?php }
  }else{ // Jika data tidak ada
  echo "<tr><td colspan='50'>Data tidak ada</td></tr>";
} ?>
  </tbody>
</table>


  </div>
</div>

<!-- End Landed -->


<div class="card">
  <div class="card-body">
    <h5 style="background-color: black; color:white; padding:8px;">LEAD TIME ( Days )</h5>

<table class="table table-striped table-bordered" style="text-align:left;" border="1" cellpadding="8">
<thead>
    <tr>
      <!-- <th scope="col">#</th> -->
      <th scope="col">Category</th>
      <th scope="col">Years</th>
      <th scope="col">Value</th>
    </tr>
  </thead>
  <tbody>
  <?php
if(!empty($lt_cat)){
  // Jika data pada database tidak sama dengan empty (alias ada datanya)
$no_urut=1;
  foreach($lt_cat as $gaa){ ?>

<tr>
    <td style="width:80px;"><?php echo $gaa->mt_categori_name; ?></td>
    <td style="width:80px;"><?php echo $gaa->docim_created_years; ?></td>
    <td style="width:80px;"><?php 
    // $d=$gaa->val_cif2;
    $val=$gaa->val_leadtime; 
    echo number_format($val,2); ?></td>
</tr>
<?php }
  }else{ // Jika data tidak ada
  echo "<tr><td colspan='50'>Data tidak ada</td></tr>";
} ?>
  </tbody>
</table>


  </div>
</div>


<!-- End Content Preview -->

	</div>
</section>





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


 <!-- Option 1: Bootstrap Bundle with Popper -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
-->
</body>
</html>