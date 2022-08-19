<?php
class MSetBank extends CI_Model
{
		function __construct()
		{
			parent::__construct();
        }
        
        function GetListMasterBank(){
            $this->db->reconnect();
            $qry="SELECT * FROM gexp_master_bank;";
            $res = $this->db->query($qry);

            if ($res->num_rows() > 0)
                return $res->result();
            else
                return array();
        }

        function CheckBankCode($BankCode){
            $this->db->reconnect();
            $qry="SELECT * FROM gexp_master_bank WHERE BankCode='$BankCode'";
            $res = $this->db->query($qry);
    
                if ($res->num_rows() > 0)
                    return TRUE;
                else
                    return FALSE;
        }

        function tambah_bank($data){
            $qry=$this->db->insert('gexp_master_bank',$data);
                if(!$qry)
                {
                    $error = $this->db->error();
                    return $error;
                        // return FALSE; // Has keys 'code' and 'message'
                }else{
                    return TRUE;
                }
        }

        function GetListMasterBank_byid($Bank_id){
            $this->db->reconnect();
            $qry="SELECT * FROM gexp_master_bank WHERE BankId='$Bank_id';";
            $res = $this->db->query($qry);

            if ($res->num_rows() > 0)
                return $res->row();
            else
                return array();
        }

        function update_master_bank($data,$BankId)
{
			$this->db->where('BankId', $BankId);
            $qry=$this->db->update('gexp_master_bank', $data);
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