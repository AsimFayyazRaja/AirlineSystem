<html ng-app="editflights">

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.5/angular.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular-route.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular-cookies.js"></script>
<script src="http://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/danialfarid-angular-file-upload/12.2.13/ng-file-upload.min.js"></script>
<script src="http://code.angularjs.org/1.2.13/angular-animate.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.5/angular-route.min.js"></script>

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

body { padding-top: 70px; }

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

    var app=angular.module('editflights', ['ngCookies'])
       .config(['$locationProvider', function($locationProvider) {
           $locationProvider.html5Mode(false);
           $locationProvider.hashPrefix('');
        }]);
    app.controller('flightctrl',function($scope,$http,$cookies,$window){
    
$scope.edit=function(){
    alert('Flight edited');
};


    });

</script>

<body style="background-color:black;" ng-controller="flightctrl">

<div class="texty" style="color:white;">
    Here we will have some flights that are available to be booked, leaving shortly <br> <br>
    

    </div>


<div class="container">
  <h1> <span class="badge"> Available Flights </span></h2><br>
  <font size="5"  style="color:whitesmoke;">These flights are being departed so hurry up and book them</font>
  <br><br>
  <table class="table table-hover">
    <thead>
      <tr style="color:blueviolet;">
        <th>From</th>
        <th>To</th>
        <th>Date and Time</th>
        <th>New Date</th>
        <th>New Time</th>
      </tr>
    </thead>
    <tbody>
      <tr style="color:lightseagreen;">
        <td>Lahore</td>
        <td>Barcelona</td>
        <td>12:00  21-8-2017</td>
        <td><input type="date"></input>
        <td><input type="time"></input>
        <td><button style="color:lightseagreen;" ng-click="edit()">Edit Date and Time</button></td>
      </tr>      
      <tr class="success">
        <td>Copenhagen</td>
        <td>Sydney</td>
        <td>15:00  22-8-2017</td>
        <td><input type="date"></input>
        <td><input type="time"></input>
        <td><button class="btn btn-success" ng-click="edit()">Edit Date and Time</button></td>
      </tr> 
      <tr class="danger">
        <td>Rome</td>
        <td>Karachi</td>
        <td>04:00  21-8-2017</td>
        <td><input type="date"></input>
        <td><input type="time"></input>
        <td><button class="btn btn-danger" ng-click="edit()">Edit Date and Time</button></td>
      </tr>
      <tr class="info">
        <td>New Delhi</td>
        <td>Munich</td>
        <td>00:00  23-8-2017</td>
        <td><input type="date"></input>
        <td><input type="time"></input>
        <td><button class="btn btn-info" ng-click="edit()">Edit Date and Time</button></td>
      </tr>
      <tr class="warning">
        <td>Abu Dhabi</td>
        <td>London</td>
        <td>22:00  21-8-2017</td>
        <td><input type="date"></input>
        <td><input type="time"></input>
        <td><button class="btn btn-warning" ng-click="edit()">Edit Date and Time</button></td>
      </tr>
      <tr class="active">
        <td>Manchester</td>
        <td>Brooklyn</td>
        <td>19:00  21-8-2017</td>
        <td><input type="date"></input>
        <td><input type="time"></input>
        <td><button class="btn btn-active" onclick="edit()">Edit Date and Time</button></td>
      </tr>
    </tbody>
  </table>
</div>


</body>
</html>