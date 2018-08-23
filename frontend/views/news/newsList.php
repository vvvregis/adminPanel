

    <!-- Product Catagories Area Start -->
    <div class="products-catagories-area clearfix">
        <div class="amado-pro-catagory clearfix">
            <?php if ($newsList) :?>
                <?php foreach ($newsList as $news) :?>
                    <!-- Single Catagory -->
                    <div class="single-products-catagory clearfix">
                        <a href="/news?alias=<?php echo $news->alias?>">
                            <img src="/uploads/news/<?php echo $news->image?>" alt="">
                            <!-- Hover Content -->
                            <div class="hover-content">
                                <div class="line"></div>
                                <h4><?php echo $news->name?></h4>
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