<!DOCTYPE html>
<html lang="en">
<?php
 require "Header.php";  
// products
$product = new Product;

$newItem = $product->getThreeNewFeedProducts();
$featureItem = $product->getAllFeatureProducts();
// category
$Cate= new Cate;
$alldata = $Cate->Getallcategory();
$dataNhap;
$id;
$datatheocate;
if(isset($_GET['id']))
{
    $dataNhap=$Cate->getItem($id);
    $datatheocate=$Cate->GetSpTheoId($_GET['id']);
}


$perPage = 3; 
// hiển thị 5 sản phẩm trên 1 trang
if (isset($_GET['page'])){
    $page = $_GET['page']; 
} else {
    $page = 1;
}
//$getFeatureItems = $product->getFeatureProducts($page, $perPage);
$Phantrangindex=$product->Getpaginate($page, $perPage);

// Lấy số trang trên thanh địa chỉ 
$total = Count($product->getAllProduct());
// Tính tổng số dòng, ví dụ kết quả là 18 
$url = $_SERVER['PHP_SELF'];
// lấy đường dẫn đến file hiện hành 

?>

    <!--/header-->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Category</h2>
                        <div class="panel-group category-products" id="accordian">
                            <!--category-productsr-->
                            <div class="panel panel-default">
                                <?php foreach($alldata as $value) { ?>
                                <div class="panel-heading">
                                    <!-- <h4 class="panel-title"><a href="cate.php?id=<?php // echo $value['manu_id']?>"><?php // echo $value['manu_name']?></a></h4> -->
                                    <h4 class="panel-title"><a href="cate.php?id=<?php echo $value['manu_id']  ?>"><?php echo $value['manu_name']  ?></a></h4>
                                </div>
                                <?php } ?>
                            </div>
                            
                        
                        </div>
                    </div>
                </div>
                <div class="col-sm-9 padding-right">
                    <div class="features_items">
                        <!--features_items-->
                        <h2 class="title text-center">Features Items</h2>
                        <?php 
                            foreach($Phantrangindex as $value) {
                        ?> 
                        <div class="col-sm-4 my-auto">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center"> <img
                                            src="images/<?php echo $value['pro_image']?>" alt="" />
                                        <h2><?php echo $value['price']?></h2>
                                        <p><?php echo $value['name'] ?></p>
                                        <a href="cart.php?id=<?php echo $value['id'] ?>" class="btn btn-default add-to-cart"><i
                                                class="fa fa-shopping-cart"></i>Add to
                                            cart</a>
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <h2><?php echo $value['price']?></h2>
                                            <p><a href="detail.php?id=<?php echo $value['id']?>"><?php echo $value['name']?></a></p>
                                            <a href="cart.php?id=<?php echo $value['id'] ?>" class="btn btn-default add-to-cart"><i
                                                    class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php }?>
                        <div style="text-align:center" class="mx-auto">
        <?= $product->paginate($url, $total, $perPage)?>
    </div> 
                    </div>
                    <!--features_items-->
                </div>
            </div>
    </section>
   
    <footer id="footer">
        <!--Footer-->

        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
                    <p class="pull-right">Designed by <span><a target="_blank"
                                href="http://www.themeum.com">Themeum</a></span></p>
                </div>
            </div>
        </div>
    </footer>
    <!--/Footer-->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>

</html>