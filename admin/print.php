<?php  
include "includes/database.php";
include "includes/dataluong.php";

$database = new database();
$db = $database->connect();
$luongo = new luongo($db);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>body {
    margin: 0;
    padding: 0;
    background-color: #FAFAFA;
    font: 12pt "Tohoma";
}
* {
    box-sizing: border-box;
    -moz-box-sizing: border-box;
}
.page {
    width: 30cm;
    overflow:hidden;
    min-height:250mm;
    padding: 1cm;
    margin-left:auto;
    margin-right:auto;
    background: white;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}
.subpage {
    padding: 1cm;
    border: 5px red solid;
    height: 237mm;
    outline: 2cm #FFEAEA solid;
}
 @page {
 size: A4;
 margin: 0;
}
button {
    width:100px;
    height: 24px;
}
.header {
    overflow:hidden;
}
.logo {
    background-color:#FFFFFF;
    text-align:left;
    float:left;
    width: 170px;
    height: 150px;

}
.company {
    padding-top:5px;
    text-transform:uppercase;
    background-color:#FFFFFF;
    text-align:right;
    float:right;
    font-size:16px;
}
.title {
    text-align:center;
    position:relative;
    color:#0000FF;
    font-size: 24px;
    top:1px;
}
.footer-left {
    text-align:center;
    text-transform:uppercase;
    padding-top:24px;
    position:relative;
    height: 150px;
    width:50%;
    color:#000;
    float:left;
    font-size: 12px;
    bottom:1px;
}
.footer-right {
    text-align:center;
    text-transform:uppercase;
    padding-top:24px;
    position:relative;
    height: 150px;
    width:50%;
    color:#000;
    font-size: 12px;
    float:right;
    bottom:1px;
}
.TableData {
    background:#ffffff;
    font: 11px;
    width:100%;
    border-collapse:collapse;
    font-family:Verdana, Arial, Helvetica, sans-serif;
    font-size:12px;
    border:thin solid #d3d3d3;
}
.TableData TH {
    background: rgba(0,0,255,0.1);
    text-align: center;
    font-weight: bold;
    color: #000;
    border: solid 1px #ccc;
    height: 24px;
}
.TableData TR {
    height: 24px;
    border:thin solid #d3d3d3;
}
.TableData TR TD {
    padding-right: 2px;
    padding-left: 2px;
    border:thin solid #d3d3d3;
}
.TableData TR:hover {
    background: rgba(0,0,0,0.05);
}
.TableData .cotSTT {
    text-align:center;
    width: 10%;
}
.TableData .cotTenSanPham {
    text-align:left;
    width: 40%;
}
.TableData .cotHangSanXuat {
    text-align:left;
    width: 20%;
}
.TableData .cotGia {
    text-align:right;
    width: 120px;
}
.TableData .cotSoLuong {
    text-align: center;
    width: 50px;
}
.TableData .cotSo {
    text-align: right;
    width: 120px;
}
.TableData .tong {
    text-align: right;
    font-weight:bold;
    text-transform:uppercase;
    padding-right: 4px;
}
.TableData .cotSoLuong input {
    text-align: center;
}
@media print {
 @page {
 margin: 0;
 border: initial;
 border-radius: initial;
 width: initial;
 min-height: initial;
 box-shadow: initial;
 background: initial;
 page-break-after: always;
}
}
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}
.back{
    background-color: #6E7EF6;
}
tr:nth-child(even) {
  background-color: #dddddd;
}
.co{
    font-family: arial, sans-serif;
}</style>
</head>
<body>
    
</body>
</html>
<body onload="window.print();">
<div id="page" class="page">
    <div class="header">
        <div class="logo"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ-U-419BSVW9uQ1h9PxREh30of6nctPLtBTOemSmM&s"/></div>
       
        <div class="">Công ty kinh doanh và sản xuất xưởng may mặc  </div>
        <div class="">Địa chỉ : 500 Lý Thái Tổ, P.10, Q.10, TP- HCM</div>
        <div class="">Điện thoại/ Fax 0909806800</div>
    </div>

  <br/>
  <div class="title">
        DANH SÁCH BẢNG LƯƠNG
        <br/>
      
  </div>
  <br/>
  <br/>
  <table class="TableData">
    
    <table>
    <tr class="back">
     
       
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
												
    </tr>
    <?php  
                                            $result = $luongo->read();
                                            $num = $result->rowCount();
                                            if($num>0){
                                                while($rows = $result->fetch()){                             
                                            ?> 
                                            <tr>

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
  </tr>

 
  <?php  
                                                }        
                                            }
                                            ?> 
  </table>
  <br></br> 
  <div class="footer-left"> TpHCM, ngày 22 tháng 12 năm 2022<br/>
    Giám Đốc </div>
  <div class="footer-right"> TpHCM, ngày 22 tháng 12 năm 2022<br/>
    Người Lập Danh Sách </div>
</div>

                  
                        <!-- /.panel -->
                    </div>
                </div>
</body>