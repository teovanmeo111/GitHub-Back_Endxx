<?php 


require "Model2s/config.php";
require "Model2s/db.php";
require "Model2s/manufacture.php";
$manufacture = new Cate;

if(isset($_POST['id']))
{
    $manufacture->Manu_Edit($_POST['id'],$_POST['name']);
    header("location:../admin/");
}



