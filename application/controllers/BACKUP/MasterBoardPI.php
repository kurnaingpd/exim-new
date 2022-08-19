<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MasterBoardPI extends CI_Controller {

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

}

public function index(){

    $UserId=$this->session->userdata('logged_gexp_in')->UsersId;
    $DataUsers=$this->MLogin->GetProfileSign($UserId);
    $GroupMenu=$DataUsers->UserGroup;
    $data['menusign']=$this->MLogin->GetMasterMenuSign($GroupMenu);

    $data['listdataPI']=$this->MBoardPI->GetList_PI();
    $data['groupname']=$this->MLogin->GetGroupName($UserId);
    // $data['lsmasterusers']=$this->MUser->getlistusers();
    // $data['grouplisting']=$this->MUser->getlistgroup();
    // $data['lsmasteruser'] =$this->MUser->getlistusers();

	$this->load->view('MasterPI/VList',$data);

}


public function SearchPI()
{
    $UserId=$this->session->userdata('logged_gexp_in')->UsersId;
    $DataUsers=$this->MLogin->GetProfileSign($UserId);
    $GroupMenu=$DataUsers->UserGroup;
    $data['menusign']=$this->MLogin->GetMasterMenuSign($GroupMenu);

    $pi_no=$this->input->post('pi_no');
    $dat_st=$this->input->post('dat_start');
    $dat_end=$this->input->post('dat_end');
    $pi_cust=$this->input->post('pi_cust');
    $pi_country=$this->input->post('pi_country');
    $pi_pic=$this->input->post('pi_pic');

    $data['listdataPI']=$this->MBoardPI->getsearchPI($pi_no,$dat_st,$dat_end,$pi_cust,$pi_country,$pi_pic);
    $data['groupname']=$this->MLogin->GetGroupName($UserId);

    $this->load->view('MasterPI/VSearch',$data);
}

public function CreateNew()
{
    $UserId=$this->session->userdata('logged_gexp_in')->UsersId;

    $data['groupname']=$this->MLogin->GetGroupName($UserId);

    $DataUsers=$this->MLogin->GetProfileSign($UserId);
    $GroupMenu=$DataUsers->UserGroup;
    $data['menusign']=$this->MLogin->GetMasterMenuSign($GroupMenu);
    $data['listcustomer']=$this->MBoardPI->GetCustomerList();
    $data['listbeneficiary']=$this->MBoardPI->GetList_Beneficiary();
    $data['loadingport']=$this->MBoardPI->GetList_LoadPort();
    $data['listcontainer']=$this->MBoardPI->GetList_Container();
    $data['listbank']=$this->MBoardPI->GetList_Bank();
    $data['currency']=$this->MBoardPI->currency();
    $data['datenow']=Tanggal;
    $data['m']=M;
    $data['y']=Y;
    $lastPI=$this->MBoardPI->GetLastPI_No();
    if($lastPI==null){
        $data['noticket']="0001";
    }else{
        $LastNoPI=$lastPI->gexp_pi_no;
        $nourut = (int) substr($LastNoPI, 3, 1);
        $nourut++;
        $pi=sprintf("%04s",$nourut);
        $data['noticket']=$pi;
    }

    $this->load->view('MasterPI/CreateNew',$data);
}

public function InsertCreateNew()
{
    $UserId=$this->session->userdata('logged_gexp_in')->UsersId;
    $pi_number=$this->input->post('pi_number');
    $pi_date=$this->input->post('pi_date');
    $pi_po=$this->input->post('pi_po');
    $input_customer_id=$this->input->post('input_customer_id');
    $input_company_consig=$this->input->post('input_company_consig');
    $input_company_bene=$this->input->post('input_company_bene');
    $loadport=$this->input->post('loadport');
    $container=$this->input->post('container');
    $input_container_numb=$this->input->post('input_container_numb');
    $input_freightcomp=$this->input->post('input_freightcomp');
    $input_freightcomp_contact=$this->input->post('input_freightcomp_contact');
    $input_freightcomp_numb=$this->input->post('input_freightcomp_numb');
    $input_freightcost=$this->input->post('input_freightcost');
    $input_insurance=$this->input->post('input_insurance');
    $input_bank=$this->input->post('input_bank');
    $input_currency=$this->input->post('input_currency');
    $ppn=$this->input->post('ppn');



    $data=array(
        'gexp_pi_no'=>$pi_number,
        'gexp_pi_po'=>$pi_po,
        'gexp_pi_customer'=>$input_customer_id,
        'gexp_pi_consignee_id'=>$input_company_consig,
        'gexp_pi_beneficiary_id'=>$input_company_bene,
        'gexp_pi_loadport_id'=>$loadport,
        'gexp_pi_dischargeport_id'=>"-",
        'gexp_pi_destinatport_id'=>"-",
        'gexp_pi_container'=>$container,
        'gexp_pi_number_container'=>$input_container_numb,
        'gexp_pi_freight_company'=>$input_freightcomp,
        'gexp_pi_freight_compcontact'=>$input_freightcomp_contact,
        'gexp_pi_freight_compnumber'=>$input_freightcomp_numb,
        'gexp_pi_freight_cost'=>$input_freightcost,
        'gexp_pi_insurance'=>$input_insurance,
        'gexp_pi_bank'=>$input_bank,
        'gexp_pi_currency'=>$input_currency,
        'gexp_pi_ppn'=>$ppn,
        'gexp_pi_date'=>$pi_date,
        'gexp_pi_month'=>M,
        'gexp_pi_years'=>Y,
        'gexp_pi_statusPI'=>"4",
        'gexp_pi_createdAt'=>NOW,
        'gexp_pi_createdBy'=>$UserId,
    );

    $insert=$this->MBoardPI->tambah_pi($data);

    redirect('MasterBoardPI');

}


public function edit_master_pi($ID_PI)
{
    $UserId=$this->session->userdata('logged_gexp_in')->UsersId;

    $data['groupname']=$this->MLogin->GetGroupName($UserId);

    $DataUsers=$this->MLogin->GetProfileSign($UserId);
    $GroupMenu=$DataUsers->UserGroup;
    $data['menusign']=$this->MLogin->GetMasterMenuSign($GroupMenu);
    $data['listcustomer']=$this->MBoardPI->GetCustomerList();
    $data['listbeneficiary']=$this->MBoardPI->GetList_Beneficiary();
    $data['loadingport']=$this->MBoardPI->GetList_LoadPort();
    $data['listcontainer']=$this->MBoardPI->GetList_Container();
    $data['listbank']=$this->MBoardPI->GetList_Bank();
    $data['currency']=$this->MBoardPI->currency();
    $data['datenow']=Tanggal;
    $data['m']=M;
    $data['y']=Y;

    $data['rowsgetpi']=$this->MBoardPI->GetRowList_PI_byId($ID_PI);
    
    // print_r($lastPI);
    $this->load->view('MasterPI/V_EditMasterPI',$data);
}

public function SubmitUpdatePI()
{

    $pi_id=$this->input->post('pi_id');

    $UserId=$this->session->userdata('logged_gexp_in')->UsersId;
    // $pi_number=$this->input->post('pi_number');
    // $pi_date=$this->input->post('pi_date');
    // $pi_po=$this->input->post('pi_po');
    $input_customer_id=$this->input->post('input_customer_id');
    $input_company_consig=$this->input->post('input_company_consig');
    $input_company_bene=$this->input->post('input_company_bene');
    $loadport=$this->input->post('loadport');
    $container=$this->input->post('container');
    $input_container_numb=$this->input->post('input_container_numb');
    $input_freightcomp=$this->input->post('input_freightcomp');
    $input_freightcomp_contact=$this->input->post('input_freightcomp_contact');
    $input_freightcomp_numb=$this->input->post('input_freightcomp_numb');
    $input_freightcost=$this->input->post('input_freightcost');
    $input_insurance=$this->input->post('input_insurance');
    $input_bank=$this->input->post('input_bank');
    $input_currency=$this->input->post('input_currency');
    $ppn=$this->input->post('ppn');

    $data=array(
        // 'gexp_pi_no'=>$pi_number,
        // 'gexp_pi_po'=>$pi_po,
        'gexp_pi_customer'=>$input_customer_id,
        'gexp_pi_consignee_id'=>$input_company_consig,
        'gexp_pi_beneficiary_id'=>$input_company_bene,
        'gexp_pi_loadport_id'=>$loadport,
        'gexp_pi_dischargeport_id'=>"-",
        'gexp_pi_destinatport_id'=>"-",
        'gexp_pi_container'=>$container,
        'gexp_pi_number_container'=>$input_container_numb,
        'gexp_pi_freight_company'=>$input_freightcomp,
        'gexp_pi_freight_compcontact'=>$input_freightcomp_contact,
        'gexp_pi_freight_compnumber'=>$input_freightcomp_numb,
        'gexp_pi_freight_cost'=>$input_freightcost,
        'gexp_pi_insurance'=>$input_insurance,
        'gexp_pi_bank'=>$input_bank,
        'gexp_pi_currency'=>$input_currency,
        'gexp_pi_ppn'=>$ppn,
        // 'gexp_pi_date'=>$pi_date,
        // 'gexp_pi_month'=>M,
        // 'gexp_pi_years'=>Y,
        'gexp_pi_statusPI'=>"4",
        'gexp_pi_updatedAt'=>NOW,
        'gexp_pi_updatedBy'=>$UserId,
        // 'gexp_pi_statusPI'=>$pi_number,
    );


    $update_pi=$this->MBoardPI->update_pi($data, $pi_id);

    redirect('MasterBoardPI/');

}

public function get_hierarchy_national_grup(){
    $this->load->model('mcustomer');
    $dat         		= array();
    $national_grup     	= $this->input->post("post_data");
    $data              	= $this->mcustomer->get_hierarchy_national_grup($national_grup);
    
    $dat['CHANNEL'] 			= $data['Channel'];
    $dat['OUTLET_CATEGORY'] 	= $data['Outlet_Category'];
    $dat['OUTLET_TYPE']			= $data['Outlet_Type'];
    $dat['OUTLET_CLASS']		= $data['Outlet_Class'];

    print_r(json_encode($dat));
}


public function get_hierarchy_customer(){
    $this->load->model('MBoardPI');
    $dat         		= array();
    $customer_id    	= $this->input->post("post_data");
    $data              	= $this->MBoardPI->get_hierarchy_customer($customer_id);
    
    $dat['CustCompanyName'] 	= $data['CustCompanyName'];
    $dat['CustAddress'] 	    = $data['CustAddress'];
    $dat['CountryCode'] 	    = $data['CountryCode'];
    $dat['CountryName'] 	    = $data['CountryName'];
    $dat['CountryPhone'] 	    = $data['CtPhone'];
    $dat['CtConsName'] 	        = $data['CtName'];
    $dat['DischargePort'] 	    = $data['DischargePort'];
    $dat['DestinationPort'] 	= $data['DestinationPort'];
    $dat['TopDesc'] 	        = $data['TopDesc'];
    $dat['ShipportId'] 	        = $data['ShipportId'];
    $dat['freight_company'] 	= $data['freight_company'];
    $dat['freight_company_contact'] 	= $data['freight_company_contact'];
    $dat['freight_company_number'] 	= $data['freight_company_number'];
    // $dat['OUTLET_CATEGORY'] 	= $data['Outlet_Category'];
    // $dat['OUTLET_TYPE']		= $data['Outlet_Type'];
    // $dat['OUTLET_CLASS']		= $data['Outlet_Class'];

    print_r(json_encode($dat));
}


public function get_hierarchy_ports(){
    // $this->load->model('mpersonil');
    $this->load->model('MBoardPI');
    $array_data         = array();
    $customer_id    	= $this->input->post("post_data");
    $query              = $this->MBoardPI->get_hierarchy_ports_cust($customer_id);
    
    foreach($query as $a => $data):
        $dat['ShipportId'] 	        = $data['ShipportId'];
        // $dat['Shipport_Id'] 		= $data['Shipport_Id'];
        $dat['DischargePort'] 	    = $data['DischargePort'];
        $dat['DestinationPort'] 	= $data['DestinationPort'];
        array_push($array_data,$dat);
    endforeach;

    print_r(json_encode($array_data));
}


public function get_hierarchy_destports(){
    // $this->load->model('mpersonil');
    $this->load->model('MBoardPI');
    $array_data         = array();
    $customer_id    	= $this->input->post("post_data");
    $query              = $this->MBoardPI->get_hierarchy_ports_cust($customer_id);
    
    foreach($query as $a => $data):
        $dat['ShipportId'] 	        = $data['ShipportId'];
        // $dat['Shipport_Id'] 		= $data['Shipport_Id'];
        $dat['DischargePort'] 	    = $data['DischargePort'];
        $dat['DestinationPort'] 	= $data['DestinationPort'];
        array_push($array_data,$dat);
    endforeach;

    print_r(json_encode($array_data));
}


public function get_hierarchy_company(){
    $this->load->model('MBoardPI');
    $dat         		= array();
    $company_id    	    = $this->input->post("post_data");
    $data              	= $this->MBoardPI->get_hierarchy_company($company_id);
    
    $dat['CustCompanyName'] 	= $data['CustCompanyName'];
    $dat['CustAddress'] 	    = $data['CustAddress'];
    $dat['CountryCode'] 	    = $data['CountryCode'];
    $dat['CountryName'] 	    = $data['CountryName'];
    $dat['CountryPhone'] 	    = $data['CtPhone'];
    $dat['CountryPhone'] 	    = $data['CtPhone'];
    // $dat['OUTLET_CATEGORY'] 	= $data['Outlet_Category'];
    // $dat['OUTLET_TYPE']		= $data['Outlet_Type'];
    // $dat['OUTLET_CLASS']		= $data['Outlet_Class'];

    print_r(json_encode($dat));
}



public function getitemdet_qc(){
    $this->load->model('MBoardPI');
    $dat         		= array();
    $product_id    	    = $this->input->post("post_data");
    $data              	= $this->MCoa->getitemdet_qc($product_id);
    
    $dat['ProductionDate'] 	= $data['gexp_qc_production_date'];
    // $dat['CustAddress'] 	    = $data['CustAddress'];
    // $dat['CountryCode'] 	    = $data['CountryCode'];
    // $dat['CountryName'] 	    = $data['CountryName'];
    // $dat['CountryPhone'] 	    = $data['CtPhone'];
    // $dat['CountryPhone'] 	    = $data['CtPhone'];
    // $dat['OUTLET_CATEGORY'] 	= $data['Outlet_Category'];
    // $dat['OUTLET_TYPE']		= $data['Outlet_Type'];
    // $dat['OUTLET_CLASS']		= $data['Outlet_Class'];

    print_r(json_encode($dat));
}


public function testjquery()
{
    $UserId=$this->session->userdata('logged_gexp_in')->UsersId;
    $DataUsers=$this->MLogin->GetProfileSign($UserId);
    $GroupMenu=$DataUsers->UserGroup;
    $data['menusign']=$this->MLogin->GetMasterMenuSign($GroupMenu);

    $data['listdataPI']=$this->MBoardPI->GetList_PI();
    // $data['groupname']=$this->MLogin->GetGroupName($UserId);
    // $data['lsmasterusers']=$this->MUser->getlistusers();
    // $data['grouplisting']=$this->MUser->getlistgroup();
    // $data['lsmasteruser'] =$this->MUser->getlistusers();
    $data['listcustomer']=$this->MBoardPI->GetCustomerList();

	$this->load->view('MasterPI/TestJquery',$data);
}


public function add_item_pi($Id_PI)
{
    $UserId=$this->session->userdata('logged_gexp_in')->UsersId;
    $DataUsers=$this->MLogin->GetProfileSign($UserId);
    $data['groupname']=$this->MLogin->GetGroupName($UserId);
    $GroupMenu=$DataUsers->UserGroup;
    $data['menusign']=$this->MLogin->GetMasterMenuSign($GroupMenu);

    $data['listdataPI']=$this->MBoardPI->GetList_PI();
    $data['listdataPI_byId']=$this->MBoardPI->GetList_PI_ById($Id_PI);
    $data['listdata_item']=$this->MBoardPI->GetList_Item();
    $data['id_pi']=$Id_PI;

    $data['list_purchasegood']=$this->MBoardPI->GetList_PurchaseGood($Id_PI);
    $data['list_freegood']=$this->MBoardPI->GetList_FreeGood($Id_PI);

    $data['list_item'] = $this->MBoardPI->get_data_item($Id_PI);

	$this->load->view('MasterPI/Add_item_pi',$data);
}


public function get_hierarchy_beneficiary(){
    $this->load->model('MBoardPI');
    $dat         		= array();
    $benef_id    	    = $this->input->post("post_data");
    $data              	= $this->MBoardPI->get_hierarchy_beneficiary($benef_id);
    
    $dat['BeneficiaryName'] 	    = $data['BeneficiaryDesc'];
    $dat['BeneficiaryOffice'] 	    = $data['BeneficiaryOffice'];
    $dat['BeneficiaryAddress'] 	    = $data['BeneficiaryAddr'];
    $dat['BeneficiaryCountryId'] 	= $data['BeneficiaryCountry'];
    $dat['BeneficiaryCountryName'] 	= $data['CountryName'];
    $dat['BeneficiaryCP'] 	        = $data['BeneficiaryCP'];
    $dat['BeneficiaryPhone'] 	    = $data['BeneficiaryPhone'];
    // $dat['CustAddress'] 	    = $data['CustAddress'];
    // $dat['CountryCode'] 	    = $data['CountryCode'];
    // $dat['CountryName'] 	    = $data['CountryName'];
    // $dat['CountryPhone'] 	    = $data['CtPhone'];
    // $dat['CountryPhone'] 	    = $data['CtPhone'];
    // $dat['OUTLET_CATEGORY'] 	= $data['Outlet_Category'];
    // $dat['OUTLET_TYPE']		= $data['Outlet_Type'];
    // $dat['OUTLET_CLASS']		= $data['Outlet_Class'];

    print_r(json_encode($dat));
}

public function deleteitemPI()
{
    $pi_no=$this->input->post('no_pi');
    $itemid=$this->input->post('item_id');

    $this->MBoardPI->delete_item_pi($itemid);

    $pidata=$this->MBoardPI->delete_item_row($pi_no);
    $idpi=$pidata->gexp_pi_id;
    
    redirect('MasterBoardPI/add_item_pi/'.$idpi);

}


// public function save_item_pi()
// {
    // $UserId = $this->session->userdata('logged_gexp_in')->UsersId;
    // $post = $this->input->post();
    // $cek_barang = $this->MBoardPI->check_item($post['pi_no']);
    // $cek_remain = $this->MBoardPI->check_remain_cbm($post['pi_no']);
    // $item = $this->MBoardPI->get_dimention($post['select_items']);
    // $container = $this->MBoardPI->get_container($post['pi_no']);
    // $current_cbm = (((($item->Length * $item->Width * $item->Height) / 1000000000) * $post['qty']));

    // if(empty($cek_barang)) {
        // $remain_cbm = $container->cbm - $current_cbm;
    // } else {
        // $remain_cbm = $cek_remain->currenct_remain_cbm - $current_cbm;
    // }

    // $data = [
        // 'gexp_good_pi_no' => $post['pi_no'],
        // 'gexp_good_item_id' => $post['select_items'],
        // 'gexp_good_hs_code' => $post['hscode'],
        // 'gexp_good_qty' => $post['qty'],
        // 'gexp_good_price' => str_replace(",", "", $post['price']),
        // 'gexp_good_totals' => $post['qty'] * str_replace(",", "", $post['price']),
        // 'currenct_remain_cbm' => $remain_cbm,
        // 'gexp_good_statsid' => $post['required_item'],
        // 'gexp_good_date' => Tanggal,
        // 'gexp_good_createdAt' => NOW,
        // 'gexp_good_createdBy' => $UserId,
        // 'gexp_good_statsrow' => 1,
    // ];
	
	// if($remain_cbm > 0) {
		// if($current_cbm >= $container->cbm) {
			// echo "FALSE";
			// $this->session->set_flashdata('warns','Qty melebihi '.$container->cbm.' CBM');
			// redirect('MasterBoardPI/add_item_pi/'.$post['id_pi']);
		// } elseif($remain_cbm < 0) {
			// echo "FALSE";
			// $this->session->set_flashdata('warns','Qty melebihi '.$container->cbm.' CBM');
			// redirect('MasterBoardPI/add_item_pi/'.$post['id_pi']);
		// } else {
			// if($this->MBoardPI->tambah_items_pi($data)) {
				// echo "TRUE";
				// $this->session->set_flashdata('success','Data Berhasil Di Proses');
				// redirect('MasterBoardPI/add_item_pi/'.$post['id_pi']);
			// } else {
				// echo "FALSE";
				// $this->session->set_flashdata('warns','Mohon Maaf Data Tidak Dapat Di Proses');
				// redirect('MasterBoardPI/add_item_pi/'.$post['id_pi']);
			// }
		// }
	// } else {
		// echo "FALSE";
		// $this->session->set_flashdata('warns','Qty melebihi '.$container->cbm.' CBM');
		// redirect('MasterBoardPI/add_item_pi/'.$post['id_pi']);
	// }
	
// }

public function save_item_pi()
{
    $UserId = $this->session->userdata('logged_gexp_in')->UsersId;
    $post = $this->input->post();
    $cek_barang = $this->MBoardPI->check_item($post['pi_no']);
    $cek_remain = $this->MBoardPI->check_remain_cbm($post['pi_no']);
    $item = $this->MBoardPI->get_dimention($post['select_items']);
    $container = $this->MBoardPI->get_container($post['pi_no']);
    $current_cbm = round(((($item->Length * $item->Width * $item->Height) / 1000000000) * $post['qty']),6);
    $tot_cbm = $this->MBoardPI->get_item_cbm($post['pi_no']);
    $tot_current_cbm = $tot_cbm->current_cbm + $current_cbm;

    if(empty($cek_barang)) {
        $remain_cbm = $container->cbm - $current_cbm;
    } else {
        $remain_cbm = $cek_remain->currenct_remain_cbm - $current_cbm;
    }

    $data = [
        'gexp_good_pi_no' => $post['pi_no'],
        'gexp_good_item_id' => $post['select_items'],
        'gexp_good_hs_code' => $post['hscode'],
        'gexp_good_qty' => $post['qty'],
        'gexp_good_price' => str_replace(",", "", $post['price']),
        'gexp_good_totals' => $post['qty'] * str_replace(",", "", $post['price']),
        'current_cbm' => $current_cbm,
        'currenct_remain_cbm' => $remain_cbm,
        'gexp_good_statsid' => $post['required_item'],
        'gexp_good_date' => Tanggal,
        'gexp_good_createdAt' => NOW,
        'gexp_good_createdBy' => $UserId,
        'gexp_good_statsrow' => 1,
    ];

    if($tot_current_cbm > $container->cbm) {
        echo "FALSE";
        $this->session->set_flashdata('warns','Qty melebihi '.$container->cbm.' CBM');
        redirect('MasterBoardPI/add_item_pi/'.$post['id_pi']);
    } else {
        if($this->MBoardPI->tambah_items_pi($data)) {
            echo "TRUE";
            $this->session->set_flashdata('success','Data Berhasil Di Proses');
            redirect('MasterBoardPI/add_item_pi/'.$post['id_pi']);
        } else {
            echo "FALSE";
            $this->session->set_flashdata('warns','Mohon Maaf Data Tidak Dapat Di Proses');
            redirect('MasterBoardPI/add_item_pi/'.$post['id_pi']);
        }
    }
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

    $this->load->view('MasterPI/Preview_PI',$data);

}

public function submitPI_byid($Id_PI)
{
    $UserId=$this->session->userdata('logged_gexp_in')->UsersId;

    $data=array(
        'gexp_pi_statusPI'=>"3",
        'gexp_pi_onSubmit'=>"1",
        'gexp_pi_Submit_Date'=>NOW,
        'gexp_pi_submit_by'=>$UserId,
    );

    $this->MBoardPI->update_approved($data, $Id_PI);
    redirect('MasterBoardPI/');
}


}