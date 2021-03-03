<?php 

require "Model2s/config.php";
require "Model2s/db.php";
require "Model2s/User.php";

$username=$_POST['Username'];
$user=new User;
$pointer=0;
foreach($user->GetallUsername()  as $CheckUs)
{
  //  echo $CheckUs['UserName'];
    if($username==$CheckUs['UserName'])
    {
        echo "trùng không thêm được";
        $pointer=1;
        // header("location:index.php");
       
        
       
         

    }
}

  if($pointer==0)
  {
    $user->Account_Add($_POST['Username'],md5($_POST['PassWord']),"Nhan Vien");
    echo "Thêm account thành công";
  }
   
  ?>
  <button> <a href="users.php"> Back </a> </button>