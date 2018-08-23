

    <!-- Product Details Area Start -->
    <div class="single-product-area section-padding-100 clearfix">
        <div class="container-fluid">
            <!--
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mt-50">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Furniture</a></li>
                            <li class="breadcrumb-item"><a href="#">Chairs</a></li>
                            <li class="breadcrumb-item active" aria-current="page">white modern chair</li>
                        </ol>
                    </nav>
                </div>
            </div>-->

            <div class="row">
                <div class="col-12 col-lg-7">
                    <div class="single_product_thumb">
                        <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <a class="gallery_img" href="/uploads/article/<?php echo $article->image?>">
                                        <img class="d-block w-100" src="/uploads/article/<?php echo $article->image?>" alt="First slide">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-5">
                    <div class="single_product_desc">
                        <!-- Product Meta Data -->
                        <div class="product-meta-data">
                            <div class="line"></div>
                            <a href="product-details.html">
                                <h6><?php echo $article->name?></h6>
                            </a>
                        </div>

                        <div class="short_overview my-5">
                            <p><?php echo $article->text?></p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Details Area End -->
</div>
<!-- ##### Main Content Wrapper End ##### -->