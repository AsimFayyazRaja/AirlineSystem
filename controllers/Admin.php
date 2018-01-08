<?php

class Admin extends CI_Controller{

//approved=0 means not approved
//approved=1 means approved
//approved=2 means disapproved
    public function index(){
        $data=[];
        $data=$this->input->post();
        if(isset($_COOKIE['email'])){
            $this->load->view('admin');
          }
          try{
              //print_r($data);
              if($data==[] && !isset($_COOKIE['email'])){
                  throw new exception;
              }
        else if($data!=[]){
        if($data['email']=="asim@asim" && $data['pass']=="asim")
        {
            setcookie('email',$data['email'],time()+60*60*7);
            session_start();
            $_SESSION['email']=$data['email'];
            $this->load->view('admin');
        }
    }
    }catch(Exception $e){
        echo "Please enter correct credentials";
    }
    }

    public function adminlogout(){
        setcookie('email',null,time()+60+60*7);
        $this->load->view('login_admin');
    }
      
    public function adminlogin(){
        $this->load->view('login_admin');
    }

    public function editthisflight(){
        $form_data=$this->input->post();
        //print_r($form_data);
        $this->load->model('flights');
        if($this->flights->editit($form_data)){
            echo "Flight edited";
        }else{
            echo "Error in editing flight";
        }
    }

    public function edit_flight(){
        //echo "in edit flight";
        if(isset($_COOKIE['email'])){
            $this->load->model('flights');
            $query['data']=$this->flights->getallflights();
            //print_r($query);
            $this->load->view('allflights',$query); 
          }
          else{
              echo "Please login before accessing this page.";
          }
    }

    public function places(){
        $this->load->view('places');
    }

    public function addflight(){
        $form_data=null;
        $form_data = $this->input->post();
        //print_r($form_data);
        if($form_data==null){
            echo "Please add a proper flight";
            die;
        }
        echo "<br>";
        //print_r($form_data['from']);
        $form_data['approved']=0;
        //$form_data['id']=12345;
        print_r($form_data);
        if($form_data==null){
            $this->load->view('admin');
            die;
        }
        $this->load->model("flights");
        if($form_data['from']==$form_data['to']){
            echo "Origin and Destination can't be same";
            die;
        }
        $query = $this->flights->insert('Flights',$form_data);
        echo "Flight added successfully";
        echo "<br>";
        echo "<pre>";
        print_r($query);
        echo "</pre>";
        //var_dump($query);
    }

    public function complex(){
        $this->load->view('complex');
    }

    public function details(){
        $this->load->view('details');
    }


    public function otherflights(){
        $form_data = $this->input->post();
        $from=$this->input->post('origin');
        $to=$this->input->post('destination');
        $url="http://flightaware.com/live/findflight?origin=".$from."&destination=".$to;
        //curl request to find a flight
        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, $url); 
        curl_setopt($ch, CURLOPT_HEADER, 1); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $data = curl_exec($ch); 
        curl_close($ch);
        print_r($data);
    }
    public function trackflight(){
        $form_data = $this->input->post();
        $airline=$this->input->post('airline');
        $flight=$this->input->post('flight');
        $url="https://flightaware.com/live/flight/".$airline.$flight;
        //curl request to find a flight
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url); 
        curl_setopt($ch, CURLOPT_HEADER, 1); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $data = curl_exec($ch); 
        curl_close($ch);
        print_r($data);
    }
}
?>