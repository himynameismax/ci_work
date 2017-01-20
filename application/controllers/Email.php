<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Email extends CI_Controller
{
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('give_cart');
    }
    public function def(){
        
    }
    public function index()
    {
        
    }

    public function warn(){
        $data['def'] = $this->give_cart->valComp();
        $this->load->view('deficite', $data);
        $this->load->model('');
        // Set SMTP Configuration
        $emailConfig = [
            'protocol' => 'smtp', 
            'smtp_host' => '192.168.11.16', 
            'smtp_port' => 25, 
            'smtp_user' => 'support@nkmz.ru', 
            'smtp_pass' => 'Support2013', 
            'mailtype' => 'html', 
            'charset' => 'utf-8'
        ];
        // Set your email information
        $from = [
            'email' => 'support@nkmz.ru',
            'name' => 'Support'
        ];
       
        $to = array('maksim.sokolov@nkmz.ru');
        $subject = 'Малое количество картриджей на складе';
      //  $message = 'Type your gmail message here'; // use this line to send text email.
        // load view file called "welcome_message" in to a $message variable as a html string.
        $message =  $this->load->view('deficite',$data,true); 
        // Load CodeIgniter Email library
        $this->load->library('email', $emailConfig);
        // Sometimes you have to set the new line character for better result
        $this->email->set_newline("\r\n");
        // Set email preferences
        $this->email->from($from['email'], $from['name']);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
        // Ready to send email and check whether the email was successfully sent
        if (!$this->email->send()) {
            // Raise error message
            show_error($this->email->print_debugger());
        } else {
            
        }
    }
}