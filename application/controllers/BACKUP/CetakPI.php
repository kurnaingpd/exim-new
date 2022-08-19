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
    $data['list_purchasegood']=$this->MBoardPI->GetList_PurchaseGood($Id_PI);
    $data['list_freegood']=$this->MBoardPI->GetList_FreeGood($Id_PI);

    $data['listdataPI_byId']=$this->MBoardPI->GetList_PI_ById($Id_PI);

    $data['checker_item_freegood']=$this->MBoardPI->GetList_PI_ById($Id_PI);

    $customer_id=$data['listdataPI_byId'][0]->gexp_pi_consignee_id;

    $listdatabank_cust=$this->MBoardPI->Get_BankCust_ById($customer_id);

    $getfoods=$this->MBoardPI->GetList_AllFoods_ByPI($Id_PI);

    $data['totalqty_perinv']=$this->MBoardPI->SumaryQty_ByPI($Id_PI);
    $data['totalprice_perinv']=$this->MBoardPI->SumaryPrice_ByPI($Id_PI);
    
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

    // $this->load->view('LivePrint/Proforma_Invoice',$data);

    require_once('assets/mpdf_v8.0.3-master/vendor/autoload.php'); // Arahkan ke file mpdf.php didalam folder mpdf
    $mpdf = new \Mpdf\Mpdf();
    $mpdf->AddPage("P","","","","","15","15","15","15","","","","","","","","","","","","A4");
    $html=$this->load->view('LivePrint/Proforma_Invoice',$data,true);
    $mpdf->WriteHTML($html);
    $mpdf->Output($nama_dokumen.".pdf" ,'I');
    exit;


}



}