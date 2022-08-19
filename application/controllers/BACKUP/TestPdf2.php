<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TestPdf2 extends CI_Controller {

public function Default_Invoice()
{
    require_once('assets/mpdf_v8.0.3-master/vendor/autoload.php'); // Arahkan ke file mpdf.php didalam folder mpdf
    // $mpdf=new Mpdf('utf-8', 'A4', 10.5, 'arial'); // Membuat file mpdf baru
    $mpdf = new \Mpdf\Mpdf();
    $mpdf->AddPage("L","","","","","15","15","15","15","","","","","","","","","","","","A4");
    //Memulai proses untuk menyimpan variabel php dan html
    ob_start();
    ?>
    <html> 
    <head>
    <!-- Bootstrap CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->

    <style>

        table{margin:0px; font-size: 14px; border-collapse: collapse;}
        /* tr{border: solid;} */
        td,th{padding: 1px; text-align: center;}
        h1{text-align: center; font-weight:800; font-size: 24px; }
        th{background-color: #000B49; padding: 10px;color: #fff}
        td{border:solid; border-width: 0.001mm; border-collapse: collapse;}
        body {
            font-family: sans-serif;
        }

        .pre-line {
             white-space: pre-line;
        }
    </style>
    </head>
    <body>

    <!-- <div class="row">
        <div class="col-lg-6">
            <img style="width: 60px; float:left;" src="<?php echo base_url("assets/img/GAP.png"); ?>">
        </div>
        <div class="col-lg-6">
            <img style="width: 60px; float:left;" src="<?php echo base_url("assets/img/GAP.png"); ?>">
        </div>
    </div> -->

    <!-- <table style="width: 100%">
        <tr>
        <th style="width: 350px; text-align:left;"><img style="width: 30px; float:left;" src="<?php echo base_url("assets/images/gonusa_600.gif"); ?>"></th>
           
            <th style="background-color: #32C6F4; color:white; text-align:left;">GONUSA </th>
        </tr>
    </table> -->

    <table style="width: 100%">
        <tr>
            <td style="text-align:left; border-style:none;">
                <!-- <img style="width: 200px;" src="<?php echo base_url("assets/images/gonusa_600.gif"); ?>"> -->
            </td>
        </tr>
    </table>

    <table style="width: 100%">
        <tr>
            <td style="border-style:none; margin-bottom:0px;">
                <h2 style="font-weight: bold;">INVOICE</h2>
            </td>
        </tr>
        <tr>
            <td style="border-style:none; margin-bottom:0px;">
                 <p>INVOICE NO</p>
            </td>
        </tr>
    </table>
<br>
<br>
<table style="overflow:wrap;">
        <tr>
            <td style="border-style:none; width:200px; font-size:12px; text-align:left;">
                <p>PI NO</p>
            </td>
            <td style="border-style:none; width:30px; font-size:12px; text-align:left;">
                <p>:</p>
            </td>
            <td style="border-style:none; width:450px; font-size:12px; text-align:left;">
                <p class="pre-line">-</p>
            </td>
        </tr>
</table>
<table style="overflow:wrap;">
        <tr>
            <td style="border-style:none; width:200px; font-size:12px; text-align:left;">
                <p>PO NO</p>
            </td>
            <td style="border-style:none; width:30px; font-size:12px; text-align:left;">
                <p>:</p>
            </td>
            <td style="border-style:none; width:450px; font-size:12px; text-align:left;">
                <p class="pre-line">-</p>
            </td>
        </tr>
</table>
<br>
<table style="overflow:wrap;">
    <tr>
            <td style="border-style:none; width:200px; font-size:12px; text-align:left;">
                <p>CONSIGNEE</p>
            </td>
            <td style="border-style:none; width:30px; font-size:12px; text-align:left;">
                <p>:</p>
            </td>
            <td style="border-style:none; width:450px; font-size:12px; text-align:left;">
                <p class="pre-line">-</p>
            </td>
    </tr>
</table>
<br>
<table style="overflow:wrap;">
    <tr>
            <td style="border-style:none; width:200px; font-size:12px; text-align:left;">
                <p>NOTIFY</p>
            </td>
            <td style="border-style:none; width:30px; font-size:12px; text-align:left;">
                <p>:</p>
            </td>
            <td style="border-style:none; width:450px; font-size:12px; text-align:left;">
                <p class="pre-line">-</p>
            </td>
    </tr>
</table>

<br>
<table style="overflow:wrap;">
    <tr>
            <td style="border-style:none; width:200px; font-size:12px; text-align:left;">
                <p>SHIPPER</p>
            </td>
            <td style="border-style:none; width:30px; font-size:12px; text-align:left;">
                <p>:</p>
            </td>
            <td style="border-style:none; width:450px; font-size:12px; text-align:left;">
                <p class="pre-line">-</p>
            </td>
    </tr>
</table>

<br>
<table style="overflow:wrap;">
    <tr>
            <td style="border-style:none; width:200px; font-size:12px; text-align:left;">
                <p>ETD EST</p>
            </td>
            <td style="border-style:none; width:30px; font-size:12px; text-align:left;">
                <p>:</p>
            </td>
            <td style="border-style:none; width:450px; font-size:12px; text-align:left;">
                <p class="pre-line">30 WORKING DAYS</p>
            </td>
    </tr>
</table>

<table style="overflow:wrap;">
    <tr>
            <td style="border-style:none; width:200px; font-size:12px; text-align:left;">
                <p>DESTINATION</p>
            </td>
            <td style="border-style:none; width:30px; font-size:12px; text-align:left;">
                <p>:</p>
            </td>
            <td style="border-style:none; width:450px; font-size:12px; text-align:left;">
                <p class="pre-line">-</p>
            </td>
    </tr>
</table>

<table style="overflow:wrap;">
    <tr>
            <td style="border-style:none; width:200px; font-size:12px; text-align:left;">
                <p>LOADING PORT</p>
            </td>
            <td style="border-style:none; width:30px; font-size:12px; text-align:left;">
                <p>:</p>
            </td>
            <td style="border-style:none; width:450px; font-size:12px; text-align:left;">
                <p class="pre-line">-</p>
            </td>
    </tr>
</table>
<table style="overflow:wrap;">
    <tr>
            <td style="border-style:none; width:200px; font-size:12px; text-align:left;">
                <p>COUNTRY OF ORIGIN</p>
            </td>
            <td style="border-style:none; width:30px; font-size:12px; text-align:left;">
                <p>:</p>
            </td>
            <td style="border-style:none; width:450px; font-size:12px; text-align:left;">
                <p class="pre-line">-</p>
            </td>
    </tr>
</table>
<table style="overflow:wrap;">
    <tr>
            <td style="border-style:none; width:200px; font-size:12px; text-align:left;">
                <p>#FFRN</p>
            </td>
            <td style="border-style:none; width:30px; font-size:12px; text-align:left;">
                <p>:</p>
            </td>
            <td style="border-style:none; width:450px; font-size:12px; text-align:left;">
                <p class="pre-line">-</p>
            </td>
    </tr>
</table>
<BR>
<table style="overflow:wrap;">
    <tr>

    <?php echo $x='1'; ?>
        <?php if($x=='1'){ ?>
            <td style="border-style:SOLID; width:120px; background-color:yellow; PADDING:3PX; text-align:left;">
                <p>CARTON BARCODE</p>
            </td>
        <?php } ?>
            <td style="border-style:SOLID; width:120px; PADDING:3PX; text-align:left;">
                <p>CONTAINER</p>
            </td>
            <td style="border-style:SOLID; width:120px; PADDING:3PX; text-align:left;">
                <p>HS CODE</p>
            </td>
            <td style="border-style:SOLID; width:120px; PADDING:3PX; text-align:left;">
                <p>DESC OF GOODS</p>
            </td>
            <td style="border-style:SOLID; width:120px; PADDING:3PX; text-align:left;">
                <p>PACKING</p>
            </td>
            <td style="border-style:SOLID; width:120px; PADDING:3PX; text-align:left;">
                <p>QTY</p>
            </td>
        <?php if($x=='1'){ ?>
            <td style="border-style:SOLID; width:120px; background-color:yellow; PADDING:3PX; text-align:left;">
                <p>BATCH</p>
            </td>
        <?php } ?>
        <?php if($x=='1'){ ?>
            <td style="border-style:SOLID; width:120px; background-color:yellow; PADDING:3PX; text-align:left;">
                <p>EXPIRED DATE</p>
            </td>
        <?php } ?>
        <?php if($x=='1'){ ?>
            <td style="border-style:SOLID; width:120px; background-color:yellow; PADDING:3PX; text-align:left;">
                <p>PRODUCTION DATE</p>
            </td>
        <?php } ?>
            <td style="border-style:SOLID; width:120px; PADDING:3PX; text-align:left;">
                <p>UNIT PRICE</p>
            </td>
            <td style="border-style:SOLID; width:120px; PADDING:3PX; text-align:left;">
                <p>TOTAL</p>
            </td>
    </tr>
</table>
<table style="overflow:wrap;">
    <tr>

    <?php echo $x='1'; ?>
        <?php if($x=='1'){ ?>
            <td style="border-style:SOLID; width:120px; background-color:yellow; PADDING:3PX; text-align:left;">
                <p>-</p>
            </td>
        <?php } ?>
            <td style="border-style:SOLID; width:120px; PADDING:3PX; text-align:left;">
                <p>-</p>
            </td>
            <td style="border-style:SOLID; width:120px; PADDING:3PX; text-align:left;">
                <p>-</p>
            </td>
            <td style="border-style:SOLID; width:120px; PADDING:3PX; text-align:left;">
                <p>-</p>
            </td>
            <td style="border-style:SOLID; width:120px; PADDING:3PX; text-align:left;">
                <p>-</p>
            </td>
            <td style="border-style:SOLID; width:120px; PADDING:3PX; text-align:left;">
                <p>-</p>
            </td>
        <?php if($x=='1'){ ?>
            <td style="border-style:SOLID; width:120px; background-color:yellow; PADDING:3PX; text-align:left;">
                <p>-</p>
            </td>
        <?php } ?>
        <?php if($x=='1'){ ?>
            <td style="border-style:SOLID; width:120px; background-color:yellow; PADDING:3PX; text-align:left;">
                <p>-</p>
            </td>
        <?php } ?>
        <?php if($x=='1'){ ?>
            <td style="border-style:SOLID; width:120px; background-color:yellow; PADDING:3PX; text-align:left;">
                <p>-</p>
            </td>
        <?php } ?>
            <td style="border-style:SOLID; width:120px; PADDING:3PX; text-align:left;">
                <p>-</p>
            </td>
            <td style="border-style:SOLID; width:120px; PADDING:3PX; text-align:left;">
                <p>-</p>
            </td>
    </tr>
</table>
<table style="overflow:wrap;">
    <tr>

    <?php echo $x='1'; ?>
        <?php if($x=='1'){ ?>
            <td style="border-style:SOLID; width:120px; background-color:yellow; PADDING:3PX; text-align:left;">
                <p>-</p>
            </td>
        <?php } ?>
            <td style="border-style:SOLID; width:120px; PADDING:3PX; text-align:left;">
                <p>-</p>
            </td>
            <td style="border-style:SOLID; width:120px; PADDING:3PX; text-align:left;">
                <p>-</p>
            </td>
            <td style="border-style:SOLID; width:120px; PADDING:3PX; text-align:left;">
                <p>-</p>
            </td>
            <td style="border-style:SOLID; width:120px; PADDING:3PX; text-align:left;">
                <p>-</p>
            </td>
            <td style="border-style:SOLID; width:120px; PADDING:3PX; text-align:left;">
                <p>-</p>
            </td>
        <?php if($x=='1'){ ?>
            <td style="border-style:SOLID; width:120px; background-color:yellow; PADDING:3PX; text-align:left;">
                <p>-</p>
            </td>
        <?php } ?>
        <?php if($x=='1'){ ?>
            <td style="border-style:SOLID; width:120px; background-color:yellow; PADDING:3PX; text-align:left;">
                <p>-</p>
            </td>
        <?php } ?>
        <?php if($x=='1'){ ?>
            <td style="border-style:SOLID; width:120px; background-color:yellow; PADDING:3PX; text-align:left;">
                <p>-</p>
            </td>
        <?php } ?>
            <td style="border-style:SOLID; width:120px; PADDING:3PX; text-align:left;">
                <p>-</p>
            </td>
            <td style="border-style:SOLID; width:120px; PADDING:3PX; text-align:left;">
                <p>-</p>
            </td>
    </tr>
</table>


<br>
<table style="overflow:wrap;">
    <tr>
            <td style="border-style:none; width:200px; font-weight:bold; font-size:12px; text-align:left;">
                <p>PURCHASE GOODS</p>
            </td>
            <td style="border-style:none; width:30px; font-size:12px; text-align:left;">
                <p>:</p>
            </td>
            <td style="border-style:none; width:450px; font-size:12px; text-align:left;">
                <p class="pre-line">-</p>
            </td>
    </tr>
</table>

<table style="overflow:wrap;">
    <tr>
            <td style="border-style:none; width:200px; font-size:12px; text-align:left;">
                <p>NUMBER OF CASE</p>
            </td>
            <td style="border-style:none; width:30px; font-size:12px; text-align:left;">
                <p>:</p>
            </td>
            <td style="border-style:none; width:450px; font-size:12px; text-align:left;">
                <p class="pre-line">-</p>
            </td>
    </tr>
</table>
<table style="overflow:wrap;">
    <tr>
            <td style="border-style:none; width:200px; font-size:12px; text-align:left;">
                <p>AMOUNT</p>
            </td>
            <td style="border-style:none; width:30px; font-size:12px; text-align:left;">
                <p>:</p>
            </td>
            <td style="border-style:none; width:450px; font-size:12px; text-align:left;">
                <p class="pre-line">-</p>
            </td>
    </tr>
</table>

<br>
<table style="overflow:wrap;">
    <tr>
            <td style="border-style:none; width:200px; font-weight:bold; font-size:12px; text-align:left;">
                <p>FREE GOODS</p>
            </td>
            <td style="border-style:none; width:30px; font-size:12px; text-align:left;">
                <p>:</p>
            </td>
            <td style="border-style:none; width:450px; font-size:12px; text-align:left;">
                <p class="pre-line">-</p>
            </td>
    </tr>
</table>

<table style="overflow:wrap;">
    <tr>
            <td style="border-style:none; width:200px; font-size:12px; text-align:left;">
                <p>NUMBER OF CASE</p>
            </td>
            <td style="border-style:none; width:30px; font-size:12px; text-align:left;">
                <p>:</p>
            </td>
            <td style="border-style:none; width:450px; font-size:12px; text-align:left;">
                <p class="pre-line">-</p>
            </td>
    </tr>
</table>
<table style="overflow:wrap;">
    <tr>
            <td style="border-style:none; width:200px; font-size:12px; text-align:left;">
                <p>AMOUNT</p>
            </td>
            <td style="border-style:none; width:30px; font-size:12px; text-align:left;">
                <p>:</p>
            </td>
            <td style="border-style:none; width:450px; font-size:12px; text-align:left;">
                <p class="pre-line">-</p>
            </td>
    </tr>
</table>

<br>
<table style="overflow:wrap;">
    <tr>
            <td style="border-style:none; width:200px; font-weight:bold; font-size:12px; text-align:left;">
                <p>GRAND TOTAL</p>
            </td>
            <td style="border-style:none; width:30px; font-size:12px; text-align:left;">
                <p>:</p>
            </td>
            <td style="border-style:none; width:450px; font-size:12px; text-align:left;">
                <p class="pre-line">-</p>
            </td>
    </tr>
</table>

<table style="overflow:wrap;">
    <tr>
            <td style="border-style:none; width:200px; font-size:12px; text-align:left;">
                <p>NUMBER OF CASE</p>
            </td>
            <td style="border-style:none; width:30px; font-size:12px; text-align:left;">
                <p>:</p>
            </td>
            <td style="border-style:none; width:450px; font-size:12px; text-align:left;">
                <p class="pre-line">-</p>
            </td>
    </tr>
</table>
<table style="overflow:wrap;">
    <tr>
            <td style="border-style:none; width:200px; font-size:12px; text-align:left;">
                <p>AMOUNT</p>
            </td>
            <td style="border-style:none; width:30px; font-size:12px; text-align:left;">
                <p>:</p>
            </td>
            <td style="border-style:none; width:450px; font-size:12px; text-align:left;">
                <p class="pre-line">-</p>
            </td>
    </tr>
</table>




    
    </body>
    </html>
    <?php
    
    $mpdf->setFooter('');
    //penulisan output selesai, sekarang menutup mpdf dan generate kedalam format pdf
    $html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
    ob_end_clean();
    //Disini dimulai proses convert UTF-8, kalau ingin ISO-8859-1 cukup dengan mengganti $mpdf->WriteHTML($html);
    $mpdf->WriteHTML(utf8_encode($html));
    $mpdf->Output($nama_dokumen.".pdf" ,'I');
    exit;
}

}