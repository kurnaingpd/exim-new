<?php
	class MSpp extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
        }
        
        function GetLastNo_Spp(){
            $this->db->reconnect();
            $qry="SELECT * FROM gexp_master_spp ORDER BY gexp_spp_id DESC;";
            $res = $this->db->query($qry);

            if ($res->num_rows() > 0)
                return $res->row();
            else
                return array();
        }

        function getlist_invno(){
            $this->db->reconnect();
            // $qry="SELECT * FROM gexp_master_invoice AS A LEFT JOIN gexp_master_spp AS B ON A.`gexp_invoice_id`=B.`gexp_spp_inv_id` WHERE A.`gexp_invoice_id`<>B.`gexp_spp_inv_id`;";
            $qry="SELECT A.gexp_invoice_id, A.gexp_invoice_no, B.gexp_spp_inv_id
                FROM gexp_master_invoice AS A
                LEFT JOIN gexp_master_spp AS B ON A.`gexp_invoice_id`=B.`gexp_spp_inv_id`
                WHERE B.`gexp_spp_inv_id` IS NULL;";
            $res = $this->db->query($qry);

            if ($res->num_rows() > 0)
                return $res->result();
            else
                return array();
        }

        function tambah_master_spp($data){
            $qry=$this->db->insert('gexp_master_spp',$data);
            if(!$qry)
                {
                    $error = $this->db->error();
                    return $error;
                    // return FALSE; // Has keys 'code' and 'message'
                }else{
                    return TRUE;
                }
        }

        function tambah_detailmaster_spp($data){
            $qry=$this->db->insert('gexp_spp_item',$data);
            if(!$qry)
                {
                    $error = $this->db->error();
                    return $error;
                    // return FALSE; // Has keys 'code' and 'message'
                }else{
                    return TRUE;
                }
        }

        function GetListMaster_Spp(){
            $this->db->reconnect();
            $qry="SELECT * FROM gexp_master_spp AS A LEFT JOIN gexp_master_invoice AS B ON A.`gexp_spp_inv_id`=B.`gexp_invoice_id` ORDER BY gexp_spp_id DESC;";
            $res = $this->db->query($qry);

            if ($res->num_rows() > 0)
                return $res->result();
            else
                return array();
        }

        function getrowmaster_sppbyid($gexp_spp_id){
            $this->db->reconnect();
            $qry="SELECT * FROM gexp_master_spp AS A LEFT JOIN gexp_master_invoice AS B ON A.`gexp_spp_inv_id`=B.`gexp_invoice_id` WHERE A.`gexp_spp_id`='$gexp_spp_id';";
            $res = $this->db->query($qry);

            if ($res->num_rows() > 0)
                return $res->row();
            else
                return array();
        }


        function update_descmaster_spp($data, $gexp_spp_id)
{
			$this->db->where('gexp_spp_id', $gexp_spp_id);
            $qry=$this->db->update('gexp_master_spp', $data);
            if(!$qry)
            {
                $error = $this->db->error();
                return $error;
                // return FALSE; // Has keys 'code' and 'message'
            }else{
                return TRUE;
            }
}

function getlist_details_Spp($gexp_spp_id)
{
    $this->db->reconnect();
    $qry="SELECT * FROM gexp_spp_item WHERE spp_headid='$gexp_spp_id'";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->result();
    else
        return array();
}



}