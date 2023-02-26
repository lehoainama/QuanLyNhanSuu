<?php
session_start();
unset($_SESSION['dangnhap']);
header("location:login.html");
?>