<?php if (!defined('BASEPATH'))
  exit('No direct script access allowed');

  class Carts extends MY_Controller 
  {
  	public function __construct() 
  		{
        parent::__construct();
  			$this->load->model('give_cart');
  		}

      protected $access = "Admin";

  		function index(){
  			$data['printers'] = $this->give_cart->getPrn();
  			$data['printers_loc'] = $this->give_cart->getPrnLoc();
  			$data['carts'] = $this->give_cart->getCart();
  			$data['cts'] = $this->give_cart->getCarts();
  			$data['op_list'] = $this->give_cart->getOpList();
        $data['def'] = $this->give_cart->valComp();
        $this->load->view("admin/admin_header");
  			$this->load->view('cart_give', $data);
        // $this->load->view("headers/all_header");
  		}

      function give(){
        $data['printers'] = $this->give_cart->getPrn();
        $data['printers_loc'] = $this->give_cart->getPrnLoc();
        $data['carts'] = $this->give_cart->getCart();
        $this->load->view('carts/give', $data);
      }

      function history(){
        $data['op_list'] = $this->give_cart->getOpList();
        $this->load->view('carts/history', $data);
      }

      function main(){
        $data['cts'] = $this->give_cart->getCarts();
        $this->load->view('cart_give', $data);
      }

      public function def(){
        $data['def'] = $this->give_cart->valComp();
        $this->load->view('deficite', $data);
      }

  		function cartOut(){
  			$ins = array(
            'cart_name' => $this->input->post('out_name'),
            'prn_name' => $this->input->post('prn_name'),
            'prn_location' => $this->input->post('prn_location'),
            'name' => $this->input->post('in_name'),
            'add_value' => $this->input->post('cart_amount'),
            );

            if($this->input->post('submit') == "OUT") { 
            $this->db->insert('it_cart_given', $ins);

            $this->db->set('current','current-1', FALSE);
            $this->db->where('name', $ins['cart_name']);
            $this->db->update('cartridges');

            // $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Employee details added to Database!!!</div>');
            redirect('Carts');
            } else {
              // $val = $this->input->post('cart_amount');
              $this->db->set('current', 'current+'.$ins['add_value'].'', FALSE);
              $this->db->where('name', $ins['name']);
              $this->db->update('cartridges');
            // $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Employee details added to Database!!!</div>');
            redirect('Carts');
            }

            
        	
  		}


  }
?>