<?php 
    require "Model2s/config.php";
    require "Model2s/db.php";
    require "Model2s/product.php";
    $product = new Product;
if(isset($_GET['id']))
{
    $product->DeleteProc($_GET['id']);
}
header("location:../admin/");

