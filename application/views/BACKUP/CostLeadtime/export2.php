<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Preview Generated</title>
</head>
<body>


<!-- As a link -->
<!-- <nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <a class="btn btn-warning" href="#">Back</a>
    <a class="btn btn-success" href="#">Generated</a>
  </div>
</nav> -->





<table  class="table table-striped" style="text-align:left;" border="1" cellpadding="8">
<!-- <tr> -->

<tr>
    <th style="padding:8;">
        GENERATE
    </th>
    <th style="padding:8;">
        PTB Importation
    </th>
</tr>
<tr>
    <th style="padding:8;">
        Reg
    </th>
    <th style="padding:8;">
        <?php echo NOW; ?>
    </th>
</tr>

<tr></tr>

<!-- <p style="background-color: black; color:white; padding:8;">VALUE ( in bn IDR )</p> -->

<tr>
    <th style="background-color: black; color:white; padding:8;">
        VALUE ( in bn IDR )
    </th>
</tr>

<tr>
    <th>Category</th>
    <th>Years</th>
    <th>Value</th>
</tr>

<?php
if(!empty($lt_cat)){
  // Jika data pada database tidak sama dengan empty (alias ada datanya)
$no_urut=1;
  foreach($lt_cat as $gaa){ ?>

<tr>
    <td width="80px;" style="width:80px;"><?php echo $gaa->mt_categori_name; ?></td>
    <td style="width:80px; background-color: black; color:white;"><?php echo $gaa->docim_created_years; ?></td>
    <td style="width:80px;"><?php 
    $d=1000000000;
    $val=$gaa->val_cif2/$d; 
    echo number_format($val,10); ?></td>
</tr>
<?php }
  }else{ // Jika data tidak ada
  echo "<tr><td colspan='50'>Data tidak ada</td></tr>";
} ?>
<!-- </tr> -->
   
</table>


<table style="text-align:left;" border="1" cellpadding="8">

<!-- <p style="background-color: black; color:white; padding:8;">LANDED COST ( % )</p> -->
<tr>
    <th style="background-color: black; color:white; padding:8;">
        LANDED COST ( % )
    </th>
</tr>

<tr>
    <th>Category</th>
    <th>Years</th>
    <th>Value</th>
</tr>

<?php
if(!empty($lt_cat)){
  // Jika data pada database tidak sama dengan empty (alias ada datanya)
$no_urut=1;
  foreach($lt_cat as $gaa){ ?>

<tr>
    <td><?php echo $gaa->mt_categori_name; ?></td>
    <td style="background-color: black; color:white;"><?php echo $gaa->docim_created_years; ?></td>
    <td style="width:200px;"><?php 
        $d=$gaa->val_cif2;
        $val=$gaa->val_landed/$d;
    echo number_format($val,2); ?></td>
</tr>
<?php }
  }else{ // Jika data tidak ada
  echo "<tr><td colspan='50'>Data tidak ada</td></tr>";
} ?>
   
</table>


<table style="text-align:left;" border="1" cellpadding="8">

<!-- <p style="background-color: black; color:white; padding:8;">LEAD TIME ( Days )</p> -->

<tr>
    <th style="background-color: black; color:white; padding:8;">
        LEAD TIME ( Days )
    </th>
</tr>

<tr>
    <th>Category</th>
    <th>Years</th>
    <th>Value</th>
</tr>

<?php
if(!empty($lt_cat)){
  // Jika data pada database tidak sama dengan empty (alias ada datanya)
$no_urut=1;
  foreach($lt_cat as $gaa){ ?>

<tr>
    <td><?php echo $gaa->mt_categori_name; ?></td>
    <td style="background-color: black; color:white;"><?php echo $gaa->docim_created_years; ?></td>
    <td style="width:200px;"><?php 
    // $d=$gaa->val_cif2;
    $val=$gaa->val_leadtime; 
    echo number_format($val,2); ?></td>
</tr>
<?php }
  }else{ // Jika data tidak ada
  echo "<tr><td colspan='50'>Data tidak ada</td></tr>";
} ?>
   
</table>


 <!-- Option 1: Bootstrap Bundle with Popper -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
-->
</body>
</html>