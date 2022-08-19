<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TestPrint extends CI_Controller {

public function Proforma_Invoice()
{
        $nama_dokumen='Proforma_Invoice'; //Beri nama file PDF hasil.

        // $comp=$this->session->userdata('logged_gapara_in')->gpr_usr_company;
        // $lspatrol=$this->M_AdminClient->listing_totalpatrol_checkpoin($comp,$month,$year);

        // $x=array($lspatrol);
        // $total=count($lspatrol);


        // define('_MPDF_PATH','mpdf60/'); // Tentukan folder dimana anda menyimpan folder mpdf
        require_once('assets/mpdf_v8.0.3-master/vendor/autoload.php'); // Arahkan ke file mpdf.php didalam folder mpdf
        // $mpdf=new Mpdf('utf-8', 'A4', 10.5, 'arial'); // Membuat file mpdf baru
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->AddPage("P","","","","","15","15","15","15","","","","","","","","","","","","A4");
        //Memulai proses untuk menyimpan variabel php dan html
        ob_start();
        ?>
        <html> 
        <head>
        <!-- Bootstrap CSS -->
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    
        <style>
    
            table{margin:0px; font-size: 14px;}
            /* tr{border: solid;} */
            td,th{padding: 1px; text-align: center;}
            h1{text-align: center; font-weight:800; font-size: 24px; }
            th{background-color: #000B49; padding: 10px;color: #fff}
            td{border:solid; border-width: 0.001mm;}
            body {
                font-family: sans-serif;
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
                    <img style="width: 200px;" src="<?php echo base_url("assets/images/gonusa_600.gif"); ?>">
                </td>
            </tr>
        </table>

        <table style="width: 100%">
            <tr>
                <td style="border-style:none;">
                    <h2 style="font-weight: bold;">PROFORMA INVOICE</h2>
                </td>
            </tr>
        </table>
<br>
<br>
        <table style="width: 100%">
            <tr>
                <td style="text-align:left; border-style:none; width:200px;">
                    <h5 style="font-weight: 600; font-size:12px;">PI NO</h5>
                </td>
                <td style="text-align:left; border-style:none; width:20px;">
                    <h5 style="font-weight: 600; font-size:12px;">:</h5>
                </td>
                <td style="text-align:left; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;">-</h5>
                </td>
            </tr>
        </table>

        <table style="width: 100%">
            <tr>
                <td style="text-align:left; border-style:none; width:200px;">
                    <h5 style="font-weight: 600; font-size:12px;">PO NO</h5>
                </td>
                <td style="text-align:left; border-style:none; width:20px;">
                    <h5 style="font-weight: 600; font-size:12px;">:</h5>
                </td>
                <td style="text-align:left; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;">-</h5>
                </td>
            </tr>
        </table>

        <table style="width: 100%">
            <tr>
                <td style="text-align:left; border-style:none; width:200px;">
                    <h5 style="font-weight: 600; font-size:12px;">CONSIGNEE</h5>
                </td>
                <td style="text-align:left; border-style:none; width:20px;">
                    <h5 style="font-weight: 600; font-size:12px;">:</h5>
                </td>
                <td style="text-align:left; border-style:none; padding-top:20px;">
                    <h5 style="font-weight: 600; font-size:12px;">CONSIGNEE CONSIGNEE CONSIGNEE CONSIGNEE CONSIGNEE CONSIGNEE CONSIGNEE CONSIGNEE CONSIGNEE CONSIGNEE CONSIGNEE CONSIGNEE CONSIGNEE CONSIGNEE CONSIGNEE CONSIGNEE CONSIGNEE</h5>
                </td>
            </tr>
        </table>

        <table style="width: 100%">
            <tr>
                <td style="text-align:left; border-style:none; width:200px;">
                    <h5 style="font-weight: 600; font-size:12px;">BENEFICIARY</h5>
                </td>
                <td style="text-align:left; border-style:none; width:20px;">
                    <h5 style="font-weight: 600; font-size:12px;">:</h5>
                </td>
                <td style="text-align:left; border-style:none; padding-top:20px;">
                    <h5 style="font-weight: 600; font-size:12px;">CONSIGNEE CONSIGNEE CONSIGNEE CONSIGNEE CONSIGNEE CONSIGNEE CONSIGNEE CONSIGNEE CONSIGNEE CONSIGNEE CONSIGNEE CONSIGNEE CONSIGNEE CONSIGNEE CONSIGNEE CONSIGNEE CONSIGNEE</h5>
                </td>
            </tr>
        </table>

        <table style="width: 100%">
            <tr>
                <td style="text-align:left; border-style:none; width:200px;">
                    <h5 style="font-weight: 600; font-size:12px;">DESTINATION</h5>
                </td>
                <td style="text-align:left; border-style:none; width:20px;">
                    <h5 style="font-weight: 600; font-size:12px;">:</h5>
                </td>
                <td style="text-align:left; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;">-</h5>
                </td>
            </tr>
        </table>

        <table style="width: 100%">
            <tr>
                <td style="text-align:left; border-style:none; width:200px;">
                    <h5 style="font-weight: 600; font-size:12px;">ETD EST</h5>
                </td>
                <td style="text-align:left; border-style:none; width:20px;">
                    <h5 style="font-weight: 600; font-size:12px;">:</h5>
                </td>
                <td style="text-align:left; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;">-</h5>
                </td>
            </tr>
        </table>

        <table style="width: 100%">
            <tr>
                <td style="text-align:left; border-style:none; width:200px;">
                    <h5 style="font-weight: 600; font-size:12px;">LOADING PORT</h5>
                </td>
                <td style="text-align:left; border-style:none; width:20px;">
                    <h5 style="font-weight: 600; font-size:12px;">:</h5>
                </td>
                <td style="text-align:left; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;">-</h5>
                </td>
            </tr>
        </table>

        <table style="width: 100%">
            <tr>
                <td style="text-align:left; border-style:none; width:200px;">
                    <h5 style="font-weight: 600; font-size:12px;">COUNTRY OF ORIGIN</h5>
                </td>
                <td style="text-align:left; border-style:none; width:20px;">
                    <h5 style="font-weight: 600; font-size:12px;">:</h5>
                </td>
                <td style="text-align:left; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;">-</h5>
                </td>
            </tr>
        </table>

<br>
<br>
        <table style="width: 100%; margin:-0.5mm;">
            <tr style="margin:0px;">
                <td style="width: 30%;">
                    <h5 style="font-weight: bold; font-size:12px; margin-right:-1px;">DESCRIPTION OF GOODS</h5>
                </td>
                <td style="width: 20%;">
                    <h5 style="font-weight: bold; font-size:12px;">PACKING</h5>
                </td>
                <td style="width: 10%;">
                    <h5 style="font-weight: bold; font-size:12px;">QTY</h5>
                </td>
                <td style="width: 20%;">
                    <h5 style="font-weight: bold; font-size:12px;">UNIT PRICE ( FOB )</h5>
                </td>
                <td style="width: 20%;">
                    <h5 style="font-weight: bold; font-size:12px;">TOTAL<br><span style="font-size: 10px;">United State Dollars</span></h5>
                </td>
            </tr>
        </table>
        <table style="width: 100%; margin:-0.5mm;">
            <tr style="white-space:nowrap; margin:0px;">
                <td style="border-bottom: none; width: 30%;">
                    <h5 style="font-weight: 600; font-size:12px; margin-right:-1px;">-</h5>
                </td>
                <td style="border-bottom: none; width: 20%;">
                    <h5 style="font-weight: 600; font-size:12px;">-</h5>
                </td>
                <td style="border-bottom: none; width: 10%;">
                    <h5 style="font-weight: 600; font-size:12px;">-</h5>
                </td>
                <td style="border-bottom: none; width: 20%;">
                    <h5 style="font-weight: 600; font-size:12px;">-</h5>
                </td>
                <td style="border-bottom: none; width: 20%;">
                    <h5 style="font-weight: 600; font-size:12px;">-</h5>
                </td>
            </tr>
        </table>
        <table style="width: 100%; margin:-0.5mm;">
            <tr style="margin:0px;">
                <td style="width: 50%; text-align:left; padding:5px;">
                    <h5 style="font-weight: bold; font-size:12px; margin-right:-1px;">GRAND TOTAL FOB ......</h5>
                </td>
                <td style="width: 10%;">
                    <h5 style="font-weight: 600; font-size:12px;">......</h5>
                </td>
                <td style="width: 20%;">
                    <h5 style="font-weight: 600; font-size:12px;"></h5>
                </td>
                <td style="width: 20%; text-align:right;">
                    <h5 style="font-weight: 600; font-size:12px;">$ <span style="text-align: right;">.....</span></h5>
                </td>
            </tr>
        </table>

        <hr>
        <table style="width: 100%;">
            <tr>
                <td style="width: 50%; border:none; text-align:left; padding:2px;">
                    <h5 style="font-weight: bold; font-size:12px;">Scheme Payment :</h5>
                </td>
               
                
            </tr>
        </table>
        <table style="width: 100%;">
            <tr>
                <td style="width: 50%; border:none; text-align:left; padding:2px;">
                    <h5 style="font-weight: 600; font-size:12px;">......[Master TOP].......</h5>
                </td> 
            </tr>
        </table>
        <table style="width: 100%;">
            <tr>
                <td style="width: 50%; border:none; text-align:left; padding:2px;">
                    <h5 style="font-weight: 600; font-size:12px;">Please TT To The Following Account :</h5>
                </td> 
            </tr>
        </table>
        <table style="width: 100%;">
            <tr>
                <td style="width: 50%; border:none; text-align:justify;">
                    <h5 style="font-weight: 600; font-size:12px;">Bank Name</h5>
                </td>
                <td style="width: 10%; border:none; text-align:justify;">
                    <h5 style="font-weight: 600; font-size:12px;">:</h5>
                </td>
                <td style="width: 40%; border:none; text-align:left;">
                    <h5 style="font-weight: 600; font-size:12px;">CONSIGNEE CONSIGNEE CONSIGNEE CONSIGNEE CONSIGNEE CONSIGNEE CONSIGNEE CONSIGNEE CONSIGNEE CONSIGNEE CONSIGNEE CONSIGNEE CONSIGNEE CONSIGNEE CONSIGNEE CONSIGNEE CONSIGNEE</h5>
                </td>  
            </tr>
        </table>
<br>
        <table style="width: 100%;">
            <tr>
                <td style="width: 50%; border:none; text-align:justify;">
                    <h5 style="font-weight: 600; font-size:12px;">Beneficiary</h5>
                </td>
                <td style="width: 10%; border:none; text-align:justify;">
                    <h5 style="font-weight: 600; font-size:12px;">:</h5>
                </td>
                <td style="width: 40%; border:none; text-align:left;">
                    <h5 style="font-weight: 600; font-size:12px;">CONSIGNEE CONSIGNEE CONSIGNEE CONSIGNEE CONSIGNEE CONSIGNEE CONSIGNEE CONSIGNEE CONSIGNEE CONSIGNEE CONSIGNEE CONSIGNEE CONSIGNEE CONSIGNEE CONSIGNEE CONSIGNEE CONSIGNEE</h5>
                </td>  
            </tr>
        </table>

        <br>
        <br>
        <br>
        <br>
        <table style="width: 100%;">
            <tr>
                <td style="width: 10%; border:none; text-align:justify;">
                    <h5 style="font-weight: 600; font-size:12px;"></h5>
                </td>
                <td style="width: 10%; border:none; text-align:justify;">
                    <h5 style="font-weight: 600; font-size:12px;">Jakarta,....</h5>
                </td>
                <td style="width: 30%; border:none; text-align:left;">
                    <h5 style="font-weight: 600; font-size:12px;"></h5>
                </td>  
                <td style="width: 20%; border:none; text-align:justify;">
                    <h5 style="font-weight: 600; font-size:12px;"></h5>
                </td>
                <td style="width: 10%; border:none; text-align:justify;">
                    <h5 style="font-weight: 600; font-size:12px;">Guangdong,....</h5>
                </td>
                <td style="width: 20%; border:none; text-align:left;">
                    <h5 style="font-weight: 600; font-size:12px;"></h5>
                </td> 
            </tr>
        </table>

        <br>
        <br>
        <br>
        <br>
        <table style="width: 100%;">
            <tr>
                <td style="width: 10%; border:none; text-align:justify;">
                    <h5 style="font-weight: 600; font-size:12px;"></h5>
                </td>
                <td style="width: 30%; border:none; text-align:justify;">
                    <h5 style="font-weight: 600; font-size:12px;">User Create</h5>
                </td>
                <td style="width: 10%; border:none; text-align:left;">
                    <h5 style="font-weight: 600; font-size:12px;"></h5>
                </td>  
                <td style="width: 20%; border:none; text-align:justify;">
                    <h5 style="font-weight: 600; font-size:12px;"></h5>
                </td>
                <td style="width: 10%; border:none; text-align:justify;">
                    <h5 style="font-weight: 600; font-size:12px;">Consignee</h5>
                </td>
                <td style="width: 20%; border:none; text-align:left;">
                    <h5 style="font-weight: 600; font-size:12px;"></h5>
                </td> 
            </tr>
        </table>
        <table style="width: 100%;">
            <tr>
                <td style="width: 10%; border:none; text-align:justify;">
                    <h5 style="font-weight: 600; font-size:12px;"></h5>
                </td>
                <td style="width: 30%; border:none; text-align:justify;">
                    <h5 style="font-weight: 600; font-size:12px;">Global Business Head</h5>
                </td>
                <td style="width: 10%; border:none; text-align:left;">
                    <h5 style="font-weight: 600; font-size:12px;"></h5>
                </td>  
                <td style="width: 20%; border:none; text-align:justify;">
                    <h5 style="font-weight: 600; font-size:12px;"></h5>
                </td>
                <td style="width: 10%; border:none; text-align:justify;">
                    <h5 style="font-weight: 600; font-size:12px;"></h5>
                </td>
                <td style="width: 20%; border:none; text-align:left;">
                    <h5 style="font-weight: 600; font-size:12px;"></h5>
                </td> 
            </tr>
        </table>
        <table style="width: 100%;">
            <tr>
                <td style="width: 10%; border:none; text-align:justify;">
                    <h5 style="font-weight: 600; font-size:12px;"></h5>
                </td>
                <td style="width: 30%; border:none; text-align:justify;">
                    <h5 style="font-weight: 600; font-size:12px;">PT. GONUSA PRIMA DISTRIBUSI</h5>
                </td>
                <td style="width: 10%; border:none; text-align:left;">
                    <h5 style="font-weight: 600; font-size:12px;"></h5>
                </td>  
                <td style="width: 20%; border:none; text-align:justify;">
                    <h5 style="font-weight: 600; font-size:12px;"></h5>
                </td>
                <td style="width: 10%; border:none; text-align:justify;">
                    <h5 style="font-weight: 600; font-size:12px;"></h5>
                </td>
                <td style="width: 20%; border:none; text-align:left;">
                    <h5 style="font-weight: 600; font-size:12px;"></h5>
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


public function invoice()
{
        $nama_dokumen='Invoice'; //Beri nama file PDF hasil.

        // define('_MPDF_PATH','mpdf60/'); // Tentukan folder dimana anda menyimpan folder mpdf
        require_once('assets/mpdf_v8.0.3-master/vendor/autoload.php'); // Arahkan ke file mpdf.php didalam folder mpdf
        // $mpdf=new Mpdf('utf-8', 'A4', 10.5, 'arial'); // Membuat file mpdf baru
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->AddPage("L","","","","","15","15","15","15","","","","","","","","","","","","A4");
        //Memulai proses untuk menyimpan variabel php dan html
        ob_start();
        ?>
        <html> 
        <head>
        
    
        <style>
    
            table{margin:0px; font-size: 14px;}
            td,th{padding: 1px; text-align: center;}
            h1{text-align: center; font-weight:800; font-size: 24px; }
            th{background-color: #000B49; padding: 10px;color: #fff}
            td{border:solid; border-width: 0.001mm;}
            body {
                font-family: sans-serif;
            }
        </style>
        </head>
        <body>


        <table style="width: 100%">
            <tr>
                <td style="text-align:left; border-style:none;">
                    <img style="width: 200px;" src="<?php echo base_url("assets/images/gonusa_600.gif"); ?>">
                </td>
            </tr>
        </table>

        <table style="width: 100%">
            <tr>
                <td style="border-style:none;">
                    <h2 style="font-weight: bold;">INVOICE</h2>
                </td>
            </tr>
            <tr>
                <td style="border-style:none;">
                    <p style="font-weight: 700; font-size:12px;">INVOICE-NO</p>
                </td>
            </tr>
        </table>
<br>
<br>
        <table style="width: 100%">
            <tr>
                <td style="text-align:left; border-style:none; width:200px;">
                    <h5 style="font-weight: 600; font-size:12px;">PI NO</h5>
                </td>
                <td style="text-align:left; border-style:none; width:20px;">
                    <h5 style="font-weight: 600; font-size:12px;">:</h5>
                </td>
                <td style="text-align:left; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;">-</h5>
                </td>
            </tr>
        </table>

        <table style="width: 100%">
            <tr>
                <td style="text-align:left; border-style:none; width:200px;">
                    <h5 style="font-weight: 600; font-size:12px;">PO NO</h5>
                </td>
                <td style="text-align:left; border-style:none; width:20px;">
                    <h5 style="font-weight: 600; font-size:12px;">:</h5>
                </td>
                <td style="text-align:left; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;">-</h5>
                </td>
            </tr>
        </table>

        <table style="width: 100%">
            <tr>
                <td style="text-align:left; border-style:none; width:200px;">
                    <h5 style="font-weight: 600; font-size:12px;">CONSIGNEE</h5>
                </td>
                <td style="text-align:left; border-style:none; width:20px;">
                    <h5 style="font-weight: 600; font-size:12px;">:</h5>
                </td>
                <td style="text-align:left; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;">-</h5>
                </td>
            </tr>
        </table>

        <table style="width: 100%">
            <tr>
                <td style="text-align:left; border-style:none; width:200px; padding-top:0px;">
                    <h5 style="font-weight: 600; font-size:12px;">NOTIFY</h5>
                </td>
                <td style="text-align:left; border-style:none; width:20px;">
                    <h5 style="font-weight: 600; font-size:12px;">:</h5>
                </td>
                <td style="text-align:left; border-style:none; padding-top:20px;">
                    <h5 style="font-weight: 600; font-size:12px;">-</h5>
                </td>
            </tr>
        </table>

        <table style="width: 700px;">
            <tr>
                <td style="text-align:left; border-style:none; width:200px; padding-top:0px;">
                    <h5 style="font-weight: 600; font-size:12px;">SHIPPER</h5>
                </td>
                <td style="text-align:left; border-style:none; width:20px;">
                    <h5 style="font-weight: 600; font-size:12px;">:</h5>
                </td>
                <td style="text-align:left; width: 750px; border-style:none; white-space:wrap; overflow:wrap; padding-top:20px; ">
                    <h5 style="font-weight: 600; font-size:12px;">-</h5>
                </td>
            </tr>
        </table>

        <table style="width: 100%">
            <tr>
                <td style="text-align:left; border-style:none; width:200px;">
                    <h5 style="font-weight: 600; font-size:12px;">DESTINATION</h5>
                </td>
                <td style="text-align:left; border-style:none; width:20px;">
                    <h5 style="font-weight: 600; font-size:12px;">:</h5>
                </td>
                <td style="text-align:left; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;">-</h5>
                </td>
            </tr>
        </table>

        <table style="width: 100%">
            <tr>
                <td style="text-align:left; border-style:none; width:200px;">
                    <h5 style="font-weight: 600; font-size:12px;">ETD EST</h5>
                </td>
                <td style="text-align:left; border-style:none; width:20px;">
                    <h5 style="font-weight: 600; font-size:12px;">:</h5>
                </td>
                <td style="text-align:left; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;">-</h5>
                </td>
            </tr>
        </table>

        <table style="width: 100%">
            <tr>
                <td style="text-align:left; border-style:none; width:200px;">
                    <h5 style="font-weight: 600; font-size:12px;">LOADING PORT</h5>
                </td>
                <td style="text-align:left; border-style:none; width:20px;">
                    <h5 style="font-weight: 600; font-size:12px;">:</h5>
                </td>
                <td style="text-align:left; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;">-</h5>
                </td>
            </tr>
        </table>

        <table style="width: 100%">
            <tr>
                <td style="text-align:left; border-style:none; width:200px;">
                    <h5 style="font-weight: 600; font-size:12px;">COUNTRY OF ORIGIN</h5>
                </td>
                <td style="text-align:left; border-style:none; width:20px;">
                    <h5 style="font-weight: 600; font-size:12px;">:</h5>
                </td>
                <td style="text-align:left; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;">-</h5>
                </td>
            </tr>
        </table>
        <table style="width: 100%">
            <tr>
                <td style="text-align:left; border-style:none; width:200px;">
                    <h5 style="font-weight: 600; font-size:12px;">#FFRN</h5>
                </td>
                <td style="text-align:left; border-style:none; width:20px;">
                    <h5 style="font-weight: 600; font-size:12px;">:</h5>
                </td>
                <td style="text-align:left; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;">-</h5>
                </td>
            </tr>
        </table>

<br>
<br>
        <table style="width: 700px;">
            <tr>
                <td style="width: 100px; padding:3px;">
                    <h5 style="font-weight: bold; font-size:12px;">CONTAINER</h5>
                </td>
                <td style="width: 100px; padding:3px;">
                    <h5 style="font-weight: bold; font-size:12px;">HS CODE</h5>
                </td>
                <td style="width: 450px; padding:3px;">
                    <h5 style="font-weight: bold; font-size:12px;">DESCRIPTION OF GOODS</h5>
                </td>
                <td style="width: 100px; padding:3px;">
                    <h5 style="font-weight: bold; font-size:12px;">PACKING</h5>
                </td>
                <td style="width: 100px; padding:3px;">
                    <h5 style="font-weight: bold; font-size:12px;">QTY ( CTNS )</h5>
                </td>
                <td style="width: 100px; padding:3px;">
                    <h5 style="font-weight: bold; font-size:12px;">UNIT PRICE</h5>
                </td>
                <td style="width: 100px; padding:3px;">
                    <h5 style="font-weight: bold; font-size:12px;">TOTAL PRICE</h5>
                </td>
            </tr>
        </table>
        <table style="width: 700px;">
            <tr>
                <td style="width: 100px; padding:1px;">
                    <h5 style="font-weight: 600; font-size:12px;">-</h5>
                </td>
                <td style="width: 100px; padding:1px;">
                    <h5 style="font-weight: 600; font-size:12px;">-</h5>
                </td>
                <td style="width: 450px; padding:3px; text-align:left;">
                    <h5 style="font-weight: 600; font-size:12px;"> - </h5>
                </td>
                <td style="width: 100px; padding:3px;">
                    <h5 style="font-weight: 600; font-size:12px;">-</h5>
                </td>
                <td style="width: 100px; padding:1px;">
                    <h5 style="font-weight: 600; font-size:12px;">-</h5>
                </td>
                <td style="width: 100px; padding:1px;">
                    <h5 style="font-weight: 600; font-size:12px;">-</h5>
                </td>
                <td style="width: 100px; padding:1px;">
                    <h5 style="font-weight: 600; font-size:12px;">-</h5>
                </td>
            </tr>
        </table>
        <table style="width: 700px;">
            <tr>
                <td style="width: 100px; padding:1px;">
                    <h5 style="font-weight: 600; font-size:12px;">-</h5>
                </td>
                <td style="width: 100px; padding:1px;">
                    <h5 style="font-weight: 600; font-size:12px;">-</h5>
                </td>
                <td style="width: 450px; padding:3px; text-align:left;">
                    <h5 style="font-weight: 600; font-size:12px;"> - </h5>
                </td>
                <td style="width: 100px; padding:3px;">
                    <h5 style="font-weight: 600; font-size:12px;">-</h5>
                </td>
                <td style="width: 100px; padding:1px;">
                    <h5 style="font-weight: 600; font-size:12px;">-</h5>
                </td>
                <td style="width: 100px; padding:1px;">
                    <h5 style="font-weight: 600; font-size:12px;">-</h5>
                </td>
                <td style="width: 100px; padding:1px;">
                    <h5 style="font-weight: 600; font-size:12px;">-</h5>
                </td>
            </tr>
        </table>
        
        <!-- <table style="width: 100%; margin:-0.5mm;">
            <tr style="margin:0px;">
                <td style="border-bottom: none; width: 10%;">
                    <h5 style="font-weight: 600; font-size:12px;">-</h5>
                </td>
                <td style="border-bottom: none; width: 10%;">
                    <h5 style="font-weight: 600; font-size:12px;">-</h5>
                </td>
                <td style="border-bottom: none; width: 10%;">
                    <h5 style="font-weight: 600; font-size:12px;">DESCRIPTION OF GOODS</h5>
                </td>
                <td style="border-bottom: none; width: 10%;">
                    <h5 style="font-weight: 600; font-size:12px;">-</h5>
                </td>
                <td style="border-bottom: none; width: 10%;">
                    <h5 style="font-weight: 600; font-size:12px;">-</h5>
                </td>
                <td style="border-bottom: none; width: 10%;">
                    <h5 style="font-weight: 600; font-size:12px;">-</h5>
                </td>
                <td style="border-bottom: none; width: 10%;">
                    <h5 style="font-weight: 600; font-size:12px;">-</h5>
                </td>
            </tr>
        </table> -->
        <table style="width: 700px;">
            <tr>
                <td style="width: 750px; text-align:left; padding:3px;">
                    <h5 style="font-weight: bold; font-size:12px;">GRAND TOTAL FOB</h5>
                </td>
                <td style="width: 100px;">
                    <h5 style="font-weight: 600; font-size:12px;">....</h5>
                </td>
                <td style="width: 100px;">
                    <h5 style="font-weight: 600; font-size:12px;"></h5>
                </td>
                <td style="width: 100px; text-align:right;">
                    <h5 style="font-weight: 600; font-size:12px;">$ <span style="text-align: right;">....</span></h5>
                </td>
            </tr>
        </table>
        <table style="width: 700px;">
            <tr>
                <td style="width: 750px; text-align:left; padding:3px;">
                    <h5 style="font-weight: bold; font-size:12px;">SAY : .....</h5>
                </td>
                <td style="width: 100px;">
                    <h5 style="font-weight: 600; font-size:12px;">....</h5>
                </td>
                <td style="width: 100px;">
                    <h5 style="font-weight: 600; font-size:12px;"></h5>
                </td>
                <td style="width: 100px; text-align:right;">
                    <h5 style="font-weight: 600; font-size:12px;">....</h5>
                </td>
            </tr>
        </table>

        <hr>

        <br>

        <table style="width: 700px;">
            <tr>
                <td style="width: 100px; border-style:none; padding:3px;">
                    <h5 style="font-weight: bold; font-size:12px;">FREE GOODS</h5>
                </td>
                <td style="width: 100px; border-style:none; padding:3px;">
                    <h5 style="font-weight: 600; font-size:12px;"></h5>
                </td>
                <td style="width: 450px; border-style:none; padding:3px;">
                    <h5 style="font-weight: 600; font-size:12px;"></h5>
                </td>
                <td style="width: 100px; border-style:none; padding:3px;">
                    <h5 style="font-weight: 600; font-size:12px;"></h5>
                </td>
                <td style="width: 100px; border-style:none; padding:3px;">
                    <h5 style="font-weight: 600; font-size:12px;"></h5>
                </td>
                <td style="width: 100px; border-style:none; padding:3px;">
                    <h5 style="font-weight: 600; font-size:12px;"></h5>
                </td>
                <td style="width: 100px; border-style:none; padding:3px;">
                    <h5 style="font-weight: 600; font-size:12px;"></h5>
                </td>
            </tr>
        </table>

        <table style="width: 700px;">
            <tr>
                <td style="width: 100px; padding:3px;">
                    <h5 style="font-weight: bold; font-size:12px;">CONTAINER</h5>
                </td>
                <td style="width: 100px; padding:3px;">
                    <h5 style="font-weight: bold; font-size:12px;">HS CODE</h5>
                </td>
                <td style="width: 450px; padding:3px;">
                    <h5 style="font-weight: bold; font-size:12px;">DESCRIPTION OF GOODS</h5>
                </td>
                <td style="width: 100px; padding:3px;">
                    <h5 style="font-weight: bold; font-size:12px;">PACKING</h5>
                </td>
                <td style="width: 100px; padding:3px;">
                    <h5 style="font-weight: bold; font-size:12px;">QTY ( CTNS )</h5>
                </td>
                <td style="width: 100px; padding:3px;">
                    <h5 style="font-weight: bold; font-size:12px;">UNIT PRICE</h5>
                </td>
                <td style="width: 100px; padding:3px;">
                    <h5 style="font-weight: bold; font-size:12px;">TOTAL PRICE</h5>
                </td>
            </tr>
        </table>

        <table style="width: 700px;">
            <tr>
                <td style="width: 100px; padding:1px;">
                    <h5 style="font-weight: 600; font-size:12px;">-</h5>
                </td>
                <td style="width: 100px; padding:1px;">
                    <h5 style="font-weight: 600; font-size:12px;">-</h5>
                </td>
                <td style="width: 450px; padding:3px; text-align:left;">
                    <h5 style="font-weight: 600; font-size:12px;"> - </h5>
                </td>
                <td style="width: 100px; padding:3px;">
                    <h5 style="font-weight: 600; font-size:12px;">-</h5>
                </td>
                <td style="width: 100px; padding:1px;">
                    <h5 style="font-weight: 600; font-size:12px;">-</h5>
                </td>
                <td style="width: 100px; padding:1px;">
                    <h5 style="font-weight: 600; font-size:12px;">-</h5>
                </td>
                <td style="width: 100px; padding:1px;">
                    <h5 style="font-weight: 600; font-size:12px;">-</h5>
                </td>
            </tr>
        </table>
        <table style="width: 700px;">
            <tr>
                <td style="width: 100px; padding:1px;">
                    <h5 style="font-weight: 600; font-size:12px;">-</h5>
                </td>
                <td style="width: 100px; padding:1px;">
                    <h5 style="font-weight: 600; font-size:12px;">-</h5>
                </td>
                <td style="width: 450px; padding:3px; text-align:left;">
                    <h5 style="font-weight: 600; font-size:12px;"> - </h5>
                </td>
                <td style="width: 100px; padding:3px;">
                    <h5 style="font-weight: 600; font-size:12px;">-</h5>
                </td>
                <td style="width: 100px; padding:1px;">
                    <h5 style="font-weight: 600; font-size:12px;">-</h5>
                </td>
                <td style="width: 100px; padding:1px;">
                    <h5 style="font-weight: 600; font-size:12px;">-</h5>
                </td>
                <td style="width: 100px; padding:1px;">
                    <h5 style="font-weight: 600; font-size:12px;">-</h5>
                </td>
            </tr>
        </table>
        <table style="width: 700px;">
            <tr>
                <td style="width: 750px; text-align:left; padding:3px;">
                    <h5 style="font-weight: bold; font-size:12px;">GRAND TOTAL FOB</h5>
                </td>
                <td style="width: 100px;">
                    <h5 style="font-weight: 600; font-size:12px;">....</h5>
                </td>
                <td style="width: 100px;">
                    <h5 style="font-weight: 600; font-size:12px;"></h5>
                </td>
                <td style="width: 100px; text-align:right;">
                    <h5 style="font-weight: 600; font-size:12px;">....</h5>
                </td>
            </tr>
        </table>

        <br>
       
        <table style="width: 500px;">
            <tr>
                <td style="width: 50px; text-align:left; border-style:none; padding:3px;">
                    <h5 style="font-weight: bold; font-size:12px;">PURCHASE GOODS</h5>
                </td>
                <td style="width: 10px; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;"></h5>
                </td>
                <td style="width: 100px; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;"></h5>
                </td>
                <td style="width: 100px; text-align:right; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;"></h5>
                </td>
            </tr>
        </table>

        <table>
            <tr>
                <td style="width: 210px; text-align:left; border-style:none; padding:3px;">
                    <h5 style="font-weight: 600; font-size:12px;">NUMBER OF CASE</h5>
                </td>
                <td style="width: 10px; text-align:left; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;">:</h5>
                </td>
                <td style="width: 0px; text-align:left; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;">Cartons</h5>
                </td>
                <td style="width: 100px; text-align:left; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;"></h5>
                </td>
            </tr>
        </table>

        <table>
            <tr>
                <td style="width: 210px; text-align:left; border-style:none; padding:3px;">
                    <h5 style="font-weight: 600; font-size:12px;">AMOUNT</h5>
                </td>
                <td style="width: 10px; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;">:</h5>
                </td>
                <td style="width: 0px; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;"> USD</h5>
                </td>
                <td style="width: 100px; text-align:right; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;"></h5>
                </td>
            </tr>
        </table>

        <br>
        <br>

        <table>
            <tr>
                <td style="width: 210px; text-align:left; border-style:none; padding:3px;">
                    <h5 style="font-weight: bold; font-size:12px;">FREE GOODS</h5>
                </td>
                <td style="width: 10px; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;"></h5>
                </td>
                <td style="width: 100px; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;"></h5>
                </td>
                <td style="width: 100px; text-align:right; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;"></h5>
                </td>
            </tr>
        </table>

        <table>
            <tr>
                <td style="width: 210px; text-align:left; border-style:none; padding:3px;">
                    <h5 style="font-weight: 600; font-size:12px;">NUMBER OF CASE</h5>
                </td>
                <td style="width: 10px; text-align:left; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;">:</h5>
                </td>
                <td style="width: 0px; text-align:left; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;">Cartons</h5>
                </td>
                <td style="width: 100px; text-align:left; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;"></h5>
                </td>
            </tr>
        </table>

        <table>
            <tr>
                <td style="width: 210px; text-align:left; border-style:none; padding:3px;">
                    <h5 style="font-weight: 600; font-size:12px;">AMOUNT</h5>
                </td>
                <td style="width: 10px; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;">:</h5>
                </td>
                <td style="width: 0px; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;"> USD</h5>
                </td>
                <td style="width: 100px; text-align:right; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;"></h5>
                </td>
            </tr>
        </table>

        <br>

        <table>
            <tr>
                <td style="width: 210px; text-align:left; border-style:none; padding:3px;">
                    <h5 style="font-weight: bold; font-size:12px;">GRAND TOTAL</h5>
                </td>
                <td style="width: 10px; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;"></h5>
                </td>
                <td style="width: 100px; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;"></h5>
                </td>
                <td style="width: 100px; text-align:right; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;"></h5>
                </td>
            </tr>
        </table>

        <table>
            <tr>
                <td style="width: 210px; text-align:left; border-style:none; padding:3px;">
                    <h5 style="font-weight: 600; font-size:12px;">NUMBER OF CASE</h5>
                </td>
                <td style="width: 10px; text-align:left; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;">:</h5>
                </td>
                <td style="width: 0px; text-align:left; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;">Cartons</h5>
                </td>
                <td style="width: 100px; text-align:left; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;"></h5>
                </td>
            </tr>
        </table>

        <table>
            <tr>
                <td style="width: 210px; text-align:left; border-style:none; padding:3px;">
                    <h5 style="font-weight: 600; font-size:12px;">AMOUNT</h5>
                </td>
                <td style="width: 10px; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;">:</h5>
                </td>
                <td style="width: 0px; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;"> USD</h5>
                </td>
                <td style="width: 100px; text-align:right; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;"></h5>
                </td>
            </tr>
        </table>

        <table>
            <tr>
                <td style="width: 210px; text-align:left; border-style:none; padding:3px;">
                    <h5 style="font-weight: 600; font-size:12px;">SAY</h5>
                </td>
                <td style="width: 10px; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;">:</h5>
                </td>
                <td style="width: 0px; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;">.....</h5>
                </td>
                <td style="width: 100px; text-align:right; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;"></h5>
                </td>
            </tr>
        </table>

        <br>

        <table style="margin-top: 100px;">
            <tr>
                <td style="width: 110px; text-align:left; border-style:none; padding:3px;">
                    <h5 style="font-weight: bold; font-size:12px;"></h5>
                </td>
                <td style="width: 10px; border-style:none;">
                    <h5 style="font-weight: 900; font-size:12px;">KUDUS,.........</h5>
                </td>
                <td style="width: 100px; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;"></h5>
                </td>
                <td style="width: 100px; text-align:right; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;"></h5>
                </td>
            </tr>
        </table>

        <table style="margin-top: 100px;">
            <tr>
                <td style="width: 90px; text-align:left; border-style:none; padding:3px;">
                    <h5 style="font-weight: bold; font-size:12px;"></h5>
                </td>
                <td style="width: 200px; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;">User Create Invoice</h5>
                </td>
                <td style="width: 100px; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;"></h5>
                </td>
                <td style="width: 100px; text-align:right; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;"></h5>
                </td>
            </tr>
        </table>

        <table style="margin-top: 0px;">
            <tr>
                <td style="width: 160px; text-align:left; border-style:none; padding:3px;">
                    <h5 style="font-weight: bold; font-size:12px;"></h5>
                </td>
                <td style="width: 10px; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;">FINANCE</h5>
                </td>
                <td style="width: 100px; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;"></h5>
                </td>
                <td style="width: 100px; text-align:right; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;"></h5>
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



public function PackingList()
{
        $nama_dokumen='Invoice'; //Beri nama file PDF hasil.

        // define('_MPDF_PATH','mpdf60/'); // Tentukan folder dimana anda menyimpan folder mpdf
        require_once('assets/mpdf_v8.0.3-master/vendor/autoload.php'); // Arahkan ke file mpdf.php didalam folder mpdf
        // $mpdf=new Mpdf('utf-8', 'A4', 10.5, 'arial'); // Membuat file mpdf baru
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->AddPage("L","","","","","15","15","15","15","","","","","","","","","","","","A4");
        //Memulai proses untuk menyimpan variabel php dan html
        ob_start();
        ?>
        <html> 
        <head>
        
    
        <style>
    
            table{margin:0px; font-size: 14px;}
            td,th{padding: 1px; text-align: center;}
            h1{text-align: center; font-weight:800; font-size: 24px; }
            th{background-color: #000B49; padding: 10px;color: #fff}
            td{border:solid; border-width: 0.001mm;}
            body {
                font-family: sans-serif;
            }
        </style>
        </head>
        <body>


        <table style="width: 100%">
            <tr>
                <td style="text-align:left; border-style:none;">
                    <img style="width: 200px;" src="<?php echo base_url("assets/images/gonusa_600.gif"); ?>">
                </td>
            </tr>
        </table>

        <table style="width: 100%">
            <tr>
                <td style="border-style:none;">
                    <h2 style="font-weight: 700;">INVOICE</h2>
                </td>
            </tr>
            <tr>
                <td style="border-style:none;">
                    <p style="font-weight: 700;">INVOICE</p>
                </td>
            </tr>
        </table>
<br>
<br>
        <table style="width: 100%">
            <tr>
                <td style="text-align:left; border-style:none; width:200px;">
                    <h5 style="font-weight: 600; font-size:12px;">PI NO</h5>
                </td>
                <td style="text-align:left; border-style:none; width:20px;">
                    <h5 style="font-weight: 600; font-size:12px;">:</h5>
                </td>
                <td style="text-align:left; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;">-</h5>
                </td>
            </tr>
        </table>

        <table style="width: 100%">
            <tr>
                <td style="text-align:left; border-style:none; width:200px;">
                    <h5 style="font-weight: 600; font-size:12px;">PO NO</h5>
                </td>
                <td style="text-align:left; border-style:none; width:20px;">
                    <h5 style="font-weight: 600; font-size:12px;">:</h5>
                </td>
                <td style="text-align:left; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;">-</h5>
                </td>
            </tr>
        </table>

        <table style="width: 100%">
            <tr>
                <td style="text-align:left; border-style:none; width:200px;">
                    <h5 style="font-weight: 600; font-size:12px;">CONSIGNEE</h5>
                </td>
                <td style="text-align:left; border-style:none; width:20px;">
                    <h5 style="font-weight: 600; font-size:12px;">:</h5>
                </td>
                <td style="text-align:left; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;">-</h5>
                </td>
            </tr>
        </table>

        <table style="width: 100%">
            <tr>
                <td style="text-align:left; border-style:none; width:200px; padding-top:0px;">
                    <h5 style="font-weight: 600; font-size:12px;">NOTIFY</h5>
                </td>
                <td style="text-align:left; border-style:none; width:20px;">
                    <h5 style="font-weight: 600; font-size:12px;">:</h5>
                </td>
                <td style="text-align:left; border-style:none; padding-top:20px;">
                    <h5 style="font-weight: 600; font-size:12px;">-</h5>
                </td>
            </tr>
        </table>

        <table style="width: 700px;">
            <tr>
                <td style="text-align:left; border-style:none; width:200px; padding-top:0px;">
                    <h5 style="font-weight: 600; font-size:12px;">SHIPPER</h5>
                </td>
                <td style="text-align:left; border-style:none; width:20px;">
                    <h5 style="font-weight: 600; font-size:12px;">:</h5>
                </td>
                <td style="text-align:left; width: 750px; border-style:none; white-space:wrap; overflow:wrap; padding-top:20px; ">
                    <h5 style="font-weight: 600; font-size:12px;">-</h5>
                </td>
            </tr>
        </table>

        <table style="width: 100%">
            <tr>
                <td style="text-align:left; border-style:none; width:200px;">
                    <h5 style="font-weight: 600; font-size:12px;">DESTINATION</h5>
                </td>
                <td style="text-align:left; border-style:none; width:20px;">
                    <h5 style="font-weight: 600; font-size:12px;">:</h5>
                </td>
                <td style="text-align:left; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;">-</h5>
                </td>
            </tr>
        </table>

        <table style="width: 100%">
            <tr>
                <td style="text-align:left; border-style:none; width:200px;">
                    <h5 style="font-weight: 600; font-size:12px;">ETD EST</h5>
                </td>
                <td style="text-align:left; border-style:none; width:20px;">
                    <h5 style="font-weight: 600; font-size:12px;">:</h5>
                </td>
                <td style="text-align:left; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;">-</h5>
                </td>
            </tr>
        </table>

        <table style="width: 100%">
            <tr>
                <td style="text-align:left; border-style:none; width:200px;">
                    <h5 style="font-weight: 600; font-size:12px;">LOADING PORT</h5>
                </td>
                <td style="text-align:left; border-style:none; width:20px;">
                    <h5 style="font-weight: 600; font-size:12px;">:</h5>
                </td>
                <td style="text-align:left; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;">-</h5>
                </td>
            </tr>
        </table>

        <table style="width: 100%">
            <tr>
                <td style="text-align:left; border-style:none; width:200px;">
                    <h5 style="font-weight: 600; font-size:12px;">COUNTRY OF ORIGIN</h5>
                </td>
                <td style="text-align:left; border-style:none; width:20px;">
                    <h5 style="font-weight: 600; font-size:12px;">:</h5>
                </td>
                <td style="text-align:left; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;">-</h5>
                </td>
            </tr>
        </table>
        <table style="width: 100%">
            <tr>
                <td style="text-align:left; border-style:none; width:200px;">
                    <h5 style="font-weight: 600; font-size:12px;">#FFRN</h5>
                </td>
                <td style="text-align:left; border-style:none; width:20px;">
                    <h5 style="font-weight: 600; font-size:12px;">:</h5>
                </td>
                <td style="text-align:left; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;">-</h5>
                </td>
            </tr>
        </table>

<br>
<br>
        <table style="width: 700px;">
            <tr>
                <td style="width: 100px; padding:3px;">
                    <h5 style="font-weight: 600; font-size:12px;">CONTAINER</h5>
                </td>
                <td style="width: 100px; padding:3px;">
                    <h5 style="font-weight: 600; font-size:12px;">HS CODE</h5>
                </td>
                <td style="width: 450px; padding:3px;">
                    <h5 style="font-weight: 600; font-size:12px;">DESCRIPTION OF GOODS</h5>
                </td>
                <td style="width: 100px; padding:3px;">
                    <h5 style="font-weight: 600; font-size:12px;">PACKING</h5>
                </td>
                <td style="width: 100px; padding:3px;">
                    <h5 style="font-weight: 600; font-size:12px;">QTY ( CTNS )</h5>
                </td>
                <td style="width: 100px; padding:3px;">
                    <h5 style="font-weight: 600; font-size:12px;">UNIT PRICE</h5>
                </td>
                <td style="width: 100px; padding:3px;">
                    <h5 style="font-weight: 600; font-size:12px;">TOTAL PRICE</h5>
                </td>
            </tr>
        </table>
        <table style="width: 700px;">
            <tr>
                <td style="width: 100px; padding:1px;">
                    <h5 style="font-weight: 600; font-size:12px;">-</h5>
                </td>
                <td style="width: 100px; padding:1px;">
                    <h5 style="font-weight: 600; font-size:12px;">-</h5>
                </td>
                <td style="width: 450px; padding:3px; text-align:left;">
                    <h5 style="font-weight: 600; font-size:12px;">-</h5>
                </td>
                <td style="width: 100px; padding:3px;">
                    <h5 style="font-weight: 600; font-size:12px;">-</h5>
                </td>
                <td style="width: 100px; padding:1px;">
                    <h5 style="font-weight: 600; font-size:12px;">QTY ( CTNS )</h5>
                </td>
                <td style="width: 100px; padding:1px;">
                    <h5 style="font-weight: 600; font-size:12px;">UNIT PRICE</h5>
                </td>
                <td style="width: 100px; padding:1px;">
                    <h5 style="font-weight: 600; font-size:12px;">TOTAL PRICE</h5>
                </td>
            </tr>
        </table>
        <table style="width: 700px;">
            <tr>
                <td style="width: 100px; padding:1px;">
                    <h5 style="font-weight: 600; font-size:12px;">CONTAINER</h5>
                </td>
                <td style="width: 100px; padding:1px;">
                    <h5 style="font-weight: 600; font-size:12px;">HS CODE</h5>
                </td>
                <td style="width: 450px; padding:3px; text-align:left;">
                    <h5 style="font-weight: 600; font-size:12px;">CAFFINO MOCHA COFFEE LATTE POUCH CAFFINO MOCHA COFFEE LATTE POUCH  CAFFINO MOCHA COFFEE LATTE POUCH  </h5>
                </td>
                <td style="width: 100px; padding:3px;">
                    <h5 style="font-weight: 600; font-size:12px;">-</h5>
                </td>
                <td style="width: 100px; padding:1px;">
                    <h5 style="font-weight: 600; font-size:12px;">QTY ( CTNS )</h5>
                </td>
                <td style="width: 100px; padding:1px;">
                    <h5 style="font-weight: 600; font-size:12px;">UNIT PRICE</h5>
                </td>
                <td style="width: 100px; padding:1px;">
                    <h5 style="font-weight: 600; font-size:12px;">TOTAL PRICE</h5>
                </td>
            </tr>
        </table>
        
        <!-- <table style="width: 100%; margin:-0.5mm;">
            <tr style="margin:0px;">
                <td style="border-bottom: none; width: 10%;">
                    <h5 style="font-weight: 600; font-size:12px;">-</h5>
                </td>
                <td style="border-bottom: none; width: 10%;">
                    <h5 style="font-weight: 600; font-size:12px;">-</h5>
                </td>
                <td style="border-bottom: none; width: 10%;">
                    <h5 style="font-weight: 600; font-size:12px;">DESCRIPTION OF GOODS</h5>
                </td>
                <td style="border-bottom: none; width: 10%;">
                    <h5 style="font-weight: 600; font-size:12px;">-</h5>
                </td>
                <td style="border-bottom: none; width: 10%;">
                    <h5 style="font-weight: 600; font-size:12px;">-</h5>
                </td>
                <td style="border-bottom: none; width: 10%;">
                    <h5 style="font-weight: 600; font-size:12px;">-</h5>
                </td>
                <td style="border-bottom: none; width: 10%;">
                    <h5 style="font-weight: 600; font-size:12px;">-</h5>
                </td>
            </tr>
        </table> -->
        <table style="width: 700px;">
            <tr>
                <td style="width: 750px; text-align:left; padding:3px;">
                    <h5 style="font-weight: 600; font-size:12px;">GRAND TOTAL FOB</h5>
                </td>
                <td style="width: 100px;">
                    <h5 style="font-weight: 600; font-size:12px;">QTY</h5>
                </td>
                <td style="width: 100px;">
                    <h5 style="font-weight: 600; font-size:12px;"></h5>
                </td>
                <td style="width: 100px; text-align:right;">
                    <h5 style="font-weight: 600; font-size:12px;">$ <span style="text-align: right;">7.632</span></h5>
                </td>
            </tr>
        </table>

        <hr>
       
        <table style="width: 500px;">
            <tr>
                <td style="width: 50px; text-align:left; border-style:none; padding:3px;">
                    <h5 style="font-weight: bold; font-size:12px;">PURCHASE GOODS</h5>
                </td>
                <td style="width: 10px; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;"></h5>
                </td>
                <td style="width: 100px; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;"></h5>
                </td>
                <td style="width: 100px; text-align:right; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;"></h5>
                </td>
            </tr>
        </table>

        <table>
            <tr>
                <td style="width: 210px; text-align:left; border-style:none; padding:3px;">
                    <h5 style="font-weight: 600; font-size:12px;">NUMBER OF CASE</h5>
                </td>
                <td style="width: 10px; text-align:left; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;">:</h5>
                </td>
                <td style="width: 0px; text-align:left; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;">Cartons</h5>
                </td>
                <td style="width: 100px; text-align:left; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;"></h5>
                </td>
            </tr>
        </table>

        <table>
            <tr>
                <td style="width: 210px; text-align:left; border-style:none; padding:3px;">
                    <h5 style="font-weight: 600; font-size:12px;">AMOUNT</h5>
                </td>
                <td style="width: 10px; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;">:</h5>
                </td>
                <td style="width: 0px; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;"> USD</h5>
                </td>
                <td style="width: 100px; text-align:right; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;"></h5>
                </td>
            </tr>
        </table>

        <br>

        <table>
            <tr>
                <td style="width: 210px; text-align:left; border-style:none; padding:3px;">
                    <h5 style="font-weight: bold; font-size:12px;">FREE GOODS</h5>
                </td>
                <td style="width: 10px; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;"></h5>
                </td>
                <td style="width: 100px; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;"></h5>
                </td>
                <td style="width: 100px; text-align:right; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;"></h5>
                </td>
            </tr>
        </table>

        <table>
            <tr>
                <td style="width: 210px; text-align:left; border-style:none; padding:3px;">
                    <h5 style="font-weight: 600; font-size:12px;">NUMBER OF CASE</h5>
                </td>
                <td style="width: 10px; text-align:left; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;">:</h5>
                </td>
                <td style="width: 0px; text-align:left; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;">Cartons</h5>
                </td>
                <td style="width: 100px; text-align:left; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;"></h5>
                </td>
            </tr>
        </table>

        <table>
            <tr>
                <td style="width: 210px; text-align:left; border-style:none; padding:3px;">
                    <h5 style="font-weight: 600; font-size:12px;">AMOUNT</h5>
                </td>
                <td style="width: 10px; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;">:</h5>
                </td>
                <td style="width: 0px; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;"> USD</h5>
                </td>
                <td style="width: 100px; text-align:right; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;"></h5>
                </td>
            </tr>
        </table>

        <br>

        <table>
            <tr>
                <td style="width: 210px; text-align:left; border-style:none; padding:3px;">
                    <h5 style="font-weight: bold; font-size:12px;">GRAND TOTAL</h5>
                </td>
                <td style="width: 10px; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;"></h5>
                </td>
                <td style="width: 100px; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;"></h5>
                </td>
                <td style="width: 100px; text-align:right; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;"></h5>
                </td>
            </tr>
        </table>

        <table>
            <tr>
                <td style="width: 210px; text-align:left; border-style:none; padding:3px;">
                    <h5 style="font-weight: 600; font-size:12px;">NUMBER OF CASE</h5>
                </td>
                <td style="width: 10px; text-align:left; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;">:</h5>
                </td>
                <td style="width: 0px; text-align:left; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;">Cartons</h5>
                </td>
                <td style="width: 100px; text-align:left; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;"></h5>
                </td>
            </tr>
        </table>

        <table>
            <tr>
                <td style="width: 210px; text-align:left; border-style:none; padding:3px;">
                    <h5 style="font-weight: 600; font-size:12px;">AMOUNT</h5>
                </td>
                <td style="width: 10px; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;">:</h5>
                </td>
                <td style="width: 0px; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;"> USD</h5>
                </td>
                <td style="width: 100px; text-align:right; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;"></h5>
                </td>
            </tr>
        </table>

        <table>
            <tr>
                <td style="width: 210px; text-align:left; border-style:none; padding:3px;">
                    <h5 style="font-weight: 600; font-size:12px;">SAY</h5>
                </td>
                <td style="width: 10px; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;">:</h5>
                </td>
                <td style="width: 0px; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;">.....</h5>
                </td>
                <td style="width: 100px; text-align:right; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;"></h5>
                </td>
            </tr>
        </table>

        <br>

        <table style="margin-top: 100px;">
            <tr>
                <td style="width: 110px; text-align:left; border-style:none; padding:3px;">
                    <h5 style="font-weight: bold; font-size:12px;"></h5>
                </td>
                <td style="width: 10px; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;">KUDUS,.........</h5>
                </td>
                <td style="width: 100px; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;"></h5>
                </td>
                <td style="width: 100px; text-align:right; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;"></h5>
                </td>
            </tr>
        </table>

        <table style="margin-top: 100px;">
            <tr>
                <td style="width: 90px; text-align:left; border-style:none; padding:3px;">
                    <h5 style="font-weight: bold; font-size:12px;"></h5>
                </td>
                <td style="width: 200px; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;">User Create Invoice</h5>
                </td>
                <td style="width: 100px; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;"></h5>
                </td>
                <td style="width: 100px; text-align:right; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;"></h5>
                </td>
            </tr>
        </table>

        <table style="margin-top: 0px;">
            <tr>
                <td style="width: 160px; text-align:left; border-style:none; padding:3px;">
                    <h5 style="font-weight: bold; font-size:12px;"></h5>
                </td>
                <td style="width: 10px; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;">FINANCE</h5>
                </td>
                <td style="width: 100px; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;"></h5>
                </td>
                <td style="width: 100px; text-align:right; border-style:none;">
                    <h5 style="font-weight: 600; font-size:12px;"></h5>
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