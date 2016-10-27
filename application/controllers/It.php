<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class It extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');
		$this->load->library('grocery_CRUD');
	}

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('it_main');
	}

	public function tech_work()
	{
		$crud = new grocery_CRUD();

		$crud->set_theme('datatables');
		$crud->set_table('tech_work');

		$output = $crud->render();

		$this->tw_output($output);
	}
	public function tw_output($output = null)
	{
		$this->load->view('it_tw.php',$output);
	}

	public function computers()
	{
		$crud = new grocery_CRUD();

		$crud->set_theme('datatables');
		$crud->set_table('computers');

		$output = $crud->render();

		$this->comp_output($output);
	}
	public function comp_output($output = null)
	{
		$this->load->view('it_computers.php',$output);
	}

	public function cart()
	{
		$crud = new grocery_CRUD();

		$crud->add_action('Take','','give_cart');

		$crud->set_theme('datatables');
		$crud->set_table('cartridges');

		$output = $crud->render();

		$this->cart_res($output);
	}

	public function cart_res($output = null)
	{
		$this->load->view('cartridges.php',$output);
	}

	public function printers()
	{
		$crud = new grocery_CRUD();

		$crud->set_theme('datatables');
		$crud->set_table('it_equip_printers');

		$output = $crud->render();

		$this->printers_res($output);
	}

	public function printers_res($output = null)
	{
		$this->load->view('it_printers.php',$output);
	}

	public function give_cart()
	{
		$this->load->view('give_cart');
	}


}

class combobox extends CI_Controller  {
 
   function dynamic_combobox(){
     // retrieve the album and add to the data array
        $this->load->model('pagination_model');
        $data['name'] = $this->pagination_model->getPrinters();
        $this->load->view('give_cart', $data);
   }
}
?>



