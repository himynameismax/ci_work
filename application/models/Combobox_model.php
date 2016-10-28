<?php
class combobox_model extends CI_Model {
    function getPrn() {
        $data = array();
        $query = $this->db->get('it_equip_printers');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row){
                    $data[] = $row;
                }
        }
        $query->free_result();
        return $data;
    }
}
?>