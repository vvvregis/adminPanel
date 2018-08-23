
    <!-- Product Catagories Area Start -->
    <div class="products-catagories-area clearfix">
        <div class="amado-pro-catagory clearfix">
            <?php if ($categories) :?>
                <?php foreach ($categories as $category) :?>
                    <!-- Single Catagory -->
                    <div class="single-products-catagory clearfix">
                        <a href="/site/catalog?alias=<?php echo $category->alias?>">
                            <img src="/uploads/catalog/<?php echo $category->image?>" alt="">
                            <!-- Hover Content -->
                            <div class="hover-content">
                                <div class="line"></div>
                                <h4><?php echo $category->name?></h4>
                            </div>
                        </a>
                    </div>
                <?php endforeach;?>
            <?php endif;?>
        </div>
    </div>
    <!-- Product Catagories Area End -->
</div>
<!-- ##### Main Content Wrapper End ##### -->