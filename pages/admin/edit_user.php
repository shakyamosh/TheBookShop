<?php
require_once '../services/OOTest.php';
//include 'inc/header.php';
Session::checkSession();
?>
<?php
    if (isset($_GET['id'])) {
        $userID = (int)$_GET['id'];
    }
    
    $ootest = new OOTest();
    
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])){
        $userUpdt = $ootest->userUpdate($userID, $_POST);
    }              
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

<?php
    if (isset($_GET['id'])) {
        $userID = (int)$_GET['id'];
    }
    
    $ootest = new OOTest();
    
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])){
        $userUpdt = $ootest->userUpdate($userID, $_POST);
    }
    
//    include 'inc/admin_nav.php';        
?>

    <div class="container">
        <div class="row">
            <?php 
                if(isset($userUpdt)){
                    echo $userUpdt;
                }
            ?>
        </div>
        
        <?php 
            $userDetails = $ootest->getUserData($userID);
            if ($userDetails) {
        ?>
        <form id="reg_form" method="POST">
            <div class="row">
                
                <div class="col-sm-6 col-md-6 col-sm-offset-3 col-md-offset-3">   
                    <div class="col-md-12">
                        <h1 style="margin: 0px;">Edit your details</h1><hr>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="fname">First Name</label>
                            <input type="text" name="fname" class="form-control" id="fname" value="<?php echo $userDetails->fname; ?>">
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="lname">Last Name</label>
                            <input type="text" name="lname" class="form-control" id="lname" value="<?php echo $userDetails->lname; ?>">
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control" id="email" value="<?php echo $userDetails->email; ?>">
                        </div>
                    </div>                                          

                    <?php 
                        $ssnID = Session::get("user_id");
                        if($userID == $ssnID){
                    ?>
                    <div class="col-sm-12 col-md-12">
                        <div class="form-group">
                            <a href="new_pass.php?id=<?php echo $userID; ?>" type="submit" name="changePass" class="btn btn-primary">Change Password</a>
                        </div>
                    </div>  
                    <div class="col-sm-12 col-md-12">
                        <button type="submit" name="update" class="btn btn-success">Update</button>
                        <a href="admin_dash.php" name="cancel" class="btn btn-danger">Cancel</a>
                    </div>
                    
                        <?php }else{ ?>
                    <div class="col-sm-12 col-md-12">
                        <button type="submit" name="update" class="btn btn-success">Update</button>
                        <a href="admin_dash.php" name="cancel" class="btn btn-danger">Cancel</a>
                    </div>
                        <?php } ?>
                </div>
            </div>
        </form>
    </div>
        <?php
            }
        ?>

    </body>
</html>