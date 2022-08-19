<?php
class MApproval extends CI_Model
{
	function __construct()
	{
		parent::__construct();
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
    A.`gexp_pi_consignee_id`,
    A.`gexp_pi_statusPI`, 
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
    WHERE A.`gexp_pi_statrow`='1' AND A.`gexp_pi_statusPI` = 1;";
    // WHERE A.`gexp_pi_statrow`='1' AND A.`gexp_pi_statusPI` BETWEEN '1' AND '3' OR '5';";
    // echo "<pre>$qry</pre>";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
            return $res->result();
        else
            return array();
}

function list_pi_invoice()
{
	$qry="SELECT a.gexp_pi_id, a.gexp_pi_no, b.gexp_invoice_pi FROM gexp_master_pi a
			LEFT JOIN gexp_master_invoice b ON a.gexp_pi_id = b.gexp_invoice_pi
			WHERE b.gexp_invoice_pi IS NULL;";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
            return $res->result();
        else
            return array();
}

function GetData_PI()
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
    A.`gexp_pi_consignee_id`,
    A.`gexp_pi_statusPI`, 
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
    WHERE A.`gexp_pi_statrow`='1' AND A.`gexp_pi_statusPI` = 3;";
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

function insert_exprequirement($data2){
    $qry=$this->db->insert('gexp_master_expreq',$data2);
    if(!$qry)
        {
            $error = $this->db->error();
            return $error;
            // return FALSE; // Has keys 'code' and 'message'
        }else{
            return TRUE;
        }
}


function GetList_expreq_PI()
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
    A.`gexp_pi_statusPI`,
    A.`gexp_pi_Expreq_isUpload`, 
    B.`CustCompanyName` AS Cust, 
    C.`CustCompanyName` AS Consig, 
    D.`CustCompanyName` AS Benefi, 
    E.`CountryName` AS Negara,
    F.`AccountName` AS PPIC 
    FROM gexp_master_pi AS A 
    LEFT JOIN gexp_master_customer AS B ON A.`gexp_pi_customer`=B.`CustId`
    LEFT JOIN gexp_master_customer AS C ON A.`gexp_pi_consignee_id`=C.`CustId` 
    LEFT JOIN gexp_master_customer AS D ON A.`gexp_pi_beneficiary_id`=D.`CustId`
    LEFT JOIN gexp_master_country AS E ON B.`CustCountry`=E.`CountryId`
    LEFT JOIN gexp_users AS F ON A.`gexp_pi_createdBy`=F.`UsersId`  
    WHERE A.`gexp_pi_statrow`='1' AND A.`gexp_pi_statusPI` BETWEEN '1' AND '3' AND A.`gexp_pi_isExpreq`='1';";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
            return $res->result();
        else
            return array();
}


function insert_sign_active($data2){
    $qry=$this->db->insert('gexp_sign_pi',$data2);
    if(!$qry)
        {
            $error = $this->db->error();
            // return $error;
            return FALSE; // Has keys 'code' and 'message'
        }else{
            return TRUE;
        }
}

function insert_expreq_active($data2){
    $qry=$this->db->insert('gexp_master_expreq',$data2);
    if(!$qry)
        {
            $error = $this->db->error();
            // return $error;
            return FALSE; // Has keys 'code' and 'message'
        }else{
            return TRUE;
        }
}

}