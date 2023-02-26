<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3 align="center"> Danh Sách Sinh Viên </h3>
    <?php
$conn = mysqli_connect("localhost","root","","quanlynhansu");
if(isset($_POST["timkiem"])&& !empty ($_POST["timkiem"]))
{
    $key = $_POST["timkiem"];
    $sql = "SELECT * FROM phongban WHERE MaPB LIKE '%$key%' OR TenPB LIKE '%$key%' OR DiaChi LIKE '%$key%' OR DienGiai LIKE '%$key%'";

}
else
{
    $sql = "SELECT * FROM phongban";
}
$result = mysqli_query($conn, $sql);
?>

<table class="search-form" align="center" cellpadding="5">
    <tr>
        <td>
            <form action="timkiem.php" method = "POST">

                <input type="text" name = "timkiem" value = "<?php if(isset($_POST["timkiem"])){$_POST["timkiem"];}?>">
                <input type="submit" valua="tìm">
                <input type="button" valua="tất cả" onclick="windown.location.href=''">
</form>
        </td>
</tr>

</table>
    <table border="1" align="center" cellspacing="0" cellpadding = "0" width ="850px">
        <tr>
            <th>Ma Sv</th>
            <th>Ma Sv</th>
            <th>Ma Sv</th>
            <th>Ma Sv</th>
        
                        

            
        </tr>
        <?php
        while($row = mysqli_fetch_assoc($result))
        {
       
        $MaPB = $row["MaPB"];
        $TenPB = $row["TenPB"];
        $DiaChi = $row["DiaChi"];
        $DienGiai = $row["DienGiai"];
        ?>
    <tr>
    <td><?php echo $MaPB ?></td> 
    <td><?php echo $TenPB ?></td>
    <td><?php echo $DiaChi ?></td>
    <td><?php echo $DienGiai ?></td>
    </tr>
    <?php
    }
    ?>
   
    
</table>

    
</body>
</html>


<td><?php echo $rows['MaNV'] ?></td>
                                                <td><?php echo $rows['TenNV'] ?></td>
                                                <td><?php echo $rows['NgaySinh'] ?></td>
                                                <td><?php echo $rows['DiaChi'] ?></td>
												<td><?php echo $rows['DienThoai'] ?></td>
                                                <td><?php echo $rows['TinhTP'] ?></td>
												<td><?php echo $rows['CCCD'] ?></td>
                                                <td><?php echo $rows['TTHonNhan'] ?></td>
                                                <td><?php echo $rows['MaBH'] ?></td>

                                                
												<td><?php echo $rows['GioiTinh'] ?></td>
                                                <td><?php echo $rows['NgayVaoLam'] ?></td>
												<td><?php echo $rows['TrinhDo'] ?></td>
                                                <td><?php echo $rows['TinhTrangLamViec'] ?></td>
                                                <td><?php echo $rows['GhiChu'] ?></td>
