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
		redirect('/phones/all');
	}
	public function all()
	{
		$crud = new grocery_CRUD();

		$crud->set_theme('datatables');
		$crud->set_table('phones_all');
		$crud->set_relation('id_org', 'org_organizations', 'org_name');
		$crud
			->display_as('post', 'Должность')->display_as('name', 'Имя')->display_as('external', 'Внутренний')->display_as('internal', 'Внешний')->display_as('location', 'Кабинет')->display_as('id_org', 'Организация');

		$output = $crud->render();

		$this->ph_all_output($output);
	}
	public function ph_all_output($output = null)
	{
		$this->load->view('content/phones/phones_all',$output);
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