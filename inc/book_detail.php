<?php
include '../pages/services/OOTest.php';

if (isset($_GET['book_id'])) {
    $bookID = (int) $_GET['book_id'];
}

$ootest = new OOTest();

$bookDetails = $ootest->getBookData($bookID);
if ($bookDetails) {
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <title>TheBookShop</title>

            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <link rel="stylesheet" href="../assets/css/bootstrap.min.css" type="text/css">
            <link rel="stylesheet" href="../assets/css/font-awesome.min.css" type="text/css">
            <link rel="stylesheet" href="../assets/css/animate.min.css" media="all">
            <link rel="stylesheet" href="../assets/css/slider.css" type="text/css">
            <link rel="stylesheet" href="../assets/css/custom.css" type="text/css">
        </head>
        <body>
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
                        <a class="navbar-brand" href="index.php"><img src="../image/book.png" class="" width="100px">TheBook Shop</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li><a href = "../index.php"><i class="fa fa-home fa-2x" aria-hidden="true"></i> Home</a></li>
                            <li><a href = "../pages/book.php"><i class="glyphicon glyphicon-book" style="font-size: 24px;" aria-hidden="true"></i> Books</a></li>
                            <li><a href = "../pages/about.php"><i class="fa fa-info-circle fa-2x" aria-hidden="true"></i> About Us</a></li>
                            <li><a href = "../pages/contact.php"><i class="fa fa-phone fa-2x"></i> Contact Us</a></li>
                        </ul>

                        <ul class="nav navbar-nav navbar-right">    
                            <li><a href = "../pages/register.php"><i class="glyphicon glyphicon-user" style="font-size: 24px;" aria-hidden="true"></i> Register</a></li>
                            <li><a href = "../pages/login.php"><i class="fa fa-sign-in fa-2x" aria-hidden="true"></i> Login</a></li>                            
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
            </nav>
            
            <div class="container">
                <div class="row">
                    <div class="details">
                        <div class="col-xs-12 col-sm-4 col-md-4" style="text-align: center;">
                            <div style="height: 330px">
                                <img src="../image/<?php echo $bookDetails->book_cover; ?>" width="auto" height="100%">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-8 col-md-8">
                            <div class="title-details">
                                <h2><?php echo $bookDetails->title; ?></h2>
                            </div>
                            <div class="">
                                <?php echo $bookDetails->format . " | " . $bookDetails->language ?>
                            </div>
                            <div class="">
                                By (author) <?php echo $bookDetails->author ?>
                            </div>
                            <br>
                            <div class="desc-details">
                                <?php echo $bookDetails->description ?>
                            </div>
                            <div class="desc-price pull-right">
                                Price: $<?php echo $bookDetails->price ?>
                                <a class="btn btn-primary" href="">Add to wishlist</a>
                                <a class="btn btn-primary" href="">Get this book</a>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-8 col-md-offset-4 col-md-8">

                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>

        <script type="text/javascript" src="../assets/js/jquery.min.js"></script>        
        <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../assets/js/slider.js"></script>

    </body>
</html>
