<?php


require "Model2s/config.php";
require "Model2s/db.php";
require "Model2s/User.php";
require "sidebar.php";



$user=new User;

if(isset($_GET['id']))
{
  $dataAccountx=$user->LayttAccountx($_GET['id']);
  
}






?>



            <h1>Edit Accout</h1>
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
                            <form action="EditAccountToDb.php" method="post" class="form-horizontal" enctype="multipart/form-data">
                                <div class="control-group">
                                    <label class="control-label">UserName : </label>
                                    <div class="controls">
                                    <?php echo $dataAccountx[0]['UserName'] ?>
                                        <input type="hidden"  value="<?php echo $dataAccountx[0]['ID'] ?>"  class="span11" placeholder="Product name" name="id" />  
                                    </div>
                                    <label class="control-label">PassWord : </label>
                                    <div class="controls">
                                   
                                        <input type="password" value="<?php echo $dataAccountx[0]['PassWord']  ?>"  class="span11" placeholder="Password Change" name="Password" /> 
                                      
                                    </div>
                                    <label class="control-label">Role : </label>
                                    <div class="controls"> 
                                   
                                        <input type="text" value="<?php echo $dataAccountx[0]['Role'] ?>"  class="span11" placeholder=" name" name="Role" /> 
                                      
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