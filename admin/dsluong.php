<?php  
include "includes/database.php";
include "includes/dataluong.php";

$database = new database();
$db = $database->connect();
$luongo = new luongo($db);

if($_SERVER['REQUEST_METHOD']=='POST'){

    // Create employee
    if($_POST['form_name']=='add_employee'){
        $v_MaNV = $_POST['MaNV'];
        $v_TenNV = $_POST['TenNV'];
        $v_MaCV = $_POST['MaCV'];
        $v_LuongCoBan = $_POST['LuongCoBan'];


        $v_LuongTangThem = $_POST['LuongTangThem'];
        $v_PhuCap = $_POST['PhuCap'];
        $v_LuongThuong = $_POST['LuongThuong'];
        $v_MaBHXH = $_POST['MaBHXH'];
        $v_SoNgayLam = $_POST['SoNgayLam'];
     

		
	 // Bind Params
        $luongo->MaNV = $v_MaNV;
        $luongo->TenNV = $v_TenNV;
        $luongo->MaCV = $v_MaCV;
        $luongo->LuongCoBan = $v_LuongCoBan;
       
        $luongo->LuongTangThem = $v_LuongTangThem;
        $luongo->PhuCap = $v_PhuCap;
        $luongo->LuongThuong = $v_LuongThuong;
        $luongo->MaBHXH = $v_MaBHXH;
        $luongo->SoNgayLam = $v_SoNgayLam;
      
		

      if($luongo->create()){
         $flag = "Create employee successful!";      
	  }
	
        
    }

    // Update empoyee
    if($_POST['form_name']=='edit_employee'){
        $v_MaNV = $_POST['vMaNV'];
        $v_TenNV = $_POST['TenNV'];
        $v_MaCV = $_POST['MaCV'];
        $v_LuongCoBan = $_POST['LuongCoBan'];

        $v_LuongTangThem = $_POST['LuongTangThem'];
        $v_PhuCap = $_POST['PhuCap'];
        $v_LuongThuong = $_POST['LuongThuong'];
        $v_MaBHXH = $_POST['MaBHXH'];
        $v_SoNgayLam = $_POST['SoNgayLam'];
     
		
        

        
		

       // $id = $_POST['nhanvien_id'];

        // Bind Params
        
        $luongo->MaNV = $v_MaNV;
        $luongo->TenNV = $v_TenNV;
        $luongo->MaCV = $v_MaCV;
        $luongo->LuongCoBan = $v_LuongCoBan;
      
        $luongo->LuongTangThem = $v_LuongTangThem;
        $luongo->PhuCap = $v_PhuCap;
        $luongo->LuongThuong = $v_LuongThuong;
        $luongo->MaBHXH = $v_MaBHXH;
        $luongo->SoNgayLam = $v_SoNgayLam;



        if($luongo->update()){
            $flag = "Bạn đã cập nhật thành công";
        }
        
    }

    // Delete employee
    if($_POST['form_name']=='delete_employee'){
        $id = $_POST['luong_id'];

        // Bind Params
        $luongo->MaNV = $id;
        if($luongo->delete()){
            $flag = "Bạn đã xóa thành công";
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
<style>
    .color a{
        color : white;
        text-decoration : none;
    }
</style>
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

           
  

</form>
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Thông tin bảng lương
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
                    <div class="col-lg-14">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                          Thêm bảng lương
                            </div>
                            <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-9">
                                    <form role="form" method="POST" action="dsluong.php">
                                       
                                    
                                    <div class="form-group">
                                            <label>Mã NV</label>
                                            <input name="MaNV" class="form-control" value="<?php echo $luongo->readMaNV()?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Tên NV</label>
                                            <input name="TenNV" class="form-control" placeholder="Nhập Tên nhân viên">
                                        </div>

                                        <div class="form-group">
                                            <label>Mã CV</label>
                                            <input name="MaCV" class="form-control" placeholder="Nhập chức vụ">
                                        </div>

                                        <div class="form-group">
                                            <label>Lương Cơ Bản ( Ngày )
                                                
                                            </label>
                                            <input name="LuongCoBan" class="form-control" placeholder="Nhập lương cơ bản">
                                        </div>
                                     
                                        <div class="form-group">
                                            <label>Lương tăng thêm (tăng ca)</label>
                                            <input name="LuongTangThem" class="form-control" placeholder="Nhập lương tăng thêm">
                                        </div>
                                        <div class="form-group">
                                            <label>Phụ cấp ngày </label><br>
                                            <select Name="PhuCap" class="form-control" Size="Number_of_options">  
                                            <div class="form-group">
                                            <option> Chọn phụ cấp : [ Ở nhà : 20,000 ] |  [ Đi lại : 30,000 ] | [ Ăn uống : 40,000 ] | [ Ca đêm : 50,000 ] | [ Ngoại ngữ : 60,000 ]   </option> 
                                            <option>0 </option></label>    
                                            <option>20000 </option>
                                                <option> 30000</option>  
                                                <option> 40000</option>  
                                                <option> 50000 </option>  
                                                <option> 60000 </option>  
                                                </select>
                                             
                                        </div>
                                        <div class="form-group">
                                            <label>Lương thưởng Ngày/Tháng</label>
                                            <input name="LuongThuong" class="form-control" placeholder="Nhập lương thưởng cho Ngày/Tháng">
                                        </div>
                                        <div class="form-group">
                                            <label>Mã BHXH</label>
                                            <input name="MaBHXH" class="form-control" placeholder="Nhập mã BHXH">
                                        </div>
                                        <div class="form-group">
                                            <label>Số Ngày Làm</label>
                                            <input name="SoNgayLam" class="form-control" placeholder="Nhập số ngày làm">
                                        </div>
                                      

                                        

                                        <input type="hidden" name="form_name" value="add_employee">         
                                        <button type="submit" class="btn btn-default">Thêm bảng lương mới</button>
                                     
                                        
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
                                Danh sách bảng lương    <div class="color">
                                        <button style="background-color:#1860F1;color:#ffffff" type="submit" class="btn btn-default" > <a href="print.php" >In Bảng Lương</a></button>

                                        
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                            
                                        </thead>    
                                                                         
                                        <tbody>
                                       
                                        
                                        <tr>
                                            
                                            <th>Mã NV</th>
                                                <th>Tên NV</th>
                                                <th>Mã CV</th>
                                                <th>Lương Cơ Bản</th>
                                                <th>Lương Tăng Thêm</th>
                                                <th>Phụ Cấp </th>
                                                <th>Lương Thưởng</th>
                                                <th>Mã BHXH </th>
                                                <th>Số Ngày Làm </th>
                                                <th>Tổng Tiền Lương </th>
												<th>Cập Nhật Thông Tin</th>
                                             
                                            </tr> 
                                            <?php  
                                            $result = $luongo->read();
                                            $num = $result->rowCount();
                                            if($num>0){
                                                while($rows = $result->fetch()){                             
                                            ?> 
                                            <tr>
                                                <th> <?php echo $rows["MaNV"]; ?><br /></th>
                                                <th> <?php echo $rows["TenNV"]; ?><br /></th>
                                                <th> <?php echo $rows["MaCV"]; ?><br /></th>
                                                <th><?php echo $rows["LuongCoBan"]?> VND<br /></th>
                                                <th> <?php echo $rows["LuongTangThem"] ?> VND<br /></th>
                                                <th> <?php echo $rows["PhuCap"]; ?> VND<br /></th>
                                                <th> <?php echo $rows["LuongThuong"]; ?> VND<br /></th>
                                                <th> <?php echo $rows["MaBHXH"]; ?><br /></th>
												<th><?php echo $rows["SoNgayLam"]; ?><br /></th>
                                               
                                                
                                              
                                                <th>
                                                <?php
                                                $TongLuong = ($rows["LuongCoBan"] + $rows["LuongTangThem"] + $rows["PhuCap"] + $rows["LuongThuong"]) * $rows["SoNgayLam"];
                                                echo " $TongLuong VND<br/>";
                                                ?></th>

                                                <th>
                                                <!-- <button class="popup-button">View</button> -->
                                                <button data-toggle="modal" data-toggle="modal" data-target="#edit_employee<?php echo $rows['MaNV']?>">Chỉnh Sửa
												</button>
                                                <button data-toggle="modal" data-toggle="modal" data-target="#delete_employee<?php echo $rows['MaNV']?>">Xóa</button>
												</th>
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
                                            <label>Tên NV</label>
                                            <input name="TenNV" class="form-control" placeholder="Nhập Tên nhân viên" value="<?php echo $rows['TenNV'] ?>">
                                        </div>

                                        <div class="form-group">
                                            <label>Mã CV</label>
                                            <input name="MaCV" class="form-control" placeholder="Nhập chức vụ"value="<?php echo $rows['MaCV'] ?>">
                                        </div>

                                        <div class="form-group">
                                            <label>Lương Cơ Bản ( Ngày )
                                                
                                            </label>
                                            <input name="LuongCoBan" class="form-control" placeholder="Nhập lương cơ bản" value="<?php echo $rows['LuongCoBan'] ?>">
                                        </div>
                                     
                                        <div class="form-group">
                                            <label>Lương tăng thêm (tăng ca)</label>
                                            <input name="LuongTangThem" class="form-control" placeholder="Nhập lương tăng thêm" value="<?php echo $rows['LuongTangThem'] ?>" >
                                        </div>
                                        <div class="form-group">
                                            <label>Phụ cấp ngày </label><br>
                                            <select Name="PhuCap" class="form-control" Size="Number_of_options" value="<?php echo $rows['PhuCap'] ?>">  
                                            <div class="form-group">
                                            <option> Chọn phụ cấp : [ Ở nhà : 20,000 ] | [ Đi lại : 30,000 ] | [ Ăn uống : 40,000 ] | [ Ca đêm : 50,000 ] | [ Ngoại ngữ : 60,000 ]   </option> 
                                            <option>0 </option></label>    
                                            <option>20000 </option></label>
                                                <option> 30000</option>  
                                                <option> 40000</option>  
                                                <option> 50000 </option>  
                                                <option> 60000 </option>  
                                                </select>
                                             
                                        </div>
                                        <div class="form-group">
                                            <label>Lương thưởng Ngày/Tháng</label>
                                            <input name="LuongThuong" class="form-control" placeholder="Nhập lương thưởng cho Ngày/Tháng" value="<?php echo $rows['LuongThuong'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Mã BHXH</label>
                                            <input name="MaBHXH" class="form-control" placeholder="Nhập mã BHXH" value="<?php echo $rows['MaBHXH'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Số Ngày Làm</label>
                                            <input name="SoNgayLam" class="form-control" placeholder="Nhập số ngày làm" value="<?php echo $rows['SoNgayLam'] ?>">
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
                                                                <input type="hidden" name="luong_id" value="<?php echo $rows['MaNV']; ?>">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Thoát</button>
                                                                <button type="submit" class="btn btn-primary">Xóa</button>
                                                            </div>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                </th>
                                                  
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