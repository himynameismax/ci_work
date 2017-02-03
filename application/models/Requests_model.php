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
    			// $query = $this->db->get_where('it_requests', array('id' => $id));
    			// return $query->row_array();

    			$this->db->select('*');
  				$this->db->from('it_requests');
  				$this->db->where('id', $id);
  				$this->db->join('it_req_status', 'it_requests.status = it_req_status.status_id', 'left');
  				$query = $this->db->get();
         		$result = $query->row_array();
          		return $result;
  				}
  			else {
    			return FALSE;
  				}
		}
		public function get_img($id) {
  			if($id != FALSE) {


    			$query = $this->db->get_where('it_requests_files', array('req_id' => $id));
    			return $query->row_array();
  				}
  			else {
    			return FALSE;
  				}
  			}

  			// public function getimg() {
  				
  			// 	$this->db->select('file_name');
  			// 	$this->db->from('it_requests_files');
  			// 	$this->db->where('req_id','MgTFI');
  			// 	$query = $this->db->get();
    	// 		$result= $query->result();
    	// 		echo $result;
  			// 	}

  			public function getimg($id){
            	//$sql = 'select * from it_requests_files';
          		// $query = $this->db->query($sql);
          		$this->db->select('file_name');
  				$this->db->from('it_requests_files');
  				$this->db->where('req_id', $id);																																																						
  				$query = $this->db->get();
         		$result = $query->result();
          		return $result;
            }

  			public function getStatuses() {
				$query = $this->db->query('SELECT * FROM it_req_status');
    			$dropdowns = $query->result();
    			foreach($dropdowns as $dropdown) {
		        $dropDownList[$dropdown->status] = $dropdown->status;
    				}
    					$finalDropDown = array_merge(array('' => 'Выберите статус'), $dropDownList);

    				return $finalDropDown;
  					}

  			public function getSt($st_id)
  			{
                $this->db->select('*');
                // $this->db->distinct();
                $this->db->from('it_req_status');
                $this->db->where('status', $st_id);
                
                
                $query = $this->db->get();
                if ($query->num_rows() > 0) {
    				foreach ($query->result() as $row) {
        			return $row->status_id;
        			}
    			}   
            }
}
