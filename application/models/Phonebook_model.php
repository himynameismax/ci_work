<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Phonebook_model extends CI_Model{
     function __construct()
     {
          // Call the Model constructor
          parent::__construct();
     }

     //read the department list from db
     function get_all_phones()
     {
          $sql = 'select post, name, external, internal, location from phones_all';
          $query = $this->db->query($sql);
          $result = $query->result();
          return $result;
     }
     function get_orgs()
     {
          $sql = 'select org_name from org_organizations';
          $query = $this->db->query($sql);
          $result = $query->result();
          return $result;
     }

}
