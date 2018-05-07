<nav class="navbar navbar-default" role="navigation">    
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><img src="image/book.png" class="" width="100px">TheBook Shop</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
            <ul class="nav navbar-nav">
                <li><a href = "index.php"><i class="fa fa-home fa-2x" aria-hidden="true"></i> View Website</a></li>
                <li><a href = "admin_dash.php"><i class="fa fa-dashboard fa-2x" aria-hidden="true"></i> Dashboard</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">                
                <li><a href = "?action=logout"><i class="fa fa-sign-in fa-2x" aria-hidden="true"></i> Logout</a></li>                    
            </ul>
        </div><!-- /.navbar-collapse -->
    </div>
</nav>

   
<div class="container">
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-3">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-comments fa-4x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">
                            <?php
                                $ootest = new OOTest();
                                $msgCount = $ootest->getFeedback();
                                if ($msgCount) {
                                    $i = 0;
                                    foreach ($msgCount as $details) {
                                        $i++;
                                    }
                                    echo $i;                                     
                                } 
                            ?>
                            </div>
                            <div>Comments!</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-3">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-book fa-4x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">                                
                                <?php 
                                $ootest = new OOTest();
                                $allBooks = $ootest->getBooks();
                                if ($allBooks) {
                                    $i = 0;
                                    foreach ($allBooks as $details) {
                                        $i++;
                                    }
                                    echo $i;
                                }
                                ?>
                            </div>
                            <div>Books</div>
                        </div>
                    </div>
                </div>
                <a href="adminBook.php" id="viewBook">
                    <div class="panel-footer">
                        <span class="pull-left">View Books</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-3">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">                            
                            <i class="fa fa-list fa-4x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">                                
                                <?php 
                                $ootest = new OOTest();
                                $usrDetails = $ootest->getUserDetails();
                                if ($usrDetails) {
                                    $i = 0;
                                    foreach ($usrDetails as $details) {
                                        $i++;
                                    }
                                    echo $i;
                                }
                                ?>
                            </div>
                            <div>Users</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">View Users</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-3">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-user-circle fa-4x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">Welcome</div>
                            <div>
                                <?php
                                $fname = Session::get("fname");
                                if (isset($fname)) {
                                    echo $fname;
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="edit_user.php?id=1">
                    <div class="panel-footer">
                        <span class="pull-left">Edit Profile</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>