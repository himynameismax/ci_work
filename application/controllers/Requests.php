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
 
 function index()
 {
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
		$data['reqs'] =  $query;
	  	$this->load->view('list', $data);
		}

		

		function viewReq(){
			$this->load->model('Requests_model');
			$files = $this->Requests_model->getimg();
			// $data['file'] = $files['file_name'];
			$data['filenames'] = $files;
			$this->load->view('editor', $data);

		}
		function getStatus(){
			$this->load->model('Requests_model');

			$stat = $this->Requests_model->getStatuses();
			$data['st'] = $stat['status'];
			$this->load->view('ldap', $data);
		}

		public function show($id) {
			$this->load->model('Requests_model');

			$data['st'] = $this->Requests_model->getStatuses();
			$st_id = $this->input->post('stat');
			
			$data_st = $this->Requests_model->getSt($st_id);
			$statuses = $this->Requests_model->getStatuses();
    		$news = $this->Requests_model->get_req($id);
			$files = $this->Requests_model->getimg($id);
			$data['id'] = $this->uri->segment(3);
        	$data['file'] = $files;
        	$data['status'] = $news['status'];
        	$data['st_id'] = $news['status_id'];
        	
    		$data['fio'] = $news['fio'];
    		$data['no'] = $news['req_no'];
    		$data['phone'] = $news['phone'];
    		
    		$this->load->view('req_view', $data);
    		
    		if($this->input->post('submit') == "accept") { 
            
            // $this->db->insert('it_requests', $data_in);
            $this->db->set('status',$data_st, TRUE);
            $this->db->where('id', $data['id']);
            $this->db->update('it_requests');
            redirect($this->uri->uri_string());
            }
            elseif ($this->input->post('submit') == "go"){

            }


    		
		}
		
}	
