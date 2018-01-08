<?php

class Users extends CI_Controller{
  
    public function index(){
        $this->load->model('Usermodel','users');
        //$data['blogs']=$this->users->getUsers();
        //print_r($data);
        //$this->load->view('users_list',$data);

    }



}


?>