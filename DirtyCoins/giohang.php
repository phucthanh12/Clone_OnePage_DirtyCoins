<?php 
    //include header.php file
    include('header.php');
?>
<?php
session_start();

$giohang = array();
if(isset($_SESSION["giohang"])){
    $giohang = $_SESSION["giohang"];
} else {
    $_SESSION["giohang"] = $giohang;
}

if(isset($_POST["hd"])){
    $hd = $_POST["hd"];
    if($hd == "them") {
        // them vao gio
        $masp = $_POST["masp"];

        if(isset($giohang[$masp])){
            $giohang[$masp] = (int)$giohang($masp) + 1;
        } else {
            $giohang[$masp] = 1;
        }
        $_SESSION["giohang"] = $giohang;
    } elseif($hd == "capnhat"){
        //capnhat
        $dssl = $_POST["dssl"];
        foreach($giohang as $k => $v){
            $giohang[$k] = (int)$dssl[$k];
            if($giohang[$k] == 0){
                unset($giohang[$k]);
            }
        }
        $_SESSION["giohang"] = $giohang;
    } elseif($hd == 'xoa'){
        $giohang = array();
        $_SESSION["giohang"] = $giohang;
    }
}

?>
<!DOCTYPE html>
<html>
<head>
<title>Giỏ Hàng - Dirty Coins</title>
</head>
<body>
<div class="container">
                <div class="row" >
                    <h1>THÔNG TIN ĐẶT HÀNG</h1>
                    <table class="thongtinnhanhang">
                        <tr>
                            <td width="20%">Họ tên</td>
                            <td><input type="text" name="hoten" required></td>
                        </tr>
                        <tr>
                            <td>Địa chỉ</td>
                            <td><input type="text" name="diachi" required></td>
                        </tr>
                        <tr>
                            <td>Điện thoại</td>
                            <td><input type="text" name="dienthoai" required></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><input type="text" name="email" required></td>
                        </tr>
                    </table>
                </div>

</div>
<?php

if(count($giohang)==0){
    echo "Giỏ Hàng Trống";
} else {
    echo "<p>Giỏ hàng</p>";
    echo "<form method='POST'>";
    echo "<table border='1' cellspacing='0'>";
    echo "<tr><th>Tên</th><th>Giá</th><th>Số lượng</th><th>Thành tiền</th></tr>";
   #include_once("db.php");
    #$cn = db_connect();
    $dsma = implode(",",array_keys($giohang));

    $sql = "select ma, ten, gia from tblsanpham where ma in ($dsma)";
    $result = $cn->query($sql);
    $cn->close();

    $tongtien = 0;
    while($row = $result->fetch_array()){
        $ma = $row["ma"];
        echo "<tr>";
        echo "<td>{$row['ten']}</td>";
        $gia= number_format($row['gia']);
        echo "<td align='right'>{$gia}</td>";
        echo "<td align='right'>";
        echo "<input type='number' name='dssl[{$ma}]' value='{$giohang[$ma]}' min='0' style='width:50px; text-align: right;'>";
        echo "</td>";
        $thanhtien = $giohang[$ma] * $row["gia"];
        $tongtien = $tongtien + $thanhtien;
        $thanhtien = number_format($thanhtien);
        echo "<td align='right'>{$thanhtien}</td>";
        echo "</tr>";
    }
    $strtongtien = number_format($tongtien);
    echo "<tr><td colspan='3'>Tổng tiền</td><td align='right'>{$strtongtien}</td></tr>";
    echo "<tr>";
    echo "<td colspan='4' align='right'>";
    echo "<input type='hidden' name='hd' value='capnhat'>";
    echo "<input type='submit' name='submit' value='Cập nhật'>";
    echo "</td>";
    echo "</tr>";
    echo "</table>";

    echo "</form>";
}
?>

<p>
<form method="post" style="display: inline;">
<input type="hidden" name="hd" value="xoa">
<input type="submit" name="submit" value="Xóa">
</form>
<button onclick="window.location.href='dathang.php'">Đặt hàng</button>
<button onclick="window.location.href='dathang.php'">Trang Chủ</button>
</p>
</body>
</html>
<br>
<?php 
include('footer.php');
?>