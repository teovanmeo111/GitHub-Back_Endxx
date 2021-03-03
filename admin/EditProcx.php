<?php


require "Model2s/config.php";
require "Model2s/db.php";
require "Model2s/product.php";
require "Model2s/manufacture.php";
require "Model2s/protype.php";
require "sidebar.php";
$manufacture = new Cate;
$protype = new protype;
$product = new Product;

$allManu = $manufacture->Getallcategory();
$allprotype = $protype->Getallprotype();
if(isset($_GET['id']))
{
    $Sanpham=$product->getAllinfobyID($_GET['id']);
}


?>



            <h1>Add New Product</h1>
        </div>
        <div class="container-fluid">
            <hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                            <h5>Product info</h5>
                        </div>
                        <div class="widget-content nopadding">

                            <!-- BEGIN USER FORM -->
                            <form action="EditProc.php" method="post" class="form-horizontal" enctype="multipart/form-data">
                                <div class="control-group">
                                    <label class="control-label">Name :</label>
                                    <div class="controls">
                                        <input type="text" value="<?php echo $Sanpham[0]['name'] ?>"  class="span11" placeholder="Product name" name="name" /> 
                                        <input type="text" hidden value="<?php echo $Sanpham[0]['id'] ?>"  class="span11" placeholder="Product name" name="id" />  *
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Choose a manufacture:</label>
                                    <div class="controls">
                                        <select name="manu_id" id="cate">
                                            <?php foreach ($allManu as $value) { if($value['manu_id']==$Sanpham[0]['manu_id']) {  ?>
                                                <option selected value="<?php echo $value['manu_id'] ?>"><?php echo $value['manu_name'] ?></option>
                                                <?php } else { ?>
                                                <option value="<?php echo $value['manu_id'] ?>"><?php echo $value['manu_name'] ?></option>
                                            <?php  } } ?>
                                           
                                        </select> *
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Choose a product type:</label>
                                    <div class="controls">
                                        <select name="type_id" id="subcate">
                                            <?php foreach ($allprotype as $protypesvalues) { if($value['type_id']==$Sanpham[0]['type_id']) { ?>
                                                <option selected value="<?php echo $protypesvalues['type_id'] ?>"><?php echo $protypesvalues['type_name'] ?></option>
                                                <?php } else { ?>
                                                <option value="<?php echo $protypesvalues['type_id'] ?>"><?php echo $protypesvalues['type_name'] ?></option>

                                            <?php } } ?>
                                            <!-- <option value="2">Tablet</option>

                                            <option value="3">Laptop</option>

                                            <option value="4">Speaker</option> -->

                                        </select> *
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Choose an image :</label>
                                        <div class="controls">
                                            <input type="file" name="fileUpload" id="fileUpload" >
                                                    
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Description</label>
                                        <div class="controls">
                                            <textarea class="span11" placeholder="Description" name="description"><?php echo $Sanpham[0]['description'] ?></textarea>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Price :</label>
                                            <div class="controls">
                                                <input type="text" class="span11" value="<?php echo $Sanpham[0]['price'] ?>" placeholder="price" name="price" /> *
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Feature :</label>
                                            <div class="controls">
                                                <input type="number" class="span11" value="<?php if($Sanpham[0]['feature']==1) echo "1"; else echo 0  ?>" name="feature" min="0" max="1" /> *
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <button type="submit" class="btn btn-success">Edit</button>
                                        </div>
                                    </div>
                            </form>
                            <!-- END USER FORM -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END CONTENT -->
    <!--Footer-part-->
    <div class="row-fluid">
        <div id="footer" class="span12"> 2017 &copy; TDC - Lập trình web 1</div>
    </div>
    <!--end-Footer-part-->
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.ui.custom.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.uniform.js"></script>
    <script src="js/select2.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/matrix.js"></script>
    <script src="js/matrix.tables.js"></script>
</body>

</html>