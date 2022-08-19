<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ETA extends CI_Controller {

function __construct(){
    parent:: __construct();
    
    if(!$this->session->userdata('logged_gexp_in')){
        redirect('LoginImport/doLogout');
    }
        // $this->load->model('MAdministrator');
        // $this->load->model('MLogin');
        $this->load->model('MEta');
}

public function index(){

    $data['ls_master_eta']=$this->MEta->Getall_master_eta();
	$this->load->view('ETA/V_ETA',$data);
}

public function tambah_data()
{
    $data['ls_shipper']=$this->MEta->getshipper_master();
    $this->load->view('ETA/V_Tambah',$data);
}


public function get_po_by_shipper(){
    // $this->load->model('mpersonil');
    $array_data         = array();
    $shipper     		= $this->input->post("post_data");
    $query              = $this->MEta->get_po_byshipper($shipper);
    
    foreach($query as $a => $data):
        $dat['Docim_ID'] 		= $data['docim_id'];
        $dat['Docim_PO'] 	    = $data['docim_po'];
        array_push($array_data,$dat);
    endforeach;

    print_r(json_encode($array_data));
}

public function get_hierarchy_po(){
    // $this->load->model('MBoardPI');
    $dat         		= array();
    $docim_id    	    = $this->input->post("post_data");
    $data              	= $this->MEta->get_hierarchy_bypo($docim_id);
    
    $dat['docim_po'] 	    = $data['docim_po'];
    $dat['consignee'] 	    = $data['docim_consignee'];
    $dat['commodity'] 	    = $data['docim_commodity'];
    $dat['POL'] 	        = $data['docim_POL'];
    $dat['POD'] 	        = $data['docim_POD'];
    $dat['ETD'] 	        = $data['docim_ETD'];
    $dat['ETA'] 	        = $data['docim_ETA'];
    $dat['PIB_AJU'] 	    = $data['docim_PIB_AJU'];
    $dat['currency'] 	    = $data['docim_currency'];
    $dat['CIF'] 	        = $data['docim_CIF'];
    $dat['Duty'] 	        = $data['docim_Duty'];
    $dat['VAT'] 	        = $data['docim_VAT'];
    $dat['TAX'] 	        = $data['docim_TAX'];

    print_r(json_encode($dat));
}


public function submit_tambah_data()
{
    $UserId=$this->session->userdata('logged_gexp_in')->user_userid;
    $shipper=$this->input->post('shipper');
    $input_po_no=$this->input->post('input_po_no');
    $input_consignee=$this->input->post('input_consignee');
    $input_commodity=$this->input->post('input_commodity');
    $bl_no=$this->input->post('bl_no');
    $pol=$this->input->post('pol');
    $pod=$this->input->post('pod');
    $etd=$this->input->post('etd');
    $eta=$this->input->post('eta');
    $pib_aju=$this->input->post('pib_aju');
    $A=$this->input->post('A');
    $B=$this->input->post('B');
    $C=$this->input->post('C');
    $D=$this->input->post('D');
    $E=$this->input->post('E');
    $G=$this->input->post('G');
    $H=$this->input->post('H');
    $I=$this->input->post('I');
    $J=$this->input->post('J');
    $K=$this->input->post('K');
    $actual=$this->input->post('actual');


    $data=array(
        'etapib_shipper'=>$shipper,
        'etapib_po'=>$input_po_no,
        'etapib_consignee'=>$input_consignee,
        'etapib_commodity'=>$input_commodity,
        'etapib_BL_no'=>$bl_no,
        'etapib_pol'=>$pol,
        'etapib_pod'=>$pod,
        'etapib_etd'=>$etd,
        'etapib_eta'=>$eta,
        'etapib_pib_aju'=>$pib_aju,
        'etapib_currency'=>$A,
        'etapib_CIF'=>$B,
        'etapib_Duty'=>$C,
        'etapib_Vat'=>$D,
        'etapib_Tax'=>$E,
        'etapib_CIF_2'=>$G,
        'etapib_Duty_2'=>$H,
        'etapib_Vat_2'=>$I,
        'etapib_Tax_2'=>$J,
        'etapib_estimasi'=>$K,
        'etapib_aktual_pembulatan'=>$actual,
        'etapib_create_month'=>M,
        'etapib_create_years'=>Y,
        'etapib_createdAt'=>NOW,
        'etapib_createdBy'=>$UserId,
        'etapib_stats'=>'1',
    );


    $insert=$this->MEta->insert_master_eta($data);

    if($insert){
            $this->session->set_flashdata('success','Data Berhasil Ditambah');
            redirect('ETA');
    }else{
            $this->session->set_flashdata('warns','Data Process Failed');
            redirect('ETA');
    }

}


public function edit_master_eta()
{
    $etapib_id=$this->input->post('etapib_id');

    $data['rows_eta']=$this->MEta->getrows_master_eta($etapib_id);
    $data['ls_shipper']=$this->MEta->getshipper_master();

    $this->load->view('ETA/V_Edit',$data);
}


public function submit_edit_data()
{
    $params1=$this->input->post('etapib_id');
    $stats=$this->input->post('status');
    $UserId=$this->session->userdata('logged_gexp_in')->user_userid;
    $shipper=$this->input->post('shipper');
    $input_po_no=$this->input->post('input_po_no');
    $input_consignee=$this->input->post('input_consignee');
    $input_commodity=$this->input->post('input_commodity');
    $bl_no=$this->input->post('bl_no');
    $pol=$this->input->post('pol');
    $pod=$this->input->post('pod');
    $etd=$this->input->post('etd');
    $eta=$this->input->post('eta');
    $pib_aju=$this->input->post('pib_aju');
    $A=$this->input->post('A');
    $B=$this->input->post('B');
    $C=$this->input->post('C');
    $D=$this->input->post('D');
    $E=$this->input->post('E');
    $G=$this->input->post('G');
    $H=$this->input->post('H');
    $I=$this->input->post('I');
    $J=$this->input->post('J');
    $K=$this->input->post('K');
    $actual=$this->input->post('actual');


    $data=array(
        'etapib_shipper'=>$shipper,
        'etapib_po'=>$input_po_no,
        'etapib_consignee'=>$input_consignee,
        'etapib_commodity'=>$input_commodity,
        'etapib_BL_no'=>$bl_no,
        'etapib_pol'=>$pol,
        'etapib_pod'=>$pod,
        'etapib_etd'=>$etd,
        'etapib_eta'=>$eta,
        'etapib_pib_aju'=>$pib_aju,
        'etapib_currency'=>$A,
        'etapib_CIF'=>$B,
        'etapib_Duty'=>$C,
        'etapib_Vat'=>$D,
        'etapib_Tax'=>$E,
        'etapib_CIF_2'=>$G,
        'etapib_Duty_2'=>$H,
        'etapib_Vat_2'=>$I,
        'etapib_Tax_2'=>$J,
        'etapib_estimasi'=>$K,
        'etapib_aktual_pembulatan'=>$actual,
        'etapib_create_month'=>M,
        'etapib_create_years'=>Y,
        'etapib_createdAt'=>NOW,
        'etapib_createdBy'=>$UserId,
        'etapib_stats'=>$stats,
    );


    $update=$this->MEta->update_eta_byid($data, $params1);

    if($update){
            $this->session->set_flashdata('success','Data Berhasil Diupdated');
            redirect('ETA');
    }else{
            $this->session->set_flashdata('warns','Data Process Failed');
            redirect('ETA');
    }

}


public function submit_delete_data()
{

    $params1=$this->input->post('etapib_id');
    $UserId=$this->session->userdata('logged_gexp_in')->user_userid;

    $data=array(
        'etapib_stats' => "3",
        'etapib_updatedAt' => NOW,
        'etapib_updatedBy' => $UserId,
    );

    $update=$this->MEta->update_eta_byid($data, $params1);

    if($update){
            $this->session->set_flashdata('success','Data Berhasil Dihapus');
            redirect('ETA');
    }else{
            $this->session->set_flashdata('warns','Data Process Failed');
            redirect('ETA');
    }

}

public function export_excel_eta()
{
    header('Content-Type:application/vnd-ms-excel');
    header("Content-Disposition: attachment; filename=Data_Document_ETA.xls");
    
    $data['ls_master_eta']=$this->MEta->Getall_master_eta();
    $this->load->view('ETA/export', $data);
}

public function export_excel_eta_bysearch()
{
    header('Content-Type:application/vnd-ms-excel');
    header("Content-Disposition: attachment; filename=Data_Document_ETA.xls");

    $shipper=$this->input->post('shipper');
    $po_no=$this->input->post('po_no');
    $etd=$this->input->post('etd');
    $eta=$this->input->post('eta');
    
    $data['ls_master_eta']=$this->MEta->Getall_master_eta_bysearch($shipper,$po_no,$etd,$eta);
    $this->load->view('ETA/exportbysearch', $data);
}


public function get_filter_search()
{

    $shipper=$this->input->post('shipper');
    $po_no=$this->input->post('po_no');
    $etd=$this->input->post('etd');
    $eta=$this->input->post('eta');

    $data['searchbydata']=$this->MEta->get_filter_data($shipper,$po_no,$etd,$eta);
    $data['shipper']=$shipper;
    $data['po_no']=$po_no;
    $data['etd']=$etd;
    $data['eta']=$eta;

    $this->load->view('ETA/V_Search', $data);
    // print_r($data);

}


}