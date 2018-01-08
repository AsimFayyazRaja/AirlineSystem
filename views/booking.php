<html ng-app="booking">

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.5/angular.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular-route.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular-cookies.js"></script>
<script src="http://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/danialfarid-angular-file-upload/12.2.13/ng-file-upload.min.js"></script>
<script src="http://code.angularjs.org/1.2.13/angular-animate.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.5/angular-route.min.js"></script>
<script src="http://code.responsivevoice.org/responsivevoice.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>



  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">

  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
 integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" 
 crossorigin="anonymous">
<style type="text/css">


.ng-invalid.ng-dirty{
    color: red;
        border-color: red;
    }
    .ng-valid.ng-dirty{
        color: green;
        border-color: green;
    }


.body { padding-top: 70px; }

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

body{
  padding-left: 40px;
  padding-right: 40px;
}


</style>


<script>

function showHint(str) {
    if (str.length == 0) {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "http://localhost/codeIgniter/index.php/booking/fromajax?q=" + str, true);
        xmlhttp.send();
        //get_fb();
    }
}

window.onload = function() {
  get_fb();
};

function f1(){
    responsiveVoice.pause();
}

function f2(){
    responsiveVoice.resume();
}


function get_fb(){
    var from=document.getElementById("from").value;
    var to=document.getElementById("to").value;
    var feedback = $.ajax({
        type: "GET",
        url: "http://localhost/codeIgniter/index.php/booking/getdestinations?from=" + from,
        async: false
    }).success(function(){
        if(to=="")
        setTimeout(function(){get_fb();}, 5000);
    }).responseText;

    if(feedback!=""){
        //console.log(feedback);
        var x="The flights from "+ from +" are going to " + feedback;
        responsiveVoice.speak(x);
}
}


function showHint2(str) {
  var from=document.getElementById("from").value;
  //alert(from);
    if (str.length == 0) {
        document.getElementById("txtHint2").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint2").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "http://localhost/codeIgniter/index.php/booking/toajax?to=" + str + "&from=" + from, true);
        xmlhttp.send();
    }
}

function showHint3(str) {
  var from=document.getElementById("from").value;
  var to=document.getElementById("to").value;
    if (str.length == 0) {
        document.getElementById("txtHint3").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint3").innerHTML = this.responseText;
                if(this.responseText){
                    responsiveVoice.pause();
                    if(str!=0)
                    responsiveVoice.speak(this.responseText);
                }
            }
        };
        xmlhttp.open("GET", "http://localhost/codeIgniter/index.php/booking/eseatsajax?to=" + to + "&from=" + from + "&eseats=" + str, true);
        xmlhttp.send();
    }
}

function showHint4(str) {
  var from=document.getElementById("from").value;
  var to=document.getElementById("to").value;
    if (str.length == 0) {
        document.getElementById("txtHint4").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint4").innerHTML = this.responseText;
                if(this.responseText){
                    responsiveVoice.pause();
                    if(str!=0)
                    responsiveVoice.speak(this.responseText);
                }
            }
        };
        xmlhttp.open("GET", "http://localhost/codeIgniter/index.php/booking/bseatsajax?to=" + to + "&from=" + from + "&bseats=" + str, true);
        xmlhttp.send();
    }
}


function showHint5(str) {
  var from=document.getElementById("from").value;
  var to=document.getElementById("to").value;
    if (str.length == 0) {
        document.getElementById("txtHint5").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint5").innerHTML = this.responseText;
                if(this.responseText){
                    responsiveVoice.pause();
                    if(str!=0)
                    responsiveVoice.speak(this.responseText);
                }
            }
        };
        xmlhttp.open("GET", "http://localhost/codeIgniter/index.php/booking/fseatsajax?to=" + to + "&from=" + from + "&fseats=" + str, true);
        xmlhttp.send();
    }
}


$(document).ready(function(){
    $('.timepicker').pickatime({
    default: 'now', // Set default time: 'now', '1:30AM', '16:30'
    fromnow: 0,       // set default time to * milliseconds from now (using with default = 'now')
    twelvehour: false, // Use AM/PM or 24-hour format
    donetext: 'OK', // text for done-button
    cleartext: 'Clear', // text for clear-button
    canceltext: 'Cancel', // Text for cancel-button
    autoclose: false, // automatic close timepicker
    ampmclickable: true, // make AM PM clickable
    aftershow: function(){} //Function for after opening timepicker
  });
  });
  
  var app=angular.module('booking', ['ngCookies'])
       .config(['$locationProvider', function($locationProvider) {
           $locationProvider.html5Mode(false);
           $locationProvider.hashPrefix('');
        }]);
    app.controller('bookingctrl',function($scope,$http,$cookies,$window){
    $scope.bookingform={
      from: null,
      to: null,
      email: null,
      name: null,
      fclass: null,
      bclass: null,
      eclass: null,
      time: null,
      date: null
    };    //check form validation here
      $scope.flightbooked=function(){
        if($scope.bookingform.from==null ||  $scope.bookingform.to==null || $scope.bookingform.email==null ||
        $scope.bookingform.name==null || $scope.bookingform.date==null || ($scope.bookingform.fclass==null && $scope.bookingform.bclass==null &&
        $scope.bookingform.eclass==null) || ($scope.bookingform.from==$scope.bookingform.to))
        {
          alert("Invalid form data");
          //$window.location="./booking.html";
          //console.log("redirect it to booking page");
        }
        else
        //console.log($scope.bookingform);
        alert("You have booked a flight and your payment will be calculated shortly");
        $scope.bookingform={
      from: null,
      to: null,
      email: null,
      name: null,
      fclass: null,
      bclass: null,
      eclass: null,
      time: null,
      date: null
    };
        //alert("booked ");
        //$window.location="./index.html";
      }

    });

</script>

<body style="background-color:lightblue;" ng-controller="bookingctrl">



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
<br><br>
  
<button onclick="f1()" class="btn btn-info" style="float:right;">Pause Flights Audio</button>
<br><br>
&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; <button onclick="f2()" class="btn btn-info" style="float:right;">Resume Flights Audio</button>



<div class="bla">
<input type="hidden" name="text" id="text" value="">
  <div class="row">
    <form method="POST" action="http://localhost/codeIgniter/index.php/booking/bookit" class="col s20">
      <div class="row">
        <div class="input-field col s12">
          <label  for="first_name"><h4>From</h4></label>
          <br>
          <input name="from" required  id="from" ng-model="from" type="text" class="validate" onkeyup="showHint(this.value)">          
          <p>Available:  <span id="txtHint"></span></p>
        </div>
        <div class="input-field col s12">
          <label  for="first_name"><h4>To</h4></label>
          <br>
          <input name="to" required   id="to" ng-model="to" type="text" class="validate" onkeyup="showHint2(this.value)">          
          <p>Available:  <span id="txtHint2"></span></p>
          <div id="message">
          
          </div>
        </div>
        <div class="input-field col s12">
          <label  for="first_name"><h4>Name</h4></label>
          <br>
          <input name="name" required  id="first_name" ng-model="name" type="text" class="validate">          
        </div>
        <div class="input-field col s12">
          <label for="email"><h4>Email</h4></label>
          <br>
          <input name="email" required  id="email" type="email" ng-model="email" class="validate">
      </div>
      </div>
      <br>
      <div class="input-field col s12">
      <label  for="first_name"><h4>Economy Class Seats</h4></label>
          <br>
          <input required  id="seatsE" ng-model="seatsE" name="seatsE" type="number" class="validate" min="0" onkeyup="showHint3(this.value)">          
        </div>
        <p><span id="txtHint3"></span></p>
        <div class="input-field col s12">
          <label  for="first_name"><h4>Business Class Seats</h4></label>
          <br>
          <input  required  id="seatsB" ng-model="seatsB" name="seatsB" type="number" class="validate" min="0" onkeyup="showHint4(this.value)">          
        </div>
        <p><span id="txtHint4"></span></p>
        <div class="input-field col s12">
        <label  for="first_name"><h4>First Class Seats</h4></label>
          <br>
          <input  required   id="seatsF" ng-model="seatsF" name="seatsF" type="number" class="validate" min="0" onkeyup="showHint5(this.value)">          
        </div>
        <p><span id="txtHint5"></span></p>
        <br>
        <label  for="first_name"><h4>Date</h4></label>
        <br>
        <input type="date" required id="date" name="date" ng-model="date"  class="datepicker">
          <label  for="first_name"><h4>Time</h4></label>          
        <input type="text" id="time" name="time" required  ng-model="time" class="timepicker">
           <br>
        <button class="btn waves-effect waves-light" type="submit"> Book </button>
    </form>
  </div>
        </div>
<br><br>
        <p><span id="txtHint6"></span></p>
        

</body>
</html>