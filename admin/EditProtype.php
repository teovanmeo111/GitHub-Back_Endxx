<?php


require "Model2s/config.php";
require "Model2s/db.php";
require "Model2s/protype.php";



$protype = new protype;


if(isset($_GET['id']))
{
    require "sidebar.php";
    $protypeitem=$protype->getItem($_GET['id']);
    
}
else
{
    header("location:protypes.php");
}





?>



            <h1>Edit Protype</h1>
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
                            <form action="EditProtypeToDb.php" method="post" class="form-horizontal" enctype="multipart/form-data">
                                <div class="control-group">
                                    <label class="control-label">Name :</label>
                                    <div class="controls">
                                        <input type="text" value="<?php echo $protypeitem[0]['type_name'] ?>"  class="span11" placeholder=" name" name="name" /> 
                                        <input type="hidden"  value="<?php echo $protypeitem[0]['type_id'] ?>"  class="span11" placeholder="Product name" name="id" />  *
                                    </div>
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