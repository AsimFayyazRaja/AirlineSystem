<html ng-app="flights">

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

.texty{
    font-size: 30px;
}

.badge {
  padding: 1px 9px 2px;
  font-size: 35px;
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

</style>


<script>

    var app=angular.module('flights', ['ngCookies'])
       .config(['$locationProvider', function($locationProvider) {
           $locationProvider.html5Mode(false);
           $locationProvider.hashPrefix('');
        }]);
    app.controller('flightctrl',function($scope,$http,$cookies,$window){
    $scope.flights=[];
    $scope.fsize=0;

$scope.book=function(){
     $http.get("http://localhost/codeIgniter/index.php/booking");   //getting response as an html page, should render it to do correctly.
}

$scope.otherflights=function(){
     $http.get("http://localhost/codeIgniter/index.php/admin/otherflights")   //getting response as an html page, should render it to do correctly.
        .then(function (data) {
          console.log(data);
              });
}


/*
$scope.book=function(){
 $http.get("./Booking/index")   //getting response as an html page, should render it to do correctly.
    .then(function (data) {
      console.log('success');
      $("#test"),html(data);
 });
}*/
    });

</script>

<body style="background-color:lightblue;" ng-controller="flightctrl">


<nav>
    <div class="nav-wrapper blue">
      <a href="#!" class="brand-logo center">Airline Ticketing System</a>
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

<br><br><br>

<div class="texty" style="color:white;">
    Here we will have some flights that are available to be booked, leaving shortly <br> <br>
    </div>

<form action="booking/index" method="POST">
<?php
//echo"<pre>";
//print_r($flights);
//echo"</pre>";
foreach ($flights as $key){
  foreach($key as $value){

?>
 
  <div class="col-sm-4">
    <div class="col s20 m6">
      <div class="card">
        <div class="card-image">
          <img src="http://media1.santabanta.com/full1/Air%20Transport/Planes/planes-193a.jpg">
          <span class="card-title">Flight Number 101</span>
          <button type="submit" class="btn-floating halfway-fab waves-effect waves-light red" class="material-icons">Book</button>
        <div class="card-content">
          <table class="table table-hover">
    <thead>
      <tr>
        <th>From</th>
        <th>To</th>
        <th>Date</th>
        <th>Time</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><?= $value['from']; ?></td>
        <td><?= $value['to']; ?></td>
        <td><?= $value['date']; ?></td>
        <td><?= $value['time']; ?></td>
      </tr>
    </tbody>
  </table>
        </div>
      </div>
    </div>
    </div>
</div>
    <?php } };?>
</form>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<div id="test">
<strong>Not a single flight that you want? </strong>
<br>
<p>Click below to find flight according to your interest</p>
<form action="admin/otherflights" method="POST">
<input placeholder="origin" name="origin" />

<input placeholder="destination" name="destination" />

<button type="submit">Click Me</button>
</form>

  </div>
<br><br><br>
  <div id="test1">
<strong>Want to track a flight</strong>
<br>
<form action="admin/trackflight" method="POST">

<input placeholder="Airline" name="airline" />

<input placeholder="Flight" name="flight" />

<button type="submit">Click Me</button>
</form>

  </div>


</body>
</html>