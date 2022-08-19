<?php
	class MAssignMenu extends CI_Model
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

        function GetListAssignMenu(){
            $this->db->reconnect();
            $qry="SELECT * FROM gexp_assign_menu AS gxasg INNER JOIN gexp_master_group AS gxgrp ON gxasg.`AssignRoleGroup`=gxgrp.`GroupId` INNER JOIN gexp_menus AS gxmn ON gxasg.`AssignMenusId`=gxmn.`MenusId` ORDER BY gxasg.AssignId DESC;";
            $res = $this->db->query($qry);

            if ($res->num_rows() > 0)
                return $res->result();
            else
                return array();
        }

        function GetListGroup_Activ(){
            $this->db->reconnect();
            $qry="SELECT * FROM gexp_master_group WHERE GroupStats='1'";
            $res = $this->db->query($qry);

            if ($res->num_rows() > 0)
                return $res->result();
            else
                return array();
        }

        function GetListMenu_Activ()
        {
            $this->db->reconnect();
            $qry="SELECT * FROM gexp_menus WHERE MenuStats='1';";
            $res = $this->db->query($qry);

            if ($res->num_rows() > 0)
                return $res->result();
            else
                return array();
        }

        function insert_assign_menu($data){
            $qry=$this->db->insert('gexp_assign_menu',$data);
            if(!$qry)
                {
                    $error = $this->db->error();
                    return $error;
                    // return FALSE; // Has keys 'code' and 'message'
                }else{
                    return TRUE;
                }
        }

        function update_assign_menu($assign_id, $data)
        {
                    $this->db->where('AssignId', $assign_id);
                    $qry=$this->db->update('gexp_assign_menu', $data);
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