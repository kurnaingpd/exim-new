<?php
	class MLogin extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
        }
        
        function CheckLogin($username, $password)
		{
			$this->db->where('UserName', $username);
			$this->db->where('UserPassword', md5($password));
			$this->db->where('StatUser', '1');
			$res = $this->db->get('gexp_users');
			if($res->num_rows() > 0)
				return true;
			else
				return false;
		}

		function GetUserLogin($username, $password)
		{
			$this->db->where('UserName', $username);
			$this->db->where('UserPassword', md5($password));
			$res = $this->db->get('gexp_user');
			if($res->num_rows() > 0)
				return $res->row();
			else
				return array();
		}

		function UpdateLastLogin($data, $userlogin)
		{
			$this->db->where('UserName', $userlogin);
			$this->db->update('gexp_users', $data);
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

		function GetMasterMenuSign($UserGroupId){
            $this->db->reconnect();
            $qry="SELECT * FROM gexp_assign_menu AS assignmenu INNER JOIN gexp_master_group AS mstgroup ON assignmenu.AssignRoleGroup=mstgroup.GroupId 
			INNER JOIN gexp_menus AS menuname ON assignmenu.AssignMenusId=menuname.MenusId WHERE assignmenu.`AssignRoleGroup`='$UserGroupId' AND assignmenu.`AssignStats`='1';";
            $res = $this->db->query($qry);

            if ($res->num_rows() > 0)
                return $res->result();
            else
                return array();
		}

		function GetProfileSign($UserId){
            $this->db->reconnect();
            $qry="SELECT * FROM gexp_users WHERE UsersId='$UserId'";
            $res = $this->db->query($qry);

            if ($res->num_rows() > 0)
                return $res->row();
            else
                return array();
		}

		function GetUserAccess($username,$hashpass){
            $this->db->reconnect();
            $qry="SELECT * FROM gexp_users WHERE UserName='$username' AND HashToken='$hashpass'";
            $res = $this->db->query($qry);

            if ($res->num_rows() > 0)
                return $res->row();
            else
                return array();
		}

		function GetGroupName($UserId){
            $this->db->reconnect();
            $qry="SELECT * FROM gexp_users AS a INNER JOIN gexp_master_group AS b ON a.UserGroup=b.GroupId WHERE a.UsersId='$UserId'";
            $res = $this->db->query($qry);

            if ($res->num_rows() > 0)
                return $res->row();
            else
                return array();
		}
        
    }