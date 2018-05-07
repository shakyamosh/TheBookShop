<div id="bootstrap-touch-slider" class="carousel bs-slider fade  control-round indicators-line" data-ride="carousel" data-pause="hover" data-interval="5000" >

    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#bootstrap-touch-slider" data-slide-to="0" class="active"></li>
        <li data-target="#bootstrap-touch-slider" data-slide-to="1"></li>
        <li data-target="#bootstrap-touch-slider" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper For Slides -->
    <div class="carousel-inner" role="listbox">

        <!-- First Slide -->
        <div class="item active">

            <!-- Slide Background -->
            <img src="image/slider/collection.jpg" alt="Book Collection"  class="slide-image"/>
            <div class="bs-slider-overlay"></div>

            <div class="container">
                <div class="row">
                    <!-- Slide Text Layer -->
                    <div class="slide-text slide_style_left">
                        <h1 data-animation="animated zoomInRight">Welcome to TheBook Shop</h1>
                        <p data-animation="animated fadeInLeft">Tons of collection to browse from.</p>
                        <a href="pages/book.php" class="btn btn-default" data-animation="animated fadeInLeft">See Collection</a>
                        <a href="pages/register.php"  class="btn btn-primary" data-animation="animated fadeInRight">Sign Up</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Slide -->

        <!-- Second Slide -->
        <div class="item">

            <!-- Slide Background -->
            <img src="image/slider/stacked.jpg" alt="Book Stacked"  class="slide-image"/>
            <div class="bs-slider-overlay"></div>
            <!-- Slide Text Layer -->
            <div class="slide-text slide_style_center">
                <h1 data-animation="animated flipInX">Keep Reading</h1>
                <p data-animation="animated lightSpeedIn">Reading is the best for getting idea.</p>
                <a href="pages/book.php" class="btn btn-default" data-animation="animated fadeInUp">Browse Book</a>
                <a href="pages/contact.php" class="btn btn-primary" type="submit" name="keywords" data-animation="animated fadeInDown">Contact</a>
            </div>
        </div>
        <!-- End of Slide -->

        <!-- Third Slide -->
        <div class="item">

            <!-- Slide Background -->
            <img src="image/slider/b&w.jpg" alt="Black & White Book"  class="slide-image"/>
            <div class="bs-slider-overlay"></div>
            <!-- Slide Text Layer -->
            <div class="slide-text slide_style_right">
                <h1 data-animation="animated zoomInLeft">Best Authors, Sellers</h1>
                <p data-animation="animated fadeInRight">Find books of the best authors and sellers.</p>
                <a href="pages/login.php" target="_blank" class="btn btn-default" data-animation="animated fadeInLeft">LogIn</a>
                <a href="pages/register.php" target="_blank" class="btn btn-primary" data-animation="animated fadeInRight">SignUp</a>
            </div>
        </div>
        <!-- End of Slide -->


    </div><!-- End of Wrapper For Slides -->

    <!-- Left Control -->
    <a class="left carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="prev">
        <span class="fa fa-angle-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>

    <!-- Right Control -->
    <a class="right carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="next">
        <span class="fa fa-angle-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    
</div>