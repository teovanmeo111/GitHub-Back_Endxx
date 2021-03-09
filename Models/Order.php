<?php
class Order extends Db{


    function Create_Order($idUser,$message)// Tạo ra 1 id order 
    {
        $sql = self::$connection->prepare("INSERT INTO `muahang`( `IdUser`,  `Message`) VALUES (?,?)");
        $sql->bind_param("is",$idUser,$message);
     return $sql->execute();//return an object
    }

    function GetidOrderLast()// Hàm này phải tạo riêng để perfomance tốt hơn vì chỉ cần chạy và lấy ra 1 lần
    {
        $sql=self::$connection->prepare("   SELECT MAX(ID) FROM muahang");

    $sql->execute();//return an object
    $items = array();
    $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
return $items[0]; //return an array
    }

    function Them_Order($id_product,$soluong,$idOrder) // Hàm này viết ra để add từng món trong giỏ hàng vào bảng 
    // Nếu số lượng lớn hơn 1 sẽ phải dùng vòng lặp để add vào 
     {
       
        $sql = self::$connection->prepare("INSERT INTO `muahang_product`( `IdProduct`, `SoLuong`, `IdOrder`) VALUES (?,?,?)");
        $sql->bind_param("iii",$id_product,$soluong,$idOrder);
     return $sql->execute();//return an object
       
    }

}
