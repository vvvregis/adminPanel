
        <div class="shop_sidebar_area">

            <!-- ##### Single Widget ##### -->
            <div class="widget catagory mb-50">
                <!-- Widget Title -->
                <h6 class="widget-title mb-30">Статьи</h6>

                <!--  Catagories  -->
                <div class="catagories-menu">
                    <ul>
                        <?php if($categoriesList):?>
                            <?php foreach ($categoriesList as $itemInfo):?>
                                <li><a href="/articles/list?id=<?php echo $itemInfo->id?>"><?php echo $itemInfo->name?></a></li>
                            <?php endforeach;?>
                        <?php endif;?>
                    </ul>
                </div>
            </div>

        </div>

        <div class="amado_product_area section-padding-100">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="product-topbar d-xl-flex align-items-end justify-content-between">
                            <!-- Total Products -->
                            <div class="total-products">
                                <p>Showing 1-8 0f 25</p>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <?php if($articlesList):?>
                        <?php foreach ($articlesList as $itemInfo):?>
                            <!-- Single Product Area -->
                            <div class="col-12 col-sm-6 col-md-12 col-xl-6">
                                <div class="single-product-wrapper">
                                    <!-- Product Image -->
                                    <div class="product-img">
                                        <img class="old-hover" src="/uploads/article/<?php echo $itemInfo->image?>" alt="">
                                    </div>

                                    <!-- Product Description -->
                                    <div class="product-description d-flex align-items-center justify-content-between">
                                        <!-- Product Meta Data -->
                                        <div class="product-meta-data">
                                            <div class="line"></div>
                                            <a href="/articles?alias=<?php echo $itemInfo->alias?>">
                                                <h6><?php echo $itemInfo->name?></h6>
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        <?php endforeach;?>
                    <?php endif;?>
                </div>

                <div class="row">
                    <div class="col-12">
                        <!-- Pagination -->
                        <nav aria-label="navigation">
                            <ul class="pagination justify-content-end mt-50">
                                <li class="page-item active"><a class="page-link" href="#">01.</a></li>
                                <li class="page-item"><a class="page-link" href="#">02.</a></li>
                                <li class="page-item"><a class="page-link" href="#">03.</a></li>
                                <li class="page-item"><a class="page-link" href="#">04.</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Main Content Wrapper End ##### -->