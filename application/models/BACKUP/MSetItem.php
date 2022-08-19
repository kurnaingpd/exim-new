<?php
class MSetItem extends CI_Model
{
	function __construct()
		{
			parent::__construct();
        }
        
    function GetListMasterItem(){
        $this->db->reconnect();
        $qry="SELECT * FROM gexp_master_item;";
        $res = $this->db->query($qry);

            if ($res->num_rows() > 0)
                return $res->result();
            else
                return array();
    }

    function CheckItemName($ItemName){
        $this->db->reconnect();
        $qry="SELECT * FROM gexp_master_item WHERE ItemName='$ItemName'";
        $res = $this->db->query($qry);

            if ($res->num_rows() > 0)
                return TRUE;
            else
                return FALSE;
    }

    function tambah_item($data){
        $qry=$this->db->insert('gexp_master_item',$data);
            if(!$qry)
            {
                $error = $this->db->error();
                return $error;
                    // return FALSE; // Has keys 'code' and 'message'
            }else{
                return TRUE;
            }
    }

    function getrows_itembyid($ItemId){
        $this->db->reconnect();
        $qry="SELECT * FROM gexp_master_item WHERE ItemId='$ItemId';";
        $res = $this->db->query($qry);

            if ($res->num_rows() > 0)
                return $res->row();
            else
                return array();
    }

    function update_master_item($data,$ItemId)
	{
			$this->db->where('ItemId', $ItemId);
            $qry=$this->db->update('gexp_master_item', $data);
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