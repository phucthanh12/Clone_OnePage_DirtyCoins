<?php
require('functions.php');
session_start();

if(!isset($_SESSION['cart'])) $_SESSION['cart'] = array();
//lấy dữ liệu từ form,isset check tồn tại khỏi tạo chưa

if(isset($_POST['addtoCart']) && $_POST['addtoCart']){
    $item_id = $_POST['item_id'];
    $item_qty = $_POST['item_soluong'];
    $sp = [$item_id,$item_qty];
    $_SESSION['cart'][] = $sp; // lưu nhiều sản phẩm
    $cart = $_SESSION['cart'];
    // var_dump($_SESSION['cart']);  
}

$product_shuffle = $product->getData();
// var_dump($product_shuffle); cả 2 đều là array
foreach($product_shuffle as $item){
    if($item['item_id'] == $cart[0]) {   
        echo "Fetch thành công";
    }
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
