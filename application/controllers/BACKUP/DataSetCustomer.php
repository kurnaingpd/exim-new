<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataSetCustomer extends CI_Controller {

function __construct(){
    parent:: __construct();
    
if(!$this->session->userdata('logged_gexp_in')){
    redirect('LoginSys/doLogout');
}
    $this->load->model('MRoot');
    $this->load->model('MLogin');
    $this->load->model('MMenu');
    $this->load->model('MSetCountry');
    $this->load->model('MSetCustomer');
    $this->load->model('MSetInco');
    $this->load->model('MSetTop');
}

public function index(){

    $UserId                     =$this->session->userdata('logged_gexp_in')->UsersId;
    $DataUsers                  =$this->MLogin->GetProfileSign($UserId);
    $GroupMenu                  =$DataUsers->UserGroup;
    $data['menusign']           =$this->MLogin->GetMasterMenuSign($GroupMenu);
    $data['lsmastermenus']      =$this->MMenu->GetListMasterMenu();
    $data['lsmastercustomer']   =$this->MSetCustomer->GetListMasterCustomer();
    $data['lsmastercountry']    =$this->MSetCountry->GetListMasterCountry();

    // $data['m']=M;
    // $data['y']=Y;
    // $lastCustomerCode=$this->MSetCustomer->GetLastCust_No();

    // $monthdata=$lastCustomerCode->Cust_gen_Month;
    // $yeardata=$lastCustomerCode->Cust_gen_Year;

    // if($monthdata!=M AND $yeardata!=Y)
    // {   
        // $data['noticket']="0001";
    // }else{
        // if($lastCustomerCode==null){
			// $data['noticket']="0001";
        // }else{
            // $LastNo=$lastCustomerCode->CustCode;
            // $nourut = (int) substr($LastNo, -1, 1);
            // $nourut++;
            // $codecust=sprintf("%04s",$nourut);
            // $data['noticket']=$codecust;
        // }
    // }
	
	// if(empty($lastCustomerCode)) {
		
	// }
    
	$this->load->view('DataSetCustomer/VList',$data);

}

public function createnewcustomer(){

    $post = $this->input->post();
	$country = $this->MSetCustomer->getcountry_byid($post['customercountry']);
	$cust_code = $this->MSetCustomer->CreateCode($country->CountryCode);
	
	// $CustCode               =$this->input->post('customercode');
    // $CustCompName           =$this->input->post('companyname');
    // $CustTown               =$this->input->post('customertown');
    // $CustAddr               =$this->input->post('customeraddress');
    // $CustCountry            =$this->input->post('customercountry');
    // $CustPhone              =$this->input->post('customerphone');
    // $monthdatanow           =M;
    // $yeardata               =Y;

    $getrowscountry=$this->MSetCustomer->getcountry_byid($CustCountry);
    $CodeCountry=$getrowscountry->CountryCode;

    $CheckNameCust          =$this->MSetCustomer->CheckCompName($CustCompName);

    if($CheckNameCust==TRUE){
            echo "<script>alert('Maaf Data Sudah Tersedia')</script>";
    }else{
        $data=array(
                'CustCode'          => $cust_code,
                'CustCompanyName'   => $post['companyname'],
                'CustTown'          => $post['customertown'],
                'CustAddress'       => $post['customeraddress'],
                'CustCountry'       => $post['customercountry'],
                'CustPhone'         => $post['customerphone'],
                'Cust_gen_Date'     => NOW,
                'Cust_gen_Month'    => date('m'),
                'Cust_gen_Year'     => date('Y'),
                'isStatCust'        => "1"
        );

        $insert     =$this->MSetCustomer->tambah_customer($data);

        if($insert){
                    echo "TRUE";
                        $this->session->set_flashdata('success','Data Berhasil Di Proses');
                                redirect('DataSetCustomer');
        }else{
                    echo "FALSE";
                        $this->session->set_flashdata('warns','Mohon Maaf Data Tidak Dapat Di Proses, Koneksi Error');
                                redirect('DataSetCustomer');
        }
    }
}

public function EditMasterCustomer($customer_id)
{

    $UserId                     =$this->session->userdata('logged_gexp_in')->UsersId;
    $DataUsers                  =$this->MLogin->GetProfileSign($UserId);
    $GroupMenu                  =$DataUsers->UserGroup;
    $data['menusign']           =$this->MLogin->GetMasterMenuSign($GroupMenu);
    $data['lsmastermenus']      =$this->MMenu->GetListMasterMenu();
    $data['lsmastercountry']    =$this->MSetCountry->GetListMasterCountry();

    $data['rowscustomer_byid']  =$this->MSetCustomer->getcustomer_byid($customer_id);


    $this->load->view('DataSetCustomer/V_EditMaster',$data);
}

public function save_update_master_customer()
{
    $Customer_id=$this->input->post('customer_id');
    $Customercode=$this->input->post('customercode');
    $CustTown=$this->input->post('customertown');
    $Customeraddress=$this->input->post('customeraddress');
    $Customercountry=$this->input->post('customercountry');
    $Customerphone=$this->input->post('customerphone');
    $companyname=$this->input->post('companyname');
    $customerstatus=$this->input->post('customerstatus');

    $data=array(
        'CustCompanyName'=>$companyname,
        'CustTown'=>$CustTown,
        'CustAddress'=>$Customeraddress,
        'CustCountry'=>$Customercountry,
        'CustPhone'=>$Customerphone,
        'isStatCust'=>$customerstatus,
    );

    $this->MSetCustomer->update_master_customer($Customer_id,$data);

    redirect('DataSetCustomer/');

}

public function AddContactPerson($CustId){

    // echo $CustId;
    $UserId                     =$this->session->userdata('logged_gexp_in')->UsersId;
    $DataUsers                  =$this->MLogin->GetProfileSign($UserId);
    $GroupMenu                  =$DataUsers->UserGroup;
    $data['menusign']           =$this->MLogin->GetMasterMenuSign($GroupMenu);
    // $data['lsmastermenus']      =$this->MMenu->GetListMasterMenu();

    $data['custrow']            =$this->MSetCustomer->GetRowCustomerById($CustId);
    $data['lsmastercontact']    =$this->MSetCustomer->GetListCustContact($CustId);
    $data['lsmastertop']        =$this->MSetTop->GetListMasterTop();
    $data['lsmasterinco']       =$this->MSetInco->GetListMasterInco();

    $this->load->view('DataSetCustomer/V_CPerson',$data);

}


public function EditSub_ContactCust($CtId)
{
    // echo $CustId;
    $UserId                     =$this->session->userdata('logged_gexp_in')->UsersId;
    $DataUsers                  =$this->MLogin->GetProfileSign($UserId);
    $GroupMenu                  =$DataUsers->UserGroup;
    $data['menusign']           =$this->MLogin->GetMasterMenuSign($GroupMenu);
    // $data['lsmastermenus']      =$this->MMenu->GetListMasterMenu();

    // $data['custrow']            =$this->MSetCustomer->GetRowCustomerById($CustId);
    // $data['lsmastercontact']    =$this->MSetCustomer->GetListCustContact($CustId);
    $data['lsmastertop']        =$this->MSetTop->GetListMasterTop();
    $data['lsmasterinco']       =$this->MSetInco->GetListMasterInco();

    $data['rowsmaster_ct']      =$this->MSetCustomer->GetRowsContactCust($CtId);

    $this->load->view('DataSetCustomer/Edit_CPerson',$data);
}


public function save_edit_contactcustomer()
{
    $Ct_id                  =$this->input->post('ct_id');
    $Cust_id                =$this->input->post('cust_id');
    $CtName                 =$this->input->post('ctname');
    $CtPhone                =$this->input->post('ctphone');
    $CtMail                 =$this->input->post('ctmail');
    $CtTop                  =$this->input->post('cttop');
    $CtDp                   =$this->input->post('ctdp');
    $CtBalancing            =$this->input->post('ctbalancing');
    $CtCurrency             =$this->input->post('ctcurrency');
    $CtInco                 =$this->input->post('ctincoterm');

    $data=array(
        // 'CtTicketCustCode' => $CustId,
        'CtName'           => $CtName,
        'CtPhone'          => $CtPhone,
        'CtEmail'          => $CtMail,
        'CtTOP'            => $CtTop,
        'CtDp'             => $CtDp,
        'CtBalancing'      => $CtBalancing,
        'CtCurrency'       => $CtCurrency,
        'CtIncoterm'       => $CtInco
    );

    // $this->MSetCustomer->update_contact_customer($Ct_id,$data);

    // redirect('DataSetCustomer/AddContactPerson/'.$Cust_id);

    if($this->MSetCustomer->update_contact_customer($Ct_id,$data)){
        echo "TRUE";
        $this->session->set_flashdata('success','Data Berhasil Di Proses');
        redirect('DataSetCustomer/AddContactPerson/'.$Cust_id);
    }else{
        echo "FALSE";
        $this->session->set_flashdata('warns','Mohon Maaf Data Tidak Dapat Di Proses');
        redirect('DataSetCustomer/AddContactPerson/'.$Cust_id);
    }

}

public function AddBankAccount($CustId){

    // echo $CustId;
    $UserId                     =$this->session->userdata('logged_gexp_in')->UsersId;
    $DataUsers                  =$this->MLogin->GetProfileSign($UserId);
    $GroupMenu                  =$DataUsers->UserGroup;
    $data['menusign']           =$this->MLogin->GetMasterMenuSign($GroupMenu);
    // $data['lsmastermenus']      =$this->MMenu->GetListMasterMenu();

    $data['custrow']            =$this->MSetCustomer->GetRowCustomerById($CustId);
    $data['lsmastercontact']    =$this->MSetCustomer->GetListCustContact($CustId);
    $data['lsmasterbank']       =$this->MSetCustomer->GetListCustBank($CustId);

    $this->load->view('DataSetCustomer/V_BankAcc',$data);

}


public function EditBankCustomer($BankCustId)
{
    // echo $CustId;
    $UserId                     =$this->session->userdata('logged_gexp_in')->UsersId;
    $DataUsers                  =$this->MLogin->GetProfileSign($UserId);
    $GroupMenu                  =$DataUsers->UserGroup;
    $data['menusign']           =$this->MLogin->GetMasterMenuSign($GroupMenu);
    // $data['lsmastermenus']      =$this->MMenu->GetListMasterMenu();

    // $data['custrow']            =$this->MSetCustomer->GetRowCustomerById($CustId);
    // $data['lsmastercontact']    =$this->MSetCustomer->GetListCustContact($CustId);
    $data['lsmastertop']        =$this->MSetTop->GetListMasterTop();
    $data['lsmasterinco']       =$this->MSetInco->GetListMasterInco();

    $data['rowsmaster_cb']      =$this->MSetCustomer->GetRowsBankCust($BankCustId);

    $this->load->view('DataSetCustomer/Edit_BankAcc',$data);
}

public function save_edit_bankcustomer()
{
    $post = $this->input->post();
    $params = [
        'BankCustAccountName' => $post['bankaccname'],
        'BankCustAccountNo' => $post['bankaccno'],
        'BankCustName' => $post['bankname'],
        'BankCustBranch' => $post['bankbranch'],
        'BankCustAddress' => $post['bankaddrs'],
        'BankCustSwiftCode' => $post['bankswift'],
        'BankCustCode' => $post['bankcode'],
    ];

    if($this->MSetCustomer->update_bank_customer($post['cust_code_id'], $params)){
        echo "TRUE";
        $this->session->set_flashdata('success','Data Berhasil Di Proses');
        redirect('DataSetCustomer/AddBankAccount/'.$post['cust_code_id']);
    }else{
        echo "FALSE";
        $this->session->set_flashdata('warns','Mohon Maaf Data Tidak Dapat Di Proses');
        redirect('DataSetCustomer/AddBankAccount/'.$post['cust_code_id']);
    }
}

public function AddShipperTo($CustId){

    // echo $CustId;
    $UserId                     =$this->session->userdata('logged_gexp_in')->UsersId;
    $DataUsers                  =$this->MLogin->GetProfileSign($UserId);
    $GroupMenu                  =$DataUsers->UserGroup;
    $data['menusign']           =$this->MLogin->GetMasterMenuSign($GroupMenu);
    // $data['lsmastermenus']      =$this->MMenu->GetListMasterMenu();
    $data['custrow']            =$this->MSetCustomer->GetRowCustomerById($CustId);
    $data['lsmastershiperto']   =$this->MSetCustomer->GetListCustShipperto($CustId);

    $this->load->view('DataSetCustomer/V_Shipping',$data);

}

public function AddShipperPort($ShipCodeCust){

    // echo $CustId;
    $UserId                     =$this->session->userdata('logged_gexp_in')->UsersId;
    $DataUsers                  =$this->MLogin->GetProfileSign($UserId);
    $GroupMenu                  =$DataUsers->UserGroup;
    $data['menusign']           =$this->MLogin->GetMasterMenuSign($GroupMenu);
    // $data['lsmastermenus']      =$this->MMenu->GetListMasterMenu();
    // $data['custrow']            =$this->MSetCustomer->GetRowCustomerById($CustId);
    $data['lsmastershiperto']   =$this->MSetCustomer->GetListCustShipperPort($ShipCodeCust);
    $data['shiperrow']          =$this->MSetCustomer->GetListCustShipperCust($ShipCodeCust);

    // print_r($data['shiperrow']);

    $this->load->view('DataSetCustomer/V_Shiperport',$data);

}

public function AddImportDocument($CustId){

    // echo $CustId;
    $UserId                     =$this->session->userdata('logged_gexp_in')->UsersId;
    $DataUsers                  =$this->MLogin->GetProfileSign($UserId);
    $GroupMenu                  =$DataUsers->UserGroup;
    $data['menusign']           =$this->MLogin->GetMasterMenuSign($GroupMenu);
    // $data['lsmastermenus']      =$this->MMenu->GetListMasterMenu();
    $data['custrow']            =$this->MSetCustomer->GetRowCustomerById($CustId);
    $data['lsmasterimportdoc']  =$this->MSetCustomer->GetListImportDoc($CustId);
    // print_r($data['custrow']);

    $this->load->view('DataSetCustomer/V_ImportDoc',$data);

}

public function AddCodingPrinting($CustId){

    // echo $CustId;
    $UserId                           =$this->session->userdata('logged_gexp_in')->UsersId;
    $DataUsers                        =$this->MLogin->GetProfileSign($UserId);
    $GroupMenu                        =$DataUsers->UserGroup;
    $data['menusign']                 =$this->MLogin->GetMasterMenuSign($GroupMenu);
    // $data['lsmastermenus']         =$this->MMenu->GetListMasterMenu();
    $data['custrow']                  =$this->MSetCustomer->GetRowCustomerById($CustId);
    $data['lsmastercodingprint']      =$this->MSetCustomer->GetListCustCodingPrint($CustId);

    $this->load->view('DataSetCustomer/V_CodingPrinting',$data);

}


public function PreviewDetailCust($CustId){

    // echo $CustId;
    $UserId                     =$this->session->userdata('logged_gexp_in')->UsersId;
    $DataUsers                  =$this->MLogin->GetProfileSign($UserId);
    $GroupMenu                  =$DataUsers->UserGroup;
    $data['menusign']           =$this->MLogin->GetMasterMenuSign($GroupMenu);
    // $data['lsmastermenus']      =$this->MMenu->GetListMasterMenu();
    $data['custrow']            =$this->MSetCustomer->GetRowCustomerById($CustId);
    $data['prevcust']           =$this->MSetCustomer->GetRowCustomerPrevById($CustId);

    // print_r($data['prevcust']);

    $this->load->view('DataSetCustomer/V_Prevcust',$data);

}

public function insertcontactcust(){

    $CustId                 =$this->input->post('custid');
    $CtName                 =$this->input->post('ctname');
    $CtPhone                =$this->input->post('ctphone');
    $CtMail                 =$this->input->post('ctmail');
    $CtTop                  =$this->input->post('cttop');
    $CtDp                   =$this->input->post('ctdp');
    $CtBalancing            =$this->input->post('ctbalancing');
    $CtCurrency             =$this->input->post('ctcurrency');
    $CtInco                 =$this->input->post('ctincoterm');

    if($CustId=='' OR $CtName=='' OR $CtPhone=='' OR $CtMail=='' OR $CtTop=='' OR $CtDp=='' OR $CtBalancing=='' OR $CtCurrency=='' OR $CtInco==''){
    
        // echo "FALSE";
        echo "FALSE";
                $this->session->set_flashdata('warns','Mohon Maaf Data Tidak Dapat Di Proses, Koneksi Error');
                        redirect('DataSetCustomer/AddContactPerson/'.$CustId);
    
    }else{

        $data=array(
            'CtTicketCustCode' => $CustId,
            'CtName'           => $CtName,
            'CtPhone'          => $CtPhone,
            'CtEmail'          => $CtMail,
            'CtTOP'            => $CtTop,
            'CtDp'             => $CtDp,
            'CtBalancing'      => $CtBalancing,
            'CtCurrency'       => $CtCurrency,
            'CtIncoterm'       => $CtInco
        );

        $insert=$this->MSetCustomer->tambah_custcontact($data);

        if($insert){
            echo "TRUE";
                $this->session->set_flashdata('success','Data Berhasil Di Proses');
                        redirect('DataSetCustomer/AddContactPerson/'.$CustId);
        }else{
            echo "FALSE";
                $this->session->set_flashdata('warns','Mohon Maaf Data Tidak Dapat Di Proses, Koneksi Error');
                        redirect('DataSetCustomer/AddContactPerson/'.$CustId);
        }


    }

}


public function insertcustomerbank(){

    $CustId                 =$this->input->post('custid');
    $BankAccName            =$this->input->post('bankaccname');
    $BankAccNo              =$this->input->post('bankaccno');
    $BankName               =$this->input->post('bankname');
    $BankBranch             =$this->input->post('bankbranch');
    $BankAddrs              =$this->input->post('bankaddrs');
    $BankSwift              =$this->input->post('bankswift');
    $BankCode               =$this->input->post('bankcode');
    // $CtInco                 =$this->input->post('ctincoterm');

    if($CustId=='' OR $BankAccName=='' OR $BankAccNo=='' OR $BankName=='' OR $BankBranch=='' OR $BankAddrs=='' OR $BankSwift=='' OR $BankCode==''){
    
        // echo "FALSE";
        echo "FALSE";
                $this->session->set_flashdata('warns','Mohon Maaf Data Tidak Dapat Di Proses, Koneksi Error');
                        redirect('DataSetCustomer/AddBankAccount/'.$CustId);
    
    }else{

        $data=array(
            'CustCodeId'             => $CustId,
            'BankCustAccountName'    => $BankAccName,
            'BankCustAccountNo'      => $BankAccNo,
            'BankCustName'           => $BankName,
            'BankCustBranch'         => $BankBranch,
            'BankCustAddress'        => $BankAddrs,
            'BankCustSwiftCode'      => $BankSwift,
            'BankCustCode'           => $BankCode
            // 'CtIncoterm'       => $CtInco
        );

        $insert=$this->MSetCustomer->tambah_custbank($data);

        if($insert){
            echo "TRUE";
                $this->session->set_flashdata('success','Data Berhasil Di Proses');
                        redirect('DataSetCustomer/AddBankAccount/'.$CustId);
        }else{
            echo "FALSE";
                $this->session->set_flashdata('warns','Mohon Maaf Data Tidak Dapat Di Proses, Koneksi Error');
                        redirect('DataSetCustomer/AddBankAccount/'.$CustId);
        }


    }

}

public function insertcustomershipto(){

    $CustId                 =$this->input->post('custid');
    $CompName               =$this->input->post('companyname');
    $Addrees                =$this->input->post('address');
    $Country                =$this->input->post('country');
    $Phone                  =$this->input->post('phone');
    $CpName                 =$this->input->post('cpname');
    $CpPhone                =$this->input->post('cpphone');
    $CpMail                 =$this->input->post('cpemail');


    $data=array(
        'ShipCodeCust'           => $CustId,
        'ShipCompanyName'        => $CompName,
        'ShipAddress'            => $Addrees,
        'ShipCountry'            => $Country,
        'ShipPhone'              => $Phone,
        'ShiptoCpName'           => $CpName,
        'ShiptoCpPhone'          => $CpPhone,
        'ShiptoCpEmail'          => $CpMail
        // 'CtIncoterm'       => $CtInco
    );

    $insert=$this->MSetCustomer->tambah_custshipto($data);

    if($insert) {
        echo "TRUE";
        $this->session->set_flashdata('success','Data Berhasil Di Proses');
        redirect('DataSetCustomer/AddShipperTo/'.$CustId);
    } else {
        echo "FALSE";
        $this->session->set_flashdata('warns','Mohon Maaf Data Tidak Dapat Di Proses, Koneksi Error');
        redirect('DataSetCustomer/AddShipperTo/'.$CustId);
    }
}


public function insertcustomershipport(){

    $ShiptoId                    =$this->input->post('shiptoid');
    $ShiptoCust                  =$this->input->post('shiptocust');
    $dischargeport               =$this->input->post('dischargeport');
    $destinationport             =$this->input->post('destinationport');

    // if($dischargeport=='' OR $destinationport==''){

    //     echo "FALSE";

    // }else{

        $data=array(
            'ShiptoId' => $ShiptoId,
            'ShiptoCust' => $ShiptoCust,
            'DischargePort' => $dischargeport,
            'DestinationPort' => $destinationport
        );

        $insert=$this->MSetCustomer->tambah_custshipport($data);

        if($insert){

            echo "TRUE";
                $this->session->set_flashdata('success','Data Berhasil Di Proses');
                        redirect('DataSetCustomer/AddShipperPort/'.$ShiptoCust);
        }else{

            echo "FALSE";
                $this->session->set_flashdata('warns','Mohon Maaf Data Tidak Dapat Di Proses, Koneksi Error');
                        redirect('DataSetCustomer/AddShipperPort/'.$ShiptoCust);
        }
    // }

}

public function insertcustomercodingprint(){

    $CustoId                    =$this->input->post('custoid');
    $SacImport                  =$this->input->post('sacimport');
    $SacHotline                 =$this->input->post('sachotline');
    $SacBestBefore              =$this->input->post('sacbefore');
    $PchImport                  =$this->input->post('pchimport');
    $PchHotline                 =$this->input->post('pchhotline');
    $PchBestBefore              =$this->input->post('pchbefore');
    $CasImport                  =$this->input->post('casimport');
    $CasHotline                 =$this->input->post('cashotline');
    $CasBestBefore              =$this->input->post('casbefore');

    $TambahanIsi                =$this->input->post('tambahan_isi');

    // if($SacImport=='' OR $SacHotline=='' OR $SacBestBefore=='' OR $PchImport=='' OR $PchHotline=='' OR $PchBestBefore=='' OR $CasImport=='' OR $CasHotline=='' OR $CasBestBefore==''){

    //     echo "FALSE";

    // }else{

    $data=array(
        'CodeCustId'        => $CustoId,
        'SacImportby'       => $SacImport,
        'SacHotline'        => $SacHotline,
        'SacBestBefore'     => $SacBestBefore,
        'PchImportby'       => $PchImport,
        'PchHotline'        => $PchHotline,
        'PchBestBefore'     => $PchBestBefore,
        'CasImportby'       => $CasImport,
        'CasHotline'        => $CasHotline,
        'CasBestBefore'     => $CasBestBefore,
        'TambahanIsi_carton'=> $TambahanIsi
    );

    $insert=$this->MSetCustomer->tambah_codingprint($data);

    if($insert){

        echo"TRUE";
            $this->session->set_flashdata('success','Data Berhasil Di Proses');
                    redirect('DataSetCustomer/AddCodingPrinting/'.$CustoId);
    }else{

        echo"FALSE";
            $this->session->set_flashdata('warns','Mohon Maaf Data Tidak Dapat Di Proses, Koneksi Error');
                    redirect('DataSetCustomer/AddCodingPrinting/'.$CustoId);
    }

    // }


}

public function insertcustomerimportdoc(){

    $CustoId                          =$this->input->post('custoid');
    $BillOfLadding                    =$this->input->post('billofladding');
    $PackingList                      =$this->input->post('packinglist');
    $InvoiceA                         =$this->input->post('invoice');
    $InvoiceUV                        =$this->input->post('invoiceunderv');
    $Coo                              =$this->input->post('coo');
    $Healthcertf                      =$this->input->post('healthcertf');
    $MaterialSavety                   =$this->input->post('materialsavety');
    $Coa                              =$this->input->post('coa');
    $ProdSpec                         =$this->input->post('prodspec');
    $Othersadd                        =strtoupper($this->input->post('othersadd'));

    // if($CustoId=='' OR $BillOfLadding=='' OR $PackingList=='' OR $InvoiceA=='' OR $InvoiceUV=='' OR $Coo=='' OR $Healthcertf=='' OR $MaterialSavety=='' OR $Coa=='' OR $ProdSpec=='' OR $Othersadd==''){
        
    //     $this->session->set_flashdata('warns','Mohon Maaf Data Tidak Dapat Di Proses, Karena ada data yang masih kosong');
    //     redirect('DataSetCustomer/AddImportDocument/'.$CustoId);
        // echo "FALSE";
    
    // }else{

        $data=array(
            'CustCodeId'        => $CustoId,
            'BillOfLadding'     => $BillOfLadding,
            'PackingList'       => $PackingList,
            'InvoiceA'          => $InvoiceA,
            'InvoiceUV'         => $InvoiceUV,
            'COO'               => $Coo,
            'HealthCert'        => $Healthcertf,
            'MaterialSafety'    => $MaterialSavety,
            'COA'               => $Coa,
            'ProductSpec'       => $ProdSpec,
            'OthersAdd'         => $Othersadd,
        );

        $insert=$this->MSetCustomer->tambah_importdoc($data);

        if($insert){

            echo"TRUE";
                $this->session->set_flashdata('success','Data Berhasil Di Proses');
                        redirect('DataSetCustomer/AddImportDocument/'.$CustoId);
        }else{

            echo"FALSE";
                $this->session->set_flashdata('warns','Mohon Maaf Data Tidak Dapat Di Proses, Koneksi Error');
                        redirect('DataSetCustomer/AddImportDocument/'.$CustoId);
        }


    // }

}


public function AddFreightCustomer($CustId)
{
    $UserId                     =$this->session->userdata('logged_gexp_in')->UsersId;
    $DataUsers                  =$this->MLogin->GetProfileSign($UserId);
    $GroupMenu                  =$DataUsers->UserGroup;
    $data['menusign']           =$this->MLogin->GetMasterMenuSign($GroupMenu);
    $data['lsmastermenus']      =$this->MMenu->GetListMasterMenu();

    $data['lsmastercustomer']   =$this->MSetCustomer->GetListMasterCustomer();
    $data['lsmastercountry']    =$this->MSetCountry->GetListMasterCountry();

    $data['dt_customer']        =$this->MSetCustomer->GetRowCustomerById($CustId);
    $data['ls_freight']         =$this->MSetCustomer->GetFreightCustomerById($CustId);

    $this->load->view('DataSetCustomer/V_FreightCust',$data);
}

public function SubmitFreight_Customer()
{
    $UserId=$this->session->userdata('logged_gexp_in')->UsersId;
    $custid=$this->input->post('custid');
    $freight_name=$this->input->post('freight_name');
    $freight_contact=$this->input->post('freight_contact');
    $freight_number=$this->input->post('freight_contact_number');

    $checkcustid_freight=$this->MSetCustomer->check_freight($custid);

    if($checkcustid_freight){
        // echo "Data Sudah Ada";
        $this->session->set_flashdata('warns','Mohon Maaf Data Tidak Dapat Di Proses, Data Sudah Tersedia');
        redirect('DataSetCustomer/AddFreightCustomer/'.$custid);
    }else{
        // echo "Data Belum Ada";
        $data=array(
            'freightcust_id'=>$custid,
            'freight_company'=>$freight_name,
            'freight_company_contact'=>$freight_contact,
            'freight_company_number'=>$freight_number,
            'freight_createdAt'=>NOW,
            'freight_createdBy'=>$UserId,
        );

        $insert=$this->MSetCustomer->insert_freight_customer($data);
        if($insert){
            $this->session->set_flashdata('success','Data Berhasil Di Proses');
            redirect('DataSetCustomer/AddFreightCustomer/'.$custid);
        }else{
            $this->session->set_flashdata('warns','Mohon Maaf Data Tidak Dapat Di Proses, error connection');
            redirect('DataSetCustomer/AddFreightCustomer/'.$custid);
        }
        // $this->session->set_flashdata('success','Data Berhasil Di Proses');
        // redirect('DataSetCustomer/AddFreightCustomer/'.$custid);
    }

}


public function DeleteFreight_Customer($freightid)
{
    // $freightid=$this->input->post('freightid');
    // $freightcustid=$this->input->post('freightcustid');
    $data=array(
        'freight_status'=>'3'
    );
    $deletefreight=$this->MSetCustomer->update_freight_customer($freightid,$data);
    
    if($deletefreight){
        $this->session->set_flashdata('success','Data Berhasil Di Proses');
        $getfreightcust_id=$this->MSetCustomer->GetFreightById($freightid);
        $freightcustid=$getfreightcust_id->freightcust_id;
        redirect('DataSetCustomer/AddFreightCustomer/'.$freightcustid);
    }else{
        $this->session->set_flashdata('warns','Mohon Maaf Data Tidak Dapat Di Proses, error connection');
        $getfreightcust_id=$this->MSetCustomer->GetFreightById($freightid);
        $freightcustid=$getfreightcust_id->freightcust_id;
        redirect('DataSetCustomer/AddFreightCustomer/'.$freightcustid);
    }
}







}