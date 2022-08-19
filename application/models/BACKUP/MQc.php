<?php
class MQc extends CI_Model
{
	function __construct()
	{
		parent::__construct();
    }
        
        function GetLastQc_No(){
            $this->db->reconnect();
            $qry="SELECT * FROM gexp_master_qc ORDER BY gexp_qc_id DESC;";
            $res = $this->db->query($qry);

            if ($res->num_rows() > 0)
                return $res->row();
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

        function tambah_qc($data){
            $qry=$this->db->insert('gexp_master_qc',$data);
            if(!$qry)
                {
                    $error = $this->db->error();
                    return $error;
                    // return FALSE; // Has keys 'code' and 'message'
                }else{
                    return TRUE;
                }
        }

        function GetList_Qc(){
            $this->db->reconnect();
            $qry="SELECT * FROM gexp_master_qc AS A LEFT JOIN gexp_master_item AS B ON A.`gexp_qc_item_id`=B.`ItemId` WHERE gexp_qc_statrows='1';";
            $res = $this->db->query($qry);

            if ($res->num_rows() > 0)
                return $res->result();
            else
                return array();
        }

        function GetList_DetailQc($gexp_qc_id){
            $this->db->reconnect();
            $qry="SELECT * FROM gexp_master_qc AS A LEFT JOIN gexp_master_item AS B ON A.`gexp_qc_item_id`=B.`ItemId` WHERE gexp_qc_statrows='1' AND A.`gexp_qc_id`='$gexp_qc_id';";
            $res = $this->db->query($qry);

            if ($res->num_rows() > 0)
                return $res->row();
            else
                return array();
        }

        function GetLast_qs_no()
        {
            $qry="SELECT * FROM gexp_master_qs ORDER BY gexp_qs_no DESC;";
            $res = $this->db->query($qry);
        
            if ($res->num_rows() > 0)
                return $res->row();
            else
                return array();
        }

        public function getcoa_details($coa_id){
            $sql ="SELECT * FROM gexp_master_coa AS A LEFT JOIN gexp_master_invoice AS B ON A.`gexp_coa_invoice`=B.`gexp_invoice_id` WHERE A.`gexp_coa_id`='$coa_id';";
        
            $query = $this->db->query($sql);
            $result = $query->result_array();
        
            return $result;
        }


        function tambah_qs($data){
            $qry=$this->db->insert('gexp_master_qs',$data);
            if(!$qry)
                {
                    $error = $this->db->error();
                    return $error;
                    // return FALSE; // Has keys 'code' and 'message'
                }else{
                    return TRUE;
                }
        }

        function invoice()
        {
            $qry = "SELECT
                        a.gexp_invoice_id, a.gexp_invoice_no, b.gexp_qs_invoice_id
                    FROM gexp_master_invoice a
                    LEFT JOIN gexp_master_qs b ON a.gexp_invoice_id = b.gexp_qs_invoice_id
                    WHERE b.gexp_qs_invoice_id IS NULL";
            $res = $this->db->query($qry);

            return $res->result();
        }

        function customer()
        {
            $qry = "SELECT
                        a.CustId, a.CustCode, a.CustCompanyName
                    FROM gexp_master_customer a
                    WHERE a.isStatCust = 1";
            $res = $this->db->query($qry);

            return $res->result();
        }

        function country()
        {
            $qry = "SELECT
                        a.CountryId, a.CountryCode, a.CountryName
                    FROM gexp_master_country a
                    WHERE a.CountryStats = 1
                    ORDER BY CountryName";
            $res = $this->db->query($qry);

            return $res->result();
        }

        function GetList_Qcert(){
            $this->db->reconnect();
            $qry="SELECT * FROM 
            gexp_master_qs AS A 
            LEFT JOIN gexp_master_invoice AS B ON A.`gexp_qs_invoice_id`=B.`gexp_invoice_id` WHERE gexp_qs_statusrows='1'";
            $res = $this->db->query($qry);

            if ($res->num_rows() > 0)
                return $res->result();
            else
                return array();
        }

        function search($params)
        {
            $qry = "SELECT * FROM 
                    gexp_master_qs AS A 
                    LEFT JOIN gexp_master_invoice AS B ON A.`gexp_qs_invoice_id`=B.`gexp_invoice_id` WHERE gexp_qs_statusrows='1'";
            
            if($params['qc_no'])
                $qry.=" AND A.gexp_qs_no = '".$params['qc_no']."'";

            if( ($params['qc_date_start']) AND ($params['qc_date_start']) )
                $qry.=" AND gexp_qs_date BETWEEN '".$params['qc_date_start']."' AND '".$params['qc_date_end']."'";

            // echo "<pre>$qry</pre>";
            
            $res = $this->db->query($qry);
            return $res->result();
        }

        function getrows_qcert($qs_id)
        {
            $this->db->reconnect();
            $qry="SELECT * FROm 
            gexp_master_qs AS A 
            LEFT JOIN gexp_master_invoice As B On A.`gexp_qs_invoice_id`=B.`gexp_invoice_id`
            LEFT JOIN gexp_master_packlist AS C ON B.`gexp_invoice_id`=C.`gexp_packlist_invoice_id`
            LEFT JOIN gexp_master_pi AS D ON B.`gexp_invoice_pi`=D.`gexp_pi_id`
            LEFT JOIN gexp_master_customer AS E ON D.`gexp_pi_consignee_id`=E.`CustId`
            LEFT JOIN gexp_master_coa AS F ON A.`gexp_qs_coa_id`=F.`gexp_coa_id`
            WHERE A.`gexp_qs_statusrows`='1' AND A.`gexp_qs_id`='$qs_id'";
            $res = $this->db->query($qry);

            if ($res->num_rows() > 0)
                return $res->row();
            else
                return array();
        }

        function getlistitem_qs($qs_id)
        {
            $this->db->reconnect();
            $qry="SELECT * FROM 
            gexp_master_qs AS A 
            LEFT JOIN gexp_master_invoice AS B ON A.`gexp_qs_invoice_id`=B.`gexp_invoice_id`
            LEFT JOIN gexp_master_packlist AS C ON B.`gexp_invoice_id`=C.`gexp_packlist_invoice_id`
            LEFT JOIN gexp_master_pi AS D ON B.`gexp_invoice_pi`=D.`gexp_pi_id`
            LEFT JOIN gexp_master_customer AS E ON D.`gexp_pi_consignee_id`=E.`CustId`
            LEFT JOIN gexp_master_coa AS F ON A.`gexp_qs_coa_id`=F.`gexp_coa_id`
            LEFT JOIN gexp_packlist_detail AS G ON C.`gexp_packlist_no`=G.`gexp_packlist_number`
            INNER JOIN gexp_coa_detail AS H ON F.`gexp_coa_id`=H.`detail_coa_head` AND G.`gexp_packlistdet_itemid`=H.`detail_coa_itemid`
            LEFT JOIN gexp_master_qc AS I ON H.`detail_coa_qcid`=I.`gexp_qc_id`
            LEFT JOIN gexp_master_item AS J ON G.`gexp_packlistdet_itemid`=J.`ItemId`
            WHERE A.`gexp_qs_statusrows`='1' AND A.`gexp_qs_id`='$qs_id'";
            $res = $this->db->query($qry);

            if ($res->num_rows() > 0)
                return $res->result();
            else
                return array();
        }

    function update_qc_byid($data,$qc_id)
{
			$this->db->where('gexp_qc_id', $qc_id);
            $qry=$this->db->update('gexp_master_qc', $data);
            if(!$qry)
            {
                $error = $this->db->error();
                return FALSE; // Has keys 'code' and 'message'
            }else{
                return TRUE;
            }
}


function searchdata_byreq($produk,$prd_date,$exp_date){
    $this->db->reconnect();
    $qry="SELECT * FROM gexp_master_qc AS A LEFT JOIN gexp_master_item AS B ON A.`gexp_qc_item_id`=B.`ItemId` WHERE gexp_qc_statrows='1' AND B.`ItemName` LIKE '%$produk%' AND A.`gexp_qc_production_date` LIKE '%$prd_date%' AND A.`gexp_qc_expired_date` LIKE '%$exp_date%';";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->result();
    else
        return array();
}


function tambah_qc_file($data){
    $qry=$this->db->insert('gexp_qc_file',$data);
    if(!$qry)
        {
            $error = $this->db->error();
            return $error;
            // return FALSE; // Has keys 'code' and 'message'
        }else{
            return TRUE;
        }
}


function GetList_Lamp($QcId){
    $this->db->reconnect();
    $qry="SELECT * FROM gexp_qc_file WHERE qc_master_id='$QcId'";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->result();
    else
        return array();
}

function GetRowList_Lamp($Qc_File_Id){
    $this->db->reconnect();
    $qry="SELECT * FROM gexp_qc_file WHERE qc_file_id='$Qc_File_Id'";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->row();
    else
        return array();
}


}