<?php 
    $product_shuffle = $product->getData();
    $counter=1; //limit the products show
?>
        <div class="section-newarrival">
            <h2 class="newarrival-title">NEW ARRIVALS</h2>
            <!--Container-->
            <div class="row">
                <?php foreach($product_shuffle as $item) {?>
                    <?php if($item['item_tag'] == 'New arrival' && $counter <=6 ) { ?>
                <div class="section-col">
                    <div class="section-new-card">
                        <p class="new-card-title"><?php echo $item['item_tag'] ??'Unknown'; ?></p>
                        <a href="<?php printf('%s?item_id=%s','product.php',$item['item_id']);?>"><img src="<?php echo $item['item_image'] ??"./assets/images/newarrivals/new1.jpg";?>" alt=""></a>
                        <h4 class="new-card-name"><?php echo $item['item_name'] ??'Unknown'; ?></h4>
                        <p class="new-card-price"><?php echo $item['item_price'] ??'0';?> </p>
                    </div>
                </div>
                    <?php $counter++; }//closing if function ?>
                <?php }//closing foreach function ?>
            </div>
        </div>

    <!-- Việc $item được render,thì mỗi item lấy ra
     đều có đủ thuộc tính của thằng Array đó trong db -->
    <!-- Vì vậy ngoài việc fetch ra được thuộc tính của $item
    thì như trên thẻ a trên thì còn dùng như GET để gửi 
    1 giá trị nào đó đến trang khác-->
    <!--Hiểu đơn giản nó render từng thằng,thì việc gửi thông tin
    của thằng đó cũng vậy trang?key=Array[props] -->
