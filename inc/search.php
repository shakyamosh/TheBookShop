<?php
$ootest = new OOTest();

?>

<div class="book-search">
    <div class="container">        
        <form method="GET" class="search" action="search_result.php">
            <div class="row">
                <div class="col-sm-6 col-md-9">
                    <div class="form-group">
                        <input type="text" name="keywords" class="form-control" id="book_title" placeholder="Search for book Title/Author">
                    </div>
                </div>                

                <div class="col-sm-6 col-md-3">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block" id="btnSearch" name="btnSearch">
                            <i class="fa fa-search"></i> &nbsp; 
                            Find Book
                        </button>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <?php
                if (isset($search)) {
                    echo $search;
                }
                ?>
            </div>
        </form>
    </div>
</div>

