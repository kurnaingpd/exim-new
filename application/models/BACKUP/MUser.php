<?php
	class MUser extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
        }
        
        function GetMenuSign($UserId){
            $this->db->reconnect();
            $qry="SELECT gsts_assign_user.AssignId, gsts_assign_user.UserId, gsts_assign_user.MenuId, gsts_assign_user.WriteAssign, gsts_assign_user.EditAssign, gsts_assign_user.DeleteAssign, gsts_master_menu.MenuId, gsts_master_menu.MenuName, gsts_master_menu.MenuLink, gsts_master_menu.MenuParent, gsts_master_menu.MenuStatus FROM gsts_assign_user INNER JOIN gsts_master_menu WHERE gsts_assign_user.UserId='$UserId' AND gsts_master_menu.MenuStatus='1' AND gsts_assign_user.MenuId=gsts_master_menu.MenuId";
            $res = $this->db->query($qry);

            if ($res->num_rows() > 0)
                return $res->result();
            else
                return array();
        }

        function usernamecheck($username){
            $this->db->reconnect();
            $qry="SELECT * FROM gexp_users WHERE UserName='$username'";
            $res = $this->db->query($qry);

            if ($res->num_rows() > 0)
                return TRUE;
            else
                return FALSE;
        }

        function getlistgroup(){
            // $this->db->reconnect();
            $qry="SELECT * FROM gexp_master_group WHERE GroupStats='1'";
            $res = $this->db->query($qry);

            if ($res->num_rows() > 0)
                return $res->result();
            else
                return array();
        }

        function getlistusers(){
            $this->db->reconnect();
            $qry="SELECT * FROM gexp_users AS geuser INNER JOIN gexp_master_group AS gmtgroup ON geuser.`UserGroup`=gmtgroup.`GroupId` WHERE geuser.`isStatus`='1';";
            $res = $this->db->query($qry);

            if ($res->num_rows() > 0)
                return $res->result();
            else
                return array();
        }
		
		function getlistusers_email(){
            $qry="SELECT * FROM gexp_email_list";
            $res = $this->db->query($qry);
            return $res->result_array();
        }

        function getrowmasteruser($UsersId){
            $this->db->reconnect();
            $qry="SELECT * FROM gexp_users AS geuser INNER JOIN gexp_master_group AS gmtgroup ON geuser.`UserGroup`=gmtgroup.`GroupId` WHERE geuser.`UsersId`='$UsersId';";
            $res = $this->db->query($qry);

            if ($res->num_rows() > 0)
                return $res->result();
            else
                return array();
        }

        function tambah_user($data)
		{
            $qry=$this->db->insert('gexp_users',$data);
            if(!$qry)
            {
                $error = $this->db->error();
                return $error;
                // return FALSE; // Has keys 'code' and 'message'
            }else{
                return TRUE;
            }
        }

        function Update_users($usersid, $data)
		{
            $this->db->where('UsersId', $usersid);
            $qry=$this->db->update('gexp_users', $data);
            if(!$qry)
            {
                $error = $this->db->error();
                return $error;
                // return FALSE; // Has keys 'code' and 'message'
            }else{
                return TRUE;
            }
            
			// $this->db->where('UserName', $username);
			// $this->db->where('UserPassword', md5($password));
			// $this->db->where('StatUser', '1');
			// $res = $this->db->get('gexp_users');
			// if($res->num_rows() > 0)
			// 	return true;
			// else
			// 	return false;
		}
        

    }