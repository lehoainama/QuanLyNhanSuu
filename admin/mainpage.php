<?php
session_start();
if (!isset($_SESSION['dangnhap'])) {
    header("location:login.html");
} else {
    echo "wellcome " . $_SESSION['dangnhap'];
}
?>
 
 
<!DOCTYPE html>
<html>
<head>
    <title>Home page</title>
</head>
<body>
    <a href="logout.php">Dang xuat</a>
</body>
</html>