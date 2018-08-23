
        <div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="cart-title mt-50">
                            <h2>Корзина</h2>
                        </div>

                        <div class="cart-table clearfix">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Название</th>
                                        <th>Количество</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php if($productsInCart):?>
                                    <?php foreach ($productsInCart as $item) : ?>
                                        <tr>
                                            <td class="cart_product_img">
                                                <a href="#"><img src="/uploads/products/<?php echo \common\models\Products::getProductImage($item->item_id)->image;?>" alt="Product"></a>
                                            </td>
                                            <td class="cart_product_desc">
                                                <h5><?php echo $item->name?></h5>
                                            </td>
                                            <td class="qty">
                                                <div class="qty-btn d-flex">
                                                    <p>Кол-во</p>
                                                    <div class="quantity">
                                                        <span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                                        <input type="number" class="qty-text" id="qty" step="1" min="1" max="300" name="quantity" value="<?php echo $item->count;?>">
                                                        <span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><span style="cursor:pointer" class="delete-item" data-id = '<?php echo $item->id?>'>Удалить продукт</span></td>
                                        </tr>
                                    <?php endforeach;?>
                                <?php else:?>
                                    <tr>
                                        <td colspan="2">Корзина пуста</td>
                                    </tr>
                                <?php endif;?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="cart-summary">
                           <!-- <h5>Всего товаров</h5>
                            <ul class="summary-table">
                                <li><span>subtotal:</span> <span>$140.00</span></li>
                                <li><span>delivery:</span> <span>Free</span></li>
                                <li><span>total:</span> <span>$140.00</span></li>
                            </ul>-->
                            <div class="cart-btn">
                                <a href="#" class="btn amado-btn w-100">Отправить заказ</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Main Content Wrapper End ##### -->
