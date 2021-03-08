<?php 

class User extends Db
{
    function GetfullUser()
    {
        $sql = self::$connection->prepare("     SELECT * 
        FROM user
       ");
$sql->execute();//return an object
$items = array();
$items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
return $items; //return an array
    }

    function CheckDangNhap($username, $password)
    {
        
        $sql = self::$connection->prepare("    SELECT * FROM `user` WHERE `UserName`=? && `PassWord`=?  
       ");
        $sql->bind_param("ss",$username,$password);
$sql->execute();//return an object
$items = array();
$items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
return $items; //return an array
    }

    function GetallUsername()
    {
        $sql = self::$connection->prepare("    SELECT `UserName` FROM `user`
        ");
      
 $sql->execute();//return an object
 $items = array();
 $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
 return $items; //return an array
    }
    
    function Account_Add($username,$password,$role,)
    {

        
        $sql=self::$connection->prepare(" INSERT INTO `user`( `UserName`, `PassWord`, `Role`) VALUES (?,?,?)");
         $sql->bind_param("sss",$username,$password,$role);
     return   $sql->execute();//return an object
    }
    function Account_Delete($username)
    {
        $sql=self::$connection->prepare(" DELETE FROM `user` WHERE `UserName`=?");
        $sql->bind_param("s",$username);
    return   $sql->execute();//return an object
    }

    function Account_Edit($id,$password,$role)
    {
        $sql=self::$connection->prepare(" UPDATE `user` SET `PassWord`=?,`Role`=? WHERE `ID`=?");
        $sql->bind_param("ssi",$password,$role,$id);
    return   $sql->execute();//return an object 
    }


    function LayttAccountx($id)
    {
        $sql = self::$connection->prepare("   SELECT * FROM `user` WHERE `ID`=?
        ");
         $sql->bind_param("i",$id);
 $sql->execute();//return an object
 $items = array();
 $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
 return $items; //return an array
    }

}