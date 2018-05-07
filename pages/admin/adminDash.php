<?php
require_once '../services/OOTest.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>TheBookShop</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="../../assets/css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="../../assets/css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="../../assets/css/animate.min.css" media="all">       
        <link rel="stylesheet" href="../../assets/css/custom.css" type="text/css">

        <script type="text/javascript" src="../../assets/js/angular.min.js"></script>
        <script type="text/javascript" src="../../assets/js/config.js"></script>
        
        <script>
            if (localStorage.getItem('loggedIn') == null) {
                try {
                    //stop most browsers loading
                    window.stop();
                    //alert("Please Login First");
                } catch (e) {
                    //IE stop loading content
                    document.execCommand('Stop');
                }
                window.location.href = local_site;
            }
        </script>
    </head>
    <body>

        <?php include 'adminNav.php' ?>

        <div class="container">
            <div class="row" style="margin-bottom: 15px;">
                <div class="col-md-3">
                    <button id="encoded_data" class="btn btn-primary">JSON encoded data</button>
                </div>
            </div>
            <div class="row">

                <div class="col-md-6">
                    <div class="col-xs-12 col-md-12" style="box-shadow: 0rem 0.2rem 0.4rem 0rem rgba(0,0,0,0.1);">
                        <h2 style="text-align: center;">Recently joined users</h2>
                        <hr>

                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>S.No.</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>                                        
                                    </tr>
                                </thead>

                                <tbody id="rcnt_signup">

                                </tbody>
                            </table>
                        </div>
                        
                    </div>            
                </div>

                <div class="col-md-6">
                    <div class="col-xs-12 col-md-12" style="box-shadow: 0rem 0.2rem 0.4rem 0rem rgba(0,0,0,0.1);">
                        <h2 style="text-align: center;">Recently received messages:</h2>
                        <hr>

                        <div ng-app="commentApp" ng-controller="commentCtrl">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>S.No.</th>
                                            <th>Name</th>
                                            <th>Email</th>                                            
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr ng-repeat="y in names| limitTo: 10 as y ">
                                            <td>{{$index + 1}}</td>
                                            <td>{{ y.name}}</td>
                                            <td>{{ y.email}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>                        
                    </div>                    
                </div>

            </div>

            <div class="row" style="margin-bottom: 20px;"></div>
        </div>  

        <script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
        <script type="text/javascript" src="../../assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../includes/custom.js"></script>

        <script>
            var users = '';
            var count = 1;
            var url = site_url + localdir + "index.php?method=late_user";
            $.ajax({
                url: url,
                type: "POST",
                data: null,
                dataType: "JSON",
                success: function (data, textStatus, jqXHR)
                {
                    if (data.response == null || jQuery.isEmptyObject(data.response))
                    {
                        $("#rcnt_signup").html("<td colspan='5'><h2>No recent users found !!</h2></td>");
                    } else
                    {
                        var nowUser = data.response;
                        $.each(nowUser, function (index, value)
                        {
                            users += "<tr><td>" + count + "</td><td>" + value.fname + "</td><td>" + value.lname + "</td><td>" + value.email + "</td></tr>";
                            count++;
                        });
                        $("#rcnt_signup").html(users);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert("Error: " + jqXHR.status + " " + textStatus);
                }
            });

            angular.module('commentApp', [])
                .controller('commentCtrl', function ($scope, $http) {
                    $http.get("../../../TheBookShopServices/angular.php").then(function (response) {
                        $scope.names = response.data.records;
                    });
                });                
        </script>
        
        <script>
            $("#encoded_data").on("click", function(){
                //alert("hi");
                //window.location.href = site_url + local_dir + "index.php?method=list_book";
                window.location.href = "http://localhost/AIDc7171812/TheBookShopServices/index.php?method=list_book";
            });
        </script>
    </body>
</html>