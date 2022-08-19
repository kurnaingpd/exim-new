<?php
class MEmail extends CI_Model
{
	function __construct()
		{
			parent::__construct();
        }

function Getall_master_receive()
{
    // $this->db->reconnect();
    $qry="SELECT * FROM gexp_users WHERE UserGroup='1' AND isStatus='1'";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->result();
    else
        return array();       
}

function Getall_master_cc()
{
    // $this->db->reconnect();
    $qry="SELECT * FROM gexp_users WHERE UserGroup='1' AND isStatus='1'";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->result();
    else
        return array();       
}


}