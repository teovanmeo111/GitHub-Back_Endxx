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
        $sql=self::$connection->prepare("SELECT * FROM `manufactures` where manu_id=$id");
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

    // thêm ngày 9/12
    function getNameByID($id)
    {
        $sql=self::$connection->prepare("SELECT  manufactures.manu_name FROM `products` JOIN `manufactures` WHERE `products`.`manu_id`=`manufactures`.`manu_id` and `products`.`id`=?  ");
        $sql->bind_param("i",$id);
        $sql->execute();//return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    function Manu_Add($name)
    {
        $sql=self::$connection->prepare(" INSERT INTO `manufactures`( `manu_name`) VALUES (?)");
         $sql->bind_param("s",$name);
     return   $sql->execute();//return an object
    }

    function Manu_Edit($id,$name)
    {
        $sql=self::$connection->prepare(" UPDATE `manufactures` SET `manu_name`=? WHERE manu_id=?");
         $sql->bind_param("si",$name,$id);
     return   $sql->execute();//return an obje
    }

    function Manu_Delete($id)
    {
        $sql=self::$connection->prepare("DELETE FROM `manufactures` WHERE `manu_id`=?");
        $sql->bind_param("i",$id);
    return   $sql->execute();//return an obje
    }

  

    //Lay sn pham theo id
   
}