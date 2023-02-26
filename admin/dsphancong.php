<?php  
include "includes/database.php";
include "includes/dataphancong.php";

$database = new database();
$db = $database->connect();
$phancongo = new phancongo($db);

if($_SERVER['REQUEST_METHOD']=='POST'){

    // Create employee
    if($_POST['form_name']=='add_employee'){
        $v_MaNV = $_POST['MaNV'];
        $v_NgayVaoLam = $_POST['NgayVaoLam'];
        $v_DiaChi = $_POST['DiaChi'];
        $v_CacViTri = $_POST['CacViTri'];
		$v_MaPB = $_POST['MaPB'];
        $v_MaCV = $_POST['MaCV'];
		
	 // Bind Params     
        $phancongo->MaNV = $v_MaNV;
        $phancongo->NgayVaoLam = $v_NgayVaoLam;
        $phancongo->DiaChi = $v_DiaChi;
        $phancongo->CacViTri = $v_CacViTri;
		$phancongo->MaPB = $v_MaPB;
        $phancongo->MaCV = $v_MaCV;
		

      if($phancongo->create()){
         $flag = "Create employee successful!";      
	  }
	
        
    }

    // Update empoyee
    if($_POST['form_name']=='edit_employee'){
        $v_MaNV = $_POST['vMaNV'];
        $v_NgayVaoLam = $_POST['NgayVaoLam'];
        $v_DiaChi = $_POST['DiaChi'];
        $v_CacViTri= $_POST['CacViTri'];
		$v_MaPB = $_POST['MaPB'];
        $v_MaCV= $_POST['MaCV'];
		
        

        
		

       // $id = $_POST['nhanvien_id'];

        // Bind Params
        
        $phancongo->MaNV = $v_MaNV;
        $phancongo->NgayVaoLam = $v_NgayVaoLam;
        $phancongo->DiaChi = $v_DiaChi;
        $phancongo->CacViTri = $v_CacViTri;
		$phancongo->MaPB = $v_MaPB;
        $phancongo->MaCV = $v_MaCV;
	
        if($phancongo->update()){
            $flag = "Edit employee successful!";
        }
        
    }

    // Delete employee
    if($_POST['form_name']=='delete_employee'){
        $id = $_POST['phancong_id'];

        // Bind Params
        $phancongo->MaNV = $id;
        if($phancongo->delete()){
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
                            Thông tin Phân Công
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
                          Thêm phân công
                            </div>
                            <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" method="POST" action="">
                                       
                                    
                                    <div class="form-group">
                                            <label>Mã NV</label>
                                            <input name="MaNV" class="form-control"  placeholder="Vui lòng nhập mã nhân viên" >
                                        </div>
                                        <div class="form-group">
                                            <label>Ngày Vào Làm</label>
                                            <input name="NgayVaoLam" class="form-control" placeholder="0000/00/00">
                                        </div>

                                        <div class="form-group">
                                            <label>Địa chỉ</label>
                                            <input name="DiaChi" class="form-control" placeholder="Nhập địa chỉ">
                                        </div>

                                        <div class="form-group">
                                            <label>Các Vị Trí</label>
                                            <input name="CacViTri" class="form-control" placeholder="Nhập các vị trí">
                                        </div>
										<div class="form-group">
                                            <label>Mã PB</label>
                                            <input name="MaPB" class="form-control" placeholder="Mã PB">
                                        </div>
										<div class="form-group">
                                            <label>Mã CV</label>
                                            <input name="MaCV" class="form-control" placeholder="Mã CV">
                                        </div>
                                        
										
                                        
                                        

                                        <input type="hidden" name="form_name" value="add_employee">         
                                        <button type="submit" class="btn btn-default">Thêm mới phân công</button>
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
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Danh sách phân công
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Mã NV</th>
                                                <th>Ngày Vào Làm</th>
                                                <th>Địa chỉ</th>
                                                <th>Các Vị Trí</th>
												<th>Mã PB</th>
												<th>Mã CV</th>
												<th>Cập Nhật Thông Tin</th>
                                                

                                               


                                            </tr>
                                        </thead>                                        
                                        <tbody>
                                            <?php  
                                            $result = $phancongo->read();
                                            $num = $result->rowCount();
                                            if($num>0){
                                                while($rows = $result->fetch()){                             
                                            ?>
                                            <tr>
                                               
												
                                                <td><?php echo $rows['MaNV'] ?></td>
                                                <td><?php echo $rows['NgayVaoLam'] ?></td>
                                                <td><?php echo $rows['DiaChi'] ?></td>
                                                <td><?php echo $rows['CacViTri'] ?></td>
												<td><?php echo $rows['MaPB'] ?></td>
                                                <td><?php echo $rows['MaCV'] ?></td>
												

                                                
												
                                            
                                                <td>
                                                <!-- <button class="popup-button">View</button> -->
                                                <button data-toggle="modal" data-toggle="modal" data-target="#edit_employee<?php echo $rows['MaNV']?>">Chỉnh sửa
												</button>
                                                <button data-toggle="modal" data-toggle="modal" data-target="#delete_employee<?php echo $rows['MaNV']?>">Xóa</button>
												</td>
                                                <div class="modal fade" id="edit_employee<?php echo $rows['MaNV']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                <h4 class="modal-title" id="myModalLabel">Chỉnh sửa dữ liệu</h4>
                                                            </div>
                                                            <form role="form" name="frm_edit" method="POST" action="">
                                                            <div class="modal-body">                                                           
                                       
                                                                   

                                                                    <div class="form-group">
                                                                        <label>Ngày vào làm </label>
                                                                        <input name="NgayVaoLam" class="form-control" placeholder="0000/00/00" value="<?php echo $rows['NgayVaoLam'] ?>">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label>Địa chỉ</label>
                                                                        <input name="DiaChi" class="form-control" placeholder="Nhập địa chỉ" value="<?php echo $rows['DiaChi'] ?>">
                                                                    </div>  
																
                                                                    <div class="form-group">
                                                                        <label>Các vị trí</label>
                                                                        <input name="CacViTri" class="form-control" placeholder="Các vị trí" value="<?php echo $rows['CacViTri'] ?>">
                                                                    </div>
																<div class="form-group">
                                                                        <label>Mã PB</label>
                                                                        <input name="MaPB" class="form-control" placeholder="Mã PB" value="<?php echo $rows['MaPB'] ?>">
                                                                    </div>
																<div class="form-group">
                                                                        <label>Mã CV</label>
                                                                        <input name="MaCV" class="form-control" placeholder="Mã CV" value="<?php echo $rows['MaCV'] ?>">
                                                                    </div>

																

                                                                    

                                        
                                                                       
                                                            </div>
                                                            <div class="modal-footer">
                                                                <input type="hidden" name="form_name" value="edit_employee">
                                                                <input type="hidden" name="vMaNV" value="<?php echo $rows['MaNV'] ?>">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Thoát</button>
                                                                <button type="submit" class="btn btn-primary">Lưu Dữ Liệu</button>                                                                
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal fade" id="delete_employee<?php echo $rows['MaNV']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <form method="POST" action="">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                <h4 class="modal-title" id="myModalLabel">Xóa Dữ Liệu</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                Are you sure that you want to delete this employee?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <input type="hidden" name="form_name" value="delete_employee">
                                                                <input type="hidden" name="phancong_id" value="<?php echo $rows['MaNV']; ?>">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Thoát</button>
                                                                <button type="submit" class="btn btn-primary">Xóa</button>
                                                            </div>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                </td>
                                            </tr> 
                                            <?php  
                                                }        
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