<?php
session_start();
if(!session_is_registered(user)){
    header('location:../index.php');
}
else{
if($_SESSION['user']!='admin') {
    header('location:../checklogin/error.php');
}
else{
include_once 'restsheetclass.php';
if($_POST['ty']=='enter'){
    if(isset ($_POST['sub_rest'])){
    $create_rest_sheet= new enter_rest_data();
    $create_rest_sheet->rest_sheet($_POST['id'], $_POST['restday'], $_POST['month'], $_POST['year']);
    }
    else{
        echo 'No direct access';
    }
}
elseif($_POST['ty']=='update'){
    if(isset ($_POST['update'])){
    $up= new update_sheet();
    $up->upsheet($_POST['id'], $_POST['restday'], $_POST['mo'], $_POST['ye']);
    }
    else{
        echo 'No direct access';
    }
}
if($_GET['ty']=='rep'){
    $mk_rep= new make_rep();
    $mk_rep->makerep($_GET['m'], $_GET['y']);
}
}
}
?>