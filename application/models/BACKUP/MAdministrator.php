<?php
class MAdministrator extends CI_Model
{
	function __construct()
	{
		parent::__construct();
    }
        
function getuser_administrator($Mail, $HashPass)
{
            $this->db->reconnect();
            $qry="SELECT * FROM gexp_users WHERE UserEmail='$Mail' AND HashToken='$HashPass'";
            $res = $this->db->query($qry);

            if ($res->num_rows() > 0)
                return TRUE;
            else
                return FALSE;
}


}