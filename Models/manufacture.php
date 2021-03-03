<?php
class Cate extends Db{
    //Viet phuong thuc lay ra tat ca san pham noi bat
    function Getallcategory()
    {
        $sql=self::$connection->prepare("SELECT * FROM `manufactures`");
        $sql->execute();//return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
 

    //Viet phuong thuc lay ra 10 sp moi nhat
    function getItem($id)
    {
        $sql=self::$connection->prepare("SELECT `manu_name` FROM `manufactures` where manu_id=$id");
        $sql->execute();//return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    function GetSpTheoId($id)
    {
        $sql=self::$connection->prepare("SELECT * FROM `products`,`manufactures` WHERE products.manu_id=manufactures.manu_id AND manufactures.manu_id=$id");
        $sql->execute();//return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    function GetSpTheoIdpaginate($id,$page,$perpage)
    {
        $fistlink=($page-1)*$perpage;
        $sql=self::$connection->prepare("SELECT * FROM `products`,`manufactures` WHERE products.manu_id=manufactures.manu_id AND manufactures.manu_id=$id limit $fistlink,$perpage");
        $sql->execute();//return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    function paginate($id,$url, $total, $perPage) {
        $totalLinks = ceil($total/$perPage); 
        $link =""; 
        for($j=1; $j <= $totalLinks ; $j++) 
        { 
           
                $link = $link."<a  href='$url?page=$j&&id=$id'> $j </a>"; 
            
           
        } 
        return $link; 
    }
    //Lay sn pham theo id
   
}