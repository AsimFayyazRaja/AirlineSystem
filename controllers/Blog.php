<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {
	
	public function index()
	{
		$this->load->model('Authenticate', 'auth');
		$data=$this->auth->getData();
		print_r ($data);
		$this->load->view("blog_index");
	}

	public function test()
	{
		echo "test function";
	}
}
