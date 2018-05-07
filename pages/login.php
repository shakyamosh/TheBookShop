<!DOCTYPE html>
<html>
    <head>
        <title>TheBookShop</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="../assets/css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="../assets/css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="../assets/css/animate.min.css" media="all">        
        <link rel="stylesheet" href="../assets/css/custom.css" type="text/css">
    </head>
    <body>

        <?php include 'includes/navbar.php' ?>

        <div class="container">
            <div class="row">                    
                <div class="col-sm-6 col-md-6 col-sm-offset-3 col-md-offset-3" style="margin-top: 15px;">

                    <div id="alert_msg"></div>

                    <div class="panel panel-default">

                        <div class="panel-heading">
                            <h3 class="panel-title" style="font-size: 3rem; padding: 1rem 0; text-align: center; font-weight: bold;"> <span class="fa fa-user-circle"></span> Login</h3>                            
                        </div>

                        <div class="panel-body">                           
                            <form method="POST" action="" id="login_form">
                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="email" class="form-control" style="border-radius: 3px;" id="email" placeholder="Enter Email">
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control" style="border-radius: 3px;" id="password" placeholder="Enter Password">
                                    </div>
                                </div>

                                <div class="col-sm-2 col-md-2">
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-success" id="btn_login" value="Login">
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <script type="text/javascript" src="../assets/js/jquery.min.js"></script>        
        <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script> 
        <script type="text/javascript" src="../assets/js/config.js"></script>
        <script type="text/javascript" src="../assets/js/custom.js"></script>

        <script>
            $("#login_form").on("submit", function (e)
            {
                e.preventDefault();
                $postData = $(login_form).serialize();

                $.ajax({
                    url: site_url + "AIDc7171812/TheBookShopServices/index.php?method=user_login",
                    type: "POST",
                    data: $postData,
                    success: function (data, textStatus, jqXHR)
                    {
                        if (data.response === 'success')
                        {
                            localStorage.setItem('loggedIn', 'true');
                            localStorage.setItem('user_id', data.userdata['user_id']);
                            localStorage.setItem('fname', data.userdata['fname']);
                            localStorage.setItem('email', data.userdata['email']);
                            if (data.userdata['user_type'] == 0)
                            {
                                window.location.href = local_site + "pages/admin/adminDash.php";
                            } else if (data.userdata['user_type'] == 1)
                            {
                                window.location.href = local_site + "pages/user/user.php";
                            }
                        } else
                        {
                            localStorage.setItem('alert_msg', "<div class='alert alert-warning'> <strong>" + data.response + "</strong> </div>");
                            window.location.href = local_site + "pages/login.php";
                        }
                    }
                });
            });
        </script>        

    </body>
</html>