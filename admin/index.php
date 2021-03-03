<?php
  
   
    require "Model2s/config.php";
    require "Model2s/db.php";
    require "Model2s/product.php";
    require "Model2s/manufacture.php";
    require "sidebar.php";
    $product = new Product;
    $Alldata_products=$product->getAllProduct();
    $manufacture=new Cate;

    
    
   
  // phân trang 
  $pagex=1;
  if(isset($_GET['page']))
  {
    if($_GET['page']>0)
    {
        $pagex=$_GET['page'];
    }
    else
    {
        $pagex=1;
    }
  }
  $perpage=5;
  $total =count($product->getAllProduct());
  $Dataphantrang=$product->Getpaginate($pagex,$perpage);
  $urlpage=$_SERVER['PHP_SELF'];
 
   
?>


            <h1>Manage Products</h1>
        </div>
        <div class="container-fluid">
            <hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"><a href="form.php"> <i class="icon-plus"></i>
                                </a></span>
                            <h5>Products</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Name</th>
                                        <th>Manufactures</th>
                                        <th>Product type</th>
                                        <th>Description</th>
                                        <th>Price (VND)</th>
                                        <th>Feature</th>
                                        <th>Created at</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  foreach($Dataphantrang as $values) {  ?>
                                    <tr class="">
                                        <td width="250"><img
                                                src="../images/<?php echo $values['pro_image']?>"/>
                                               
                                        </td>
                                        <td><?= $values['name']  ?></td>
                                        <td><?php $allmanu=$manufacture->getNameByID($values['id']);    foreach($allmanu as $datamanu ){
                                            echo $datamanu['manu_name'];
                                        }  ?></td>
                                        <td><?php $type_id=$product->getproductype_by_typeid($values['type_id']); foreach($type_id as $type_idx ){
                                           } echo $type_idx['type_name'];  ?></td>
                                        <td><?php echo substr($values['description'],0,100) ?>....</td>
                                        <td><?php echo $values['price']  ?></td>
                                        <td><?php  echo $values['feature'] ?></td>
                                        <td><?php echo $values['created_at'] ?></td>
                                        <td>
                                            <a href="EditProcx.php?id=<?php echo $values['id']?>" class="btn btn-success btn-mini">Edit</a>
                                            <a href="DeleteProc.php?id=<?php echo $values['id']?>" class="btn btn-danger btn-mini">Delete</a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    
                                </tbody>
                            </table>
                            <div class="row" style="margin-left: 18px;">
                                <ul class="pagination">
                                    <?php echo $product->paginate($urlpage,$total,$perpage,$pagex); ?>
                              
                                </ul>
                            </div>
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