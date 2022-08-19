<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>Coa_Print</title>

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
            background-color: #C8E3D4;
            text-align: center;
            /* font-size:11px; */
        }
    </style>

  </head>

  <!-- width : 680 px -->

  <!-- Ukuran Portrait :
    Width : 680px; -->

  <body>


  <h4 style="text-align: center; font-weight:700; font-size:20px;">CERTIFICATE OF ANALYSIS</h4>

<br>
<br>
<table>
<tr>
    <td style="text-align:left; border-width:0.5px; width: 200px; padding:5px; font-size:11px;">
        PRODUCT NAME
    </td>
    <td style="text-align:left; border-width:0.5px; width: 20px; padding:5px; font-size:11px;">
        :
    </td>
    <td style=" vertical-align:bottom; text-align:left; border-width:0.5px; width: 460px; padding:5px; font-size:11px;">
        <?php echo $getrowdetails_coa->ItemName ?>
    </td>
</tr>  
</table>

<table>
<tr>
    <td style="text-align:left; border-width:0.5px; width: 200px; padding:5px; font-size:11px;">
        BATCH NUMBER
    </td>
    <td style="text-align:left; border-width:0.5px; width: 20px; padding:5px; font-size:11px;">
        :
    </td>
    <td style=" vertical-align:bottom; text-align:left; border-width:0.5px; width: 460px; padding:5px; font-size:11px;">
         <?php echo $getrowdetails_coa->detail_coa_batch ?>
    </td>
</tr>  
</table>

<table>
<tr>
    <td style="text-align:left; border-width:0.5px; width: 200px; padding:5px; font-size:11px;">
        PROD DATE - EXP DATE
    </td>
    <td style="text-align:left; border-width:0.5px; width: 20px; padding:5px; font-size:11px;">
        :
    </td>
    <td style=" vertical-align:bottom; text-align:left; border-width:0.5px; width: 460px; padding:5px; font-size:11px;">
        <?php echo $getrowdetails_coa->gexp_qc_production_date ?> - <?php echo $getrowdetails_coa->gexp_qc_expired_date ?>
    </td>
</tr>  
</table>


<table>
<tr>
    <td style="text-align:left; font-weight:bold; border-width:0.5px; width: 250px; padding:5px; font-size:11px;">
        ORGANOLEPTIC  TEST
    </td>
    <!-- <td style="text-align:left; border-width:0.5px; width: 20px; padding:5px;">
        :
    </td>
    <td style=" vertical-align:bottom; text-align:left; border-width:0.5px; width: 460px; padding:5px;">
    CERTIFICATE OF ANALYSIS CERTIFICATE 
    </td> -->
</tr>  
</table>
<table>
<tr>
    <td style="text-align:left; border-width:0.5px; width: 200px; padding:5px; font-size:11px;">
        Aroma
    </td>
    <td style="text-align:left; border-width:0.5px; width: 20px; padding:5px; font-size:11px;">
        :
    </td>
    <td style=" vertical-align:bottom; text-align:left; border-width:0.5px; width: 460px; padding:5px; font-size:11px;">
      <!-- AROMA --><?php echo $getrowdetails_coa->gexp_qc_aroma ?>
    </td>
</tr>  
</table>
<table>
<tr>
    <td style="text-align:left; border-width:0.5px; width: 200px; padding:5px; font-size:11px;">
        Taste
    </td>
    <td style="text-align:left; border-width:0.5px; width: 20px; padding:5px; font-size:11px;">
        :
    </td>
    <td style=" vertical-align:bottom; text-align:left; border-width:0.5px; width: 460px; padding:5px; font-size:11px;">
      <!-- AROMA --><?php echo $getrowdetails_coa->gexp_qc_taste ?>
    </td>
</tr>  
</table>

<table>
<tr>
    <td style="text-align:left; font-weight:bold; border-width:0.5px; width: 250px; padding:5px; font-size:11px;">
        PHYSICAL & CHEMICAL TEST
    </td>
    <!-- <td style="text-align:left; border-width:0.5px; width: 20px; padding:5px;">
        :
    </td>
    <td style=" vertical-align:bottom; text-align:left; border-width:0.5px; width: 460px; padding:5px;">
    CERTIFICATE OF ANALYSIS CERTIFICATE 
    </td> -->
</tr>  
</table>
<table>
<tr>
    <td style="text-align:left; border-width:0.5px; width: 200px; padding:5px; font-size:11px;">
        Moisture
    </td>
    <td style="text-align:left; border-width:0.5px; width: 20px; padding:5px; font-size:11px;">
        :
    </td>
    <td style=" vertical-align:bottom; text-align:left; border-width:0.5px; width: 460px; padding:5px; font-size:11px;">
      <!-- AROMA --> <?php echo $getrowdetails_coa->gexp_qc_moisture ?>
    </td>
</tr>  
</table>
<table>
<tr>
    <td style="text-align:left; border-width:0.5px; width: 200px; padding:5px; font-size:11px;">
        pH
    </td>
    <td style="text-align:left; border-width:0.5px; width: 20px; padding:5px; font-size:11px;">
        :
    </td>
    <td style=" vertical-align:bottom; text-align:left; border-width:0.5px; width: 460px; padding:5px; font-size:11px;">
      <!-- AROMA --> <?php echo $getrowdetails_coa->gexp_qc_ph ?>
    </td>
</tr>  
</table>
<table>
<tr>
    <td style="text-align:left; border-width:0.5px; width: 200px; padding:5px; font-size:11px;">
        Brix
    </td>
    <td style="text-align:left; border-width:0.5px; width: 20px; padding:5px; font-size:11px;">
        :
    </td>
    <td style=" vertical-align:bottom; text-align:left; border-width:0.5px; width: 460px; padding:5px; font-size:11px;">
      <!-- AROMA --> <?php echo $getrowdetails_coa->gexp_qc_brix ?>
    </td>
</tr>  
</table>


<table>
<tr>
    <td style="text-align:left; font-weight:bold; border-width:0.5px; width: 250px; padding:5px; font-size:11px;">
        HEAVY METAL TEST
    </td>
    <!-- <td style="text-align:left; border-width:0.5px; width: 20px; padding:5px;">
        :
    </td>
    <td style=" vertical-align:bottom; text-align:left; border-width:0.5px; width: 460px; padding:5px;">
    CERTIFICATE OF ANALYSIS CERTIFICATE 
    </td> -->
</tr>  
</table>
<table>
<tr>
    <td style="text-align:left; border-width:0.5px; width: 200px; padding:5px; font-size:11px;">
        Mercury (Hg)
    </td>
    <td style="text-align:left; border-width:0.5px; width: 20px; padding:5px; font-size:11px;">
        :
    </td>
    <td style=" vertical-align:bottom; text-align:left; border-width:0.5px; width: 460px; padding:5px; font-size:11px;">
      <!-- AROMA --> <?php echo $getrowdetails_coa->Mercury ?>
    </td>
</tr>  
</table>
<table>
<tr>
    <td style="text-align:left; border-width:0.5px; width: 200px; padding:5px; font-size:11px;">
        Lead (Pb)
    </td>
    <td style="text-align:left; border-width:0.5px; width: 20px; padding:5px; font-size:11px;">
        :
    </td>
    <td style=" vertical-align:bottom; text-align:left; border-width:0.5px; width: 460px; padding:5px; font-size:11px;">
      <!-- AROMA --> <?php echo $getrowdetails_coa->Lead ?>
    </td>
</tr>  
</table>
<table>
<tr>
    <td style="text-align:left; border-width:0.5px; width: 200px; padding:5px; font-size:11px;">
        Cadmium (Cd)
    </td>
    <td style="text-align:left; border-width:0.5px; width: 20px; padding:5px; font-size:11px;">
        :
    </td>
    <td style=" vertical-align:bottom; text-align:left; border-width:0.5px; width: 460px; padding:5px; font-size:11px;">
      <!-- AROMA --> <?php echo $getrowdetails_coa->Cadmium ?>
    </td>
</tr>  
</table>
<table>
<tr>
    <td style="text-align:left; border-width:0.5px; width: 200px; padding:5px; font-size:11px;">
        Tin (Sn)
    </td>
    <td style="text-align:left; border-width:0.5px; width: 20px; padding:5px; font-size:11px;">
        :
    </td>
    <td style=" vertical-align:bottom; text-align:left; border-width:0.5px; width: 460px; padding:5px; font-size:11px;">
      <!-- AROMA --> <?php echo $getrowdetails_coa->Tin ?>
    </td> 
</tr>  
</table>
<table>
<tr>
    <td style="text-align:left; border-width:0.5px; width: 200px; padding:5px; font-size:11px;">
        Arsenic (As)
    </td>
    <td style="text-align:left; border-width:0.5px; width: 20px; padding:5px; font-size:11px;">
        :
    </td>
    <td style=" vertical-align:bottom; text-align:left; border-width:0.5px; width: 460px; padding:5px; font-size:11px;">
      <!-- AROMA -->  <?php echo $getrowdetails_coa->Arsenic ?>
    </td>
</tr>  
</table>


<table>
<tr>
    <td style="text-align:left; font-weight:bold; border-width:0.5px; width: 250px; padding:5px; font-size:11px;">
        MICROBIOLOGY TEST
    </td>
    <!-- <td style="text-align:left; border-width:0.5px; width: 20px; padding:5px;">
        :
    </td>
    <td style=" vertical-align:bottom; text-align:left; border-width:0.5px; width: 460px; padding:5px;">
    CERTIFICATE OF ANALYSIS CERTIFICATE 
    </td> -->
</tr>  
</table>
<table>
<tr>
    <td style="text-align:left; border-width:0.5px; width: 200px; padding:5px; font-size:11px;">
        Salmonella sp
    </td>
    <td style="text-align:left; border-width:0.5px; width: 20px; padding:5px; font-size:11px;">
        :
    </td>
    <td style=" vertical-align:bottom; text-align:left; border-width:0.5px; width: 460px; padding:5px; font-size:11px;">
      <!-- AROMA --> <?php echo $getrowdetails_coa->gexp_qc_salmonella ?>
    </td>
</tr>  
</table>
<table>
<tr>
    <td style="text-align:left; border-width:0.5px; width: 200px; padding:5px; font-size:11px;">
        Total Plate Count
    </td>
    <td style="text-align:left; border-width:0.5px; width: 20px; padding:5px; font-size:11px;">
        :
    </td>
    <td style=" vertical-align:bottom; text-align:left; border-width:0.5px; width: 460px; padding:5px; font-size:11px;">
      <!-- AROMA --> <?php echo $getrowdetails_coa->gexp_qc_total_plate_count ?>
    </td>
</tr>  
</table>
<table>
<tr>
    <td style="text-align:left; border-width:0.5px; width: 200px; padding:5px; font-size:11px;">
        Mold & Yeast
    </td>
    <td style="text-align:left; border-width:0.5px; width: 20px; padding:5px; font-size:11px;">
        :
    </td>
    <td style=" vertical-align:bottom; text-align:left; border-width:0.5px; width: 460px; padding:5px; font-size:11px;">
      <!-- AROMA --> <?php echo $getrowdetails_coa->gexp_qc_yeast_mold ?>
    </td>
</tr>  
</table>

<br>
<br>
<br>

<table>
<tr>
    <td style="text-align:left; border-width:0.5px; width: 70px; padding:5px; font-size:11px;">
        
    </td>
    <td style="text-align:left; border-width:0.5px; width: 200px; padding:5px; font-size:11px;">
        12 January 2022
    </td>
</tr>  
</table>

<br>
<br>
<br>

<table style="width:100%;">
<tr>
    <td style="text-align:left; border-width:0.5px; width: 3%; padding:5px; font-size:11px;">
        
    </td>
    <td style="text-align:left; border-width:0.5px; width: 200px; padding:5px; font-size:11px;">
        Slamet Supriyadi
    </td>
</tr>
<tr>
    <td style="text-align:left; border-width:0.5px; padding:5px; font-size:11px;">
    </td>
    <td style="text-align:left; font-weight:bold; border-width:0.5px; width: 20%; padding:5px; font-size:11px;">
        QA Manager
    </td>
</tr>    
</table>
<br>
<br>

<table>
<tr>
    <td style="text-align:left; border-width:0.5px; width: 500px; padding:5px; font-size:11px;">
        Inv No : <?php echo $getrowdetails_coa->gexp_invoice_no ?>
    </td>
</tr>
<tr>
    <td style="text-align:left;  border-width:0.5px; width: 500px; padding:5px; font-size:11px;">
        QA No : <?php echo $getrowdetails_coa->gexp_coa_no ?>
    </td>
</tr>    
</table>

<br>

<table style="border-width:2px; width:100%; border:dotted;">
<tr>
    <td style="text-align:left; border-width:0.5px; padding:5px; font-size:11px;">
        This Information contained in this document is confidential and propriatery information of PT. Sumber Kopi Prima. Any altering of this information 
        <br> without express written permission of PT. Sumber Kopi Prima in expressly forbidden. <br><br> This document is valid therefore without signature.
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