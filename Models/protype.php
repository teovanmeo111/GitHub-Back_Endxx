<?php

class protype extends Db
{

    function Getallprotype()
    {
        $sql = self::$connection->prepare("     SELECT * FROM `protypes`
       ");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    function Add($name)
    {

        $sql = self::$connection->prepare(" INSERT INTO `protypes`( `type_name`) VALUES (?)");
        $sql->bind_param("s", $name);
        return   $sql->execute(); //return an object

    }
}
