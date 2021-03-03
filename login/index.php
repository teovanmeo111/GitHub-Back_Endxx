<?php 
	session_start();

  require "../admin/Model2s/config.php";
  require "../admin/Model2s/db.php";
  require "../admin/Model2s/User.php";

  $user= new User;
	if(isset($_POST['username']) &&  isset($_POST['Password']))
	{
		$password=md5($_POST['Password']);
		$dangnhap=$user->CheckDangNhap($_POST['username'],$password);
		if(count($dangnhap)>0)
		{
			
			$_SESSION['admin']=$dangnhap[0]['Role'];
			if($_SESSION['admin']=='admin'|| $_SESSION['admin']=='Nhan Vien' )
			{
				header("location:../admin/");
			}
			else
			{
				header("location:../index.php");
			}
			
		}
		else
		{
			echo "<script> alert('Sai mật khẩu hoặc tài khoản') </script>";
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
			<h1 class="logo-w3">Space Login Form</h1>
			<div class="w3layouts-main">
				<h2><span>Login now</span></h2>
				
				
					<form  method="post">
						<input placeholder="Username " name="username" type="text" required="">
						<input placeholder="Password" name="Password" type="password" required="">
						<input type="submit" value="Get Started" name="login">
					</form>
					<h6><a href="Dangky.php">Create a Account</a></h6>
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
