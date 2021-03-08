<?php 


  require "../admin/Model2s/config.php";
  require "../admin/Model2s/db.php";
  require "../admin/Model2s/User.php";

  $user= new User;
  $check=true;
    if(isset($_POST['username']))
    {
		
        $UsernameAll=$user->GetallUsername();
       
       foreach($UsernameAll as $value)
       {
           if($value['UserName']==$_POST['username'])
           {
               echo '<script language="javascript">'; echo 'alert("Vui lòng chọn tên khác vì tên này đã có người sử dụng")' ; echo '</script>'; 
				$check=false;
			   break;
           }
	   }
	   if($check==true)
	   {
		$user->Account_Add($_POST['username'],md5($_POST['Password']),"Viewer");
		echo '<script language="javascript">'; echo 'alert("Dăng ký thành công	")' ; echo '</script>'; 
		
	   }
    }
	

?>



<!DOCTYPE html>
<html lang="en">
<head>
<title>Login</title>

<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Space Login Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>



<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />



<link href="//fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext,vietnamese" rel="stylesheet">


</head>
<body>
	<!-- main -->
	<div class="main">
		<div class="main-w3l">
			<h1 class="logo-w3">Sign up form</h1>
			<div class="w3layouts-main">
				<h2><span>Sign Up</span></h2>
				
				
					<form  method="post">
						<input placeholder="Username " name="username" type="text" required>
						<input placeholder="Password" name="Password" type="password" required>
						<input placeholder="Email" name="Email" type="Email" required>
						<input placeholder="PhoneNumber" name="Phone" type="text" required>
						<input placeholder="Name" name="Name" type="text" required>
						<input type="submit" value="Sign Up" name="login">
					</form>
					
			</div>
			<!-- //main -->
			
			<!--footer-->
			<div class="footer-w3l">
			
			</div>
			<!--//footer-->
		</div>
	</div>

</body>
</html>
