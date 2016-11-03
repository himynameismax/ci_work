<?php

class Cb_model extends CI_Model {

function getPrns($prn_name)
{
    $this->db->select("prn_name", $prn_name);
    $this->db->from('it_equip_printers');
    $query = $this->db->get();

    return $query->result();
}

function getPrnParams()
{
    $this->db->select("prn_location");
    $this->db->from('it_equip_printers');
    $this->db->where('prn_id=');
    $query = $this->db->get();

    return $query->result();
}




public function updCart($data)
{
    extract($data);
    $this->db->where('prn_id', $printers);
    $this->db->update($table_name, array('count' => $given_num));
    
}



}


?>
    

