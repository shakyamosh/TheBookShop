<?php
require_once 'services/OOTest.php';

$ootest = new OOTest();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['sendMsg'])) {
    $msg = $ootest->msgSend($_POST);
}
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
        <?php include 'includes/navbar.php' ?>

        <div class="container">
            <div class="container animated fadeIn">

                <div class="row">
                    <h1 class="header-title"> Contact </h1>
                    <hr>
                    <div class="col-sm-12" id="parent">

                        <div class="col-sm-6">
                            <iframe width="100%" height="320px;" frameborder="0" style="border:0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.818467355455!2d85.31700689212788!3d27.69200503385044!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19b19295555f%3A0xabfe5f4b310f97de!2sThe+British+College%2C+Kathmandu!5e0!3m2!1sen!2snp!4v1511347457189" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                            <!--<script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script><div style='overflow:hidden;height:320px;width:100%;'><div id='gmap_canvas' style='height:440px;width:700px;'></div><div><small><a href="https://embedgooglemaps.com/en/">embedgooglemaps.com/</a></small></div><div><small><a href="http://www.googlemapsgenerator.com/en/">Click here http://www.googlemapsgenerator.com/en/</a></small></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div><script type='text/javascript'>function init_map(){var myOptions = {zoom:10,center:new google.maps.LatLng(27.6921341,85.31951830000003),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(27.6921341,85.31951830000003)});infowindow = new google.maps.InfoWindow({content:'<strong>TheBook Shop</strong><br>The Trade Tower, Thapathali, Kathmandu 44600<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>-->
                        </div>

                        <div class="col-sm-6">
                            <form action="" class="contact-form" method="POST">

                                <?php
                                if (isset($msg)) {
                                    echo $msg;
                                }
                                ?>

                                <div class="form-group">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" autofocus="">
                                </div>

                                <div class="form-group form_left">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" id="phone" name="phone" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="10" placeholder="Mobile No.">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control textarea-contact" rows="5" id="comment" name="comment" placeholder="Type Your Message/Feedback here..."></textarea>
                                    <br>
                                    <button class="btn btn-default btn-send" id="sendMsg" name="sendMsg"> <span class="glyphicon glyphicon-send"></span> Send </button>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>

                <div class="container second-portion">
                    <div class="row">

                        <div class="col-xs-12 col-sm-6 col-lg-4">
                            <div class="box">							
                                <div class="icon">
                                    <div class="image"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                                    <div class="info">
                                        <h3 class="title">MAIL & WEBSITE</h3>
                                        <p>
                                            <i class="fa fa-envelope" aria-hidden="true"></i> &nbsp thebookshop@gmail.com
                                            <br>
                                            <br>
                                            <i class="fa fa-globe" aria-hidden="true"></i> &nbsp www.thebookshop.com.np
                                        </p>
                                    </div>
                                </div>
                                <div class="space"></div>
                            </div> 
                        </div>

                        <div class="col-xs-12 col-sm-6 col-lg-4">
                            <div class="box">							
                                <div class="icon">
                                    <div class="image"><i class="fa fa-mobile" aria-hidden="true"></i></div>
                                    <div class="info">
                                        <h3 class="title">CONTACT</h3>
                                        <p>
                                            <i class="fa fa-mobile" aria-hidden="true"></i> &nbsp (+977)-9841466115
                                            <!--<br>-->
                                            <!--<br>-->
                                            <!--<i class="fa fa-mobile" aria-hidden="true"></i> &nbsp  (+91)-7567065254--> 
                                        </p>
                                    </div>
                                </div>
                                <div class="space"></div>
                            </div> 
                        </div>

                        <div class="col-xs-12 col-sm-6 col-lg-4">
                            <div class="box">							
                                <div class="icon">
                                    <div class="image"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                                    <div class="info">
                                        <h3 class="title">ADDRESS</h3>
                                        <p>
                                            <i class="fa fa-map-marker" aria-hidden="true"></i> &nbsp The Trade Tower, Thapathali, 
                                            Kathmandu 44600.
                                        </p>
                                    </div>
                                </div>
                                <div class="space"></div>
                            </div> 
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <?php include 'includes/footer.php' ?>

    </body>
</html>