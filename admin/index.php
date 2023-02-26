
<?php
session_start();
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';
    if ($username == 'admin' && $password == '123')
    {
        $_SESSION['dangnhap'] = $username;
        header("location:trangchu.php");
    } else {
        echo "";
        require "login.html";
    }
 
?>

