<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataSetContainer extends CI_Controller {

function __construct(){
    parent:: __construct();
    
if(!$this->session->userdata('logged_gexp_in')){
    redirect('LoginSys/doLogout');
}
    $this->load->model('MRoot');
    $this->load->model('MLogin');
    $this->load->model('MMenu');
    $this->load->model('MSetCountry');
    $this->load->model('MSetContainer');
}

public function index(){

    $UserId                  =$this->session->userdata('logged_gexp_in')->UsersId;
    $DataUsers               =$this->MLogin->GetProfileSign($UserId);
    $GroupMenu               =$DataUsers->UserGroup;
    $data['menusign']        =$this->MLogin->GetMasterMenuSign($GroupMenu);
    $data['lsmastermenus']   =$this->MMenu->GetListMasterMenu();
    $data['lsmastercontainer'] =$this->MSetContainer->GetListMasterContainer();

	$this->load->view('DataSetContainer/VList',$data);

}

public function createnewcontainer(){

    $ContDesc               =$this->input->post('contdesc');

    $CheckContDesc          =$this->MSetContainer->CheckContainerDesc($ContDesc);

if($CheckContDesc==TRUE){

        // echo "Maaf Data Sudah Tersedia";
        echo "<script>alert('Maaf Data Sudah Tersedia')</script>";

}else{

    $data=array(
            'ContainerDesc'          => strtoupper($ContDesc),
            'ContainerStats'         => "1",
            'CreatedAt'         => NOW,
            'CreatedBy'         => $this->session->userdata('logged_gexp_in')->UsersId,
    );

    $insert     =$this->MSetContainer->tambah_container($data);

    if($insert){
                echo "TRUE";
                    $this->session->set_flashdata('success','Data Berhasil Di Proses');
                            redirect('DataSetContainer');
    }else{
                echo "FALSE";
                    $this->session->set_flashdata('warns','Mohon Maaf Data Tidak Dapat Di Proses, Koneksi Error');
                            redirect('DataSetContainer');
    }


}


}


public function edit_masterset_container($Container_Id)
{
    $UserId                    =$this->session->userdata('logged_gexp_in')->UsersId;
    $DataUsers                 =$this->MLogin->GetProfileSign($UserId);
    $GroupMenu                 =$DataUsers->UserGroup;
    $data['menusign']          =$this->MLogin->GetMasterMenuSign($GroupMenu);
    $data['lsmastermenus']     =$this->MMenu->GetListMasterMenu();
    $data['lsmastercontainer'] =$this->MSetContainer->GetListMasterContainer();

    $data['rows_container']=$this->MSetContainer->getrow_container_byid($Container_Id);

    $this->load->view('DataSetContainer/VEdit',$data);

}

public function save_editmaster_container()
{
    $ContainerId               =$this->input->post('container_id');
    $ContainerDesc               =$this->input->post('container_desc');
    $ContainerStats            =$this->input->post('status_container');
//     $ItemCodeId             =$this->input->post('itemcodeid');
// // $ItemHsCode              =$this->input->post('itemhscode');
//     $ItemName               =$this->input->post('itemname');
//     $ItemPackDesc           =$this->input->post('itempackdesc');
//     $ItemNetWeight          =$this->input->post('itemnetweight');
//     $ItemGrossWeight        =$this->input->post('itemgrossweight');
//     $ItemStats              =$this->input->post('status_item');
//     $Length                 =$this->input->post('Length');
//     $Width                  =$this->input->post('Width');
//     $Height                 =$this->input->post('Height');

    $data=array(
        'ContainerDesc'           => strtoupper($ContainerDesc),
        'ContainerStats'        => $ContainerStats,
        'UpdateAt'        => NOW,
        'UpdateBy'        => $this->session->userdata('logged_gexp_in')->UsersId,
        // 'ItemHsCode'         => $ItemHsCode,
        // 'ItemName'           => $ItemName,
        // 'ItemPackDesc'       => $ItemPackDesc,
        // 'ItemNetWeight'      => $ItemNetWeight,
        // 'ItemGrossWeight'    => $ItemGrossWeight,
        // 'Length'             => $Length,
        // 'Width'              => $Width,
        // 'Height'             => $Height,
        // 'ItemStats'          => $ItemStats
    );

    // $this->MSetContainer->update_master_container($data,$ContainerId);
    // redirect('DataSetContainer');

    if($this->MSetContainer->update_master_container($data,$ContainerId)){
        echo "TRUE";
            $this->session->set_flashdata('success','Data Berhasil Di Proses');
                    redirect('DataSetContainer');
    }else{
            echo "FALSE";
                $this->session->set_flashdata('warns','Mohon Maaf Data Tidak Dapat Di Proses, Koneksi Error');
                        redirect('DataSetContainer');
    }
}

}