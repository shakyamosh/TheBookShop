<!DOCTYPE html>
<html>
    <head>
        <title>TheBookShop</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="../assets/css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="../assets/css/jquery-ui.css" type="text/css">
        <link rel="stylesheet" href="../assets/css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="../assets/css/animate.min.css" media="all">       
        <link rel="stylesheet" href="../assets/css/custom.css" type="text/css">
        <style>
            form .form-group .form-control{
                border-radius: 3px;
            }
        </style>

        <script type="text/javascript" src="../assets/js/angular.min.js"></script>
        <script type="text/javascript" src="../assets/js/jquery.min.js"></script>
        <script type="text/javascript" src="../assets/js/jquery-ui.js"></script>
        <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
    </head>
    <body>

        <?php include 'includes/navbar.php' ?>      

        <div class="container">

            <div ng-app="regForm" ng-controller="formCtrl">
                <form>
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-sm-offset-3 col-md-offset-3">

                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="fname" ng-model="fname" class="form-control" id="fname" placeholder="First Name" />
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="lname" ng-model="lname" class="form-control" id="lname" placeholder="Last Name" />
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <input type="text" name="email" ng-model="email" class="form-control" id="email" placeholder="Enter Email" />
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <input type="password" name="password" ng-model="pass" class="form-control" id="password" placeholder="Enter Password" />
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <input type="text" name="dob" ng-model="dob" class="form-control" id="dob" placeholder="Select Date of Birth" />
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-12">
                                <input type="submit" name="register" class="btn btn-primary" ng-click="insertData()" value="Register" />
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>

        <script type="text/javascript" src="../assets/js/config.js"></script>
        <script type="text/javascript" src="includes/custom.js"></script>
        <script>
            $(function () {
                $("#dob").datepicker({
                    changeMonth: true,
                    changeYear: true,
                    dateFormat: 'yy-mm-dd'
                });                               
            });
            
            var app = angular.module("regForm", []);
            app.controller("formCtrl", function ($scope, $http)
            {
                $scope.insertData = function ()
                {
                    $http.post(
                        "insert.php",
                        {'fname': $scope.fname, 'lname': $scope.lname, 'email': $scope.email, 'pass': $scope.pass, 'dob': $scope.dob}
                    ).success(function (data) {
                        alert(data);
                        $scope.fname = null;
                        $scope.lname = null;
                        $scope.email = null;
                        $scope.pass = null;
                        $scope.dob = null;
                    });
                }
            });            
        </script> 

    </body>
</html>