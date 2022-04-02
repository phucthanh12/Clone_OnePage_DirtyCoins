<?php

class DBController {
    // Database Connection Property -kiểu thuộc tính cần cho việc kết nối database
    protected $host = 'localhost';
    protected $user = "root";
    protected $password = "";
    protected $database = "dirtycoins";

    //Connection Property - để giá trị mặc định khi chưa có conn sẽ là null (không có đăng nhập nào)
    public $conn = null;

    //Call Constructor 
    public function __construct() 
    {
        $this->conn = mysqli_connect($this->host, $this->user, $this->password, $this->database); //thuộc tính lưu trữ 1 đối tượng?mysqli | false sẽ là object {}
        if($this->conn->connect_error)
        {
            echo "Fail".$this->conn->connect_error;
        }
    }



    public function __destruct()
    {
        $this->closeConnection();
    }

    //for mysqli Closing Connection 
    protected function closeConnection(){
        if($this->conn != null){  //kiểm tra hàm có đang hoạt động != null thì sẽ close <> connect 
            $this->conn->close(); //theo doc thì lý do trỏ được tới close là vì this->conn lúc này sau khi connect đã là một mysqli object
            $this->conn = null; // gán lại giá trị cho 
        }
    }
}
?>