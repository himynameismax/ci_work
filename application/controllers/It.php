<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class It extends MY_Controller {

	protected $access = "Admin";
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('grocery_CRUD');
		$this->load->model('Cb_model');
	}

	

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('/admin/it_main');
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
		$crud->set_table('computers');
		$crud->order_by('name');
		$crud->columns('name','username', 'password');
		$crud->callback_column('name',array($this,'_callback_test_function'));
		$crud->set_theme('flexigrid');
		$output = $crud->render();
		$this->comp_output($output);
	}
	public function comp_output($output = null)
	{
		$this->load->view('it_computers.php',$output);
	}

	public function msoffice()
	{
		$crud = new grocery_CRUD();

		$crud->columns('user','pc_name', 'organization', 'serial');

		$crud->set_table('it_software_msoffice');

		$crud->order_by('pc_name');
		
		$crud->set_theme('datatables');

		$output = $crud->render();

		$this->msoffice_output($output);
	}
	public function msoffice_output($output = null)
	{
		$this->load->view('it_msoffice.php',$output);
	}

	public function cart()
	{
		$crud = new grocery_CRUD();

		$crud->callback_column('name',array($this,'_give_cart_callback'));
		

		$crud->set_theme('datatables');
		$crud->set_table('cartridges');

		$output = $crud->render();

		$this->cart_res($output);
	}

	public function _give_cart_callback($value, $row)
	{
  		
	}

	function setCartGiven()
	{
    	$data = array (
    		'table_name' => 'it_cart_given',
    		'printers' => $this->input->post('printers'),
    		'given_num' => $this->input->post('given_num')
    		);
    	$this->load->model('Cb_model');
    	$this->model->$updCart($data);

	}

	public function show_data_by_id()
	{
		$id = $this->input->post('id');
		if ($id != "") {
		$result = $this->Cb_model->getPrnInfo($id);
			if ($result != false) 
			{
				$data['result_display'] = $result;
			} 
			else 
			{
				$data['result_display'] = "No record found !";
			}
			} else {
				$data = array(
				'id_error_message' => "Id field is required"
			);
			}
			$data['show_table'] = $this->view_table();
			$this->load->view('give_cart', $data);
	}



	public function give_cart($prn_name)
	{
		$this->load->model('Cb_model');
		$data['prn_name']=$prn_name;

		// $data['prn_name']=$this->Cb_model->getPrns($prn_name);
		// $data['prn_par']=$this->Cb_model->getPrnParams();
		// $this->load->view('give_cart', $data);
		// if( $this->input->post) 
		// {
  //     		echo $this->input->post("printers");
  //  		}
	}

	public function cart_res($output = null)
	{
		$this->load->view('cartridges.php',$output);
	}

	public function _callback_test_function($value, $row)
	{
  		return "<a href='http://www.grocerycrud.com/assets/themes/default/images/logo.png' class='fancybox'>$value</a>";
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

	

}


?>



