<?php
class MUom extends CI_Model
{
	function __construct()
		{
			parent::__construct();
        }

function GetAll_Search()
{
    // $this->db->reconnect();
    $qry="SELECT * FROM gimp_mt_uom WHERE mt_uom_stats BETWEEN '1' AND '2';";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->result();
    else
        return array();       
}


function GetFilterSearch($params1,$params2)
{
    // $this->db->reconnect();
    $qry="SELECT * FROM gimp_mt_uom WHERE mt_uom_name LIKE '%$params2%' AND mt_uom_id LIKE '%$params1%' AND mt_uom_stats BETWEEN '1' AND '2';";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->result();
    else
        return array();
}


function insert_master_uom($data){
    $qry=$this->db->insert('gimp_mt_uom',$data);
    if(!$qry)
        {
            // $error = $this->db->error();
            // return $error;
            return FALSE; // Has keys 'code' and 'message'
        }else{
            return TRUE;
        }
}

function GetListAll_MasterUom()
{
    // $this->db->reconnect();
    $qry="SELECT * FROM gimp_mt_uom WHERE mt_uom_stats BETWEEN '1' AND '2';";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->result();
    else
        return array();       
}


function Getrows_uom_byId($params1)
{
    // $this->db->reconnect();
    $qry="SELECT * FROM gimp_mt_uom WHERE mt_uom_stats BETWEEN '1' AND '2' AND mt_uom_id='$params1';";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->row();
    else
        return array();       
}

function update_uom_byId($data, $params1)
{
	$this->db->where('mt_uom_id', $params1);
    $qry=$this->db->update('gimp_mt_uom', $data);
    if(!$qry)
        {
                // $error = $this->db->error();
                // return $error;
            return FALSE; // Has keys 'code' and 'message'
        
        }else{

            return TRUE;
        }
}






}