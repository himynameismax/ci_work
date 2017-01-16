<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Requests extends CI_Controller {
 
 function __construct()
 {
   parent::__construct();
   $this->load->helper('form');
   $this->load->library('Form_validation');
   $this->load->helper('url');
   $this->load->helper('string');
   $this->load->library('table');
 }
 
 function index(){
 	$this->load->view('upload', array('error' => ' ' ));

 }
 function do_upload()
	{
		$new_name = time();
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['max_size']	= '2048';
		// $config['max_width']  = '1024';
		// $config['max_height']  = '768';
		$config['file_name'] = $new_name;

		
		
		$this->load->library('upload', $config);
	
		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			
			$this->load->view('upload', $error);
		}	
		else
		{
			$data = array('upload_data' => $this->upload->data());
			// $data = $this->upload->data();
			$req_id=random_string('alnum',5);
			
			$userdata = array(
			'tmc'=>$this->input->post('tmc'),
			'id'=>$req_id,
			'fio'=>$this->input->post('fio'),
			'phone'=>$this->input->post('tel'),
			
			);
			$filesdata=array(
				'req_id'=>$req_id,
				'file_name'=>$this->upload->file_name,
				);
			$this->load->view('upload_success', $data);
			$this->db->insert('it_requests', $userdata);
			$this->db->insert('it_requests_files', $filesdata);

		}
	}
	function lst(){
		$this->load->model('Requests_model');
		$query = $this->Requests_model->getList();
  		$data['reqs'] = null;
  			if($query){
   				$data['reqs'] =  $query;
  			}
	  	$this->load->view('list.php', $data);
		}

		

		function viewReq(){
			// if ($this->uri->segment(3))

			
		}
		
}	
