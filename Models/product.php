<?php
class Product extends Db{
    //Viet phuong thuc lay ra tat ca san pham noi bat
    function getAllFeatureProducts(){
        $sql = self::$connection->prepare("     SELECT * 
                                                FROM products AS pd
                                                WHERE pd.feature = 0");
        $sql->execute();//return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    function getAllProduct(){
        $sql = self::$connection->prepare("     SELECT * 
                                                FROM products AS pd
                                               ");
        $sql->execute();//return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    // Hàm cũ
    function getFeatureProducts($page, $perPage){
        $firstLink = ($page - 1) * $perPage;
        $sql = self::$connection->prepare("     SELECT * 
                                                FROM products AS pd
                                                WHERE pd.feature = 0
                                                LIMIT $firstLink,$perPage");
        $sql->execute();//return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    // hàm t thêm vào
    function Getpaginate($page, $perPage){
        $firstLink = ($page - 1) * $perPage;
        $sql = self::$connection->prepare("     SELECT * 
                                                FROM products AS pd
                                            --   WHERE pd.feature = 0
                                                LIMIT $firstLink,$perPage");
        $sql->execute();//return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }


    //Viet phuong thuc lay ra 10 sp moi nhat
    function getThreeNewFeedProducts()
    {
        $sql=self::$connection->prepare("SELECT * FROM products order by products.created_at desc limit 3");
        $sql->execute();//return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    //Lay sn pham theo id
    function getItem($id) {
        $sql=self::$connection->prepare("   SELECT * 
                                            FROM products AS pd 
                                            WHERE pd.id = ?;");
        $sql->bind_param("i",$id);
        $sql->execute();//return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    // paginate tu khoa tim kiem duoc
    function getItempaginate($id,$page,$perPage) {
        $firstLink = ($page - 1) * $perPage;
      $sql=self::$connection->prepare("   SELECT * 
                                            FROM products AS pd 
                                            WHERE pd.id = ?;
                                            limit $firstLink,$perPage
                                            ");
        $sql->bind_param("i",$id);
        $sql->execute();//return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    function getItemManu($id) {
        $sql=self::$connection->prepare("   SELECT * FROM `products`,`manufactures` 
        WHERE products.manu_id=manufactures.manu_id 
        AND manufactures.manu_id=$id");
     
        $sql->execute();//return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    function getdatatheokey($key)
    {
        $sql=self::$connection->prepare("   SELECT * FROM `products` WHERE `name` LIKE '%$key%' ");
      //$sql->bind_param('s',$key);
        $sql->execute();//return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    function getAllinfobyID($id)
    {
        $sql=self::$connection->prepare("SELECT * FROM `products`,`protypes`,`manufactures` WHERE products.id=? AND products.manu_id=manufactures.manu_id AND products.type_id=protypes.type_id");
        $sql->bind_param("i",$id);
        $sql->execute();//return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    function paginate($url, $total, $perPage) {
        $totalLinks = ceil($total/$perPage); 
        $link =""; 
        for($j=1; $j <= $totalLinks ; $j++) 
        { 
            $link = $link."<a href='$url?page=$j'> $j </a>"; 
        } 
        return $link; 
    }

    function  LayhetIDProduct()
    {
        $sql=self::$connection->prepare("SELECT `id` FROM `products`");
      
        $sql->execute();//return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    function LaySanPhamLienQuan($type_id)
    {
        $sql=self::$connection->prepare("SELECT * FROM `products` WHERE `type_id`=?");
        $sql->bind_param("i",$type_id);
        $sql->execute();//return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    function Getpaginate_Detail($page, $perPage,$type_id){
        $firstLink = ($page - 1) * $perPage;
        $sql = self::$connection->prepare("     SELECT * FROM `products` WHERE `type_id`=?
                                            --   WHERE pd.feature = 0
                                                LIMIT $firstLink,$perPage");
                                                     $sql->bind_param("i",$type_id);
        $sql->execute();//return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
}