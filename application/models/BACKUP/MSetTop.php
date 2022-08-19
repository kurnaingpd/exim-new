<?php
class MSetTop extends CI_Model
{
	function __construct()
		{
			parent::__construct();
        }
        
    function GetListMasterTop(){
            $this->db->reconnect();
            $qry="SELECT * FROM gexp_master_top WHERE TopStats='1';";
            $res = $this->db->query($qry);

            if ($res->num_rows() > 0)
                return $res->result();
            else
                return array();
    }

    function CheckTopDesc($TopDesc){
        $this->db->reconnect();
        $qry="SELECT * FROM gexp_master_top WHERE TopDesc='$TopDesc'";
        $res = $this->db->query($qry);

        if ($res->num_rows() > 0)
            return TRUE;
        else
            return FALSE;
    }

    function tambah_top($data){
        $qry=$this->db->insert('gexp_master_top',$data);
        if(!$qry)
            {
                $error = $this->db->error();
                return $error;
                // return FALSE; // Has keys 'code' and 'message'
            }else{
                return TRUE;
            }
    }

    function GetListRowMasterTop($TopId){
        $this->db->reconnect();
        $qry="SELECT * FROM gexp_master_top WHERE TopId='$TopId'";
        $res = $this->db->query($qry);

        if ($res->num_rows() > 0)
            return $res->result();
        else
            return array();
    }

    function update_top($TopId,$data){

		$this->db->where('TopId', $TopId);
        $qry=$this->db->update('gexp_master_top', $data);
        if(!$qry)
            {
            $error = $this->db->error();
            return $error;
                // return FALSE; // Has keys 'code' and 'message'
        }else{
            return TRUE;
        }
    }



}