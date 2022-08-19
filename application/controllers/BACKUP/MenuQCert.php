<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MenuQcert extends CI_Controller {

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
    $this->load->model('MQc');
    $this->load->model('MCoa');

}

public function index(){

    $UserId=$this->session->userdata('logged_gexp_in')->UsersId;
    $DataUsers=$this->MLogin->GetProfileSign($UserId);
    $GroupMenu=$DataUsers->UserGroup;
    $data['menusign']=$this->MLogin->GetMasterMenuSign($GroupMenu);
    $data['groupname']=$this->MLogin->GetGroupName($UserId);
    $data['lsmastercoa']=$this->MCoa->getlistmstcoa();
    $data['customer'] = $this->MQc->customer();
    $data['country'] = $this->MQc->country();
    $data['lsmaster_qcert']=$this->MQc->GetList_Qcert();
    // $data['lsmasterusers']=$this->MUser->getlistusers();
    // $data['grouplisting']=$this->MUser->getlistgroup();
    // $data['lsmasteruser'] =$this->MUser->getlistusers();

	$this->load->view('MasterQCert/VSearch',$data);

}

public function search()
{
    $params = $this->input->post();
    $UserId=$this->session->userdata('logged_gexp_in')->UsersId;
    $DataUsers=$this->MLogin->GetProfileSign($UserId);
    $GroupMenu=$DataUsers->UserGroup;
    $data['menusign']=$this->MLogin->GetMasterMenuSign($GroupMenu);
    $data['groupname']=$this->MLogin->GetGroupName($UserId);
    $data['lsmastercoa']=$this->MCoa->getlistmstcoa();

    $data['customer'] = $this->MQc->customer();
    $data['country'] = $this->MQc->country();
    $data['lsmaster_qcert']=$this->MQc->search($params);

	$this->load->view('MasterQCert/VSearch',$data);
}

public function create_new_qcert()
{
    $UserId=$this->session->userdata('logged_gexp_in')->UsersId;
    $DataUsers=$this->MLogin->GetProfileSign($UserId);
    $GroupMenu=$DataUsers->UserGroup;
    $data['menusign']=$this->MLogin->GetMasterMenuSign($GroupMenu);
    $data['groupname']=$this->MLogin->GetGroupName($UserId);
    $data['lsmastercoa']=$this->MCoa->list_qa();
    $data['invoice']=$this->MQc->invoice();

    $data['datenow']=Tanggal;

    // $data['datenow']=Tanggal;
    // $data['listdataPI']=$this->MApproval->GetList_PI();
    $data['m']=M;
    $data['y']=Y;
    $lastProdSpec=$this->MQc->GetLast_qs_no();
    if($lastProdSpec==null){

        // echo "T";
        $data['noticket']="0001";

    }else{

        $LastNoPI=$lastProdSpec->gexp_qs_no;
        $nourut = (int) substr($LastNoPI, 3, 1);
        $nourut++;
        $prodspec=sprintf("%04s",$nourut);
        $data['noticket']=$prodspec;
        // $TicketPrint= $text."/".$today."/". sprintf("%03s",$looptic);
    }


    $this->load->view('MasterQCert/CreateNew',$data);
}

public function get_invoice_bycoaid(){

    $this->load->model('MQc');
    $array_data         = array();
    $coa_id     	    = $this->input->post("post_data");
    $query              = $this->MQc->getcoa_details($coa_id);

    // $dat['Invoice_No'] 	    = $data['gexp_invoice_no'];
    
    foreach($query as $a => $data):
        $dat['Coa_No'] 		        = $data['gexp_coa_no'];
        $dat['Invoice_Id'] 		    = $data['gexp_invoice_id'];
        $dat['Invoice_No'] 		    = $data['gexp_invoice_no'];
        array_push($array_data,$dat);
    endforeach;

    print_r(json_encode($array_data));
}


public function save_master_qs()
{
    $UserId=$this->session->userdata('logged_gexp_in')->UsersId;
    $qs_no=$this->input->post('qs_no');
    $coa_id=$this->input->post('input_coa_id');
    $invoice_id=$this->input->post('input_invoice');

    $data=array(
        'gexp_qs_no'=>$qs_no,
        'gexp_qs_coa_id'=>$coa_id,
        'gexp_qs_invoice_id'=>$invoice_id,
        'gexp_qs_date'=>Tanggal,
        'gexp_qs_month'=>M,
        'gexp_qs_years'=>Y,
        'gexp_qs_createdAt'=>NOW,
        'gexp_qs_createdBy'=>$UserId,
        'gexp_qs_statusrows'=>'1',
    );

    $insert=$this->MQc->tambah_qs($data);

    redirect('MenuQCert/');
}

public function qs_print_byrow($gexp_qs_id)
{
    $data['gexp_qs_rows']=$this->MQc->getrows_qcert($gexp_qs_id);

    $data['lsproducts']=$this->MQc->getlistitem_qs($gexp_qs_id);
    // echo $gexp_qs_id;
    require_once('assets/mpdf_v8.0.3-master/vendor/autoload.php'); // Arahkan ke file mpdf.php didalam folder mpdf
    // $mpdf=new Mpdf('utf-8', 'A4', 10.5, 'arial'); // Membuat file mpdf baru
    $mpdf = new \Mpdf\Mpdf();
    $mpdf->AddPage("P","","","","","15","15","15","15","","","","","","","","","","","","A4");
    $html=$this->load->view('LivePrint/qs_print',$data,true);
    $mpdf->WriteHTML($html);
    $mpdf->Output();
}



}