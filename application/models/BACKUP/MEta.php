<?php
class MEta extends CI_Model
{
	function __construct()
		{
			parent::__construct();
        }

function getshipper_master()
{
    // $this->db->reconnect();
    $qry="SELECT * FROM gimp_docim WHERE docim_stats='1' GROUP BY docim_pengirim;";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->result();
    else
        return array();       
}

public function get_po_byshipper($shipper){
    // $sql = "select Branch_Code, Branch from Master_DSO where Company_Code = '".$company."'";

    $sql="SELECT docim_po, docim_id FROM gimp_docim WHERE docim_pengirim='".$shipper."'";

    $query = $this->db->query($sql);
    $result = $query->result_array();

    return $result;
}

public function get_hierarchy_bypo($docim_id){
    // $sql = "select Branch_Code, Branch from Master_DSO where Company_Code = '".$company."'";

    $sql="SELECT * FROM gimp_docim WHERE docim_id='".$docim_id."'";

    $query = $this->db->query($sql);
    $result = $query->result_array();

    return $result[0];
}


function insert_master_eta($data){
    $qry=$this->db->insert('gimp_eta_pib',$data);
    if(!$qry)
        {
            // $error = $this->db->error();
            // return $error;
            return FALSE; // Has keys 'code' and 'message'
        }else{
            return TRUE;
        }
}

function Getall_master_eta()
{
    // $this->db->reconnect();
    $qry="SELECT * FROM gimp_eta_pib AS A LEFT JOIN gimp_docim AS B ON A.`etapib_po`=B.`docim_id` WHERE etapib_stats BETWEEN '1' AND '2'";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->result();
    else
        return array();       
}

function Getall_master_eta_bysearch($shipper,$po_no,$etd,$eta)
{
    // $this->db->reconnect();
    $qry="SELECT * FROM gimp_eta_pib AS A LEFT JOIN gimp_docim AS B ON A.`etapib_po`=B.`docim_id` WHERE etapib_stats BETWEEN '1' AND '2' AND A.`etapib_shipper` LIKE '%$shipper%' AND B.`docim_po` LIKE '%$po_no%' 
    AND B.`docim_ETD` LIKE '%$etd%' AND B.`docim_ETA` LIKE '%$eta%'";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->result();
    else
        return array();       
}

function getrows_master_eta($etapib_id)
{
    // $this->db->reconnect();
    $qry="SELECT * FROM gimp_eta_pib WHERE etapib_stats BETWEEN '1' AND '2' AND etapib_id='$etapib_id'";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->row();
    else
        return array();       
}

function update_eta_byid($data, $params1)
{
	$this->db->where('etapib_id', $params1);
    $qry=$this->db->update('gimp_eta_pib', $data);
        if(!$qry)
            {
                return FALSE; // Has keys 'code' and 'message'
        }else{
                return TRUE;
            }
}

function get_filter_data($shipper,$po_no,$etd,$eta)
{
    $qry="SELECT * FROM gimp_eta_pib AS A LEFT JOIN gimp_docim AS B ON A.`etapib_po`=B.`docim_id` WHERE A.etapib_stats='1' AND A.`etapib_shipper` LIKE '%$shipper%' AND B.`docim_po` LIKE '%$po_no%' AND A.`etapib_etd` LIKE '%$etd%' AND A.`etapib_eta` LIKE '%$eta%';";
    $res = $this->db->query($qry);

    if ($res->num_rows() > 0)
        return $res->result();
    else
        return array();       
}


}

