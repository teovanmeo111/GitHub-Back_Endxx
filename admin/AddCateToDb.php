<?php 
require "Model2s/config.php";
require "Model2s/db.php";

require "Model2s/manufacture.php";

$manufacture = new Cate;
if(isset($_POST['CateName']))
{
    $manufacture->Manu_Add($_POST['CateName']);
}
header("location:../admin/");

