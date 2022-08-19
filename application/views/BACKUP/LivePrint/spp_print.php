<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous"> -->

    <title>Surat_Penyataan_Produk_Print</title>

    <style>
        table{
            border-collapse:collapse;  
            overflow: wrap;
        }
        td{
            border-collapse: collapse; 
            padding:5px;
            text-align: center;
            /* font-size:11px; */
        }
        .pre-line{
             white-space: pre-line;
        }
        .th{
            /* background-color: #C8E3D4; */
            text-align: center;
            /* font-size:11px; */
        }
    </style>

  </head>

  <!-- width : 680 px -->

  <!-- Ukuran Portrait :
    Width : 680px; -->

  <body>


  <h4 style="text-align: center; font-weight:700; font-size:20px;">SURAT PERNYATAAN PRODUK</h4>
  
  <br>

<table style="width: 100%; text-align:left; font-size:14px;">
  <tr>
      <td  style="text-align:left;">
      Yang bertanda tangan dibawah ini :<br>
      </td>
  </tr>
</table>
<br>
<table>
<tr>
    <td style="text-align:left; border-width:0.5px; width: 200px; padding:5px; font-size:14px;">
        Nama
    </td>
    <td style="text-align:left; border-width:0.5px; width: 20px; padding:5px; font-size:14px;">
        :
    </td>
    <td style="vertical-align:bottom; text-align:left; border-width:2px; width: 460px; padding:5px; font-size:14px;">
      <!-- AROMA --> <?php echo $rowdetailspp->gexp_spp_nama ?>
    </td>
</tr>  
</table>
<table style="font-size:14px;">
<tr>
    <td style="text-align:left; border-width:0.5px; width: 200px; padding:5px;">
        Jabatan
    </td>
    <td style="text-align:left; border-width:0.5px; width: 20px; padding:5px;">
        :
    </td>
    <td style="vertical-align:bottom; text-align:left; border-width:2px; width: 460px; padding:5px;">
      <!-- AROMA --> <?php echo $rowdetailspp->gexp_spp_jabatan ?>
    </td>
</tr>  
</table>
<br>
<table style="width: 100%; text-align:left; font-size:14px;">
  <tr>
      <td  style="text-align:left;">
      Menyatakan bahwa produk sebagai berikut :<br>
      </td>
  </tr>
</table>

<br>
<table style="width: 100%; text-align:left; font-size:14px;">
  <tr>
      <td style="text-align:center; width:60%; border-width:0.5px; border:solid;">
         PRODUK LOKAL  
      </td>
      <td style="text-align:center; width:40%; border-width:0.5px; border:solid;">
         PRODUK EKSPOR  
      </td>
  </tr>
</table>
<table style="width: 100%; text-align:left; font-size:14px;">
  <tr>
      <td style="text-align:center; width:20%; font-weight:bold; border-width:0.5px; border:solid;">
         Nama Dagang 
      </td>
      <td style="text-align:center; width:20%; font-weight:bold; border-width:0.5px; border:solid;">
         Nama Jenis  
      </td>
      <td style="text-align:center; width:20%; font-weight:bold; border-width:0.5px; border:solid;">
         No MD  
      </td>
      <td style="text-align:center; width:20%; font-weight:bold; border-width:0.5px; border:solid;">
         Nama Dagang  
      </td>
      <td style="text-align:center; width:20%; font-weight:bold; border-width:0.5px; border:solid;">
         Nama Jenis  
      </td>
  </tr>
</table>
<table style="width: 100%; text-align:left; font-size:12px;">
<?php
if( ! empty($getlistdetails_spp)){
  // Jika data pada database tidak sama dengan empty (alias ada datanya)
$no_urut=1;
  foreach($getlistdetails_spp as $gaa){
?>
  <tr>
      <td style="text-align:center; width:20%; border-width:0.5px; border:solid;">
            <?php echo $gaa->spp_nama_dagang_lokal ?> 
      </td>
      <td style="text-align:left; width:20%; border-width:0.5px; border:solid;">
            <?php echo $gaa->spp_nama_jenis_lokal ?> 
      </td>
      <td style="text-align:center; width:20%; border-width:0.5px; border:solid;">
            <?php echo $gaa->spp_no_md_lokal ?> 
      </td>
      <td style="text-align:center; width:20%; border-width:0.5px; border:solid;">
            <?php echo $gaa->spp_nama_dagang_ekspor ?> 
      </td>
      <td style="text-align:center; width:20%; border-width:0.5px; border:solid;">
              <?php echo $gaa->spp_nama_jenis_ekspor ?> 
      </td>
  </tr>
<?php
}
}else{ // Jika data tidak ada
  echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
}
?>

</table>

<br>
<table style="width: 100%; text-align:left; font-size:14px;">
  <tr>
      <td style="text-align:left;">
            <?php echo $rowdetailspp->gexp_spp_description ?>
      </td>
  </tr>
</table>

<br>
<table style="width: 100%; text-align:left; font-size:14px;">
  <tr>
      <td style="text-align:left; font-size:14px;">
        <?php $date = date_create($rowdetailspp->gexp_spp_date); ?>
         Kudus, <?php echo indonesian_date(date_format($date,"Y-m-d")); ?>
      </td>
  </tr>
</table>

<br>
<br>
<br>
<table style="width: 100%; text-align:left; font-size:14px;">
  <tr>
      <td style="text-align:left;">
        <?php //echo $rowdetailspp->gexp_spp_nama ?>
        Slamet Supriyadi
      </td>
  </tr>
  <tr>
      <td style="text-align:left;">
        <?php //echo $rowdetailspp->gexp_spp_jabatan ?>
        QA Manager
      </td>
  </tr>
</table>

  






    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    -->
  </body>
</html>