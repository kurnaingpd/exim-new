<?php
class MBoardPI extends CI_Model
{
		function __construct()
		{
			parent::__construct();
        }

function get_pi_top($id)
{
    $qry="SELECT
            a.sign_pi_id pi_id, a.sign_pi_no pi_no, 
            a.sign_pi_top top_flag, a.sign_pi_top_at top_at, b.AccountName top_by,
            ROUND(((
            IFNULL(a.sign_pi_submitPI, 0) +
            IFNULL(a.sign_pi_po, 0) +
            IFNULL(a.sign_pi_top, 0) +
            IFNULL(a.sign_dp_receipt, 0) +
            IFNULL(a.sign_dp_receipt_conf, 0) +
            IFNULL(a.sign_shipping_term, 0) +
            IFNULL(a.sign_bill_of_ladding, 0) +
            IFNULL(a.sign_packing_list, 0) +
            IFNULL(a.sign_invoice, 0) +
            IFNULL(a.sign_invoice_underval, 0) +
            IFNULL(a.sign_coo, 0) +
            IFNULL(a.sign_healthcert, 0) +
            IFNULL(a.sign_materialsafe, 0) +
            IFNULL(a.sign_coa, 0) +
            IFNULL(a.sign_product_specificat, 0) +
            IFNULL(a.sign_spp, 0) +
            IFNULL(a.sign_others, 0) +
            IFNULL(a.sign_expprint_trial, 0) +
            IFNULL(a.sign_expprint_apprv, 0) +
            IFNULL(a.sign_foc, 0) +
            IFNULL(a.sign_posm, 0) +
            IFNULL(a.sign_finishgod, 0) +
            IFNULL(a.sign_vesselsche, 0) +
            IFNULL(a.sign_balancepay, 0) +
            IFNULL(a.sign_vesselbookconf, 0) +
            IFNULL(a.sign_stuffing, 0) +
            IFNULL(a.sign_draftbl_sent, 0) +
            IFNULL(a.sign_draftbl_apprv, 0) +
            IFNULL(a.sign_telex_release, 0) +
            IFNULL(a.sign_origin_docsent, 0) +
            IFNULL(a.sign_toppay_balance, 0) +
            IFNULL(a.sign_etd, 0) +
            IFNULL(a.sign_eta, 0)
            )/33)*100
        ) total
        FROM gexp_sign_pi a
        LEFT JOIN gexp_users b ON a.sign_pi_top_by = b.UsersId
        WHERE a.sign_pi_noid = '".$id."' ";
    $res = $this->db->query($qry);
    return $res->row();
}

function get_pi_dp($id)
{
    $qry="SELECT
            a.sign_pi_id pi_id, a.sign_pi_no pi_no, 
            a.sign_pi_top top_flag, a.sign_pi_top_at top_at, b.AccountName top_by,
            ROUND(((
            IFNULL(a.sign_pi_submitPI, 0) +
            IFNULL(a.sign_pi_po, 0) +
            IFNULL(a.sign_pi_top, 0) +
            IFNULL(a.sign_dp_receipt, 0) +
            IFNULL(a.sign_dp_receipt_conf, 0) +
            IFNULL(a.sign_shipping_term, 0) +
            IFNULL(a.sign_bill_of_ladding, 0) +
            IFNULL(a.sign_packing_list, 0) +
            IFNULL(a.sign_invoice, 0) +
            IFNULL(a.sign_invoice_underval, 0) +
            IFNULL(a.sign_coo, 0) +
            IFNULL(a.sign_healthcert, 0) +
            IFNULL(a.sign_materialsafe, 0) +
            IFNULL(a.sign_coa, 0) +
            IFNULL(a.sign_product_specificat, 0) +
            IFNULL(a.sign_spp, 0) +
            IFNULL(a.sign_others, 0) +
            IFNULL(a.sign_expprint_trial, 0) +
            IFNULL(a.sign_expprint_apprv, 0) +
            IFNULL(a.sign_foc, 0) +
            IFNULL(a.sign_posm, 0) +
            IFNULL(a.sign_finishgod, 0) +
            IFNULL(a.sign_vesselsche, 0) +
            IFNULL(a.sign_balancepay, 0) +
            IFNULL(a.sign_vesselbookconf, 0) +
            IFNULL(a.sign_stuffing, 0) +
            IFNULL(a.sign_draftbl_sent, 0) +
            IFNULL(a.sign_draftbl_apprv, 0) +
            IFNULL(a.sign_telex_release, 0) +
            IFNULL(a.sign_origin_docsent, 0) +
            IFNULL(a.sign_toppay_balance, 0) +
            IFNULL(a.sign_etd, 0) +
            IFNULL(a.sign_eta, 0)
            )/33)*100
        ) total
        FROM gexp_sign_pi a
        LEFT JOIN gexp_users b ON a.sign_pi_top_by = b.UsersId
        WHERE a.sign_pi_noid = '".$id."' ";
    $res = $this->db->query($qry);
    return $res->row();
}

function GetMenuSign($UserId)
{

            $qry="SELECT gsts_assign_user.AssignId, gsts_assign_user.UserId, gsts_assign_user.MenuId, gsts_assign_user.WriteAssign, gsts_assign_user.EditAssign, gsts_assign_user.DeleteAssign, gsts_master_menu.MenuId, gsts_master_menu.MenuName, gsts_master_menu.MenuLink, gsts_master_menu.MenuParent, gsts_master_menu.MenuStatus FROM gsts_assign_user INNER JOIN gsts_master_menu WHERE gsts_assign_user.UserId='$UserId' AND gsts_master_menu.MenuStatus='1' AND gsts_assign_user.MenuId=gsts_master_menu.MenuId";
            $res = $this->db->query($qry);

            if ($res->num_rows() > 0)
                return $res->result();
            else
                return array();
}
        
function GetCustomerList()
{

    $qry="SELECT * FROM gexp_master_customer WHERE isStatCust='1';";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->result();
    else
        return array();
}

function GetLastPI_No()
{
    $qry="SELECT * FROM gexp_master_pi ORDER BY gexp_pi_id DESC;";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->row();
    else
        return array();
}

function GetList_LoadPort()
{
    $qry="SELECT * FROM gexp_master_loadport WHERE LoadPortStats='1';";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->result();
    else
        return array();
}

function GetList_Container()
{
    $qry="SELECT * FROM gexp_master_container WHERE ContainerStats='1';";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->result();
    else
        return array();
}

function GetList_Bank()
{
    $qry="SELECT * FROM gexp_master_bank WHERE BankStats='1';";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->result();
    else
        return array();
}

function currency()
{
    $qry = "SELECT * FROM gexp_currency WHERE is_deleted = '0'";
    $res = $this->db->query($qry);

    return $res->result();
}

public function get_hierarchy_national_grup($national_grup){
    $sql = "select * from Master_Customer_Hierarchy where National_Grup = '".$national_grup."'";

    $query = $this->db->query($sql);
    $result = $query->result_array();

    return $result[0];
}

public function get_hierarchy_customer($customer_id){
    $sql ="SELECT * FROM gexp_master_customer AS A 
    LEFT JOIN gexp_master_country AS B ON A.`CustCountry`=B.`CountryId` 
    LEFT JOIN gexp_contact_cust AS C ON A.`CustId`=C.`CtTicketCustCode` 
    LEFT JOIN gexp_bank_cust AS D ON A.`CustId`=D.`CustCodeId`
    LEFT JOIN gexp_shipto_cust AS E ON A.`CustId`=E.`ShipCodeCust`
    LEFT JOIN gexp_importdoc_cust AS F ON A.`CustId`=F.`CustCodeId`
    LEFT JOIN gexp_codingprint_cust AS G ON A.`CustId`=G.`CodeCustId`
    LEFT JOIN gexp_shipto_port AS H ON E.`ShiptoId`=H.`ShiptoId`
    LEFT JOIN gexp_master_top AS I ON C.`CtTOP`=I.`TopId`
    LEFT JOIN gexp_freight_cust AS J ON A.`CustId`=J.`freightcust_id` WHERE A.`CustId`=".$customer_id."";

    $query = $this->db->query($sql);
    $result = $query->result_array();

    return $result[0];
}

public function get_hierarchy_ports_cust($customer_id){
    // $sql = "select Branch_Code, Branch from Master_DSO where Company_Code = '".$company."'";

    $sql="SELECT * FROM gexp_master_customer AS A 
    LEFT JOIN gexp_master_country AS B ON A.`CustCountry`=B.`CountryId` 
    LEFT JOIN gexp_contact_cust AS C ON A.`CustId`=C.`CtTicketCustCode` 
    LEFT JOIN gexp_bank_cust AS D ON A.`CustId`=D.`CustCodeId`
    LEFT JOIN gexp_shipto_cust AS E ON A.`CustId`=E.`ShipCodeCust`
    LEFT JOIN gexp_importdoc_cust AS F ON A.`CustId`=F.`CustCodeId`
    LEFT JOIN gexp_codingprint_cust AS G ON A.`CustId`=G.`CodeCustId`
    LEFT JOIN gexp_shipto_port AS H ON E.`ShiptoId`=H.`ShiptoId`
    LEFT JOIN gexp_master_top AS I ON C.`CtTOP`=I.`TopId`  WHERE A.`CustId`='".$customer_id."'";

    $query = $this->db->query($sql);
    $result = $query->result_array();

    return $result;
}

public function get_hierarchy_company($company_id){
    $sql ="SELECT * FROM gexp_master_customer AS A 
    LEFT JOIN gexp_master_country AS B ON A.`CustCountry`=B.`CountryId` 
    LEFT JOIN gexp_contact_cust AS C ON A.`CustId`=C.`CtTicketCustCode` 
    LEFT JOIN gexp_bank_cust AS D ON A.`CustId`=D.`CustCodeId`
    LEFT JOIN gexp_shipto_cust AS E ON A.`CustId`=E.`ShipCodeCust`
    LEFT JOIN gexp_importdoc_cust AS F ON A.`CustId`=F.`CustCodeId`
    LEFT JOIN gexp_codingprint_cust AS G ON A.`CustId`=G.`CodeCustId` WHERE A.`CustCompanyName` LIKE '%$company_id%'";

    $query = $this->db->query($sql);
    $result = $query->result_array();

    return $result[0];
}

public function get_hierarchy_beneficiary($benef_id){
    $sql ="SELECT * FROM gexp_master_beneficiary AS A LEFT JOIN gexp_master_country AS B On A.`BeneficiaryCountry`=B.`CountryId` WHERE A.`BeneficiaryId`='$benef_id';";

    $query = $this->db->query($sql);
    $result = $query->result_array();

    return $result[0];
}



function GetList_PI()
{
    $qry="SELECT
    A.`gexp_pi_id`,
    A.`gexp_pi_no`,
    A.`gexp_pi_statusPI`,
    A.`gexp_pi_isApproved`,
    A.`gexp_pi_ApprovedAt`,
    A.`gexp_pi_ApprovedBy`,
    A.`gexp_pi_date`,
    A.`gexp_pi_customer`, 
    B.`CustCompanyName` AS Cust, 
    C.`CustCompanyName` AS Consig, 
    D.`CustCompanyName` AS Benefi, 
    E.`CountryName` AS Negara,
    F.`AccountName` AS PPIC 
    FROM gexp_master_pi AS A 
    LEFT JOIN gexp_master_customer AS B ON A.`gexp_pi_customer`=B.`CustId`
    LEFT JOIN gexp_master_customer AS C ON A.`gexp_pi_consignee_id`=C.`CustId` 
    LEFT JOIN gexp_master_customer AS D ON A.`gexp_pi_beneficiary_id`=D.`CustId`
    LEFT JOIN gexp_master_country AS E ON C.`CustCountry`=E.`CountryId`
    LEFT JOIN gexp_users AS F ON A.`gexp_pi_createdBy`=F.`UsersId`  
    WHERE A.`gexp_pi_statrow`='1' ORDER BY A.`gexp_pi_id` DESC;";
    // echo "<pre>$qry</pre>";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->result();
    else
        return array();
}

function GetResult_PI($params)
{
    $qry="SELECT
    A.`gexp_pi_id`,
    A.`gexp_pi_no`,
    A.`gexp_pi_statusPI`,
    A.`gexp_pi_isApproved`,
    A.`gexp_pi_ApprovedAt`,
    A.`gexp_pi_ApprovedBy`,
    A.`gexp_pi_date`,
    A.`gexp_pi_customer`, 
    B.`CustCompanyName` AS Cust, 
    C.`CustCompanyName` AS Consig, 
    D.`CustCompanyName` AS Benefi, 
    E.`CountryName` AS Negara,
    F.`AccountName` AS PPIC 
    FROM gexp_master_pi AS A 
    LEFT JOIN gexp_master_customer AS B ON A.`gexp_pi_customer`=B.`CustId`
    LEFT JOIN gexp_master_customer AS C ON A.`gexp_pi_consignee_id`=C.`CustId` 
    LEFT JOIN gexp_master_customer AS D ON A.`gexp_pi_beneficiary_id`=D.`CustId`
    LEFT JOIN gexp_master_country AS E ON C.`CustCountry`=E.`CountryId`
    LEFT JOIN gexp_users AS F ON A.`gexp_pi_createdBy`=F.`UsersId`  
    WHERE A.`gexp_pi_statrow`='1'";

    if($params['pi_no']) {
        $qry.= " AND A.`gexp_pi_no` = '".$params['pi_no']."'";
    }

    if(($params['dat_start']) AND ($params['dat_end'])) {
        $qry.= " AND A.`gexp_pi_date` BETWEEN '".$params['dat_start']."' AND '".$params['dat_end']."'";
    }

    if($params['pi_cust']) {
        $qry.= " AND A.`gexp_pi_customer` like '%".$params['pi_cust']."%'";
    }

    if($params['pi_country']) {
        $qry.= " AND E.`CountryName` like '%".$params['pi_country']."%'";
    }

    if($params['pi_pic']) {
        $qry.= " AND F.`AccountName` like '%".$params['pi_pic']."%'";
    }

    $qry.= " ORDER BY A.`gexp_pi_id` DESC;";
    // echo "<pre>$qry</pre>";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->result();
    else
        return array();
}

function tambah_pi($data)
{
    // $qry=$this->db->insert('gexp_master_pi',$data);
    // if(!$qry)
    //     {
    //         $error = $this->db->error();
    //         return $error;
    //         // return FALSE; // Has keys 'code' and 'message'
    //     }else{
    //         return TRUE;
    //     }

    $this->db->insert('gexp_master_pi', $data);
    $insert_id = $this->db->insert_id();
}

// function GetList_PI_byId($Id_PI)
// {

//     $qry="SELECT
//     A.`gexp_pi_id`,
//     A.`gexp_pi_no`,
//     A.`gexp_pi_po`,
//     A.`gexp_pi_statusPI`,
//     A.`gexp_pi_isApproved`,
//     A.`gexp_pi_ApprovedAt`,
//     A.`gexp_pi_ApprovedBy`,
//     A.`gexp_pi_date`,
//     A.`gexp_pi_customer`,
//     A.`gexp_pi_remark`,
//     A.`gexp_pi_container`,
//     A.`gexp_pi_number_container`,
//     A.`gexp_pi_freight_company`,
//     A.`gexp_pi_freight_compcontact`,
//     A.`gexp_pi_freight_compnumber`,
//     A.`gexp_pi_freight_cost`,
//     A.`gexp_pi_insurance`,
//     A.`gexp_pi_bank`,
//     J.`BankDesc` AS Bank_name,
//     A.`gexp_pi_currency`,
//     A.`gexp_pi_ppn`, 
//     B.`CustCompanyName` AS Cust, 
//     C.`CustCompanyName` AS Consig,
//     C.`CustAddress` AS Cons_addr,
//     G.`CountryName` AS Cons_country,
//     C.`CustPhone` AS Cons_phone, 
//     D.`CustCompanyName` AS Benefi,
//     D.`CustAddress` AS Bene_addr,
//     H.`CountryName` AS Bene_country,
//     D.`CustPhone` AS Bene_phone, 
//     E.`CountryName` AS Negara,
//     I.`LoadPortId` AS Loadport_Id,
//     I.`LoadPortDesc` AS Loadport_Name,
//     F.`UsersId` AS PPIC_ID,
//     F.`AccountName` AS PPIC 
//     FROM gexp_master_pi AS A 
//     LEFT JOIN gexp_master_customer AS B ON A.`gexp_pi_customer`=B.`CustId`
//     LEFT JOIN gexp_master_customer AS C ON A.`gexp_pi_consignee_id`=C.`CustId` 
//     LEFT JOIN gexp_master_customer AS D ON A.`gexp_pi_beneficiary_id`=D.`CustId`
//     LEFT JOIN gexp_master_country AS E ON B.`CustCountry`=E.`CountryId`
//     LEFT JOIN gexp_users AS F ON A.`gexp_pi_createdBy`=F.`UsersId`
//     LEFT JOIN gexp_master_country AS G ON C.`CustCountry`=G.`CountryId`
//     LEFT JOIN gexp_master_country AS H ON D.`CustCountry`=H.`CountryId`
//     LEFT JOIN gexp_master_loadport AS I ON A.`gexp_pi_loadport_id`=I.`LoadPortId`
//     LEFT JOIN gexp_master_bank AS J ON A.`gexp_pi_bank`=J.`BankId`  
//     WHERE A.`gexp_pi_statrow`='1' AND A.gexp_pi_id='$Id_PI';";
//     $res = $this->db->query($qry);

//     if ($res->num_rows() > 0)
//         return $res->result();
//     else
//         return array();
// }

function GetRowList_PI_byId($Id_PI)
{
    $qry="SELECT
    A.`gexp_pi_id`,
    A.`gexp_pi_no`,
    A.`gexp_pi_po`,
    A.`gexp_pi_statusPI`,
    A.`gexp_pi_isApproved`,
    A.`gexp_pi_ApprovedAt`,
    A.`gexp_pi_ApprovedBy`,
    A.`gexp_pi_date`,
    A.`gexp_pi_customer`,
    A.`gexp_pi_remark`,
    A.`gexp_pi_container`,
    A.`gexp_pi_number_container`,
    A.`gexp_pi_freight_company`,
    A.`gexp_pi_freight_compcontact`,
    A.`gexp_pi_freight_compnumber`,
    A.`gexp_pi_freight_cost`,
    A.`gexp_pi_insurance`,
    A.`gexp_pi_bank`,
    A.`gexp_pi_beneficiary_id`,
    A.`gexp_pi_consignee_id`,
    J.`BankDesc` AS Bank_name,
    A.`gexp_pi_currency`,
    A.`gexp_pi_ppn`, 
    B.`CustCompanyName` AS Cust,
    C.`CustCode` AS ConsigCode, 
    C.`CustCompanyName` AS Consig,
    C.`CustAddress` AS Cons_addr,
    C.`CustTown` AS Cons_Town,
    G.`CountryName` AS Cons_country,
    C.`CustPhone` AS Cons_phone, 
    D.`BeneficiaryDesc` AS Benefi,
    D.`BeneficiaryAddr` AS Bene_addr,
    D.`BeneficiaryCP` AS Bene_cp,
    H.`CountryName` AS Bene_country,
    D.`BeneficiaryPhone` AS Bene_phone, 
    E.`CountryName` AS Negara,
    I.`LoadPortId` AS Loadport_Id,
    I.`LoadPortDesc` AS Loadport_Name,
    F.`UsersId` AS PPIC_ID,
    F.`AccountName` AS PPIC,
    L.`DestinationPort` AS DestinatPort,
    N.`TopDesc` AS TOPCust,
    O.`CtTicketCustCode` AS ConsigCpCode,
    O.`CtName` AS ConsigCpName,
    O.`CtPhone` AS ConsigCpPhone,
    P.`DischargePort` AS Cons_Discharge,
    P.`DestinationPort` AS Cons_Destination,
    Q.`ContainerDesc` AS Cont_Name,
    R.`BankCode` AS Bank_Code,
    R.`BankName` AS Bank_Name,
    S.`TopId` AS Cons_TopId,
    S.`TopDesc` AS Cons_TopName
    FROM gexp_master_pi AS A 
    LEFT JOIN gexp_master_customer AS B ON A.`gexp_pi_customer`=B.`CustId`
    LEFT JOIN gexp_master_customer AS C ON A.`gexp_pi_consignee_id`=C.`CustId` 
    LEFT JOIN gexp_master_beneficiary AS D ON A.`gexp_pi_beneficiary_id`=D.`BeneficiaryId`
    LEFT JOIN gexp_master_country AS E ON B.`CustCountry`=E.`CountryId`
    LEFT JOIN gexp_users AS F ON A.`gexp_pi_createdBy`=F.`UsersId`
    LEFT JOIN gexp_master_country AS G ON C.`CustCountry`=G.`CountryId`
    LEFT JOIN gexp_master_country AS H ON D.`BeneficiaryCountry`=H.`CountryId`
    LEFT JOIN gexp_master_loadport AS I ON A.`gexp_pi_loadport_id`=I.`LoadPortId`
    LEFT JOIN gexp_master_bank AS J ON A.`gexp_pi_bank`=J.`BankId`
    LEFT JOIN gexp_shipto_cust AS K ON C.`CustId`=K.`ShipCodeCust`
    LEFT JOIN gexp_shipto_port AS L ON K.`ShiptoId`=L.`ShiptoId`
    LEFT JOIN gexp_contact_cust AS M ON C.`CustId`=M.`CtTicketCustCode`
    LEFT JOIN gexp_master_top AS N ON M.`CtTOP`=N.`TopId`
    LEFT JOIN gexp_contact_cust AS O ON C.`CustId`=O.`CtTicketCustCode` 
    LEFT JOIN gexp_shipto_port AS P ON C.`CustId`=P.`ShiptoCust`
    LEFT JOIN gexp_master_container AS Q ON A.`gexp_pi_container`=Q.`ContainerId`
    LEFT JOIN gexp_master_bank AS R ON A.`gexp_pi_bank`=R.`BankId`
    LEFT JOIN gexp_master_top AS S ON C.`CustId`=S.`TopId`
    WHERE A.`gexp_pi_statrow`='1' AND A.gexp_pi_id='$Id_PI';";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->row();
    else
        return array();
}

function getsearchPI($pi_no,$dat_st,$dat_end,$pi_cust,$pi_country,$pi_pic)
{
    // $qry="SELECT
    // A.`gexp_pi_id`,
    // A.`gexp_pi_no`,
    // A.`gexp_pi_po`,
    // A.`gexp_pi_statusPI`,
    // A.`gexp_pi_isApproved`,
    // A.`gexp_pi_ApprovedAt`,
    // A.`gexp_pi_ApprovedBy`,
    // A.`gexp_pi_date`,
    // A.`gexp_pi_customer`,
    // A.`gexp_pi_remark`,
    // A.`gexp_pi_container`,
    // A.`gexp_pi_number_container`,
    // A.`gexp_pi_freight_company`,
    // A.`gexp_pi_freight_compcontact`,
    // A.`gexp_pi_freight_compnumber`,
    // A.`gexp_pi_freight_cost`,
    // A.`gexp_pi_insurance`,
    // A.`gexp_pi_bank`,
    // J.`BankDesc` AS Bank_name,
    // A.`gexp_pi_currency`,
    // A.`gexp_pi_ppn`, 
    // B.`CustCompanyName` AS Cust, 
    // C.`CustCompanyName` AS Consig,
    // C.`CustAddress` AS Cons_addr,
    // C.`CustTown` AS Cons_Town,
    // G.`CountryName` AS Cons_country,
    // C.`CustPhone` AS Cons_phone, 
    // D.`BeneficiaryDesc` AS Benefi,
    // D.`BeneficiaryAddr` AS Bene_addr,
    // D.`BeneficiaryCP` AS Bene_cp, 
    // H.`CountryName` AS Bene_country,
    // D.`BeneficiaryPhone` AS Bene_phone, 
    // E.`CountryName` AS Negara,
    // I.`LoadPortId` AS Loadport_Id,
    // I.`LoadPortDesc` AS Loadport_Name,
    // F.`UsersId` AS PPIC_ID,
    // F.`AccountName` AS PPIC,
    // L.`DestinationPort` AS DestinatPort,
    // N.`TopDesc` AS TOPCust 
    // FROM gexp_master_pi AS A 
    // LEFT JOIN gexp_master_customer AS B ON A.`gexp_pi_customer`=B.`CustId`
    // LEFT JOIN gexp_master_customer AS C ON A.`gexp_pi_consignee_id`=C.`CustId` 
    // LEFT JOIN gexp_master_beneficiary AS D ON A.`gexp_pi_beneficiary_id`=D.`BeneficiaryId`
    // LEFT JOIN gexp_master_country AS E ON B.`CustCountry`=E.`CountryId`
    // LEFT JOIN gexp_users AS F ON A.`gexp_pi_createdBy`=F.`UsersId`
    // LEFT JOIN gexp_master_country AS G ON C.`CustCountry`=G.`CountryId`
    // LEFT JOIN gexp_master_country AS H ON D.`BeneficiaryCountry`=H.`CountryId`
    // LEFT JOIN gexp_master_loadport AS I ON A.`gexp_pi_loadport_id`=I.`LoadPortId`
    // LEFT JOIN gexp_master_bank AS J ON A.`gexp_pi_bank`=J.`BankId`
    // LEFT JOIN gexp_shipto_cust AS K ON C.`CustId`=K.`ShipCodeCust`
    // LEFT JOIN gexp_shipto_port AS L ON K.`ShiptoId`=L.`ShiptoId`
    // LEFT JOIN gexp_contact_cust AS M ON C.`CustId`=M.`CtTicketCustCode`
    // LEFT JOIN gexp_master_top AS N ON M.`CtTOP`=N.`TopId`    
    // WHERE A.`gexp_pi_statrow`='1' AND A.`gexp_pi_no` LIKE '%$pi_no%' AND C.`CustCompanyName` LIKE '%$pi_cust%' AND C.`CustCountry` LIKE '%$pi_country%';";
    
    $qry = "SELECT
    A.`gexp_pi_id`,
    A.`gexp_pi_no`,
    A.`gexp_pi_statusPI`,
    A.`gexp_pi_isApproved`,
    A.`gexp_pi_ApprovedAt`,
    A.`gexp_pi_ApprovedBy`,
    A.`gexp_pi_date`,
    A.`gexp_pi_customer`, 
    B.`CustCompanyName` AS Cust, 
    C.`CustCompanyName` AS Consig, 
    D.`CustCompanyName` AS Benefi, 
    E.`CountryName` AS Negara,
    F.`AccountName` AS PPIC 
    FROM gexp_master_pi AS A 
    LEFT JOIN gexp_master_customer AS B ON A.`gexp_pi_customer`=B.`CustId`
    LEFT JOIN gexp_master_customer AS C ON A.`gexp_pi_consignee_id`=C.`CustId` 
    LEFT JOIN gexp_master_customer AS D ON A.`gexp_pi_beneficiary_id`=D.`CustId`
    LEFT JOIN gexp_master_country AS E ON C.`CustCountry`=E.`CountryId`
    LEFT JOIN gexp_users AS F ON A.`gexp_pi_createdBy`=F.`UsersId`  
    WHERE A.`gexp_pi_statrow`='1'";

    if($pi_no) {
        $qry.= " AND A.`gexp_pi_no` LIKE '%$pi_no%'";
    }

    if(($dat_st) AND ($dat_end)) {
        $qry.= " AND A.`gexp_pi_date` between '$dat_st' and '$dat_end'";
    }

    if($pi_cust) {
        $qry.= " AND C.`CustCompanyName` LIKE '%$pi_cust%'";
    }

    if($pi_country) {
        $qry.= " AND C.`CustCountry` LIKE '%$pi_country%'";
    }
 
    $qry.= " ORDER BY A.`gexp_pi_id` DESC;";
    // echo "<pre>$qry</pre>";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->result();
    else
        return array();
}

function GetList_PI_byId($Id_PI)
{
    $qry="SELECT
    A.`gexp_pi_id`,
    A.`gexp_pi_no`,
    A.`gexp_pi_po`,
    A.`gexp_pi_statusPI`,
    A.`gexp_pi_consignee_id`,
    A.`gexp_pi_isApproved`,
    A.`gexp_pi_ApprovedAt`,
    A.`gexp_pi_ApprovedBy`,
    A.`gexp_pi_date`,
    A.`gexp_pi_customer`,
    A.`gexp_pi_remark`,
    A.`gexp_pi_container`,
    A.`gexp_pi_number_container`,
    A.`gexp_pi_freight_company`,
    A.`gexp_pi_freight_compcontact`,
    A.`gexp_pi_freight_compnumber`,
    A.`gexp_pi_freight_cost`,
    A.`gexp_pi_insurance`,
    A.`gexp_pi_bank`,
    J.`BankName` AS Bank_name,
    J.`BankOffice` AS Bank_office,
    J.`BankDesc` AS Bank_addr,
    J.`BankAccount` AS Bank_acc,
    J.`BankSwiftCode` AS Bank_swiftcode,
    A.`gexp_pi_currency`,
    A.`gexp_pi_ppn`, 
    B.`CustCompanyName` AS Cust, 
    C.`CustCompanyName` AS Consig,
    C.`CustAddress` AS Cons_addr,
    C.`CustTown` AS Cons_Town,
    G.`CountryName` AS Cons_country,
    C.`CustPhone` AS Cons_phone, 
    D.`BeneficiaryDesc` AS Benefi,
    D.`BeneficiaryOffice` AS Bene_office,
    D.`BeneficiaryAddr` AS Bene_addr,
    D.`BeneficiaryCP` AS Bene_cp, 
    H.`CountryName` AS Bene_country,
    D.`BeneficiaryPhone` AS Bene_phone, 
    E.`CountryName` AS Negara,
    F.`UserJabatan` AS JabatanUser,
    I.`LoadPortId` AS Loadport_Id,
    I.`LoadPortDesc` AS Loadport_Name,
    F.`UsersId` AS PPIC_ID,
    F.`AccountName` AS PPIC,
    L.`DischargePort` AS DischargePort,
    L.`DestinationPort` AS DestinatPort,
    M.`CtName` AS ConsigContactName,
    N.`TopDesc` AS TOPCust,
    O.`ContainerDesc` AS NamaContainer,
    P.`IncotermCode` AS IncoCode,
    O.MaxCBM as maxcbm, Q.*,
    IF(P.IncotermCode IN ('CIF','CFR'), L.DestinationPort, I.LoadPortDesc) tujuan
    FROM gexp_master_pi AS A 
    LEFT JOIN gexp_master_customer AS B ON A.`gexp_pi_customer`=B.`CustId`
    LEFT JOIN gexp_master_customer AS C ON A.`gexp_pi_consignee_id`=C.`CustId` 
    LEFT JOIN gexp_master_beneficiary AS D ON A.`gexp_pi_beneficiary_id`=D.`BeneficiaryId`
    LEFT JOIN gexp_master_country AS E ON B.`CustCountry`=E.`CountryId`
    LEFT JOIN gexp_users AS F ON A.`gexp_pi_createdBy`=F.`UsersId`
    LEFT JOIN gexp_master_country AS G ON C.`CustCountry`=G.`CountryId`
    LEFT JOIN gexp_master_country AS H ON D.`BeneficiaryCountry`=H.`CountryId`
    LEFT JOIN gexp_master_loadport AS I ON A.`gexp_pi_loadport_id`=I.`LoadPortId`
    LEFT JOIN gexp_master_bank AS J ON A.`gexp_pi_bank`=J.`BankId`
    LEFT JOIN gexp_shipto_cust AS K ON C.`CustId`=K.`ShipCodeCust`
    LEFT JOIN gexp_shipto_port AS L ON K.`ShiptoId`=L.`ShiptoId`
    LEFT JOIN gexp_contact_cust AS M ON C.`CustId`=M.`CtTicketCustCode`
    LEFT JOIN gexp_master_top AS N ON M.`CtTOP`=N.`TopId`
    LEFT JOIN gexp_master_container AS O ON A.`gexp_pi_container`=O.`ContainerId`
    LEFT JOIN gexp_master_incoterm AS P ON M.`CtIncoterm`=P.`IncotermId`
    LEFT JOIN gexp_currency Q ON A.gexp_pi_currency = Q.id
    WHERE A.`gexp_pi_statrow`='1' AND A.gexp_pi_id='$Id_PI';";
    // echo "<pre>$qry</pre>";
    // die;
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->result();
    else
        return array();
}

// function get_item($params)
// {
    // $qry = "SELECT * FROM gexp_pi_cbm a
            // WHERE a.pi_id = '".$params."'";
    // $res = $this->db->query($qry);

    // return $res->row();
// }

function get_item_cbm($params)
{
    $qry = "SELECT * FROM gexp_pi_cbm a
            WHERE a.pi_no = '".$params."'";
    $res = $this->db->query($qry);

    return $res->row();
}

function get_data_item($params)
{
    $conds = array();
    $qry = "SELECT
                a.gexp_good_id id, c.gexp_pi_id pi_id, a.gexp_good_pi_no pi_no,
                b.ItemCodeId item_id, b.`Length` AS lengths, b.Width width, b.Height height, d.MaxCBM max_cbm, SUM(a.gexp_good_qty) tot_qty
            FROM gexp_pi_good a
            JOIN gexp_master_item b ON a.gexp_good_item_id = b.ItemId
            JOIN gexp_master_pi c ON a.gexp_good_pi_no = c.gexp_pi_no
            JOIN gexp_master_container d ON c.gexp_pi_container = d.ContainerId
            WHERE c.gexp_pi_id = '$params'
            GROUP BY b.ItemCodeId, a.gexp_good_pi_no
            ORDER BY a.gexp_good_pi_no";
            
    $res = $this->db->query($qry);

    return $res->result();
}

function GetList_Item()
{
    $qry="SELECT * FROM gexp_master_item WHERE ItemStats='1' ORDER BY ItemId DESC;";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->result();
    else
        return array();
}


function GetPI_ById($Id_PI)
{
    $qry="SELECT * FROM gexp_master_pi WHERE gexp_pi_id='$Id_PI';";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->row();
    else
        return array();
}

function check_item($params)
{
    $qry = "SELECT * FROM gexp_pi_good a
            WHERE a.gexp_good_pi_no = '$params'";
            // echo $qry;
    $res = $this->db->query($qry);

    return $res->row();
}

function check_remain_cbm($params)
{
    $qry = "SELECT * FROM gexp_pi_good a
            WHERE a.gexp_good_pi_no = '$params'
            ORDER BY a.gexp_good_id DESC LIMIT 1";
            // echo $qry;
    $res = $this->db->query($qry);

    return $res->row();
}

function get_dimention($params)
{
    $qry = "SELECT * FROM gexp_master_item a
            WHERE a.ItemId = '".$params."'";
    $res = $this->db->query($qry);

    return $res->row();
}

function get_container($params)
{
    $qry = "SELECT
                a.ContainerId id, a.ContainerDesc container, a.MaxCBM cbm
            FROM gexp_master_container a
            LEFT JOIN gexp_master_pi b ON a.ContainerId = b.gexp_pi_container
            WHERE b.gexp_pi_no = '$params'
            GROUP BY a.ContainerId";
    // echo $qry;
    $res = $this->db->query($qry);

    return $res->row();
}

function tambah_items_pi($data){
    $qry=$this->db->insert('gexp_pi_good',$data);
    if(!$qry)
        {
            $error = $this->db->error();
            return $error;
        }else{
            return TRUE;
        }
}

function GetList_PurchaseGood($Id_PI)
{
    $qry="SELECT * FROM gexp_master_pi AS A 
    LEFT JOIN gexp_pi_good AS B ON A.`gexp_pi_no`=B.`gexp_good_pi_no` 
    LEFT JOIN gexp_master_item AS C ON B.`gexp_good_item_id`=C.`ItemId`
    WHERE B.`gexp_good_statsid`='1' AND A.`gexp_pi_id`='$Id_PI';";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->result();
    else
        return array();
}

function GetSumList_PurchaseGood($Id_PI)
{
    $qry="SELECT SUM(gexp_good_totals) AS Total_Purchase FROM gexp_master_pi AS A 
    LEFT JOIN gexp_pi_good AS B ON A.`gexp_pi_no`=B.`gexp_good_pi_no` 
    LEFT JOIN gexp_master_item AS C ON B.`gexp_good_item_id`=C.`ItemId`
    WHERE B.`gexp_good_statsid`='1' AND A.`gexp_pi_id`='$Id_PI';";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->result();
    else
        return array();
}


function GetRowList_CodingPrint($consig_id)
{
    $qry="SELECT * FROM gexp_codingprint_cust AS A LEFT JOIN gexp_master_customer AS B ON A.`CodeCustId`=B.`CustId` WHERE CodeCustId='$consig_id';";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->result();
    else
        return array();
}

function GetList_FreeGood($Id_PI)
{
    $qry="SELECT * FROM gexp_master_pi AS A 
    LEFT JOIN gexp_pi_good AS B ON A.`gexp_pi_no`=B.`gexp_good_pi_no` 
    LEFT JOIN gexp_master_item AS C ON B.`gexp_good_item_id`=C.`ItemId`
    WHERE B.`gexp_good_statsid`='2' AND A.`gexp_pi_id`='$Id_PI';";
    // echo "<pre>$qry</pre>";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->result();
    else
        return array();
}

function update_approved($data, $Id_PI)
{
			$this->db->where('gexp_pi_id', $Id_PI);
            $qry=$this->db->update('gexp_master_pi', $data);
            if(!$qry)
            {
                $error = $this->db->error();
                return $error;
                // return FALSE; // Has keys 'code' and 'message'
            }else{
                return TRUE;
            }
}

function Get_BankCust_ById($customer_id)
{
    $qry="SELECT * FROM gexp_bank_cust WHERE CustCodeId='$customer_id';";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->row();
    else
        return array();
}

function GetList_AllFoods_ByPI($Id_PI)
{
    $qry="SELECT * FROM gexp_master_pi AS A 
    LEFT JOIN gexp_pi_good AS B ON A.`gexp_pi_no`=B.`gexp_good_pi_no` 
    LEFT JOIN gexp_master_item AS C ON B.`gexp_good_item_id`=C.`ItemId`
    WHERE A.`gexp_pi_id`='$Id_PI';";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->result();
    else
        return array();
}


function Getlist_Sign_PI()
{
    $qry="SELECT * FROM gexp_sign_pi";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->result();
    else
        return array();
}


function Getlist_signPI_ById($signpi_id)
{
    // $qry="SELECT * FROM gexp_sign_pi WHERE sign_pi_noid='$signpi_id'";
    $qry="SELECT
            *,
            ROUND(((
                IFNULL(a.sign_pi_submitPI, 0) +
                IFNULL(a.sign_pi_po, 0) +
                IFNULL(a.sign_pi_top, 0) +
                IFNULL(a.sign_dp_receipt, 0) +
                IFNULL(a.sign_dp_receipt_conf, 0) +
                IFNULL(a.sign_shipping_term, 0) +
                IFNULL(a.sign_bill_of_ladding, 0) +
                IFNULL(a.sign_packing_list, 0) +
                IFNULL(a.sign_invoice, 0) +
                IFNULL(a.sign_invoice_underval, 0) +
                IFNULL(a.sign_coo, 0) +
                IFNULL(a.sign_healthcert, 0) +
                IFNULL(a.sign_materialsafe, 0) +
                IFNULL(a.sign_coa, 0) +
                IFNULL(a.sign_product_specificat, 0) +
                IFNULL(a.sign_spp, 0) +
                IFNULL(a.sign_others, 0) +
                IFNULL(a.sign_expprint_trial, 0) +
                IFNULL(a.sign_expprint_apprv, 0) +
                IFNULL(a.sign_foc, 0) +
                IFNULL(a.sign_posm, 0) +
                IFNULL(a.sign_finishgod, 0) +
                IFNULL(a.sign_vesselsche, 0) +
                IFNULL(a.sign_balancepay, 0) +
                IFNULL(a.sign_vesselbookconf, 0) +
                IFNULL(a.sign_stuffing, 0) +
                IFNULL(a.sign_draftbl_sent, 0) +
                IFNULL(a.sign_draftbl_apprv, 0) +
                IFNULL(a.sign_telex_release, 0) +
                IFNULL(a.sign_origin_docsent, 0) +
                IFNULL(a.sign_toppay_balance, 0) +
                IFNULL(a.sign_etd, 0) +
                IFNULL(a.sign_eta, 0)
            )/33)*100) total
        FROM gexp_sign_pi a WHERE sign_pi_noid='$signpi_id'";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->row();
    else
        return array();
}


function GetList_Beneficiary()
{
    $qry="SELECT * FROM gexp_master_beneficiary WHERE BeneficiaryStats='1';";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->result();
    else
        return array();
}


function SumaryQty_ByPI($Id_PI)
{
    $qry="SELECT SUM(B.`gexp_good_qty`) AS QTY_Total_all FROM gexp_master_pi AS A LEFT JOIN gexp_pi_good AS B ON A.`gexp_pi_no`=B.`gexp_good_pi_no` WHERE A.gexp_pi_id='$Id_PI';";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->row();
    else
        return array();
}

function SumaryPrice_ByPI($Id_PI)
{
    $qry="SELECT *,SUM(B.`gexp_good_totals`) AS Sum_Total_Price FROM gexp_master_pi AS A LEFT JOIN gexp_pi_good AS B ON A.`gexp_pi_no`=B.`gexp_good_pi_no` WHERE A.gexp_pi_id='$Id_PI';";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->row();
    else
        return array();
}


function update_sign01($data, $sign_id)
{
    $this->db->where('sign_pi_noid', $sign_id);
    $qry=$this->db->update('gexp_sign_pi', $data);
    if(!$qry)
    {
        $error = $this->db->error();
        return $error;
    }else{
        return TRUE;
    }
}

function get_pi(){
    $qry="SELECT * FROM gexp_email_list";
    $res = $this->db->query($qry);
    return $res->result_array();
}

function tambah_fileitems_coa($data){
    $qry=$this->db->insert('gexp_coa_signpi',$data);
    if(!$qry)
        {
            $error = $this->db->error();
            return $error;
            // return FALSE; // Has keys 'code' and 'message'
        }else{
            return TRUE;
        }
}

function tambah_fileitems_prodspec($data){
    $qry=$this->db->insert('gexp_prodspec_signpi',$data);
    if(!$qry)
        {
            $error = $this->db->error();
            return $error;
            // return FALSE; // Has keys 'code' and 'message'
        }else{
            return TRUE;
        }
}


function GetList_AllCoaLamp($signpi_id)
{
    $qry="SELECT * FROM gexp_coa_signpi WHERE sign_id_pi='$signpi_id';";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->result();
    else
        return array();
}

function GetList_RowCoaLamp($coa_detsign_id)
{
    $qry="SELECT * FROM gexp_coa_signpi WHERE coa_detsign_id='$coa_detsign_id';";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->row();
    else
        return array();
}


function GetList_AllProdspecLamp($signpi_id)
{
    $qry="SELECT * FROM gexp_prodspec_signpi WHERE sign_pi_id='$signpi_id';";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->result();
    else
        return array();
}

function GetList_RowProdsLamp($prodspec_signid)
{
    $qry="SELECT * FROM gexp_prodspec_signpi WHERE prodspec_signid='$prodspec_signid';";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->row();
    else
        return array();
}


function delete_item_pi($pi_ItemId)
{
			$this->db->where('gexp_good_id', $pi_ItemId);
            $qry=$this->db->delete('gexp_pi_good');
            if(!$qry)
            {
                $error = $this->db->error();
                return $error;
                // return FALSE; // Has keys 'code' and 'message'
            }else{
                return TRUE;
            }
}


function delete_item_row($pi_no)
{
    $qry="SELECT * FROM gexp_master_pi WHERE gexp_pi_no='$pi_no'";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->row();
    else
        return array();
}


function GetRowsPI($ID_PI)
{
    $qry="SELECT * FROM gexp_master_pi AS A LEFT JOIN gexp_master_customer AS B ON A.`gexp_pi_consignee_id`=B.`CustId`
    LEFT JOIN gexp_master_country AS C ON B.`CustCountry`=C.`CountryId` LEFT JOIN gexp_contact_cust AS D ON B.`CustId`=D.`CtTicketCustCode`  WHERE gexp_pi_id='$ID_PI';";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->row();
    else
        return array();
}


function update_pi($data, $Id_PI)
{
			$this->db->where('gexp_pi_id', $Id_PI);
            $qry=$this->db->update('gexp_master_pi', $data);
            if(!$qry)
            {
                $error = $this->db->error();
                return $error;
                // return FALSE; // Has keys 'code' and 'message'
            }else{
                return TRUE;
            }
}


function GetSumQty_PurchaseGood($Id_PI)
{
    $qry="SELECT *, SUM(gexp_good_qty) AS Total_Qty_Prcs FROM gexp_pi_good AS A LEFT JOIN gexp_master_pi AS B ON A.`gexp_good_pi_no`=B.`gexp_pi_no` WHERE gexp_good_statsid='1' AND B.`gexp_pi_id`='$Id_PI';";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->row();
    else
        return array();
}

function GetSumValue_PurchaseGood($Id_PI)
{
    $qry="SELECT *, SUM(gexp_good_totals) AS Total_Val_Prcs FROM gexp_pi_good AS A LEFT JOIN gexp_master_pi AS B ON A.`gexp_good_pi_no`=B.`gexp_pi_no` WHERE gexp_good_statsid='1' AND B.`gexp_pi_id`='$Id_PI';";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->row();
    else
        return array();
}

function GetSumQty_FreeGood($Id_PI)
{
    $qry="SELECT *, SUM(gexp_good_qty) AS Total_Qty_Free FROM gexp_pi_good AS A LEFT JOIN gexp_master_pi AS B ON A.`gexp_good_pi_no`=B.`gexp_pi_no` WHERE gexp_good_statsid='2' AND B.`gexp_pi_id`='$Id_PI';";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->row();
    else
        return array();
}

function GetSumValue_FreeGood($Id_PI)
{
    $qry="SELECT *, SUM(gexp_good_totals) AS Total_Val_Free FROM gexp_pi_good AS A LEFT JOIN gexp_master_pi AS B ON A.`gexp_good_pi_no`=B.`gexp_pi_no` WHERE gexp_good_statsid='2' AND B.`gexp_pi_id`='$Id_PI';";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->row();
    else
        return array();
}


function Checker_ItemFree($Id_PI)
{
    $qry="SELECT *,COUNT(gexp_good_statsid) AS Total_Freegoods FROM gexp_pi_good AS A LEFT JOIN gexp_master_pi AS B ON A.`gexp_good_pi_no`=B.`gexp_pi_no` WHERE B.`gexp_pi_id`='$Id_PI' AND A.`gexp_good_statsrow`='1';";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->row();
    else
        return array();
}

        
}