<?php  
include "includes/database.php";
include "includes/dataphucap.php";

$database = new database();
$db = $database->connect();
$phucapo = new phucapo($db);

if($_SERVER['REQUEST_METHOD']=='POST'){

    // Create employee
    if($_POST['form_name']=='add_employee'){
        $v_Onha = $_POST['Onha'];
        $v_AnUong = $_POST['AnUong'];
        $v_CaDem = $_POST['CaDem'];
        $v_DiLai = $_POST['DiLai'];
        $v_NgoaiNgu = $_POST['NgoaiNgu'];
       
		
	 // Bind Params
        $phucapo->Onha = $v_Onha;
        $phucapo->AnUong = $v_AnUong;
        $phucapo->CaDem = $v_CaDem;
        $phucapo->DiLai = $v_DiLai;
        $phucapo->NgoaiNgu = $v_NgoaiNgu;
       
		

      if($phucapo->create()){
         $flag = "Create employee successful!";      
	  }
	
        
    }

    // Update empoyee
    if($_POST['form_name']=='edit_employee'){
        $v_Onha = $_POST['vOnha'];
        $v_AnUong = $_POST['AnUong'];
        $v_CaDem = $_POST['CaDem'];
        $v_DiLai = $_POST['DiLai'];
        $v_NgoaiNgu = $_POST['NgoaiNgu'];
 
       // $id = $_POST['nhanvien_id'];

        // Bind Params
        
        $phucapo->Onha = $v_Onha;
        $phucapo->AnUong = $v_AnUong;
        $phucapo->CaDem = $v_CaDem;
        $phucapo->DiLai = $v_DiLai;
        $phucapo->NgoaiNgu = $v_NgoaiNgu;

       
	
        if($phucapo->update()){
            $flag = "Edit employee successful!";
        }
        
    }

    // Delete employee
    if($_POST['form_name']=='delete_employee'){
        $id = $_POST['phucap_id'];

        // Bind Params
        $phucapo->Onha = $id;
        if($phucapo->delete()){
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
                            Thông tin Phụ Cấp
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
                          Thêm phụ cấp
                            </div>
                            <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" method="POST" action="">
                                       
                                    
                                    <div class="form-group">
                                            <label>Ở nhà</label>
                                            <input name="Onha" class="form-control"  placeholder="Nhập phụ cấp">
                                        </div>
                                        <div class="form-group">
                                            <label>Ăn Uống</label>
                                            <input name="AnUong" class="form-control" placeholder="Nhập ăn uống">
                                        </div>

                                        <div class="form-group">
                                            <label>Ca Đêm</label>
                                            <input name="CaDem" class="form-control" placeholder="Nhập ca đêm">
                                        </div>
                                        <div class="form-group">
                                            <label>Đi Lại </label>
                                            <input name="DiLai" class="form-control" placeholder="Nhập đi lại">
                                        </div>
                                        <div class="form-group">
                                            <label>Ngoại Ngữ</label>
                                            <input name="NgoaiNgu" class="form-control" placeholder="Nhập ngoại ngữ">
                                        </div>

                                        <input type="hidden" name="form_name" value="add_employee">         
                                        <button type="submit" class="btn btn-default">Thêm phụ cấp</button>
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
                                Danh sách Phụ Cấp
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Ở Nhà</th>
                                                <th>Ăn Uống</th>
                                                <th>Ca Đêm</th>
                                                <th>Đi Lại</th>
                                                <th>Ngoại Ngữ</th>
												<th>Cập Nhật Thông Tin</th>
                                             
                                            </tr>
                                        </thead>                                        
                                        <tbody>
                                            <?php  
                                            $result = $phucapo->read();
                                            $num = $result->rowCount();
                                            if($num>0){
                                                while($rows = $result->fetch()){                             
                                            ?>
                                            <tr>
                                               
												
                                                <td><?php echo $rows['Onha'] ?></td>
                                                <td><?php echo $rows['AnUong'] ?></td>
                                                <td><?php echo $rows['CaDem'] ?></td>
                                                <td><?php echo $rows['DiLai'] ?></td>
                                                <td><?php echo $rows['NgoaiNgu'] ?></td>
                                            
                                                <td>
                                                <!-- <button class="popup-button">View</button> -->
                                                <button data-toggle="modal" data-toggle="modal" data-target="#edit_employee<?php echo $rows['Onha']?>">Chỉnh sửa
												</button>
                                                <button data-toggle="modal" data-toggle="modal" data-target="#delete_employee<?php echo $rows['Onha']?>">Xóa</button>
												</td>
                                                <div class="modal fade" id="edit_employee<?php echo $rows['Onha']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                <h4 class="modal-title" id="myModalLabel">Chỉnh sửa dữ liệu</h4>
                                                            </div>
                                                            <form role="form" name="frm_edit" method="POST" action="">
                                                            <div class="modal-body">                                                           
                                       
                                                                   

                                                                    <div class="form-group">
                                                                        <label>Ăn Uống </label>
                                                                        <input name="AnUong" class="form-control" placeholder="Ăn Uống" value="<?php echo $rows['AnUong'] ?>">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label>Ca Đêm</label>
                                                                        <input name="CaDem" class="form-control" placeholder="nhập ca đêm" value="<?php echo $rows['CaDem'] ?>">
                                                                    </div> 
                                                                    <div class="form-group">
                                                                        <label>Đi Lại</label>
                                                                        <input name="DiLai" class="form-control" placeholder="nhập đi lại" value="<?php echo $rows['DiLai'] ?>">
                                                                    </div> 
                                                                    <div class="form-group">
                                                                        <label>Ngoại Ngữ</label>
                                                                        <input name="NgoaiNgu" class="form-control" placeholder="nhập ngoại ngữ" value="<?php echo $rows['NgoaiNgu'] ?>">
                                                                    </div>  
																
                                 
                                                                       
                                                            </div>
                                                            <div class="modal-footer">
                                                                <input type="hidden" name="form_name" value="edit_employee">
                                                                <input type="hidden" name="vOnha" value="<?php echo $rows['Onha'] ?>">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Thoát</button>
                                                                <button type="submit" class="btn btn-primary">Lưu Dữ Liệu</button>                                                                
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal fade" id="delete_employee<?php echo $rows['Onha']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                                                <input type="hidden" name="phucap_id" value="<?php echo $rows['Onha']; ?>">
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