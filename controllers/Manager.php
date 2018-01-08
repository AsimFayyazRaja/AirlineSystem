<?php

class Manager extends CI_Controller{
  
    public function index(){
        $data=[];
        $credentials=[];
        $credentials=$this->input->post();
        if(isset($_COOKIE['memail'])){
            $this->load->model("Flights");
            $data['flights'] = $this->Flights->notapproved();
            $this->load->view("manager",$data);
          }
          else{
        //print_r($data);
        try{
            //print_r($data);
            if($credentials==[] && !isset($_COOKIE['memail'])){
                throw new exception;
            }
            else if($credentials!=[]){
                //print_r($credentials);
                if($credentials['email']=="asim@asim" && $credentials['pass']=="asim")
                {
                    setcookie('memail',$credentials['email'],time()+60*60*7);
                    session_start();
                    $_SESSION['memail']=$credentials['email'];
                    $this->load->model("Flights");
                    $data['flights'] = $this->Flights->notapproved();
                    $this->load->view("manager",$data);            
                }
            }
            }catch(Exception $e){
                echo "Please enter correct credentials";
            }
        }
        } 
        
        /*    else if($data!=[] || $data!=null){
        if($data['email']=="asim@asim" && $data['pass']=="asim"){
            setcookie('memail',$data['email'],time()+60*60*7);
            session_start();
            $_SESSION['memail']=$data['email'];
            
            $this->load->model("Flights");
        $data['flights'] = $this->Flights->notapproved();
        $this->load->view("manager",$data);
        }
    }
    }catch(exception $e){
        echo "Please enter valid credentials";
    }*/

    public function managerlogout(){
        setcookie('memail',null,time()+60+60*7);
        $this->load->view('login_manager');
    }

    public function managerlogin(){
        $this->load->view('login_manager');
    }

    public function approveflight(){
        if(isset($_COOKIE['memail'])){
        $this->load->model("Flights");
        $data['flights'] = $this->Flights->notapproved();     //calling method notapproved in model Flights
        $this->load->view("manager",$data);}
        else{
            echo "Please login to access this page.";
        }
    }

    public function approveit(){
        
        $request_body = file_get_contents('php://input');  //can do json_decode($this->input->raw_input_stream); 
        $data = json_decode($request_body);
        //var_dump($data);
        print_r ($data->id);
        $id=(int)$data->id;
        $idd=$id;
        $this->load->model("Flights");
        $data['flights']=$this->Flights->approvethisflight($idd);
        $this->load->view("manager",$data);
    }
}

?>