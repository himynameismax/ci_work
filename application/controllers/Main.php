<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * This controller can be accessed 
 * for all logged in users
 */
class Main extends CI_Controller {	

	public function index()
	{
		$this->load->view("parts/all_header");
		// $this->load->view("navbar");
		$this->load->view("all");
		$this->load->view("footer");
	}

}