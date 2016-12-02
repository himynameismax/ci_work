<?php if (!defined('BASEPATH'))
  exit('No direct script access allowed');

  class Carts extends CI_Controller 
  {
  	public function __construct() 
  		{
			parent::__construct();
  			$this->load->model('give_cart');
  			


  		}
  		function index(){
  			$data['printers'] = $this->give_cart->getPrn();
  			$data['printers_loc'] = $this->give_cart->getPrnLoc();
  			$data['carts'] = $this->give_cart->getCart();
  			$this->load->view('cart_give', $data);
  		}

  		function giveCart(){
  			$ins = array(
            'cart_name' => $this->input->post('name'),
            'prn_name' => $this->input->post('prn_name'),
            'prn_location' => $this->input->post('prn_location'),
            );

            $this->db->insert('it_cart_given', $ins);

            $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Employee details added to Database!!!</div>');
        	redirect('Carts');
  		}

  		function cartUpdate(){
  			
  		}
  }
?>