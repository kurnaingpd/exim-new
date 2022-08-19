<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous"> -->

    <title>Product_Specification_Print</title>

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


  <h4 style="text-align: center; font-weight:bold; font-size:16px;">PRODUCT SPECIFICATION</h4>
  <h4 style="text-align: center; font-size:13px;"><?php echo $getrowsdetail_specdet_byid->ItemBrandName?></h4>
  <table style="width:100%;">
      <tr>
          <td style="text-align: center; font-size:11px;"> <?php echo $getrowsdetail_specdet_byid->ItemName?></td>
      </tr>
  </table>
  <table style="width:100%;">
      <tr>
          <td style="text-align: center; font-size:11px;"><p style="font-size:11px;"><?php echo $getrowsdetail_specdet_byid->gexp_spec_po_no?></p></td>
      </tr>
  </table>

  <!-- <p style="text-align: center">......Product Name.....</p>
  <p style="text-align: center">......PO Numbers :.....</p> -->

<br>

<table>
<tr>
    <td style="text-align:left; font-weight:bold; border-width:0.5px; width: 200px; padding:5px; font-size:11px;">
        A. Description
    </td>
    <!-- <td style="text-align:left; border-width:0.5px; width: 20px; padding:5px;">
    </td>
    <td style="border:solid; vertical-align:bottom; text-align:left; border-width:0.5px; width: 460px; padding:5px;">
    </td> -->
</tr>
</table>

<table style="border-width:2px; width:100%;">
<tr>
    <td style="text-align:left; width: 100%; padding:5px; font-size:11px;">
        <?php echo $getrowsdetail_specdet_byid->gexp_specdet_desc ?>
    </td>
</tr>  
</table>

<table>
<tr>
    <td style="text-align:left; font-weight:bold; border-width:0.5px; width: 200px; padding:5px; font-size:11px;">
        B. Physical
    </td>
</tr>
</table>
<table>
<tr>
    <td style="text-align:left; border-width:0.5px; width: 200px; padding:5px; font-size:11px;">
        Form
    </td>
    <td style="text-align:left; border-width:0.5px; width: 20px; padding:5px; font-size:11px;">
        :
    </td>
    <td style="vertical-align:bottom; text-align:left; border-width:2px; width: 460px; padding:5px; font-size:11px;">
      <!-- AROMA --> <?php echo $getrowsdetail_specdet_byid->gexp_specdet_physical_form ?>
    </td>
</tr>  
</table>
<table>
<tr>
    <td style="text-align:left; border-width:0.5px; width: 200px; padding:5px; font-size:11px;">
        Texture
    </td>
    <td style="text-align:left; border-width:0.5px; width: 20px; padding:5px; font-size:11px;">
        :
    </td>
    <td style="vertical-align:bottom; text-align:left; border-width:2px; width: 460px; padding:5px; font-size:11px;">
      <!-- AROMA --> <?php echo $getrowsdetail_specdet_byid->gexp_specdet_physical_texture ?>
    </td>
</tr>  
</table>
<table>
<tr>
    <td style="text-align:left; border-width:0.5px; width: 200px; padding:5px; font-size:11px;">
        Colour
    </td>
    <td style="text-align:left; border-width:0.5px; width: 20px; padding:5px; font-size:11px;">
        :
    </td>
    <td style="vertical-align:bottom; text-align:left; border-width:2px; width: 460px; padding:5px; font-size:11px;">
      <!-- AROMA --> <?php echo $getrowsdetail_specdet_byid->gexp_specdet_physical_colour ?>
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
    <td style="vertical-align:bottom; text-align:left; border-width:2px; width: 460px; padding:5px; font-size:11px;">
      <!-- AROMA --> <?php echo $getrowsdetail_specdet_byid->gexp_specdet_physical_taste ?>
    </td>
</tr>  
</table>

<table>
<tr>
    <td style="text-align:left; border-width:0.5px; width: 200px; padding:5px; font-size:11px;">
        Odour
    </td>
    <td style="text-align:left; border-width:0.5px; width: 20px; padding:5px; font-size:11px;">
        :
    </td>
    <td style="vertical-align:bottom; text-align:left; border-width:2px; width: 460px; padding:5px; font-size:11px;">
      <!-- AROMA --> <?php echo $getrowsdetail_specdet_byid->gexp_specdet_physical_odour ?>
    </td>
</tr>  
</table>

<table>
<tr>
    <td style="text-align:left; font-weight:bold; border-width:0.5px; width: 200px; padding:5px; font-size:11px;">
        C. Chemical
    </td>
</tr>  
</table>
<table>
<tr>
    <td style="text-align:left; border-width:0.5px; width: 200px; padding:5px; font-size:11px;">
        Fat
    </td>
    <td style="text-align:left; border-width:0.5px; width: 20px; padding:5px; font-size:11px;">
        :
    </td>
    <td style="vertical-align:bottom; text-align:left; border-width:2px; width: 460px; padding:5px; font-size:11px;">
      <!-- AROMA --> <?php echo $getrowsdetail_specdet_byid->gexp_specdet_chemical_fat ?>
    </td>
</tr>  
</table>
<table>
<tr>
    <td style="text-align:left; border-width:0.5px; width: 200px; padding:5px; font-size:11px;">
        Moisture Content (%)
    </td>
    <td style="text-align:left; border-width:0.5px; width: 20px; padding:5px; font-size:11px;">
        :
    </td>
    <td style="vertical-align:bottom; text-align:left; border-width:2px; width: 460px; padding:5px; font-size:11px;">
      <!-- AROMA --> <?php echo $getrowsdetail_specdet_byid->gexp_specdet_chemical_moisture ?>
    </td>
</tr>  
</table>
<table>
<tr>
    <td style="text-align:left; border-width:0.5px; width: 200px; padding:5px; font-size:11px;">
        Caffeine
    </td>
    <td style="text-align:left; border-width:0.5px; width: 20px; padding:5px; font-size:11px;">
        :
    </td>
    <td style="vertical-align:bottom; text-align:left; border-width:2px; width: 460px; padding:5px; font-size:11px;">
      <!-- AROMA --> <?php echo $getrowsdetail_specdet_byid->gexp_specdet_chemical_caffeine ?>
    </td>
</tr>  
</table>

<table>
<tr>
    <td style="text-align:left; font-weight:bold; border-width:0.5px; width: 200px; padding:5px; font-size:11px;">
        D. Microbiological
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
    <td style="vertical-align:bottom; text-align:left; border-width:2px; width: 460px; padding:5px; font-size:11px;">
      <!-- AROMA --> <?php echo $getrowsdetail_specdet_byid->gexp_specdet_micro_platecount ?>
    </td>
</tr>  
</table>
<table>
<tr>
    <td style="text-align:left; border-width:0.5px; width: 200px; padding:5px; font-size:11px;">
        Mould & Yeast
    </td>
    <td style="text-align:left; border-width:0.5px; width: 20px; padding:5px; font-size:11px;">
        :
    </td>
    <td style="vertical-align:bottom; text-align:left; border-width:2px; width: 460px; padding:5px; font-size:11px;">
      <!-- AROMA --> <?php echo $getrowsdetail_specdet_byid->gexp_specdet_micro_mouldyeast ?>
    </td>
</tr>  
</table>
<table>
<tr>
    <td style="text-align:left; border-width:0.5px; width: 200px; padding:5px; font-size:11px;">
        Coliform
    </td>
    <td style="text-align:left; border-width:0.5px; width: 20px; padding:5px; font-size:11px;">
        :
    </td>
    <td style="vertical-align:bottom; text-align:left; border-width:2px; width: 460px; padding:5px; font-size:11px;">
      <!-- AROMA --> <?php echo $getrowsdetail_specdet_byid->gexp_specdet_micro_coliform ?>
    </td>
</tr>  
</table>
<table>
<tr>
    <td style="text-align:left; border-width:0.5px; width: 200px; padding:5px; font-size:11px;">
        Salmonella
    </td>
    <td style="text-align:left; border-width:0.5px; width: 20px; padding:5px; font-size:11px;">
        :
    </td>
    <td style="vertical-align:bottom; text-align:left; border-width:2px; width: 460px; padding:5px; font-size:11px;">
      <!-- AROMA --> <?php echo $getrowsdetail_specdet_byid->gexp_specdet_micro_salmonella ?>
    </td>
</tr>  
</table>

<table>
<tr>
    <td style="text-align:left; font-weight:bold; border-width:0.5px; width: 200px; padding:5px; font-size:11px;">
        E. Heavy Metal
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
    <td style="vertical-align:bottom; text-align:left; border-width:2px; width: 460px; padding:5px; font-size:11px;">
      <!-- AROMA --> <?php echo $getrowsdetail_specdet_byid->gexp_specdet_heamet_lead ?>
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
    <td style="vertical-align:bottom; text-align:left; border-width:2px; width: 460px; padding:5px; font-size:11px;">
      <!-- AROMA --> <?php echo $getrowsdetail_specdet_byid->gexp_specdet_heamet_arsenic ?>
    </td>
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
    <td style="vertical-align:bottom; text-align:left; border-width:2px; width: 460px; padding:5px; font-size:11px;">
      <!-- AROMA --> <?php echo $getrowsdetail_specdet_byid->gexp_specdet_heamet_mercury ?>
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
    <td style="vertical-align:bottom; text-align:left; border-width:2px; width: 460px; padding:5px; font-size:11px;">
      <!-- AROMA --> <?php echo $getrowsdetail_specdet_byid->gexp_specdet_heamet_tin ?>
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
    <td style="vertical-align:bottom; text-align:left; border-width:2px; width: 460px; padding:5px; font-size:11px;">
      <!-- AROMA --> <?php echo $getrowsdetail_specdet_byid->gexp_specdet_heamet_cadmium ?>
    </td>
</tr>  
</table>


<table>
<tr>
    <td style="text-align:left; font-weight:bold; border-width:0.5px; width: 200px; padding:5px; font-size:11px;">
        F. Ingredients
    </td>
    <!-- <td style="text-align:left; border-width:0.5px; width: 20px; padding:5px; font-size:11px;">
    </td>
    <td style="border:solid; vertical-align:bottom; text-align:left; border-width:0.5px; width: 460px; padding:5px; font-size:11px;">
    </td> -->
</tr>
</table>
<table style="border-width:2px; width:100%;">
<tr>
    <td style="text-align:left; width: 100%; padding:5px; font-size:11px;">
        <?php echo $getrowsdetail_specdet_byid->gexp_specdet_inregdient ?>
    </td>
</tr>  
</table>
<table>
<tr>
    <td style="text-align:left; font-weight:bold; border-width:0.5px; width: 200px; padding:5px; font-size:11px;">
        G. Product Shelf Life
    </td>
    <!-- <td style="text-align:left; border-width:0.5px; width: 20px; padding:5px; font-size:11px;">
    </td>
    <td style="border:solid; vertical-align:bottom; text-align:left; border-width:0.5px; width: 460px; padding:5px; font-size:11px;">
    </td> -->
</tr>
</table>
<table style="border-width:2px; width:100%;">
<tr>
    <td style="text-align:left; width: 100%; padding:5px; font-size:11px;">
        <?php echo $getrowsdetail_specdet_byid->gexp_specdet_prodshelife ?>
    </td>
</tr>  
</table>
<table>
<tr>
    <td style="text-align:left; font-weight:bold; border-width:0.5px; width: 200px; padding:5px; font-size:11px;">
        H. Packaging Material
    </td>
    <!-- <td style="text-align:left; border-width:0.5px; width: 20px; padding:5px; font-size:11px;">
    </td>
    <td style="border:solid; vertical-align:bottom; text-align:left; border-width:0.5px; width: 460px; padding:5px; font-size:11px;">
    </td> -->
</tr>
</table>
<table style="border-width:2px; width:100%;">
<tr>
    <td style="text-align:left; width: 100%; padding:5px; font-size:11px;">
        <?php echo $getrowsdetail_specdet_byid->gexp_specdet_packmate ?>
    </td>
</tr>  
</table>
<br>
<table>
<tr>
    <td style="text-align:left; font-weight:bold; border-width:0.5px; width: 100%; padding:5px; font-size:11px;">
        I. Storage Condition Requirement
    </td>
    <!-- <td style="text-align:left; border-width:0.5px; width: 20px; padding:5px; font-size:11px;">
    </td>
    <td style="border:solid; vertical-align:bottom; text-align:left; border-width:0.5px; width: 460px; padding:5px; font-size:11px;">
    </td> -->
</tr>
</table>
<table style="border-width:2px; width:100%;">
<tr>
    <td style="text-align:left; width: 100%; padding:5px; font-size:11px;">
        <?php echo $getrowsdetail_specdet_byid->gexp_specdet_storeconreq ?>
    </td>
</tr>  
</table>
<br>
<table>
<tr>
    <td style="text-align:left; font-weight:bold; border-width:0.5px; width: 100%; padding:5px; font-size:11px;">
        J. Function Of Food Material
    </td>
    <!-- <td style="text-align:left; border-width:0.5px; width: 20px; padding:5px; font-size:11px;">
    </td>
    <td style="border:solid; vertical-align:bottom; text-align:left; border-width:0.5px; width: 460px; padding:5px; font-size:11px;">
    </td> -->
</tr>
</table>
<table style="border-width:2px; width:100%;">
<tr>
    <td style="text-align:left; width: 100%; padding:5px; font-size:11px;">
        <?php echo $getrowsdetail_specdet_byid->gexp_specdet_storeconreq ?>
    </td>
</tr>  
</table>

<br>
<table>
<tr>
    <td style="text-align:left; font-weight:bold; border-width:0.5px; width: 100%; padding:5px; font-size:11px;">
        K. Usage
    </td>
    <!-- <td style="text-align:left; border-width:0.5px; width: 20px; padding:5px; font-size:11px;">
    </td>
    <td style="border:solid; vertical-align:bottom; text-align:left; border-width:0.5px; width: 460px; padding:5px; font-size:11px;">
    </td> -->
</tr>
</table>
<table style="border-width:2px; width:100%;">
<tr>
    <td style="text-align:left; width: 100%; padding:5px; font-size:11px;">
        <?php echo $getrowsdetail_specdet_byid->gexp_specdet_storeconreq ?>
    </td>
</tr>  
</table>

<br>
<table>
<tr>
    <td style="text-align:left; font-weight:bold; border-width:0.5px; width: 100%; padding:5px; font-size:11px;">
        L. Source Of Origin
    </td>
    <!-- <td style="text-align:left; border-width:0.5px; width: 20px; padding:5px; font-size:11px;">
    </td>
    <td style="border:solid; vertical-align:bottom; text-align:left; border-width:0.5px; width: 460px; padding:5px; font-size:11px;">
    </td> -->
</tr>
</table>
<table style="border-width:2px; width:100%;">
<tr>
    <td style="text-align:left; width: 100%; padding:5px; font-size:11px;">
        <?php echo $getrowsdetail_specdet_byid->gexp_specdet_storeconreq ?>
    </td>
</tr>  
</table>

<br>
<table>
<tr>
    <td style="text-align:left; font-weight:bold; border-width:0.5px; width: 100%; padding:5px; font-size:11px;">
        M. Country Of Origin
    </td>
    <!-- <td style="text-align:left; border-width:0.5px; width: 20px; padding:5px; font-size:11px;">
    </td>
    <td style="border:solid; vertical-align:bottom; text-align:left; border-width:0.5px; width: 460px; padding:5px; font-size:11px;">
    </td> -->
</tr>
</table>
<table style="border-width:2px; width:100%;">
<tr>
    <td style="text-align:left; width: 100%; padding:5px; font-size:11px;">
        <?php echo $getrowsdetail_specdet_byid->gexp_specdet_storeconreq ?>
    </td>
</tr>  
</table>


<table style="margin-top:70px;">
<tr>
    <td style="text-align:left; width: 100%; padding:5px; font-size:11px;">
        Sincerely,
    </td>
</tr>  
</table>

<table style="margin-top:10px;">
<tr>
    <td style="text-align:left; width: 100%; padding:5px; font-size:11px;">
        PT. Sumber Kopi Prima
    </td>
</tr>  
</table>

<table style="margin-top:70px;">
<tr style="margin-bottom:-10px;">
    <td style="text-align:left; width: 100%; padding:10px; font-size:11px; text-decoration:underline;">
        Slamet Supriyadi
    </td>
</tr>  
<tr style="margin-top:-10px;">
    <td style="text-align:left; width: 100%; padding-left:10px; font-size:11px;">
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