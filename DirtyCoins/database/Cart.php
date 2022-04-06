<?php

class Cart {
    public $db = null;

    public function __construct(DBController $db) {  //$db nếu khác null thì đã chạy this của class DBController ->conn bằng mysqli_connect rồi
        if(!isset($db->conn)) return null;
        $this->db = $db;
    }

    public function insertIntoCart($params = null ,$table ="cart") 
    {
        if($this->db->conn != null) //check conn của class Cart 
        {
            if($params != null)   //check nếu có truyền array vào ,ở dưới xử lý
            {

                //Get columns or keys of an array
                $columns = implode(",",array_keys($params));  //implode kết hợp các giá trị của chuỗi lại thành ?string và ngăn cách bởi ,
                
                //Get values of an array
                $values = implode(",",array_values($params));

                //Create sql query
                $query_string = sprintf("INSERT INTO %s(%s) VALUES (%s)",$table,$columns,$values);
                
                $result = $this->db->conn->query($query_string);
                return $result;
            }
        }
    }

    public function addToCart($user_id ,$item_id)  //truyền id chạy hàm insertIntoCart
    {
        if(isset($user_id) && isset($item_id)){
            $params = array(
                "user_id" => $user_id ,
                "item_id" => $item_id,
            );

            $result = $this->insertIntoCart($params);
            if($result){
                //reload page
                // header("Location".$_SERVER['PHP_SELF']);
                header("Location:cart.php");
            }
        }
    }
}

?>