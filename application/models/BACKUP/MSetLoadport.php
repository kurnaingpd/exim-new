<?php
class MSetLoadport extends CI_Model
{
	function __construct()
		{
			parent::__construct();
        }
        
    function GetListMasterLoadport(){
            $this->db->reconnect();
            $qry="SELECT * FROM gexp_master_loadport;";
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

    function tambah_loadport($data){
        $qry=$this->db->insert('gexp_master_loadport',$data);
        if(!$qry)
            {
                $error = $this->db->error();
                return $error;
                // return FALSE; // Has keys 'code' and 'message'
            }else{
                return TRUE;
            }
    }

    function GetListRowMasterloadport($LoadPortId){
        $this->db->reconnect();
        $qry="SELECT * FROM gexp_master_loadport WHERE LoadPortId='$LoadPortId'";
        $res = $this->db->query($qry);

        if ($res->num_rows() > 0)
            return $res->result();
        else
            return array();
    }

    function update_loadport($LoadportId,$data){

		$this->db->where('LoadPortId', $LoadportId);
        $qry=$this->db->update('gexp_master_loadport', $data);
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