<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DocImport extends CI_Controller {

function __construct(){
    parent:: __construct();
    
    if(!$this->session->userdata('logged_gexp_in')){
        redirect('LoginImport/doLogout');
    }
        $this->load->model('MAdministrator');
        $this->load->model('MDocim');
        // $this->load->model('MLogin');
}

public function index(){

    // $UserId=$this->session->userdata('logged_gexp_in')->user_userid;
    // $data['userprofile']=$this->MAdministrator->GetProfileSign($UserId);
    // $GroupMenu=$DataUsers->UserGroup;
    // $data['menusign']=$this->MLogin->GetMasterMenuSign($GroupMenu);
    // $data['groupname']=$this->MLogin->GetGroupName($UserId);
    $data['ls_master_docim']=$this->MDocim->Getall_master_docim();

    $data['lkp_data']=$this->MDocim->Getlookup_docim();
    $data['lkp_data_pengirim']=$this->MDocim->Getlookup_docim_pengirim();
    $data['lkp_data_forwarder']=$this->MDocim->Getlookup_docim_forwarder();
    $data['lkp_data_cat']=$this->MDocim->Getlookup_docim_cat();

	$this->load->view('DocImport/V_Docimport', $data);

}


public function tambah_data()
{
    $data['ls_master_category']=$this->MDocim->Getall_master_category();
    $data['ls_master_incoterm']=$this->MDocim->Getall_master_incoterm();
    $data['ls_master_uom']=$this->MDocim->Getall_master_uom();
	$data['ls_master_consignee']=$this->MDocim->Getall_master_consignee();

    $this->load->view('DocImport/V_Tambah',$data);
}

public function submit_tambah_data()
{

    $UserId=$this->session->userdata('logged_gexp_in')->user_id;
    $po=$this->input->post('po');
    $shipnum=$this->input->post('shipnum');
    $pengirim=$this->input->post('pengirim');
    $penjual=$this->input->post('penjual');
    $consignee=$this->input->post('consignee');
    $comodity=$this->input->post('comodity');
    $category=$this->input->post('category');
    $hs_code=$this->input->post('hs_code');
    $lartas=$this->input->post('lartas');
    $term=$this->input->post('term');
    $hbl=$this->input->post('hbl');
    $mbl=$this->input->post('mbl');
    $qty_container=$this->input->post('qty_container');
    $container_num=$this->input->post('container_num');
    $good_qty=($this->input->post('good_qty')?$this->input->post('good_qty'):0);
    $good_uom=$this->input->post('good_uom');
    $gw=$this->input->post('gw');
    $nw=$this->input->post('nw');
    $cbm=$this->input->post('cbm');
    $pol=$this->input->post('pol');
    $pod=$this->input->post('pod');
    $etd=$this->input->post('etd');
    $eta=($this->input->post('eta')?$this->input->post('eta'):NULL);
    $pib_aju=$this->input->post('pib_aju');
    $coo=$this->input->post('coo');
    $masterlist=$this->input->post('masterlist');
    $rcvd=$this->input->post('rcvd');
    $billing=$this->input->post('billing');
    $spjm=$this->input->post('spjm');
    $spjk=$this->input->post('spjk');
    $sppb=$this->input->post('sppb');
    $pickup_do=$this->input->post('pickup_do');
    $delivery=($this->input->post('delivery')?$this->input->post('delivery'):NULL);
    $remarks=$this->input->post('remarks');
    $currency=$this->input->post('currency');
    $cif=$this->input->post('cif');
    $duty=$this->input->post('duty');
    $vat=$this->input->post('vat');
    $tax=$this->input->post('tax');
    $freight=$this->input->post('freight');
    $handling=$this->input->post('handling');
    $atcost=$this->input->post('atcost');
    $additional=$this->input->post('additional');
    $lead_time=$this->input->post('lead_time');
    $time=$this->input->post('time');
    $percent1=$this->input->post('percent1');
    // $cif_2=$this->input->post('cif_2');
    // $landed_cost=$this->input->post('landed_cost');
    // $percent2=round($landed_cost/$cif_2,0);
	
	$cif_2=($this->input->post('cif_2')?$this->input->post('cif_2'):0);
    $landed_cost=($this->input->post('landed_cost')?$this->input->post('landed_cost'):0);
    if($cif_2 == 0 && $landed_cost == 0) {
        $percent2 = 0;
    } else {
        $percent2=round($landed_cost/$cif_2);
    }
	
    $forwarder=$this->input->post('forwarder');


    $data=array(
        'docim_po' => $po,
        'docim_ship_numbers' => $shipnum,
        'docim_pengirim' => $pengirim,
        'docim_penjual' => $penjual,
        'docim_consignee' => $consignee,
        'docim_commodity' => $comodity,
        'docim_category' => $category,
        'docim_hscode' => $hs_code,
        'docim_lartas' => $lartas,
        'docim_term' => $term,
        'docim_HBL' => $hbl,
        'docim_MBL' => $mbl,
        'docim_qty_container' => $qty_container,
        'docim_no_container' => $container_num,
        'docim_good_qty' => $good_qty,
        'docim_good_uom' => $good_uom,
        'docim_GW' => $gw,
        'docim_NW' => $nw,
        'docim_CBM' => $cbm,
        'docim_POL' => $pol,
        'docim_POD' => $pod,
        'docim_ETD' => $etd,
        'docim_ETA' => $eta,
        'docim_PIB_AJU' => $pib_aju,
        'docim_COO' => $coo,
        'docim_masterlist' => $masterlist,
        'docim_rcvd_oridoc' => $rcvd,
        'docim_billing' => $billing,
        'docim_spjm' => $spjm,
        'docim_spjk' => $spjk,
        'docim_sppb' => $sppb,
        'docim_pickup_do' => $pickup_do,
        'docim_delivery' => $delivery,
        'docim_remarks' => $remarks,
        'docim_currency' => ($currency?$currency:0),
        'docim_CIF' => ($cif?$cif:0),
        'docim_Duty' => ($duty?$duty:0),
        'docim_VAT' => ($vat?$vat:0),
        'docim_TAX' => ($tax?$tax:0),
        'docim_freight' => ($freight?$freight:0),
        'docim_handling' => ($handling?$handling:0),
        'docim_atcost' => ($atcost?$atcost:0),
        'docim_additional' => $additional,
        'docim_leadtime' => $lead_time,
        'docim_time' => $time,
        'docim_percent' => $percent1,
        'docim_cif2' => $cif_2,
        'docim_landed_cost' => $landed_cost,
        'docim_persen' => $percent2,
        'docim_forwarder' => $forwarder,
        // 'docim_stats' => "1",
        'docim_createdAt' => NOW,
        'docim_createdBy' => $UserId,
        'docim_created_month' => M,
        'docim_created_years' => Y,
    );

    $insert=$this->MDocim->insert_master_docim($data);

    if($insert){
            $this->session->set_flashdata('success','Data Berhasil Ditambah');
            redirect('DocImport');
    }else{
            $this->session->set_flashdata('warns','Data Process Failed');
            redirect('DocImport');
    }


}

public function edit_master_docim()
{
    $docim_id=$this->input->post('docim_id');
    $data['ls_master_category']=$this->MDocim->Getall_master_category();
    $data['ls_master_incoterm']=$this->MDocim->Getall_master_incoterm();
    $data['rows_docim']=$this->MDocim->getrows_master_docim($docim_id);
    $data['ls_master_uom']=$this->MDocim->Getall_master_uom();

    // print_r($data);
    // print_r($docim_id);
    $this->load->view('DocImport/V_Edit',$data);
}


public function submit_edit_data()
{

    $params1=$this->input->post('docim_id');
    $stats=$this->input->post('status');
    $UserId=$this->session->userdata('logged_gexp_in')->user_id;
    $po=$this->input->post('po');
    $shipnum=$this->input->post('shipnum');
    $pengirim=$this->input->post('pengirim');
    $penjual=$this->input->post('penjual');
    $consignee=$this->input->post('consignee');
    $comodity=$this->input->post('comodity');
    $category=$this->input->post('category');
    $hs_code=$this->input->post('hs_code');
    $lartas=$this->input->post('lartas');
    $term=$this->input->post('term');
    $hbl=$this->input->post('hbl');
    $mbl=$this->input->post('mbl');
    $qty_container=$this->input->post('qty_container');
    $container_num=$this->input->post('container_num');
    $good_qty=$this->input->post('good_qty');
    $good_uom=$this->input->post('good_uom');
    $gw=$this->input->post('gw');
    $nw=$this->input->post('nw');
    $cbm=$this->input->post('cbm');
    $pol=$this->input->post('pol');
    $pod=$this->input->post('pod');
    $etd=$this->input->post('etd');
    $eta=$this->input->post('eta');
    $pib_aju=$this->input->post('pib_aju');
    $coo=$this->input->post('coo');
    $masterlist=$this->input->post('masterlist');
    $rcvd=$this->input->post('rcvd');
    $billing=$this->input->post('billing');
    $spjm=$this->input->post('spjm');
    $spjk=$this->input->post('spjk');
    $sppb=$this->input->post('sppb');
    $pickup_do=$this->input->post('pickup_do');
    $delivery=$this->input->post('delivery');
    $remarks=$this->input->post('remarks');
    $currency=$this->input->post('currency');
    $cif=$this->input->post('cif');
    $duty=$this->input->post('duty');
    $vat=$this->input->post('vat');
    $tax=$this->input->post('tax');
    $freight=$this->input->post('freight');
    $handling=$this->input->post('handling');
    $atcost=$this->input->post('atcost');
    $additional=$this->input->post('additional');
    $lead_time=$this->input->post('lead_time');
    $time=$this->input->post('time');
    $percent1=$this->input->post('percent1');
    $cif_2=$this->input->post('cif_2');
    $landed_cost=$this->input->post('landed_cost');
    $percent2=round($landed_cost/$cif_2,0);
    $forwarder=$this->input->post('forwarder');


    $data=array(
        'docim_po' => $po,
        'docim_ship_numbers' => $shipnum,
        'docim_pengirim' => $pengirim,
        'docim_penjual' => $penjual,
        'docim_consignee' => $consignee,
        'docim_commodity' => $comodity,
        'docim_category' => $category,
        'docim_hscode' => $hs_code,
        'docim_lartas' => $lartas,
        'docim_term' => $term,
        'docim_HBL' => $hbl,
        'docim_MBL' => $mbl,
        'docim_qty_container' => $qty_container,
        'docim_no_container' => $container_num,
        'docim_good_qty' => $good_qty,
        'docim_good_uom' => $good_uom,
        'docim_GW' => $gw,
        'docim_NW' => $nw,
        'docim_CBM' => $cbm,
        'docim_POL' => $pol,
        'docim_POD' => $pod,
        'docim_ETD' => $etd,
        'docim_ETA' => $eta,
        'docim_PIB_AJU' => $pib_aju,
        'docim_COO' => $coo,
        'docim_masterlist' => $masterlist,
        'docim_rcvd_oridoc' => $rcvd,
        'docim_billing' => $billing,
        'docim_spjm' => $spjm,
        'docim_spjk' => $spjk,
        'docim_sppb' => $sppb,
        'docim_pickup_do' => $pickup_do,
        'docim_delivery' => $delivery,
        'docim_remarks' => $remarks,
        'docim_currency' => $currency,
        'docim_CIF' => $cif,
        'docim_Duty' => $duty,
        'docim_VAT' => $vat,
        'docim_TAX' => $tax,
        'docim_freight' => $freight,
        'docim_handling' => $handling,
        'docim_atcost' => $atcost,
        'docim_additional' => $additional,
        'docim_leadtime' => $lead_time,
        'docim_time' => $time,
        'docim_percent' => $percent1,
        'docim_cif2' => $cif_2,
        'docim_landed_cost' => $landed_cost,
        'docim_persen' => $percent2,
        'docim_forwarder' => $forwarder,
        'docim_stats' => $stats,
        'docim_updatedAt' => NOW,
        'docim_updatedBy' => $UserId,
    );

    $update=$this->MDocim->update_docim_byid($data, $params1);

    if($update){
            $this->session->set_flashdata('success','Data Berhasil Diupdated');
            redirect('DocImport');
    }else{
            $this->session->set_flashdata('warns','Data Process Failed');
            redirect('DocImport');
    }


}


public function submit_delete_data()
{

    $params1=$this->input->post('docim_id');
    $UserId=$this->session->userdata('logged_gexp_in')->user_id;

    $data=array(
        'docim_stats' => "3",
        'docim_updatedAt' => NOW,
        'docim_updatedBy' => $UserId,
    );

    $update=$this->MDocim->update_docim_byid($data, $params1);

    if($update){
            $this->session->set_flashdata('success','Data Berhasil Dihapus');
            redirect('DocImport');
    }else{
            $this->session->set_flashdata('warns','Data Process Failed');
            redirect('DocImport');
    }

}


public function export_excel_docim()
{
    header('Content-Type:application/vnd-ms-excel');
    header("Content-Disposition: attachment; filename=Data_Document_Import.xls");

    // $po=$this->input->post('po');
    // $start_deliv=$this->input->post('start_deliv');
    // $end_deliv=$this->input->post('end_deliv');
    // $consig=$this->input->post('consig');
    // $category=$this->input->post('category');
    // $pengirim=$this->input->post('pengirim');
    // $forwarder=$this->input->post('$forwarder');

    // if($start_deliv!='' && $end_deliv!=''){
    //     $data['cek_filter_data']=$this->MDocim->get_filter_docim_byrange($po, $start_deliv, $end_deliv, $consig, $category, $pengirim, $forwarder);
    // }else{
    //     $data['cek_filter_data']=$this->MDocim->get_filter_docim_notrange($po, $start_deliv, $end_deliv, $consig, $category, $pengirim, $forwarder);
    // }
    
    // $data['siswa'] = $this->SiswaModel->view();
    $data['ls_master_docim']=$this->MDocim->Getall_master_docim();
    $this->load->view('DocImport/export', $data);
}

public function export_excel_docim_bysearch()
{
    header('Content-Type:application/vnd-ms-excel');
    header("Content-Disposition: attachment; filename=Data_Document_Import.xls");

    $po=$this->input->post('po');
    $start_deliv=$this->input->post('start_deliv');
    $end_deliv=$this->input->post('end_deliv');
    $consig=$this->input->post('consig');
    $category=$this->input->post('category');
    $pengirim=$this->input->post('pengirim');
    $forwarder=$this->input->post('forwarder');

    if($start_deliv!='' && $end_deliv!=''){
        $data['ls_master_docim']=$this->MDocim->get_filter_docim_byrange($po, $start_deliv, $end_deliv, $consig, $category, $pengirim, $forwarder);
        // header('Content-Type:application/vnd-ms-excel');
        // header("Content-Disposition: attachment; filename=Data_Document_Import.xls");
        // $this->load->view('DocImport/exportbysearch', $data);
        $this->load->view('DocImport/exportbysearch', $data);
    }else{
        $data['ls_master_docim']=$this->MDocim->get_filter_docim_notrange($po, $start_deliv, $end_deliv, $consig, $category, $pengirim, $forwarder);
        // header('Content-Type:application/vnd-ms-excel');
        // header("Content-Disposition: attachment; filename=Data_Document_Import.xls");
        // $this->load->view('DocImport/exportbysearch', $data);
        $this->load->view('DocImport/exportbysearch', $data);
    }
    // header('Content-Type:application/vnd-ms-excel');
    // header("Content-Disposition: attachment; filename=Data_Document_Import.xls");
    // $this->load->view('DocImport/exportbysearch', $data);
}


public function get_filter_search()
{

    $po=$this->input->post('po');
    $start_deliv=$this->input->post('start_deliv');
    $end_deliv=$this->input->post('end_deliv');
    $consig=$this->input->post('consig');
    $category=$this->input->post('category');
    $pengirim=$this->input->post('pengirim');
    $forwarder=$this->input->post('forwarder');

    if($start_deliv!='' && $end_deliv!=''){
        $cek_filter_data=$this->MDocim->get_filter_docim_byrange($po, $start_deliv, $end_deliv, $consig, $category, $pengirim, $forwarder);
    }else{
        $cek_filter_data=$this->MDocim->get_filter_docim_notrange($po, $start_deliv, $end_deliv, $consig, $category, $pengirim, $forwarder);
    }
    // $cek_filter_data=$this->MDocim->get_filter_docim($po, $start_deliv, $end_deliv, $consig, $category, $pengirim, $forwarder);

    $data['lkp_data']=$this->MDocim->Getlookup_docim();
    $data['lkp_data_cat']=$this->MDocim->Getlookup_docim_cat();
    $data['lkp_data_pengirim']=$this->MDocim->Getlookup_docim_pengirim();
    $data['lkp_data_forwarder']=$this->MDocim->Getlookup_docim_forwarder();
    
    if($start_deliv!='' && $end_deliv!=''){
        $data['cek_filter_data']=$this->MDocim->get_filter_docim_byrange($po, $start_deliv, $end_deliv, $consig, $category, $pengirim, $forwarder);
    }else{
        $data['cek_filter_data']=$this->MDocim->get_filter_docim_notrange($po, $start_deliv, $end_deliv, $consig, $category, $pengirim, $forwarder);
    }

    $data['po']=$po;

    if(!empty($start_deliv && $end_deliv)){
        $data['start_deliv']=$start_deliv;
        $data['end_deliv']=$end_deliv;
    }else{
        $data['start_deliv']="";
        $data['end_deliv']="";
    }

    $data['consig']=$consig;

    $valcategory=$this->MDocim->getvalue_cat($category);
    if(!empty($valcategory)){
        $data['category']=$valcategory->mt_categori_name;
    }else{
        $data['category']=$category;
    }
    // $data['category']=$valcategory->mt_categori_name;
    $data['pengirim']=$pengirim;
    $data['forwarder']=$forwarder;
    

    $this->load->view('DocImport/V_search',$data);

}




}