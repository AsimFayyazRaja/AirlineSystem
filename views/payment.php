<html ng-app="payment">

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

    var app=angular.module('payment', ['ngCookies'])
       .config(['$locationProvider', function($locationProvider) {
           $locationProvider.html5Mode(false);
           $locationProvider.hashPrefix('');
        }]);
    app.controller('paymentctrl',function($scope,$http,$cookies,$window){
    $scope.id=[];
    $scope.index=0;

$scope.pdffunc=function(){
  console.log("pdf clicked");
  $http.post("http://localhost/codeIgniter/index.php/booking/printpdf");
}

    });

</script>

<body style="background-color:lightblue;" ng-controller="paymentctrl">

<div class="container">
  <h1> <span class="badge"> Invoice of Payment </span></h2><br>
  <font size="5"  style="color:whitesmoke;">Here is the invoice generated of your flight.</font>
  <br><br>
  <table class="table table-hover">
    <thead>
      <tr style="color:red">
        <th>From</th>
        <th>To</th>
        <th>Date</th>
        <th>Time</th>
        <th> First Class Seats </th>
        <th> Business Seats </th>
        <th> Economy Seats </th>
        <th> Payment </th>
      </tr>
    </thead>
    <tbody>
    <?php
    foreach($data as $key):
    ?>
      <tr class="danger">
       <td> <?= $key['from'] ?> </td>
       <td> <?= $key['to'] ?> </td>
       <td> <?= $key['date'] ?> </td>
       <td> <?= $key['time'] ?> </td>
       <td> <?= $key['seatsF'] ?> </td>
       <td> <?= $key['seatsB'] ?> </td>
       <td> <?= $key['seatsE'] ?> </td>
       <td> <?= $key['payment'] ?> </td>
       
      </tr>      
      <?php
      endforeach;
      ?>
    </tbody>
  </table>
</div>

<button class="btn btn-danger" ng-click="pdffunc()" >Approve</button>
<br>
<form action="booking/printpdf" method="POST">

<input type="hidden" name="from1" value="<?php $data[0]['from'] ?>"/>

<button type="submit">View Ticket</button>
</form>

</body>
</html>