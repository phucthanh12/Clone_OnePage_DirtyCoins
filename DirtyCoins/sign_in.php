<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Đăng Nhập</title>
    <link rel="stylesheet" href="./assets/css/sign_in.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <div class="container">
        <h1 >Đăng nhập</h1>
        <div class="error">
            <span>
            <?php
                require("database/DBController.php");
                $db = new DBController();
                $conn =$db->conn;

                if(isset($_POST['submit-login'])){
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    
                    $sql = " SELECT * FROM users WHERE username = '$username' ";
                    $query = mysqli_query($conn,$sql);
                    $data = mysqli_fetch_assoc($query);
                    $checkUsername = mysqli_num_rows($query);
                    //var_dump($checkUsername);
                    if($checkUsername == 1){
                        $checkPass = password_verify($password, $data['password']);
                            
                        if($checkPass){
                            session_start();
                            $_SESSION['user'] = $data;
                            header('location: account.php');
                        }
                        else{
                            echo "Sai tài khoản hoặc mật khẩu";
                        }
                    }
                    else{
                        echo "Sai tài khoản hoặc mật khẩu";
                    }

                }
            ?>
            </span>
        </div>
        <div id="div_login" style="display:block">
            <form action="" method="POST" role="Form">
                <div class="form-group" >
                    <input type="text" class="form-control" id="" placeholder="Tài khoản của bạn" name="username" />
                    <span></span>
                    <small></small>
                </div>                      
                <div class="form-group">
                    <input type="password" class="form-control" id="" placeholder="Mật khẩu" name="password" />
                    <span></span>
                    <small></small>
                </div>            
                <button type="submit" name="submit-login" class="btn-primary">Đăng nhập</button>
                <div id="label_pass"><u>Quên mật khẩu</u></div>
                <div class="signup_link">Bạn chưa có tài khoản? <a href="sign_up.php">Đăng ký</a></div>
            </form>
        </div>
        <div id="div_update_pass" style="display:none">
            <form>
                <label>Quên mật khẩu</label>                                    
                <div class="form-group">
                    <input type="email" class="form-control" id="" placeholder="Nhập email của bạn" name="email" />
                    <span></span>
                    <small></small>
                </div>        
                <button type="submit" class="btn-primary">Gởi</button>
                <div id="label_cancel"><u>Hủy</u></div>     
            </form>
        </div>
    </div>
    <script>
    $('#label_pass').on('click', function() {
        document.getElementById('div_update_pass').style.display = "block";
        document.getElementById('div_login').style.display = "none";
    })
    $('#label_cancel').on('click', function() {
        document.getElementById('div_login').style.display = "block";
        document.getElementById('div_update_pass').style.display = "none";
    })
    </script>

</body>
</html>