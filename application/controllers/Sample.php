<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Sample extends CI_Controller {

	public function index(){
		$this->load->view("modal");
	}
	public function modal()
        {
	    $data["msg"]="";
	    $this->form_validation->set_rules('email', 'email', 'required');
	    $this->form_validation->set_rules('pass', 'password', 'required');
 
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('modal', $data);
		}
		else 
		{
			$data["msg"]="Login Successful";
			$this->load->view("modal", $data);
		}
	}
}