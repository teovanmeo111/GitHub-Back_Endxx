<?php require "Header.php" ;
    $product=new Product;
    if(isset($_GET['key']))
    {
        
      $datatheokey=$product->getdatatheokey($_GET['key']);
     
      if(count($datatheokey)>0)

      {
          $idx=$datatheokey[0]['id'];
        $sanphamlq=$product->LaySanPhamLienQuan($datatheokey[0]['type_id']);
      }
     
    }
 



?>


    <!--/header-->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="features_items">
                        <!--features_items-->
                        <h2 class="title text-center">Search Result</h2>
                        <?php  foreach($datatheokey as $value)
                        {

                        ?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center"> <img
                                            src="images/<?php echo $value['pro_image'] ?>" alt="" />
                                        <h2><?php echo $value['price'] ?></h2>
                                        <p><?php echo $value['name'] ?></p>
                                        <a href="cart.php?id=<?php echo $value['id'] ?>" class="btn btn-default add-to-cart"><i
                                                class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <h2><?php echo $value['price'] ?></h2>
                                            <p><a href="detail.php?id=<?php echo $value['id'] ?>"><?php echo $value['name'] ?></a></p>
                                            <a href="cart.php?id=<?php echo $value['id'] ?>" class="btn btn-default add-to-cart"><i
                                                    class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>

                        <div style="display: block;"> </div>
                            <?php if(count($datatheokey)>0)
                            {

                            ?>

                        <h2 style="text-align: center;" >Các sản phẩm liên quan</h2>
                <?php 
                            foreach($sanphamlq as $value) {
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
                        <?php } }}?>
                        <ul class="pagination col-sm-12">