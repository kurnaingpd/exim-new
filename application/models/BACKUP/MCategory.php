<?php
class MCategory extends CI_Model
{
	function __construct()
		{
			parent::__construct();
        }

function GetAll_Search()
{
    // $this->db->reconnect();
    $qry="SELECT * FROM gimp_mt_category WHERE mt_categori_stats BETWEEN '1' AND '2';";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->result();
    else
        return array();       
}


function GetFilterSearch($params1,$params2)
{
    // $this->db->reconnect();
    $qry="SELECT * FROM gimp_mt_category WHERE mt_categori_name LIKE '%$params2%' AND mt_categori_id LIKE '%$params1%' AND mt_categori_stats BETWEEN '1' AND '2';";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->result();
    else
        return array();
}


function insert_master_category($data){
    $qry=$this->db->insert('gimp_mt_category',$data);
    if(!$qry)
        {
            $error = $this->db->error();
            // return $error;
            return FALSE; // Has keys 'code' and 'message'
        }else{
            return TRUE;
        }
}

function GetListAll_MasterCategory()
{
    // $this->db->reconnect();
    $qry="SELECT * FROM gimp_mt_category WHERE mt_categori_stats BETWEEN '1' AND '2';";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->result();
    else
        return array();       
}


function Getrows_Category_ById($params1)
{
    // $this->db->reconnect();
    $qry="SELECT * FROM gimp_mt_category WHERE mt_categori_stats BETWEEN '1' AND '2' AND mt_categori_id='$params1';";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->row();
    else
        return array();       
}

function update_category_byid($data, $params1)
{
			$this->db->where('mt_categori_id', $params1);
            $qry=$this->db->update('gimp_mt_category', $data);
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