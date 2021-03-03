<?php
 require "Header.php";
$Cate= new Cate;
$alldata = $Cate->Getallcategory();
$dataNhap;
$id;
$page;
$perpage=3;
if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $dataNhap=$Cate->getItem($id);
}
if(isset($_GET['page']))
{
    $page=$_GET['page'];
}
else
{
    $page=1;
}
    $total=count($Cate->GetSpTheoId($id));
$url=$url = $_SERVER['PHP_SELF'];
$datatheocatepaginate=$Cate->GetSpTheoIdpaginate($id,$page,$perpage);

?>

<!DOCTYPE html>
<html lang="en">


<!--/head-->

<body>
 
    <!--/header-->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Category</h2>
                        <div class="panel-group category-products" id="accordian">
                            <!--category-productsr-->
                            <?php foreach($alldata as $value ) 
                            {

                            
                            ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="cate.php?id=<?php echo $value['manu_id']  ?>"><?php echo $value['manu_name']  ?></a></h4>
                                </div>
                            </div>
                            <?php }  ?>
                           
                        </div>
                    </div>
                </div>
                <div class="col-sm-9 padding-right">
                    <div class="features_items">
                        <!--features_items-->
                        <?php 

                            foreach ($dataNhap as $value)
                            {

                                //var_dump($value);
                            ?>
                           <h2 class="title text-center"><?php echo $value['manu_name']  ?></h2>
                        
                            <?php  } ?>
                     
                        <?php
                        //var_dump($datatheocate);
                        foreach($datatheocatepaginate as $value) 
                        {
                            
                       ?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                              
                                <div class="single-products">
                                    <div class="productinfo text-center"> <img
                                            src="images/<?php echo $value['pro_image'];  ?>" alt="" />
                                        <h2> <?php echo $value['price'] ?> </h2>
                                        <p><?php echo $value['name']  ?></p>
                                        <a href="cart.php?id=<?php echo $value['id'] ?>" class="btn btn-default add-to-cart"><i
                                                class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <h2></h2>
                                            <p><a href="detail.php?id=<?php echo $value['id'] ?>"><?php echo $value['name']  ?></a></p>
                                            <a href="cart.php?id=<?php echo $value['id'] ?>" class="btn btn-default add-to-cart"><i
                                                    class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                       
                        <ul class="pagination col-sm-12">
                            <?php echo $Cate->paginate($id,$url,$total,$perpage); ?>