<?php 

class protype extends Db{

    function Getallprotype()
    {
        $sql = self::$connection->prepare("     SELECT * FROM `protypes`
       ");
$sql->execute();//return an object
$items = array();
$items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
return $items; //return an array
    }

    function Getitem($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM `protypes` WHERE `type_id`=?  ");
        $sql->bind_param("i",$id);
 $sql->execute();//return an object
 $items = array();
 $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
 return $items; //return an array
    }


    function Add($name)
    {
     
            $sql=self::$connection->prepare(" INSERT INTO `protypes`( `type_name`) VALUES (?)");
             $sql->bind_param("s",$name);
         return   $sql->execute();//return an object
        
    }

    function Edit($id,$name)
    {
        $sql=self::$connection->prepare(" UPDATE `protypes` SET `type_name`=? WHERE `type_id`=?");
        $sql->bind_param("si",$name,$id);
    return   $sql->execute();//return an object
   
    }

    function Delete($id)
    {
        $sql=self::$connection->prepare(" DELETE FROM `protypes` WHERE `type_id`=? ");
        $sql->bind_param("i",$id);
    return   $sql->execute();//return an object
    }

    function CheckThamChieu($id)
    {
        $sql = self::$connection->prepare("   SELECT * FROM `products`,`protypes` WHERE `products`.`type_id`=protypes.type_id AND protypes.type_id=? ");
        $sql->bind_param("i",$id);
        $sql->execute();//return an object
 $items = array();
 $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
 return $items; //return an array
    }

}


