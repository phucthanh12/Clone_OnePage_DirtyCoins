<?php
//use to fetch product data
class Product 
{
    public $db = null;

    public function __construct(DBController $db) //dependency injection với tham số $db type of DBController và khi tạo 1 object của Product thì cần truyền 1 object DBController
    {
        if(!isset($db->conn)) return null;
        $this->db = $db;  
    }

    //fetch product data using getData Method
    public function getData($table = 'product') { //khai báo biến $table để hàm này tái sử dụng nhiều lần
        $result = $this->db->conn->query("SELECT * FROM {$table}");  //chổ này this gọi db->conn nếu có thực hiện query - nếu không có tham số db truyền thì mặc định sẽ là null 

        $resultArray = array();

        //fetch product data one by one
        while ($item =mysqli_fetch_array($result,MYSQLI_ASSOC)){ //function này chỉ return 1 row 1 lần --biến trả về là 1 array
            $resultArray[] = $item; //lưu giá trị vào trong array chứ không phải biến nên có []
        }  
        return $resultArray;
    }
}
?>