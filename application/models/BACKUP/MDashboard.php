<?php
	class MDashboard extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
        }
        
        function GetMenuSign($UserId){

            $qry="SELECT gsts_assign_user.AssignId, gsts_assign_user.UserId, gsts_assign_user.MenuId, gsts_assign_user.WriteAssign, gsts_assign_user.EditAssign, gsts_assign_user.DeleteAssign, gsts_master_menu.MenuId, gsts_master_menu.MenuName, gsts_master_menu.MenuLink, gsts_master_menu.MenuParent, gsts_master_menu.MenuStatus FROM gsts_assign_user INNER JOIN gsts_master_menu WHERE gsts_assign_user.UserId='$UserId' AND gsts_master_menu.MenuStatus='1' AND gsts_assign_user.MenuId=gsts_master_menu.MenuId";
            $res = $this->db->query($qry);

            if ($res->num_rows() > 0)
                return $res->result();
            else
                return array();
        }
        
        
    }