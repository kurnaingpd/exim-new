<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterQc extends CI_Controller {

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
    $this->load->model('MQc');

}

public function index(){

    $UserId=$this->session->userdata('logged_gexp_in')->UsersId;
    $DataUsers=$this->MLogin->GetProfileSign($UserId);
    $GroupMenu=$DataUsers->UserGroup;
    $data['menusign']=$this->MLogin->GetMasterMenuSign($GroupMenu);
    $data['groupname']=$this->MLogin->GetGroupName($UserId);
    
    $data['lsmasterqc']=$this->MQc->GetList_Qc();
    // $data['grouplisting']=$this->MUser->getlistgroup();
    // $data['lsmasteruser'] =$this->MUser->getlistusers();

	$this->load->view('MasterQc/VList',$data);

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
    $data['listdataPI']=$this->MApproval->GetList_PI();
    $data['listDataItem']=$this->MQc->GetListItem_Qc();
    $data['m']=M;
    $data['y']=Y;
    $lastPI=$this->MQc->GetLastQc_No();
    // $LastNoPI=$lastPI->gexp_pi_no;
    if($lastPI==null){

        // echo "T";
        $data['noticket']="0001";

    }else{

        $LastNoPI=$lastPI->gexp_qc_no;
        $nourut = (int) substr($LastNoPI, 3, 1);
        $nourut++;
        $pi=sprintf("%04s",$nourut);
        $data['noticket']=$pi;
        // $TicketPrint= $text."/".$today."/". sprintf("%03s",$looptic);
    }

    // print_r($lastPI);
    $this->load->view('MasterQc/CreateNew',$data);
}


public function InsertCreateNew()
{


    $UserId=$this->session->userdata('logged_gexp_in')->UsersId;
    $qc_number=$this->input->post('qc_number');
    $qc_date=$this->input->post('qc_date');
    $qc_item_id=$this->input->post('qc_item_id');
    $qc_prd_date=$this->input->post('prd_date');
    $qc_exp_date=$this->input->post('exp_date');
    $qc_aroma=$this->input->post('aroma');
    $qc_taste=$this->input->post('taste');
    $qc_value=$this->input->post('value');
    $qc_moisture=$this->input->post('moisture');
    $qc_ph=$this->input->post('ph');
    $qc_brix=$this->input->post('brix');
    $qc_finish_godcek=$this->input->post('finish_godcek');
    $qc_analisis_start=$this->input->post('analisis_start');
    $qc_analisis_end=$this->input->post('analisis_end');
    $qc_plate_count=$this->input->post('plate_count');
    $qc_yeasmold=$this->input->post('yeasmold');
    $qc_salmonella=$this->input->post('salmonella');
    $qc_enterobacteria=$this->input->post('enterobacteria');
    $qc_status_text=$this->input->post('status_text');
    $qc_release_qcdate=$this->input->post('release_qcdate');

    // $ctx1=$this->input->post('ctx1');
    // $ctx2=$this->input->post('ctx2');
    // $ctx3=$this->input->post('ctx3');

    // $brx1=$this->input->post('brx1');
    // $brx2=$this->input->post('brx2');
    // $brx3=$this->input->post('brx3');

    
    $data=array(
      'gexp_qc_no'=>$qc_number,
      'gexp_qc_date'=>$qc_date,
      'gexp_qc_item_id'=>$qc_item_id,
      'gexp_qc_production_date'=>$qc_prd_date,
      'gexp_qc_expired_date'=>$qc_exp_date,
      'gexp_qc_aroma'=>$qc_aroma,
      'gexp_qc_taste'=>$qc_taste,
      'gexp_qc_value'=>$qc_value,
      'gexp_qc_moisture'=>$qc_moisture,
      'gexp_qc_ph'=>$qc_ph,
      'gexp_qc_brix'=>$qc_brix,
      'gexp_qc_finish_goodcheck'=>$qc_finish_godcek,
      'gexp_qc_start_analysis'=>$qc_analisis_start,
      'gexp_qc_end_analysis'=>$qc_analisis_end,
      'gexp_qc_total_plate_count'=>$qc_plate_count,
      'gexp_qc_yeast_mold'=>$qc_yeasmold,
      'gexp_qc_salmonella'=>$qc_salmonella,
      'gexp_qc_enterobacteria'=>$qc_enterobacteria,
      'gexp_qc_status'=>$qc_status_text,
      'gexp_qc_release_date'=>$qc_release_qcdate,
      'gexp_qc_statrows'=>'1',
      'gexp_qc_createdAt'=>NOW,
      'gexp_qc_createdBy'=>$UserId,
    );

    $insert=$this->MQc->tambah_qc($data);

    redirect('MasterQc');

}


public function PreviewDetail_Qc($gexp_qc_id)
{

    $UserId=$this->session->userdata('logged_gexp_in')->UsersId;
    $DataUsers=$this->MLogin->GetProfileSign($UserId);
    $GroupMenu=$DataUsers->UserGroup;
    $data['menusign']=$this->MLogin->GetMasterMenuSign($GroupMenu);
    $data['groupname']=$this->MLogin->GetGroupName($UserId);
    
    $data['lsmasterqc']=$this->MQc->GetList_Qc();
    $data['details_qc']=$this->MQc->GetList_DetailQc($gexp_qc_id);

    $this->load->view('MasterQc/VDetails',$data);

}

public function edit_master_qc($gexp_qc_id)
{
    $UserId=$this->session->userdata('logged_gexp_in')->UsersId;
    $DataUsers=$this->MLogin->GetProfileSign($UserId);
    $GroupMenu=$DataUsers->UserGroup;
    $data['menusign']=$this->MLogin->GetMasterMenuSign($GroupMenu);
    $data['groupname']=$this->MLogin->GetGroupName($UserId);
    
    $data['lsmasterqc']=$this->MQc->GetList_Qc();
    $data['details_qc']=$this->MQc->GetList_DetailQc($gexp_qc_id);
    // print_r($data['details_qc']);

    $this->load->view('MasterQc/VEdit',$data);
}

public function save_edit_qc()
{
    $UserId=$this->session->userdata('logged_gexp_in')->UsersId;
    $qc_id=$this->input->post('qc_id');
    // $qc_number=$this->input->post('qc_number');
    // $qc_date=$this->input->post('qc_date');
    // $qc_item_id=$this->input->post('qc_item_id');
    $qc_prd_date=$this->input->post('prd_date');
    $qc_exp_date=$this->input->post('exp_date');
    $qc_aroma=$this->input->post('aroma');
    $qc_taste=$this->input->post('taste');
    $qc_value=$this->input->post('value');
    $qc_moisture=$this->input->post('moisture');
    $qc_ph=$this->input->post('ph');
    $qc_brix=$this->input->post('brix');
    $qc_finish_godcek=$this->input->post('finish_godcek');
    $qc_analisis_start=$this->input->post('analisis_start');
    $qc_analisis_end=$this->input->post('analisis_end');
    $qc_plate_count=$this->input->post('plate_count');
    $qc_yeasmold=$this->input->post('yeasmold');
    $qc_salmonella=$this->input->post('salmonella');
    $qc_enterobacteria=$this->input->post('enterobacteria');
    $qc_status_text=$this->input->post('status_text');
    $qc_release_qcdate=$this->input->post('release_qcdate');

    $data=array(
        // 'gexp_qc_no'=>$qc_number,
        // 'gexp_qc_date'=>$qc_date,
        // 'gexp_qc_item_id'=>$qc_item_id,
        'gexp_qc_production_date'=>$qc_prd_date,
        'gexp_qc_expired_date'=>$qc_exp_date,
        'gexp_qc_aroma'=>$qc_aroma,
        'gexp_qc_taste'=>$qc_taste,
        'gexp_qc_value'=>$qc_value,
        'gexp_qc_moisture'=>$qc_moisture,
        'gexp_qc_ph'=>$qc_ph,
        'gexp_qc_brix'=>$qc_brix,
        'gexp_qc_finish_goodcheck'=>$qc_finish_godcek,
        'gexp_qc_start_analysis'=>$qc_analisis_start,
        'gexp_qc_end_analysis'=>$qc_analisis_end,
        'gexp_qc_total_plate_count'=>$qc_plate_count,
        'gexp_qc_yeast_mold'=>$qc_yeasmold,
        'gexp_qc_salmonella'=>$qc_salmonella,
        'gexp_qc_enterobacteria'=>$qc_enterobacteria,
        'gexp_qc_status'=>$qc_status_text,
        'gexp_qc_release_date'=>$qc_release_qcdate,
        'gexp_qc_statrows'=>'1',
        'gexp_qc_updatedAt'=>NOW,
        'gexp_qc_updatedBy'=>$UserId,
      );

    $this->MQc->update_qc_byid($data,$qc_id);
    redirect('MasterQc');
}


public function Searchdata()
{
    $UserId=$this->session->userdata('logged_gexp_in')->UsersId;
    $DataUsers=$this->MLogin->GetProfileSign($UserId);
    $GroupMenu=$DataUsers->UserGroup;
    $data['menusign']=$this->MLogin->GetMasterMenuSign($GroupMenu);
    $data['groupname']=$this->MLogin->GetGroupName($UserId);

    $produk=$this->input->post('produk');
    $prd_date=$this->input->post('prd_date');
    $exp_date=$this->input->post('exp_date');

    $data['ls_search_data']=$this->MQc->searchdata_byreq($produk,$prd_date,$exp_date);


    $this->load->view('MasterQc/SearchResult',$data);
}

public function TambahFileLamp($QcId)
{
    $UserId=$this->session->userdata('logged_gexp_in')->UsersId;
    $DataUsers=$this->MLogin->GetProfileSign($UserId);
    $GroupMenu=$DataUsers->UserGroup;
    $data['menusign']=$this->MLogin->GetMasterMenuSign($GroupMenu);
    $data['groupname']=$this->MLogin->GetGroupName($UserId);

    $produk=$this->input->post('produk');
    $prd_date=$this->input->post('prd_date');
    $exp_date=$this->input->post('exp_date');
    $data['details_qc']=$this->MQc->GetList_DetailQc($QcId);

    $data['lsfile_lamp']=$this->MQc->GetList_Lamp($QcId);

    $data['ls_search_data']=$this->MQc->searchdata_byreq($produk,$prd_date,$exp_date);


    $this->load->view('MasterQc/AddFileLamp',$data);
}


public function submitfile_lamp()
{
    $UserId=$this->session->userdata('logged_gexp_in')->UsersId;
    $qcid=$this->input->post('qcid');
    $ctx=$this->input->post('ctx');
	$berkas=$this->input->post('berkas');

	$config['upload_path']          = './assets/QClampiran/';
    $config['allowed_types']        = 'pdf';
    // $config['allowed_types']        = 'gif|jpg|png|pdf';
    $config['max_size']             = 2000;
 
    $this->load->library('upload', $config);
    
    if($this->upload->do_upload('berkas')) {

        $fileData = $this->upload->data();

        if($fileData){

			echo "T";

			$data=array(
				'qc_master_id'=>$qcid,
				'qc_textct'=>$ctx,
				'qc_pathname'=>$fileData['file_name'],
				'createdAt'=>NOW,
				'createdBy'=>$UserId,
			);
            $this->MQc->tambah_qc_file($data);
            redirect('MasterQc/TambahFileLamp/'.$qcid);

			// redirect('MenuDocPI/reloadsignpi/'.$signpi_id);
        
        }else{
        
            echo "F";
        
		}
		
	}else{

        echo "fail";
        // $this->session->set_flashdata('error', $this->upload->display_errors());
        // redirect('Upload_File');
   }

}

public function DownloadFile_Lamp($Qc_File_Id)
{
	$this->load->helper('download');
	$data['getrows_value']=$this->MQc->GetRowList_Lamp($Qc_File_Id);
	$file01=$data['getrows_value']->qc_pathname;
	force_download('./assets/QClampiran/'.$file01, NULL);
}



}