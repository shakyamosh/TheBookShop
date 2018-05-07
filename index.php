<?php
require_once 'pages/services/OOTest.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>TheBookShop</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="assets/css/animate.min.css" media="all">
        <link rel="stylesheet" href="assets/css/slider.css" type="text/css">
        <link rel="stylesheet" href="assets/css/custom.css" type="text/css">
    </head>
    <body>
        <?php
        include('inc/nav.php');
        include('inc/imgSlider.php');
        ?>
        <div class="container">
            <div class="col-md-12" style="text-align: center;">
                <h2>Google Custom search</h2>
            </div>
            
            <div class="col-md-12">
                <div class="searchForm">
                    <script>
                        (function () {
                            var cx = '006133760155001142251:bobuswferei';
                            var gcse = document.createElement('script');
                            gcse.type = 'text/javascript';
                            gcse.async = true;
                            gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
                            var s = document.getElementsByTagName('script')[0];
                            s.parentNode.insertBefore(gcse, s);
                        })();
                    </script>
                    <gcse:search></gcse:search>
                </div>
            </div>
        </div>

        <?php
        include('inc/collection.php');
        ///include('inc/newCollection.php');
        ?>        

        <!--Banner text-->
        <div class="container-fuild" style="background: #2f2b35; color: wheat;">

            <div class="row" style="box-sizing: border-box; padding-top: 15px; margin-left: 0px; margin-right: 0px;">

                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="" style="text-align: center;">                
                        <i class="glyphicon glyphicon-book fa-4x" aria-hidden="true" style="background: #7f6b56; color: #fff; border-radius: 100px; width: 90px; height: 90px; text-align: center; padding: 15px;"></i>
                    </div>
                    <div class="">
                        <h2 style="font-size: 18px; text-align: center; font-style:normal" class="vc_custom_heading">Tons of Books</h2>
                    </div>
                    <div class="wpb_text_column wpb_content_element" style="margin-bottom: 35px;">
                        <div class="wpb_wrapper">
                            <p style="text-align: center;">
                                Get lost into the world of books.<br> Enjoy to choose from the collection and get them at cheap price.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="" style="text-align: center;">
                        <i class="fa fa-pencil fa-5x" aria-hidden="true" style="background: #7f6b56; color: #fff; border-radius: 100px; width: 90px; height: 90px; text-align: center; padding: 5px;"></i>
                    </div>
                    <div class="">
                        <h2 style="font-size: 18px; text-align: center; font-style:normal" class="vc_custom_heading">Hundreds of Authors</h2>
                    </div>
                    <div class="wpb_text_column wpb_content_element" style="margin-bottom: 35px;">
                        <div class="wpb_wrapper">
                            <p style="text-align: center;">
                                From top authors to the rising one's, we have them all the books in our collection.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="" style="text-align: center;">
                        <i class="fa fa-bookmark-o fa-5x" aria-hidden="true" style="background: #7f6b56; color: #fff; border-radius: 100px; width: 90px; height: 90px; text-align: center; padding: 5px;"></i>
                    </div>
                    <div class="">
                        <h2 style="font-size: 18px; text-align: center; font-style:normal" class="vc_custom_heading">Easily Book-marked</h2>
                    </div>
                    <div class="wpb_text_column wpb_content_element" style="margin-bottom: 35px;">
                        <div class="wpb_wrapper">
                            <p style="text-align: center;">
                                Found anything you like?<br> Add it to the wishlist and order it whenever you like.
                            </p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!--End Banner Text-->

        <?php include 'inc/recently_added.php'; ?>

        <div class="container">
            <div class="row">    
                <div class="col-sm-12 col-md-12">
                    <div class="ads-banner" style="text-align: center;">
                        <img src="image/ads/ad_1.jpg" alt="Hosting Ad" width="100%">
                    </div>
                </div>
            </div>
        </div>

        <footer>
            <div class="footer fixed-bottom" style="position: relative; bottom: 0;">
                <div class="" style="background: #2f2b35; margin-top: 5rem; height:auto; min-height: 150px; color: wheat;">
                    <div class="container">
                        <div class="row" style="margin-top: 25px;">
                            <div class="col-xs-12 col-sm-4 col-md-4" style="text-align: center; padding: 1rem;">
                                <h3 style="margin: 0px;"><i class="fa fa-globe fa-lg"></i> Explore</h3>
                                <br>
                                <div class="col-xs-4">
                                    <a href="index.php">Home</a>
                                </div>

                                <div class="col-xs-4">
                                    <a href="pages/book.php">Book</a>
                                </div>                           

                                <div class="col-xs-4">
                                    <a href="pages/register.php">Register</a>                                                       
                                    <a href="pages/login.php">Login</a>
                                </div>                                                       
                            </div>

                            <div class="col-xs-12 col-sm-4 col-md-4">

                            </div>

                            <div class="col-xs-12 col-sm-4 col-md-4" style="text-align: center; padding: 1rem;">
                                <h3 style="margin: 0px;"><i class="fa fa-info-circle fa-lg"></i> Informations</h3>
                                <br>
                                <div class="col-xs-4">
                                    <a href="pages/about.php">About Us</a>
                                </div>

                                <div class="col-xs-4">
                                    <a href="pages/contact.php">Contact Us</a>
                                </div>

                                <div class="col-xs-4">
                                    <a href="pages/login.php">My Account</a>
                                </div>                            
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-md-12" style="text-align: center; padding: 5rem;">
                                Copyright TheBook Shop 2017
                            </div>
                        </div>
                    </div>
                </div>            
            </div>
        </footer>

        <script type="text/javascript" src="assets/js/jquery.min.js"></script>        
        <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="assets/js/slider.js"></script>

        <script>
                        $(document).ready(function () {

                            $('#itemslider').carousel({interval: 3000});

                            $('.carousel-showmanymoveone .item').each(function () {
                                var itemToClone = $(this);

                                for (var i = 1; i < 6; i++) {
                                    itemToClone = itemToClone.next();

                                    if (!itemToClone.length) {
                                        itemToClone = $(this).siblings(':first');
                                    }

                                    itemToClone.children(':first-child').clone()
                                            .addClass("cloneditem-" + (i))
                                            .appendTo($(this));
                                }
                            });
                        });
        </script>
    </body>
</html>