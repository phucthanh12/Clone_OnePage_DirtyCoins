<?php
    $product_shuffle = $product->getData();
?>

<div class="section-bestseller">
            <h2 class="bestseller-title">BEST SELLER</h2>
            <!--Container-->
            <div class="row">
                <?php foreach($product_shuffle as $item) { ?>
                    <?php if($item['item_tag'] == "Best Seller") { ?>
                <div class="section-col">
                    <div class="section-bestsl-card">
                        <p class="bestsl-card-title"><?php echo $item['item_tag']??"New Arrival"; ?></p>
                        <a href="<?php printf('%s?item_id=%s','product.php',$item['item_id']);?>"><img src="<?php echo $item['item_image'] ??"./assets/images/products/1.jpg"; ?>" alt=""></a>
                        <h4 class="bestsl-card-name"><?php echo $item['item_name']??"Unknown"; ?></h4>
                        <p class="bestsl-card-price"><?php echo $item['item_price']??"0";?>đ</p>
                        <div class="bestsl-circle-bg">
                            <div class="bestsl-circle-mini">
                                <img src="<?php echo $item['item_image'] ??"./assets/images/products/1.jpg"; ?>" alt="">
                            </div>
                        </div>
                    </div>
                </div> 
                    <?php }//closing if function ?>
                <?php }//closing foreach function ?>
            </div>
        </div>
    </div>