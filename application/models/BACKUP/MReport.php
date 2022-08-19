<?php
class MReport extends CI_Model
{
    function __construct()
		{
			parent::__construct();
        }

function getyears_data()
{
    $qry="SELECT *, docim_created_years AS tahun_data FROM gimp_docim GROUP BY docim_created_years;";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->result();
    else
        return array();       
}


function getreport_data_value_byconsignee($consignee_id, $category_id)
{
    $qry="SELECT *,SUM(A.`docim_cif2`) AS val_cif2 FROM gimp_docim AS A LEFT JOIN gimp_mt_category AS B ON A.`docim_category`=B.`mt_categori_id` 
    WHERE A.`docim_category`='$category_id' AND A.`docim_consignee`='$consignee_id' GROUP BY A.`docim_created_years`;";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->result();
    else
        return array();       
}


function getcategory_active()
{
    $qry="SELECT * FROM gimp_mt_category WHERE mt_categori_stats='1';";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->result();
    else
        return array();       
}

function getreport_active1($start,$finish)
{
    $qry="SELECT *, SUM(B.`docim_cif2`) AS val_cif2, SUM(B.`docim_landed_cost`) AS val_landed, AVG(B.`docim_leadtime`) AS val_leadtime FROM gimp_mt_category AS A LEFT JOIN gimp_docim AS B ON A.`mt_categori_id`=B.`docim_category` 
    WHERE B.`docim_stats`='1' AND A.mt_categori_stats='1' AND B.`docim_consignee`='1' AND B.`docim_created_years` between '$start' AND '$finish' GROUP BY B.`docim_category`, B.`docim_created_years`;";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->result();
    else
        return array();       
}


function getreport_active2($start,$finish)
{
    $qry="SELECT *, SUM(B.`docim_cif2`) AS val_cif2, SUM(B.`docim_landed_cost`) AS val_landed, AVG(B.`docim_leadtime`) AS val_leadtime FROM gimp_mt_category AS A LEFT JOIN gimp_docim AS B ON A.`mt_categori_id`=B.`docim_category` 
    WHERE B.`docim_stats`='1' AND A.mt_categori_stats='1' AND B.`docim_consignee`='2' AND B.`docim_created_years` between '$start' AND '$finish' GROUP BY B.`docim_category`, B.`docim_created_years`;";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->result();
    else
        return array();       
}

function getreport_active3($start,$finish)
{
    $qry="SELECT *, SUM(B.`docim_cif2`) AS val_cif2, SUM(B.`docim_landed_cost`) AS val_landed, AVG(B.`docim_leadtime`) AS val_leadtime FROM gimp_mt_category AS A LEFT JOIN gimp_docim AS B ON A.`mt_categori_id`=B.`docim_category` 
    WHERE B.`docim_stats`='1' AND A.mt_categori_stats='1' AND B.`docim_consignee`='3' AND B.`docim_created_years` between '$start' AND '$finish' GROUP BY B.`docim_category`, B.`docim_created_years`;";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->result();
    else
        return array();       
}


}