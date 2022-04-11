<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="account/assets/css/style.css">
    <link rel="shortcut icon" href="./account/assets/images/favicon/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="./account/assets/boxicons-2.1.1/css/boxicons.css">
    <link rel="stylesheet" href="./assets/css/account.css">
    <title>Dirty Coins</title>
</head>
    <body>
        <!--HEADER-->
    <?php
    //include header.php file //
    include('./header.php'); //session start ở trang header.php
    //include header.php file //

    $user = [];
    if(isset($_SESSION['user'])? $user =$_SESSION['user']:[]);
    ?>
    <section>
        <aside >
            <label>Tài khoản của tôi</label><br><br>
            <div action="" method="POST" role="Form">
                <label for="">Tên tài khoản: </label> <b><?php echo $user['username'] ?> </b>
            </div>
            <br><br>
            <a href="sign_out.php"><button class="btn1"  style="padding: 0.6em 0.8em;">Thoát</button></a>
        </aside>
        <article>
            <h1 id="thongtintaikhoan">THÔNG TIN TÀI KHOẢN</h1><br>
            <div id="article-font-size">
                <div action="" method="POST" role="Form">
                    <label for="">Xin chào,</label> <b><?php echo $user['name'] ?> </b>
                </div>
                <br><br>
                <label style="display:inline-block;margin-bottom:12px;"><b style="font-size:16px;">Đơn hàng gần nhất</b></label>  
                <div class="container">
                    <div class="row" id="donhang">
                        <b>
                        <label>Đơn hàng#</label>
                        <label style="margin-left:80px;">Ngày</label>
                        <label style="margin-left:80px;">Chuyển đến</label>
                        <label style="margin-left:80px;">Giá trị đơn hàng</label>
                        <label style="margin-left:80px;">Tình trạng thanh toán</label>
                        </b>
                    </div>
                </div>
                <label style="margin-left: 10px;"></label>
            </div>
        </article>

    </section>
    
    

        <!--FOOTER-->
    <?php
    include './footer.php';
    ?>    
      
    </body>
</html>