<!--Our Collection Slider-->
<div id="carousel-example" class="carousel slide" data-ride="carousel" style="margin: 5rem 0rem;">

    <div align="center" style="margin:10px 0px; border-bottom: 0.1rem solid #ccc;">
        <!--Controls--> 
        <a class="left" href="#carousel-example" data-slide="prev" style="display: inline-block;">
            <i class="fa fa-caret-left fa-2x" aria-hidden="true"></i>            
        </a>

        <h1 style="display: inline-block; margin: 0px;">Our Collections</h1>

        <a class="right" href="#carousel-example" data-slide="next" style="display: inline-block;">
            <i class="fa fa-caret-right fa-2x" aria-hidden="true"></i>            
        </a>
        <!--Controls end-->
    </div>

    <div class="carousel-inner">
        <?php
        $ootest = new OOTest();
        $category = $ootest->getCategory();

        if ($category) {
            $i = 0;
            foreach ($category as $cat) {
                $i++;
                if ($i == 1) {
                    ?>
                    <div class="item active container">
                        <div>
                            <!--<h3 style="margin: 1rem; font-weight: bold; text-align: center; font-style: italic;"> <u>Book Category: <?php //echo $cat['book_type'];   ?></u></h3>-->
                        </div>
                    <?php } else { ?>
                        <div class="item container">
                            <div>
                                <!--<h3 style="margin: 1rem; font-weight: bold; text-align: center; font-style: italic;"> <u>Book Category: <?php //echo $cat['book_type'];   ?></u></h3>-->
                            </div>
                            <?php
                        }
                        $bookDetails = $ootest->getBooks();
                        if ($bookDetails) {
                            $j = 0;
                            foreach ($bookDetails as $details) {

                                if ($cat['book_type'] == $details['category'] && $j < 4) {
                                    $j++;
                                    ?>  
                                    <div class="col-md-3 col-sm-4 col-xs-6 book-item">

                                        <div class="book-cover" style="height: 300px; text-align: center">
                                            <a href="inc/book_detail.php?book_id=<?php echo $details['book_id']; ?>">
                                                <img class="logo img-responsive" src="image/<?php echo $details['book_cover']; ?>" alt="..." width="" height="">
                                            </a>                            
                                        </div>
                                        <div class="">
                                            <?php echo $details['book_name']; ?>
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
<!--End Our Collection Slider-->