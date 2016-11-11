<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Phones extends CI_Controller {

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
		$this->load->view('pnones_main');
	}

	public function td_nkmz()
	{
		$crud = new grocery_CRUD();

		$crud->set_theme('datatables');
		$crud->set_table('phones_td');

		$output = $crud->render();

		$this->ph_all_output($output);
	}
	public function ph_all_output($output = null)
	{
		$this->load->view('phones_td',$output);
	}
}