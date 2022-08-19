<?php
class MDocim extends CI_Model
{
	function __construct()
		{
			parent::__construct();
        }

function Getall_master_consignee()
{
    // $this->db->reconnect();
    $qry="SELECT * FROM gimp_consignee";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->result();
    else
        return array();       
}

function Getall_master_category()
{
    // $this->db->reconnect();
    $qry="SELECT * FROM gimp_mt_category WHERE mt_categori_stats='1'";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->result();
    else
        return array();       
}

function Getall_master_incoterm()
{
    // $this->db->reconnect();
    $qry="SELECT * FROM gexp_master_incoterm WHERE IncotermStats='1'";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->result();
    else
        return array();       
}


function Getall_master_uom()
{
    // $this->db->reconnect();
    $qry="SELECT * FROM gimp_mt_uom WHERE mt_uom_stats='1'";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->result();
    else
        return array();       
}


function insert_master_docim($data){
    $qry=$this->db->insert('gimp_docim',$data);
    if(!$qry)
        {
            $error = $this->db->error();
            // return $error;
            return FALSE; // Has keys 'code' and 'message'
        }else{
            return TRUE;
        }
}


function Getall_master_docim()
{
    // $this->db->reconnect();
    // $qry="SELECT * FROM gimp_docim AS A LEFT JOIN gimp_mt_category AS B ON A.`docim_category`=B.`mt_categori_id` 
    // LEFT JOIN gexp_master_incoterm AS C ON A.`docim_term`=C.`IncotermId` 
    // LEFT JOIN gimp_mt_uom AS D ON A.`docim_good_uom`=D.`mt_uom_id` WHERE docim_stats BETWEEN '1' AND '2';";
    $qry = "SELECT * FROM view_gimp_doc_import";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->result();
    else
        return array();       
}


function getrows_master_docim($docim_id)
{
    // $this->db->reconnect();
    $qry="SELECT * FROM gimp_docim AS A LEFT JOIN gimp_mt_category AS B ON A.`docim_category`=B.`mt_categori_id`
    LEFT JOIN gexp_master_incoterm AS C ON A.`docim_term`=C.`IncotermId` LEFT JOIN gimp_mt_uom AS D ON A.`docim_good_uom`=D.`mt_uom_id` WHERE docim_stats BETWEEN '1' AND '2' AND docim_id='$docim_id'";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->row();
    else
        return array();       
}


function update_docim_byid($data, $params1)
{
			$this->db->where('docim_id', $params1);
            $qry=$this->db->update('gimp_docim', $data);
            if(!$qry)
            {
                return FALSE; // Has keys 'code' and 'message'
            }else{
                return TRUE;
            }
}

function Getlookup_docim()
{
    // $this->db->reconnect();
    $qry="SELECT * FROM gimp_docim AS A LEFT JOIN gimp_mt_category AS B ON A.`docim_category`=B.`mt_categori_id` LEFT JOIN gexp_master_incoterm AS C ON A.`docim_term`=C.`IncotermId` WHERE docim_stats='1' GROUP BY A.`docim_consignee`;";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->result();
    else
        return array();       
}

function Getlookup_docim_pengirim()
{
    // $this->db->reconnect();
    $qry="SELECT * FROM gimp_docim AS A LEFT JOIN gimp_mt_category AS B ON A.`docim_category`=B.`mt_categori_id` LEFT JOIN gexp_master_incoterm AS C ON A.`docim_term`=C.`IncotermId` 
    WHERE docim_stats='1' GROUP BY A.`docim_pengirim`;";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->result();
    else
        return array();       
}

function Getlookup_docim_forwarder()
{
    // $this->db->reconnect();
    $qry="SELECT * FROM gimp_docim AS A LEFT JOIN gimp_mt_category AS B ON A.`docim_category`=B.`mt_categori_id` LEFT JOIN gexp_master_incoterm AS C ON A.`docim_term`=C.`IncotermId` 
    WHERE docim_stats='1' GROUP BY A.`docim_forwarder`;";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->result();
    else
        return array();       
}

function Getlookup_docim_cat()
{
    // $this->db->reconnect();
    $qry="SELECT * FROM gimp_docim AS A LEFT JOIN gimp_mt_category AS B ON A.`docim_category`=B.`mt_categori_id` LEFT JOIN gexp_master_incoterm AS C ON A.`docim_term`=C.`IncotermId` WHERE docim_stats='1' GROUP BY A.`docim_category`;";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->result();
    else
        return array();       
}

function get_filter_docim_notrange($po, $start_deliv, $end_deliv, $consig, $category, $pengirim, $forwarder)
{

    // $qry="SELECT * FROM gimp_docim AS A LEFT JOIN gimp_mt_category AS B ON A.`docim_category`=B.`mt_categori_id` LEFT JOIN gexp_master_incoterm AS C ON A.`docim_term`=C.`IncotermId` WHERE A.`docim_po` LIKE '%$po%' AND A.`docim_delivery` LIKE '%$start_deliv%' AND A.`docim_consignee` LIKE '%$consig%' AND A.`docim_category` LIKE '%$category%' AND A.`docim_pengirim` LIKE '%$pengirim%' AND A.`docim_forwarder` LIKE '%$forwarder%';";

    $qry="SELECT * FROM gimp_docim AS A LEFT JOIN gimp_mt_category AS B ON A.`docim_category`=B.`mt_categori_id` LEFT JOIN gexp_master_incoterm AS C ON A.`docim_term`=C.`IncotermId` 
    LEFT JOIN gimp_mt_uom AS D ON A.`docim_good_uom`=D.`mt_uom_id` WHERE A.`docim_po` LIKE '%$po%' AND A.`docim_consignee` LIKE '%$consig%' AND A.`docim_category` LIKE '%$category%' AND A.`docim_pengirim` LIKE '%$pengirim%' AND A.`docim_forwarder` LIKE '%$forwarder%' AND A.`docim_stats` BETWEEN '1' AND '2';";

    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->result();
    else
        return array();       
}

function get_filter_docim_byrange($po, $start_deliv, $end_deliv, $consig, $category, $pengirim, $forwarder)
{

    // $qry="SELECT * FROM gimp_docim AS A LEFT JOIN gimp_mt_category AS B ON A.`docim_category`=B.`mt_categori_id` LEFT JOIN gexp_master_incoterm AS C ON A.`docim_term`=C.`IncotermId` WHERE A.`docim_po` LIKE '%$po%' AND A.`docim_delivery` LIKE '%$start_deliv%' AND A.`docim_consignee` LIKE '%$consig%' AND A.`docim_category` LIKE '%$category%' AND A.`docim_pengirim` LIKE '%$pengirim%' AND A.`docim_forwarder` LIKE '%$forwarder%';";

    $qry="SELECT * FROM gimp_docim AS A LEFT JOIN gimp_mt_category AS B ON A.`docim_category`=B.`mt_categori_id` LEFT JOIN gexp_master_incoterm AS C ON A.`docim_term`=C.`IncotermId` 
    LEFT JOIN gimp_mt_uom AS D ON A.`docim_good_uom`=D.`mt_uom_id` WHERE A.`docim_po` LIKE '%$po%' AND A.`docim_delivery` BETWEEN '$start_deliv' AND '$end_deliv' AND A.`docim_consignee` LIKE '%$consig%' AND A.`docim_category` LIKE '%$category%' 
    AND A.`docim_pengirim` LIKE '%$pengirim%' AND A.`docim_forwarder` LIKE '%$forwarder%' AND A.`docim_stats` BETWEEN '1' AND '2';";

    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->result();
    else
        return array();       
}


function getvalue_cat($category)
{
    // $this->db->reconnect();
    $qry="SELECT * FROM gimp_mt_category WHERE mt_categori_id='$category';";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->row();
    else
        return array();       
}


}