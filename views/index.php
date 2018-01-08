<html ng-app="index">

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.5/angular.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular-route.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular-cookies.js"></script>
<script src="http://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/danialfarid-angular-file-upload/12.2.13/ng-file-upload.min.js"></script>
<script src="http://code.angularjs.org/1.2.13/angular-animate.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.5/angular-route.min.js"></script>


  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">

  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
 integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" 
 crossorigin="anonymous">
<style type="text/css">

.ng-invalid.ng-dirty{
        border-color: red;
    }
    .ng-valid.ng-dirty{
        border-color: green;
    }


.badge {
  padding: 1px 9px 2px;
  font-size: 15px;
  font-weight: bold;
  white-space: nowrap;
  color:antiquewhite;
  background-color: darkred; 
  -webkit-border-radius: 9px;
  -moz-border-radius: 9px;
  border-radius: 9px;
}
.badge:hover {
  color:indianred;
  text-decoration: bold;
  cursor: pointer;
}
.badge-error {
  background-color: #b94a48;
}

body {
  background-image: url("../../images/bg.jpg");
    padding-left: 10px;
padding-right: 10px;
background-size: cover;
}

</style>


<script>

$(document).ready(function(){
    $("#hide").click(function(){
        $("#p1").hide(3000);
    });
    $("#hide").click(function(){
        $("#p2").hide(3000);
    });
    $("#show").click(function(){
        $("#p1").show(3000);
    });
    $("#show").click(function(){
        $("#p2").show(3000);
    });

});



    var app=angular.module('index', ['ngCookies'])
       .config(['$locationProvider', function($locationProvider) {
           $locationProvider.html5Mode(false);
           $locationProvider.hashPrefix('');
        }]);
    app.controller('indexctrl',function($scope,$http,$cookies,$window){
    
$scope.lol=function(){
console.log("angular works");
};

    $scope.form={id: null,
    password: null};
    $scope.login=function(){
        console.log($scope.form);
        $scope.form=[];
    };


    });

</script>

<body style="background-color:indianred;" ng-controller="indexctrl">

<nav>
    <div class="nav-wrapper blue">
      <a href="#!" class="brand-logo center">Airline Ticketing System <i style="color:red" class="fa fa-fighter-jet fa-3x" aria-hidden="true"></i> </a> 
      <ul class="left hide-on-med-and-down">

        <li><a href="http://localhost/codeIgniter/index.php/index/about_us">About Us</a></li>
        <li><a href="http://localhost/codeIgniter/index.php/booking">Booking</a></li>
        <li><a href="http://localhost/codeIgniter/index.php/flight">Flights</a></li>
        <li class="active"><a href="http://localhost/codeIgniter/index.php/index/home">Home</a></li>
      </ul>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="http://localhost/codeIgniter/index.php/index/map">View Google Map</a></li>
        <li><a href="http://localhost/codeIgniter/index.php/manager/managerlogin">Login as Manager</a></li>
        <li><a href="http://localhost/codeIgniter/index.php/admin/adminlogin">Login as Admin</a></li>
      </ul>
    </div>
  </nav>
<p style="color:white">




<br><br>

An airline is a company that provides air transport services for traveling passengers and freight. Airlines utilize aircraft to supply these services and may form partnerships or alliances with other airlines for codeshare agreements. Generally, airline companies are recognized with an air operating certificate or license issued by a governmental aviation body.
<button class="btn btn-danger btn-md" id="hide">Hide Details</button>
<button class="btn btn-danger btn-md" id="show">Show Details</button>
<p id="p1" style="color:white">
The Emirates story started in 1985 when we launched operations with just two aircraft. Today, we fly the world’s biggest fleets of Airbus A380s and Boeing 777s, offering our customers the comforts of the latest and most efficient wide-body aircraft in the skies. 

We inspire travelers around the world with our growing network of worldwide destinations, industry leading inflight entertainment, regionally inspired cuisine, and world-class service. Read on to find out more.
</p>
<br><br>
<h3 style="color: white">Here is an ad about our airline. </h3>
<br><br>

<video width="100%" height="80%" autoplay controls loop>
  <source src="../../vid1.mp4" type="video/mp4">
  
</video>


<h2 style="color:white">Jennifer Aniston meets a new friend and explores Emirates Economy Class with her second advertising campaign for Emirates.</h2>

<br><br>


<p id="p2" style="color:white">

Our fleet is one of the youngest in the world, meaning that along with exceptional service and inflight entertainment, you can rely on the utmost in comfort and the latest in cabin design no matter where you’re seated. Most of our fleet is now made up of ultra-modern Emirates A380s and spacious Boeing 777s, making your Emirates experience world class in every class.
On October 25, 1985, Emirates flew its first routes out of Dubai with just two aircraft—a leased Boeing 737 and an Airbus 300 B4.

Then, as now, our goal was quality, not quantity. In the years since taking those first small steps onto the regional travel scene, we've evolved into a globally influential travel and tourism leader known the world over for our commitment to quality.

With a fleet of more than 230 aircraft, we currently fly to more than 150 destinations in more than 80 countries around the world. More than 1,500 Emirates flights depart Dubai each week on their way to destinations on six continents, and our network is expanding constantly. Read on to find out more.


</p>

<br>

<h4 style="color:white">Come here and book your flights with ease. <i class="fa fa-circle-o-notch fa-spin" style="font-size:24px"></i>
</h4>


<a href="./about_us.html"  class="btn btn-info btn-lg" >About Us</a>  &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; <a href="./booking.html"  class="btn btn-warning btn-lg" >Booking</a> &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; <a href="./flights.html"  class="btn btn-danger btn-lg" >Flights</a>


</body>

</html>