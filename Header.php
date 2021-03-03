


<?php
session_start();
require "config.php";
require "models/db.php";
require "models/product.php";
require "models/manufacture.php";



$Cate= new Cate;
$alldata = $Cate->Getallcategory();
$dataNhap;
$id;
if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $dataNhap=$Cate->getItem($id);
}


?>

<!DOCTYPE html>
<html lang="en">
<!-- khuc nay code css -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Điện thoại thông minh </title>
    <link rel="icon" href="./images/logo.ico" type="image/icon type">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head>
<!--/head-->

<body>
    <div class="header-bottom">
        <!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span
                                class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
                        </button>
                        <div class="logo"> <a href="index.php"><img src="./images/logo.ico" alt="" /></a> </div>
                    </div>
                    <div class="mainmenu pull-right">
                        <ul class="nav navbar-nav collapse navbar-collapse Login-out ">
                            <li><a href="index.php" class="active">Home</a></li>
                            <li class="dropdown"><a href="index.php">Products<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <?php foreach($alldata as $value)
                                    {

                                     ?>
                                    <li><a href="cate.php?id=<?php echo $value['manu_id']?>"><?php echo $value['manu_name']  ?></a></li>
                                    <?php } ?>
                                  
                                </ul>
                            </li>
                            <li class="dropdown"><a href="index.php">Blog<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="index.php">Blog List</a></li>
                                    <li><a href="index.php">Blog Single</a></li>
                                </ul>
                            </li>
                            <li><a href="index.php">Contact</a></li>
                            <?php if(isset($_SESSION['admin'])){?>
                            <li><a href="cart.php">Cart</a></li>
                            <?php } ?>
                            <?php if(isset($_SESSION['admin'])){?>
                          
                            <li  ><a class="Login-out"  href="Logout.php">Logout</a></li>
                            <?php } else{  ?>
                                <li  ><a class="Login-out"  href="./login/index.php">Đăng nhập </a></li>
                                <?php } ?>
                        </ul>
                        <div class="search_box pull-right">
                            <form action="result.php" method="get">
                                <input type="text" placeholder="Search" name="key" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/header-bottom-->
    </header>