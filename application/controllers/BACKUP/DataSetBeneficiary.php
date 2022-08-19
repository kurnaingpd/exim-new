<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataSetBeneficiary extends CI_Controller {

function __construct(){
    parent:: __construct();
    
if(!$this->session->userdata('logged_gexp_in')){
    redirect('LoginSys/doLogout');
}
    $this->load->model('MRoot');
    $this->load->model('MLogin');
    $this->load->model('MMenu');
    $this->load->model('MSetCountry');
    $this->load->model('MSetBank');
    $this->load->model('MSetBeneficiary');
}

public function index(){

    $UserId                         =$this->session->userdata('logged_gexp_in')->UsersId;
    $DataUsers                      =$this->MLogin->GetProfileSign($UserId);
    $GroupMenu                      =$DataUsers->UserGroup;
    $data['menusign']               =$this->MLogin->GetMasterMenuSign($GroupMenu);
    $data['lsmastermenus']          =$this->MMenu->GetListMasterMenu();
    $data['lsmasterBeneficiary']    =$this->MSetBeneficiary->GetListMasterBeneficiary();
    $data['lsmastercountry']        =$this->MSetCountry->GetListMasterCountry();

	$this->load->view('DataSetBeneficiary/VList',$data);

}

public function createnewbeneficiary(){

    $BenDesc               =$this->input->post('beneficiarydesc');
    $BenOffice             =$this->input->post('beneficiary_office');
    $BenAddr               =$this->input->post('beneficiary_addr');
    $BenCountry            =$this->input->post('beneficiary_country');
    $BenContact            =$this->input->post('beneficiary_contact');
    $BenPhone              =$this->input->post('beneficiary_phone');

    $CheckBenDesc          =$this->MSetBeneficiary->CheckBeneficiary($BenDesc);

if($CheckBenDesc==TRUE){

        // echo "Maaf Data Sudah Tersedia";
        echo "<script>alert('Maaf Data Sudah Tersedia')</script>";

}else{

    $data=array(
            'BeneficiaryDesc'          => strtoupper($BenDesc),
            'BeneficiaryOffice'        => strtoupper($BenOffice),
            'BeneficiaryAddr'          => strtoupper($BenAddr),
            'BeneficiaryCountry'       => $BenCountry,
            'BeneficiaryCP'            => strtoupper($BenContact),
            'BeneficiaryPhone'         => $BenPhone,
            'BeneficiaryStats'         => "1",
            'CreatedAt'         => NOW,
            'CreatedBy'         => $this->session->userdata('logged_gexp_in')->UsersId,
    );

    $insert     =$this->MSetBeneficiary->tambah_beneficiary($data);

    if($insert){
                // echo "TRUE";
                $this->session->set_flashdata('success','Data Berhasil Di Proses');
                            redirect('DataSetBeneficiary');
    }else{
                // echo "FALSE";
                $this->session->set_flashdata('warns','Mohon Maaf Data Tidak Dapat Di Proses, Koneksi Error');
                            redirect('DataSetBeneficiary');
    }


}


}


public function edit_master_beneficiary($Beneficiary_id)
{
    $UserId                         =$this->session->userdata('logged_gexp_in')->UsersId;
    $DataUsers                      =$this->MLogin->GetProfileSign($UserId);
    $GroupMenu                      =$DataUsers->UserGroup;
    $data['menusign']               =$this->MLogin->GetMasterMenuSign($GroupMenu);
    $data['lsmastermenus']          =$this->MMenu->GetListMasterMenu();
    $data['lsmasterBeneficiary']    =$this->MSetBeneficiary->GetListMasterBeneficiary();
    $data['lsmastercountry']        =$this->MSetCountry->GetListMasterCountry();

    $data['rowsBeneficiary_byid']   =$this->MSetBeneficiary->GetListMasterBeneficiary_byid($Beneficiary_id);

    $this->load->view('DataSetBeneficiary/VEdit',$data);
}


public function save_edit_beneficiary()
{
    $UserId                =$this->session->userdata('logged_gexp_in')->UsersId;
    $Beneid                =$this->input->post('beneid');
    $BenDesc               =$this->input->post('beneficiarydesc');
    $BenOffice             =$this->input->post('beneficiary_office');
    $BenAddr               =$this->input->post('beneficiary_addr');
    $BenCountry            =$this->input->post('beneficiary_country');
    $BenContact            =$this->input->post('beneficiary_contact');
    $BenPhone              =$this->input->post('beneficiary_phone');
    $BenStats              =$this->input->post('status_id');

    $data=array(
            'BeneficiaryDesc'          => strtoupper($BenDesc),
            'BeneficiaryOffice'        => strtoupper($BenOffice),
            'BeneficiaryAddr'          => strtoupper($BenAddr),
            'BeneficiaryCountry'       => $BenCountry,
            'BeneficiaryCP'            => strtoupper($BenContact),
            'BeneficiaryPhone'         => $BenPhone,
            'BeneficiaryStats'         => $BenStats,
            'UpdateAt'                 => NOW,
            'UpdateBy'                 => $UserId
    );

    // $this->MSetBeneficiary->update_beneficiary($data,$Beneid);

    // redirect('DataSetBeneficiary');

    if($this->MSetBeneficiary->update_beneficiary($data,$Beneid)){
        // echo "TRUE";
        $this->session->set_flashdata('success','Data Berhasil Di Proses');
                    redirect('DataSetBeneficiary');
}else{
        // echo "FALSE";
        $this->session->set_flashdata('warns','Mohon Maaf Data Tidak Dapat Di Proses, Koneksi Error');
                    redirect('DataSetBeneficiary');
}

}



}