<?php
class MSetCustomer extends CI_Model
{
		function __construct()
		{
			parent::__construct();
        }
        
        function GetListMasterCustomer(){
            $this->db->reconnect();
            $qry="SELECT * FROM gexp_master_customer AS A LEFT JOIN gexp_master_country AS B ON A.`CustCountry`=B.`CountryId`;";
            $res = $this->db->query($qry);

            if ($res->num_rows() > 0)
                return $res->result();
            else
                return array();
        }

        function CheckCompName($CustCompanyName){
            $this->db->reconnect();
            $qry="SELECT * FROM gexp_master_customer WHERE CustCompanyName='$CustCompanyName'";
            $res = $this->db->query($qry);
    
                if ($res->num_rows() > 0)
                    return TRUE;
                else
                    return FALSE;
        }

        function tambah_customer($data){
            $qry=$this->db->insert('gexp_master_customer',$data);
                if(!$qry)
                {
                    $error = $this->db->error();
                    return $error;
                        // return FALSE; // Has keys 'code' and 'message'
                }else{
                    return TRUE;
                }
        }

        function GetRowCustomerById($CustId){
            $this->db->reconnect();
            $qry="SELECT * FROM gexp_master_customer WHERE CustId='$CustId';";
            $res = $this->db->query($qry);

            if ($res->num_rows() > 0)
                return $res->row();
            else
                return array();
        }

        function GetListCustContact($CustId){
            $this->db->reconnect();
            $qry="SELECT * FROM gexp_contact_cust AS A 
            LEFT JOIN gexp_master_top AS B ON A.`CtTOP`=B.`TopId` 
            LEFT JOIN gexp_master_incoterm AS C ON A.`CtIncoterm`=C.`IncotermId`
            WHERE CtTicketCustCode='$CustId';
            ";
            $res = $this->db->query($qry);

            if ($res->num_rows() > 0)
                return $res->result();
            else
                return array();
        }

        function tambah_custcontact($data){
            $qry=$this->db->insert('gexp_contact_cust',$data);
                if(!$qry)
                {
                    $error = $this->db->error();
                    return $error;
                        // return FALSE; // Has keys 'code' and 'message'
                }else{
                    return TRUE;
                }
        }

        function tambah_custbank($data){
            $qry=$this->db->insert('gexp_bank_cust',$data);
                if(!$qry)
                {
                    $error = $this->db->error();
                    return $error;
                        // return FALSE; // Has keys 'code' and 'message'
                }else{
                    return TRUE;
                }
        }

        function GetListCustBank($CustId){
            $this->db->reconnect();
            $qry="SELECT * FROM gexp_bank_cust WHERE CustCodeId='$CustId';";
            $res = $this->db->query($qry);

            if ($res->num_rows() > 0)
                return $res->result();
            else
                return array();
        }

        function tambah_custshipto($data){
            $qry=$this->db->insert('gexp_shipto_cust',$data);
                if(!$qry)
                {
                    $error = $this->db->error();
                    return $error;
                        // return FALSE; // Has keys 'code' and 'message'
                }else{
                    return TRUE;
                }
        }

        function GetListCustShipperto($CustId){
            $this->db->reconnect();
            $qry="SELECT * FROM gexp_shipto_cust WHERE ShipCodeCust='$CustId';";
            $res = $this->db->query($qry);

            if ($res->num_rows() > 0)
                return $res->result();
            else
                return array();
        }

        function GetListCustShipperPort($ShipCodeCust){
            $this->db->reconnect();
            $qry="SELECT * FROM gexp_shipto_port WHERE ShiptoCust='$ShipCodeCust';";
            $res = $this->db->query($qry);

            if ($res->num_rows() > 0)
                return $res->result();
            else
                return array();
        }

        function GetListCustShipperCust($ShipCodeCust){
            $this->db->reconnect();
            $qry="SELECT * FROM gexp_shipto_cust WHERE ShipCodeCust='$ShipCodeCust';";
            $res = $this->db->query($qry);

            if ($res->num_rows() > 0)
                return $res->row();
            else
                return array();
        }

        function tambah_custshipport($data){
            $qry=$this->db->insert('gexp_shipto_port',$data);
                if(!$qry)
                {
                    $error = $this->db->error();
                    return $error;
                        // return FALSE; // Has keys 'code' and 'message'
                }else{
                    return TRUE;
                }
        }

        function tambah_codingprint($data){
            $qry=$this->db->insert('gexp_codingprint_cust',$data);
                if(!$qry)
                {
                    $error = $this->db->error();
                    return $error;
                        // return FALSE; // Has keys 'code' and 'message'
                }else{
                    return TRUE;
                }
        }


        function GetListCustCodingPrint($CodeCust){

            $this->db->reconnect();
            $qry="SELECT * FROM gexp_codingprint_cust WHERE CodeCustId='$CodeCust'";
            $res = $this->db->query($qry);

            if ($res->num_rows() > 0)
                return $res->result();
            else
                return array();
        
        }

        function tambah_importdoc($data){
            $qry=$this->db->insert('gexp_importdoc_cust',$data);
                if(!$qry)
                {
                    $error = $this->db->error();
                    return $error;
                        // return FALSE; // Has keys 'code' and 'message'
                }else{
                    return TRUE;
                }
        }

        function GetListImportDoc($CustId){

            $this->db->reconnect();
            $qry="SELECT * FROM gexp_importdoc_cust WHERE CustCodeId='$CustId'";
            $res = $this->db->query($qry);

            if ($res->num_rows() > 0)
                return $res->result();
            else
                return array();
        
        }


        function GetRowCustomerPrevById($CustId){

            $this->db->reconnect();
            $qry="SELECT * FROM gexp_master_customer AS mcust 
            LEFT JOIN gexp_contact_cust AS mcont ON mcust.`CustId`=mcont.`CtTicketCustCode` 
            LEFT JOIN gexp_bank_cust AS bankcust ON mcust.`CustId`=bankcust.`CustCodeId`
            LEFT JOIN gexp_shipto_cust AS shipcust ON mcust.`CustId`=shipcust.`ShipCodeCust`
            LEFT JOIN gexp_shipto_port AS shipport ON shipcust.`ShiptoId`=shipport.`ShiptoId`
            LEFT JOIN gexp_master_country AS ctr ON mcust.`CustCountry`=ctr.`CountryId`
            LEFT JOIN gexp_master_top AS top ON mcont.`CtTOP`=top.`TopId`
            LEFT JOIN gexp_master_incoterm AS Ictm ON mcont.`CtIncoterm`=Ictm.`IncotermId`
            LEFT JOIN gexp_importdoc_cust AS impdoc ON mcust.`CustId`=impdoc.`CustCodeId`
            LEFT JOIN gexp_codingprint_cust AS codprint ON mcust.`CustId`=codprint.`CodeCustId`
            WHERE mcust.`isStatCust`='1' AND mcust.`CustId`='$CustId';";
            $res = $this->db->query($qry);

            if ($res->num_rows() > 0)
                return $res->row();
            else
                return array();
        
        }


        function GetLastCust_No(){

            $this->db->reconnect();
            $qry="SELECT * FROM gexp_master_customer ORDER BY CustId DESC;";
            $res = $this->db->query($qry);

            if ($res->num_rows() > 0)
                return $res->row();
            else
                return array();
        
        }
		
		public function CreateCode($country){
			$this->db->select('RIGHT(CustCode,4) as CustCode', FALSE);
			$this->db->order_by('CustCode','DESC');    
			$this->db->limit(1);    
			$query = $this->db->get('gexp_master_customer');
				if($query->num_rows() <> 0){      
					 $data = $query->row();
					 $kode = intval($data->CustCode) + 1; 
				}
				else{      
					 $kode = 1;  
				}
			$batas = str_pad($kode, 4, "0", STR_PAD_LEFT);    
			$kodetampil = "8801".$country.$batas;
			return $kodetampil;  
		}

        function getcountry_byid($CustCountry){

            $this->db->reconnect();
            $qry="SELECT * FROM gexp_master_country WHERE CountryId='$CustCountry';";
            $res = $this->db->query($qry);

            if ($res->num_rows() > 0)
                return $res->row();
            else
                return array();
        
        }

        function getcustomer_byid($Customer_id){

            $this->db->reconnect();
            $qry="SELECT * FROM gexp_master_customer AS A LEFT JOIN gexp_master_country AS B ON A.`CustCountry`=B.`CountryId` WHERE A.`CustId`='$Customer_id'";
            $res = $this->db->query($qry);

            if ($res->num_rows() > 0)
                return $res->row();
            else
                return array();
        
        }


        function update_master_customer($Customer_id,$data){

            $this->db->where('CustId', $Customer_id);
            $qry=$this->db->update('gexp_master_customer', $data);
            if(!$qry)
                {
                    $error = $this->db->error();
                    // return $error;
                    return FALSE; // Has keys 'code' and 'message'
            }else{
                    return TRUE;
                }
        }

        function GetRowsContactCust($CtId){

            $this->db->reconnect();
            $qry="SELECT * FROM gexp_contact_cust AS A LEFT JOIN gexp_master_customer AS B ON A.`CtTicketCustCode`=B.`CustId`
            LEFT JOIN gexp_master_top AS C ON A.`CtTOP`=C.`TopId`
            LEFT JOIN gexp_master_incoterm AS D ON A.`CtIncoterm`=D.`IncotermId`
            WHERE A.`CtId`='$CtId'";
            $res = $this->db->query($qry);

            if ($res->num_rows() > 0)
                return $res->row();
            else
                return array();
        
        }


        function update_contact_customer($CtId,$data){

            $this->db->where('CtId', $CtId);
            $qry=$this->db->update('gexp_contact_cust', $data);
            if(!$qry)
                {
                    $error = $this->db->error();
                    // return $error;
                    return FALSE; // Has keys 'code' and 'message'
            }else{
                    return TRUE;
                }
        }

        function GetRowsBankCust($CtId){

            $this->db->reconnect();
            $qry="SELECT * FROM gexp_bank_cust AS A LEFT JOIN gexp_master_customer AS B ON A.`CustCodeId`=B.`CustId`
            WHERE A.`CustCodeId`='$CtId'";
            $res = $this->db->query($qry);

            if ($res->num_rows() > 0)
                return $res->row();
            else
                return array();
        
        }

        function update_bank_customer($CtId,$data){

            $this->db->where('CustCodeId', $CtId);
            $qry=$this->db->update('gexp_bank_cust', $data);
            if(!$qry)
                {
                    $error = $this->db->error();
                    // return $error;
                    return FALSE; // Has keys 'code' and 'message'
            }else{
                    return TRUE;
                }
        }

        function check_freight($custid){
            $this->db->reconnect();
            $qry="SELECT * FROM gexp_freight_cust WHERE freightcust_id='$custid';";
            $res = $this->db->query($qry);

            if ($res->num_rows() > 0)
                return TRUE;
            else
                return FALSE;
        }

        function insert_freight_customer($data){
            $qry=$this->db->insert('gexp_freight_cust',$data);
                if(!$qry)
                {
                    $error = $this->db->error();
                    return $error;
                        // return FALSE; // Has keys 'code' and 'message'
                }else{
                    return TRUE;
                }
        }


        function GetFreightCustomerById($CustId){

            $this->db->reconnect();
            $qry="SELECT * FROM gexp_freight_cust WHERE freightcust_id='$CustId' AND freight_status='1';";
            $res = $this->db->query($qry);

            if ($res->num_rows() > 0)
                return $res->result();
            else
                return array();
        
        }


        function update_freight_customer($freightid,$data){

            $this->db->where('freightid', $freightid);
            $qry=$this->db->update('gexp_freight_cust',$data);
            if(!$qry)
                {
                    $error = $this->db->error();
                    // return $error;
                    return FALSE; // Has keys 'code' and 'message'
            }else{
                    return TRUE;
                }
        }


        function GetFreightById($freightid){

            $this->db->reconnect();
            $qry="SELECT * FROM gexp_freight_cust WHERE freightid='$freightid';";
            $res = $this->db->query($qry);

            if ($res->num_rows() > 0)
                return $res->row();
            else
                return array();
        
        }


        

        

       

}