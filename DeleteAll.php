<?php
session_start();

// session_destroy();
require "config.php";
require "Models/db.php";
require "Models/product.php";
$product=new Product;
foreach($product->LayhetIDProduct() as $id)
{
    echo $id['id'];
    unset( $_SESSION['item'][$id['id']]);
}


header("location:cart.php");


