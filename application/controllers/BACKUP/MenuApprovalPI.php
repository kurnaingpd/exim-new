<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MenuApprovalPI extends CI_Controller {

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
}

public function index(){

    $UserId=$this->session->userdata('logged_gexp_in')->UsersId;
   
    $DataUsers=$this->MLogin->GetProfileSign($UserId);
    $GroupMenu=$DataUsers->UserGroup;
    $data['menusign']=$this->MLogin->GetMasterMenuSign($GroupMenu);
    $data['groupname']=$this->MLogin->GetGroupName($UserId);
    
    $data['listdataPI']=$this->MApproval->GetData_PI();

	$this->load->view('MenuApprovalPI/VList',$data);

}

public function PreviewPI($Id_PI)
{
    $UserId=$this->session->userdata('logged_gexp_in')->UsersId;
   
    $DataUsers=$this->MLogin->GetProfileSign($UserId);
    $GroupMenu=$DataUsers->UserGroup;
    $data['menusign']=$this->MLogin->GetMasterMenuSign($GroupMenu);
    $data['groupname']=$this->MLogin->GetGroupName($UserId);
    
    $data['listdataPI']=$this->MApproval->GetList_PI();
    $data['getrowpi_byid']=$this->MBoardPI->GetList_PI_byId($Id_PI);
    $data['list_purchasegood']=$this->MBoardPI->GetList_PurchaseGood($Id_PI);
    $data['list_freegood']=$this->MBoardPI->GetList_FreeGood($Id_PI);

    $data['free_on_board']=$this->MBoardPI->GetSumList_PurchaseGood($Id_PI);

    $data['summary_purchase_qty']=$this->MBoardPI->GetSumQty_PurchaseGood($Id_PI);
    $data['summary_purchase_value']=$this->MBoardPI->GetSumValue_PurchaseGood($Id_PI);

    $data['summary_freegood_qty']=$this->MBoardPI->GetSumQty_FreeGood($Id_PI);
    $data['summary_freegood_value']=$this->MBoardPI->GetSumValue_FreeGood($Id_PI);

	$this->load->view('MenuApprovalPI/PreviewPI',$data);
}

public function ApprovedPI_byidexp($Id_PI)
{
    $UserId=$this->session->userdata('logged_gexp_in')->UsersId;

    $data=array(
        'gexp_pi_statusPI'=>"1",
        'gexp_pi_isApproved'=>"1",
        'gexp_pi_ApprovedAt'=>NOW,
        'gexp_pi_ApprovedBy'=>"$UserId",
        'gexp_pi_isExpreq'=>'1',
    );

    $this->MApproval->update_approved($data, $Id_PI);

    $data2=array(
        'gexp_expreq_pi_id'=>$Id_PI,
        'gexp_expreq_date'=>Tanggal,
        'gexp_expreq_month'=>M,
        'gexp_expreq_years'=>Y,
        'gexp_expreq_statrows'=>"1",
        'gexp_expreq_createdAt'=>NOW,
        'gexp_expreq_createdBy'=>"$UserId",
    );
    $this->MApproval->insert_exprequirement($data2);

    redirect('MenuApprovalPI/');
}

public function ApprovedPI_byid($Id_PI)
{
    $UserId=$this->session->userdata('logged_gexp_in')->UsersId;

    $data['getrowpi_byid']=$this->MBoardPI->GetList_PI_byId($Id_PI);
    $pi_id=$data['getrowpi_byid'][0]->gexp_pi_id;
    $pi_no=$data['getrowpi_byid'][0]->gexp_pi_no;

    // print_r($pi_no);

    $data=array(
        'gexp_pi_statusPI'=>"1",
        'gexp_pi_isApproved'=>"1",
        'gexp_pi_ApprovedAt'=>NOW,
        'gexp_pi_ApprovedBy'=>"$UserId",
    );

    $this->MApproval->update_approved($data, $Id_PI);

    $data2=array(
        'sign_pi_id'=>$pi_id,
        'sign_pi_no'=>$pi_no,
        'sign_pi_statrows'=>"1",
    );

    $this->MApproval->insert_sign_active($data2);

    $data3=array(
        'gexp_expreq_pi_id'=>$pi_id,
        'gexp_expreq_date'=>Tanggal,
        'gexp_expreq_month'=>M,
        'gexp_expreq_years'=>Y,
        'gexp_expreq_createdAt'=>NOW,
        'gexp_expreq_createdBy'=>$UserId,
        'gexp_expreq_statrows'=>"1",
    );

    $this->MApproval->insert_expreq_active($data3);

    redirect('MenuApprovalPI/');
}

public function VoidPI_byid($Id_PI)
{
    $UserId=$this->session->userdata('logged_gexp_in')->UsersId;

    $data=array(
        'gexp_pi_statusPI'=>"2",
        'gexp_pi_isApproved'=>"1",
        'gexp_pi_ApprovedAt'=>NOW,
        'gexp_pi_ApprovedBy'=>"$UserId",
    );

    $this->MApproval->update_approved($data, $Id_PI);
    redirect('MenuApprovalPI/');
}


public function Update_remark($Id_PI)
{
    $UserId=$this->session->userdata('logged_gexp_in')->UsersId;

    $remark=$this->input->post('remark_pi');

    $data=array(
        'gexp_pi_remark'=>$remark,
        'gexp_pi_statusPI'=>"5",
        'gexp_pi_isApproved'=>"1",
        'gexp_pi_ApprovedAt'=>NOW,
        'gexp_pi_ApprovedBy'=>"$UserId",
    );

    $this->MApproval->update_approved($data, $Id_PI);
    redirect('MenuApprovalPI/');
}




}