<?php require "sidebar.php";
 require "..\admin\Model2s\config.php";
 require "..\admin\Model2s\db.php";
    require "../admin/Model2s/manufacture.php";
    $manufacture = new Cate;
    $allmanau=$manufacture->Getallcategory();
    $id=0;
  

  
?>
            <h1>Manage Manufacture</h1>
        </div>
        <div class="container-fluid">
            <hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"><a href="AddCate.php"> <i class="icon-plus"></i>
                                </a></span> 
                            <h5>Manufacture</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered table-striped">
                              
                                    <?php foreach($allmanau as $value){ $id++; ?>
                                    <tr class="">
                                        <td><?php echo $id ?></td>
                                        <td><?php echo $value['manu_name'] ?></td>

                                        <td>
                                            <a href="EditManu.php?id=<?php echo $value['manu_id']; ?>" class="btn btn-success btn-mini">Edit</a>
                                            <form action="DeleteManu.php"   method="get">
                                            <input type="hidden" name="idmanu" class="btn btn-danger btn-mini" value="<?php echo $value['manu_id']; ?>">
                                                <input type="submit"  class="btn btn-danger btn-mini" value="Delete">
                                                
                                            </form>
                                            
                                        </td>
                                    </tr>
                                    <?php } ?>
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