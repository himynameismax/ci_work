<?php
class dropdown_demo_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function get_country()
    {
        $result = $this->db->get('country')->result();;
        $id = array('0');
        $name = array('Select Country');
        for ($i = 0; $i < count($result); $i++)
        {
            array_push($id, $result[$i]->country_id);
            array_push($name, $result[$i]->country_name);
        }
        return array_combine($id, $name);
    }
    
    function get_state($cid=NULL)
    {
        $result = $this->db->where('country_id', $cid)->get('state')->result();
        $id = array('0');
        $name = array('Select State');
        for ($i=0; $i<count($result); $i++)
        {
            array_push($id, $result[$i]->state_id);
            array_push($name, $result[$i]->state_name);
        }
        return array_combine($id, $name);
    }

    function get_city($sid=NULL)
    {
        $result = $this->db->where('state_id', $sid)->get('city')->result();
        $id = array('0');
        $name = array('Select City');
        for ($i=0; $i<count($result); $i++)
        {
            array_push($id, $result[$i]->city_id);
            array_push($name, $result[$i]->city_name);
        }
        return array_combine($id, $name);
    }
}
?>
