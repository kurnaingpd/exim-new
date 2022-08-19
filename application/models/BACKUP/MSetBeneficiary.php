<?php
class MSetBeneficiary extends CI_Model
{
		function __construct()
		{
			parent::__construct();
        }
        
        function GetListMasterBeneficiary(){
            $this->db->reconnect();
            $qry="SELECT * FROM gexp_master_beneficiary AS A LEFT JOIN gexp_master_country AS B On A.`BeneficiaryCountry`=B.`CountryId`;";
            $res = $this->db->query($qry);

            if ($res->num_rows() > 0)
                return $res->result();
            else
                return array();
        }

        function CheckBeneficiary($BenDesc){
            $this->db->reconnect();
            $qry="SELECT * FROM gexp_master_beneficiary WHERE BeneficiaryDesc='$BenDesc'";
            $res = $this->db->query($qry);
    
                if ($res->num_rows() > 0)
                    return TRUE;
                else
                    return FALSE;
        }

        function tambah_beneficiary($data){
            $qry=$this->db->insert('gexp_master_beneficiary',$data);
                if(!$qry)
                {
                    $error = $this->db->error();
                    return $error;
                        // return FALSE; // Has keys 'code' and 'message'
                }else{
                    return TRUE;
                }
        }

        function GetListMasterBeneficiary_byid($BeneId){
            $this->db->reconnect();
            $qry="SELECT * FROM gexp_master_beneficiary AS A LEFT JOIN gexp_master_country AS B On A.`BeneficiaryCountry`=B.`CountryId` WHERE A.`BeneficiaryId`='$BeneId';";
            $res = $this->db->query($qry);

            if ($res->num_rows() > 0)
                return $res->row();
            else
                return array();
        }

        function update_beneficiary($data,$Beneid)
        {
                    $this->db->where('BeneficiaryId', $Beneid);
                    $qry=$this->db->update('gexp_master_beneficiary', $data);
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