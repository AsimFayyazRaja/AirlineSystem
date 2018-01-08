<html ng-app="admin">

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
        color:red;
    }
    .ng-valid.ng-dirty{
        border-color: green;
        color:green;
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


</style>


<script>

    var app=angular.module('admin', ['ngCookies'])
       .config(['$locationProvider', function($locationProvider) {
           $locationProvider.html5Mode(false);
           $locationProvider.hashPrefix('');
        }]);
    app.controller('adminctrl',function($scope,$http,$cookies,$window){
      $cookies.put('loggedin', true);
$scope.adminform={
  from: null,
  to: null,
  date: null,
  time: null,
  fclass: null,
  bclass: null,
  eclass: null,
  fprice: null,
  bprice: null,
  eprice: null
};    
        $scope.flightadded=function(){
            if($scope.adminform.from==null || $scope.adminform.to==null || $scope.adminform.date==null ||
        $scope.adminform.time==null || ( ($scope.adminform.fclass==null || $scope.adminform.bclass==null ||
        $scope.adminform.eclass==null) || ($scope.adminform.fprice==null || $scope.adminform.bprice==null ||
        $scope.adminform.eprice==null)) || ($scope.adminform.from==$scope.adminform.to))
        {
          //$window.location="./admin.html";
          alert("Invalid form details");
          console.log("redirect it to admin page");
          console.log($scope.adminform);
        }
        else{
        alert("You have added a new flight and now manager will approve it");
        console.log("added");
        $window.location="./admin.html";
        }
        };
    });
</script>
<body style="background-color:lightblue;" ng-controller="adminctrl">


<form method="post" action="http://localhost/codeIgniter/index.php/admin/adminlogout">
<button style="float:left"  class="btn btn-info btn-lg" >Logout</button>
</form>


<form method="post" action="http://localhost/codeIgniter/index.php/admin/edit_flight">
<button style="float:right"  class="btn btn-info btn-lg" >Edit Flights</button>
</form>
<br><br><br>
  <div style="color:white">
<br><br><br><br>
<div class="container">
  <form action="http://localhost/codeIgniter/index.php/admin/addflight" method="POST">
    <div class="form-group row">
    <h2>  <span class="badge">From</span> </h2>
      <div class="col-sm-10">
        <input type="text"  class="form-control" id="inputEmail3" name="from" placeholder="From" ng-model="adminform.from" required>
      </div>
    </div><br>
    <div class="form-group row">
     <h2>  <span class="badge">To</span> </h2>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputPassword3" name="to" placeholder="To" ng-model="adminform.to" required>
      </div>
    </div>
    <div class="form-group row">
     <h2>  <span class="badge">Date</span> </h2>
      <div class="col-sm-10">
        <input type="date" name="date" class="form-control" id="inputPassword3" placeholder="Date" ng-model="adminform.date" required>
      </div>
    </div>
    <div class="form-group row">
     <h2>  <span class="badge">Time</span> </h2>
      <div class="col-sm-10">
        <input type="time" name="time" class="form-control" id="inputPassword3" placeholder="Time" ng-model="adminform.time" required>
      </div>
    </div>
    <br><br>
    <fieldset class="form-group row">
      <legend class="col-form-legend col-sm-2">Number of seats:</legend>
      <div class="col-sm-10">
        <div class="form-check">
          <label class="form-check-label">            
            First Class Seats &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span class="badge">Seats: </span> <input required ng-model="adminform.fclass" style="color:gray" type="number" name="seatsF" min="0" max="10"> &nbsp; &nbsp; &nbsp; &nbsp; <span class="badge">Price: </span> <input required ng-model="adminform.fprice" style="color:gray" type="number" name="priceF" min="1000" max="5000">
          </label>
        </div>
        <div class="form-check">
          <label class="form-check-label">
            Business Class Seats &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span class="badge">Seats: </span> <input required ng-model="adminform.bclass" style="color:gray" type="number" name="seatsB" min="0" max="10"> &nbsp; &nbsp; &nbsp; &nbsp; <span class="badge">Price: </span> <input required ng-model="adminform.bprice" style="color:gray" type="number" name="priceB" min="1000" max="5000">
          </label>
        </div>
        <div class="form-check">
          <label class="form-check-label">
            Economy Class Seats &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span class="badge">Seats: </span> <input ng-model="adminform.eclass" required style="color:gray" type="number" name="seatsE" min="0" max="10"> &nbsp; &nbsp; &nbsp; &nbsp; <span class="badge">Price: </span> <input ng-model="adminform.eprice" required style="color:gray" type="number" name="priceE" min="1000" max="5000">
          </label>
        </div>
      </div>
    </fieldset>
    
    <div class="form-group row">
      <div class="offset-sm-2 col-sm-10">
        <button type="submit" class="btn btn-primary">Add a new flight</button>
      </div>
    </div>
  </form>
</div>
</div>
</body>
</html>