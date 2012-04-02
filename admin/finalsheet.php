<?php
include "../dbfiles/config.php";
session_start();
if($_SESSION['user']!='admin'){header('location:../checklogin/error.php');}
function insertsalarydetail(){
    $pf= $_POST['pf'];
    $esi= $_POST['esi'];
    $adv= $_POST['adv'];
    $id= $_POST['id'];
    $rate= $_POST['rate'];
    $i=0;
    foreach ($_POST['workdays'] as $workday){
        if($workday=='' || $pf[$i]=='' || $esi[$i]=='' || $adv[$i]==''){
            echo "<script>alert('You have to pay for this');window.location = 'newsheet.php';</script>";
        }
        $i=$i+1;
    }
    $i=0;
    $m= date('n')-1;
    $y= date('Y');
    foreach ($_POST['workdays'] as $workday){
    $query=mysql_query("Insert into worker_varys (id, rate, workdays, pf, esi, advance, month, year) values ('$id[$i]', '$rate[$i]', '$workday', '$pf[$i]', '$esi[$i]', '$adv[$i]', '$m', '$y')");
    $i=$i+1;
}
if(!$query){
    header('location:qerror.php?op=enterdata');
}
else{
    echo "<script>alert('Data has been entered and you are now being redirected to Home Page');
    window.location= 'adminhome.php';
</script>";
}
}
insertsalarydetail();
?>