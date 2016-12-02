<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 class Phonebook extends CI_Controller {
     public function __construct()
     {
          parent::__construct();
          $this->load->helper('url');
          $this->load->database();
     }

     public function index()
     {
          //load the department_model
          $this->load->model('Phonebook_model');
          //call the model function to get the department data
          $phoneresult = $this->Phonebook_model->get_all_phones();
          $data['phones_all'] = $phoneresult;

          $orgresult = $this->Phonebook_model->get_orgs();
          $data['orgs'] = $orgresult;

          //load the department_view
          $this->load->view('phonebook_view',$data);
     }



}