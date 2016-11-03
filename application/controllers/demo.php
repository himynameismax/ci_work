<?php
class demo extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('Cb_model');
    }
    
    function index()
    {
        $data['category'] = $this->Cb_model->getCategory();
        $this->form_validation->set_rules('bookname', 'Book Name', 'trim|required');
        $this->form_validation->set_rules('category', 'Category', 'callback_validate_dropdown');
        $this->form_validation->set_rules('author', 'Author', 'trim|required');
        $this->form_validation->set_rules('isbn', 'ISBN', 'trim|required');

        if ($this->form_validation->run() == FALSE)
        {
            // failed validation
            $this->load->view('give_cart', $data);
        }
        else
        {
            // here goes your code to insert into db
            echo "Hooray! Now write down your code to insert book details into database...";
        }
    }
    
    function validate_dropdown($str)
    {
        if ($str == '-CHOOSE-')
        {
            $this->form_validation->set_message('validate_dropdown', 'Please choose a valid %s');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }
}
?>
