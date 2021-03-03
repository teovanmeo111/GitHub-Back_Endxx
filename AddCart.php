<?php
session_start();

if(isset($_GET['id']))
{
    echo $_GET['id'];
    $_SESSION['item'][$_GET['id']]+=1;   
    header("location:cart.php");
}
else
{
    header("location:index.php");
}


