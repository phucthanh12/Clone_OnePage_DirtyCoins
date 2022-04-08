<?php
//Require MySQL connection
require('database/DBController.php');

//Require Product Class
require('database/Product.php');

// //Require Cart class
// require('database/Cart.php');

// DBController Object - trong DBcontroller có __construct thì khi khởi tạo,biến sẽ được gán giá trị mới để tạo connect từ phương thức mysqli_connect()
$db = new DBController();

//Product Object
$product = new Product($db);

// //Cart object
// $Cart = new Cart($db);

?>

