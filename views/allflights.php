<!DOCTYPE html>
<html ng-app="manager">
<head>
 
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.5/angular.min.js">
  </script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular-route.js">
  </script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular-cookies.js">
  </script>
  <script src="http://code.jquery.com/jquery-2.2.4.min.js">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/danialfarid-angular-file-upload/12.2.13/ng-file-upload.min.js">
  </script>
  <script src="http://code.angularjs.org/1.2.13/angular-animate.js">
  </script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.5/angular-route.min.js">
  </script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  <style type="text/css">
    .ng-invalid.ng-dirty {
      border-color: red;
    }
 
    .ng-valid.ng-dirty {
      border-color: green;
    }
 
    body {
      padding-top: 70px;
    }
 
    .texty {
      font-size: 30px;
    }
 
    .badge {
      padding: 1px 9px 2px;
      font-size: 35px;
      font-weight: bold;
      white-space: nowrap;
      color: antiquewhite;
      background-color: darkred;
      -webkit-border-radius: 9px;
      -moz-border-radius: 9px;
      border-radius: 9px;
    }
 
    .badge:hover {
      color: indianred;
      text-decoration: bold;
      cursor: pointer;
    }
 
    .badge-error {
      background-color: #b94a48;
    }

    .editform{
        margin-top: 20px;
    margin-bottom: 100px;
    margin-right: 250px;
    margin-left: 180px;
    }
  </style>
  <script>
    var app = angular
              .module('manager', ['ngCookies'])
              .config(['$locationProvider', function($locationProvider) {
                $locationProvider.html5Mode(false);
                $locationProvider.hashPrefix('');
              }]);
 
    app.controller('flightCtrl', [
      '$scope','$http',function($scope,$http) {
        $scope.id = 0;
        
        $scope.approveFlight = function() {
          console.log($scope.id);
          $http.post("./approveit", {id:$scope.id})
        .then(function (data) {
          console.log(data.data);
              });      
      }
      }]);
      
  </script>
  <title></title>
</head>
<body style="background-color:black;">
  <div class="texty" style="color:white;">
    Here admin can edit any flight.<br>
    <br>
  </div><a class="btn btn-info btn-lg" href="./flights.php" style="float:right">See flights schedule</a>
  <div class="container">
    <h1><span class="badge">Edit Flights</span></h1><br>
    <font size="5" style="color:whitesmoke;">These are all the flights.</font><br>
    <br>
    <table class="table table-hover">
      <thead>
        <tr style="color:red">
        <th> ID </th>
          <th>From</th>
          <th>To</th>
          <th>Date</th>
          <th>Time</th>
          <th>Seats</th>
          <th>Price</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($data as $flight): ?>
        <tr class="danger" ng-controller="flightCtrl" ng-init="id=<?= $flight['id']; ?>">
        <td><?= $flight ['id'] ?></td>
          <td><?= $flight ['from'] ?></td>
          <td><?= $flight['to'] ?></td>
          <td><?= $flight['date'] ?></td>
          <td><?= $flight['time'] ?></td>
          <td>
            <?= $flight['seatsF'] ?>
            &nbsp;
            <?=  $flight['seatsB'] ?>
            &nbsp;
            <?=  $flight['seatsE'] ?>
          </td>
          <td>
            <?=  $flight['priceF'] ?>
            &nbsp;
            <?=  $flight['priceB'] ?>
            &nbsp;
            <?=  $flight['priceE'];?>
          </td>
          <input type="hidden" value={{id}} name="id" />
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <h3><span class="badge">Flight To Edit</span></h3><br>
<br><br>
<div class="editform">
<form action="./editthisflight" method="POST">

<input type="number" size="20" width="50" name="id" placeholder="ID of flight">
<br>
<input type="text" name="from" placeholder="New Origin">
<br>
<input type="text" name="to" placeholder="New Destination">
<br>
<input type="date" name="date" placeholder="New Date">
<br>
<input type="time" name="time" placeholder="New Time">
<br>
<input type="number" name="seatsF" placeholder="First Class Seats" min="0">
&nbsp; &nbsp; &nbsp;
<input type="number" name="priceF" placeholder="Price" min="1000">

<br>
<input type="number" name="seatsB" placeholder="Business Class Seats" min="0">
&nbsp; &nbsp; &nbsp;
<input type="number" name="priceB" placeholder="Price" min="1000">

<br>
<input type="number" name="seatsE" placeholder="Economy Class Seats" min="0">
&nbsp; &nbsp; &nbsp;
<input type="number" name="priceE" placeholder="Price" min="1000">

<br><br>
<button class="btn btn-danger" type="submit">Save Edits</button>
</form>
</div>
</body>
</html>