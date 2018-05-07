<?php
$filepath = realpath(dirname(__FILE__));
include_once $filepath . '/../services/Session.php';
//echo $filepath;
Session::init();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>
            TheBook Shop
        </title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="css/animate.min.css" media="all">
        <link rel="stylesheet" href="css/slider.css" type="text/css">
        <link rel="stylesheet" href="css/custom.css" type="text/css">
    </head>

    <?php
        if(isset($_GET['action']) && $_GET['action'] == 'logout'){
            Session::destroy();
        }
    ?>
    
    <body>