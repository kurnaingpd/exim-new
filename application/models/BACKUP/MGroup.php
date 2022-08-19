<?php
	class MGroup extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
        }
        
        // function GetMenuSign($UserId){
        //     $this->db->reconnect();
        //     $qry="SELECT gsts_assign_user.AssignId, gsts_assign_user.UserId, gsts_assign_user.MenuId, gsts_assign_user.WriteAssign, gsts_assign_user.EditAssign, gsts_assign_user.DeleteAssign, gsts_master_menu.MenuId, gsts_master_menu.MenuName, gsts_master_menu.MenuLink, gsts_master_menu.MenuParent, gsts_master_menu.MenuStatus FROM gsts_assign_user INNER JOIN gsts_master_menu WHERE gsts_assign_user.UserId='$UserId' AND gsts_master_menu.MenuStatus='1' AND gsts_assign_user.MenuId=gsts_master_menu.MenuId";
        //     $res = $this->db->query($qry);

        //     if ($res->num_rows() > 0)
        //         return $res->result();
        //     else
        //         return array();
        // }

        function tambah_group($data)
		{
            $qry=$this->db->insert('gexp_master_group',$data);
            if(!$qry)
            {
                $error = $this->db->error();
                return $error;
                // return FALSE; // Has keys 'code' and 'message'
            }else{
                return TRUE;
            }
        }

        function getlistmastergroup(){
            $this->db->reconnect();
            $qry="SELECT * FROM gexp_master_group";
            $res = $this->db->query($qry);

            if ($res->num_rows() > 0)
                return $res->result();
            else
                return array();
        }

        function getrowmastergroup($GroupId){
            $this->db->reconnect();
            $qry="SELECT * FROM gexp_master_group WHERE GroupId='$GroupId'";
            $res = $this->db->query($qry);

            if ($res->num_rows() > 0)
                return $res->result();
            else
                return array();
        }

        function Updatemastergroup($data, $GroupId)
		{
			$this->db->where('GroupId', $GroupId);
            $qry=$this->db->update('gexp_master_group', $data);
            if(!$qry)
            {
                $error = $this->db->error();
                return $error;
                // return FALSE; // Has keys 'code' and 'message'
            }else{
                return TRUE;
            }
        }

        function checkmastervalgroup($GroupValue){
            
            // $this->db->reconnect();

            $qry="SELECT * FROM gexp_master_group WHERE GroupVal='$GroupValue'";
            $res = $this->db->query($qry);

            if ($res->num_rows() > 0)
                return FALSE;
            else
                return TRUE;
        }

        // function 
        

    }