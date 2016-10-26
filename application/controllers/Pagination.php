<?php
class pagination extends CI_Controller {
            
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
		$this->load->database();
    }

    public function index()
    {

    }

    function displayUsers()
	{
    // load model
    $this->load->model('Pagination_model');

    // load table library
    $this->load->library('table');
    
    // set table heading
    $this->table->set_heading('ID', 'Name', 'Curr', 'Req');
    
    // set table template
    $style = array('table_open'  => '<table class="table table-bordered table-hover">');
    $this->table->set_template($style);

    // call model function
    $carts = $this->pagination_model->getCart();
    
    // generate table from query result
    $data['usertable'] = $carts;
    
    // load view
    $this->load->view('pagination_view', $data);
	}
        
    
    function add() 
    {
    	
    }
    
}
?>