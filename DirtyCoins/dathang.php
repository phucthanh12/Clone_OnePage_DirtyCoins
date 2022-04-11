<?php 
    include('header.php');
    $user = array();
    if(isset($_SESSION['user'])) $user = $_SESSION['user'] ?? [];

    $cart = array();
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(isset($_POST['buy-btn'])){
           $cart_id = $_POST['cart-id'];
        }
    }
    $conn = $db->conn;
    $result = $conn->query("select * from product where item_id in ($cart_id)");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/BEM.css">
    <title>Document</title>
</head>
<body>
    <div class="section-bestseller">
            <h2 class="bestseller-title" style='margin-top:66px;'>Đã được đặt hàng</h2>
            <!--Container-->
            <div class="product">
                <?php while($product = $result->fetch_array()) { ?>
                <?php 
                $ma = $product["item_id"];
                $anh = $product["item_image"];
                $ten = $product['item_name'];
                $gia = $product['item_price']; 
                ?>   
                <div class="section-col">
                    <div class="section-bestsl-card"style="max-width:350px">
                        <p class="bestsl-card-title"><?php echo $product['item_tag']??"New Arrival"; ?></p>
                        <img src="<?php echo $product['item_image'] ??"./assets/images/products/1.jpg"; ?>" alt="">
                        <h4 class="bestsl-card-name"><?php echo $product['item_name']??"Unknown"; ?></h4>
                        <p class="bestsl-card-price"><?php echo $product['item_price']??"0";?>đ</p>
                        <div class="bestsl-circle-bg">
                            <div class="bestsl-circle-mini">
                                <img src="<?php echo $product['item_image'] ??"./assets/images/products/1.jpg"; ?>" alt="">
                            </div>
                        </div>
                    </div>
                </div> 
                <?php }//closing foreach function ?>
            </div>
        </div>
    </div>
    <div id="toast">
        
    </div>
    <div>
        <form method="post" action="cart.php">
          <input type='submit' onclick="showSuccesToast();" class="btn btn--success" value="Thanh toán" >
          <input type="hidden" name="addtoCart" value="afterpaid">
        </form>
    </div>
    <script type="text/javascript" src="../DirtyCoins/assets/js/BEM.js"></script>
</body>
</html>
