<?php 
   include('header.php');
?>
<?php
    $user = [];
    if(isset($_SESSION['user'])? $user =$_SESSION['user']:[]);
    $user_id = $user['id'];

    // request method post
    $item_so = $_POST['item_dssl'];
   
$cart = array();
if(isset($_SESSION["cart"])){
    $cart = $_SESSION["cart"];
} else {
    $_SESSION["cart"] = $cart;
}

if(isset($_POST["addtoCart"]) && $_POST["addtoCart"]){
    $addtoCart = $_POST["addtoCart"];
    if($addtoCart == "add") {
        // add vào giỏ hàng
        $item_id = $_POST["item_id"];
        $item_soluong = $_POST["item_soluong"]; 

        if(isset($cart[$item_id])){
            $cart[$item_id] = (int)$cart[$item_id] + (int)($item_soluong);
        } else {
            $cart[$item_id] = (int)($item_soluong);
        }
        $_SESSION["cart"] = $cart;
    } elseif($addtoCart == "update"){
        //update giỏ hàng
        $dssl = $_POST["dssl"];
        foreach($cart as $k => $v){
            $cart[$k] = (int)$dssl[$k];
            if($cart[$k] == 0){
                unset($cart[$k]);
            }
        }
        $_SESSION["cart"] = $cart;
        //xóa giỏ hàng
    } elseif($addtoCart == "delete"){
        $cart = array();
        $_SESSION["cart"] = $cart;
    }
    elseif ($addtoCart == "afterpaid"){
        sleep(5);
        $cart = array();
        $_SESSION["cart"] = $cart;
    }
}
// var_dump($cart);

?>
<?php 

?>
<!DOCTYPE html>
<html>
<head>
<title>Giỏ Hàng - Dirty Coins</title>
</head>
<body>
<a href="sanpham.php">Trang Chủ</a><br>
<?php

if(count($cart)==0){
    echo "<h1 style='margin-top:90px;'>Giỏ Hàng Trống</h1>";
} else {
    echo "<center style='margin-top:90px;'><h2 style='margin:24px 0;'>GIỎ HÀNG</h2></center>";
    echo "<form method='post'>";
    echo "<table style='width:100% ; height:300px' border='2' cellspacing='2'";
    echo "<tr>
    <th>Sản Phẩm</th>
    <th>Giá</th>
    </th>
    <th style='width:90px;'>Số lượng</th>
    <th>Thành tiền</th>
    </tr>";
    $dsma = implode(",",array_keys($cart));
    $conn = $db->conn;
    $result = $conn->query("select * from product where item_id in ($dsma)");
    $tongtien = 0;
        while($row = $result->fetch_array()){
            if ($dsma != null) {
                $ma = $row["item_id"];
                $anh = $row["item_image"];
                $ten = $row['item_name'];
                $gia = $row['item_price'];
                echo "<tr>";
                echo "<td style='text-align: center;'>
                <p><img src='$anh' height='200px' width='150px' alt='anh' /></p>
                <div style='margin-top:16px; text-shadow:2px 2px 3px #c1c1c1; opacity:0.9;'>{$row['item_name']}</div>
                </td>";
                $gia= number_format($row['item_price'],3);
                echo "<td align='right'>{$gia}đ</td>";
                echo "<td align='right'>";
                echo "<input type='number' name='dssl[{$ma}]' value='{$cart[$ma]}' min='0' style='width:40px; text-align: center;'>";
                echo "</td>";
                $thanhtien = $cart[$ma] * $row["item_price"];
                $tongtien = $tongtien + $thanhtien;
                $thanhtien = number_format($thanhtien,3);
                echo "<td  align='right'>{$thanhtien} đ</td>";
                echo "</tr>"; 
            } else {
                echo "<h1 style='margin-top:90px; margin-bottom:24px;'>Giỏ Hàng Hiện Đang Trống</h1>";
            }
        }
    $strtongtien = number_format($tongtien,3);
    echo "<tr><td colspan='3' style='padding:4px;'>Tổng tiền</td><td align='right'>{$strtongtien} đ</td></tr>";
    echo "<tr>";
    echo "<td colspan='4' align='right' style='padding:4px;'>";
    echo "<input style='background-color:green ; border-radius: 16px; min-width:50px; padding:12px; color:#fff' type='submit' name='submit' value='Cập nhật'>";
    echo "<input type='hidden' name='addtoCart' value='update'>";
    echo "</td>";
    echo "</tr>";
    echo "</table>";

    echo "</form>";
}
?>

<span>
    <form method="post" style="display: inline;">
        <input style="cursor:pointer; margin-left:4px; margin-top:8px; background-color:rgb(198,28,28) ; border-radius: 10px; min-width:80px; padding:12px; color:#fff;"  type="submit" name="submit" value="Xóa">
        <input type="hidden" name="addtoCart" value="delete">
    </form>
    <form method="post" style="display:inline;" action="dathang.php">
        <input type="submit" name="buy-btn" value='Đặt hàng' style="cursor:pointer;margin-left:4px; margin-top:8px; background-color:rgb(212,92,33) ; border-radius: 10px; min-width:120px; padding:12px; color:#fff" onclick="window.location.href='dathang.php'"/>
        <input type="hidden" name='cart-id' value="<?php echo $dsma??null?>"  >
    </form>
        <button style="cursor:pointer;margin-left:4px; margin-top:8px; background-color:#00CCFF ; border-radius: 10px; min-width:80px; padding:12px; color:#fff" onclick="window.location.href='index.php'">Tiếp tục mua hàng</button>
</span>
</body>
</html>
<br>
<?php 
include('footer.php');
?>