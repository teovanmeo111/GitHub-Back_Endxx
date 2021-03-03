<?php 
require "config.php";
require "models/db.php";
require "models/product.php";
    session_start();
    unset($_SESSION['admin']);
    
    $product=new Product;
    $FullIdProduct=$product->LayhetIDProduct();
    foreach($FullIdProduct as $values)
    {
        if(isset( $_SESSION['item'][$values['id']]))
        {

            unset( $_SESSION['item'][$values['id']]);
        }
    }
    
    header("location:index.php");