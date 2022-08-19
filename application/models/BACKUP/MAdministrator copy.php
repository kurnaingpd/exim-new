<?php
class MAdministrator extends CI_Model
{
	function __construct()
		{
			parent::__construct();
        }


function CheckRootLogin($username,$password,$hashpass)
{
    // $this->db->reconnect();
    $qry="SELECT * FROM gimp_user WHERE user_username='$username' AND user_pass='$password' AND user_encrypt='$hashpass' AND user_status='1' AND isAdmin='1';";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return TRUE;
    else
        return FALSE;
}

function GetUserRoot($username, $hashpass)
{
    $this->db->reconnect();
    $qry="SELECT * FROM gimp_user WHERE user_username='$username' AND user_encrypt='$hashpass' AND user_status='1';";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->row();
    else
        return array();
}

function UpdateLastLogin($data, $userlogin)
{
	$this->db->where('user_userid', $userlogin);
    $this->db->update('gimp_user', $data);
}


function GetProfileSign($UserId)
{
    $this->db->reconnect();
    $qry="SELECT * FROM gimp_user WHERE user_userid='$UserId'";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->row();
    else
        return array();
}


}