<html ng-app="mgr-login">

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
        color: red;
        border-color: red;
    }
    .ng-valid.ng-dirty{
        color: green;
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


.loginform{
        margin-left: 200px;
 margin-right: 200px;
 margin-top: 200px;
 min-height: 2000px;
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

    var app=angular.module('mgr-login', ['ngCookies'])
       .config(['$locationProvider', function($locationProvider) {
           $locationProvider.html5Mode(false);
           $locationProvider.hashPrefix('');
        }]);
    app.controller('loginctrl',function($scope,$http,$cookies,$window){
    
$scope.lol=function(){
console.log("angular works");
};

    $scope.form={id: null,
    password: null};
    $scope.login=function(){
        console.log($scope.form);
        $scope.form=[];
    };

$scope.login=function(){
    window.location.href="./manager.html";
};

    });

</script>



<body style="background-color:lightblue;" ng-controller="loginctrl">


<form name="loginform" method="POST" action="./index">
<div class="form-group">
<div class="loginform">
            <br><br>
            <div class ="col-md-4" align="left">
           <h2> <span class="label label-info">Login Here</span> </h2>
           <h4> 
            <br><br>
            <span class="label label-primary">Manager Email</span>
           <span class="glyphicon glyphicon-hand-down glyclr"> </span>   <input name="email" type="email" size= "20" placeholder="No spaces" ng-model="form.id" required>
            <br><br>
            <span class="label label-primary">Password</span>
            <span class="glyphicon glyphicon-hand-down glyclr"> </span>  <input name="pass" type="password" size="20" ng-model="form.password" required>
            <br><br>
            <button type="submit" class="btn btn-info btn-lg" aria-label="Left Align">
            <span class="glyphicon glyphicon-user" aria-hidden="true"> Login</span>
            </button>
            <br><br>


            <br><br>
            </div>
            </div>
            </div>
</form>


</body>

</html>