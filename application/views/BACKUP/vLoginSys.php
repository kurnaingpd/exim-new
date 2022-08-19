<!-- <form method="POST" action="<?php echo base_url('LoginSys/doLogin');?>">
    <p>Root Mode</p>
        <input type="text" name="username" placeholder="Username">
    <br>
        <input type="password" name="password" placeholder="Password">
    <br>
        <input type="submit">
</form> -->

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title>Gonusa Export</title>
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/images/logo-gonusa.png" />
    <link rel="apple-touch-icon" href="<?= base_url(); ?>assets/images/logo-gonusa.png">

  <!-- plugins:css -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/start/vendors/feather/feather.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/start/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/start/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/start/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/start/vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/start/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
   <!-- Plugin css for this page -->
   <link rel="stylesheet" href="<?= base_url(); ?>assets/start/vendors/select2/select2.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/start/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/start/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?= base_url(); ?>assets/img/GAPLOGO1.png" />

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> -->

<style>
/* .loader {
  flex: 1;
  border: 16px solid #f3f3f3;4A47A3
  margin-top: 80px;
  border: 16px solid #4A47A3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite; Safari
  animation: spin 2s linear infinite;
}

Safari
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
} */

body{
    background: #185ADB;
    text-align: left;
}

.swal2-popup {
  /* font-size: 1.6rem !important; */
  font-family: Georgia, serif;
  height: 80%;
  font-size: 8px;
  /* padding-top: 50px; */
    /* width: 80px;
    height: 80px;
    border: 4px solid gray;
    -webkit-border-radius: 40px;
    border-radius: 40px;
    border-radius: 50%;
    margin: 20px auto;
    padding: 0;
    position: relative;
    box-sizing: content-box; */
}

/* .swal-icon{
  width: 20px;
  height: 20px;
  padding-top: 20px;
} */

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

#myDiv {
  display: none;
  /* text-align: center; */
}

.card{
    margin-top: 130px;
    width: 500px;
    background-image: url('assets/purple-angle-electronics.png');
    background-position: cover;
    /* background: #EFF8FF; */
    padding: 30px;
    border-radius: 20px;
    color:#01005E;
}

.form-control{
    border-radius: 20px;
}


/* The snackbar - position it at the bottom and in the middle of the screen */
#snackbar {
  visibility: hidden; /* Hidden by default. Visible on click */
  min-width: 250px; /* Set a default minimum width */
  margin-left: -125px; /* Divide value of min-width by 2 */
  background-color: #DA0037; /* Black background color */
  color: #fff; /* White text color */
  text-align: center; /* Centered text */
  border-radius: 2px; /* Rounded borders */
  padding: 16px; /* Padding */
  position: fixed; /* Sit on top of the screen */
  z-index: 1; /* Add a z-index if needed */
  left: 50%; /* Center the snackbar */
  bottom: 210px; /* 30px from the bottom */
}

/* Show the snackbar when clicking on a button (class added with JavaScript) */
#snackbar.show {
  visibility: visible; /* Show the snackbar */
  /* Add animation: Take 0.5 seconds to fade in and out the snackbar.
  However, delay the fade out process for 2.5 seconds */
  -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
  animation: fadein 0.5s, fadeout 0.5s 2.5s;
  font-size: 18px;
}

/* The snackbar - position it at the bottom and in the middle of the screen */
#snackbar02 {
  visibility: hidden; /* Hidden by default. Visible on click */
  min-width: 250px; /* Set a default minimum width */
  margin-left: -125px; /* Divide value of min-width by 2 */
  background-color: #7BC74D; /* Black background color */
  color: #fff; /* White text color */
  text-align: center; /* Centered text */
  border-radius: 2px; /* Rounded borders */
  padding: 16px; /* Padding */
  position: fixed; /* Sit on top of the screen */
  z-index: 1; /* Add a z-index if needed */
  left: 50%; /* Center the snackbar */
  bottom: 210px; /* 30px from the bottom */
}

/* Show the snackbar when clicking on a button (class added with JavaScript) */
#snackbar02.scc {
  visibility: visible; /* Show the snackbar */
  /* Add animation: Take 0.5 seconds to fade in and out the snackbar.
  However, delay the fade out process for 2.5 seconds */
  -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
  animation: fadein 0.5s, fadeout 0.5s 2.5s;
  font-size: 18px;
}

/* Animations to fade the snackbar in and out */
@-webkit-keyframes fadein {
  from {bottom: 0; opacity: 0;}
  to {bottom: 210px; opacity: 1;}
}

@keyframes fadein {
  from {bottom: 0; opacity: 0;}
  to {bottom: 210px; opacity: 1;}
}

@-webkit-keyframes fadeout {
  from {bottom: 210px; opacity: 1;}
  to {bottom: 0; opacity: 0;}
}

@keyframes fadeout {
  from {bottom: 210px; opacity: 1;}
  to {bottom: 0; opacity: 0;}
}

.content-wrapper{
  background-color: #185ADB;
}

.Login_Error.sa{
    padding: 20px;
    font-size: 12px;
}

.swal{
    background-color: #01005E;
}

</style>

</head>

<body onload="myFunction()" style="margin:0;">


<center>
    <div id="loader"></div>
    <!-- <p>Please Wait</p> -->
</center>

<div style="display:none;" id="myDiv" class="animate-bottom">

<!-- <div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">GAPARA CONNECTS</h1>
    <p class="lead">Account Login</p>
  </div>
</div> -->


<!-- Notifications -->

<?php
  if($this->session->flashdata('warns') != null){
?>

<script>
  Swal.fire({
        icon: 'error',
        title: 'Failed',
        text: '<?php echo $this->session->flashdata('warns') ?>',
        // imageUrl: "<?php echo 'assets/images/gexim-new-icc.png' ?>",
        imageWidth: 400,
        imageHeight: 150,
        fontsize:8,
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
        imageWidth: 600,
        imageHeight: 600,
        fontsize:8,
        // footer: '<a href="">Why do I have this issue?</a>'
      });
</script>

<?php
 }
?>


<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0" style="border-radius: 10px;">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5" style="border-radius: 10px;">
              <div class="brand-logo">
                <img style="width: 200px; margin-top:-40px;" src="<?= base_url(); ?>assets/images/gexim-new-board.png" alt="logo">
              </div>
              <h4 style="color:#01005E; font-weight:700; font-size:20px; margin-top:-60px;">Gonusa Export</h4>
              <h6 class="fw-light">Sign in to continue.</h6>

                  <!-- <div class="alert alert-danger">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<strong>Sign In Failed, </strong><a href="" class="alert-link"></a> check your <strong>Username</strong> Dan <strong>Password</strong>
									</div> -->

              <form class="pt-2 pb-3" method="POST" action="<?php echo base_url('LoginSys/doLogin');?>">
                <div class="form-group">
                  <label>Username :</label>
                  <input type="text" class="form-control form-control-lg" name="username" placeholder="Username">
                </div>
                <div class="form-group">
                  <label>Password:</label>
                  <input type="password" class="form-control form-control-lg" name="password" placeholder="Password">
                </div>

                <!-- <div class="form-group">
                    <label>Company :</label>
                    <select class="form-control form-control-lg js-example-basic-single w-100" style="width: 100%;">
                      <option value="">-- Select Company --</option>
                      <option value="AL">PT TRAX</option>
                      <option value="WY">PT SKYHIGH</option>
                      <option value="AM">PT REALIZE</option>
                      <option value="CA">PT CAMARO</option>
                      <option value="RU">CV SUMBER JAYA</option>
                    </select>
                </div> -->


                <div class="mt-3">
                  <button type="submit" style="background-color: #FFB830; color:#01005E; font-weight:bold;" class="btn btn-block btn-lg font-weight-medium auth-form-btn" href="#">SIGN IN  <i style="font-size: 16px;" class="mdi mdi-login"></i></button>
                  <!-- <a href="#" id="b">Clicks</a> -->
                </div>

                <!-- <div class="scc"></div> -->
                <!-- <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Keep me signed in
                    </label>
                  </div>
                  <a href="#" class="auth-link text-black">Forgot password?</a>
                </div>
                <div class="mb-2">
                  <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                    <i class="ti-facebook me-2"></i>Connect using facebook
                  </button>
                </div>
                <div class="text-center mt-4 fw-light">
                  Don't have an account? <a href="register.html" class="text-primary">Create</a>
                </div> -->
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->




</div>


<script>
var myVar;

function myFunction() {
  myVar = setTimeout(showPage, 3000);
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("myDiv").style.display = "block";
}


function snacksbar() {
  // Get the snackbar DIV
  var x = document.getElementById("snackbar");

  // Add the "show" class to DIV
  x.className = "show";

  // After 3 seconds, remove the show class from DIV
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 6000);
}


function snacksbar02() {
  // Get the snackbar DIV
  var x = document.getElementById("snackbar02");

  // Add the "show" class to DIV
  x.className = "scc";

  // After 3 seconds, remove the scc class from DIV
  setTimeout(function(){ x.className = x.className.replace("scc", ""); }, 6000);
}

$(document).ready(function(){
  $("#buttt").click(function(){
    $.load(function(){
      showPage();
    });
  });
});


$(document).ready(function(){
  $("#b").click(function(){
    $.load(function(){
      snacksbar02()
    });
  });
});

</script>

<script>
$("#login").click(function(){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Something went wrong!',
        });
});
</script>

</body>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

  <!-- plugins:js -->
  <script src="<?= base_url(); ?>assets/start/vendors/js/vendor.bundle.base.js"></script>
  <script src="<?= base_url(); ?>assets/start/vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="<?= base_url(); ?>assets/start/vendors/select2/select2.min.js"></script>
  <script src="<?= base_url(); ?>assets/start/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="<?= base_url(); ?>assets/start/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="<?= base_url(); ?>assets/start/js/off-canvas.js"></script>
  <script src="<?= base_url(); ?>assets/start/js/hoverable-collapse.js"></script>
  <script src="<?= base_url(); ?>assets/start/js/template.js"></script>
  <script src="<?= base_url(); ?>assets/start/js/settings.js"></script>
  <script src="<?= base_url(); ?>assets/start/js/todolist.js"></script>
  <!-- endinject -->
   <!-- Custom js for this page-->
   <script src="<?= base_url(); ?>assets/start/js/file-upload.js"></script>
  <script src="<?= base_url(); ?>assets/start/js/typeahead.js"></script>
  <script src="<?= base_url(); ?>assets/start/js/select2.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


  <!-- End custom js for this page-->
  <!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->
  <!-- <script>
  $(document).ready(function() {
      $('.js-basic-single').select2();
  });
  </script> -->

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    -->
  </body>
</html>
