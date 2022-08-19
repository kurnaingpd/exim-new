<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MenuProSpec extends CI_Controller {

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
    $this->load->model('MProdspec');

}

public function index()
{
    $UserId=$this->session->userdata('logged_gexp_in')->UsersId;
    $DataUsers=$this->MLogin->GetProfileSign($UserId);
    $GroupMenu=$DataUsers->UserGroup;
    $data['menusign']=$this->MLogin->GetMasterMenuSign($GroupMenu);
    $data['groupname']=$this->MLogin->GetGroupName($UserId);

    $data['lsmasterprospec']=$this->MProdspec->GetListProdSpec();
    $data['customer']=$this->MProdspec->customer();
    $data['country']=$this->MProdspec->country();
    // $data['lsmasterusers']=$this->MUser->getlistusers();
    // $data['grouplisting']=$this->MUser->getlistgroup();
    // $data['lsmasteruser'] =$this->MUser->getlistusers();

	$this->load->view('MasterProSpec/VList',$data);
}

public function search()
{
    $params = $this->input->post();
    $UserId=$this->session->userdata('logged_gexp_in')->UsersId;
    $DataUsers=$this->MLogin->GetProfileSign($UserId);
    $GroupMenu=$DataUsers->UserGroup;
    $data['menusign']=$this->MLogin->GetMasterMenuSign($GroupMenu);
    $data['groupname']=$this->MLogin->GetGroupName($UserId);

    $data['lsmasterprospec']=$this->MProdspec->GetSearchProdSpec($params);
    $data['customer']=$this->MProdspec->customer();
    $data['country']=$this->MProdspec->country();

    $this->load->view('MasterProSpec/VSearch',$data);
}

public function create_master_prodspec()
{
    $UserId=$this->session->userdata('logged_gexp_in')->UsersId;
    $DataUsers=$this->MLogin->GetProfileSign($UserId);
    $GroupMenu=$DataUsers->UserGroup;
    $data['menusign']=$this->MLogin->GetMasterMenuSign($GroupMenu);
    $data['groupname']=$this->MLogin->GetGroupName($UserId);

    $data['lsinvoice']=$this->MFin->getlistinvoice_prospec_select();

    $data['datenow']=Tanggal;

    // $data['datenow']=Tanggal;
    // $data['listdataPI']=$this->MApproval->GetList_PI();
    $data['m']=M;
    $data['y']=Y;
    $lastProdSpec=$this->MProdspec->GetLastprodspec_no();
    if(empty($lastProdSpec)){
        $data['noticket']="0001";
    }else{

        $LastNoPI=$lastProdSpec->gexp_spec_no;
        if(!empty($LastNoPI)){
            $nourut = (int) substr($LastNoPI, 3, 1);
            $nourut++;
            $prodspec=sprintf("%04s",$nourut);
            $data['noticket']=$prodspec;
        }else{
            $nourut = (int) substr($LastNoPI, 3, 1);
            $nourut++;
            $prodspec=sprintf("%04s",$nourut);
            $data['noticket']=$prodspec;
        }
        // $TicketPrint= $text."/".$today."/". sprintf("%03s",$looptic);
    }

    $this->load->view('MasterProSpec/CreateNew',$data);
}


function save_master_prodspec()
{
    $UserId=$this->session->userdata('logged_gexp_in')->UsersId;
    $gexp_spec_no=$this->input->post('prdspec_no');
    $gexp_spec_date=$this->input->post('prdspec_date');
    $gexp_spec_invid=$this->input->post('inv_no');
    $gexp_spec_po_no=$this->input->post('po_no');

    $data=array(
        'gexp_spec_no'=>$gexp_spec_no,
        'gexp_spec_date'=>$gexp_spec_date,
        'gexp_spec_invoice_id'=>$gexp_spec_invid,
        'gexp_spec_po_no'=>$gexp_spec_po_no,
        'gexp_spec_createdAt'=>NOW,
        'gexp_spec_createdBy'=>$UserId,
    );

    $insert=$this->MProdspec->tambah_master_prodspec($data);

    redirect('MenuProSpec');

}

function viewlist_prodspec_detail($gexp_spec_id)
{
    $data['detailsprodspec']=$this->MProdspec->getrowspec_id($gexp_spec_id);
    // print_r($data);
    $UserId=$this->session->userdata('logged_gexp_in')->UsersId;
    $DataUsers=$this->MLogin->GetProfileSign($UserId);
    $GroupMenu=$DataUsers->UserGroup;
    $data['menusign']=$this->MLogin->GetMasterMenuSign($GroupMenu);
    $data['groupname']=$this->MLogin->GetGroupName($UserId);

    $data['lsproduct_byinv']=$this->MProdspec->getlistitem_byinv($gexp_spec_id);

    $data['ls_detail_prodspec']=$this->MProdspec->getlist_details_prodspec($gexp_spec_id);

    $this->load->view('MasterProSpec/DetailsProspec',$data);
}

public function Save_details_prodspec()
{
    $UserId=$this->session->userdata('logged_gexp_in')->UsersId;
    $headspec_id=$this->input->post('headspec_id');
    $invoice_id=$this->input->post('invoice_id');
    $productname=$this->input->post('productname');
    $description=$this->input->post('descr');
    $forms=$this->input->post('forms');
    $texture=$this->input->post('texture');
    $colour=$this->input->post('colour');
    $taste=$this->input->post('taste');
    $odour=$this->input->post('odour');
    $fat=$this->input->post('fat');
    $moisture=$this->input->post('moisture');
    $caffein=$this->input->post('caffein');
    $platecount=$this->input->post('platecount');
    $moldyeast=$this->input->post('moldyeast');
    $coliform=$this->input->post('coliform');
    $salmonela=$this->input->post('salmonela');
    $lead=$this->input->post('lead');
    $arsen=$this->input->post('arsen');
    $mercur=$this->input->post('mercur');
    $tin=$this->input->post('tin');
    $cadm=$this->input->post('cadm');
    $ingd=$this->input->post('ingd');
    $psl=$this->input->post('psl');
    $pm=$this->input->post('pm');
    $scr=$this->input->post('scr');
    $fofm=$this->input->post('fofm');
    $usage=$this->input->post('usage');
    $soa=$this->input->post('soa');
    $coo=$this->input->post('coo');
    // $summernote1=$this->input->post('summer1');

    // echo $summernote1;

    $data=array(
        'gexp_specdet_head'=>$headspec_id,
        'gexp_specdet_invoice'=>$invoice_id,
        'gexp_specdet_item'=>$productname,
        'gexp_specdet_desc'=>$description,
        'gexp_specdet_physical_form'=>$forms,
        'gexp_specdet_physical_texture'=>$texture,
        'gexp_specdet_physical_colour'=>$colour,
        'gexp_specdet_physical_taste'=>$taste,
        'gexp_specdet_physical_odour'=>$odour,
        'gexp_specdet_chemical_fat'=>$fat,
        'gexp_specdet_chemical_moisture'=>$moisture,
        'gexp_specdet_chemical_caffeine'=>$caffein,
        'gexp_specdet_micro_platecount'=>$platecount,
        'gexp_specdet_micro_mouldyeast'=>$moldyeast,
        'gexp_specdet_micro_coliform'=>$coliform,
        'gexp_specdet_micro_salmonella'=>$salmonela,
        'gexp_specdet_heamet_lead'=>$lead,
        'gexp_specdet_heamet_arsenic'=>$arsen,
        'gexp_specdet_heamet_mercury'=>$mercur,
        'gexp_specdet_heamet_tin'=>$tin,
        'gexp_specdet_heamet_cadmium'=>$cadm,
        'gexp_specdet_inregdient'=>$ingd,
        'gexp_specdet_prodshelife'=>$psl,
        'gexp_specdet_packmate'=>$pm,
        'gexp_specdet_storeconreq'=>$scr,
        'gexp_specdet_fun_foodmaterial'=>$fofm,
        'gexp_specdet_usage'=>$usage,
        'gexp_specdet_allergen'=>$soa,
        'gexp_specdet_countorigin'=>$coo,
        'gexp_specdet_createdat'=>NOW,
        'gexp_specdet_createdby'=>$UserId,
    );

    $this->MProdspec->tambah_prodspec_details($data);

    redirect('MenuProSpec/viewlist_prodspec_detail/'.$headspec_id);

}

public function print_prodspec_detail($gexp_specdet_id)
{
    // echo $gexp_specdet_id;

    $data['getrowsdetail_specdet_byid']=$this->MProdspec->getrowsdetails_prodspec($gexp_specdet_id);

    require_once('assets/mpdf_v8.0.3-master/vendor/autoload.php'); // Arahkan ke file mpdf.php didalam folder mpdf
    // $mpdf=new Mpdf('utf-8', 'A4', 10.5, 'arial'); // Membuat file mpdf baru
    $mpdf = new \Mpdf\Mpdf();
    $mpdf->AddPage("P","","","","","15","15","15","15","","","","","","","","","","","","A4");
    $html=$this->load->view('LivePrint/spec_print',$data,true);
    $mpdf->WriteHTML($html);
    $mpdf->Output();
}





}