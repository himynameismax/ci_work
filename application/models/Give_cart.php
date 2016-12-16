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
                $this->db->select('name, current, required');
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

            public function getOpList(){
                $sql = 'select cart_name, prn_name, prn_location, op_date from it_cart_given';
                $query = $this->db->query($sql);
                $result = $query->result();
                return $result;
            }
            public function getCarts(){
                $sql = 'select name, current, required from cartridges';
                $query = $this->db->query($sql);
                $result = $query->result();
                return $result;
            }

            function valComp(){
                $this->db->where('current < required');
                $res = $this->db->get("cartridges")->result();
                return $res;
            }


    }
?>