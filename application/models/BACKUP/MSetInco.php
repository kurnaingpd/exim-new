<?php
class MSetInco extends CI_Model
{
	function __construct()
		{
			parent::__construct();
        }
        
    function GetListMasterInco(){
            $this->db->reconnect();
            $qry="SELECT * FROM gexp_master_incoterm WHERE IncotermStats='1';";
            $res = $this->db->query($qry);

            if ($res->num_rows() > 0)
                return $res->result();
            else
                return array();
    }

    function CheckCode($IncoCode){
        $this->db->reconnect();
        $qry="SELECT * FROM gexp_master_incoterm WHERE IncotermCode='$IncoCode'";
        $res = $this->db->query($qry);

        if ($res->num_rows() > 0)
            return TRUE;
        else
            return FALSE;
    }

    function tambah_incoterm($data){
        $qry=$this->db->insert('gexp_master_incoterm',$data);
        if(!$qry)
            {
                $error = $this->db->error();
                return $error;
                // return FALSE; // Has keys 'code' and 'message'
            }else{
                return TRUE;
            }
    }

    function GetListRowMasterInco($IncotermId){
        $this->db->reconnect();
        $qry="SELECT * FROM gexp_master_incoterm WHERE IncotermId='$IncotermId'";
        $res = $this->db->query($qry);

        if ($res->num_rows() > 0)
            return $res->result();
        else
            return array();
    }

    function update_inco($IncotermId,$data){

		$this->db->where('IncotermId', $IncotermId);
        $qry=$this->db->update('gexp_master_incoterm', $data);
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