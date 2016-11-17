<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CustomWidgets extends MX_Controller {

    public function userLogin()
    {
        $this->load->view('userLogin');
    }
}