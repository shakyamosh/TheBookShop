<nav class="navbar navbar-default" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><img src="image/book.png" class="" width="100px">TheBook Shop</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href = "index.php"><i class="fa fa-home fa-2x" aria-hidden="true"></i> Home</a></li>
                <li><a href = "pages/book.php"><i class="glyphicon glyphicon-book" style="font-size: 24px;" aria-hidden="true"></i> Books</a></li>
                <li><a href = "pages/about.php"><i class="fa fa-info-circle fa-2x" aria-hidden="true"></i> About Us</a></li>
                <li><a href = "pages/contact.php"><i class="fa fa-phone fa-2x"></i> Contact Us</a></li>
            </ul>
            
            <ul class="nav navbar-nav navbar-right">                                                  
                
                <!--<li><a href = "?action=logout"><i class="fa fa-sign-in fa-lg" aria-hidden="true"></i> Logout</a></li>-->
                <?php
                /*
                    $user_id = Session::get("user_id");
                    $user_type = Session::get("user_type");
                    $userLogin = Session::get("login");
                    if($userLogin == true && $user_type == 0){               
                 */
                ?>
                <!--<li><a href = "admin_dash.php?id=<?php //echo $user_id; ?>"><i class="fa fa-dashboard fa-2x" aria-hidden="true"></i> Dashboard</a></li>-->
                <!--<li><a href = "?action=logout"><i class="fa fa-sign-in fa-2x" aria-hidden="true"></i> Logout</a></li>-->
                <?php
                    //}else if($userLogin == true && $user_type == 1){
                ?>
                    <!--<li><a href = "user_dash.php"><i class="fa fa-dashboard fa-2x" aria-hidden="true"></i> Profile</a></li>-->
                    <!--<li><a href = "?action=logout"><i class="fa fa-sign-in fa-2x" aria-hidden="true"></i> Logout</a></li>-->                    
                <?php                        
                    //}else{
                ?>
                    <li><a href = "pages/register.php"><i class="glyphicon glyphicon-user" style="font-size: 24px;" aria-hidden="true"></i> Register</a></li>
                    <li><a href = "pages/login.php"><i class="fa fa-sign-in fa-2x" aria-hidden="true"></i> Login</a></li>
                <?php
                    //}
                ?>
                    
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
</nav>