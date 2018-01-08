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
    $scope.flag=true;
$scope.pdffunc=function(){
  console.log("pdf clicked");
}

$scope.test=function(){
  var from="<?= $data[0]['from']?>";
  var to="<?= $data[0]['to']?>";
  var data={
    from:from,
    to:to
  };
  $http.post("http://localhost/codeIgniter/index.php/booking/test", {data:data})
        .then(function (data) {
          console.log(data);
              });
}

$scope.approve=function(data){
    console.log("in approve");
    console.log(data);
}
    });

</script>

<body style="background-color:lightblue;" ng-controller="paymentctrl">

<div class="container">
  <h1> <span class="badge"> Extras </span></h2><br>
  <font size="5"  style="color:whitesmoke;">Here you can see extra features.</font>

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
    ?>
      <tr class="danger">
       <td> <?= $data['from'] ?> </td>
       <td> <?= $data['to'] ?> </td>
       <td> <?= $data['date'] ?> </td>
       <td> <?= $data['time'] ?> </td>
       <td> <?= $data['seatsF'] ?> </td>
       <td> <?= $data['seatsB'] ?> </td>
       <td> <?= $data['seatsE'] ?> </td>
       <td> <?= $data['payment'] ?> </td>
       
      </tr>      
      <?php
      ?>
    </tbody>
  </table>
</div>


<form action="http://localhost/codeIgniter/index.php/booking/trajectory" method="POST" taget="_blank">

<input type="hidden" name="from" value="<?= $data['from']?>"/ >
<input type="hidden" name="to" value="<?= $data['to']?>"/ >
<input type="hidden" name="date" value="<?= $data['date']?>"/ >
<input type="hidden" name="time" value="<?= $data['time']?>"/ >
<input type="hidden" name="seatsF" value="<?= $data['seatsF']?>"/ >
<input type="hidden" name="seatsB" value="<?= $data['seatsB']?>"/ >
<input type="hidden" name="seatsE" value="<?= $data['seatsE']?>"/ >
<input type="hidden" name="payment" value="<?= $data['payment']?>"/ >
<input type="hidden" name="email" value="<?= $data['email']?>"/ >

<button type="submit" class="btn btn-danger" ng-click="pdffunc()" >Show Trajectory of Flight</button>
</form>

<br><br>
<form action="http://localhost/codeIgniter/index.php/booking/pdfview" method="POST" taget="_blank">

<input type="hidden" name="from" value="<?= $data['from']?>"/ >
<input type="hidden" name="to" value="<?= $data['to']?>"/ >
<input type="hidden" name="date" value="<?= $data['date']?>"/ >
<input type="hidden" name="time" value="<?= $data['time']?>"/ >
<input type="hidden" name="seatsF" value="<?= $data['seatsF']?>"/ >
<input type="hidden" name="seatsB" value="<?= $data['seatsB']?>"/ >
<input type="hidden" name="seatsE" value="<?= $data['seatsE']?>"/ >
<input type="hidden" name="payment" value="<?= $data['payment']?>"/ >
<input type="hidden" name="email" value="<?= $data['email']?>"/ >



<button class="btn btn-success" type="submit">View Ticket and get email</button>


</body>
</html>