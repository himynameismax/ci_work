<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
 
 function __construct()
 {
   parent::__construct();
 }
 
 function index()
 {
    $this->load->view("all_header");
    // $this->load->view("navbar");
    $this->load->view("all");
    $this->load->view("footer");
 }
 
 function logout()
 {
   $this->session->unset_userdata('logged_in');
   session_destroy();
   redirect('home', 'refresh');
 }
 
}
 
?>