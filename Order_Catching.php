<?php 
session_start();
require "config.php";
require "models/db.php";
require "models/product.php";
require "models/Order.php";
if(!isset($_SESSION['item']))
{
    header("location:index.php"); 
}
else
{
    $product=new Product;
    $Order=new Order;
    $Order->Create_Order($_SESSION['admin']['id'],$_POST['message']);// tạo 1 Id order
    


    $allid=$product->LayhetIDProduct();
     foreach($allid as $values)
      {  if(isset($_SESSION['item'][$values['id']]))  { 

        unset($_SESSION['item'][$values['id']]);


      }
    }
         
             
}



header("location:index.php");

