<?php


require "Model2s/config.php";
require "Model2s/db.php";
require "Model2s/manufacture.php";



$manufacture = new Cate;
echo $_GET['idmanu'];
if(isset($_GET['idmanu']))
{
  if(count($manufacture->GetSpTheoId($_GET['idmanu']))==0)
  {
    $manufacture->Manu_Delete($_GET['idmanu']);
   
  }
  else
  {
    echo "<script> alert('không xóa được ') </script>";
   
  }
    
    
    
}
header("location:../admin/");

   

