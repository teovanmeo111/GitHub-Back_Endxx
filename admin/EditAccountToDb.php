<?php 

require "Model2s/config.php";
require "Model2s/db.php";
require "Model2s/User.php";
$user=new User;
if(isset($_POST['id']) )
{
    $user->Account_Edit($_POST['id'],md5($_POST['Password']),$_POST['Role']);
    echo "Sua account thanh cong";
}
else
{
    header("location:users.php");
}



?>