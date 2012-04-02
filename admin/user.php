<?php
include_once '../dbfiles/config.php';
include_once 'deledit.php';
$fname= $_GET['user'];
$query= mysql_query("Select workers.id as id, worker_fname, worker_lname, gross, hra, accno from workers, worker_fixeds, worker_acc where workers.id=worker_fixeds.worker_id and workers.id=worker_acc.id and worker_fname LIKE '$fname%'");
if(!$query){
    echo 'error';
}
else{
    $num= mysql_num_rows($query);
    echo '<table align="center" style="width: 40%;margin: auto; margin-bottom: 50px; margin-top: 50px;">';
    if($num==0){
        echo '<tr><td colspan="2">Please Check the Employee Name and do check for Caps Lock.</td></tr>';
    }
    else{
    if($op=='edit'){
    echo '<tr><th>Select</th><th>Emp ID</th>';
    echo '<th>Name</th>';
    echo '<th>GROSS</th>';
    echo '<th>HRA</th><th>Bank Account</th></tr>';
    }
    else{
        echo '<tr><th>Emp ID</th>';
    echo '<th>Name</th>';
    echo '<th>GROSS</th>';
    echo '<th>HRA</th><th>Bank Account</th><th>Select</th></tr>';
    }
    
    while($result=mysql_fetch_array($query)){
        echo '<tr>';
        if($op=='edit'){
        if($op=='edit'){
        echo '<td><input type="radio" name="id" value="'.$result['id'].'" onclick="empdetail(this.value);" /></td>';
        }
         elseif ($op=='del'){
            echo '<td><a href="update_emp_data.php?ID='.base64_encode($result['id']).'">Delete</a></td>';
        }
        echo '<td>'.$result['id'].'</td>';
        echo '<td>'.$result['worker_fname'].' '.$result['worker_lname'].'</td>';
        echo '<td>'.$result['gross'].'</td>';
        echo '<td>'.$result['hra'].'</td>';
        echo '<td>'.$result['accno'].'</td>';
        }
        elseif ($op=='del') {
            echo '<td>'.$result['id'].'</td>';
        echo '<td>'.$result['worker_fname'].' '.$result['worker_lname'].'</td>';
        echo '<td>'.$result['gross'].'</td>';
        echo '<td>'.$result['hra'].'</td>';
        echo '<td>'.$result['accno'].'</td>';
             if($op=='edit'){
        echo '<td><input type="radio" name="id" value="'.$result['id'].'" onclick="empdetail(this.value);" /></td>';
        }
         elseif ($op=='del'){
            echo '<td><a href="update_emp_data.php?ID='.base64_encode($result['id']).'" onclick="return checkdel();">Delete</a></td>';
        }
        }

    }
        echo '</tr>';
    }
    echo '</table>';
}
?>