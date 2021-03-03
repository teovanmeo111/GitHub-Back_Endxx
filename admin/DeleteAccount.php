<?php 
require "Model2s/config.php";
require "Model2s/db.php";
require "Model2s/User.php";


$user=new User;
if(isset($_POST['UserName']))
{
 $user->Account_Delete($_POST['UserName']);
 echo "Delete Thanh cong";
 header("location:users.php");
}
else
{
    header("location:users.php");
}
