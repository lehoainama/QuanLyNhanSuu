<?php  
include "includes/database.php";
include "includes/databaohiem.php";

$database = new database();
$db = $database->connect();
$baohiemo = new baohiemo($db);

if($_SERVER['REQUEST_METHOD']=='POST'){

    // Create employee
    if($_POST['form_name']=='add_employee'){
        $v_MaBH = $_POST['MaBH'];
        $v_MaNV= $_POST['MaNV'];
        $v_ThoiGian = $_POST['ThoiGian'];
        $v_BHYT = $_POST['BHYT'];
		$v_BHTN = $_POST['BHTN'];
        $v_TongBH = $_POST['TongBH'];
		
	 // Bind Params     
        $baohiemo->MaBH = $v_MaBH;
        $baohiemo->MaNV= $v_MaNV;
        $baohiemo->ThoiGian = $v_ThoiGian;
        $baohiemo->BHYT = $v_BHYT;
		$baohiemo->BHTN = $v_BHTN;
        $baohiemo->TongBH = $v_TongBH;
		

      if($baohiemo->create()){
         $flag = "Create employee successful!";      
	  }
	
        
    }

    // Update empoyee
    if($_POST['form_name']=='edit_employee'){
        $v_MaBH = $_POST['vMaBH'];
        $v_MaNV= $_POST['MaNV'];
        $v_ThoiGian = $_POST['ThoiGian'];
        $v_BHYT= $_POST['BHYT'];
		$v_BHTN = $_POST['BHTN'];
        $v_TongBH= $_POST['TongBH'];
		
        

        
		

       // $id = $_POST['nhanvien_id'];

        // Bind Params
        
        $baohiemo->MaBH = $v_MaBH;
        $baohiemo->MaNV= $v_MaNV;
        $baohiemo->ThoiGian = $v_ThoiGian;
        $baohiemo->BHYT = $v_BHYT;
		$baohiemo->BHTN = $v_BHTN;
        $baohiemo->TongBH = $v_TongBH;
	
        if($baohiemo->update()){
            $flag = "Edit employee successful!";
        }
        
    }

    // Delete employee
    if($_POST['form_name']=='delete_employee'){
        $id = $_POST['baohiem_id'];

        // Bind Params
        $baohiemo->MaBH = $id;
        if($baohiemo->delete()){
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
                            Thông tin Bảo Hiểm
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
                          Thêm bảo hiểm
                            </div>
                            <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" method="POST" action="">
                                       
                                    
                                    <div class="form-group">
                                            <label>Mã BH</label>
                                            <input name="MaBH" class="form-control"  value="<?php echo $baohiemo->readMaBH()?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Mã NV</label>
                                            <input name="MaNV" class="form-control" placeholder="Nhập mã NV ">
                                        </div>

                                        <div class="form-group">
                                            <label>Thời gian</label>
                                            <input name="ThoiGian" class="form-control" placeholder="0000/00/00">
                                        </div>

                                        <div class="form-group">
                                            <label>BHYT</label>
                                            <input name="BHYT" class="form-control" placeholder="BHYT">
                                        </div>
										<div class="form-group">
                                            <label>BHTN</label>
                                            <input name="BHTN" class="form-control" placeholder="BHTN">
                                        </div>
										<div class="form-group">
                                            <label> Tổng bảo hiểm</label>
                                            <input name="TongBH" class="form-control" placeholder="Tổng bảo hiểm">
                                        </div>
                                        
										
                                        
                                        

                                        <input type="hidden" name="form_name" value="add_employee">         
                                        <button type="submit" class="btn btn-default">Thêm mới danh sách bảo hiểm</button>
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
                                Danh sách bảo hiểm
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Mã BH</th>
                                                <th>Mã NV</th>
                                                <th>Thời gian</th>
                                                <th>BHYT</th>
												<th>BHTN</th>
												<th>Tổng BH </th>
												<th>Cập Nhật Thông Tin</th>
                                                

                                               


                                            </tr>
                                        </thead>                                        
                                        <tbody>
                                            <?php  
                                            $result = $baohiemo->read();
                                            $num = $result->rowCount();
                                            if($num>0){
                                                while($rows = $result->fetch()){                             
                                            ?>
                                            <tr>
                                               
												
                                                <td><?php echo $rows['MaBH'] ?></td>
                                                <td><?php echo $rows['MaNV'] ?></td>
                                                <td><?php echo $rows['ThoiGian'] ?></td>
                                                <td><?php echo $rows['BHYT'] ?></td>
												<td><?php echo $rows['BHTN'] ?></td>
                                                <td><?php echo $rows['TongBH'] ?></td>
												

                                                
												
                                            
                                                <td>
                                                <!-- <button class="popup-button">View</button> -->
                                                <button data-toggle="modal" data-toggle="modal" data-target="#edit_employee<?php echo $rows['MaBH']?>">Chỉnh sửa
												</button>
                                                <button data-toggle="modal" data-toggle="modal" data-target="#delete_employee<?php echo $rows['MaBH']?>">Xóa</button>
												</td>
                                                <div class="modal fade" id="edit_employee<?php echo $rows['MaBH']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                <h4 class="modal-title" id="myModalLabel">Chỉnh sửa thông tin</h4>
                                                            </div>
                                                            <form role="form" name="frm_edit" method="POST" action="">
                                                            <div class="modal-body">                                                           
                                       
                                                                   

                                                                    <div class="form-group">
                                                                        <label>Mã NV </label>
                                                                        <input name="MaNV" class="form-control" placeholder=" Nhập mã NV" value="<?php echo $rows['MaNV'] ?>">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label>Thời gian</label>
                                                                        <input name="ThoiGian" class="form-control" placeholder="0000/00/00" value="<?php echo $rows['ThoiGian'] ?>">
                                                                    </div>  
																
                                                                    <div class="form-group">
                                                                        <label>BHYT</label>
                                                                        <input name="BHYT" class="form-control" placeholder="BHYT" value="<?php echo $rows['BHYT'] ?>">
                                                                    </div>
																<div class="form-group">
                                                                        <label>BHTN</label>
                                                                        <input name="BHTN" class="form-control" placeholder="BHTN" value="<?php echo $rows['BHTN'] ?>">
                                                                    </div>
																<div class="form-group">
                                                                        <label>Tổng BH</label>
                                                                        <input name="TongBH" class="form-control" placeholder="Tổng BH" value="<?php echo $rows['TongBH'] ?>">
                                                                    </div>

																

                                                                    

                                        
                                                                       
                                                            </div>
                                                            <div class="modal-footer">
                                                                <input type="hidden" name="form_name" value="edit_employee">
                                                                <input type="hidden" name="vMaBH" value="<?php echo $rows['MaBH'] ?>">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Thoát</button>
                                                                <button type="submit" class="btn btn-primary">Lưu Dữ Liệu</button>                                                                
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal fade" id="delete_employee<?php echo $rows['MaBH']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <form method="POST" action="">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                <h4 class="modal-title" id="myModalLabel">Xóa Dữ Lữu Liệu</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                Are you sure that you want to delete this employee?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <input type="hidden" name="form_name" value="delete_employee">
                                                                <input type="hidden" name="baohiem_id" value="<?php echo $rows['MaBH']; ?>">
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