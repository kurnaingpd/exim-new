<?php
class MExportAPI extends CI_Model
{
		function __construct()
		{
			parent::__construct();
        }


function GetListUser_All()
{
    $qry="SELECT * FROM gexp_users;";
    $res = $this->db->query($qry);
        
    if ($res->num_rows() > 0)
        return $res->result();
    else
        return array();
}


}