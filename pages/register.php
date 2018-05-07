<?php
session_start();
$_SESSION = array();

include("captcha/simple-php-captcha.php");
$_SESSION['captcha'] = simple_php_captcha();
?>
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
        <link rel="stylesheet" href="../assets/css/css/santiago.datepicker.css" type="text/css">
        <style>
            form .form-group .form-control{
                border-radius: 3px;
            }
        </style>

        <!--<script type="text/javascript" src="../assets/js/angular.min.js"></script>-->
        <script type="text/javascript" src="../assets/js/jquery.min.js"></script>
        <script type="text/javascript" src="../assets/js/jquery-ui.js"></script>
        <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
    </head>
    <body>

        <?php include 'includes/navbar.php' ?>      

        <div class="container">
            <div class="col-sm-6 col-md-6 col-sm-offset-3 col-md-offset-3" style="margin-top: 15px;">

                <div id="alert_msg"></div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 class="panel-title" style="text-align: center; font-size: 3rem; font-weight: bold;"><span class="fa fa-user-circle-o"></span> Registration Form</h1>
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="" id="regForm">
                            <div class="row">                           

                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="fname" class="form-control" id="fname" placeholder="First Name" />
                                        <small style="text-transform: none;color: #ff0000;">&emsp;<span class="error_form" id="fname_error_msg"></span></small>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="lname" class="form-control" id="lname" placeholder="Last Name" />
                                        <small style="text-transform: none;color: #ff0000;">&emsp;<span class="error_form" id="lname_error_msg"></span></small>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="email" class="form-control" id="email" placeholder="Enter Email" />
                                        <small style="text-transform: none;color: #ff0000;">&emsp;<span class="error_form" id="email_error_msg"></span></small>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password" />
                                        <small style="text-transform: none;color: #ff0000;">&emsp;<span class="error_form" id="password_error_msg"></span></small>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <input type="password" name="password2" class="form-control" id="password2" placeholder="Confirm Password" />
                                        <small style="text-transform: none;color: #ff0000;">&emsp;<span class="error_form" id="password2_error_msg"></span></small>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="dob" class="form-control" id="dob" placeholder="Select Date of Birth" />
                                        <small style="text-transform: none;color: #ff0000;">&emsp;<span class="error_form" id="dob_error_msg"></span></small>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <select class="form-control" name="gender" id="gender">
                                            <option  value="">--Select Gender--</option>
                                            <option class="form-control" value="M">Male</option>
                                            <option class="form-control" value="F">Female</option>                                
                                        </select>
                                        <small style="text-transform: none;color: #ff0000;">&emsp;<span class="error_form" id="gender_error_msg"></span></small>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <div>
                                            <?php
                                            //print_r($_SESSION['captcha']);
                                            ?>

                                            <?php
                                            echo '<img src="' . $_SESSION['captcha']['image_src'] . '" alt="CAPTCHA code">';
                                            ?>

                                            <?php
                                            //echo '<input type="text" id="capt" name="capt" />';
                                            ?>
                                        </div>  
                                    </div>                                                                       
                                </div>
                                
                                <!--
                                <script>
                                    if ($('#capt').val() != '' || strtolower($('#capt')).val() == '<?php //echo strtolower($_SESSION['captcha']['code']) ?>') {
                                        $.ajax({
                                            url: "captcha/simple-php-captcha.php",
                                            type: "POST",
                                            data: null,
                                            success: function (data, textStatus, jqXHR)
                                            {
                                                localStorage.setItem('alert_msg', "<div class='alert alert-success'> <strong>Completed!</strong> </div>");
                                                //window.location.href = local_site + "pages/register.php";                                                
                                            },
                                            error: function
                                        })
                                    }
                                </script>
                                -->

                                <div class="col-sm-12 col-md-12">
                                    <input type="submit" name="register" class="btn btn-primary" id="reg" value="Register" />
                                </div>

                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

        <script type="text/javascript" src="../assets/js/config.js"></script>        
        <script type="text/javascript" src="includes/custom.js"></script>
        <script>
                                    $(function () {
                                        $("#dob").datepicker({
                                            changeMonth: true,
                                            changeYear: true,
                                            dateFormat: 'yy-mm-dd',
                                            yearRange: '1950:2018'
                                        }).datepicker('widget').wrap('<div class="ll-skin-santiago"/>');
                                        ;
                                    });
        </script>

        <script>

            $(document).ready(function () {
                $("#fname_error_msg").hide();
                $("#lname_error_msg").hide();
                $("#email_error_msg").hide();
                $("#password_error_msg").hide();
                $("#password2_error_msg").hide();
                $("#dob_error_msg").hide();
                $("#gender_error_msg").hide();

                var error_fname = false;
                var error_lname = false;
                var error_email = false;
                var error_password = false;
                var error_password2 = false;
                var error_dob = false;
                var error_gender = false;

                $("#fname").focusout(function () {
                    check_fname();
                });

                $("#lname").focusout(function () {
                    check_lname();
                });

                $("#email").focusout(function () {
                    check_email();
                });

                $("#password").focusout(function () {
                    check_password();
                });

                $("#password2").focusout(function () {
                    check_password2();
                });

                $("#dob").focusout(function () {
                    check_dob();
                });

                $("#gender").focusout(function () {
                    check_gender();
                });

                function check_fname()
                {
                    var pattern = new RegExp(/^[a-zA-Z]+$/);

                    if (pattern.test($("#fname").val()))
                    {
                        $("#fname_error_msg").hide();
                    } else
                    {
                        $("#fname_error_msg").html("Invalid first name");
                        $("#fname_error_msg").show();
                        error_fname = true;
                    }
                }

                function check_lname()
                {
                    var pattern = new RegExp(/^[a-zA-Z]+$/);

                    if (pattern.test($("#lname").val()))
                    {
                        $("#lname_error_msg").hide();
                    } else
                    {
                        $("#lname_error_msg").html("Invalid last name");
                        $("#lname_error_msg").show();
                        error_lname = true;
                    }
                }

                function check_email()
                {
                    var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);

                    if (pattern.test($("#email").val()))
                    {
                        $("#email_error_msg").hide();
                    } else
                    {
                        $("#email_error_msg").html("Invalid email address");
                        $("#email_error_msg").show();
                        error_email = true;
                    }
                }

                function check_password()
                {
                    var password_length = $("#password").val().length;

                    if (password_length < 8)
                    {
                        $("#password_error_msg").html("At least 8 characters");
                        $("#password_error_msg").show();
                        error_password = true;
                    } else
                    {
                        $("#password_error_msg").hide();
                    }
                }

                function check_password2()
                {
                    var password = $("#password").val();
                    var password2 = $("#password2").val();

                    if (password != password2)
                    {
                        $("#password2_error_msg").html("Passwords don't match");
                        $("#password2_error_msg").show();
                        error_password2 = true;
                    } else
                    {
                        $("#password2_error_msg").hide();
                    }

                }

                function check_dob()
                {
                    var dob = $("#dob").val();
                    if (dob == "")
                    {
                        $("#dob_error_msg").html("Field is empty");
                        $("#dob_error_msg").show();
                        error_dob = true;
                    } else {
                        $("#dob_error_msg").hide();
                    }
                }

                function check_gender()
                {
                    var gender = $("#gender").val();
                    if (gender == "")
                    {
                        $("#gender_error_msg").html("Field is empty");
                        $("#gender_error_msg").show();
                        error_gender = true;
                    } else {
                        $("#gender_error_msg").hide();
                    }
                }

                $("#regForm").submit(function () {
                    //error_fname = false;
                    //error_lname = false;
                    //error_email = false;
                    //error_password = false;
                    //error_password2 = false;
                    //error_dob = false;
                    //error_gender = false;

                    check_fname();
                    check_lname();
                    check_email();
                    check_password();
                    check_password2();
                    check_dob();
                    check_gender();
                    if (error_fname == false && error_lname == false && error_email == false && error_password == false && error_password2 == false && error_dob == false && error_gender == false) {
                        return true;
                    } else {
                        return false;
                    }
                });

            });
        </script>

        <script>
            $("#regForm").on("submit", function (e) {
                e.preventDefault();

                var regData = $(this).serialize();

                if ($('#fname').val() != '' && $('#lname').val() != '' && $('#email').val() != '' && $('#password').val() != '' && $('#dob').val() != '' && $('#gender').val() != '')
                {
                    //alert(regData);

                    $.ajax({
                        url: site_url + localdir + "index.php?method=user_register",
                        type: "POST",
                        data: regData,
                        success: function (data, textStatus, jqXHR)
                        {
                            //alert("Im in");
                            if (data.response == 'success')
                            {
                                //alert("all good");
                                localStorage.setItem('alert_msg', "<div class='alert alert-success'> <strong>Success!</strong> </div>");
                                window.location.href = local_site + "pages/register.php";
                            } else if (data.response == 'error')
                            {
                                localStorage.setItem('alert_msg', "<div class='alert alert-danger'> <strong>Failed!</strong> Email already exists</div>");
                                window.location.href = local_site + "pages/register.php";
                            } else
                            {
                                localStorage.setItem('alert_msg', "<div class='alert alert-danger'> <strong>Failed!</strong> All the details must be filled</div>");
                                window.location.href = local_site + "pages/register.php";
                            }
                        },
                    });
                }
            })
        </script>

    </body>
</html>