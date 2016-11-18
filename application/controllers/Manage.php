<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage extends CI_Controller {

	protected $access = "Admin";
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

		$crud->set_theme('flexigrid');
		$crud->set_table('org_organizations');

		$output = $crud->render();

		$this->orgs_output($output);
	}
	public function orgs_output($output = null)
	{
		$this->load->view('mng_orgs',$output);
	}


	public function departs()
	{
		$crud = new grocery_CRUD();

		$crud->set_theme('flexigrid');
		$crud->set_table('org_departs');

		$crud->set_relation('org_id', 'org_organizations', 'org_name');
		$crud
			->display_as('dep_name', 'Название отдела')->display_as('org_id', 'Организация');

		$output = $crud->render();

		$this->departs_output($output);
	}
	public function departs_output($output = null)
	{
		$this->load->view('mng_departs',$output);
	}
}