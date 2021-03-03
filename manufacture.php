<?php
class Manufacture extends Db{
    //Lay sn pham theo id
    function getItem($id) {
        $sql=self::$connection->prepare("   SELECT mf.name 
                                            FROM manufatures AS mf 
                                            WHERE mf.id = ?;");
        $sql->bind_param("i",$id);
        $sql->execute();//return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
}