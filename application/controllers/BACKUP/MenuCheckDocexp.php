<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MenuCheckDocexp extends CI_Controller {

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
    $this->load->model('MApproval');
    $this->load->model('MExportRequire');
}

public function index(){

    $UserId=$this->session->userdata('logged_gexp_in')->UsersId;
   
    $DataUsers=$this->MLogin->GetProfileSign($UserId);
    $GroupMenu=$DataUsers->UserGroup;
    $data['menusign']=$this->MLogin->GetMasterMenuSign($GroupMenu);
    $data['groupname']=$this->MLogin->GetGroupName($UserId);
    
    $data['listdataPI']=$this->MExportRequire->GetList_PI();

	$this->load->view('MenuCheckDocexp/VList',$data);

}


public function upload_expreq($exp_id){

    $UserId=$this->session->userdata('logged_gexp_in')->UsersId;
   
    $DataUsers=$this->MLogin->GetProfileSign($UserId);
    $GroupMenu=$DataUsers->UserGroup;
    $data['menusign']=$this->MLogin->GetMasterMenuSign($GroupMenu);
    $data['groupname']=$this->MLogin->GetGroupName($UserId);
    
    $data['listdataPI']=$this->MExportRequire->GetList_PI();

    $data['expreq_rows']=$this->MExportRequire->Getexpreq_rows($exp_id);

    // print_r($data['expreq_rows']);

	$this->load->view('MenuCheckDocexp/VUpload',$data);

}

public function TestUploadreq(){

    $UserId=$this->session->userdata('logged_gexp_in')->UsersId;

    $remarkexp=$this->input->post('remarkexp');
   
    $DataUsers=$this->MLogin->GetProfileSign($UserId);
    $GroupMenu=$DataUsers->UserGroup;
    $data['menusign']=$this->MLogin->GetMasterMenuSign($GroupMenu);
    $data['groupname']=$this->MLogin->GetGroupName($UserId);

    $exp_id=$this->input->post('expreq_id');
    // $berkas_ran=rand().$berkas;

	$config['upload_path']          = './assets/doc_upload/Expreq/';
    $config['allowed_types']        = 'pdf';
    // $config['allowed_types']     = 'gif|jpg|png|pdf';
	$config['max_size']             = 2000;
	// $config['max_width']         = 1024;
	// $config['max_height']        = 768;
 
    $this->load->library('upload', $config);

    if($this->upload->do_upload('berkas')) {

        $fileData = $this->upload->data();

        if($fileData){

            $data=array(
                'gexp_expreq_docval'=>'1',
                'gexp_expreq_remark'=>$remarkexp,
                'gexp_expreq_uploadby'=>$UserId,
                'gexp_expreq_statusDoc'=>'3',
                'gexp_expreq_doc01'=>$fileData['file_name'],
                // 'gexp_expreq_doc01'=>$fileData['file_name']

            );

            $this->MExportRequire->update_expreq($data, $exp_id);

            if($this->upload->do_upload('berkas2')) {

                $fileData = $this->upload->data();

                // echo "T";
                $data=array(
                    'gexp_expreq_docval'=>'1',
                    'gexp_expreq_remark'=>$remarkexp,
                    'gexp_expreq_uploadby'=>$UserId,
                    'gexp_expreq_statusDoc'=>'3',
                    'gexp_expreq_doc02'=>$fileData['file_name'],
                    // 'gexp_expreq_doc01'=>$fileData['file_name']

                );

                $this->MExportRequire->update_expreq($data, $exp_id);
                redirect('MenuCheckDocexp');


            }else{

                redirect('MenuCheckDocexp');
                
            }

            // echo "T";
            // $data=array(
            //     'gexp_expreq_docval'=>'1',
            //     'gexp_expreq_remark'=>$remarkexp,
            //     'gexp_expreq_uploadby'=>$UserId,
            //     'gexp_expreq_statusDoc'=>'3',
            //     'gexp_expreq_doc01'=>$fileData['file_name'],
            //     // 'gexp_expreq_doc01'=>$fileData['file_name']

            // );

            // $this->MExportRequire->update_expreq($data, $exp_id);
            // redirect('MenuCheckDocexp');
        
        }else{
        
            // echo "F";
            redirect('MenuCheckDocexp');
        
        }

    }else{

            // echo "fail";
            redirect('MenuCheckDocexp');
           
    }
    

}

public function download_expreq($exp_id)
{

    $rowsexpreq_byid=$this->MExportRequire->Getexpreq_rows($exp_id);

    $namefile2=$rowsexpreq_byid->gexp_expreq_doc02;
    $namefile=$rowsexpreq_byid->gexp_expreq_doc01;

    if($namefile2==''){

        $namefile=$rowsexpreq_byid->gexp_expreq_doc01;

        $this->load->helper('download');


        $tempdir="./assets/doc_upload/Expreq/";
        $file_name=$namefile;
        $file_path = $tempdir.$file_name;
        
        force_download($file_path, NULL);
        // print_r($exp_id);

        redirect('MenuCheckDocexp');

    }else{

        $this->load->helper('download');

        $tempdir="./assets/doc_upload/Expreq/";
        $file_name=$namefile;
        $file_path = $tempdir.$file_name;
        
        force_download($file_path, NULL);

        redirect('MenuCheckDocexp/');

        // $this->load->helper('download');


        // $tempdir="./assets/doc_upload/Expreq/";
        // $file_name=$namefile2;
        // $file_path = $tempdir.$file_name;
        
        // force_download($file_path, NULL);
        // // print_r($exp_id);

        // redirect('MenuCheckDocexp');

    }


    // print_r($rowsexpreq_id);

}


public function download_expreq2($exp_id)
{
    $rowsexpreq_byid=$this->MExportRequire->Getexpreq_rows($exp_id);

    $namefile2=$rowsexpreq_byid->gexp_expreq_doc02;
    $this->load->helper('download');

        $tempdir="./assets/doc_upload/Expreq/";
        $file_name=$namefile2;
        $file_path = $tempdir.$file_name;
        
        force_download($file_path, NULL);

    redirect('MenuCheckDocexp');
}


public function SearchListView()
{

    $UserId=$this->session->userdata('logged_gexp_in')->UsersId;
   
    $DataUsers=$this->MLogin->GetProfileSign($UserId);
    $GroupMenu=$DataUsers->UserGroup;
    $data['menusign']=$this->MLogin->GetMasterMenuSign($GroupMenu);
    $data['groupname']=$this->MLogin->GetGroupName($UserId);

    $num_pi=$this->input->post('pi_number');
    $date_a=$this->input->post('date_a');
    $date_b=$this->input->post('date_b');
    $pi_cust=$this->input->post('pi_customer');
    $pi_country=$this->input->post('pi_country');

    $data['ls_filter_data']=$this->MExportRequire->getsearchdata($num_pi,$date_a,$date_b,$pi_cust,$pi_country);

    $this->load->view('MenuCheckDocexp/SearchResult',$data);

}


public function preview_pi($Id_PI)
{
    $UserId=$this->session->userdata('logged_gexp_in')->UsersId;
    $DataUsers=$this->MLogin->GetProfileSign($UserId);
    $data['groupname']=$this->MLogin->GetGroupName($UserId);
    $GroupMenu=$DataUsers->UserGroup;
    $data['menusign']=$this->MLogin->GetMasterMenuSign($GroupMenu);

    $data['getrowpi_byid']=$this->MBoardPI->GetList_PI_byId($Id_PI);
    $getrowpi_byid=$this->MBoardPI->GetRowList_PI_byId($Id_PI);
    $data['list_purchasegood']=$this->MBoardPI->GetList_PurchaseGood($Id_PI);
    $data['list_freegood']=$this->MBoardPI->GetList_FreeGood($Id_PI);
    $consig_id=$getrowpi_byid->gexp_pi_consignee_id;

    $data['free_on_board']=$this->MBoardPI->GetSumList_PurchaseGood($Id_PI);

    $data['coding_printing']=$this->MBoardPI->GetRowList_CodingPrint($consig_id);

    $this->load->view('MenuCheckDocexp/Preview_PI',$data);

}


}