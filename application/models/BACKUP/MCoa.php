<?php
class MCoa extends CI_Model
{
		function __construct()
		{
			parent::__construct();
        }
        
// function get_last_no()
// {
//     $qry="SELECT gsts_assign_user.AssignId, gsts_assign_user.UserId, gsts_assign_user.MenuId, gsts_assign_user.WriteAssign, gsts_assign_user.EditAssign, gsts_assign_user.DeleteAssign, gsts_master_menu.MenuId, gsts_master_menu.MenuName, gsts_master_menu.MenuLink, gsts_master_menu.MenuParent, gsts_master_menu.MenuStatus FROM gsts_assign_user INNER JOIN gsts_master_menu WHERE gsts_assign_user.UserId='' AND gsts_master_menu.MenuStatus='1' AND gsts_assign_user.MenuId=gsts_master_menu.MenuId";
//             $res = $this->db->query($qry);

//             if ($res->num_rows() > 0)
//                 return $res->row();
//             else
//                 return array();
// }


function GetLastCoa_No()
{
    $qry="SELECT * FROM gexp_master_coa ORDER BY gexp_coa_no DESC;";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->row();
    else
        return array();
}

function GetListInvoice_NotSelect()
{
    // $qry="SELECT * FROM gexp_master_coa AS A LEFT JOIN gexp_master_invoice AS B ON A.`gexp_coa_invoice`=B.`gexp_invoice_id` WHERE A.`gexp_coa_invoice`<>B.`gexp_invoice_id` GROUP BY A.`gexp_coa_id`;";
    $qry="SELECT a.`gexp_invoice_id`, a.`gexp_invoice_no` FROM gexp_master_invoice a LEFT JOIN `gexp_master_coa` b ON a.`gexp_invoice_id` = b.`gexp_coa_invoice` WHERE b.`gexp_coa_invoice` IS NULL;";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->result();
    else
        return array();
}

function Check_Invoice_No($id_invoice)
{
    $qry="SELECT * FROM gexp_master_coa WHERE gexp_coa_invoice='$id_invoice'";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return TRUE;
    else
        return FALSE;
}

function GetrowsInvoice($id_invoice)
{
    $qry="SELECT * FROM gexp_master_invoice WHERE gexp_invoice_id='$id_invoice'";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->row();
    else
        return array();
}

function GetrowsPI($Id_PI)
{
    $qry="SELECT * FROM gexp_master_pi WHERE gexp_pi_id='$Id_PI'";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->row();
    else
        return array();
}

function Getrows_Customer($Id_Cust)
{
    $qry="SELECT * FROM gexp_master_customer A LEFT JOIN gexp_master_country B ON A.`CustCountry`=B.`CountryId` WHERE A.`CustId`='$Id_Cust'";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->row();
    else
        return array();
}

function tambah_coa($data){
    $qry=$this->db->insert('gexp_master_coa',$data);
    if(!$qry)
        {
            $error = $this->db->error();
            return $error;
            // return FALSE; // Has keys 'code' and 'message'
        }else{
            return TRUE;
        }
}

function invoice()
{
    $qry = "SELECT
                a.gexp_invoice_id, a.gexp_invoice_no
            FROM gexp_master_invoice a
            LEFT JOIN gexp_master_coa b ON a.gexp_invoice_id = b.gexp_coa_invoice
            WHERE b.gexp_coa_invoice IS NOT NULL";
    $res = $this->db->query($qry);

    return $res->result();
}

function getlistmstcoa()
{
    $qry="SELECT * FROM gexp_master_coa AS A LEFT JOIN gexp_master_invoice AS B ON A.`gexp_coa_invoice`=B.`gexp_invoice_id`;";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->result();
    else
        return array();
}

function list_qa()
{
    $qry="SELECT
            a.gexp_coa_id, a.gexp_coa_no
        FROM gexp_master_coa a
        LEFT JOIN gexp_master_qs b ON a.gexp_coa_id = b.gexp_qs_coa_id
        WHERE b.gexp_qs_coa_id IS NULL;";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->result();
    else
        return array();
}

function list_invoice()
{
    $qry="SELECT A.gexp_coa_id, A.gexp_coa_no
            FROM gexp_master_coa AS A
            LEFT JOIN gexp_master_invoice AS B ON A.`gexp_coa_invoice`=B.`gexp_invoice_id`
            WHERE A.gexp_coa_invoice IS NULL;";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->result();
    else
        return array();
}

function getsearchcoa($params)
{
    $qry = "SELECT * FROM gexp_master_coa AS A 
    LEFT JOIN gexp_master_invoice AS B ON A.`gexp_coa_invoice`=B.`gexp_invoice_id` WHERE 1=1";

    if($params['coa_numbers']) {
        $qry.=" AND A.gexp_coa_no = '".$params['coa_numbers']."' ";
    }

    if( ($params['start_date']) AND ($params['end_date']) ) {
        $qry.=" AND A.gexp_coa_date BETWEEN '".$params['start_date']."' AND '".$params['end_date']."' ";
    }

    if($params['invoice']) {
        $qry.=" AND A.gexp_coa_invoice = '".$params['invoice']."' ";
    }

    // if($params['product']) {
    //     $qry.=" AND A.gexp_coa_invoice = '".$params['product']."' ";
    // }

    // echo "<pre>$qry</pre>";

    $res = $this->db->query($qry);
    return $res->result();
}

function GetrowsCOA($coa_id)
{
    $qry="SELECT * FROM gexp_master_coa WHERE gexp_coa_id='$coa_id'";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->row();
    else
        return array();
}


function getcoaitem($id_invoice)
{
    $qry="SELECT * FROM gexp_master_coa AS A LEFT JOIN gexp_master_packlist AS B ON A.`gexp_coa_invoice`=B.`gexp_packlist_invoice_id` 
    LEFT JOIN gexp_packlist_detail AS C ON B.`gexp_packlist_no`=C.`gexp_packlist_number`
    LEFT JOIN gexp_master_qc AS D ON C.`gexp_packlistdet_itemid`=D.`gexp_qc_item_id` WHERE A.`gexp_coa_invoice`='$id_invoice';";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->result();
    else
        return array();
}

function tambah_detail_coa($data){
    $qry=$this->db->insert('gexp_coa_detail',$data);
    if(!$qry)
        {
            $error = $this->db->error();
            return $error;
            // return FALSE; // Has keys 'code' and 'message'
        }else{
            return TRUE;
        }
}

function getcoa_detail($coa_id)
{
    $qry="SELECT * FROM gexp_coa_detail AS A 
    LEFT JOIN gexp_master_coa AS B ON A.`detail_coa_head`=B.`gexp_coa_id`
    LEFT JOIN gexp_master_item AS C ON A.`detail_coa_itemid`=C.`ItemId` 
    LEFT JOIN gexp_master_qc AS D ON A.`detail_coa_qcid`=D.`gexp_qc_id`
    WHERE A.`detail_coa_head`='$coa_id';";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->result();
    else
        return array();
}

function getpackage_itemcoa_byPL($coa_id)
{
    $qry="select * From gexp_master_coa As A 
    LEFT JOIN gexp_master_invoice AS B On A.`gexp_coa_invoice`=B.`gexp_invoice_id`
    LEFT JOIN gexp_master_packlist AS C ON B.`gexp_invoice_id`=C.`gexp_packlist_invoice_id`
    LEFT JOIN gexp_packlist_detail AS D ON C.`gexp_packlist_no`=D.`gexp_packlist_number` WHERE A.`gexp_coa_id`='$coa_id'";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->result();
    else
        return array();
}

public function getitemdet_qc($product_id){
    $sql ="SELECT * FROM gexp_master_qc WHERE gexp_qc_item_id='$product_id';";

    $query = $this->db->query($sql);
    $result = $query->result_array();

    return $result;
}

public function get_item_qc_details($product_date){
    $sql ="SELECT * FROM gexp_master_qc WHERE gexp_qc_id='$product_date';";

    $query = $this->db->query($sql);
    $result = $query->result_array();

    return $result;
}

public function get_kabupaten_by_province($province){
    $sql = "select Area_Code, Area_Name from Master_Area where Area_Reference = '".$province."'";

    $query = $this->db->query($sql);
    $result = $query->result_array();

    return $result;
}


public function getdetailscoa_bydetsid($idcoa_details)
{
    $qry="SELECT * FROM gexp_coa_detail AS A 
    LEFT JOIN gexp_master_coa AS B ON A.`detail_coa_head`=B.`gexp_coa_id`
    LEFT JOIN gexp_master_item AS C ON A.`detail_coa_itemid`=C.`ItemId` 
    LEFT JOIN gexp_master_qc AS D ON A.`detail_coa_qcid`=D.`gexp_qc_id`
    LEFT JOIN gexp_master_invoice AS E ON B.`gexp_coa_invoice`=E.`gexp_invoice_id` 
    WHERE A.`detail_coa_id`='$idcoa_details';";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->row();
    else
        return array();
}


}