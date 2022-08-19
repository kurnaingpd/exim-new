<?php
class MSetContainer extends CI_Model
{
		function __construct()
		{
			parent::__construct();
        }
        
        function GetListMasterContainer(){
            $this->db->reconnect();
            $qry="SELECT * FROM gexp_master_container;";
            $res = $this->db->query($qry);

            if ($res->num_rows() > 0)
                return $res->result();
            else
                return array();
        }

        function CheckContainerDesc($ContDesc){
            $this->db->reconnect();
            $qry="SELECT * FROM gexp_master_container WHERE ContainerDesc='$ContDesc'";
            $res = $this->db->query($qry);
    
                if ($res->num_rows() > 0)
                    return TRUE;
                else
                    return FALSE;
        }

        function tambah_container($data){
            $qry=$this->db->insert('gexp_master_container',$data);
                if(!$qry)
                {
                    $error = $this->db->error();
                    return $error;
                        // return FALSE; // Has keys 'code' and 'message'
                }else{
                    return TRUE;
                }
        }

        function getrow_container_byid($container_id){
            $this->db->reconnect();
            $qry="SELECT * FROM gexp_master_container WHERE ContainerId='$container_id'";
            $res = $this->db->query($qry);
    
                if ($res->num_rows() > 0)
                    return $res->row();
                else
                    return array();
        }

        function update_master_container($data,$ContainerId)
		{
			$this->db->where('ContainerId', $ContainerId);
            $qry=$this->db->update('gexp_master_container', $data);
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