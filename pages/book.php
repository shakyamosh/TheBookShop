<?php
require_once 'services/OOTest.php';

$ootest = new OOTest();
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
            <div class="row">

                <!--<div class="col-xs-12 col-sm-3 col-md-3 sidebar-nav" style="margin-bottom: 20px;">
                    <div class="category">Book Categories</div>
                    <div class="">
                        <ul class="types">
                            <li><a href="#" >Biography</a></li>
                            <li><a href="#" >Crime & Thriller</a></li>
                            <li><a href="#" >Fiction</a></li>
                            <li><a href="#" >Graphic Novels, Anime & Manga</a></li>
                            <li><a href="#" >Science Fiction, Fantasy & Horror</a></li>
                        </ul>
                    </div>
                </div>-->

                <!--<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="col-xs-12 col-sm-12 col-md-12" style="padding: 0px;">
                        <div class="top-head" style="text-align: center;">List of all the Books</div>                
                    </div>                        

                    <div class="col-xs-12 col-sm-12 col-md-12 block-wrap" style="padding: 0px;">
                        <div id="disp_book">
                            
                        </div>
                    </div>
                </div>-->
                
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="col-xs-12 col-sm-12 col-md-12" style="padding: 0px;">
                        <div class="top-head" style="text-align: center;">Featured Categories</div>                
                    </div>                        

                    <?php
                        $ootest = new OOTest();
                        $category = $ootest->getCategory();                

                        if($category){
                            $i=0;
                            foreach ($category as $cat){
                                $i++;
                    ?>
                    <div class="block-wrap">
                        <div class="content-types">                            
                            <!--<h2><?php //echo $cat['book_type'] ?> <a class="pull-right" href="category_view.php?book_type=<?php //echo $cat['book_type'] ?>">View All</a> </h2>-->
                            <h2><?php echo $cat['book_type'] ?> <a class="pull-right" href="#">View All</a> </h2>
                        </div>
                            <?php
                                $bookDetails = $ootest->getBooks();
                                if($bookDetails){
                                    $j=0;
                                    foreach ($bookDetails as $details){

                                        if($cat['book_type'] == $details['category'] && $j<3){
                                            $j++;
                            ?>                            
                        <div class="col-md-4 book-item" style="text-align: center;">
                            <div class="book-cover" style="height: 306px">
                                <img src="../image/<?php echo $details['book_cover']; ?>" width="200px" height="100%">
                            </div>
                            <div class="title">
                                <a href="includes/book_detail.php?book_id=<?php echo $details['book_id']?>" type="submit">
                                    <?php echo $details['title']; ?>
                                </a>
                            </div>
                            <div class="price">
                                Price: $
                                <?php echo $details['price'] ?>
                            </div>
                            <div class="">
                                <a class="btn btn-primary" href="book_detail.php?book_id=<?php echo $details['book_id']?>" type="submit">Get Book</a>
                            </div>
                        </div>            

                    <?php
                                    }
                                }
                            }
                        ?>
                    </div>               
                    <?php

                        }
                    }
                    ?>                    

                </div>

            </div>
        </div>

        <script type="text/javascript" src="../assets/js/jquery.min.js"></script>
        <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../assets/js/config.js"></script>
        <script>
//            var books = '';
//            var url = site_url + "/AIDc7171812/TheBookShopServices/index.php?method=list_book";
//            $.ajax({
//                url: url,
//                type: "GET",
//                data: null,
//                dataType: "JSON",
//                success: function (data, textStatus, jqXHR)
//                {
//                    if (data.response == null || jQuery.isEmptyObject(data.response))
//                    {
//                        $("#disp_book").html("No book found !!");
//                    } else
//                    {
//                        var allBook = data.response;
//                        $.each(allBook, function (index, value)
//                        {
//                            books += "\
//                                    <div class='col-xs-6 col-sm-4 col-md-3'>\n\
//                                        <div class=''>\n\
//                                            <div class='book-item'>\n\
//                                                <div class='book-cover' style='height: 306px'>\n\
//                                                    <img src='../image/" + value.book_cover + "' class='book_info' id='" + value.book_id + "' width='100%' height='100%'>\n\
//                                                </div>\n\
//                                            </div>\n\
//                                        </div>\n\
//                                    </div>";
//                        });
//                        $("#disp_book").html(books);
//                    }
//                }
//            });
        </script>

        <script>
//            $(document).ready(function () {
//                $(".book_info").on("click", function ()
//                {
//                    var book_id = $(this).attr("id");
//                    var postData = "book_id=" + id;
//
//                    var url = site_url + localdir + "index.php?method=detail";
//                    $.ajax({
//                        type: "POST",
//                        url: url,
//                        data: postData,
//                        dataType: "JSON",
//                        success: function (data, textStatus, jqXHR)
//                        {
//                            if (data.response == 'Successs')
//                            {
//                                localStorage.setItem('alert_msg', "<div class='alert alert-success'> <strong>Success! The user has been removed.</strong></div>");
//                                window.location.href = local_site + "pages/admin/adminUser.php";
//                            }
//                        },
//                        error: function (jqXHR, textStatus, errorThrown)
//                        {
//                            //if fails
//                        }
//                    });
//                });
//            });
        </script>
    </body>
</html>   
