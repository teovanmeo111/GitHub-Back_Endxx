<?php


require "Model2s/config.php";
require "Model2s/db.php";
require "Model2s/protype.php";


$protype = new protype;

if(isset($_POST['id']))
{
    if(count($protype->CheckThamChieu($_POST['id']))==0)
    {
        $protype->Delete($_POST['id']);
        echo "asdasdas";
        echo " <script> alert('Xóa  thành công ') </script>"; 
    }
   else
   {
       echo "<script> alert('Xóa không thành công ') </script>"; 
   }
}    
    header("location:../admin/protypes.php");
