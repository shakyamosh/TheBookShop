<!DOCTYPE html>
<html>
    <head>
        <title>TheBookShop</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="../../assets/css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="../../assets/css/bootstrap-table.min.css">
        <link rel="stylesheet" href="../../assets/css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="../../assets/css/custom.css" type="text/css">

        <script type="text/javascript" src="../../assets/js/config.js"></script>
        <style>
            .bookArt{
                /*height: 100px;*/
                width: 150px;
            }
        </style>

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

        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="col-sm-12 col-md-12" style="text-align: center;">
                        <h2>Update the details of the Book ID = <script>document.write(localStorage.getItem('book_id'));</script></h2><hr>
                    </div>

                    <div class="col-md-6 col-md-offset-3" id="alert_msg"></div>
                </div>

                <form method="POST" action="" id="updtBook_form">
                    <div class="col-sm-6 col-md-6 col-sm-offset-3 col-md-offset-3">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <input type="hidden" name="book_id" id="book_id">                                
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="isbn">ISBN</label>
                                <input type="text" name="isbn" class="form-control" id="isbn" placeholder="ISBN">
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="category">Category</label>
                                <input type="text" name="category" class="form-control" id="category" placeholder="Category">
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="Enter Title of the book">
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="book_name">Book Name</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Enter the name of the book">
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="author">Author</label>
                                <input type="text" name="author" class="form-control" id="author" placeholder="Author Name">
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="publisher">Publisher</label>
                                <input type="text" name="publisher" class="form-control" id="publisher" placeholder="Publisher">
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="piblish_date">Publish Date</label>
                                <input type="text" name="publish_date" class="form-control" id="publish_date" placeholder="Enter the published date">
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="text" name="price" class="form-control" id="price" placeholder="Price of the book">
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="format">Format</label>
                                <input type="text" name="format" class="form-control" id="format" placeholder="Format">
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="language">Language</label>
                                <input type="text" name="lang" class="form-control" id="lang" placeholder="Language">
                            </div>
                        </div>

                        <!--<div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="desc" class="form-control" id="desc" placeholder="Enter a short description" height="350px"></textarea>
                            </div>
                        </div>-->
                        
                        <div class="col-sm-12 col-md-12">                   
                            <button type="submit" name="updateBook" class="btn btn-primary">Update</button>                    
                        </div>
                    </div>
                </form>
            </div>

            <div class="row" style="margin-bottom: 20px;"></div>
        </div>

        <script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
        <script type="text/javascript" src="../../assets/js/bootstrap.min.js"></script>

        <script type="text/javascript" src="../../assets/js/custom.js"></script>
        <script type="text/javascript" src="../../assets/js/book.js"></script>
    </body>
</html>