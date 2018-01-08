<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Flight extends CI_Controller {
	

	public function index()
	{
		$this->load->model('flights');
		$data['flights']=array($this->flights->getFlightsforCustomer());
		//echo "<pre>";
		//print_r ($data);
		//echo "</pre>";
		$this->load->view('flights',$data);
	}

	public function animate(){
		$coo="Lahore";
        $cod="Barcelona";

        $address = $coo; // Address
		$lat1=$lat2=$lon1=$lon2=0;
		// Get JSON results from this request
		$geo = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($address).'&sensor=false');
		$geo = json_decode($geo, true); // Convert the JSON to an array
		
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
    $this->load->view('trajectory',$data);
	}

	public function trajectory(){
		$this->load->view('trajectory');
	}
	public function country(){
		$address = 'Pakistan'; // Address
		
		// Get JSON results from this request
		$geo = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($address).'&sensor=false');
		$geo = json_decode($geo, true); // Convert the JSON to an array
		
		if ($geo['status'] == 'OK') {
		  $latitude = $geo['results'][0]['geometry']['location']['lat']; // Latitude
		  $longitude = $geo['results'][0]['geometry']['location']['lng']; // Longitude
		  //echo $latitude;
		  //echo $longitude;
		  $data['lat']=$latitude;
		  $data['lon']=$longitude;
		  //$this->load->view('map',$data);
	}
}
	public function getcountry(){
		
		//display flights from user's country by adding a country field in each
		//flight table
		$header="Accept: application/json";
		$url="https://api.ipdata.co/?callback=";
        //curl request to find a client's details
        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, $url); 
        curl_setopt($ch, 1,$header); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $data = curl_exec($ch); 
        curl_close($ch);
		$details = json_decode($data);
		print_r($details->country_name);
		 
	}
}
?>