<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

    class Give_cart extends CI_Model 
        {
            public function __construct() 
            {
                parent::__construct();
            }
            function add_rec($data)
            {
                $this->db->insert('it_cart_given', $data);
                echo "Record Added";
            }

            public function getPrn(){
                $this->db->select('prn_name');
                $this->db->distinct();
                // $this->db->from('it_equip_printers');
                $this->db->order_by('prn_name');
                
                $result = $this->db->get('it_equip_printers');
                $return = array();
                    if($result->num_rows() > 0) {
                        foreach($result->result_array() as $row) {
                        $return[$row['prn_name']] = $row['prn_name'];
                        }
                }
            return $return;
            }
            public function getPrnLoc(){
                $this->db->select('prn_location');
                $this->db->distinct();
                // $this->db->from('it_equip_printers');
                $this->db->order_by('prn_location');
                
                $result = $this->db->get('it_equip_printers');
                $return = array();
                    if($result->num_rows() > 0) {
                        foreach($result->result_array() as $row) {
                        $return[$row['prn_location']] = $row['prn_location'];
                        }
                }
            return $return;
            }

            public function getCart(){
                $this->db->select('name');
                $this->db->distinct();
                // $this->db->from('it_equip_printers');
                $this->db->order_by('name');
                
                $result = $this->db->get('cartridges');
                $return = array();
                    if($result->num_rows() > 0) {
                        foreach($result->result_array() as $row) {
                        $return[$row['name']] = $row['name'];
                        }
                }
            return $return;
            }
    }
?>