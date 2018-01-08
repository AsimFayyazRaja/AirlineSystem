<?php

class Booking extends CI_Controller{

    public function __construct (){
        parent::__construct();
        $this->load->model("flights");

    }  
    public function index(){
        $this->load->view('booking');
        
    }

    public function getdestinations(){
        $q=$this->input->get('from');
        //print_r($q);
        $this->load->model("flights");
        $query['data']=$this->flights->getto($q);
        print_r($query['data']);
    }

    public function fromajax(){
        $q=$this->input->get('q');
        $this->load->model("flights");
        $query['data']=$this->flights->getorigins($q);
        if($query['data']==""){
            echo null;
        }else{
            print_r($query['data']);
        }
    }

    public function eseatsajax(){
        $from=$this->input->get('from');
        $to=$this->input->get('to');
        $eseats=$this->input->get('eseats');
        $this->load->model("flights");
        $query['data']=$this->flights->geteseats($from,$to,$eseats);
        if($query['data']){
            echo " Seats Available";
        }else{
            echo "Not Enough Seats";
        }
    }

    public function bseatsajax(){
        $from=$this->input->get('from');
        $to=$this->input->get('to');
        $bseats=$this->input->get('bseats');
        $this->load->model("flights");
        $query['data']=$this->flights->getbseats($from,$to,$bseats);
        if($query['data']){
            echo " Seats Available";
        }else{
            echo "Not Enough Seats";
        }
    }
    public function fseatsajax(){
        $from=$this->input->get('from');
        $to=$this->input->get('to');
        $fseats=$this->input->get('fseats');
        $this->load->model("flights");
        $query['data']=$this->flights->getfseats($from,$to,$fseats);
        if($query['data']){
            echo " Seats Available";
        }else{
            echo "Not Enough Seats";
        }
    }

    public function toajax(){
        $from=$this->input->get('from');
        $to=$this->input->get('to');
        $this->load->model("flights");
        $query['data']=$this->flights->getdestinations($from,$to);
        print_r($query['data']);
    }

    public function getprice(){

        $origin=$this->input->get('origin');
        $destination=$this->input->get('destination');

        $this->load->model("flights");
        $query['data']=$this->flights->giveprice($origin,$destination);
        /*echo "<pre>";
        
*/
        $i=0;
        $price=array();
    foreach ($query as $key){
        foreach($key as $prices){
        $price[$i]['priceF']=$prices['priceF'];
        $price[$i]['priceB']=$prices['priceB'];
        $price[$i]['priceE']=$prices['priceE'];
        $price[$i]['date']=$prices['date'];
        $i++;
        //print_r($prices);
    }
}
    //print_r($price);
        
         $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array('response' => $price)));
    }

    //gets seats available if given flight number and date
    public function getseats(){

        $flightnum=$this->input->get('flightnum');
        $date=$this->input->get('date');

        $this->load->model("flights");
        $query['data']=$this->flights->giveseats($flightnum,$date);
        
        $i=0;
        $seats=array();
    foreach ($query as $key){
        foreach($key as $prices){
        $seats[$i]['seatsF']=$prices['seatsF'];
        $seats[$i]['seatsB']=$prices['seatsB'];
        $seats[$i]['seatsE']=$prices['seatsE'];
        $seats[$i]['date']=$prices['date'];
        $i++;
        //print_r($prices);
    }
}

$this->output
->set_content_type('application/json')
->set_output(json_encode(array('response' => $seats)));

    }

    public function bookit(){
        $form_data=$this->input->post();
        //print_r($form_data);
        $this->load->model("flights");
        $query['data']=null;
        $query['data'] = array($this->flights->checkflight($form_data));
        if($query['data'][0]==null){
            echo "No flights found";
            die;
        }else
        $this->load->view('flightapprove',$query);
    }

    public function getpayment(){
        $from=$this->input->get('from');
        $to=$this->input->get('to');
        $date=$this->input->get('date');
        $time=$this->input->get('time');
        $email=$this->input->get('email');
        $seatsF=$this->input->get('seatsF');
        $seatsE=$this->input->get('seatsE');
        $seatsB=$this->input->get('seatsB');
        $form_data=array();
        $form_data['from']=$from;
        $form_data['to']=$to;
        $form_data['email']=$email;
        $form_data['date']=$date;
        $form_data['time']=$time;
        $form_data['seatsF']=$seatsF;
        $form_data['seatsB']=$seatsB;
        $form_data['seatsE']=$seatsE;
        print_r($form_data);

    }

    public function showtrajectory($form_data){     //shows trajectory of flight
        //print_r($form_data);
        $coo=$form_data['from'];
        $cod=$form_data['to'];

        $address = $coo; // Address
		$lat1=$lat2=$lon1=$lon2=0;
		// Get JSON results from this request
        try{
            $geo=null;
        $geo = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($address).'&sensor=false');
        if($geo==null){
            throw new exception;
        }
        else
		$geo = json_decode($geo, true); // Convert the JSON to an array
        }catch(Exception $e){
            echo " City names are not in standard notation.";
            die;
        }
		if ($geo['status'] == 'OK') {
		  $latitude = $geo['results'][0]['geometry']['location']['lat']; // Latitude
		  $longitude = $geo['results'][0]['geometry']['location']['lng']; // Longitude
		  //echo $latitude;
		  //echo $longitude;
		  $lat1=$latitude;
		  $lon1=$longitude;
		  //$this->load->view('map',$data);
    }
    $address = $cod; // Address
    echo $address;
    // Get JSON results from this request
    $geo = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($address).'&sensor=false');
    $geo = json_decode($geo, true); // Convert the JSON to an array
    
    if ($geo['status'] == 'OK') {
      $latitude = $geo['results'][0]['geometry']['location']['lat']; // Latitude
      $longitude = $geo['results'][0]['geometry']['location']['lng']; // Longitude
      //echo $latitude;
      //echo $longitude;
      $lat2=$latitude;
      $lon2=$longitude;
      //$this->load->view('map',$data);
    }
    
    $data['lat1']=$lat1;
    $data['lon1']=$lon1;
    $data['lat2']=$lat2;
    $data['lon2']=$lon2;
    echo $lat1."  ".$lon1."  ".$lat2."  ".$lon2."  ";
    $this->load->view('trajectory',$data);
    }

    public function test(){
        echo "in test";
        $this->load->view("blah");
    }

    public function printpdf(){
        $form_data=$this->input->post();
        //print_r($form_data);
        //extract($form_data);
        //echo"<br>";
        //print_r($from);
        if($form_data['accepted']){
            $query['data']=$form_data;
            $this->load->view("afteraccept",$query);
            //echo "in pdf";
            //$this->bookflight($form_data);
            //$this->showtrajectory($form_data);
        }
        else{
            echo "Flight rejected";
            $this->load->model("flights");
            $this->flights->rejectthisflight($form_data);
            $this->load->view('index');
            
        }
    }

    public function trajectory(){
        $form_data=$this->input->post();
        $this->showtrajectory($form_data);
    }

    public function pdfview(){
        $form_data=$this->input->post();
        $this->bookflight($form_data);
    }

    public function bookflight($form_data){
        //$form_data = $this->input->post();
        //print_r($form_data);
        //echo "<br>";
        // $this->load->model("flights");
        $query['data'][0]=$form_data;
        //$query['data'] = array($this->flights->checkflight($form_data));
        $from=$query['data'][0]['from'];
        $to=$query['data'][0]['to'];
        $date=$query['data'][0]['date'];
        $time=$query['data'][0]['time'];
        $seatsF=$query['data'][0]['seatsF'];
        $seatsB=$query['data'][0]['seatsB'];
        $seatsE=$query['data'][0]['seatsE'];
        $payment=$query['data'][0]['payment'];
        if($query['data'][0]['email']==null){
            echo "Not enough seats available";
            die;
        }
        if($query==null){
             echo "No flight found for your request <br>";
         }
        else{
            $config=Array(
            'protocol'=> 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'l154097@lhr.nu.edu.pk',
            'smtp_pass' => "12february:'("
            );
            $this->load->library('email',$config);
            $this->email->set_newline("\r\n");
            //print_r($query['data'][0]['email']);
            //print_r($query['data'][0]->email);
            $this->email->from('l154097@lhr.nu.edu.pk',"Emirates Airline");
            $this->email->to($query['data'][0]['email']);
            $this->email->subject('Flight Iternary');
            $this->email->message("You have booked a flight from $from to $to
            which will leave at Date: $date and Time: $time , you have booked seats of First Class
             Business Class and Economy Class as $seatsF , $seatsB , $seatsE and the total payment is
             $payment. Thank You.");
            if($this->email->send()){
                require('fpdf/fpdf.php');
                $pdf=new FPDF('P', 'mm', 'A4');
                $pdf->AddPage();
                $pdf->SetFont('Arial','B',20);
                $pdf->Cell(189  ,10,'Emirates Flight System',1,1);

                $pdf->SetFont('Arial','B',16);
                $pdf->Cell(189  ,10,'Ticket Invoice',1,1);
                
                $pdf->SetFont('Arial','',12);
                $pdf->Cell(189  ,10,'Thanks for choosing Emirates',1,1);
                
                $pdf->Cell(130  ,5,'Origin',1,0);
                $pdf->Cell(59  ,5,$from,1,1);
                

                $pdf->Cell(130  ,5,'Destination',1,0);
                $pdf->Cell(59  ,5,$to,1,1);
                
                $pdf->Cell(130  ,5,'[Date] [Time]',1,0);
                $pdf->Cell(25  ,5,$date,1,0);
                $pdf->Cell(34  ,5,$time,1,1);
                
                $pdf->Cell(130  ,5,'First Class Seats',1,0);
                $pdf->Cell(59  ,5,$seatsF,1,1);
                
                $pdf->Cell(130  ,5,'Business Class Seats',1,0);
                $pdf->Cell(59  ,5,$seatsB,1,1);
                
                $pdf->Cell(130  ,5,'Economy Class Seats',1,0);
                $pdf->Cell(59  ,5,$seatsE,1,1);
                
                $pdf->Cell(130  ,5,'Total Payment:',1,0);
                $pdf->Cell(59  ,5,$payment,1,1);

                $pdf->Cell(189  ,10,'',1,1);
                $pdf->Cell(189  ,10,'An email of flight iternary have been mailed to you',1,1);
                
                $pdf->Cell(189  ,10,'Have a safe flight',1,1);
                

                $pdf->Output();
                //echo "Email sent";
            }
            else{
                //echo "Invalid email entered";
                //show_error($this->email->print_debugger());
            }
                //$this->load->view("payment",$query);
            }

            //generate a pdf ticket

            
        }
    }



?>