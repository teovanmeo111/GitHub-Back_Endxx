<?php
session_start();


if(isset($_GET['id']))
{

    unset($_SESSION['item'][$_GET['id']]);
}
header("location:cart.php");




