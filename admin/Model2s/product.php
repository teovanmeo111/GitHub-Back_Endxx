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
                                                FROM products order by id desc
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

    function getItemManu($id) {
        $sql=self::$connection->prepare("   SELECT * FROM `products`,`manufactures` 
        WHERE products.manu_id=manufactures.manu_id 
        AND manufactures.manu_id=$id");
     
        $sql->execute();//return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    function paginate($url, $total, $perPage,$page) {
        $totalLinks = ceil($total/$perPage); 
        $link =""; 
        for($j=1; $j <= $totalLinks ; $j++) 
        { 
            if($link==$page)
            {
                $link = $link."class=acctive_taoviet"." <a  href='$url?page=$j'> $j </a>"; 
            }
            else
            {
                $link = $link."<a  href='$url?page=$j'> $j </a>"; 
            }
           
        } 
        return $link; 
    }
    function getproductype_by_typeid($type_id)
    {
        $sql=self::$connection->prepare("   SELECT type_name FROM `products`,`protypes` 
        WHERE products.type_id=protypes.type_id 
        AND protypes.type_id=$type_id");
     
        $sql->execute();//return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    function Product_Add($name,$manu_id,$type_id,$price,$pro_image,$description,$feauture)
    {
        $sql=self::$connection->prepare("  INSERT INTO `products`( `name`, `manu_id`, `type_id`, `price`, `pro_image`,
         `description`, `feature`) VALUES (?,?,?,?,?,?,?)");
          $sql->bind_param("siiissi",$name,$manu_id,$type_id,$price,$pro_image,$description,$feauture);
      return   $sql->execute();//return an object
       
      
         //return an array
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

    function UpdateProc($id,$name,$manu_id,$type_id,$price,$pro_image,$description,$feauture)
    {
        $sql=self::$connection->prepare(" UPDATE `products` SET `name`= ?,`manu_id`= ?,`type_id`=?,`price`=?,`pro_image`=?,`description`=?,`feature`=? where `id`=?");
         $sql->bind_param("siiissii",$name,$manu_id,$type_id,$price,$pro_image,$description,$feauture,$id);
     return   $sql->execute();//return an object
    }

    function DeleteProc($id)
    {
        $sql=self::$connection->prepare("DELETE FROM `products` WHERE `id`=? ");
        $sql->bind_param("i",$id);
    return   $sql->execute();//return an object
    }

}