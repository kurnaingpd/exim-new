<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CetakPI extends CI_Controller {

    function __construct(){
        parent:: __construct();
        
        if(!$this->session->userdata('logged_gexp_in')){
            redirect('LoginSys/doLogout');
        }
            $this->load->model('MRoot');
            $this->load->model('MLogin');
            $this->load->model('MUser');
            $this->load->model('MGroup');
            $this->load->model('MBoardPI');
    }

public function testload_data($Id_PI){
    $data['listdataPI_byId']=$this->MBoardPI->GetList_PI_ById($Id_PI);
    $customer_id=$data['listdataPI_byId'][0]->gexp_pi_customer;

    $listdatabank_cust=$this->MBoardPI->Get_BankCust_ById($customer_id);

    $getfoods=$this->MBoardPI->GetList_AllFoods_ByPI($Id_PI);
    print_r($getfoods);
    // print_r($listdatabank_cust);
}

public function printout_PI($Id_PI)
{
    $list_purchasegood=$this->MBoardPI->GetList_PurchaseGood($Id_PI);
    $list_freegood=$this->MBoardPI->GetList_FreeGood($Id_PI);

    $data['listdataPI_byId']=$this->MBoardPI->GetList_PI_ById($Id_PI);

    $customer_id=$data['listdataPI_byId'][0]->gexp_pi_consignee_id;

    $listdatabank_cust=$this->MBoardPI->Get_BankCust_ById($customer_id);

    $getfoods=$this->MBoardPI->GetList_AllFoods_ByPI($Id_PI);

    $totalqty_perinv=$this->MBoardPI->SumaryQty_ByPI($Id_PI);
    $totalprice_perinv=$this->MBoardPI->SumaryPrice_ByPI($Id_PI);
    
    $Consig=$data['listdataPI_byId'][0]->Consig;

    $ConsTown=$data['listdataPI_byId'][0]->Cons_Town;

    $NO_PI=$data['listdataPI_byId'][0]->gexp_pi_no;

    $PO=$data['listdataPI_byId'][0]->gexp_pi_po;

    $Consig_addr=$data['listdataPI_byId'][0]->Cons_addr;
    $Consig_phone=$data['listdataPI_byId'][0]->Cons_phone;

    $Destinat_port=$data['listdataPI_byId'][0]->DestinatPort;
    $TOPCust=$data['listdataPI_byId'][0]->TOPCust;

    $Bank_name=$data['listdataPI_byId'][0]->Bank_name;
    $Bank_acc=$data['listdataPI_byId'][0]->Bank_acc;
    $Bank_swiftcode=$data['listdataPI_byId'][0]->Bank_swiftcode;

    $Benefi=$data['listdataPI_byId'][0]->Benefi;
    $Bene_office=$data['listdataPI_byId'][0]->Bene_office;
    $Bene_addr=$data['listdataPI_byId'][0]->Bene_addr;
    $Bene_phone=$data['listdataPI_byId'][0]->Bene_phone;

    $negara=$data['listdataPI_byId'][0]->Negara;

    $ppic=$data['listdataPI_byId'][0]->PPIC;

    $loadport_name=$data['listdataPI_byId'][0]->Loadport_Name;

    $nama_dokumen='Proforma_Invoice'.$NO_PI; //Beri nama file PDF hasil.

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
    padding: 10px;
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
            <td style="border-style:none; text-align:center;">
                <h2 style="font-weight: bold; text-align:center;">PROFORMA INVOICE</h2>
            </td>
        </tr>
    </table>
<br>
<br>
    <table style="width: 100%">
        <tr>
            <td style="text-align:left; border-style:none; width:200px;">
                <h5 style="font-weight: 600; font-size:10px;">PI NO</h5>
            </td>
            <td style="text-align:left; border-style:none; width:20px;">
                <h5 style="font-weight: 600; font-size:10px;">:</h5>
            </td>
            <td style="text-align:left; border-style:none;">
                <h5 style="font-weight: 600; font-size:10px;"><?php echo $NO_PI ?></h5>
            </td>
        </tr>
    </table>

    <table style="width: 100%">
        <tr>
            <td style="text-align:left; border-style:none; width:200px;">
                <h5 style="font-weight: 600; font-size:10px;">PO NO</h5>
            </td>
            <td style="text-align:left; border-style:none; width:20px;">
                <h5 style="font-weight: 600; font-size:10px;">:</h5>
            </td>
            <td style="text-align:left; border-style:none;">
                <h5 style="font-weight: 600; font-size:10px;"><?php echo $PO ?></h5>
            </td>
        </tr>
    </table>
    <table style="width: 100%">
        <tr>
            <td style="text-align:left; border-style:none; width:200px;">
                <h5 style="font-weight: 600; font-size:10px;">CONSIGNEE</h5>
            </td>
            <td style="text-align:left; border-style:none; width:20px;">
                <h5 style="font-weight: 600; font-size:10px;">:</h5>
            </td>
            <td style="text-align:left; border-style:none; padding-top:20px;">
                <h5 style="font-weight: 600; font-size:10px;"><?php echo $Consig ?><br><?php echo $Consig_addr ?><br><?php echo $Consig_phone ?></h5>
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
            <td style="text-align:left; border-style:none; padding-top:20px;">
                <h5 style="font-weight: 600; font-size:10px;"> <?php echo $Benefi ?><br> <?php echo $Bene_addr ?><br> <?php echo $Bene_phone ?><br>  </h5>
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
                <h5 style="font-weight: 600; font-size:10px;"><?php echo $Destinat_port ?></h5>
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
                <h5 style="font-weight: 600; font-size:10px;"><?php echo $loadport_name  ?></h5>
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
      <th style="font-size:9px;" class="thc">UNIT PRICE ( FOB )</th>
      <th style="font-size:9px;" class="thc">TOTAL <br> United State Dollars</th>
    </tr>
    <tr>
      <td style="font-weight: bold" class="tdc">1 x Container .....</td>
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
      <td style="font-size:9px; width:10%;" class="tdc"><?php echo number_format("$gaa->gexp_good_price",0,",",".") ?></td>
      <td style="font-size:9px; width:10%;" class="tdc"><?php echo number_format("$gaa->gexp_good_totals",0,",",".") ?></td>
    </tr>
    <?php } 
                } ?>

<tr>
      <td style="font-weight: bold" class="tdc">Free Of Charge</td>
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
        <td style="font-size:9px; width:10%;" class="tdc"><?php echo number_format("$gaa->gexp_good_price",0,",",".") ?></td>
        <td style="font-size:9px; width:10%;" class="tdc"><?php echo number_format("$gaa->gexp_good_totals",0,",",".") ?></td>
    </tr>
    <?php } 
                } ?>


<tr>
      <th style="font-size:9px; text-align:left;" class="thc" colspan="2">GRAND TOTAL FOB <?php echo $loadport_name ?></th>
      <th style="font-size:9px;" class="thc"><?php echo $totalqty_perinv->QTY_Total_all;  ?></th>
      <th style="font-size:9px;" class="thc"></th>
      <th style="font-size:9px;" class="thc"><?php echo number_format($totalprice_perinv->Sum_Total_Price,0,",","."); ?></th>
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
                <h5 style="font-weight: 600; font-size:10px;">Please TT 100%, <?php echo $TOPCust ?> From BL Date</h5>
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
             <h5 style="font-weight: 600; font-size:10px;"><?php echo $Bank_name ?><br><b>Acc.No : </b><?php echo $Bank_acc ?><br> Swift Code : <?php echo $Bank_swiftcode ?> <br> </h5>
                <!-- <h5 style="font-weight: 600; font-size:10px;"><?php echo $listdatabank_cust->BankCustName ?><br><?php echo $listdatabank_cust->BankCustBranch ?><br><?php echo $listdatabank_cust->BankCustAddress ?> <br><b>Acc.No : </b><?php echo $listdatabank_cust->BankCustAccountNo ?>  <br>Swift Code : <?php echo $listdatabank_cust->BankCustSwiftCode ?> </h5> -->
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
                <h5 style="font-weight: 600; font-size:10px;"><?php echo $Benefi ?><br> <?php echo $Bene_office ?><br> <?php echo $Bene_addr ?><br> <?php echo $Bene_phone ?><br></h5>
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
                <h5 style="font-weight: 600; font-size:10px;"><?php echo $ConsTown ?>, <?php echo IndoDate ?></h5>
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
            <td style="width: 18%; border:none; text-align:justify;">
                <h5 style="font-weight: 600; font-size:10px;"><?php echo $ppic ?></h5>
            </td>
            <td style="width: 30%; border:none; text-align:left;">
                <h5 style="font-weight: 600; font-size:10px;"></h5>
            </td>  
            <td style="width: 8%; border:none; text-align:justify;">
                <h5 style="font-weight: 600; font-size:10px;"></h5>
            </td>
            <td style="width: 25%; border:none; text-align:justify;">
                <h5 style="font-weight: 600; font-size:10px;"><?php echo $Consig ?></h5>
            </td>
            <td style="width: 0%; border:none; text-align:left;">
                <h5 style="font-weight: 600; font-size:10px;"></h5>
            </td> 
        </tr>
    </table>
    <table style="width: 100%;">
        <tr>
            <td style="width: 8%; border:none; text-align:justify;">
                <h5 style="font-weight: 600; font-size:10px;"></h5>
            </td>
            <td style="width: 20%; border:none; text-align:justify;">
                <h5 style="font-weight: 600; font-size:10px;">Global Business Head</h5>
            </td>
            <td style="width: 30%; border:none; text-align:left;">
                <h5 style="font-weight: 600; font-size:10px;"></h5>
            </td>  
            <td style="width: 0%; border:none; text-align:justify;">
                <h5 style="font-weight: 600; font-size:10px;"></h5>
            </td>
            <td style="width: 25%; border:none; text-align:justify;">
                <h5 style="font-weight: 600; font-size:10px;"></h5>
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