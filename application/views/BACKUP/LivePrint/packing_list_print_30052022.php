<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous"> -->

    <title>Packing_list_Print</title>

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
        /* .pre-line{
             white-space: pre-line;
        } */
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


  <p style="text-align: center; font-weight:bold; font-size:20px; margin-bottom:-50px; text-decoration:underline;">PACKING LIST</p>
  <p style="text-align: center; font-weight:bold; margin-top:0px;"><?php echo $detailsdata_printpack->gexp_packlist_number; ?></p>

  <!-- <table style="text-align:center; margin-top:-50px;">
  <tr style="text-align:center; margin-top:-20px;">
      <td  style="text-align:center; margin-top:-20px;">
      <?php echo $detailsdata_printpack->gexp_packlist_number; ?><br>
      </td>
  </tr>
</table> -->



<table>
<tr>
    <td style="text-align:left; font-weight:bold; border-width:0.5px; width: 200px; padding:5px; font-size:11px;">
        INVOICE NO 
    </td>
    <td style="text-align:left; border-width:0.5px; width: 20px; padding:5px; font-size:11px;">
        :
    </td>
    <td style="vertical-align:bottom; text-align:left; border-width:2px; width: 460px; padding:5px; font-size:11px;">
      <!-- AROMA --> <?php echo $detailsdata_printpack->gexp_invoice_no; ?>
    </td>
</tr>  
</table>

<table>
<tr>
    <td style="text-align:left; border-width:0.5px; width: 200px; padding:5px; font-size:11px;">
        PO 
    </td>
    <td style="text-align:left; border-width:0.5px; width: 20px; padding:5px; font-size:11px;">
        :
    </td>
    <td style="vertical-align:bottom; text-align:left; border-width:2px; width: 460px; padding:5px; font-size:11px;">
      <!-- AROMA --> <?php echo $detailsdata_printpack->gexp_pi_po; ?>
    </td>
</tr>  
</table>

<table>
<tr>
    <td style="text-align:left; border-width:0.5px; width: 200px; padding:5px; font-size:11px;">
        CONSIGNEE 
    </td>
    <td style="text-align:left; border-width:0.5px; width: 20px; padding:5px; font-size:11px;">
        :
    </td>
    <td style="vertical-align:bottom; text-align:left; border-width:2px; width: 460px; padding:5px; font-size:11px;">
      <!-- AROMA --> <?php echo $detailsdata_printpack->ConsigPT; ?> <br> <?php echo $detailsdata_printpack->ConsigAddr; ?> <br> <?php echo $detailsdata_printpack->ConsigCtPhone; ?> <br> <?php echo $detailsdata_printpack->ConsigCtName; ?>
    </td>
</tr>  
</table>

<table>
<tr>
    <td style="text-align:left; border-width:0.5px; width: 200px; padding:5px; font-size:11px;">
        SHIPPER 
    </td>
    <td style="text-align:left; border-width:0.5px; width: 20px; padding:5px; font-size:11px;">
        :
    </td>
    <td style="vertical-align:bottom; text-align:left; border-width:2px; width: 460px; padding:5px; font-size:11px;">
      <!-- AROMA --> <?php echo $detailsdata_printpack->BenePT; ?> <br> <?php echo $detailsdata_printpack->BeneAddr; ?> <br> <?php echo $detailsdata_printpack->BeneCtPhone; ?> <br> <?php echo $detailsdata_printpack->BeneCtName; ?>
    </td>
</tr>  
</table>

<table>
<tr>
    <td style="text-align:left; border-width:0.5px; width: 200px; padding:5px; font-size:11px;">
        PORT OF DISCHARGE 
    </td>
    <td style="text-align:left; border-width:0.5px; width: 20px; padding:5px; font-size:11px;">
        :
    </td>
    <td style="vertical-align:bottom; text-align:left; border-width:2px; width: 460px; padding:5px; font-size:11px;">
      <!-- AROMA --><?php echo $detailsdata_printpack->DischargeCust; ?>
    </td>
</tr>  
</table>

<table>
<tr>
    <td style="text-align:left; border-width:0.5px; width: 200px; padding:5px; font-size:11px;">
        PORT OF LOADING 
    </td>
    <td style="text-align:left; border-width:0.5px; width: 20px; padding:5px; font-size:11px;">
        :
    </td>
    <td style="vertical-align:bottom; text-align:left; border-width:2px; width: 460px; padding:5px; font-size:11px;">
        <!-- AROMA --> <?php echo $detailsdata_printpack->LoadPortDesc; ?>
    </td>
</tr>  
</table>

<table>
<tr>
    <td style="text-align:left; border-width:0.5px; width: 200px; padding:5px; font-size:11px;">
        COUNTRY OF ORIGIN 
    </td>
    <td style="text-align:left; border-width:0.5px; width: 20px; padding:5px; font-size:11px;">
        :
    </td>
    <td style="vertical-align:bottom; text-align:left; border-width:2px; width: 460px; padding:5px; font-size:11px;">
        Indonesia
        <!-- AROMA <?php echo $detailsdata_printpack->CountryName; ?> -->
    </td>
</tr>  
</table>
<br>

<table style="font-size: 11px;">
<tr>
    <td class="th" style=" border:solid; border-width:0.5px; font-size:11px;">
        NO
    </td>
<?php if($print_check[0]->inv_print_carton_barcode=='1'){?>
    <td style=" font-size: 11px; border:solid; border-width:0.5px;">
        CARTOON BARCODE
    </td>
<?php } ?>
    <td class="th" style=" border:solid; border-width:0.5px; font-size:11px;">
        DESCRIPTION OF GOODS
    </td>
    <td class="th" style=" border:solid; border-width:0.5px; font-size:11px;">
        HS CODE
    </td>
    <td class="th" style=" border:solid; border-width:0.5px; font-size:11px;">
        PACKING
    </td>
    <td class="th" style=" border:solid; border-width:0.5px; font-size:11px;">
        QTY
    </td>
<?php if($print_check[0]->inv_print_batch=='1'){?>
    <td style=" font-size: 11px; border:solid; border-width:0.5px;">
        BATCH
    </td>
<?php } ?>
<?php if($print_check[0]->inv_print_expired_date=='1'){?>
    <td style=" font-size: 11px; border:solid; border-width:0.5px;">
        EXP DATE
    </td>
<?php } ?>
<?php if($print_check[0]->inv_print_production_date=='1'){?>
    <td style=" font-size: 11px; border:solid; border-width:0.5px;">
        PRODUCTION DATE
    </td>
<?php } ?>
    <td class="th" style=" border:solid; border-width:0.5px; font-size:11px;">
        NET WEIGHT
    </td>
    <td class="th" style=" border:solid; border-width:0.5px; font-size:11px;">
        GROSS WEIGHT
    </td>
    <td class="th" style=" border:solid; border-width:0.5px; font-size:11px;">
        TOTAL MEASUREMENT (CBM)
    </td>
    <td class="th" style=" border:solid; border-width:0.5px; font-size:11px;">
        DIMENSION EACH CARTON ( MM )
    </td>
</tr>

<?php
if(!empty($lsdetails_data)){
  // Jika data pada database tidak sama dengan empty (alias ada datanya)
$no_urut=1;
  foreach($lsdetails_data as $gaa){ ?>

<tr>
    <td style=" border:solid; border-width:0.5px; font-size:11px;" class="pre-line">
        <?php echo $no_urut++; ?>
    </td>
<?php if($print_check[0]->inv_print_carton_barcode=='1'){?>
    <td style=" border:solid; border-width:0.5px; font-size:11px;" class="pre-line">
         <?php echo $gaa->gexp_packlistdet_carton_bar; ?>
    </td>
<?php } ?>
    <td style=" border:solid; border-width:0.5px; font-size:11px;" class="pre-line">
        <?php echo $gaa->gexp_packlistdet_descgod; ?>
    </td>
    <td style=" border:solid; border-width:0.5px; font-size:11px;" class="pre-line">
        <?php echo $gaa->gexp_packlistdet_hscode; ?>
    </td>
    <td style=" border:solid; border-width:0.5px; font-size:11px;" class="pre-line">
        <?php echo $gaa->gexp_packlistdet_packing; ?>
    </td>
    <td style=" border:solid; border-width:0.5px; font-size:11px;" class="pre-line">
        <?php echo $gaa->gexp_packlistdet_qty; ?>
    </td>
<?php if($print_check[0]->inv_print_batch=='1'){?>
    <td style=" border:solid; border-width:0.5px; font-size:11px;" class="pre-line">
        <?php echo $gaa->gexp_packlistdet_batch; ?>
    </td>
<?php } ?>
<?php if($print_check[0]->inv_print_expired_date=='1'){?>
    <td style=" border:solid; border-width:0.5px; font-size:11px;" class="pre-line">
        <?php echo $gaa->gexp_packlistdet_expdate; ?>
    </td>
<?php } ?>
<?php if($print_check[0]->inv_print_production_date=='1'){?>
    <td style=" border:solid; border-width:0.5px; font-size:11px;" class="pre-line">
        <?php echo $gaa->gexp_packlistdet_proddate; ?>
    </td>
<?php }else{

} ?>
    <td style=" border:solid; border-width:0.5px; font-size:11px;" class="pre-line">
        <?php //echo $gaa->ItemNetWeight; ?>
        <?php echo $gaa->gexp_packlistdet_netweight; ?>
    </td>
    <td style=" border:solid; border-width:0.5px; font-size:11px;" class="pre-line">
        <?php //echo $gaa->ItemGrossWeight; ?>
        <?php echo $gaa->gexp_packlistdet_grossweight; ?>
    </td>
    <td style=" border:solid; border-width:0.5px; font-size:11px; width:200px;" class="pre-line">
        <?php
        $m=1000000000;
        $q=$gaa->Length*$gaa->Width*$gaa->Height;
        $z=$q/$m*$gaa->gexp_packlistdet_qty; 
        echo round($z,2)
        // echo $z ?>
        <!-- // $z=$q/$m*$gaa->gexp_packlistdet_qty; echo number_format($z,0,",","."); ?> -->
        <!-- $z=$q/$m*$gaa->gexp_packlistdet_qty; echo number_format($z,0,",","."); ?> -->
        <!-- <?php echo $gaa->ItemDimension ?> -->
        <!-- echo''.round($pembulatan,3).''; -->
    </td>
    <td style=" border:solid; border-width:0.5px; font-size:11px;" class="pre-line">
        <?php echo $gaa->Length." x ".$gaa->Width." x ".$gaa->Height; ?>
    </td>

</tr>

<?php }
}else{ // Jika data tidak ada
  echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
}
?>

<tr>
    <td style=" border:solid; border-width:0.5px; font-weight:bold;"></td>
    <?php if($print_check[0]->inv_print_carton_barcode=='1'){?>
    <td style=" border:solid; border-width:0.5px; font-weight:bold;"></td>
    <?php } ?>
    <td style=" border:solid; border-width:0.5px; font-weight:bold;" colspan="3"> Total </td>
    <td style=" border:solid; border-width:0.5px; font-weight:bold;"><?php echo $summary_qty[0]->Total_Qty ?></td>
    <td style=" border:solid; border-width:0.5px; font-weight:bold;"></td>
    <?php if($print_check[0]->inv_print_batch=='1'){?>
    <td style=" border:solid; border-width:0.5px; font-weight:bold;"></td>
    <?php } ?>
    <?php if($print_check[0]->inv_print_expired_date=='1'){?>
    <td style=" border:solid; border-width:0.5px; font-weight:bold;"></td>
    <?php } ?>
    <?php if($print_check[0]->inv_print_production_date=='1'){?>
    <td style=" border:solid; border-width:0.5px; font-weight:bold;"><?php echo round($summary_nett[0]->Total_Nett) ?></td>
    <?php } ?>
    <td style=" border:solid; border-width:0.5px; font-weight:bold;"><?php echo round($summary_gross[0]->Total_Gross) ?></td>
    <td style=" border:solid; border-width:0.5px; font-weight:bold;">
        <?php echo round($summary_cbm[0]->Total_Cbm,2) ?>
    </td>
    <td style=" border:solid; border-width:0.5px; font-weight:bold;"></td>
    
</tr>

</table>

<br>

<table>
<tr>
    <td style="text-align:left; border-width:0.5px; width: 200px; padding:5px; font-size:11px;">
        Kudus, <?php echo $detailsdata_printpack->gexp_packlist_date; ?>
    </td>
</tr>  
</table>


<br>
<br>
<br>
<table>
<tr>
    <td style="text-align:left; color:black; border-width:0.5px; width: 200px; padding:5px; font-weight:bold; font-size:11px;">
        EVAN GUSTIN
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