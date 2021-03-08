<?php
require "Model2s/config.php";
require "Model2s/db.php";
require "Model2s/User.php";
require "sidebar.php";

    
?>



            <h1>Add New User</h1>
        </div>
        <div class="container-fluid">
            <hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                            <h5>User info</h5>
                        </div>
                        <div class="widget-content nopadding">

                            <!-- BEGIN USER FORM -->
                            <form action="AdduserToDb.php"  method="post" class="form-horizontal" enctype="multipart/form-data">
                                <div class="control-group">
                                    <label class="control-label">User Name :</label>
                                    <div class="controls">
                                        <input type="text" class="span11" placeholder="username" name="Username" required /> *
                                       
                                    </div>

                                    <label class="control-label">PassWord:</label>
                                    <div class="controls">
                                        <input type="password" class="span11" placeholder="Password" name="PassWord" required /> *
                                       
                                    </div>
                                    <!-- Mấy dòng mới add vào này t chưa sửa cái name để cho nhận dữ liệu .. Mai t3 9/3 t sửa h add lên trước -->
                                    <label class="control-label">Name:</label>
                                    <div class="controls">
                                        <input type="text" class="span11" placeholder="username" name="Username" required /> *
                                       
                                    </div>
                                   
                                    <label class="control-label">Number Phone:</label>
                                    <div class="controls">
                                        <input type="text" class="span11" placeholder="username" name="Username" required /> *
                                       
                                    </div>

                                    <label class="control-label">Email</label>
                                    <div class="controls">
                                        <input type="text" class="span11" placeholder="username" name="Username" required /> *
                                       
                                    </div>

                                    <label class="control-label">Role</label>
                                    <div class="controls">
                                    <select name="Role" id="cate" required >
                                         <option value="Nhan Vien" > Nhan Vien </option>
                                         <option value="Khach Hang" > Khach Hang </option>
                                         </select>
                                       
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