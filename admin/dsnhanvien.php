<?php  
include "includes/database.php";
include "includes/datanhanvien.php";

$database = new database();
$db = $database->connect();
$nhanvieno = new nhanvieno($db);

if($_SERVER['REQUEST_METHOD']=='POST'){

    // Create employee
    if($_POST['form_name']=='add_employee'){
        $v_MaNV = $_POST['MaNV'];
        $v_TenNV = $_POST['TenNV'];
        $d_NgaySinh = $_POST['NgaySinh'];
        $v_DiaChi = $_POST['DiaChi'];
		$v_DienThoai = $_POST['DienThoai'];
        $v_TinhTP = $_POST['TinhTP'];
		$v_CCCD = $_POST['CCCD'];
		$v_TTHonNhan = $_POST['TTHonNhan'];
        $v_MaBH = $_POST['MaBH'];

       
		$v_GioiTinh = $_POST['GioiTinh'];
        $v_NgayVaoLam = $_POST['NgayVaoLam'];
		$v_TrinhDo = $_POST['TrinhDo'];
		$v_TinhTrangLamViec = $_POST['TinhTrangLamViec'];
        $v_GhiChu = $_POST['GhiChu'];

		
		

        // Bind Params
        $nhanvieno->MaNV = $v_MaNV;
        $nhanvieno->TenNV = $v_TenNV;
        $nhanvieno->NgaySinh = $d_NgaySinh;
        $nhanvieno->DiaChi = $v_DiaChi;
		$nhanvieno->DienThoai = $v_DienThoai;
        $nhanvieno->TinhTP = $v_TinhTP;
		$nhanvieno->CCCD = $v_CCCD;
		$nhanvieno->TTHonNhan = $v_TTHonNhan;
        $nhanvieno->MaBH = $v_MaBH;

      
		$nhanvieno->GioiTinh = $v_GioiTinh;
        $nhanvieno->NgayVaoLam = $v_NgayVaoLam;
		$nhanvieno->TrinhDo = $v_TrinhDo;
		$nhanvieno->TinhTrangLamViec = $v_TinhTrangLamViec;
        $nhanvieno->GhiChu = $v_GhiChu;

        $nhanvieno->d_date_created = date("Y/m/d",time());
        $nhanvieno->d_time_created = date("h:i:s",time());

      if($nhanvieno->create()){
         $flag = "Create employee successful!";      
	  }
	
        
    }

    // Update empoyee
    if($_POST['form_name']=='edit_employee'){
        $v_MaNV = $_POST['vMaNV'];
        $v_TenNV = $_POST['TenNV'];
        $d_NgaySinh = $_POST['NgaySinh'];
        $v_DiaChi = $_POST['DiaChi'];
		$v_DienThoai = $_POST['DienThoai'];
        $v_TinhTP = $_POST['TinhTP'];
		$v_CCCD = $_POST['CCCD'];
        $v_TTHonNhan = $_POST['TTHonNhan'];
        $v_MaBH = $_POST['MaBH'];
        

        
		$v_GioiTinh = $_POST['GioiTinh'];
        $v_NgayVaoLam = $_POST['NgayVaoLam'];
		$v_TrinhDo = $_POST['TrinhDo'];
		$v_TinhTrangLamViec = $_POST['TinhTrangLamViec'];
        $v_GhiChu = $_POST['GhiChu'];

       // $id = $_POST['nhanvien_id'];

        // Bind Params
        
        $nhanvieno->MaNV = $v_MaNV;
        $nhanvieno->TenNV = $v_TenNV;
        $nhanvieno->NgaySinh = $d_NgaySinh;
        $nhanvieno->DiaChi = $v_DiaChi;
		$nhanvieno->DienThoai = $v_DienThoai;
        $nhanvieno->TinhTP = $v_TinhTP;
		$nhanvieno->CCCD = $v_CCCD;
        $nhanvieno->TTHonNhan = $v_TTHonNhan;
        $nhanvieno->MaBH = $v_MaBH;


        
		$nhanvieno->GioiTinh = $v_GioiTinh;
        $nhanvieno->NgayVaoLam = $v_NgayVaoLam;
		$nhanvieno->TrinhDo = $v_TrinhDo;
		$nhanvieno->TinhTrangLamViec = $v_TinhTrangLamViec;
        $nhanvieno->GhiChu = $v_GhiChu;


        $nhanvieno->d_date_created = date("Y/m/d",time());
        $nhanvieno->d_time_created = date("h:i:s",time());
        if($nhanvieno->update()){
            $flag = "Edit employee successful!";
        }
        
    }

    // Delete employee
    if($_POST['form_name']=='delete_employee'){
        $id = $_POST['nhanvien_id'];

        // Bind Params
        $nhanvieno->MaNV = $id;
        if($nhanvieno->delete()){
            $flag = "Delete employee successful!";
        }
        
        
    }


}
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

<body>
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


                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Thông tin Nhân viên
                        </h1>
                    </div>
                </div>
                <!-- /. ROW  -->

                <?php 
                    if(isset($flag)){

                ?>
                    <div class="alert alert-success">
                        <strong><?php echo $flag ?></strong>
                    </div>                        
                <?php 
                    }
                ?>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                          Thêm Nhân viên
                            </div>
                            <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" method="POST" action="">
                                       
                                        <div class="form-group">
                                            <label>Mã NV</label>
                                            <input name="MaNV" class="form-control" value="<?php echo $nhanvieno->readMaNV()?>">
											
                                        </div>

                                        <div class="form-group">
                                            <label>Tên Nhân viên</label>
                                            <input name="TenNV" class="form-control" placeholder="Nhập Tên NV">
                                        </div>

                                        <div class="form-group">
                                            <label>Ngày Sinh</label>
                                            <input name="NgaySinh" class="form-control" placeholder="0000/00/00">
                                        </div>

                                        <div class="form-group">
                                            <label>Địa chỉ</label>
                                            <input name="DiaChi" class="form-control" placeholder="Nhập địa chỉ">
                                        </div>
										<div class="form-group">
                                            <label>Điện Thoại</label>
                                            <input name="DienThoai" class="form-control" placeholder="Nhập điện thoại">
                                        </div>
                                        <div class="form-group">
                                            <label>Tỉnh TP</label>
                                            <input name="TinhTP" class="form-control" placeholder="Nhập tỉnh hoặc thành phố">
                                        </div>
                                        <div class="form-group">
                                            <label>CCCD</label>
                                            <input name="CCCD" class="form-control" placeholder="Nhập số căn cước công dân">
                                        </div>
                                        <div class="form-group">
                                            <label>TTHonNhan</label>
                                            <input name="TTHonNhan" class="form-control" placeholder="Nhập Tình Trạng Hôn Nhân">
                                        </div>
                                        <div class="form-group">
                                            <label>Mã BH</label>
                                            <input name="MaBH" class="form-control" placeholder="Nhập mã bảo hiểm">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Giới Tính</label>
                                            <input name="GioiTinh" class="form-control" placeholder="Giới Tính">
                                        </div>
                                        <div class="form-group">
                                            <label>Ngày Vào Làm</label>
                                            <input name="NgayVaoLam" class="form-control" placeholder="0000/00/00">
                                        </div>
                                        <div class="form-group">
                                            <label>Trình Độ</label>
                                            <input name="TrinhDo" class="form-control" placeholder="../..">
                                        </div>
                                        <div class="form-group">
                                            <label>Tình Trạng Làm Việc</label>
                                            <input name="TinhTrangLamViec" class="form-control" placeholder="Nhập tình trạng làm việc">
                                        </div>
                                        <div class="form-group">
                                            <label>Ghi Chú</label>
                                            <input name="GhiChu" class="form-control" placeholder="Nhập ghi chú">
                                        </div>

                                        
                                        

                                        <input type="hidden" name="form_name" value="add_employee">         
                                        <button type="submit" class="btn btn-default">Thêm nhân viên mới</button>
                                        <br></br>
                                        <div class="color">
                                        <button style="background-color:#1860F1;color:#F2F3F5" type="submit" class="btn btn-default" href="" onclick="window.print();return false;"><i class="fa fa-print"></i> In Dữ Liệu</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                
                            </div>
                            <!-- /.row (nested) -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                </div>
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-lg-15">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Danh sách nhân viên
                            </div>
                            <?php
$conn = mysqli_connect("localhost","root","","quanlynhansu");
if(isset($_POST["form_name"])&& !empty ($_POST["form_name"]))
{
    $key = $_POST["form_name"];
    $sql = "SELECT * FROM nhanvien WHERE MaNV LIKE '%$key%' OR TenNV LIKE '%$key%' OR NgaySinh LIKE '%$key%' OR DiaChi LIKE '%$key%' OR  TinhTP LIKE '%$key%'
     OR DienThoai LIKE '%$key%' OR CCCD LIKE '%$key%' OR TTHonNhan LIKE '%$key%' OR  MaBH LIKE '%$key%' OR GioiTinh LIKE '%$key%' OR NgayVaoLam LIKE '%$key%' OR TrinhDo LIKE '%$key%' 
     OR  TinhTrangLamViec LIKE '%$key%'";

}
else
{
    $sql = "SELECT * FROM nhanvien";
}
$result = mysqli_query($conn, $sql);
?>
<br>
<table class="search-form" align="center" cellpadding="5">
    <tr>
        <td>
            <form action="dsnhanvien.php" method = "POST">

                <input type="text" placeholder="Nhập thông tin cần tìm" class="btn btn-default" name = "form_name" value = "<?php if(isset($_POST["form_name"])){$_POST["form_name"];}?>">
                <input style="background-color:#1860F1;color:#F2F3F5" type="submit" class="btn btn-default" value="Tìm Thông Tin NV">
                <input style="background-color:#1860F1;color:#F2F3F5" type="submit" class="btn btn-default" value="Tìm Tất Cả">
                
</form>
        </td>
</tr>

</table>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Mã NV</th>
                                                <th>Tên NV</th>
                                                <th>Ngày Sinh</th>
                                                <th>Địa chỉ</th>
												<th>Điện Thoại</th>
                                                <th>Tỉnh TP</th>
                                                <th>CCCD</th>
                                                <th>TT Hôn Nhân</th>
                                                <th>Mã BH </th>

                                                
												<th>Giới Tính</th>
                                                <th>Ngày Vào Làm</th>
                                                <th>Trình Độ</th>
                                                <th>TT Làm Việc</th>
                                                <th>Ghi Chú </th>
                                                <th>Cập Nhật Thông Tin</th>

                                               


                                            </tr>
                                        </thead>                                        
                                        <tbody>
                                        <?php
        while($row = mysqli_fetch_assoc($result))
        {
       
        $MaNV = $row["MaNV"];
        $TenNV = $row["TenNV"];
        $NgaySinh = $row["NgaySinh"];
        $DiaChi = $row["DiaChi"];
        $DienThoai = $row["DienThoai"];
        $TinhTP = $row["TinhTP"];
        $CCCD = $row["CCCD"];
        $TTHonNhan = $row["TTHonNhan"];
        $MaBH = $row["MaBH"];
        $GioiTinh = $row["GioiTinh"];
        $NgayVaoLam = $row["NgayVaoLam"];
        $TrinhDo = $row["TrinhDo"];
        $TinhTrangLamViec = $row["TinhTrangLamViec"];
         $GhiChu = $row["GhiChu"];
        ?>
    <tr>
    <td><?php echo $MaNV ?></td> 
    <td><?php echo $TenNV ?></td>
    <td><?php echo $NgaySinh ?></td>
    <td><?php echo $DiaChi?></td>
    <td><?php echo $DienThoai ?></td>
    <td><?php echo $TinhTP ?></td> 
    <td><?php echo $CCCD ?></td>
    <td><?php echo $TTHonNhan ?></td>
    <td><?php echo $MaBH ?></td>
    <td><?php echo $GioiTinh ?></td>
    <td><?php echo $NgayVaoLam ?></td> 
    <td><?php echo $TrinhDo ?></td>
    <td><?php echo $TinhTrangLamViec ?></td>
    <td><?php echo $GhiChu ?></td>
    <td>
                                                <!-- <button class="popup-button">View</button> -->
                                                <button data-toggle="modal" data-toggle="modal" data-target="#edit_employee<?php echo $MaNV ?>">Chỉnh Sửa
												</button>
                                                <button data-toggle="modal" data-toggle="modal" data-target="#delete_employee<?php echo $MaNV ?>">Xóa</button>
												</td>
                                                <div class="modal fade" id="edit_employee<?php echo $MaNV ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                <h4 class="modal-title" id="myModalLabel">Chỉnh Sửa Thông Tin</h4>
                                                            </div>
                                                            <form role="form" name="frm_edit" method="POST" action="dsnhanvien.php">
                                                            <div class="modal-body">                                                           
                                       
                                                                   

                                                                    <div class="form-group">
                                                                        <label>Tên Nhân Viên</label>
                                                                        <input name="TenNV" class="form-control" placeholder="Tên nhân viên" value="<?php echo $TenNV ?>">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label>Ngày Sinh</label>
                                                                        <input name="NgaySinh" class="form-control" placeholder="0000/00/00" value="<?php echo $NgaySinh ?>">
                                                                    </div>  
																
                                                                    <div class="form-group">
                                                                        <label>Địa chỉ</label>
                                                                        <input name="DiaChi" class="form-control" placeholder="Địa chỉ" value="<?php echo $DiaChi ?>">
                                                                    </div>

																<div class="form-group">
                                                                        <label>Điện Thoại</label>
                                                                        <input name="DienThoai" class="form-control" placeholder="Điện Thoại" value="<?php echo $DienThoai ?>">
                                                                    </div>

                                                                    <div class="form-group">
                                                                    <label>Tỉnh TP</label>
                                                                        <input name="TinhTP" class="form-control" placeholder="Tỉnh TP" value="<?php echo $TinhTP ?>">
                                                                 </div>
                                                                 
                                                                 <div class="form-group">
                                                                        <label>CCCD</label>
                                                                        <input name="CCCD" class="form-control" placeholder="000000000000" value="<?php echo $CCCD ?>">
                                                                 </div>
                                                                  
                                                                 <div class="form-group">
                                                                        <label>TT Hôn Nhân</label>
                                                                        <input name="TTHonNhan" class="form-control" placeholder="TT Hôn Nhân" value="<?php echo $TTHonNhan ?>">
                                                                 </div>
                                                                 <div class="form-group">
                                                                        <label>Mã BH</label>
                                                                        <input name="MaBH" class="form-control" placeholder="Mã BH" value="<?php echo $MaBH ?>">
                                                                 </div>
                                                                 
                                
                                                                 <div class="form-group">
                                                                        <label>Giới Tính</label>
                                                                        <input name="GioiTinh" class="form-control" placeholder="Giới Tính" value="<?php echo $GioiTinh ?>">
                                                                 </div>
                                                                 <div class="form-group">
                                                                        <label>Ngày Vào Làm</label>
                                                                        <input name="NgayVaoLam" class="form-control" placeholder="0000/00/00" value="<?php echo $NgayVaoLam ?>">
                                                                 </div>
                                                                 <div class="form-group">
                                                                        <label>Trình Độ</label>
                                                                        <input name="TrinhDo" class="form-control" placeholder=../.." value="<?php echo $TrinhDo ?>">
                                                                 </div>
                                                                 <div class="form-group">
                                                                        <label>Tình Trạng Làm Việc</label>
                                                                        <input name="TinhTrangLamViec" class="form-control" placeholder="Tình trạng làm việc" value="<?php echo $TinhTrangLamViec ?>">
                                                                 </div>
                                                                 <div class="form-group">
                                                                        <label>Ghi Chú</label>
                                                                        <input name="GhiChu" class="form-control" placeholder="Ghi chú" value="<?php echo $GhiChu ?>">
                                                                 </div>

                                        
                                                                       
                                                            </div>
                                                            <div class="modal-footer">
                                                                <input type="hidden" name="form_name" value="edit_employee">
                                                                <input type="hidden" name="vMaNV" value="<?php echo $MaNV ?>">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Thoát</button>
                                                                <button type="submit" class="btn btn-primary">Lưu Dữ Liệu</button>                                                                
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal fade" id="delete_employee<?php echo $MaNV ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <form method="POST" action="">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                <h4 class="modal-title" id="myModalLabel">Xóa Dữ Liệu</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                Bạn có muốn xóa thông tin nhân viên này ?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <input type="hidden" name="form_name" value="delete_employee">
                                                                <input type="hidden" name="nhanvien_id" value="<?php echo $MaNV ?>">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Thoát</button>
                                                                <button type="submit" class="btn btn-primary">Xóa</button>
                                                            </div>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                </td>
    </tr>
                                               
												
                                               
                                            
                                               
                                            </tr> 
                                            <?php  
                                                }        
                                            
                                            ?>                                           
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