<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MenuItemMap extends CI_Controller {

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
    $this->load->model('MCoa');
    $this->load->model('MApproval');
    $this->load->model('MFin');
    $this->load->model('MItemMap');

}

public function index()
{

    $UserId=$this->session->userdata('logged_gexp_in')->UsersId;
    $DataUsers=$this->MLogin->GetProfileSign($UserId);
    $GroupMenu=$DataUsers->UserGroup;
    $data['menusign']=$this->MLogin->GetMasterMenuSign($GroupMenu);
    $data['groupname']=$this->MLogin->GetGroupName($UserId);

    $data['lsmastercoa']=$this->MCoa->getlistmstcoa();
    $data['lsmastercountry']=$this->MItemMap->getlist_allcountry();
    $data['lsmasteritem']=$this->MItemMap->getlist_all_item();

    $data['lsitem_mapping']=$this->MItemMap->getlist_item_mapping();

	$this->load->view('MasterItemMap/VList',$data);

}

public function createnew_item_map()
{
    $UserId=$this->session->userdata('logged_gexp_in')->UsersId;
    $itemid=$this->input->post('item_id');
    $countryid=$this->input->post('country_id');

    $data=array(
        'gexp_item_id'=>$itemid,
        'gexp_country_id'=>$countryid,
        'gexp_item_map_createdAt'=>NOW,
        'gexp_item_map_createdBy'=>$UserId,
        'gexp_item_map_lastupdate'=>NOW,
    );

    // $this->MItemMap->tambah_item_mapping($data);

    // redirect('MenuItemMap');

    if($this->MItemMap->tambah_item_mapping($data)){
        echo"TRUE";
        $this->session->set_flashdata('success','Data Berhasil Di Proses');
        redirect('MenuItemMap');
    }else{
        echo"FALSE";
        $this->session->set_flashdata('warns','Mohon Maaf Data Tidak Dapat Di Proses, Koneksi Error');
        redirect('MenuItemMap');
    }
}

public function edit_item_map($item_map_id)
{

    $UserId=$this->session->userdata('logged_gexp_in')->UsersId;
    $DataUsers=$this->MLogin->GetProfileSign($UserId);
    $GroupMenu=$DataUsers->UserGroup;
    $data['menusign']=$this->MLogin->GetMasterMenuSign($GroupMenu);
    $data['groupname']=$this->MLogin->GetGroupName($UserId);

    $data['lsmastercountry']=$this->MItemMap->getlist_allcountry();
    $data['lsmasteritem']=$this->MItemMap->getlist_all_item();

    $data['rowsitem_map_byid']=$this->MItemMap->getrowsitem_map_byid($item_map_id);

    $this->load->view('MasterItemMap/VEdit',$data);
}

public function save_edit_item_mapping()
{
    $UserId=$this->session->userdata('logged_gexp_in')->UsersId;
    $item_map_id=$this->input->post('item_map_id');
    $itemid=$this->input->post('item_id');
    $countryid=$this->input->post('country_id');
    $statusid=$this->input->post('status_id');

    $data=array(
        'gexp_item_id'=>$itemid,
        'gexp_country_id'=>$countryid,
        'gexp_item_map_status'=>$statusid,
        'gexp_item_map_updateAt'=>NOW,
        'gexp_item_map_updateBy'=>$UserId,
        'gexp_item_map_lastupdate'=>NOW,
    );

    // $this->MItemMap->update_item_mapping($data,$item_map_id);

    // redirect('MenuItemMap');

    if($this->MItemMap->update_item_mapping($data,$item_map_id)){
        echo"TRUE";
        $this->session->set_flashdata('success','Data Berhasil Di Proses');
        redirect('MenuItemMap');
    }else{
        echo"FALSE";
        $this->session->set_flashdata('warns','Mohon Maaf Data Tidak Dapat Di Proses, Koneksi Error');
        redirect('MenuItemMap');
    }
}



}