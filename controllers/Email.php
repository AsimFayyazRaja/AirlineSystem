<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {
	
	public function index()
	{
        $config=Array(
            'protocol'=> 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'l154097@lhr.nu.edu.pk',
            'smtp_pass' => "12february:'("
        );
        $this->load->library('email',$config);
        $this->email->set_newline("\r\n");

        $this->email->from('l154097@lhr.nu.edu.pk',"Emirates Airline");
        $this->email->to('rajaasimgolden@gmail.com');
        $this->email->subject('Flight Iternary');
        $this->email->message('You have booked a flight');

        if($this->email->send()){
            echo "Email sent";
        }
        else{
            show_error($this->email->print_debugger());
        }
    }
}