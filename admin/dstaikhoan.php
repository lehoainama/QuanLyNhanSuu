<?php  
include "includes/database.php";
include "includes/datachucvu.php";

$database = new database();
$db = $database->connect();
$chucvuo = new chucvuo($db);

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Quản lý nhân sự</title>
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

    <div id="wrapper">
        <?php  
            include "header.php";
        ?>
        <!--/. NAV TOP  -->
        <?php  
            include "sidebar.php";
        ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">


                
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Danh sách chức vụ
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <?php  
                                            $result = $chucvuo->read();
                                            $num = $result->rowCount();
                                            if($num>0){
                                                while($rows = $result->fetch()){                             
                                            ?>
                                            <tr>
                                            <th>Mã NV</th>
                                                <th>Tên NV</th>
                                                <th>Mã CV</th>
                                                
                                                <th>Lương Cơ Bản</th>
                                                <th>Lương Tăng Thêm</th>
                                                <th>Phụ Cấp </th>
                                                <th>Lương Thưởng</th>
                                                <th>Số Ngày Làm </th>
                                                <th>Tổng Tiền Lương </th>
												<th>Cập Nhật Thông Tin</th>
                                             
                                            </tr>

                                                        <tr>
                                                        <th> <?php echo $_POST["MaNV"]; ?>!<br /></th>
                                                <th> <?php echo $_POST["TenNV"]; ?>!<br /></th>
                                                <th> <?php echo $_POST["MaCV"]; ?>!<br /></th>
                                            <th> <?php echo $_POST["LuongCoBan"]; ?>!<br /></th>
                                                <th> <?php echo $_POST["LuongTangThem"]; ?>!<br /></th>
                                                <th> <?php echo $_POST["PhuCap"]; ?>!<br /></th>
                                                <th> <?php echo $_POST["LuongThuong"]; ?>!<br /></th>
												<th><?php echo $_POST["SoNgayLam"]; ?>!<br />
                                              
                                                <th> <?php
                                               
                                                    $c = ($LuongCoBan + $LuongTangThem + $PhuCap + $LuongThuong) * $SoNgayLam;
                                                    echo " $c <br/>";
                                                    ?></th>
</th> 
                                            </tr>
                                            
                                        </thead>                                        
                                        <tbody>
                                                                               
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel -->
                    </div>
                </div>
                <!-- /. ROW  -->
                
				<footer><p>&copy;2022</p></footer>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- Morris Chart Js -->
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>


</body>

</html>