<?php  
include "includes/database.php";
include "includes/dataluongcoban.php";

$database = new database();
$db = $database->connect();
$luongcobano = new luongcobano($db);

if($_SERVER['REQUEST_METHOD']=='POST'){

    // Create employee
    if($_POST['form_name']=='add_employee'){
        $v_MaNV = $_POST['MaNV'];
        $v_NgayVaoLam = $_POST['NgayVaoLam'];
        $v_ThoiGianTangLuong = $_POST['ThoiGianTangLuong'];
        $v_TongLuongTang = $_POST['TongLuongTang'];
		
	 // Bind Params     
        $luongcobano->MaNV = $v_MaNV;
        $luongcobano->NgayVaoLam = $v_NgayVaoLam;
        $luongcobano->ThoiGianTangLuong = $v_ThoiGianTangLuong;
        $luongcobano->TongLuongTang = $v_TongLuongTang;
		

      if($luongcobano->create()){
         $flag = "Create employee successful!";      
	  }
	
        
    }

    // Update empoyee
    if($_POST['form_name']=='edit_employee'){
        $v_MaNV = $_POST['vMaNV'];
        $v_NgayVaoLam = $_POST['NgayVaoLam'];
        $v_ThoiGianTangLuong = $_POST['ThoiGianTangLuong'];
        $v_TongLuongTang= $_POST['TongLuongTang'];
		
        
        $luongcobano->MaNV = $v_MaNV;
        $luongcobano->NgayVaoLam = $v_NgayVaoLam;
        $luongcobano->ThoiGianTangLuong = $v_ThoiGianTangLuong;
        $luongcobano->TongLuongTang = $v_TongLuongTang;
	
        if($luongcobano->update()){
            $flag = "Edit employee successful!";
        }
        
    }

    // Delete employee
    if($_POST['form_name']=='delete_employee'){
        $id = $_POST['luongcoban_id'];

        // Bind Params
        $luongcobano->MaNV = $id;
        if($luongcobano->delete()){
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
                            Thông tin lương cơ bản
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
                          Thêm bảng lương
                            </div>
                            <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" method="POST" action="">
                                       
                                    
                                    <div class="form-group">
                                            <label>Mã NV</label>
                                            <input name="MaNV" class="form-control"  value="<?php echo $luongcobano->readMaNV()?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Ngày Vào Làm</label>
                                            <input name="NgayVaoLam" class="form-control" placeholder="0000/00/00">
                                        </div>

                                        <div class="form-group">
                                            <label>Thời gian tăng lương</label>
                                            <input name="ThoiGianTangLuong" class="form-control" placeholder="0000/00/00">
                                        </div>

                                        <div class="form-group">
                                            <label>Tổng Lương Tăng</label>
                                            <input name="TongLuongTang" class="form-control" placeholder="Nhập tổng lương tăng">
                                        </div>
                                        
										
                                        
                                        

                                        <input type="hidden" name="form_name" value="add_employee">         
                                        <button type="submit" class="btn btn-default">Thêm mới bảng lương</button>
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
                                Danh sách lương cơ bản
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Mã NV</th>
                                                <th>Ngày Vào Làm</th>
                                                <th>Tổng Thời Gian Tăng Lương</th>
                                                <th>Tổng Lương Tăng</th>
												<th>Cập Nhật Thông Tin</th>
                                                

                                               


                                            </tr>
                                        </thead>                                        
                                        <tbody>
                                            <?php  
                                            $result = $luongcobano->read();
                                            $num = $result->rowCount();
                                            if($num>0){
                                                while($rows = $result->fetch()){                             
                                            ?>
                                            <tr>
                                               
												
                                                <td><?php echo $rows['MaNV'] ?></td>
                                                <td><?php echo $rows['NgayVaoLam'] ?></td>
                                                <td><?php echo $rows['ThoiGianTangLuong'] ?></td>
                                                <td><?php echo $rows['TongLuongTang'] ?></td>
												

                                                
												
                                            
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
                                                                        <label>Thời gian tăng lương</label>
                                                                        <input name="ThoiGianTangLuong" class="form-control" placeholder="0000/00/00" value="<?php echo $rows['ThoiGianTangLuong'] ?>">
                                                                    </div>  
																
                                                                    <div class="form-group">
                                                                        <label>Tổng lương tăng</label>
                                                                        <input name="TongLuongTang" class="form-control" placeholder="Tổng lương tăng" value="<?php echo $rows['TongLuongTang'] ?>">
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
                                                                <input type="hidden" name="luongcoban_id" value="<?php echo $rows['MaNV']; ?>">
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