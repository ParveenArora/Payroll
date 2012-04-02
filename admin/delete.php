<?php
session_start();
if($_SESSION['user']!='admin'){header('location:../checklogin/error.php');}
$op= base64_encode(2);
header("location:edit.php?op=$op");
?>
