<?php
    session_start();
    $user = array();
    if(isset($_SESSION['user'])) $user = $_SESSION['user'] ?? [];
    // if(isset($_SESSION['user']))
    // var_dump($user); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../DirtyCoins/assets/css/style.css">
    <link rel="shortcut icon" href="./assets/images/favicon/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="./assets/boxicons-2.1.1/css/boxicons.css">
    <?php
        //require functions.php file 
        require('functions.php');
    ?>
    <title>Dirty Coins</title>
</head>
<body>
                                <!--HEADER-->
    <div id="header">
           <div class="header__container">
            <div class="header-logo">
                <a href="./"> <img src="./assets/images/logo/logo.png" alt="Dirty Coins Logo"></a>
            </div>

            <nav class="header__nav">
                <ul>
                    <li>
                        <a href="./" class="shop-list">SHOP</a>
                        <ul class="sub-nav">
                            <li><a href="#">TOP</a></li>
                            <li><a href="#">BOTTOM</a></li>
                            <li><a href="#">ACCESSORIES</a></li>
                            <li><a href="#">BAGS</a></li>
                            <li><a href="#">RESTOCKS</a></li>
                        </ul>
                    </li>
                    <li><a href="#">SALE</a></li>
                    <li><a href="#">NEWS</a></li>
                    <li><a href="#">CONTACT</a></li>
                    <li><a href="#">ABOUT</a></li>
                    <li><a href="#">COLLAB'S</a></li>
                </ul>
            </nav>
            
            <div class="header-link">
                <div class="header-icon">
                    <i class='bx bx-search'></i>
                </div>
                <div class="header-icon">
                    <i class='bx bxs-user'>
                        <!-- demo full case -->
                        <?php if(!isset($_SESSION['user'])){  ?>
                            <ul class="user-nav">
                                <li><a href="sign_in.php">????ng nh???p</a></li>
                            </ul>
                        <?php }else {?>   
                            <ul class="user-nav">
                                <li><a href="account.php">Trang c?? nh??n</a></li>
                                <li><a href="sign_out.php">????ng xu???t</a></li>
                            </ul>   
                            <?php } ?>
                    </i>
                </div>
                <div class="header-icon">
                    <a href="cart.php">
                        <i class='bx bxs-cart'></i>
                        <span><?php  $sohoadon ?></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>