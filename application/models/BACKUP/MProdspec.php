<?php
class MProdspec extends CI_Model
{
		function __construct()
		{
			parent::__construct();
        }


        function GetListProdSpec()
        {
            $qry="SELECT * FROM gexp_master_spec AS A LEFT JOIN gexp_master_invoice AS B ON A.`gexp_spec_invoice_id`=B.`gexp_invoice_id` ORDER BY gexp_spec_no DESC;";
            $res = $this->db->query($qry);
        
            if ($res->num_rows() > 0)
                return $res->result();
            else
                return array();
        }

        function GetSearchProdSpec($params)
        {
            $qry="SELECT * FROM gexp_master_spec AS A LEFT JOIN gexp_master_invoice AS B ON A.`gexp_spec_invoice_id`=B.`gexp_invoice_id` WHERE 1=1";
            
            if($params['prod_spec_no']) {
                $qry.=" AND A.gexp_spec_no = '".$params['prod_spec_no']."' ";
            }

            if( ($params['prod_spec_start']) AND ($params['prod_spec_end']) ) {
                $qry.=" AND A.gexp_spec_date BETWEEN '".$params['prod_spec_start']."' AND '".$params['prod_spec_end']."' ";
            }

            $qry.=" ORDER BY gexp_spec_no DESC;";
            $res = $this->db->query($qry);

            return $res->result();
        }

        function customer()
        {
            $qry="SELECT
                    a.CustId, a.CustCode, a.CustCompanyName
                FROM gexp_master_customer a
                WHERE a.isStatCust = 1";
            $res = $this->db->query($qry);

            return $res->result();
        }

        function country()
        {
            $qry="SELECT
                    a.CountryId, a.CountryCode, a.CountryName
                FROM gexp_master_country a
                WHERE a.CountryStats = 1";
            $res = $this->db->query($qry);

            return $res->result();
        }

        function invoice()
        {
            $qry="SELECT
                        a.gexp_invoice_id, a.gexp_invoice_no
                    FROM gexp_master_invoice a
                    LEFT JOIN gexp_master_spec b ON a.gexp_invoice_id = b.gexp_spec_invoice_id
                    WHERE b.gexp_spec_invoice_id IS NULL";
            $res = $this->db->query($qry);

            return $res->result();
        }

        function GetLastprodspec_no()
        {
            $qry="SELECT * FROM gexp_master_spec ORDER BY gexp_spec_no DESC;";
            $res = $this->db->query($qry);
        
            if ($res->num_rows() > 0)
                return $res->row();
            else
                return array();
        }

        function tambah_master_prodspec($data){
            $qry=$this->db->insert('gexp_master_spec',$data);
            if(!$qry)
                {
                    $error = $this->db->error();
                    return $error;
                    // return FALSE; // Has keys 'code' and 'message'
                }else{
                    return TRUE;
                }
        }

        function getrowspec_id($spec_id)
        {
            $qry="SELECT * FROM gexp_master_spec AS A LEFT JOIN gexp_master_invoice AS B ON A.`gexp_spec_invoice_id`=B.`gexp_invoice_id` WHERE A.`gexp_spec_id`='$spec_id';";
            $res = $this->db->query($qry);
        
            if ($res->num_rows() > 0)
                return $res->row();
            else
                return array();
        }


        function getlistitem_byinv($gexp_spec_id)
        {
            $qry="SELECT * FROM gexp_master_spec AS A 
            LEFT JOIN gexp_master_invoice AS B ON A.`gexp_spec_invoice_id`=B.`gexp_invoice_id`
            LEFT JOIN gexp_master_packlist AS C ON B.`gexp_invoice_id`=C.`gexp_packlist_invoice_id`
            LEFT JOIN gexp_packlist_detail AS D ON C.`gexp_packlist_no`=D.`gexp_packlist_number`
            WHERE A.`gexp_spec_id`='$gexp_spec_id';";
            $res = $this->db->query($qry);
        
            if ($res->num_rows() > 0)
                return $res->result();
            else
                return array();
        }


        function tambah_prodspec_details($data){
            $qry=$this->db->insert('gexp_specdet_product',$data);
            if(!$qry)
                {
                    $error = $this->db->error();
                    return $error;
                    // return FALSE; // Has keys 'code' and 'message'
                }else{
                    return TRUE;
                }
        }

        function getlist_details_prodspec($spec_id)
        {
            $qry="SELECT * FROM gexp_specdet_product AS A LEFT JOIN gexp_master_spec AS B ON A.`gexp_specdet_head`=B.`gexp_spec_id`
            LEFT JOIN gexp_master_item AS C ON A.`gexp_specdet_item`=C.`ItemId`
            LEFT JOIN gexp_master_invoice AS D ON A.`gexp_specdet_invoice`=D.`gexp_invoice_id`
            WHERE gexp_specdet_head='$spec_id';";
            $res = $this->db->query($qry);
        
            if ($res->num_rows() > 0)
                return $res->result();
            else
                return array();
        }


        function getrowsdetails_prodspec($specdet_id)
        {
            $qry="SELECT * FROM gexp_specdet_product AS A LEFT JOIN gexp_master_spec AS B ON A.`gexp_specdet_head`=B.`gexp_spec_id`
            LEFT JOIN gexp_master_item AS C ON A.`gexp_specdet_item`=C.`ItemId`
            LEFT JOIN gexp_master_invoice AS D ON A.`gexp_specdet_invoice`=D.`gexp_invoice_id`
			LEFT JOIN gexp_master_coa E ON D.gexp_invoice_id = E.gexp_coa_invoice
            WHERE gexp_specdet_id='$specdet_id';";
            $res = $this->db->query($qry);
        
            if ($res->num_rows() > 0)
                return $res->row();
            else
                return array();
        }


}