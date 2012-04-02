<?php
session_start();
unset($_SESSION['username']);
unset($_SESSION['type']);
session_destroy();
header("location: ../index.php");
?>