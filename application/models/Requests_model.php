<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Requests_model extends CI_Model {
 
 function __construct()
 {
 	 parent::__construct();
 }
 public function getList()
 {
 	$this->db->select("*");
 	$this->db->from('it_requests');
 	// $this->db->where('id', $id);
 	$query = $this->db->get();
 	return $query->result();
 }

 public function get_req($id) {
  			if($id != FALSE) {
    			$query = $this->db->get_where('it_requests', array('id' => $id));
    			return $query->row_array();
  				}
  			else {
    			return FALSE;
  				}
		}
 // function getReqById(){
	// 		$this->db->select('*');
 //    		$this->db->from('it_requests');
 //    		// $this->db->join('it_requests_files', 'id=req_id', 'inner');
 //    		$query = $this->db->get();    
 //    		return $query->result();
			
	// 	}

}
