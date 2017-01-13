<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
 
 function __construct()
 {
   parent::__construct();
   $this->load->helper('form');
   $this->load->library('Form_validation');
        $this->load->library('Auth_Ldap');
        $this->load->helper('url');
        $this->load->library('table');
 }
 
 function index()
 {
    // $this->load->view('headers/all_header');
    // $this->load->view("auth/logout_view");
    // $this->load->view('content/all');
    $this->session->keep_flashdata('tried_to');
    // $this->login();
    $this->load->view('footer');
    if($this->session->userdata('logged_in')) {
            $data['name'] = $this->session->userdata('cn');
            $data['username'] = $this->session->userdata('username');
            $data['logged_in'] = TRUE;
            $this->auth_ldap->logout();
        } else {
            
            $data['logged_in'] = FALSE;
        }
        $this->load->view('headers/all_header', $data);
 }
 
 function login($errorMsg = NULL){
        $this->session->keep_flashdata('tried_to');
        if(!$this->auth_ldap->is_authenticated()) {
            // Set up rules for form validation
            $rules = $this->form_validation;
            $rules->set_rules('username', 'Username', 'required');
            $rules->set_rules('password', 'Password', 'required');

            // Do the login...
            if($rules->run() && $this->auth_ldap->login(
                    $rules->set_value('username'),
                    $rules->set_value('password'))) {
                // Login WIN!
                if($this->session->flashdata('tried_to')) {
                    redirect($this->session->flashdata('tried_to'));
                }else {
                    redirect('/home/');
                }
            }else {
                // Login FAIL
                $this->load->view('auth/login_form', array('login_fail_msg'
                                        => 'Error with LDAP authentication.'));
            }
        }else {
                // Already logged in...
                redirect('/home/');
        }
    }
 
}
 
?>