<?php
class dropdown_demo extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->database();
        $this->load->model('dropdown_demo_model');
    }
    
    function index()
    {
        $data['country'] = $this->dropdown_demo_model->get_country();
        $data['state'] = $this->dropdown_demo_model->get_state();
        $data['city'] = $this->dropdown_demo_model->get_city();
        $this->load->view('dropdown_demo_view', $data);
    }
    
    function populate_state()
    {
        $id = $this->input->post('id');
        echo(json_encode($this->dropdown_demo_model->get_state($id)));
    }

    function populate_city()
    {
        $id = $this->input->post('id');
        echo(json_encode($this->dropdown_demo_model->get_city($id)));
    }
}
?>