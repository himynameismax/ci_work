<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Requests_model extends CI_Model {
 
 function __construct()
 {
 	 parent::__construct();
 }
 public function getList($id)
 {
 	$id='7SwA9';
 	if ($this->uri->segment(3))
 	{
 	$this->db->select("*");
 	$this->db->from('it_requests');
 	$this->db->where('id', $id);
 	$query = $this->db->get();
 	return $query->result();
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
