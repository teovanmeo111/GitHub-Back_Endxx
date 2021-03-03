<!DOCTYPE html>
<html lang="en">
<?php
 require "Header.php";
$product = new Product;



if (isset($_GET['id'])) {
   
    $item = $product->getAllinfobyID($_GET['id']);
}
$perPage = 3; 
// hiển thị 5 sản phẩm trên 1 trang
if (isset($_GET['page'])){
    $page = $_GET['page']; 
} else {
    $page = 1;
}
$sanphamlq =$product->LaySanPhamLienQuan($item[0]['type_id']);
$paginateSPLienQuan=$product->Getpaginate_Detail($page,$perPage,$item[0]['type_id']);   
$idx=$item[0]['id'];
$url=$_SERVER['PHP_SELF'];


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
                            <?php foreach($alldata as $value) { ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                <h4 class="panel-title"><a href="cate.php?id=<?php echo $value['manu_id']  ?>"><?php echo $value['manu_name']  ?></a></h4>
                                </div>
                             
                            </div>
                            <?php } ?>
                           
                        </div>
                    </div>
                </div>
                <?php
                    foreach($item as $value){
                ?>
                <div class="col-sm-9 padding-right">
                    <div class="product-details">
                        <!--product-details-->
                        <div class="col-sm-5">
                            <div class="view-product">

                                <img src="images/<?php echo $value['pro_image']?>"
                                    alt="" />
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="product-information">
                                <!--/product-information-->
                                <h2><?php echo $value['name']?></h2>
                                <span>
                                    <span><?php echo $value['price']?> VND</span>
                                   
                                </span>
                                <p><b>Availability:Ready</b> In Stock</p>
                                <p><b>Condition:Ready</p>
                                <p><b>Brand: <?php echo $value['manu_name'] ?> </p>
                            </div>
                            <!--/product-information-->
                        </div>
                    </div>
                    <!--/product-details-->
                    <!--features_items-->
                </div>
                <?php } ?>
                <h2 style="text-align: center;" >Các sản phẩm liên quan</h2>
                <?php 
                            foreach($paginateSPLienQuan as $value) {
                                if($value['id']!=$idx){
                        ?> 
                        <div class="col-sm-4">
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
                        <?php } }?>

    
            </div>
    </section>
    <footer id="footer">
        <!--Footer-->                    <div class="paginate">
        <?php $product->paginate($url, count($sanphamlq), 3);?>
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