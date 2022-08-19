<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataSetItem extends CI_Controller {

function __construct(){
    parent:: __construct();
    
if(!$this->session->userdata('logged_gexp_in')){
    redirect('LoginSys/doLogout');
}
    $this->load->model('MRoot');
    $this->load->model('MLogin');
    $this->load->model('MMenu');
    $this->load->model('MSetCountry');
    $this->load->model('MSetTop');
    $this->load->model('MSetItem');
}

public function index(){

    $UserId                  =$this->session->userdata('logged_gexp_in')->UsersId;
    $DataUsers               =$this->MLogin->GetProfileSign($UserId);
    $GroupMenu               =$DataUsers->UserGroup;
    $data['menusign']        =$this->MLogin->GetMasterMenuSign($GroupMenu);
    $data['lsmastermenus']   =$this->MMenu->GetListMasterMenu();
    $data['lsmasteritem']    =$this->MSetItem->GetListMasterItem();

	$this->load->view('DataSetItem/VList',$data);

}

public function createnewitem(){

    $ItemCodeId             =$this->input->post('itemcodeid');
    // $ItemHsCode             =$this->input->post('itemhscode');
    $ItemBrandName               =$this->input->post('itembrandname');
    $ItemName               =$this->input->post('itemname');
    $ItemPackDesc           =$this->input->post('itempackdesc');
    $ItemNetWeight          =$this->input->post('itemnetweight');
    $ItemGrossWeight        =$this->input->post('itemgrossweight');
    $Length                 =$this->input->post('Length');
    $Width                  =$this->input->post('Width');
    $Height                 =$this->input->post('Height');
    // $ItemDimension          =$this->input->post('itemdimension');

    $CheckNameItem          =$this->MSetItem->CheckItemName($ItemName);

if($CheckNameItem==TRUE){

        // echo "Maaf Data Sudah Tersedia";
        echo "<script>alert('Maaf Data Sudah Tersedia')</script>";

}else{

    $data=array(
            'ItemCodeId'         => $ItemCodeId,
            // 'ItemHsCode'        => $ItemHsCode,
            'ItemBrandName'      => strtoupper($ItemBrandName),
            'ItemName'           => strtoupper($ItemName),
            'ItemPackDesc'       => strtoupper($ItemPackDesc),
            'ItemNetWeight'      => $ItemNetWeight,
            'ItemGrossWeight'    => $ItemGrossWeight,
            'Length'             => $Length,
            'Width'              => $Width,
            'Height'             => $Height,
            // 'ItemDimension'     => $ItemDimension,
            'ItemStats'          => "1",
            'CreatedAt'          => date('Y-m-d H:i:s'),
            'CreatedBy'          => $this->session->userdata('logged_gexp_in')->UsersId,
    );

$insert     =$this->MSetItem->tambah_item($data);

    if($insert){
                echo "TRUE";
                    $this->session->set_flashdata('success','Data Berhasil Di Proses');
                            redirect('DataSetItem');
    }else{
                echo "FALSE";
                    $this->session->set_flashdata('warns','Mohon Maaf Data Tidak Dapat Di Proses, Koneksi Error');
                            redirect('DataSetItem');
    }


}



}


public function edit_masteritem($ItemId)
{
    $UserId                  =$this->session->userdata('logged_gexp_in')->UsersId;
    $DataUsers               =$this->MLogin->GetProfileSign($UserId);
    $GroupMenu               =$DataUsers->UserGroup;
    $data['menusign']        =$this->MLogin->GetMasterMenuSign($GroupMenu);
    $data['lsmastermenus']   =$this->MMenu->GetListMasterMenu();
    $data['lsmasteritem']    =$this->MSetItem->GetListMasterItem();

    $data['rowsdata_itembyid']=$this->MSetItem->getrows_itembyid($ItemId);

    // echo $ItemId;
    $this->load->view('DataSetItem/VEdit',$data);

}

public function save_editmasteritem()
{
    $ItemId                 =$this->input->post('itemid');
    $ItemCodeId             =$this->input->post('itemcodeid');
    $ItemBrandName          =$this->input->post('itembrandname');
// $ItemHsCode             =$this->input->post('itemhscode');
    $ItemName               =$this->input->post('itemname');
    $ItemPackDesc           =$this->input->post('itempackdesc');
    $ItemNetWeight          =$this->input->post('itemnetweight');
    $ItemGrossWeight        =$this->input->post('itemgrossweight');
    $ItemStats              =$this->input->post('status_item');
    $Length                 =$this->input->post('Length');
    $Width                  =$this->input->post('Width');
    $Height                 =$this->input->post('Height');

    $data=array(
        'ItemCodeId'         => $ItemCodeId,
        // 'ItemHsCode'        => $ItemHsCode,
        'ItemBrandName'      => $ItemBrandName,
        'ItemName'           => $ItemName,
        'ItemPackDesc'       => $ItemPackDesc,
        'ItemNetWeight'      => $ItemNetWeight,
        'ItemGrossWeight'    => $ItemGrossWeight,
        'Length'             => $Length,
        'Width'              => $Width,
        'Height'             => $Height,
        'ItemStats'          => $ItemStats
    );

    // $this->MSetItem->update_master_item($data,$ItemId);
    if($this->MSetItem->update_master_item($data,$ItemId)){
        echo "TRUE";
        $this->session->set_flashdata('success','Data Berhasil Di Proses');
        redirect('DataSetItem');
    }else{
        echo "FALSE";
        $this->session->set_flashdata('warns','Mohon Maaf Data Tidak Dapat Di Proses, Koneksi Error');
        redirect('DataSetItem');
    }
    // redirect('DataSetItem');
}



}