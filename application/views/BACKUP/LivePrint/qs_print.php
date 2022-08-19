<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous"> -->

    <title>Quality_Certificate_Print</title>

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


  <h4 style="text-align: center; font-weight:700; font-size:20px;">TO WHOM IT MAY CONCERNED</h4>
  
  <br>

  <table style="width: 100%; text-align:left;">
  <tr>
      <td  style="text-align:left; font-size:14px;">
        I hereby certify that the recent <span style="font-weight: bold;"><?php echo $lsproducts[0]->ItemBrandName ?></span> Shipment made for <span style="font-weight: bold;"> <?php echo $gexp_qs_rows->CustCompanyName ?> </span> Covered
        by our invoice No <span style="font-weight: bold;"><?php echo $gexp_qs_rows->gexp_invoice_no ?></span> Had been produced according to our quality standard.
      </td>
  </tr>
  </table>
  <br>
  <table style="width: 100%; text-align:left;">
  <tr>
      <td  style="text-align:left; font-size:14px;">
            The said products were recorded in our logs as follows :
      </td>
  </tr>
  </table>

  <br>

  <!-- <table>
      <tr>
          <td>

          </td>
      </tr>
  </table> -->

<table style="font-size: 11px; width:100%;">
<tr>
    <td class="th" style=" border:solid; border-width:0.5px; font-size:11px;">
        PO#
    </td>
    <td class="th" style="border:solid; border-width:0.5px; font-size:11px;">
        CONTAINER#
    </td>
    <td class="th" style=" border:solid; border-width:0.5px; font-size:11px;">
        PRODUCTION DATE
    </td>
    <td class="th" style=" border:solid; border-width:0.5px; font-size:11px;">
        EXPIRY DATE
    </td>
    <td class="th" style=" border:solid; border-width:0.5px; font-size:11px;">
        DESCRIPTION OF GOODS
    </td>
    <td class="th" style=" border:solid; border-width:0.5px; font-size:11px;">
        CONTENT / CARTON
    </td>
</tr>
<?php
if(!empty($lsproducts)){
  // Jika data pada database tidak sama dengan empty (alias ada datanya)
$no_urut=1;
  foreach($lsproducts as $gaa){ ?>
<tr>
    <td style=" border:solid; border-width:0.5px;" class="pre-line">
        <?php echo $gaa->gexp_pi_po ?>
    </td>
    <td style=" border:solid; border-width:0.5px;" class="pre-line">
        <?php echo $gaa->gexp_packlist_container ?>
    </td>
    <td style=" border:solid; border-width:0.5px;" class="pre-line">
         <?php echo $gaa->gexp_packlistdet_proddate ?>
    </td>
    <td style=" border:solid; border-width:0.5px;" class="pre-line">
         <?php echo $gaa->gexp_packlistdet_expdate ?>
    </td>
    <td style=" border:solid; border-width:0.5px;" class="pre-line">
         <?php echo $gaa->gexp_packlistdet_descgod ?>
    </td>
    <td style=" border:solid; border-width:0.5px;" class="pre-line">
         <?php echo $gaa->gexp_packlistdet_qty ?>
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
<table>
        <tr>
            <td style="font-size: 12px;">
                Respecfully,
            </td>
        </tr>
</table>

<br>
<br>
<br>

<table>
        <tr>
            <td style="font-size: 12px;">
                Slamet Supriyadi
            </td>
        </tr>
        <tr>
            <td style="font-weight: bold; font-size: 12px;">
                QA MANAGER
            </td>
        </tr>
</table>

<br>

<!--
<table style="font-size: 12px;">
        <tr>
            <td>
                QA NO : 
            </td>
            <td>
                <?php echo $gexp_qs_rows->gexp_coa_no ?>
            </td>
        </tr>
</table>
-->

		<table style="margin-top:70px; font-size:11px;">
            <tr>
                <td align="left">Invoice No.</td>
                <td>:</td>
                <td align="left"><?=$gexp_qs_rows->gexp_invoice_no?></td>
            </tr>
            <tr>
                <td align="left">QA. No.</td>
                <td>:</td>
                <td align="left"><?=$gexp_qs_rows->gexp_coa_no?></td>
            </tr>
        </table>

        <div style="margin-top: 20px; border: 1px solid; border-style: dotted; font-size:11px; padding: 10px;">
            <p>
                This information contained in this document is confidential and propriatery information of PT. Sumber Kopi Prima. Any altering of this information without express written permission of PT. Sumber Kopi Prima. in expressly forbidden.
            </p>

            <p>
                This document is valid therefore without signature.
            </p>
        </div>






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