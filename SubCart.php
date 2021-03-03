<?php
session_start();

if(isset($_GET['id']))
{
   
    $_SESSION['item'][$_GET['id']]-=1;
    if($_SESSION['item'][$_GET['id']]<=0)
    {
        unset($_SESSION['item'][$_GET['id']]);
    }   
    header("location:cart.php");
}
else
{
    header("location:index.php");
}


