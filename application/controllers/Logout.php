<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

	class Logout extends CI_Controller {
		function __construct() {
        parent::__construct();

        $this->load->helper('form');
        $this->load->library('Form_validation');
        $this->load->library('Auth_Ldap');
        $this->load->helper('url');
        $this->load->library('table');
    }