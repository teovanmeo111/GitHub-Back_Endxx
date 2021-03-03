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
$pointErr=0;

if(isset($_POST['name']))
{
    $file= $_FILES['fileUpload'];




    $name=$_POST['name'];
    $manu_id=$_POST['manu_id'];
    $type_id=$_POST['type_id'];
    
    $pro_image= $file['name'];
    
    $desc=$_POST['description'];
    $price=$_POST['price'];
    $feauture=$_POST['feature'];
    
      
    
    // work with files
    
    $file_type=$file['type'];
    $file_size=$file['size'];
    
        if($file_type != "image/jpg" && $file_type != "image/png" && $file_type != "image/jpeg"
        && $file_type != "image/gif" ) {
            $errors[]= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $pointErr=1;
        }
         
        if($file_size > 20971520) {
           $errors[]='Kích thước file không được lớn hơn 20MB';
           $pointErr=1;
        }
    
         if($pointErr==0)
         {
            $product->Product_Add($name,$manu_id,$type_id,$price,$pro_image,$desc,$feauture);
            move_uploaded_file($file['tmp_name'],"../images/".$file['name']);
            echo '<script> alert("Thêm thành công") </script>';
            
         }
         else if($pointErr==1)
         {
             echo '<script> alert("Có lỗi không thêm được") </script>';
         }
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
                            <form  method="post" class="form-horizontal" enctype="multipart/form-data">
                                <div class="control-group">
                                    <label class="control-label">Name :</label>
                                    <div class="controls">
                                        <input type="text" class="span11" placeholder="Product name" name="name" required /> *
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Choose a manufacture:</label>
                                    <div class="controls">
                                        <select name="manu_id" id="cate" required >
                                            <?php foreach ($allManu as $value) { ?>
                                                <option value="<?php echo $value['manu_id'] ?>"><?php echo $value['manu_name'] ?></option>
                                            <?php } ?>
                                            <!-- <option value="2">Microsoft</option>

                                            <option value="3">Sony</option>

                                            <option value="4">SamSung</option>

                                            <option value="5">Oppo</option> -->
                                        </select> *
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Choose a product type:</label>
                                    <div class="controls">
                                        <select name="type_id" id="subcate" required >
                                            <?php foreach ($allprotype as $protypesvalues) { ?>
                                                <option value="<?php echo $protypesvalues['type_id'] ?>"><?php echo $protypesvalues['type_name'] ?></option>
                                            <?php } ?>
                                            <!-- <option value="2">Tablet</option>

                                            <option value="3">Laptop</option>

                                            <option value="4">Speaker</option> -->

                                        </select> *
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Choose an image :</label>
                                        <div class="controls">
                                            <input type="file" name="fileUpload" id="fileUpload" required>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Description</label>
                                        <div class="controls">
                                            <textarea class="span11" placeholder="Description" name="description" required ></textarea>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Price :</label>
                                            <div class="controls">
                                                <input type="text" class="span11" placeholder="price" name="price" required /> *
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Feature :</label>
                                            <div class="controls">
                                                <input type="number" class="span11" name="feature" min="0" max="1" /> *
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <button type="submit" class="btn btn-success">Add</button>
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