<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterInvFin extends CI_Controller {

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
    $this->load->model('MFin');
    $this->load->model('MApproval');

}

public function index(){

    $UserId=$this->session->userdata('logged_gexp_in')->UsersId;
    $DataUsers=$this->MLogin->GetProfileSign($UserId);
    $GroupMenu=$DataUsers->UserGroup;
    $data['menusign']=$this->MLogin->GetMasterMenuSign($GroupMenu);
    $data['groupname']=$this->MLogin->GetGroupName($UserId);
    $data['lsinvoice']=$this->MFin->GetListInv_ByUsers($UserId);
    // $data['lsmasterusers']=$this->MUser->getlistusers();
    // $data['grouplisting']=$this->MUser->getlistgroup();
    // $data['lsmasteruser'] =$this->MUser->getlistusers();

	$this->load->view('MasterInvoiceFin/VList',$data);

}


public function CreateNew(){

    $UserId=$this->session->userdata('logged_gexp_in')->UsersId;

    $data['groupname']=$this->MLogin->GetGroupName($UserId);

    $DataUsers=$this->MLogin->GetProfileSign($UserId);
    $GroupMenu=$DataUsers->UserGroup;
    $data['menusign']=$this->MLogin->GetMasterMenuSign($GroupMenu);
    $data['listcustomer']=$this->MBoardPI->GetCustomerList();
    $data['loadingport']=$this->MBoardPI->GetList_LoadPort();
    $data['listcontainer']=$this->MBoardPI->GetList_Container();
    $data['listbank']=$this->MBoardPI->GetList_Bank();
    $data['datenow']=Tanggal;
    // $data['listdataPI']=$this->MApproval->GetList_PI();
    $data['listdataPI']=$this->MApproval->list_pi_invoice();
    $data['m']=M;
    $data['y']=Y;
    $lastPI=$this->MFin->GetLastInv_No();
    // $LastNoPI=$lastPI->gexp_pi_no;
    if($lastPI==null){

        // echo "T";
        $data['noticket']="0001";

    }else{

        $LastNoPI=$lastPI->gexp_invoice_no;
        $nourut = (int) substr($LastNoPI, 3, 1);
        $nourut++;
        $pi=sprintf("%04s",$nourut);
        $data['noticket']=$pi;
        // $TicketPrint= $text."/".$today."/". sprintf("%03s",$looptic);
    }

    // print_r($lastPI);
    $this->load->view('MasterInvoiceFin/CreateNew',$data);
}


public function InsertCreateNew()
{
    $UserId=$this->session->userdata('logged_gexp_in')->UsersId;
    $inv_number=$this->input->post('pi_number');
    $inv_date=$this->input->post('pi_date');
    $inv_po=$this->input->post('pi_po');
    $input_pi_id=$this->input->post('input_customer_id');

    $data=array(
      'gexp_invoice_no'=>$inv_number,
      'gexp_invoice_pi'=>$input_pi_id,
      'gexp_invoice_date'=>$inv_date,
      'gexp_invoice_ffrn'=>$inv_po,
      'gexp_invoice_statrows'=>'1',
      'gexp_invoice_createdAt'=>NOW,
      'gexp_invoice_createdBy'=>$UserId,
    );

    $insert=$this->MFin->tambah_invoice($data);

    $data2=array(
        'inv_print_no'=>$inv_number,
    );

    $insert=$this->MFin->tambah_format_print($data2);

    redirect('MasterInvFin');

}


public function invoice_print($invoice_id)
{

    $data['lsinvoice_byid']=$this->MFin->getlistinvoice_byid($invoice_id);

    $id_pi=$data['lsinvoice_byid']->gexp_invoice_pi;

    $data['lspurchase_goods']=$this->MFin->getitem_purchasegood_bynopi($id_pi);

    $data['lsfree_goods']=$this->MFin->getitem_freegood_bynopi($id_pi);

    $data['checkvalue_print']=$this->MFin->checkvalue_printout($invoice_id);

    $data['summary_purchasegood']=$this->MFin->summary_purchasegood($invoice_id);

    $data['summary_freegood']=$this->MFin->summary_freegood($invoice_id);

    $data['checker_currency']=$this->MFin->currency_invoice($invoice_id);

    // $this->load->helper('url');
    $this->load->helper('Currency');
    // $this->load->library('CurencyLang');
    // print_r($data['lspurchase_goods']);
    

    require_once('assets/mpdf_v8.0.3-master/vendor/autoload.php'); // Arahkan ke file mpdf.php didalam folder mpdf
    // $mpdf=new Mpdf('utf-8', 'A4', 10.5, 'arial'); // Membuat file mpdf baru
    $mpdf = new \Mpdf\Mpdf();
    $mpdf->AddPage("P","","","","","15","15","15","15","","","","","","","","","","","","A4");
    $html=$this->load->view('LivePrint/invoice_print',$data,true);
    $mpdf->WriteHTML($html);
    $mpdf->Output();


}


public function invoice_preview($invoice_id)
{

    $UserId=$this->session->userdata('logged_gexp_in')->UsersId;
    $DataUsers=$this->MLogin->GetProfileSign($UserId);
    $GroupMenu=$DataUsers->UserGroup;
    $data['menusign']=$this->MLogin->GetMasterMenuSign($GroupMenu);
    $data['groupname']=$this->MLogin->GetGroupName($UserId);
    $data['lsinvoice']=$this->MFin->GetListInv_ByUsers($UserId);

    $data['lsinvoice_byid']=$this->MFin->getlistinvoice_byid($invoice_id);

    $id_pi=$data['lsinvoice_byid']->gexp_invoice_pi;

    $data['lspurchase_goods']=$this->MFin->getitem_purchasegood_bynopi($id_pi);

    $data['lsfree_goods']=$this->MFin->getitem_freegood_bynopi($id_pi);

    $data['checkvalue_print']=$this->MFin->checkvalue_printout($invoice_id);

    $data['summary_purchasegood']=$this->MFin->summary_purchasegood($invoice_id);

    $data['summary_freegood']=$this->MFin->summary_freegood($invoice_id);

    $this->load->view('MasterInvoiceFin/Preview_invoice',$data);
}


public function SearchingList()
{

    $UserId=$this->session->userdata('logged_gexp_in')->UsersId;
    $DataUsers=$this->MLogin->GetProfileSign($UserId);
    $GroupMenu=$DataUsers->UserGroup;
    $data['menusign']=$this->MLogin->GetMasterMenuSign($GroupMenu);
    $data['groupname']=$this->MLogin->GetGroupName($UserId);

    $inv_no=$this->input->post('inv_no');
    $date_a=$this->input->post('date_a');
    $date_b=$this->input->post('date_b');
    $cust_name=$this->input->post('customer_name');
    $cust_country=$this->input->post('customer_country');

    $data['ls_filter_data']=$this->MFin->SearchByReq($inv_no,$date_a,$date_b,$cust_name,$cust_country);

    $this->load->view('MasterInvoiceFin/SearchResult',$data);

}



}