<?php
class MFin extends CI_Model
{
		function __construct()
		{
			parent::__construct();
        }
        
function GetLastInv_No()
{
    $qry="SELECT * FROM gexp_master_invoice ORDER BY gexp_invoice_id DESC;";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->row();
    else
        return array();
}

function tambah_invoice($data){
    $qry=$this->db->insert('gexp_master_invoice',$data);
    if(!$qry)
        {
            $error = $this->db->error();
            return $error;
            // return FALSE; // Has keys 'code' and 'message'
        }else{
            return TRUE;
        }
}

function GetListInv_ByUsers($UserId)
{
    // $qry="SELECT
    // A.`gexp_invoice_id`,
    // A.`gexp_invoice_no`,
    // A.`gexp_invoice_pi`,
    // A.`gexp_invoice_ffrn`,
    // A.`gexp_invoice_statrows`,
    // A.`gexp_invoice_createdBy`,
    // B.`gexp_pi_customer`,
    // B.`gexp_pi_statusPI`,
    // B.`gexp_pi_consignee_id`,
    // B.`gexp_pi_beneficiary_id`,
    // B.`gexp_pi_freight_company` AS ShipComp,
    // B.`gexp_pi_freight_compcontact`,
    // B.`gexp_pi_freight_compnumber`,
    // B.`gexp_pi_freight_cost`,
    // B.`gexp_pi_loadport_id`,
    // D.`CustCompanyName` AS Consignee_Name,
    // E.`CustCompanyName` AS Notify_Name
    // FROM gexp_master_invoice AS A 
    // LEFT JOIN gexp_master_pi AS B ON A.`gexp_invoice_pi`=B.`gexp_pi_id`
    // LEFT JOIN gexp_master_customer AS C ON B.`gexp_pi_customer`=C.`CustId`
    // LEFT JOIN gexp_master_customer AS D ON B.`gexp_pi_consignee_id`=D.`CustId` 
    // LEFT JOIN gexp_master_customer AS E ON B.`gexp_pi_beneficiary_id`=E.`CustId` 
    // WHERE gexp_invoice_createdBy='$UserId';";
    // $res = $this->db->query($qry);
    $qry="SELECT 
    A.`gexp_invoice_id`,
    A.`gexp_invoice_no`,
        A.`gexp_invoice_pi`,
        A.`gexp_invoice_ffrn`,
        A.`gexp_invoice_statrows`,
        A.`gexp_invoice_createdBy`,
        B.`gexp_pi_customer`,
        B.`gexp_pi_statusPI`,
        B.`gexp_pi_consignee_id`,
        B.`gexp_pi_beneficiary_id`,
        C.`CustCompanyName` AS Notify_Name,
        C.`CustCompanyName` AS Consignee_Name,
        D.`BeneficiaryDesc` AS ShipComp FROM gexp_master_invoice AS A 
    LEFT JOIN gexp_master_pi AS B ON A.`gexp_invoice_pi`=B.`gexp_pi_id`
    LEFT JOIN gexp_master_customer AS C ON B.`gexp_pi_consignee_id`=C.`CustId`
    LEFT JOIN gexp_master_beneficiary AS D ON B.`gexp_pi_beneficiary_id`=D.`BeneficiaryId`";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->result();
    else
        return array();
}


function tambah_format_print($data2){
$qry=$this->db->insert('gexp_invoice_print',$data2);
    if(!$qry)
    {
        $error = $this->db->error();
        return $error;
            // return FALSE; // Has keys 'code' and 'message'
    }else{

        return TRUE;
    }
}


function getlistinvoice_all()
{
    $qry="SELECT * FROM gexp_master_invoice ORDER BY gexp_invoice_id DESC;";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->result();
    else
        return array();
}


function getlistinvoice_prospec_select()
{
    // $qry="SELECT * FROM gexp_master_spec AS A LEFT JOIN gexp_master_invoice As B ON A.`gexp_spec_invoice_id`=B.`gexp_invoice_id` WHERE A.`gexp_spec_invoice_id`<>B.`gexp_invoice_id` ORDER BY B.`gexp_invoice_id` DESC;";
    $qry="SELECT
            a.gexp_invoice_id, a.gexp_invoice_no
        FROM gexp_master_invoice a
        LEFT JOIN gexp_master_spec b ON a.gexp_invoice_id = b.gexp_spec_invoice_id
        WHERE b.gexp_spec_invoice_id IS NULL";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->result();
    else
        return array();
}

function getlistinvoice_byid($invoice_id)
{
    $qry="SELECT *, 
    C.`CustCompanyName` AS ConsigPT, C.`CustAddress` AS ConsigAddr, D.`CtName` AS ConsigCtName, 
    D.`CtPhone` AS ConsigCtPhone, D.`CtEmail` AS ConsiCtEmail, E.`BeneficiaryDesc` AS BenePT, E.`BeneficiaryAddr` AS BeneAddr, E.`BeneficiaryCP` AS BeneCtName, E.`BeneficiaryPhone` AS BeneCtPhone, 
	K.icon, K.name, L.AccountName print_name, M.IncotermCode,
    IF(D.CtIncoterm IN ('2','3'), G.DestinationPort, H.LoadPortDesc) tujuan
    FROM gexp_master_invoice AS A 
    LEFT JOIN gexp_master_pi AS B ON A.`gexp_invoice_pi`=B.`gexp_pi_id`
    left join gexp_master_customer AS C ON B.`gexp_pi_consignee_id`=C.`CustId`
    LEFT JOIN gexp_contact_cust AS D ON C.`CustId`=D.`CtTicketCustCode`
    LEFT JOIN gexp_master_beneficiary AS E ON B.`gexp_pi_beneficiary_id`=E.`BeneficiaryId`
    LEFT JOIN gexp_shipto_cust AS F ON C.`CustId`=F.`ShipCodeCust`
    LEFT JOIN gexp_shipto_port AS G ON F.`ShiptoId`=G.`ShiptoId`
    LEFT JOIN gexp_master_loadport AS H ON B.`gexp_pi_loadport_id`=H.`LoadPortId`
    LEFT JOIN gexp_master_country AS I ON C.`CustCountry`=I.`CountryId`
    LEFT JOIN gexp_master_packlist AS J ON A.`gexp_invoice_id`=J.`gexp_packlist_invoice_id`
	LEFT JOIN gexp_currency K ON B.gexp_pi_currency = K.id
    LEFT JOIN gexp_users L ON A.gexp_invoice_createdBy = L.UsersId
    LEFT JOIN gexp_master_incoterm M ON D.CtIncoterm = M.IncotermId
    WHERE A.`gexp_invoice_id`='$invoice_id';";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->row();
    else
        return array();
}

function getitem_purchasegood_bynopi($id_pi)
{
    // $qry="SELECT * FROM gexp_master_invoice AS A LEFT JOIN gexp_master_pi AS B ON A.`gexp_invoice_pi`=B.`gexp_pi_id`
    // LEFT JOIN gexp_pi_good AS C ON B.`gexp_pi_no`=C.`gexp_good_pi_no` 
    // LEFT JOIN gexp_master_packlist AS D ON A.`gexp_invoice_id`=D.`gexp_packlist_invoice_id`
    // LEFT JOIN gexp_packlist_detail AS E ON D.`gexp_packlist_no`=E.`gexp_packlist_number` AND C.`gexp_good_item_id`=E.`gexp_packlistdet_itemid`
    // WHERE C.`gexp_good_statsid`='1' AND B.`gexp_pi_id`='$id_pi' GROUP BY C.`gexp_good_item_id`";
    // $res = $this->db->query($qry);
    $qry="SELECT * FROM gexp_master_invoice AS A LEFT JOIN gexp_master_pi AS B ON A.`gexp_invoice_pi`=B.`gexp_pi_id`
    LEFT JOIN gexp_pi_good AS C ON B.`gexp_pi_no`=C.`gexp_good_pi_no`
    LEFT JOIN gexp_master_packlist AS D ON A.`gexp_invoice_id`=D.`gexp_packlist_invoice_id`
    LEFT JOIN gexp_packlist_detail AS E ON D.`gexp_packlist_no`=E.`gexp_packlist_number` AND C.`gexp_good_item_id`=E.`gexp_packlistdet_itemid` AND C.`gexp_good_hs_code`=E.`gexp_packlistdet_hscode`
    WHERE C.`gexp_good_statsid`='1' AND B.`gexp_pi_id`='$id_pi' GROUP BY C.`gexp_good_id`";
    $res = $this->db->query($qry);
    
    if ($res->num_rows() > 0)
        return $res->result();
    else
        return array();
}


function getitem_freegood_bynopi($id_pi)
{
    $qry="SELECT * FROM gexp_master_invoice AS A LEFT JOIN gexp_master_pi AS B ON A.`gexp_invoice_pi`=B.`gexp_pi_id`
    LEFT JOIN gexp_pi_good AS C ON B.`gexp_pi_no`=C.`gexp_good_pi_no`
    LEFT JOIN gexp_master_packlist AS D ON A.`gexp_invoice_id`=D.`gexp_packlist_invoice_id`
    LEFT JOIN gexp_packlist_detail AS E ON D.`gexp_packlist_no`=E.`gexp_packlist_number` AND C.`gexp_good_item_id`=E.`gexp_packlistdet_itemid` AND C.`gexp_good_hs_code`=E.`gexp_packlistdet_hscode`
    WHERE C.`gexp_good_statsid`='2' AND B.`gexp_pi_id`='$id_pi' GROUP BY C.`gexp_good_id`";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->result();
    else
        return array();
}

function checkvalue_printout($invoice_id)
{
    // $qry="SELECT * FROM gexp_master_invoice AS A LEFT JOIN gexp_invoice_print AS B ON A.`gexp_invoice_no`=B.inv_print_no WHERE A.`gexp_invoice_id`='$invoice_id'";
	
    $qry="SELECT *
    FROM gexp_master_invoice AS A
    LEFT JOIN gexp_invoice_print AS B ON A.`gexp_invoice_no`=B.inv_print_no
    LEFT JOIN gexp_master_pi C ON A.gexp_invoice_pi = C.gexp_pi_id
    JOIN gexp_currency D ON C.gexp_pi_currency = D.id WHERE A.`gexp_invoice_id`='$invoice_id'";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->row();
    else
        return array();
}


function summary_purchasegood($invoice_id)
{
    $qry="SELECT *,SUM(gexp_good_qty) AS TotalQty_PurchaseGood, SUM(gexp_good_totals) AS TotalAmount_PurchaseGood FROM gexp_master_invoice AS A LEFT JOIN gexp_master_pi AS B ON A.`gexp_invoice_pi`=B.`gexp_pi_id`
    LEFT JOIN gexp_pi_good AS C ON B.`gexp_pi_no`=C.`gexp_good_pi_no` WHERE A.`gexp_invoice_id`='$invoice_id' AND C.`gexp_good_statsid`='1'";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->row();
    else
        return array();
}

function summary_freegood($invoice_id)
{
    $qry="SELECT *,SUM(gexp_good_qty) AS TotalQty_FreeGood, SUM(gexp_good_totals) AS TotalAmount_FreeGood FROM gexp_master_invoice AS A LEFT JOIN gexp_master_pi AS B ON A.`gexp_invoice_pi`=B.`gexp_pi_id`
    LEFT JOIN gexp_pi_good AS C ON B.`gexp_pi_no`=C.`gexp_good_pi_no` WHERE A.`gexp_invoice_id`='$invoice_id' AND C.`gexp_good_statsid`='2'";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->row();
    else
        return array();
}


function SearchByReq($inv_no,$date_a,$date_b,$cust_name,$cust_country)
{
    $qry="SELECT *,
    A.`gexp_invoice_id`,
    A.`gexp_invoice_no`,
        A.`gexp_invoice_pi`,
        A.`gexp_invoice_ffrn`,
        A.`gexp_invoice_statrows`,
        A.`gexp_invoice_createdBy`,
        B.`gexp_pi_customer`,
        B.`gexp_pi_statusPI`,
        B.`gexp_pi_consignee_id`,
        B.`gexp_pi_beneficiary_id`,
        C.`CustCompanyName` AS Notify_Name,
        C.`CustCompanyName` AS Consignee_Name,
        D.`BeneficiaryDesc` AS ShipComp FROM gexp_master_invoice AS A 
    LEFT JOIN gexp_master_pi AS B ON A.`gexp_invoice_pi`=B.`gexp_pi_id`
    LEFT JOIN gexp_master_customer AS C ON B.`gexp_pi_consignee_id`=C.`CustId`
    LEFT JOIN gexp_master_beneficiary AS D ON B.`gexp_pi_beneficiary_id`=D.`BeneficiaryId`
    LEFT JOIN gexp_master_country AS E ON C.`CustCountry`=E.`CountryId` WHERE A.`gexp_invoice_no` LIKE '%$inv_no%' AND C.`CustCompanyName` LIKE '%$cust_name%' AND E.`CountryName` LIKE '%$cust_country%'";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->result();
    else
        return array();
}


function currency_invoice($invoice_id)
{
    $qry="SELECT * FROM gexp_master_invoice AS A LEFT JOIN gexp_master_pi AS B ON A.`gexp_invoice_pi`=B.`gexp_pi_id` WHERE A.`gexp_invoice_id`='$invoice_id';";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->row();
    else
        return array();
}





}

