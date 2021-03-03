<?php 
require "Model2s/config.php";
require "Model2s/db.php";
require "Model2s/product.php";
require "Model2s/manufacture.php";
require "Model2s/protype.php";


$Prortype = new protype ;
if(isset($_POST['name']))
{
    $Prortype->Add($_POST['name']);
}
header("location:../admin/");

