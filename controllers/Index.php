<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {
	
	public function home()
	{
		$this->load->view('index');
	}

	public function about_us()
	{
		$this->load->view('about_us');
	}

	public function map()
	{
		$this->load->view('map');
	}
}
?>