<?php require "sidebar.php";
require "Model2s/config.php";
require "Model2s/db.php";
    require "Model2s/User.php";
    $user= new User;

function ReplaceData($data)
{
    $datax="";
   for($i=0;$i<strlen($data);$i++)
   {
   $data.="*";
   }
   return $datax;
   
}


?>
            <h1>Manage User</h1>
        </div>
        <div class="container-fluid">
            <hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"><a href="AddUser.php"> <i class="icon-plus"></i>
                                </a></span>
                            <h5>User</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>User Id</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($user->GetfullUser()  as $dataAcount) { ?>
                                        
                                    <tr class="">
                                        <td><?php echo $dataAcount['ID'] ?></td>
                                        <td><?php echo $dataAcount['UserName'] ?></td>
                                        <td> ********** <td>
                                        <td><?php echo $dataAcount['Role'] ?></td>
                                        <td>
                                            <a href="EditAccount.php?id=<?php echo $dataAcount['ID'];   ?>" class="btn btn-success btn-mini">Edit</a>
                                            <form action="DeleteAccount.php" method="post">
                                            <input type="hidden" class="btn btn-danger btn-mini" name="UserName" value="<?php echo $dataAcount['UserName'] ?>">
                                                <input type="submit" class="btn btn-danger btn-mini" value="Delete">
                                                
                                            </form>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    <!-- <tr class="">
                                        <td>3</td>
                                        <td>guest</td>
                                        <td>*****</td>
                                        <td>editor</td>
                                        <td>
                                            <a href="edit.html" class="btn btn-success btn-mini">Edit</a>
                                            <form action="" method="">
                                                <input type="submit" class="btn btn-danger btn-mini" value="Delete">
                                            </form>
                                        </td>
                                    </tr> -->
                                </tbody>
                            </table>
                            <div class="row" style="margin-left: 18px;">
                                <ul class="pagination">
                                    <li class="active">1</li>
                                    <li>2</li>
                                    <li>3</li>
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