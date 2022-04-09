<?php
require("database/DBController.php");
$db = new DBController();
$conn =$db->conn;


if(isset($_POST['submit-signup'])){
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $rpassword = $_POST['rpassword'];    

    if(empty($name)){
        $err['name'] = "Bạn chưa nhập tên";
    }
    if(empty($username)){
        $err['username'] = "Bạn chưa nhập tài khoản";
    }
    if(empty($email)){
        $err['email'] = "Bạn chưa nhập email";
    }
    if(empty($password)){
        $err['password'] = "Bạn chưa nhập mật khẩu";
    }
    if($password != $rpassword){
        $err['rpassword'] = "Mật khẩu nhập lại không đúng";
    }
    //var_dump(!empty($err));
    if(empty($err)){
        //password_hash(string, PASSWORD_DEFAULT); mã hóa mật khẩu insert vào database
        $pass = password_hash($password,PASSWORD_DEFAULT);
        //var_dump($pass);
        //die();
        $sql = "INSERT INTO users(name,username,email,password) VALUES ('$name','$username','$email','$pass')";
        $query = mysqli_query($conn,$sql);
        if($query){ //chuyển về trang đăng nhập sau khi đã insert tài khoản vào database
            header('location: sign_in.php');
        }
    }

    //die();
    

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Đăng ký</title>
    <link rel="stylesheet" href="./assets/css/sign_in.css"/>
</head>

<body>
    <div class="container">
        <h1>Đăng ký tài khoản</h1>
        <form action="" method="POST" role="Form">
            <div class="form-group">
                <input type="text" class="form-control" id="" placeholder="Tên" name="name" />
                <span></span>
                <small></small>                
            </div>
            <div class="has-error"> 
                <span> <?php echo (isset($err['name']))?$err['name']:''?></span>
            </div>

            <div class="form-group">
                <input type="text" class="form-control" id="" placeholder="Tài khoản" name="username" />
                <span></span>
                <small></small>
            </div>
            <div class="has-error"> 
                <span> <?php echo (isset($err['username']))?$err['username']:''?></span>
            </div>
            <div class="form-group">
                <input type="email" class="form-control" id="" placeholder="Email" name="email" />
                <span></span>
                <small></small>
            </div>
            <div class="has-error"> 
                <span> <?php echo (isset($err['email']))?$err['email']:''?></span>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="" placeholder="Mật khẩu" name="password" />
                <span></span>
                <small></small>
            </div>
            <div class="has-error"> 
                <span> <?php echo (isset($err['password']))?$err['password']:''?></span>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="" placeholder="Nhập lại mật khẩu" name="rpassword" />
                <span></span>
                <small></small>
            </div>
            <div class="has-error"> 
                <span> <?php echo (isset($err['rpassword']))?$err['rpassword']:''?></span>
            </div>
            <button type="submit" name="submit-signup" class="btn-primary">Đăng ký</button>
            <div class="signup_link">Bạn đã có tài khoản? <a href="sign_in.php">Đăng nhập</a></div>
        </form>
    </div>

   
</body>
<script src="xapp.js"></script>
</html>