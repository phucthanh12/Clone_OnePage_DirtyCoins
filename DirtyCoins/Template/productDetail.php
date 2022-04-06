 <?php 
    // $user_id = $_SESSION['user_id'];
    
    //request method post
    // if($_SERVER['REQUEST_METHOD'] == 'POST') {
    //     if(isset($_POST['addtoCart-btn'])){
    //         $Cart->addToCart($_POST['user_id'],$_POST['item_id']);
    //     }
    // }

    $product_shuffle = $product->getData();   
    shuffle($product_shuffle);

    $item_id=$_GET['item_id']??1;
    foreach($product_shuffle as $item) :
        if($item['item_id'] == $item_id) :
 ?>
 
 <!-- Main content -->
 <div class="card__container">
        <div class="card">
            <!--Left-->
            <div class="product-img">
                <div class="img-display">       
                        <img src="<?php echo $item['item_image'] ??"./assets/images/products/1.jpg"; ?>" alt="">
                </div>
            </div>
            <!--Right-->
            <div class="product-detail">
                <div class="detail-display">
                    <h3 class="product-name"><?php echo $item['item_name'] ??"Unknown"; ?></h3>
                    <div class="detail-product-price"><?php echo $item['item_price'] ??'0'; ?>đ</div>
                    <div class="product-size-wrapper">
                        <div class="size-btn">
                            <div class="product-size">
                                <button>Size S</button>
                            </div>
                            <div class="product-size">
                                <button>Size M</button>
                            </div>
                            <div class="product-size">
                                <button>Size L</button>
                            </div>
                            <div class="product-size">
                                <button>Size XL</button>
                            </div>
                        </div>
                    </div>
                    <div class="btn-addtoCart">
                        <form action="cart.php" method="post">
                            <input type="number" name="item_soluong" min="1" placeholder="1" value="1">
                            <input type="submit" class="submit-btn" name="addtoCart" value="Thêm vào giỏ hàng"/>
                            <input type="hidden" name="item_id" value="<?php echo $item['item_id']; ?>"/>   
                        </form>
                    </div>
                    <div class="product-detail-content">
                        <div>
                            <strong>Chi tiết sản phẩm:</strong>
                            <br>
                            • Regular fit.
                            <br>
                            • Bo cổ 2 chiều.
                            <br>
                            • Hình in mặt trước và sau áo áp dụng công nghệ in kéo lụa thủ công và in Trame.
                            <br>
                            <br>
                            <strong>Size Chart:</strong>
                        </div>
                        <div>
                            <img src="../../DirtyCoins/assets/images/size-chart-spray-tee.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <?php endif ?>
    <?php endforeach; ?>