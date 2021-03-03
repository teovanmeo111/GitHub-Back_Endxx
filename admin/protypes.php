<?php require "sidebar.php";
     require "..\admin\Model2s\config.php";
     require "..\admin\Model2s\db.php";
     require "..\admin\Model2s\protype.php";
     $protype = new protype;
     $allprotype = $protype->Getallprotype();
    $idx=0;

?>
            <h1>Manage Protype</h1>
        </div>
        <div class="container-fluid">
            <hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"><a href="AddProtype.php"> <i class="icon-plus"></i>
                                </a></span>
                            <h5>Protype</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Protype Id</th>
                                        <th>Protype  Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <?php foreach($allprotype as $value) { $idx++; ?>
                                <tbody>
                                    <tr class="">
                                        <td><?php echo $idx; ?></td>
                                        <td><?php echo $value['type_name']; ?></td>

                                        <td>
                                            <a href="EditProtype.php?id=<?php echo $value['type_id'] ?>" class="btn btn-success btn-mini">Edit</a>
                                            <form action="DeleteProtype.php" method="post">
                                             <input type="hidden" class="btn btn-danger btn-mini" name="id" value="<?php echo $value['type_id'] ?>">
                                                <input type="submit" class="btn btn-danger btn-mini" value="Delete">
                                            </form>
                                        </td>
                                    </tr>
                                   
                                </tbody>
                                <?php } ?>
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