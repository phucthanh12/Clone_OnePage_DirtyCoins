<?php
require('functions.php');
session_start();

if(!isset($_SESSION['cart'])) $_SESSION['cart'] = array();
//lấy dữ liệu từ form,isset check tồn tại khỏi tạo chưa

if(isset($_POST['addtoCart']) && $_POST['addtoCart']){
    $item_id = $_POST['item_id'];
    $item_qty = (int) ($_POST['item_soluong']);
    $item_price=(int) ($_POST['item_price']);
    $sp = [$item_id,$item_price,$item_qty];
    $_SESSION['cart'][] = $sp; // lưu nhiều sản phẩm
    $cart = $_SESSION['cart'];
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
</body>
</html>
