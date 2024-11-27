<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');

    }

	public function index()
	{
		$data['infoclient'] = $this->db->get('client')->result_array();
		$data['infoportofolio'] = $this->db->get('portofolio')->result_array();
		$this->load->view('User/index', $data);
	}

	public function sendEmail()
	{
        $email = $this->input->post('email');
        $subject = $this->input->post('subject');
        $message = $this->input->post('message');
        $email_config = Array(
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => '465',
            'smtp_user' => 'nugrohodwi158@gmail.com',
            'smtp_pass' => 'bowgwyzfxmwblrhn',
            'mailtype'  => 'html',
            'starttls'  => true,
            'newline'   => "\r\n"
        );
            $this->load->library('email', $email_config);
            $this->email->from($email);
            $this->email->to('nugrohodwi158@gmail.com');
            $this->email->subject($subject);
            $this->email->message($message );

           if ($this->email->send()) {
log_message ( 'info', 'Email Sucessfully Sent');
} else {
log_message ( 'error', 'Failed To Send Interview Notification. Email Debug: ' . print_r ( $this->email->print_debugger ( array ('headers','subject') ), TRUE ) );
}
        // if ( $this->email->send() ) {
        //     $errors = $this->email->print_debugger();
        //     print_r($errors);
        // } else {

        //     $errors = $this->email->print_debugger();
        //     print_r($errors);
        // }
    }
	
}