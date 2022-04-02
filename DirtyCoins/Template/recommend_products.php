<div class="section-recommend">
            <h2 class="recommend-title">GỢI Ý DÀNH CHO BẠN</h2>
            <div class="row">
                <?php array_map(function ($item){?>
                    <?php if($item['item_id'] > 12 && $item['item_id'] <=18){ ?>
                <div class="section-col">
                    <div class="section-rec-card">
                        <p class="rec-card-title"><?php echo $item['item_tag'] ??'New arrival';?></p>
                        <a href="<?php printf('%s?item_id=%s','product.php',$item['item_id']);?>"> <img src="<?php echo $item['item_image'] ??'./assets/images/recommend/rec1.jpg';?>" alt=""> </a>
                        <h4 class="rec-card-name"><?php echo $item['item_name'] ??'Unknown'; ?></h4>
                        <p class="rec-card-price"><?php echo $item['item_price'] ??'0' ;?>₫</p>
                    </div>
                </div>
                    <?php }//closing if function ?>
                <?php },$product_shuffle)//closing array_map function?>
            </div>

            <div class="row row-hide">
                <?php array_map(function($item){ ?>
                    <?php if($item['item_id'] > 18){ ?>
                <div class="section-col">
                    <div class="section-rec-card">
                        <p class="rec-card-title"><?php echo $item['item_tag'] ??'New arrival';?></p>
                        <a href="<?php printf('%s?item_id=%s','product.php',$item['item_id']); ?>"><img src="<?php echo $item['item_image'] ??'./assets/images/recommend/rec1.jpg';?>" alt=""></a> 
                        <h4 class="rec-card-name"><?php echo $item['item_name'] ??'Unknown'; ?></h4>
                        <p class="rec-card-price"><?php echo $item['item_price'] ??'0' ;?>₫</p>
                    </div>
                </div>
                    <?php }//closing if function ?>
                <?php },$product_shuffle) //closing array_map function ?>
            </div>

            <div class="show-btn">   
                <button class="btn-recommend" onclick="showMoreProducts()">Xem thêm sản phẩm</button>
                <button class="btn-outofIndex">Hết sản phẩm trưng bày</button>
            </div>
</div>  
