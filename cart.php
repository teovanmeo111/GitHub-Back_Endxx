<?php
ob_start();
require "Header.php";

if(!isset($_SESSION['admin']))
{
    header("location:./login/index.php");
}

if(isset($_GET['id']))
{
    $id=$_GET['id'];
    if(!isset($_SESSION['item'][$id]))
    {
        $_SESSION['item'][$id]=1;
    }
    else
    {
        $_SESSION['item'][$id]+=1;    
    }
}

$product=new Product;
$allid=$product->LayhetIDProduct();
$demtam=0;

?>
    <!--/header-->
    <section>
        <section id="cart_items">
            <div class="container">
                <h3>Your shopping cart</h3>
                <div class="table-responsive cart_info">
                    <table class="table table-condensed">
                        <thead>
                            <tr class="cart_menu">
                                <td class="image">Item</td>
                                <td class="description">Name</td>
                                <td class="price">Price</td>
                                <td class="quantity">Quantity</td>
                                <td class="total">Total</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  foreach($allid as $values) {  if(isset($_SESSION['item'][$values['id']]))  { 
                               
                           $dataid=$product->getItem($values['id']);
                               $demtam+=1;
                            
                                ?>
                            <tr>
                                <td class="cart_product">
                                    <a href=""><img src="images/<?php echo $dataid[0]['pro_image']?>" alt=""
                                            width=110></a>
                                </td>
                                <td class="cart_description">
                                    <h4><a href="detail.php?id=<?php echo $dataid[0]['id'] ?>"><?php echo $dataid[0]['name'] ?></a></h4>
                                </td>
                                <td class="cart_price">
                                    <p><?php echo number_format($dataid[0]['price']); ?></p>
                                </td>
                                <td class="cart_quantity">
                                    <div class="cart_quantity_button">
                                        <a class="cart_quantity_up" href="AddCart.php?id=<?php echo $dataid[0]['id'] ?>"> + </a>
                                        <input class="cart_quantity_input" type="text" name="quantity" value="<?php echo $_SESSION['item'][$values['id']]?>"
                                            autocomplete="off" size="2">
                                        <a class="cart_quantity_down" href="SubCart.php?id=<?php echo $dataid[0]['id'] ?>"> - </a>
                                    </div>
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price"><?php echo  number_format($_SESSION['item'][$values['id']]*$dataid[0]['price']) ?></p>
                                </td>
                                <td class="cart_delete">
                                    <a class="cart_quantity_delete" href="DelCart.php?id=<?php echo $values['id'] ?>"><i
                                            class="fa fa-times"></i></a>
                                </td>
                            </tr>
                           <?php } } ?>

                        </tbody>
                    </table>
                    <form id="main-contact-form" class="contact-form row" name="contact-form" method="post"
                        action="?order=ordered">
                        <div class="form-group col-md-6">
                            <input type="text" name="name" class="form-control" placeholder="Name" required >
                        </div>
                        <div class="form-group col-md-6">
                            <input type="email" name="email" class="form-control" placeholder="Email" required >
                        </div>
                        <div class="form-group col-md-12">
                            <input type="text" name="subject" class="form-control" placeholder="Phone number" required > 
                        </div>
                        <div class="form-group col-md-12">
                            <textarea name="message" id="message" class="form-control" rows="3"
                                placeholder="Your Message Here"></textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <a class="btn btn-default update" href="index.php">Continue Buying</a>
                            <a class="btn btn-default check_out" href="DeleteAll.php">Delete All</a>
                            <input type="submit" name="submit" class="btn btn-primary pull-right" value="Order">
                        </div>
                    </form>
                </div>
            </div>
        </section>
        
        <!--/#cart_items-->
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
    <?php ob_flush(); ?>
</body>

</html>