<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MenuPackingList extends CI_Controller {

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
    $this->load->model('MPackList');

}

public function index(){

    $UserId=$this->session->userdata('logged_gexp_in')->UsersId;
    $DataUsers=$this->MLogin->GetProfileSign($UserId);
    $GroupMenu=$DataUsers->UserGroup;
    $data['menusign']=$this->MLogin->GetMasterMenuSign($GroupMenu);
    $data['groupname']=$this->MLogin->GetGroupName($UserId);

    $data['lspacklist']=$this->MPackList->GetList_PackList();
    $data['customer']=$this->MPackList->customer();
    $data['country']=$this->MPackList->country();

	$this->load->view('MasterPackingList/VList',$data);

}

public function search()
{
    $params = $this->input->post();
    $UserId=$this->session->userdata('logged_gexp_in')->UsersId;
    $DataUsers=$this->MLogin->GetProfileSign($UserId);
    $GroupMenu=$DataUsers->UserGroup;
    $data['menusign']=$this->MLogin->GetMasterMenuSign($GroupMenu);
    $data['groupname']=$this->MLogin->GetGroupName($UserId);

    $data['lspacklist']=$this->MPackList->GetSearch_PackList($params);
    $data['customer']=$this->MPackList->customer();
    $data['country']=$this->MPackList->country();

	$this->load->view('MasterPackingList/VSearch', $data);
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
    $data['listDataInvoice']=$this->MPackList->GetListInvoice();
    $data['m']=M;
    $data['y']=Y;
    $lastPI=$this->MPackList->GetLastPL_No();
    // $LastNoPI=$lastPI->gexp_pi_no;
    if($lastPI==null){

        // echo "T";
        $data['noticket']="0001";

    }else{

        $LastNoPI=$lastPI->gexp_packlist_no;
        $nourut = (int) substr($LastNoPI, 3, 1);
        $nourut++;
        $pi=sprintf("%04s",$nourut);
        $data['noticket']=$pi;
        // $TicketPrint= $text."/".$today."/". sprintf("%03s",$looptic);
    }

    // print_r($lastPI);
    $this->load->view('MasterPackingList/CreateNew',$data);
}

public function InsertCreateNew()
{
    $UserId=$this->session->userdata('logged_gexp_in')->UsersId;
    $pl_number=$this->input->post('pl_number');
    $pl_date=$this->input->post('pl_date');
    $pl_inv_id=$this->input->post('packlist_inv_id');
    $container_pack=$this->input->post('container_pack');

    $data=array(
      'gexp_packlist_no'=>$pl_number,
      'gexp_packlist_invoice_id'=>$pl_inv_id,
      'gexp_packlist_date'=>$pl_date,
      'gexp_packlist_container'=>$container_pack,
      'gexp_packlist_statrows'=>'1',
      'gexp_packlist_createdAt'=>NOW,
      'gexp_packlist_createdBy'=>$UserId,
    );

    $insert=$this->MPackList->tambah_packlist($data);

    $data3=array(
        'gexp_invoice_isPL'=>'1',
    );
    $update_inv_isPL=$this->MPackList->update_inv_isPL($data3, $pl_inv_id);

    $listdetailpack=$this->MPackList->GetListItem_Pack($pl_inv_id);

    foreach($listdetailpack as $dt){
        
        $data2=array(
            'gexp_packlist_number'=>$pl_number,
            'gexp_packlistdet_descgod'=>$dt->ItemName,
            'gexp_packlistdet_itemid'=>$dt->ItemId,
            'gexp_packlistdet_hscode'=>$dt->gexp_good_hs_code,
            'gexp_packlistdet_packing'=>$dt->ItemPackDesc,
            'gexp_packlistdet_qty'=>$dt->gexp_good_qty,
            'gexp_packlistdet_netweight'=>$dt->gexp_good_qty * $dt->ItemNetWeight,
            'gexp_packlistdet_grossweight'=>$dt->gexp_good_qty * $dt->ItemGrossWeight,
            'gexp_packlistdet_cbm'=>$dt->Length * $dt->Width * $dt->Height / 1000000000 * $dt->gexp_good_qty,
            'gexp_packlistdet_dimension'=>$dt->ItemDimension,
            'gexp_packlistdet_createdAt'=>NOW,
            'gexp_packlistdet_createdBy'=>$UserId,
        );

    $insert=$this->MPackList->tambah_packlist_detail($data2);

    }

    redirect('MenuPackingList');

}


public function DetailPack($Packlist_Id)
{
    $UserId=$this->session->userdata('logged_gexp_in')->UsersId;
    $DataUsers=$this->MLogin->GetProfileSign($UserId);
    $GroupMenu=$DataUsers->UserGroup;
    $data['menusign']=$this->MLogin->GetMasterMenuSign($GroupMenu);
    $data['groupname']=$this->MLogin->GetGroupName($UserId);

    $PackList=$this->MPackList->GetPackList_Row($Packlist_Id);
    $PackNo=$PackList->gexp_packlist_no;
    $invoice_no=$PackList->gexp_invoice_no;
    $data['packno']=$PackNo;
    $data['lsdetpack']=$this->MPackList->GetListDetail_Pack($PackNo);
    $data['packdets']=$this->MPackList->GetPackList_Row($Packlist_Id);
    $data['printoutview']=$this->MPackList->getprintout_prev($invoice_no);
    $data['detailspack']=$this->MPackList->get_detail_packlistreg($Packlist_Id);
    $data['rowdetailspack']=$this->MPackList->getlistdetailpack_byid($Packlist_Id);


    // print_r($Packlist_Id);


    $this->load->view('MasterPackingList/PackListDet',$data);

}


public function Updates_container($Packlist_Id)
{
    // print_r($Packlist_Id);
    $container_no=$this->input->post('container_no');
    // print_r($container_no);
    $data=array(
        'gexp_packlist_container'=>$container_no,
    );
    $updatecontainer=$this->MPackList->update_container($data,$Packlist_Id);
    redirect('MenuPackingList/DetailPack/'.$Packlist_Id);
}


public function UpdateSettings_Print()
{
    $idpack=$this->input->post('id_pack');
    $invoice_no=$this->input->post('invoice_no');
    $carton=$this->input->post('ctn_barcode');
    $batch=$this->input->post('batch');
    $exp_date=$this->input->post('exp_date');
    $prod_date=$this->input->post('prod_date');
    
    if($carton==''){
        echo"0";
    }else{
        echo $carton;
    }

    if($batch==''){
        echo"0";
    }else{
        echo $batch;
    }

    if($exp_date==''){
        echo"0";
    }else{
        echo $exp_date;
    }

    if($prod_date==''){
        echo"0";
    }else{
        echo $prod_date;
    }

    $data=array(
        // 'inv_print_no'=>$invoice_no,
        'inv_print_carton_barcode'=>$carton,
        'inv_print_batch'=>$batch,
        'inv_print_expired_date'=>$exp_date,
        'inv_print_production_date'=>$prod_date,
    );

    $this->MPackList->update_printout_prev($data,$invoice_no);

    redirect('MenuPackingList/DetailPack/'.$idpack);

}


public function preview_update_detailpack($gexp_packlist_id)
{
    $UserId=$this->session->userdata('logged_gexp_in')->UsersId;
    $DataUsers=$this->MLogin->GetProfileSign($UserId);
    $GroupMenu=$DataUsers->UserGroup;
    $data['menusign']=$this->MLogin->GetMasterMenuSign($GroupMenu);
    $data['groupname']=$this->MLogin->GetGroupName($UserId);

    $data['rowdetailspack']=$this->MPackList->getlistdetailpack_byid($gexp_packlist_id);
    $PackList=$this->MPackList->getlistdetailpack_byid($gexp_packlist_id);
    $invoice_no=$PackList->gexp_invoice_no;
    $data['printoutview']=$this->MPackList->getprintout_prev($invoice_no);


    $this->load->view('MasterPackingList/Update_detailpack',$data);
    
}

public function UpdatePackDets()
{
    $UserId=$this->session->userdata('logged_gexp_in')->UsersId;
    $pack_id=$this->input->post('pack_id');
    $packdets_id=$this->input->post('packdets_id');
    $carton_bar=$this->input->post('carton_bar');
    $batch=$this->input->post('batch');
    $exp_date=$this->input->post('exp_date');
    $prd_date=$this->input->post('prd_date');

    $data=array(
        'gexp_packlistdet_carton_bar'=>$carton_bar,
        'gexp_packlistdet_batch'=>$batch,
        'gexp_packlistdet_expdate'=>$exp_date,
        'gexp_packlistdet_proddate'=>$prd_date,
        'gexp_packlistdet_updatedBy'=>$UserId,
    );

    $this->MPackList->update_packlistdet($data, $packdets_id);

    redirect('MenuPackingList/DetailPack/'.$pack_id);

}


public function packing_list_print($Packlist_Id)
{

    $data['detailsdata_printpack']=$this->MPackList->get_detail_data_printpack($Packlist_Id);
    $data['lsdetails_data']=$this->MPackList->get_lsdetail_datapack($Packlist_Id);

    // $packlist_no=$data['lsdetails_data'][0]->gexp_packlist_number;

    $data['summary_qty']=$this->MPackList->getsum_qty_packlist($Packlist_Id);
    $data['summary_nett']=$this->MPackList->getsum_nett_packlist($Packlist_Id);
    $data['summary_gross']=$this->MPackList->getsum_gross_packlist($Packlist_Id);
    $data['summary_cbm']=$this->MPackList->getsum_cbm_packlist($Packlist_Id);

    $data['print_check']=$this->MPackList->get_checkprint($Packlist_Id);

    // print_r($data);
    require_once('assets/mpdf_v8.0.3-master/vendor/autoload.php'); // Arahkan ke file mpdf.php didalam folder mpdf
    //$mpdf=new Mpdf('utf-8', 'A4', 10.5, 'arial'); // Membuat file mpdf baru
    $mpdf = new \Mpdf\Mpdf();
    $mpdf->AddPage("L","","","","","15","15","15","15","","","","","","","","","","","","A4");
    $html=$this->load->view('LivePrint/packing_list_print',$data,true);
    $mpdf->WriteHTML($html);
    $mpdf->Output();
}




}