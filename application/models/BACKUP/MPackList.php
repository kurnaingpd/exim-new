<?php
class MPackList extends CI_Model
{
	function __construct()
	{
		parent::__construct();
    }
        
        function GetLastPL_No(){
            $this->db->reconnect();
            $qry="SELECT * FROM gexp_master_packlist ORDER BY gexp_packlist_id DESC;";
            $res = $this->db->query($qry);

            if ($res->num_rows() > 0)
                return $res->row();
            else
                return array();
        }

        function GetListInvoice(){
            $this->db->reconnect();
            // $qry="SELECT * FROM gexp_master_invoice;";
			$qry="SELECT a.gexp_invoice_id, a.gexp_invoice_no, b.gexp_packlist_invoice_id invoice_id FROM gexp_master_invoice a
            LEFT JOIN gexp_master_packlist b ON a.gexp_invoice_id = b.gexp_packlist_invoice_id
            WHERE b.gexp_packlist_invoice_id IS NULL";
            $res = $this->db->query($qry);

            if ($res->num_rows() > 0)
                return $res->result();
            else
                return array();
        }


        function GetListItem_Qc(){
            $this->db->reconnect();
            $qry="SELECT * FROM gexp_master_item WHERE ItemStats='1'";
            $res = $this->db->query($qry);

            if ($res->num_rows() > 0)
                return $res->result();
            else
                return array();
        }

        function tambah_packlist($data){
            $qry=$this->db->insert('gexp_master_packlist',$data);
            if(!$qry)
                {
                    $error = $this->db->error();
                    return $error;
                    // return FALSE; // Has keys 'code' and 'message'
                }else{
                    return TRUE;
                }
        }

        function GetList_PackList()
        {
            $this->db->reconnect();
            $qry="SELECT
            A.`gexp_packlist_id`,
            A.`gexp_packlist_invoice_id`,
            A.`gexp_packlist_no`,
            A.`gexp_packlist_container`,
            A.`gexp_packlist_statrows`,
            A.`gexp_packlist_createdBy`,
            A.`gexp_packlist_date`,
            B.`gexp_invoice_id`,
            B.`gexp_invoice_no`,
            B.`gexp_invoice_pi`,
            C.`gexp_pi_id`,
            C.`gexp_pi_no`,
            C.`gexp_pi_statusPI`,
            C.`gexp_pi_freight_company` AS Shipcomp,
            C.`gexp_pi_consignee_id`,
            D.CustId,
            D.`CustCompanyName` AS Consignee_Name,
            C.`gexp_pi_beneficiary_id`,
            E.`CustCompanyName` AS Notify_Name, D.CustCountry, F.CountryName FROM gexp_master_packlist AS A 
            LEFT JOIN gexp_master_invoice AS B ON A.`gexp_packlist_invoice_id`=B.`gexp_invoice_id`
            LEFT JOIN gexp_master_pi AS C ON B.`gexp_invoice_pi`=C.`gexp_pi_id`
            LEFT JOIN gexp_master_customer AS D ON C.`gexp_pi_consignee_id`=D.`CustId`
            LEFT JOIN gexp_master_customer AS E ON C.`gexp_pi_beneficiary_id`=E.`CustId` 
            LEFT JOIN gexp_master_country F ON D.CustCountry = F.CountryId
            WHERE gexp_packlist_statrows='1'";
            $res = $this->db->query($qry);

            if ($res->num_rows() > 0)
                return $res->result();
            else
                return array();
        }

        public function customer()
        {
            $qry = "SELECT a.CustId, a.CustCode, a.CustCompanyName FROM gexp_master_customer a WHERE a.isStatCust = 1";
            $res = $this->db->query($qry);
            return $res->result();
        }

        public function country()
        {
            $qry = "SELECT a.CountryId, a.CountryCode, a.CountryName FROM gexp_master_country a WHERE a.CountryStats = 1";
            $res = $this->db->query($qry);
            return $res->result();
        }

        function GetSearch_PackList($params)
        {
            $this->db->reconnect();
            $qry="SELECT
            A.`gexp_packlist_id`,
            A.`gexp_packlist_invoice_id`,
            A.`gexp_packlist_no`,
            A.`gexp_packlist_container`,
            A.`gexp_packlist_statrows`,
            A.`gexp_packlist_createdBy`,
            A.`gexp_packlist_date`,
            B.`gexp_invoice_id`,
            B.`gexp_invoice_no`,
            B.`gexp_invoice_pi`,
            C.`gexp_pi_id`,
            C.`gexp_pi_no`,
            C.`gexp_pi_statusPI`,
            C.`gexp_pi_freight_company` AS Shipcomp,
            C.`gexp_pi_consignee_id`,
            D.CustId,
            D.`CustCompanyName` AS Consignee_Name,
            C.`gexp_pi_beneficiary_id`,
            E.`CustCompanyName` AS Notify_Name, D.CustCountry, F.CountryName FROM gexp_master_packlist AS A 
            LEFT JOIN gexp_master_invoice AS B ON A.`gexp_packlist_invoice_id`=B.`gexp_invoice_id`
            LEFT JOIN gexp_master_pi AS C ON B.`gexp_invoice_pi`=C.`gexp_pi_id`
            LEFT JOIN gexp_master_customer AS D ON C.`gexp_pi_consignee_id`=D.`CustId`
            LEFT JOIN gexp_master_customer AS E ON C.`gexp_pi_beneficiary_id`=E.`CustId` 
            LEFT JOIN gexp_master_country F ON D.CustCountry = F.CountryId
            WHERE gexp_packlist_statrows='1'";

            if($params['pl_number']) {
                $qry.= " AND A.`gexp_packlist_no` = '".$params['pl_number']."' ";
            }

            if( ($params['date_start']) AND ($params['date_end']) ) {
                $qry.= " AND A.`gexp_packlist_date` BETWEEN '".$params['date_start']."' AND '".$params['date_end']."' ";
            }

            if($params['customer']) {
                $qry.= " AND D.`CustId` = '".$params['customer']."' ";
            }

            if($params['country']) {
                $qry.= " AND D.CustCountry = '".$params['country']."' ";
            }

            $res = $this->db->query($qry);

            if ($res->num_rows() > 0)
                return $res->result();
            else
                return array();
        }


        function GetListItem_Pack($invoice_id){
            $this->db->reconnect();
            $qry="SELECT * FROM gexp_master_invoice AS A 
            LEFT JOIN gexp_master_pi AS B ON A.`gexp_invoice_pi`=B.`gexp_pi_id`
            LEFT JOIN gexp_pi_good AS C ON B.`gexp_pi_no`=C.`gexp_good_pi_no`
            LEFT JOIN gexp_master_item AS D ON C.`gexp_good_item_id`=D.`ItemId` WHERE A.`gexp_invoice_id`='$invoice_id'";
            $res = $this->db->query($qry);

            if ($res->num_rows() > 0)
                return $res->result();
            else
                return array();
        }

        function tambah_packlist_detail($data){
            $qry=$this->db->insert('gexp_packlist_detail',$data);
            if(!$qry)
                {
                    $error = $this->db->error();
                    return $error;
                    // return FALSE; // Has keys 'code' and 'message'
                }else{
                    return TRUE;
                }
        }

        function GetPackList_Row($Packlist_Id){
            $this->db->reconnect();
            $qry="SELECT * FROM gexp_master_packlist AS A LEFT JOIN gexp_master_invoice AS B ON A.`gexp_packlist_invoice_id`=B.`gexp_invoice_id` WHERE gexp_packlist_id='$Packlist_Id'";
            $res = $this->db->query($qry);

            if ($res->num_rows() > 0)
                return $res->row();
            else
                return array();
        }

        function GetListDetail_Pack($PackNo){
            $this->db->reconnect();
            $qry="SELECT * FROM gexp_packlist_detail
            AS A LEFT JOIN gexp_master_packlist AS B ON A.`gexp_packlist_number`=B.`gexp_packlist_no`
            LEFT JOIN gexp_master_invoice AS C ON B.`gexp_packlist_invoice_id`=C.`gexp_invoice_id`
            LEFT JOIN gexp_master_pi AS D ON C.`gexp_invoice_pi`=D.`gexp_pi_id`
            LEFT JOIN gexp_pi_good AS E ON D.`gexp_pi_no`=E.`gexp_good_pi_no`
            LEFT JOIN gexp_master_item AS F ON A.`gexp_packlistdet_itemid`=F.`ItemId`
            WHERE A.`gexp_packlist_number`='$PackNo' AND A.`gexp_packlistdet_itemid`=E.`gexp_good_item_id` GROUP BY A.`gexp_packlistdet_id`;";
            $res = $this->db->query($qry);

            if ($res->num_rows() > 0)
                return $res->result();
            else
                return array();
        }

function getprintout_prev($invoice_no)
{

    $this->db->reconnect();
    $qry="SELECT * FROM gexp_invoice_print WHERE inv_print_no='$invoice_no';";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->row();
    else
        return array();

}

function update_printout_prev($data, $invoice_no)
{
			$this->db->where('inv_print_no', $invoice_no);
            $qry=$this->db->update('gexp_invoice_print', $data);
            if(!$qry)
            {
                $error = $this->db->error();
                return $error;
                // return FALSE; // Has keys 'code' and 'message'
            }else{
                return TRUE;
            }
}


function update_container($data,$Packlist_Id)
{
			$this->db->where('gexp_packlist_id', $Packlist_Id);
            $qry=$this->db->update('gexp_master_packlist', $data);
            if(!$qry)
            {
                $error = $this->db->error();
                return $error;
                // return FALSE; // Has keys 'code' and 'message'
            }else{
                return TRUE;
            }
}

function getlistdetailpack_byid($gexp_packlist_id)
{

    $this->db->reconnect();
    $qry="SELECT * FROM gexp_packlist_detail AS A 
    LEFT JOIN gexp_master_packlist AS B ON A.`gexp_packlist_number`=B.`gexp_packlist_no`
    LEFT JOIN gexp_master_invoice AS C ON B.`gexp_packlist_invoice_id`=C.`gexp_invoice_id` WHERE gexp_packlistdet_id='$gexp_packlist_id';";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->row();
    else
        return array();

}


function update_packlistdet($data, $packdets_id)
{
			$this->db->where('gexp_packlistdet_id', $packdets_id);
            $qry=$this->db->update('gexp_packlist_detail', $data);
            if(!$qry)
            {
                $error = $this->db->error();
                // return $error;
                return FALSE; // Has keys 'code' and 'message'
            }else{
                return TRUE;
            }
}

function update_inv_isPL($data, $invoice_id)
{
			$this->db->where('gexp_invoice_id', $invoice_id);
            $qry=$this->db->update('gexp_master_invoice', $data);
            if(!$qry)
            {
                $error = $this->db->error();
                return $error;
                // return FALSE; // Has keys 'code' and 'message'
            }else{
                return TRUE;
            }
}

function get_detail_packlistreg($Packlist_Id)
{
    $this->db->reconnect();
    $qry="SELECT *, G.`CountryName` AS Consig_country, I.`CountryName` AS Benef_country FROM gexp_master_packlist AS A 
    LEFT JOIN gexp_master_invoice AS B ON A.`gexp_packlist_invoice_id`=B.`gexp_invoice_id`
    LEFT JOIN gexp_master_pi AS C ON B.`gexp_invoice_pi`=C.`gexp_pi_id`
    LEFT JOIN gexp_master_customer AS D On C.`gexp_pi_consignee_id`=D.`CustId`
    LEFT JOIN gexp_master_country AS G ON D.`CustCountry`=G.`CountryId`
    LEFT JOIN gexp_contact_cust AS H ON D.`CustId`=H.`CtTicketCustCode`
    LEFT JOIN gexp_master_beneficiary AS E ON C.`gexp_pi_beneficiary_id`=E.`BeneficiaryId`
    LEFT JOIN gexp_master_country AS I On E.`BeneficiaryCountry`=I.`CountryId`
    LEFT JOIN gexp_master_loadport AS F ON C.`gexp_pi_loadport_id`=F.`LoadPortId` WHERE A.`gexp_packlist_id`='$Packlist_Id';";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->row();
    else
        return array();
}

public function get_detail_data_printpack($Packlist_Id)
{
    $this->db->reconnect();
    $qry="SELECT *, E.`CustCompanyName` AS ConsigPT, E.`CustAddress` AS ConsigAddr, G.`CtName` AS ConsigCtName, G.`CtPhone` AS ConsigCtPhone, F.`BeneficiaryDesc` AS BenePT, F.`BeneficiaryAddr` AS BeneAddr,
    F.`BeneficiaryCP` AS BeneCtName, F.`BeneficiaryPhone` AS BeneCtPhone, H.`DischargePort` AS DischargeCust, K.AccountName print_name
    FROM gexp_packlist_detail AS A 
    LEFT JOIN gexp_master_packlist AS B ON A.`gexp_packlist_number`=B.`gexp_packlist_no`
    LEFT JOIN gexp_master_invoice AS C ON B.`gexp_packlist_invoice_id`=C.`gexp_invoice_id`
    LEFT JOIN gexp_master_pi AS D ON C.`gexp_invoice_pi`=D.`gexp_pi_id` 
    LEFT JOIN gexp_master_customer AS E ON D.`gexp_pi_consignee_id`=E.`CustId` 
    LEFT JOIN gexp_master_beneficiary AS F ON D.`gexp_pi_beneficiary_id`=F.`BeneficiaryId`
    LEFT JOIN gexp_contact_cust AS G ON E.`CustId`=G.`CtTicketCustCode` 
    LEFT JOIN gexp_shipto_port AS H ON E.`CustId`=H.`ShiptoCust`
    LEFT JOIN gexp_master_loadport AS I ON D.`gexp_pi_loadport_id`=I.`LoadPortId`
    LEFT JOIN gexp_master_country AS J ON E.`CustCountry`=J.`CountryId`
	LEFT JOIN gexp_users K ON B.gexp_packlist_createdBy = K.UsersId
    WHERE B.`gexp_packlist_id`='$Packlist_Id';";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->row();
    else
        return array();
}

public function get_lsdetail_datapack($Packlist_Id)
{
    $this->db->reconnect();
    // $qry="SELECT *, E.`CustCompanyName` AS ConsigPT, E.`CustAddress` AS ConsigAddr, G.`CtName` AS ConsigCtName, G.`CtPhone` AS ConsigCtPhone, F.`BeneficiaryDesc` AS BenePT, F.`BeneficiaryAddr` AS BeneAddr,
    // F.`BeneficiaryCP` AS BeneCtName, F.`BeneficiaryPhone` AS BeneCtPhone, H.`DischargePort` AS DischargeCust
    // FROM gexp_packlist_detail AS A 
    // LEFT JOIN gexp_master_packlist AS B ON A.`gexp_packlist_number`=B.`gexp_packlist_no`
    // LEFT JOIN gexp_master_invoice AS C ON B.`gexp_packlist_invoice_id`=C.`gexp_invoice_id`
    // LEFT JOIN gexp_master_pi AS D ON C.`gexp_invoice_pi`=D.`gexp_pi_id` 
    // LEFT JOIN gexp_master_customer AS E ON D.`gexp_pi_consignee_id`=E.`CustId` 
    // LEFT JOIN gexp_master_beneficiary AS F ON D.`gexp_pi_beneficiary_id`=F.`BeneficiaryId`
    // LEFT JOIN gexp_contact_cust AS G ON E.`CustId`=G.`CtTicketCustCode` 
    // LEFT JOIN gexp_shipto_port AS H ON E.`CustId`=H.`ShiptoCust`
    // LEFT JOIN gexp_master_loadport AS I ON D.`gexp_pi_loadport_id`=I.`LoadPortId`
    // LEFT JOIN gexp_master_country AS J ON E.`CustCountry`=J.`CountryId`
    // LEFT JOIN gexp_pi_good AS K ON D.`gexp_pi_no`=K.`gexp_good_pi_no`
    // LEFT JOIN gexp_master_item AS L ON K.`gexp_good_item_id`=L.`ItemId`
    // WHERE a.`gexp_packlistdet_id`='$Packlist_Id';";
    $qry="SELECT * FROM gexp_packlist_detail
    AS A LEFT JOIN gexp_master_packlist AS B ON A.`gexp_packlist_number`=B.`gexp_packlist_no`
    LEFT JOIN gexp_master_invoice AS C ON B.`gexp_packlist_invoice_id`=C.`gexp_invoice_id`
    LEFT JOIN gexp_master_pi AS D ON C.`gexp_invoice_pi`=D.`gexp_pi_id`
    LEFT JOIN gexp_pi_good AS E ON D.`gexp_pi_no`=E.`gexp_good_pi_no`
    LEFT JOIN gexp_master_item AS F ON A.`gexp_packlistdet_itemid`=F.`ItemId`
    WHERE B.`gexp_packlist_id`='$Packlist_Id' AND A.`gexp_packlistdet_itemid`=E.`gexp_good_item_id` GROUP BY A.`gexp_packlistdet_id`";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->result();
    else
        return array();
}


public function get_checkprint($Packlist_Id)
{
    $qry="SELECT * FROM gexp_master_packlist AS A LEFT JOIN gexp_master_invoice AS B ON A.`gexp_packlist_invoice_id`=B.`gexp_invoice_id` LEFT JOIN gexp_invoice_print AS C ON B.`gexp_invoice_no`=C.`inv_print_no` WHERE A.`gexp_packlist_id`='$Packlist_Id'";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->result();
    else
        return array();
}


public function getsum_qty_packlist($Packlist_Id)
{
    $qry="SELECT *,SUM(gexp_good_qty) AS Total_Qty FROM gexp_packlist_detail
    AS A LEFT JOIN gexp_master_packlist AS B ON A.`gexp_packlist_number`=B.`gexp_packlist_no`
    LEFT JOIN gexp_master_invoice AS C ON B.`gexp_packlist_invoice_id`=C.`gexp_invoice_id`
    LEFT JOIN gexp_master_pi AS D ON C.`gexp_invoice_pi`=D.`gexp_pi_id`
    LEFT JOIN gexp_pi_good AS E ON D.`gexp_pi_no`=E.`gexp_good_pi_no`
    LEFT JOIN gexp_master_item AS F ON A.`gexp_packlistdet_itemid`=F.`ItemId`
    WHERE B.`gexp_packlist_id`='$Packlist_Id' AND A.`gexp_packlistdet_itemid`=E.`gexp_good_item_id` GROUP BY A.`gexp_packlist_number`;";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->result();
    else
        return array();
}

public function getsum_nett_packlist($Packlist_Id)
{
    $qry="SELECT *,SUM(ItemNetWeight) AS Total_Nett FROM gexp_packlist_detail
    AS A LEFT JOIN gexp_master_packlist AS B ON A.`gexp_packlist_number`=B.`gexp_packlist_no`
    LEFT JOIN gexp_master_invoice AS C ON B.`gexp_packlist_invoice_id`=C.`gexp_invoice_id`
    LEFT JOIN gexp_master_pi AS D ON C.`gexp_invoice_pi`=D.`gexp_pi_id`
    LEFT JOIN gexp_pi_good AS E ON D.`gexp_pi_no`=E.`gexp_good_pi_no`
    LEFT JOIN gexp_master_item AS F ON A.`gexp_packlistdet_itemid`=F.`ItemId`
    WHERE B.`gexp_packlist_id`='$Packlist_Id' AND A.`gexp_packlistdet_itemid`=E.`gexp_good_item_id` GROUP BY A.`gexp_packlist_number`;";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->result();
    else
        return array();
}

public function getsum_gross_packlist($Packlist_Id)
{
    $qry="SELECT *,SUM(ItemGrossWeight) AS Total_Gross FROM gexp_packlist_detail
    AS A LEFT JOIN gexp_master_packlist AS B ON A.`gexp_packlist_number`=B.`gexp_packlist_no`
    LEFT JOIN gexp_master_invoice AS C ON B.`gexp_packlist_invoice_id`=C.`gexp_invoice_id`
    LEFT JOIN gexp_master_pi AS D ON C.`gexp_invoice_pi`=D.`gexp_pi_id`
    LEFT JOIN gexp_pi_good AS E ON D.`gexp_pi_no`=E.`gexp_good_pi_no`
    LEFT JOIN gexp_master_item AS F ON A.`gexp_packlistdet_itemid`=F.`ItemId`
    WHERE B.`gexp_packlist_id`='$Packlist_Id' AND A.`gexp_packlistdet_itemid`=E.`gexp_good_item_id` GROUP BY A.`gexp_packlist_number`;";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->result();
    else
        return array();
}

public function getsum_cbm_packlist($Packlist_Id)
{
    $qry="SELECT *,SUM(gexp_packlistdet_cbm) AS Total_Cbm FROM gexp_packlist_detail
    AS A LEFT JOIN gexp_master_packlist AS B ON A.`gexp_packlist_number`=B.`gexp_packlist_no`
    LEFT JOIN gexp_master_invoice AS C ON B.`gexp_packlist_invoice_id`=C.`gexp_invoice_id`
    LEFT JOIN gexp_master_pi AS D ON C.`gexp_invoice_pi`=D.`gexp_pi_id`
    LEFT JOIN gexp_pi_good AS E ON D.`gexp_pi_no`=E.`gexp_good_pi_no`
    LEFT JOIN gexp_master_item AS F ON A.`gexp_packlistdet_itemid`=F.`ItemId`
    WHERE B.`gexp_packlist_id`='$Packlist_Id' AND A.`gexp_packlistdet_itemid`=E.`gexp_good_item_id` GROUP BY A.`gexp_packlist_number`;";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->result();
    else
        return array();
}


}