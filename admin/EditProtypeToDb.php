<?php


require "..\admin\Model2s\config.php";
require "..\admin\Model2s\db.php";
require "..\admin\Model2s\protype.php";

$protype = new protype;
if(isset($_POST['id']) && isset($_POST['name']))
{
    $protype->Edit($_POST['id'],$_POST['name']);
    echo "Sửa thành công";

}

?> 
  <button>  <a href="index.php"> Back   </a> </button>
