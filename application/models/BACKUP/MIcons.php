<?php
class MIcons extends CI_Model
{
		function __construct()
		{
			parent::__construct();
        }
        
        // function GetMenuSign($UserId){
        //     $this->db->reconnect();
        //     $qry="";
        //     $res = $this->db->query($qry);

        //     if ($res->num_rows() > 0)
        //         return $res->result();
        //     else
        //         return array();
        // }

        function tambah_icons($data)
		{
            $qry=$this->db->insert('gexp_master_icons',$data);
            if(!$qry)
            {
                $error = $this->db->error();
                return $error;
                // return FALSE; // Has keys 'code' and 'message'
            }else{
                return TRUE;
            }
        }

        function getlisticons(){
            $this->db->reconnect();
            $qry="SELECT * FROM gexp_master_icons";
            $res = $this->db->query($qry);

            if ($res->num_rows() > 0)
                return $res->result();
            else
                return array();
        }

}