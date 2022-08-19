<?php
class MItemMap extends CI_Model
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

        function getlist_allcountry(){
            $this->db->reconnect();
            $qry="SELECT * FROM gexp_master_country WHERE CountryStats='1'";
            $res = $this->db->query($qry);

            if ($res->num_rows() > 0)
                return $res->result();
            else
                return array();
        }

        function getlist_all_item(){
            $this->db->reconnect();
            $qry="SELECT * FROM gexp_master_item WHERE ItemStats='1'";
            $res = $this->db->query($qry);

            if ($res->num_rows() > 0)
                return $res->result();
            else
                return array();
        }

        function tambah_item_mapping($data)
		{
            $qry=$this->db->insert('gexp_item_mapping',$data);
            if(!$qry)
            {
                $error = $this->db->error();
                // return $error;
                return FALSE; // keys 'code' and 'message'
            }else{
                return TRUE;
            }
        }

        function getlist_item_mapping(){
            $this->db->reconnect();
            $qry="SELECT * FROM gexp_item_mapping AS A 
            LEFT JOIN gexp_master_item AS B ON A.`gexp_item_id`=B.`ItemId`
            LEFT JOIN gexp_master_country AS C ON A.`gexp_country_id`=C.`CountryId` WHERE A.`gexp_item_map_status`='1';";
            $res = $this->db->query($qry);

            if ($res->num_rows() > 0)
                return $res->result();
            else
                return array();
        }

        function getrowsitem_map_byid($item_map_id){
            $this->db->reconnect();
            $qry="SELECT * FROM gexp_item_mapping AS A LEFT JOIN gexp_master_item AS B ON A.`gexp_item_id`=B.`ItemId`
            LEFT JOIN gexp_master_country AS C ON  A.`gexp_country_id`=C.`CountryId` WHERE A.gexp_item_map_id='$item_map_id';";
            $res = $this->db->query($qry);

            if ($res->num_rows() > 0)
                return $res->row();
            else
                return array();
        }

        function update_item_mapping($data,$item_map_id)
{
			$this->db->where('gexp_item_map_id', $item_map_id);
            $qry=$this->db->update('gexp_item_mapping', $data);
            if(!$qry)
            {
                $error = $this->db->error();
                // return $error;
                return FALSE; // Has keys 'code' and 'message'
            }else{
                return TRUE;
            }
}

}