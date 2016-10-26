<?php
class pagination_model extends CI_Model{

    function __construct()
    {
        parent::__construct();
    }

    function getCart()
    {
    	$sql = 'select * from cartridges';
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

    function getPrinters()
    {
    	$sql = 'select name from printers';
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
}
?>