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


<style>

body{
    background: #185ADB;
    text-align: left;
}

.swal2-popup {
  font-family: Georgia, serif;
  height: 80%;
  font-size: 8px;
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

#myDiv {
  display: none;
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

.layout{
    width: 100vw;
    height: 100vh;
    background-color: #172774;
}

.headtext{
    color: #172774;
    text-align: center;
    font-size: 4vh;
}

.envir{
    display: flex;
    flex-direction: row;
    justify-content: center;
}

.chl{
    width: 30%;
    margin: 2vh;
    font-size: 10vh;
    text-decoration: none;
}

.ctc{
    width: 80vh;
}

.ctp{
    justify-content: center;
}

.card-img-top{
    width: 30vh;
    height: 30vh;
    /* justify-content: center; */
}

.chl .title{
    text-align: center;
    font-size: 3vh;
    font-weight: 700;
    height: 50px;
    padding:10px;
    border-style: solid;
    border-color: #172774;
    background-color: #172774;
    color: white;
    border-radius: 10px;
    text-decoration: none;
}

.lnk{
    text-decoration: none;
}

@media (max-width: 576px) { 

.envir{
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.chl{
    width: 100%;
    margin: 2vh;
}

}

</style>

</head>

<body onload="myFunction()" style="margin:0;">


<center>
    <div id="loader"></div>
</center>

<div style="display:none;" id="myDiv" class="animate-bottom">


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
      });
</script>

<?php
 }
?>


<div class="layout">
            <nav class="navbar navbar-light bg-light">
                  <a class="navbar-brand" href="#">
                    <img src="<?= base_url(); ?>assets/images/gexim-new-icc.png" alt="" width="200" height="70">
                  </a>
            </nav>

            <br>

            <div class="headtext">
            <div class="card">
                    <div class="card-body">
                      Select Your Applications
                    </div>
            </div>
            </div>

            <br>

            <div class="envir">
                    <div class="chl">
                            
                                    <a href="<?php echo base_url('LoginSys/');?>" class="lnk">
                                        <div class="card">
                                            <center><img src="<?= base_url(); ?>assets/images/gexim-new-board.png" class="card-img-top" alt="..."></center>
                                        <div class="card-body">
                                        <p class="card-text title">GEXPORT</p>
                                        </div>
                                        </div>
                                    </a>

                    </div>
                    <div class="chl">
                            
                                    <a href="<?php echo base_url('LoginImport/');?>" class="lnk">
                                    <div class="card">
                                        <center><img src="<?= base_url(); ?>assets/images/gexim-new-board.png" class="card-img-top" alt="..."></center>
                                    <div class="card-body">
                                    <p class="card-text title">GIMPORT</p>
                                    </div>
                                    </div>
                                    </a>

                    </div>
            </div>

</div>





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

  </body>
</html>
