<?php
	class MMenu extends CI_Model
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

        function tambah_menu($data)
		{
            $qry=$this->db->insert('gexp_menus',$data);
            if(!$qry)
            {
                $error = $this->db->error();
                return $error;
                // return FALSE; // Has keys 'code' and 'message'
            }else{
                return TRUE;
            }
        }

        function GetListMasterMenu(){
            $this->db->reconnect();
            $qry="SELECT A.`MenusId`, A.`MenusName`, A.`MenusLink`, a.`MenusIcon`, A.`MenuParents`, A.`MenuStats`, A.`CreatedAt`, A.`CreatedBy`, A.`UpdateAt`, A.`UpdateBy`, B.`MenusName` AS SubParentMenu, C.`IconsDesc` 
            FROM gexp_menus AS A LEFT JOIN gexp_menus AS B ON A.`MenuParents`=B.`MenusId`
            LEFT JOIN gexp_master_icons AS C ON A.`MenusIcon`=C.`IconsId`;";
            $res = $this->db->query($qry);

            if ($res->num_rows() > 0)
                return $res->result();
            else
                return array();
        }

        function GetListMasterGroup(){
            $this->db->reconnect();
            $qry="SELECT * FROM gexp_master_group;";
            $res = $this->db->query($qry);

            if ($res->num_rows() > 0)
                return $res->result();
            else
                return array();
        }

        function GetListMasterIcons(){
            $this->db->reconnect();
            $qry="SELECT * FROM gexp_master_icons;";
            $res = $this->db->query($qry);

            if ($res->num_rows() > 0)
                return $res->result();
            else
                return array();
        }
        

    }