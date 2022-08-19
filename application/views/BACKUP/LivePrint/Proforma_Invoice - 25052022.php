<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous"> -->

    <title>Proforma_Invoice<?php echo $listdataPI_byId[0]->gexp_pi_no ?></title>
  </head>

  <!-- width : 680 px -->

  <!-- Ukuran Portrait :
    Width : 680 -->

    <!-- Ukuran Landscape :
    Width : 1000 -->

<style>

table{margin:0px; font-size: 11px;}
        

.tbl{
    border: 1px;
    border-style: solid;
    border-collapse: collapse;
    padding: 4px;
    font-size: 11px;
}

.thc{
    /* background-color: rgb(37, 167, 228); */
    padding: 5px;
    border: 1px;
    border-style: solid;
    font-size: 11px;
}
.tdc{
    border: 1px;
    border-style: solid;
    border-top-style: none;
    border-bottom-style: none;
    padding: 4px;
}

</style>
<body>
  
  <table style="width: 100%">
        <tr>
            <td style="border-style:none; text-align:center;">
                <h2 style="font-weight: bold; text-align:center;">PROFORMA INVOICE</h2>
            </td>
        </tr>
    </table>

    <table style="width: 100%; padding-top:10px;">
        <tr>
            <td style="text-align:left; border-style:none; width:200px;">
                <h5 style="font-weight: 600; font-size:10px;">PI NO</h5>
            </td>
            <td style="text-align:left; border-style:none; width:20px;">
                <h5 style="font-weight: 600; font-size:10px;">:</h5>
            </td>
            <td style="text-align:left; border-style:none;">
                <h5 style="font-weight: 600; font-size:10px;"><?php echo $listdataPI_byId[0]->gexp_pi_no ?></h5>
            </td>
        </tr>
    </table>
    <table style="width: 100%;">
        <tr>
            <td style="text-align:left; border-style:none; width:200px;">
                <h5 style="font-weight: 600; font-size:10px;">PO NO</h5>
            </td>
            <td style="text-align:left; border-style:none; width:20px;">
                <h5 style="font-weight: 600; font-size:10px;">:</h5>
            </td>
            <td style="text-align:left; border-style:none;">
                <h5 style="font-weight: 600; font-size:10px;"><?php echo $listdataPI_byId[0]->gexp_pi_po ?></h5>
            </td>
        </tr>
    </table>
    <table style="width: 100%; border-collapse:collapse;">
        <tr>
            <td style="text-align:left; border-style:none; width:200px;">
                <h5 style="font-weight: 600; font-size:10px;">CONSIGNEE</h5>
            </td>
            <td style="text-align:left; border-style:none; width:20px;">
                <h5 style="font-weight: 600; font-size:10px;">:</h5>
            </td>
            <td style="text-align:left; border-style:none; padding-top:5px;">
                <h5 style="font-weight: 600; font-size:10px;"><?php echo $listdataPI_byId[0]->Consig ?><br><?php echo $listdataPI_byId[0]->Cons_addr ?><br><?php echo $listdataPI_byId[0]->Cons_phone ?></h5>
            </td>
        </tr>
    </table>

    <table style="width: 100%">
        <tr>
            <td style="text-align:left; border-style:none; width:200px;">
                <h5 style="font-weight: 600; font-size:10px;">BENEFICIARY</h5>
            </td>
            <td style="text-align:left; border-style:none; width:20px;">
                <h5 style="font-weight: 600; font-size:10px;">:</h5>
            </td>
            <td style="text-align:left; border-style:none; padding-top:5px;">
                <h5 style="font-weight: 600; font-size:10px;"> <?php echo $listdataPI_byId[0]->Benefi ?><br> <?php echo $listdataPI_byId[0]->Bene_addr ?><br> <?php echo $listdataPI_byId[0]->Bene_phone ?><br>  </h5>
            </td>
        </tr>
    </table>

    <table style="width: 100%">
        <tr>
            <td style="text-align:left; border-style:none; width:200px;">
                <h5 style="font-weight: 600; font-size:10px;">DESTINATION</h5>
            </td>
            <td style="text-align:left; border-style:none; width:20px;">
                <h5 style="font-weight: 600; font-size:10px;">:</h5>
            </td>
            <td style="text-align:left; border-style:none;">
                <h5 style="font-weight: 600; font-size:10px;"><?php echo $listdataPI_byId[0]->DestinatPort ?></h5>
            </td>
        </tr>
    </table>

    <table style="width: 100%">
        <tr>
            <td style="text-align:left; border-style:none; width:200px;">
                <h5 style="font-weight: 600; font-size:10px;">ETD EST</h5>
            </td>
            <td style="text-align:left; border-style:none; width:20px;">
                <h5 style="font-weight: 600; font-size:10px;">:</h5>
            </td>
            <td style="text-align:left; border-style:none;">
                <h5 style="font-weight: 600; font-size:10px;">30 Working Days</h5>
            </td>
        </tr>
    </table>

    <table style="width: 100%">
        <tr>
            <td style="text-align:left; border-style:none; width:200px;">
                <h5 style="font-weight: 600; font-size:10px;">LOADING PORT</h5>
            </td>
            <td style="text-align:left; border-style:none; width:20px;">
                <h5 style="font-weight: 600; font-size:10px;">:</h5>
            </td>
            <td style="text-align:left; border-style:none;">
                <h5 style="font-weight: 600; font-size:10px;"><?php echo $listdataPI_byId[0]->Loadport_Name  ?></h5>
            </td>
        </tr>
    </table>

    <table style="width: 100%">
        <tr>
            <td style="text-align:left; border-style:none; width:200px;">
                <h5 style="font-weight: 600; font-size:10px;">COUNTRY OF ORIGIN</h5>
            </td>
            <td style="text-align:left; border-style:none; width:20px;">
                <h5 style="font-weight: 600; font-size:10px;">:</h5>
            </td>
            <td style="text-align:left; border-style:none;">
                <h5 style="font-weight: 600; font-size:10px;"> INDONESIA </h5>
            </td>
        </tr>
    </table>


<br>

<table class="tbl" style="width:100%; font-size:11px;">
    <tr>
      <th style="font-size:9px;" class="thc">DESCRIPTION OF GOODS</th>
      <th style="font-size:9px;" class="thc">PACKING</th>
      <th style="font-size:9px;" class="thc">QTY</th>
      <th style="font-size:9px;" class="thc">UNIT PRICE ( <?php echo $listdataPI_byId[0]->IncoCode  ?> )</th>
      <th style="font-size:9px;" class="thc">TOTAL <br> <?php echo $listdataPI_byId[0]->code ?></th>
    </tr>
    <tr>
      <td style="font-weight: bold" class="tdc">1 x Container <?php echo $listdataPI_byId[0]->NamaContainer ?></td>
      <td class="tdc"></td>
      <td class="tdc"></td>
      <td class="tdc"></td>
      <td class="tdc"></td>
    </tr>
    <?php
            if( ! empty($list_purchasegood)){
                
                foreach($list_purchasegood as $gaa){ ?>
    <tr>
      <td style="font-size:9px;" class="tdc"><?php echo $gaa->ItemName ?></td>
      <td style="font-size:9px;" class="tdc"><?php echo $gaa->ItemPackDesc ?></td>
      <td style="font-size:9px; width:10%;" class="tdc"><?php echo number_format("$gaa->gexp_good_qty",0,",",".") ?></td>
      <td style="font-size:9px; width:10%;" class="tdc"> <?php echo $listdataPI_byId[0]->code.' '.number_format("$gaa->gexp_good_price",2,".",",") ?></td>
      <td style="font-size:9px; width:10%;" class="tdc"><?php echo $listdataPI_byId[0]->code.' '.number_format("$gaa->gexp_good_totals",2,".",",") ?></td>
    </tr>
    <?php } 
                } ?>




<tr>
<?php if(! empty($checker_item_freegood )){ ?>
      <td style="font-weight: bold" class="tdc">Free Of Charge</td>
<?php } ?>
      <td class="tdc"></td>
      <td class="tdc"></td>
      <td class="tdc"></td>
      <td class="tdc"></td>
</tr>

<?php
            if( ! empty($list_freegood)){
                
                foreach($list_freegood as $gaa){ ?>
    <tr>
        <td style="font-size:9px;" class="tdc"><?php echo $gaa->ItemName ?></td>
        <td style="font-size:9px;" class="tdc"><?php echo $gaa->ItemPackDesc ?></td>
        <td style="font-size:9px; width:10%;" class="tdc"><?php echo number_format("$gaa->gexp_good_qty",0,",",".") ?></td>
        <td style="font-size:9px; width:10%;" class="tdc"><?php echo $listdataPI_byId[0]->code.' '.number_format("$gaa->gexp_good_price",2,".",",") ?></td>
        <td style="font-size:9px; width:10%;" class="tdc"><?php echo $listdataPI_byId[0]->code.' '.number_format("$gaa->gexp_good_totals",2,".",",") ?></td>
    </tr>
    <?php } 
} 
?>


<tr>
      <th style="font-size:9px; text-align:left;" class="thc" colspan="2">GRAND TOTAL <?php echo $listdataPI_byId[0]->IncoCode  ?> <?php echo $listdataPI_byId[0]->Loadport_Name ?></th>
      <th style="font-size:9px;" class="thc"> <?php echo number_format($totalqty_perinv->QTY_Total_all,0,",",".");  ?></th>
      <th style="font-size:9px;" class="thc"></th>
      <th style="font-size:9px;" class="thc"><?php echo $listdataPI_byId[0]->code.' '.number_format($totalprice_perinv->Sum_Total_Price,2,".",","); ?></th>
    </tr>
    
</table>

<hr>
    <table style="width: 100%;">
        <tr>
            <td style="width: 50%; border:none; text-align:left; padding:2px;">
                <h5 style="font-weight: bold; font-size:10px;">Scheme Payment :</h5>
            </td>
           
            
        </tr>
    </table>
    <table style="width: 100%;">
        <tr>
            <td style="width: 50%; border:none; text-align:left; padding:2px;">
                    <!-- <h5 style="font-weight: 600; font-size:10px;">Please TT 100 %, 10 Days From BL Date</h5> -->
                <h5 style="font-weight: 600; font-size:10px;">Please TT 100%, <?php echo $listdataPI_byId[0]->TOPCust ?> From BL Date</h5>
            </td> 
        </tr>
    </table>
    <table style="width: 100%;">
        <tr>
            <td style="width: 50%; border:none; text-align:left; padding:2px;">
                <h5 style="font-weight: 600; font-size:10px;">Please TT To The Following Account :</h5>
            </td> 
        </tr>
    </table>
    <table style="width: 100%;">
        <tr>
            <td style="width: 50%; border:none; text-align:justify;">
                <h5 style="font-weight: 600; font-size:10px;">Bank Name</h5>
            </td>
            <td style="width: 10%; border:none; text-align:justify;">
                <h5 style="font-weight: 600; font-size:10px;">:</h5>
            </td>
            <td style="width: 40%; border:none; text-align:left;">
             <h5 style="font-weight: 600; font-size:10px;"><?php echo $listdataPI_byId[0]->Bank_name ?><br><?php echo $listdataPI_byId[0]->Bank_office ?><br><?php echo $listdataPI_byId[0]->Bank_addr ?><br><b>Acc.No : </b><?php echo $listdataPI_byId[0]->Bank_acc ?><br> Swift Code : <?php echo $listdataPI_byId[0]->Bank_swiftcode ?> <br> </h5>
            </td>  
        </tr>
    </table>
<br>
    <table style="width: 100%;">
        <tr>
            <td style="width: 50%; border:none; text-align:justify;">
                <h5 style="font-weight: 600; font-size:10px;">Beneficiary</h5>
            </td>
            <td style="width: 10%; border:none; text-align:justify;">
                <h5 style="font-weight: 600; font-size:10px;">:</h5>
            </td>
            <td style="width: 40%; border:none; text-align:left;">
                <h5 style="font-weight: 600; font-size:10px;"><?php echo $listdataPI_byId[0]->Benefi ?><br> <?php echo $listdataPI_byId[0]->Bene_office ?><br> <?php echo $listdataPI_byId[0]->Bene_addr ?><br> <?php echo $listdataPI_byId[0]->Bene_phone ?><br></h5>
            </td>  
        </tr>
    </table>

    <br>
    <br>
    <table style="width: 100%;">
        <tr>
            <td style="width: 0%; border:none; text-align:justify;">
                <h5 style="font-weight: 600; font-size:10px;"></h5>
            </td>
            <td style="width: 25%; border:none; text-align:justify;">
                <h5 style="font-weight: 600; font-size:10px;">Jakarta, <?php echo IndoDate ?></h5>
            </td>
            <td style="width: 30%; border:none; text-align:left;">
                <h5 style="font-weight: 600; font-size:10px;"></h5>
            </td>  
            <td style="width: 0%; border:none; text-align:justify;">
                <h5 style="font-weight: 600; font-size:10px;"></h5>
            </td>
            <td style="width: 25%; border:none; text-align:justify;">
                <h5 style="font-weight: 600; font-size:10px;"><?php echo $listdataPI_byId[0]->Cons_Town ?>, <?php echo IndoDate ?></h5>
            </td>
            <td style="width: 0%; border:none; text-align:left;">
                <h5 style="font-weight: 600; font-size:10px;"></h5>
            </td> 
        </tr>
    </table>

    <br>
    <br>
    <br>
    <br>
    <table style="width: 100%;">
        <tr>
            <td style="width: 12%; border:none; text-align:justify;">
                <h5 style="font-weight: 600; font-size:10px;"></h5>
            </td>
            <td style="width: 20%; border:none; text-align:justify;">
                <h5 style="font-weight: 600; font-size:10px;"><?php echo $listdataPI_byId[0]->PPIC ?></h5>
            </td>
            <td style="width: 30%; border:none; text-align:left;">
                <h5 style="font-weight: 600; font-size:10px;"></h5>
            </td>  
            <td style="width: 8%; border:none; text-align:justify;">
                <h5 style="font-weight: 600; font-size:10px;"></h5>
            </td>
            <td style="width: 25%; border:none; text-align:justify;">
                <h5 style="font-weight: 600; font-size:10px;"><?php echo $listdataPI_byId[0]->ConsigContactName ?></h5>
            </td>
            <td style="width: 0%; border:none; text-align:left;">
                <h5 style="font-weight: 600; font-size:10px;"></h5>
            </td> 
        </tr>
    </table>
    <table style="width: 100%;">
        <tr>
            <td style="width: 10%; border:none; text-align:justify;">
                <h5 style="font-weight: 600; font-size:10px;"></h5>
            </td>
            <td style="width: 22%; border:none; text-align:justify;">
                <h5 style="font-weight: 600; font-size:10px;"><?php echo $listdataPI_byId[0]->JabatanUser ?></h5>
            </td>
            <td style="width: 30%; border:none; text-align:left;">
                <h5 style="font-weight: 600; font-size:10px;"></h5>
            </td>  
            <td style="width: 8%; border:none; text-align:justify;">
                <h5 style="font-weight: 600; font-size:10px;"></h5>
            </td>
            <td style="width: 25%; border:none; text-align:justify;">
                <h5 style="font-weight: 600; font-size:10px;"><?php echo $listdataPI_byId[0]->Consig ?></h5>
            </td>
            <td style="width: 0%; border:none; text-align:left;">
                <h5 style="font-weight: 600; font-size:10px;"></h5>
            </td> 
        </tr>
    </table>
<br>
<br>
    <table style="width: 100%">
        <tr>
            <td style="text-align:left; border-style:none; width:100%;">
                <h5 style="font-weight: bold; font-size:11px;">Note : Please Sign This Proforma Invoice, fill the date and send back to us with PO as your confirmation</h5>
            </td>
            <td style="text-align:left; border-style:none; width:0px;">
                <h5 style="font-weight: 600; font-size:10px;"></h5>
            </td>
            <td style="text-align:left; border-style:none;">
                <h5 style="font-weight: 600; font-size:10px;"></h5>
            </td>
        </tr>
    </table>

    <table style="width: 100%;">
        <tr>
            <td style="width: 13%; border:none; text-align:justify;">
                <h5 style="font-weight: 600; font-size:10px;"></h5>
            </td>
            <td style="width: 30%; border:none; text-align:justify;">
                <!-- <h5 style="font-weight: 600; font-size:10px;">PT. GONUSA PRIMA DISTRIBUSI</h5> -->
            </td>
            <td style="width: 7%; border:none; text-align:left;">
                <h5 style="font-weight: 600; font-size:10px;"></h5>
            </td>  
            <td style="width: 20%; border:none; text-align:justify;">
                <h5 style="font-weight: 600; font-size:10px;"></h5>
            </td>
            <td style="width: 10%; border:none; text-align:justify;">
                <h5 style="font-weight: 600; font-size:10px;"></h5>
            </td>
            <td style="width: 20%; border:none; text-align:left;">
                <h5 style="font-weight: 600; font-size:10px;"></h5>
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