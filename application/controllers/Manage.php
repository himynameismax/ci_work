<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('grocery_CRUD');
	}

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('mng_main.php');
	}
	public function orgs()
	{
		$crud = new grocery_CRUD();

		$crud->set_theme('datatables');
		$crud->set_table('org_organizations');

		$output = $crud->render();

		$this->orgs_output($output);
	}
	public function orgs_output($output = null)
	{
		$this->load->view('mng_orgs',$output);
	}


	public function td_nkmz()
	{
		$crud = new grocery_CRUD();

		$crud->set_theme('datatables');
		$crud->set_table('phones_td');

		$output = $crud->render();

		$this->ph_td_output($output);
	}
	public function ph_td_output($output = null)
	{
		$this->load->view('phones_td',$output);
	}
}