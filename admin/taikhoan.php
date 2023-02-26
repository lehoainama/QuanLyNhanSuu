<body>
 <?php echo $_POST["LuongCoBan"]; ?>!<br />
 <?php echo $_POST["LuongTangThem"]; ?>!<br />
 <?php echo $_POST["PhuCap"]; ?>!<br />
 <?php echo $_POST["LuongThuong"]; ?>!<br />
 <?php echo $_POST["SoNgayLam"]; ?>!<br />





<br>
<table>
    <?php
     $LuongCoBan = $_POST["LuongCoBan"];
        $LuongTangThem = $_POST["LuongTangThem"];
        $PhuCap =  $_POST["PhuCap"];
        $LuongThuong = $_POST["LuongThuong"];
       
        $SoNgayLam = $_POST["SoNgayLam"]; 

        $c = ($LuongCoBan + $LuongTangThem + $PhuCap + $LuongThuong) * $SoNgayLam;
        echo "Kết quả phép cộng và nhân: $c <br/>";
        ?>
</table>