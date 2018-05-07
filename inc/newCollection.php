<!--Newly added books-->
<div class="new-collection" style="margin: 5rem 0rem;">
    <div align="center" style="margin:10px 0px; border-bottom: 0.1rem solid #ccc;">           
        <h1 style="display: inline-block; margin: 0px;">Recently Added Books</h1>                  
    </div>

    <!-- Item slider-->
    <div class="container-fluid">

        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="carousel carousel-showmanymoveone slide" id="itemslider">

                    <div class="carousel-inner">
                        <?php
                        //$ootest = new OOTest();
                        //$newBook = $ootest->getBooks();
                        if ($newBook) {
                            $i = 0;
                            foreach ($newBook as $new) {
                                if ($i == 0) {
                                    ?>
                                    <div class="item active">
                                        <?php
                                    } if ($i > 0 && $i < 6) {
                                        ?>                                        
                                        <div class="item">
                                            <?php
                                        }
                                        if ($i < 6) {
                                            ?>
                                            <div class="col-xs-12 col-sm-6 col-md-2" style="height: 300px;">
                                                <a href="book_detail.php?book_id=<?php echo $new['book_id']; ?>"><img src="image/<?php echo $new['book_cover']; ?>" class="img-responsive center-block"></a>
                                                <h4 class="text-center">MAYORAL SUKNJA</h4>
                                                <h5 class="text-center">4000,00 RSD</h5>
                                            </div>
                                        </div>
                                        <?php
                                        $i++;
                                    }
                                }
                            }
                            ?>                    
                        </div>

                        <div id="slider-control">
                            <a class="left carousel-control" href="#itemslider" data-slide="prev">
                                <i class="fa fa-caret-left fa-2x" aria-hidden="true" style="position: absolute; top: 50%; z-index: 5; display: inline-block;"></i> 
                            </a>

                            <a class="right carousel-control" href="#itemslider" data-slide="next">
                                <i class="fa fa-caret-right fa-2x" aria-hidden="true" style="position: absolute; top: 50%; z-index: 5; display: inline-block;"></i>
                            </a>
                        </div>

                    </div>
                </div>

            </div>

        </div>

    </div>
    <!-- Item slider end-->    
</div>
<!--Newly added books-->
