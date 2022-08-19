<?php
class MSetCountry extends CI_Model
{
		function __construct()
		{
			parent::__construct();
        }
        
        function GetListMasterCountry(){
            $this->db->reconnect();
            $qry="SELECT * FROM gexp_master_country WHERE CountryStats='1';";
            $res = $this->db->query($qry);

            if ($res->num_rows() > 0)
                return $res->result();
            else
                return array();
        }

        function CheckCountryCode($CountryCode){
            $this->db->reconnect();
            $qry="SELECT * FROM gexp_master_country WHERE CountryCode='$CountryCode'";
            $res = $this->db->query($qry);

            if ($res->num_rows() > 0)
                return TRUE;
            else
                return FALSE;
        }

        function CheckCountryName($CountryName){
            $this->db->reconnect();
            $qry="SELECT * FROM gexp_master_country WHERE CountryName='$CountryName'";
            $res = $this->db->query($qry);

            if ($res->num_rows() > 0)
                return TRUE;
            else
                return FALSE;
        }

        function tambah_country($data)
		{
            $qry=$this->db->insert('gexp_master_country',$data);
            if(!$qry)
            {
                $error = $this->db->error();
                return $error;
                // return FALSE; // Has keys 'code' and 'message'
            }else{
                return TRUE;
            }
        }

        function GetListRowMasterCountry($CountryId){
            $this->db->reconnect();
            $qry="SELECT * FROM gexp_master_country WHERE CountryId='$CountryId'";
            $res = $this->db->query($qry);

            if ($res->num_rows() > 0)
                return $res->result();
            else
                return array();
        }

        function update_country($CountryId,$data)
		{
			$this->db->where('CountryId', $CountryId);
            $qry=$this->db->update('gexp_master_country', $data);
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