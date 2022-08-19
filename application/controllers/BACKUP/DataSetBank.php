<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataSetBank extends CI_Controller {

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
}

public function index(){

    $UserId                  =$this->session->userdata('logged_gexp_in')->UsersId;
    $DataUsers               =$this->MLogin->GetProfileSign($UserId);
    $GroupMenu               =$DataUsers->UserGroup;
    $data['menusign']        =$this->MLogin->GetMasterMenuSign($GroupMenu);
    $data['lsmastermenus']   =$this->MMenu->GetListMasterMenu();
    $data['lsmasterbank']    =$this->MSetBank->GetListMasterBank();

	$this->load->view('DataSetBank/VList',$data);

}

public function createnewbank(){

    $BankCode               =$this->input->post('bankcode');
    $BankName               =$this->input->post('bankname');
    $BankOffice             =$this->input->post('bankoffice');
    $BankDesc               =$this->input->post('bankdesc');
    $BankAccount            =$this->input->post('bankaccount');
    $BankSwiftCode          =$this->input->post('bankswiftcode');

    $CheckBankCode          =$this->MSetBank->CheckBankCode($BankCode);

if($CheckBankCode==TRUE){

        // echo "Maaf Data Sudah Tersedia";
        echo "<script>alert('Maaf Data Sudah Tersedia')</script>";

}else{

    $data=array(
            'BankCode'          => $BankCode,
            'BankName'          => strtoupper($BankName),
            'BankOffice'        => strtoupper($BankOffice),
            'BankDesc'          => strtoupper($BankDesc),
            'BankAccount'       => $BankAccount,
            'BankSwiftCode'     => $BankSwiftCode,
            'BankStats'         => "1",
            'CreatedAt'         => NOW,
            'CreatedBy'         => $this->session->userdata('logged_gexp_in')->UsersId,
    );

    $insert     =$this->MSetBank->tambah_bank($data);

    if($insert){
                echo "TRUE";
                    $this->session->set_flashdata('success','Data Berhasil Di Proses');
                            redirect('DataSetBank');
    }else{
                echo "FALSE";
                    $this->session->set_flashdata('warns','Mohon Maaf Data Tidak Dapat Di Proses, Koneksi Error');
                            redirect('DataSetBank');
    }


}


}

public function editmaster_bank($BankId)
{
    $UserId                  =$this->session->userdata('logged_gexp_in')->UsersId;
    $DataUsers               =$this->MLogin->GetProfileSign($UserId);
    $GroupMenu               =$DataUsers->UserGroup;
    $data['menusign']        =$this->MLogin->GetMasterMenuSign($GroupMenu);
    $data['lsmastermenus']   =$this->MMenu->GetListMasterMenu();
    $data['lsmasterbank']    =$this->MSetBank->GetListMasterBank();

    $data['rowsmasterbank_byid']    =$this->MSetBank->GetListMasterBank_byid($BankId);
    

	$this->load->view('DataSetBank/VEdit',$data);
}

public function save_edit_master_bank()
{
    $UserId                  =$this->session->userdata('logged_gexp_in')->UsersId;
    $BankId                 =$this->input->post('bankid');
    $BankCode               =$this->input->post('bankcode');
    $BankName               =$this->input->post('bankname');
    $BankOffice             =$this->input->post('bankoffice');
    $BankDesc               =$this->input->post('bankdesc');
    $BankAccount            =$this->input->post('bankaccount');
    $BankSwiftCode          =$this->input->post('bankswiftcode');
    $BankStats              =$this->input->post('status_id');

    $data=array(
            'BankCode'          => $BankCode,
            'BankName'          => strtoupper($BankName),
            'BankOffice'        => strtoupper($BankOffice),
            'BankDesc'          => strtoupper($BankDesc),
            'BankAccount'       => $BankAccount,
            'BankSwiftCode'     => $BankSwiftCode,
            'BankStats'         => $BankStats,
            'UpdateAt'          => NOW,
            'UpdateBy'          => $UserId
    );

    // $this->MSetBank->update_master_bank($data,$BankId);

    // redirect('DataSetBank');

    if($this->MSetBank->update_master_bank($data,$BankId)){
                echo "TRUE";
                    $this->session->set_flashdata('success','Data Berhasil Di Proses');
                            redirect('DataSetBank');
    }else{
                echo "FALSE";
                    $this->session->set_flashdata('warns','Mohon Maaf Data Tidak Dapat Di Proses, Koneksi Error');
                            redirect('DataSetBank');
    }
}

}