<?php

class Flights extends CI_Model{

        public function dropit(){
                $this->load->dbforge();
                $this->dbforge->drop_table('Flights',TRUE);
        }

    public function insert($table,$data)            //inserts flight in given table
    {
        $this->load->database();
        $this->load->dbforge();
        if ($this->db->table_exists('Flights') )
            {
                echo "Table exists";
                echo "<br>";
                echo $table;
                echo "<br>";
                print_r($data);
                $this->db->insert($table,$data);
                $query=$this->db->get("Flights");
                $result=$query->result_array();
                return $result;
            }
            else
            {
                echo "Table doesnt exist";
                echo "<br>";
                echo $table;
                echo "<br>";
                print_r ($data);
                $fields = array(
                'id' => array(
                        'type' => 'INT',
                        'constraint' => 5,
                        'unsigned' => TRUE,
                        'auto_increment' => TRUE
                ),
                'from' => array(
                        'type' => 'VARCHAR',
                        'constraint' => '100'
                ),
                'to' => array(
                        'type' => 'VARCHAR',
                        'constraint' => '100'
                ),
                'date' => array(
                        'type' =>'DATE'
                ),
                'time' => array(
                        'type' => 'TIME'
                ),
                'seatsF' => array(
                        'type' => 'INT'
                ),
                'seatsB' => array(
                        'type' => 'INT'
                ),
                'seatsE' => array(
                        'type' => 'INT'
                ),
                'priceF' => array(
                        'type' => 'INT'
                ),
                'priceB' => array(
                        'type' => 'INT'
                ),
                'priceE' => array(
                        'type' => 'INT'
                ),
                'approved' => array(
                        'type' => 'INT'
                )
                );  
             $this->dbforge->add_field($fields);
            $this->dbforge->add_key('id', TRUE);
            $this->dbforge->create_table('Flights');
            $query=$this->db->insert($table,$data);
            return $query;
            }

    }

    public function notapproved()               //for manager to approve things
    {
        $this->load->database();
        $this->load->dbforge();
        $this->db->where('approved', 0);
        $query=$this->db->get("Flights");
        $result=$query->result_array();
        return $result;   
    }

    public function giveprice($origin,$destination){
        $this->load->database();
        $this->load->dbforge();  
       
        $i=0;
        $result=$this->getFlightsforCustomer();
        //print_r($result);
        $toreturn=array();
        foreach($result as $key){
                if($key['from']==$origin && $key['to']==$destination)
                {
                        $toreturn[$i]=$key;
                        $i++;
                }
                
                //print_r($key);
        }
        return $toreturn;
    }

    public function giveseats($flightnum,$date){
        $this->load->database();
        $this->load->dbforge();  
            
        $i=0;
        $result=$this->getFlightsforCustomer();
        //print_r($result);
        $toreturn=array();
        foreach($result as $key){
                if($key['id']==$flightnum && $key['date']==$date)
                {
                        $toreturn[$i]=$key;
                        $i++;
                }
              
        }
        return $toreturn;
    }

    public function getdestinations($from, $q)
    {
        $this->load->database();
        $this->load->dbforge();
        $result=$this->getFlightsforCustomer();
        $i=0;
        $toreturn=array();
        $hint="";
        $len=strlen($q);
        $arr=array();
        foreach($result as $key){
                if($key['from']==$from){
                        $arr[$i]=$key;
                        $i++;
                }
        }
        foreach($arr as $key){
                if (stristr($q, substr($key['to'], 0, $len))) {
                        if ($hint === "") {
                            $hint = $key['to'];
                        } else {
                            $hint .= ", ".$key['to']." ";
                        }
                    }
        }
        
        if($hint=="")
              {  return "No flights available.";
                     }       else{
                return $hint;
        }
    }

    public function geteseats($from,$to,$eseats){
        $this->load->database();
        $this->load->dbforge();
        $result=$this->getFlightsforCustomer();
        $i=0;
        foreach($result as $key){
                if($key['from']==$from && $key['to']==$to && $key['seatsE']>=$eseats){
                        $i++;
                }
        }
        if($i){
                return true;
        }else{
                return false;
        }
    }

    public function getbseats($from,$to,$eseats){
        $this->load->database();
        $this->load->dbforge();
        $result=$this->getFlightsforCustomer();
        $i=0;
        foreach($result as $key){
                if($key['from']==$from && $key['to']==$to && $key['seatsB']>=$eseats){
                        $i++;
                }
        }
        if($i){
                return true;
        }else{
                return false;
        }
    }

    public function getfseats($from,$to,$eseats){
        $this->load->database();
        $this->load->dbforge();
        $result=$this->getFlightsforCustomer();
        $i=0;
        foreach($result as $key){
                if($key['from']==$from && $key['to']==$to && $key['seatsF']>=$eseats){
                        $i++;
                }
        }
        if($i){
                return true;
        }else{
                return false;
        }
    }

    public function getorigins($q){
        $this->load->database();
        $this->load->dbforge();
        $result=$this->getFlightsforCustomer();
        $i=0;
        $toreturn=array();
        $hint="";
        $len=strlen($q);
        foreach($result as $key){
                if (stristr($q, substr($key['from'], 0, $len))) {
                        if ($hint === "") {
                            $hint = $key['from'];
                        } else {
                            $hint .= ", ".$key['from']." ";
                        }
                    }
        }
        
        if($hint=="")
              {  return "No flights available.";
                     }       else{
                return $hint;
        }
    }

    public function checkflight($form_data)               //checks the flight that user wan to buy that if it has
    {            
        //print_r($form_data);                               //certain requirements fulfilled
        $x=0;
        $this->load->database();
        $this->load->dbforge();
        $query=$this->db->get("Flights");
        $result=$query->result_array();
        //echo"<pre>";
        //print_r($result);
        //echo"</pre>";
        //echo "<br>";
        $from=$form_data['from'];
        $to=$form_data['to'];
        $this->db->where('to', $to);
        $this->db->where('from', $from);
        $this->db->where('approved', 1);
        $query=$this->db->get("Flights");
        $result=$query->result_array();
        //print_r($result);
        //echo "<br><br>";
        //print_r($result[0]['seatsF']);
        foreach ($result as $flight) {
        //echo"<pre>";
        //print_r($flight);
        //echo"</pre>";
        //echo "<br>";
        if($form_data['seatsF']<1)
        {
                $form_data['seatsF']=0;
        }
        if($form_data['seatsB']<1)
        {
                $form_data['seatsB']=0;
        }
        if($form_data['seatsE']<1)
        {
                $form_data['seatsE']=0;
        }
        if($form_data['seatsE']<1 && $form_data['seatsB']<1 && $form_data['seatsF']<1){
                echo "Please select more than 0 seats";
                return null;
        }
        $toreturn['email']=null;
                if(($form_data['seatsF']<=$flight['seatsF'] && $flight['seatsF'] >=0)  && ($form_data['seatsB']<=$flight['seatsB'] && $flight['seatsB'] >=0) && ($form_data['seatsE']<=$flight['seatsE'] && $flight['seatsE'] >=0)){
                        //echo "Can book this flight";
                        $payment=$form_data['seatsF']*$flight['priceF']+$form_data['seatsB']*$flight['priceB']+$form_data['seatsE']*$flight['priceE'];
                        //echo "<br>";
                        //echo $payment;
                        $x=1;
                        $flight['seatsF']=$flight['seatsF']-$form_data['seatsF'];
                        $flight['seatsB']=$flight['seatsB']-$form_data['seatsB'];
                        $flight['seatsE']=$flight['seatsE']-$form_data['seatsE'];
                        $this->db->where('id', $flight['id']);

                        $this->db->set($flight);
                        
                        $this->db->update('Flights'); // UPDATES the row in db and sets seats now accordingly after
                                                                //purchase
                        //echo"<pre>";
                        //print_r($flight);
                        //echo"</pre>";
                        $toreturn=$flight;
                        $toreturn['id']=$flight['id'];
                        $toreturn['seatsF']=$form_data['seatsF'];
                        $toreturn['seatsB']=$form_data['seatsB'];
                        $toreturn['seatsE']=$form_data['seatsE'];
                        $toreturn['payment']=$payment;
                        $toreturn['email']=$form_data['email'];
                        return $toreturn;
                        break;                
                }
                else{
                        echo "Seats not available in desired flight";
                        echo "<br>";
                }
        }
        /*for($i=0;$result[$i]!=null;$i++){
                print_r ($result[$i]);
                
        }*/
        //print_r($form_data);
        if($x==0){
                echo "Sorry please enter correct informtion";
        }
        return null;   
    }

    public function getto($q){
        $this->load->database();
        $this->load->dbforge();
        $result=$this->getFlightsforCustomer();
        $i=0;
        $arr="";
        foreach($result as $key){ 
                if($key['from']==$q){
                        $arr=$arr.$key['to'].", " ;
                }
        }
        if($arr==""){
                return null;
        }else{
                return $arr;
        }
    }

    public function rejectthisflight($form_data){
        $this->load->database();
        $this->load->dbforge();
        $this->db->where('id', $form_data['id']);
        $query=$this->db->get("Flights");
        $result=$query->result_array();
        //print_r($result);
        $seatsF=$result[0]['seatsF']+$form_data['seatsF'];
        $seatsB=$result[0]['seatsB']+$form_data['seatsB'];
        $seatsE=$result[0]['seatsE']+$form_data['seatsE'];
        $this->db->where('id',$form_data['id']);
        //$this->db->set($result);
        $this->db->update('Flights',array('seatsF'=>$seatsF,'seatsB'=>$seatsB,'seatsE'=>$seatsE));
        //$this->db->where('id', $id);
        $query=$this->db->get("Flights");
        $result=$query->result_array();
        //echo "<br>";
        //echo "<pre>";
        //print_r($result);
        //echo"</pre>";
    }

    public function approvethisflight($id){
        echo "<br>";
        echo $id;
        echo "<br>";
        //print_r("Id got here in model as: " + $id);
        $this->load->database();
        $this->load->dbforge();
        $this->db->where('id', $id);
        $query=$this->db->get("Flights");
        $result=$query->result_array();
        print_r($result);
        echo "<br> <br>";
        $result['approved']=1;

        $id=$this->db->escape($id);
        
        $this->db->where('id',$id);
        //$this->db->set($result);
        $this->db->update('Flights',array('approved' => 1)); // UPDATES the approved in flights table for that id
        //$this->db->where('id', $id);
        $query=$this->db->get("Flights");
        $result=$query->result_array();
        echo "<br>";
        echo "<pre>";
        print_r($result);
        echo "</pre>";
        echo "<br>";
        $result=getFlights();
        return $result;
    }

    public function getFlights(){
        $this->load->database();
        $this->load->dbforge();
        $this->db->where('approved', 0);
        $query=$this->db->get("Flights");
        $result=$query->result_array();
        return $result;
    }

    public function getallflights(){
        $this->load->database();
        $this->load->dbforge();
        $query=$this->db->get("Flights");
        $result=$query->result_array();
        return $result;
    }

    public function editit($form_data){
        $this->load->database();
        $this->load->dbforge();
        $this->db->where('id', $form_data['id']);
        $query=$this->db->get("Flights");
        $result=$query->result_array();
        print_r($result);
        echo "<br> <br>";
        $result['approved']=0;
        $this->db->where('id',$form_data['id']);
        //$this->db->set($result);
        $status=$this->db->update('Flights',array('approved' => 0, 'from' => $form_data['from']
        ,'to' => $form_data['to'], 'date' => $form_data['date'], 
        'time' => $form_data['time'], 'seatsF'=>$form_data['seatsF'],'seatsB'=>$form_data['seatsB'],
        'seatsE'=>$form_data['seatsE'], 'priceF'=>$form_data['priceF'], 'priceB'=>$form_data['priceB'],
        'priceE'=>$form_data['priceE']));
        return $status;
}

    public function getFlightsforCustomer(){
        $this->load->database();
        $this->load->dbforge();
        
        date_default_timezone_set("Asia/Karachi");
        $now = new DateTime();
        //print_r($now);
        $date = $now->format('Y-m-d');
        $time = $now->format('H:i:s');
        
        $date=$this->db->escape($date);

        $result = $this->db->query("Select * from Flights where (seatsF > 0 OR seatsB >0 OR seatsE >0) 
        AND (approved = 1 AND date >= $date)");
        $result=$result->result_array();
        
        return $result;
    }


}
?>