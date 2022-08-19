<?php
class MExportRequire extends CI_Model
{
		function __construct()
		{
			parent::__construct();
        }
		
		
function GetList_PI_Approved()
{
		
	$qry="SELECT * FROM gexp_master_pi WHERE gexp_pi_statrow='1' AND gexp_pi_statusPI='1';";
	$res = $this->db->query($qry);
		
	if ($res->num_rows() > 0)
		return $res->result();
	else
		return array();
}

function GetList_PI($params = NULL)
{
		
	$qry="SELECT * FROM gexp_master_pi AS A 
	LEFT JOIN gexp_master_customer AS B ON A.`gexp_pi_consignee_id`=B.`CustId`
	LEFT JOIN gexp_master_country AS C ON B.`CustCountry`=C.`CountryId`
	LEFT JOIN gexp_master_expreq AS D ON A.`gexp_pi_id`=D.`gexp_expreq_pi_id` 
	WHERE A.gexp_pi_statusPI='1' AND A.gexp_pi_statrow='1' ";

	if($params) {
		if($params['pi']) {
			$qry.=" AND A.gexp_pi_no = '".$params['pi']."'";
		}

		if($params['pi_date_start'] && $params['pi_date_end']) {
			$qry.=" AND A.gexp_pi_date BETWEEN '".$params['pi_date_start']."' AND '".$params['pi_date_end']."'";
		}

		if($params['status']) {
			$qry.=" AND D.gexp_expreq_statusDoc = ".$params['status']." ";
		}
	}

	$qry.=" ORDER BY A.`gexp_pi_id` DESC;";
	$res = $this->db->query($qry);
		
	if ($res->num_rows() > 0)
		return $res->result();
	else
		return array();
}

function Getexpreq_rows($exp_id)
{
		
	$qry="SELECT * FROM gexp_master_expreq WHERE gexp_expreq_statrows='1' AND gexp_expreq_id='$exp_id';";
	$res = $this->db->query($qry);
		
	if ($res->num_rows() > 0)
		return $res->row();
	else
		return array();
}

function update_expreq($data, $exp_id)
{
			$this->db->where('gexp_expreq_id', $exp_id);
            $qry=$this->db->update('gexp_master_expreq', $data);
            if(!$qry)
            {
                $error = $this->db->error();
                // return $error;
                return FALSE; // Has keys 'code' and 'message'
            }else{
                return TRUE;
            }
}


function getsearchdata($num_pi,$date_a,$date_b,$pi_cust,$pi_country)
{
		
	// $qry="SELECT * FROM gexp_master_pi AS A 
	// LEFT JOIN gexp_master_customer AS B ON A.`gexp_pi_customer`=B.`CustId`
	// LEFT JOIN gexp_master_country AS C ON B.`CustCountry`=C.`CountryId`
	// LEFT JOIN gexp_master_expreq AS D ON A.`gexp_pi_id`=D.`gexp_expreq_id` 
	// WHERE A.gexp_pi_statusPI='1' AND A.gexp_pi_statrow='1'";

	$qry="SELECT * FROM gexp_master_pi AS A 
	LEFT JOIN gexp_master_customer AS B ON A.`gexp_pi_consignee_id`=B.`CustId`
	LEFT JOIN gexp_master_country AS C ON B.`CustCountry`=C.`CountryId`
	LEFT JOIN gexp_master_expreq AS D ON A.`gexp_pi_id`=D.`gexp_expreq_pi_id` 
	WHERE A.gexp_pi_statusPI='1' AND A.gexp_pi_statrow='1'";

	
	if(($num_pi)) $qry.= " AND A.`gexp_pi_no` LIKE '%$num_pi%'";
	if(($pi_cust)) $qry.= " AND B.`CustCompanyName` LIKE '%$pi_cust%'";
	if(($pi_country)) $qry.= " AND C.`CountryName` LIKE '%$pi_country%'";
	if(($date_a) AND ($date_b)) $qry.= " AND A.`gexp_pi_date` BETWEEN '$date_a' AND '$date_b' ";

	// echo "<pre>$qry</pre>";

	$res = $this->db->query($qry);
		
	if ($res->num_rows() > 0)
		return $res->result();
	else
		return array();
}
        

}